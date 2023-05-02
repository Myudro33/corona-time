<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordResetRequest;
use App\Http\Requests\PasswordUpdateRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    public function index(): View
    {
        return view('pages.forgot_password');
    }
    public function show($token): View
    {
        return view('pages.password-update', [
            'token' => $token,
            'email' => DB::table('password_reset_tokens')
                ->where('token', $token)
                ->first()->email,
        ]);
    }
    public function view(): View
    {
        return view('pages.password-update-confirmed');
    }

    public function reset_password(PasswordResetRequest $request): RedirectResponse
    {

        User::where('email', $request->email)->update(['password' => bcrypt($request->validated()['password'])]);
        return redirect('/password-confirmed');
    }
    public function send_reset_password_mail(PasswordUpdateRequest $request): RedirectResponse
    {
        $token = Str::random(40);
        $isExist = DB::table('password_reset_tokens')
            ->where('email', $request->validated()['email'])
            ->exists();
        if (!$isExist) {
            DB::table('password_reset_tokens')->insert([
                'email' => $request->validated()['email'],
                'token' => $token,
                'created_at' => now(),
            ]);
        } else {
            return back()->withErrors(['email' => __('passwords.email_already_sent')]);
        }
        Mail::send('email.email-body-password', ['token' => $token], function ($message) use ($request) {
            $message->to($request->validated()['email']);
            $message->subject('Password Reset');
        });
        return redirect('/confirmation');
    }
}

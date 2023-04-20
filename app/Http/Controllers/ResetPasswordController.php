<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordResetRequest;
use App\Http\Requests\PasswordUpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    public function index()
    {
        return view('pages.forgot_password');
    }
    public function show($token)
    {
        return view('pages.password-update', [
            'token' => $token,
            'email' => DB::table('password_reset_tokens')
                ->where('token', $token)
                ->first()->email,
        ]);
    }
    public function view()
    {
        return view('pages.password-update-confirmed');
    }

    public function reset_password(PasswordResetRequest $request)
    {
        $password_reset_required = DB::table('password_reset_tokens')
            ->where('email', $request->validated()['email'])
            ->where('token', $request->token)
            ->first();
        if (!$password_reset_required) {
            return back();
        }
        User::where('email', $request->email)->update(['password' => bcrypt($request->validated()['password'])]);
        return redirect('/password-confirmed');
    }
    public function send_reset_password_mail(PasswordUpdateRequest $request)
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

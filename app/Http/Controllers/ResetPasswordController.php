<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordResetRequest;
use App\Http\Requests\PasswordUpdateRequest;
use App\Mail\ResetPassword;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    public function index()
    {
        return view('pages.forgot_password');
    }
    public function show(User $user)
    {
        if ($user->verification_token == 'reset-verified') {
            return view('pages.password-update', [
                'user' => $user,
            ]);
        } else {
            return redirect('/confirmation');
        }
    }
    public function view()
    {
        return view('pages.password-update-confirmed');
    }

    public function store(PasswordResetRequest $request, User $user)
    {
        $user->password = bcrypt($request->validated()['password']);
        $user->verification_token = Str::random(40);
        $user->save();
        return redirect('/password-confirmed');
    }
    public function update(PasswordUpdateRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        $mail = new ResetPassword($user);
        $mail->setUser($user);
        Mail::to($user->email)->locale(Session::get('locale'))->send(new ResetPassword($user));
        return redirect('/confirmation');
    }
}

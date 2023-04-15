<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Mail\VerifyEmail;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index(): View
    {
        return view('/');
    }

    // login
    public function view(): View
    {
        return view('pages.login');
    }
    public function auth(UserLoginRequest $request)
    {
        $emailOrUsername = $request->input('username');
        $password = $request->input('password');
        $user = User::where('email', $emailOrUsername)
            ->orWhere('username', $emailOrUsername)
            ->first();
        if ($user) {
            if (Hash::check($password, $user->password)) {
                if ($user['email_verified_at'] != null) {
                    return redirect()->intended('/dashboard');
                } else {
                    return redirect('/confirmation');
                }
            } else {
                return back()->withErrors(['password' => __('login.wrong_password')]);
            }
        } else {
            return back()->withErrors(['username' => __('login.wrong_username_or_email')]);
        }
    }
    public function destroy()
    {
        auth()->logout();
        return redirect('/');
    }

    // register

    public function create(): View
    {
        return view('pages.register');
    }
    public function store(UserRegisterRequest $request): RedirectResponse
    {
        $user = new User();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->verification_token = Str::random(40);
        $user->save();
        $mail = new VerifyEmail($user);
        $mail->setUser($user);
        Mail::to($user->email)->send(new VerifyEmail($user));

        return redirect('/confirmation');
    }
}

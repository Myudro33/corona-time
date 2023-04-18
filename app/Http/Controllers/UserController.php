<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Mail\VerifyEmail;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index(): View
    {
        return view('pages.dashboard');
    }

    // login
    public function view(): View
    {
        return view('pages.login');
    }
    public function login(UserLoginRequest $request)
    {
        $emailOrUsername = $request->validated()['username'];
        $password = $request->validated()['password'];
        $user = User::where('email', $emailOrUsername)->orWhere('username', $emailOrUsername)->first();
        if ($user) {
            if (Hash::check($password, $user->password)) {
                if (Auth::attempt(['username' => $emailOrUsername, 'password' => $password])) {
                    return redirect('/dashboard');
                } elseif (Auth::attempt(['email' => $emailOrUsername, 'password' => $password])) {
                    return redirect('/dashboard');
                }
            } else {
                return back()->withErrors(['password' => __('login.wrong_password')]);
            }
        } else {
            return back()->withErrors(['username' => __('login.wrong_username_or_email')]);
        }
    }
    public function logout()
    {
        auth()->logout();
        return redirect('/login');
    }

    // register

    public function create(): View
    {
        return view('pages.register');
    }
    public function register(UserRegisterRequest $request): RedirectResponse
    {
        $user = new User();
        $user->username = $request->validated()['username'];
        $user->email = $request->validated()['email'];
        $user->password = bcrypt($request->validated()['password']);
        $user->verification_token = Str::random(40);
        $user->save();
        $mail = new VerifyEmail($user);
        $mail->setUser($user);
        Mail::to($user->email)->send(new VerifyEmail($user));

        return redirect('/confirmation');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserAuthRequest;
use App\Http\Requests\UserStoreRequest;
use App\Mail\VerifyEmail;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
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
    public function auth(UserAuthRequest $request)
    {
        if (Auth::attempt($request->validated())) {
            $user = Auth::user();
            if ($user['email_verified_at'] != null) {
                return redirect()->intended('/dashboard');
            } else {
                return redirect('/confirmation');
            }
        } else {
            return back();
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
    public function store(UserStoreRequest $request): RedirectResponse
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

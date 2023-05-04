<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Mail\VerifyEmail;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
	public function login(UserLoginRequest $request): RedirectResponse
	{
		$emailOrUsername = $request->validated()['username'];
		$password = $request->validated()['password'];
		$user = User::where('email', $emailOrUsername)
			->orWhere('username', $emailOrUsername)
			->first();
		if ($user) {
			if (Hash::check($password, $user->password)) {
				if (Auth::attempt(['username' => $emailOrUsername, 'password' => $password], (bool) $request->has('remember'))) {
					return redirect('/');
				} elseif (Auth::attempt(['email' => $emailOrUsername, 'password' => $password], (bool) $request->has('remember'))) {
					return redirect('/');
				}
			}
		} else {
			return back()->withErrors(['username' => __('login.wrong_username_or_email')]);
		}
	}

	public function logout(): RedirectResponse
	{
		$user = auth()->user();
		$user->setRememberToken(null);
		$user->save();
		auth()->logout();
		return redirect('/login');
	}

	public function register(UserRegisterRequest $request): RedirectResponse
	{
		$user = User::create($request->validated());
		Mail::to($user->email)
			->locale(Session::get('locale'))
			->send(new VerifyEmail($user));

		return redirect('/confirmation');
	}
}

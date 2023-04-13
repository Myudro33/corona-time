<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

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
    public function auth()
    {
    }

    // register

    public function create(): View
    {
        return view('pages.register');
    }
    public function store(UserStoreRequest $request): RedirectResponse
    {
        User::create([
            'username' => $request->validated()['username'],
            'email' => $request->validated()['email'],
            'password' => bcrypt($request->validated()['password']),
        ]);
        return redirect('/login');
    }
}

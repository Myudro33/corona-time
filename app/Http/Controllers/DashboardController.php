<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('pages.worldwide');
    }
    public function show(): View
    {
        return view('pages.by-country');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(): View
    {
        $sum = Country::all()->sum('confirmed');
        // ddd($sum);
        return view('pages.worldwide', [
            'confirmed' => Country::all()->sum('confirmed'),
            'recovered' => Country::all()->sum('recovered'),
            'deaths' => Country::all()->sum('deaths'),
        ]);
    }
    public function show(): View
    {
        return view('pages.by-country', [
            'confirmed' => Country::all()->sum('confirmed'),
            'recovered' => Country::all()->sum('recovered'),
            'deaths' => Country::all()->sum('deaths'),
            'countries' => Country::filter()->get(),
        ]);
    }
}

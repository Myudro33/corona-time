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
        return view('pages.worldwide', [
            'confirmed' => DB::table('countries')->sum('confirmed'),
            'recovered' => DB::table('countries')->sum('recovered'),
            'deaths' => DB::table('countries')->sum('deaths'),
        ]);
    }
    public function show(): View
    {
        return view('pages.by-country', [
            'confirmed' => DB::table('countries')->sum('confirmed'),
            'recovered' => DB::table('countries')->sum('recovered'),
            'deaths' => DB::table('countries')->sum('deaths'),
            'countries' => Country::filter()->get(),
        ]);
    }
}

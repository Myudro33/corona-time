<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
	public function index(): View
	{
		return view('pages.worldwide', [
			'confirmed' => Country::all()->sum('confirmed'),
			'recovered' => Country::all()->sum('recovered'),
			'deaths'    => Country::all()->sum('deaths'),
		]);
	}

	public function show(): View
	{
		return view('pages.by-country', [
			'confirmed' => Country::all()->sum('confirmed'),
			'recovered' => Country::all()->sum('recovered'),
			'deaths'    => Country::all()->sum('deaths'),
			'countries' => Country::filter()->get(),
		]);
	}
}

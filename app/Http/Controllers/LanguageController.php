<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
	public function setLang($locale): RedirectResponse
	{
		App::setLocale($locale);
		Session::put('locale', $locale);
		return back();
	}
}

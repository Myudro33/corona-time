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
    public function show(Request $request): View
    {
        $lang = app()->getLocale();
        $sort = $request->input('sort');
        $order = $request->input('order');
        $nextOrder = $order === 'asc' ? 'desc' : 'asc';
        $countries = Country::query();
        if ($sort) {
            $countries->orderBy($sort, $order);
        }
        if (request('search')) {
            $countries = DB::table('countries')->where(DB::raw("json_extract(name, '$. " . "$lang')"), 'LIKE', '%' . ucfirst(request('search')) . '%');
        }
        $countries = $countries->get();
        return view(
            'pages.by-country',
            [
                'confirmed' => DB::table('countries')->sum('confirmed'),
                'recovered' => DB::table('countries')->sum('recovered'),
                'deaths' => DB::table('countries')->sum('deaths'),
                'order' => $order,
                'column' => $sort,
                'nextOrder' => $nextOrder,
            ],
            compact('countries'),
        );
    }
}

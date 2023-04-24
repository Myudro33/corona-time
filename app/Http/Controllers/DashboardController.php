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
        if (request('search')) {
            $countries = DB::table('countries')
                ->where(DB::raw("json_extract(name, '$. " . "$lang')"), 'LIKE', '%' . request('search') . '%')
                ->orWhere(DB::raw("json_extract(name, '$. " . "$lang')"), 'LIKE', '%' . ucfirst(request('search')) . '%');
        }
        if ($sort) {
            if ($sort == 'name') {
                $countries->orderByRaw("CAST(JSON_EXTRACT(name, '$." . $lang . "') AS CHAR) " . $order)->orderBy($sort, $order);
            } else {
                $countries->orderBy($sort, $order);
            }
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

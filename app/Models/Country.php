<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Spatie\Translatable\HasTranslations;

class Country extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['name'];
    protected $fillable = ['country', 'code', 'confirmed', 'recovered', 'critical', 'deaths', 'name'];

    public function scopeFilter()
    {
        $lang = app()->getLocale();
        $countries = Country::query();
        if (request('search')) {
            $countries = DB::table('countries')
                ->where(DB::raw("json_extract(name, '$. " . "$lang')"), 'LIKE', '%' . request('search') . '%')
                ->orWhere(DB::raw("json_extract(name, '$. " . "$lang')"), 'LIKE', '%' . ucfirst(request('search')) . '%');
        }
        if (request('sort')) {
            if (request('sort') == 'name') {
                $countries->orderByRaw("CAST(JSON_EXTRACT(name, '$." . $lang . "') AS CHAR) " . request('order'))->orderBy(request('sort'), request('order'));
            } else {
                $countries->orderBy(request('sort'), request('order'));
            }
        }
        return $countries;
    }
}

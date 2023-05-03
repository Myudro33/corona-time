<?php

namespace App\Console\Commands;

use App\Models\Country;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class SyncData extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'app:sync-data';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Command description';

	/**
	 * Execute the console command.
	 */
	public function handle()
	{
		$urlCountryies = 'https://devtest.ge/countries';
		$url = 'https://devtest.ge/get-country-statistics';
		$storage = [];
		$countries = Http::get($urlCountryies);
		$countries_response = json_decode($countries->body());
		if ($countries_response !== null) {
			foreach ($countries_response as $country) {
				$country = (array) $country;
				$response = Http::post($url, ['code' => $country['code']]);
				array_push($storage, json_decode($response->body()));
			}
		}
		$id = 0;
		foreach ($storage as $data) {
			$data = (array) $data;
			$country = Country::firstOrNew(['id' => $data['id']]);
			$country->code = $data['code'];
			$country->country = $data['country'];
			$country->confirmed = $data['confirmed'];
			$country->recovered = $data['recovered'];
			$country->critical = $data['critical'];
			$country->deaths = $data['deaths'];
			$country->setTranslation('name', 'en', $countries[$id]['name']['en'])->setTranslation('name', 'ka', $countries[$id]['name']['ka']);
			$country->save();
			$id++;
		}
	}
}

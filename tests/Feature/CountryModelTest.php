<?php

namespace Tests\Feature;

use App\Models\Country;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CountryModelTest extends TestCase
{
	/**
	 * A basic feature test example.
	 */
	use RefreshDatabase;

	public function test_uset_can_search_countries(): void
	{
		$user = User::factory()->create();
		Country::factory()->create([
			'name' => ['en' => 'Georgia', 'ka' => 'საქართველო'],
		]);
		$this->actingAs($user)
			->get('/bycountry?search=geo')
			->assertViewIs('pages.by-country')
			->assertSee('geo')
			->assertOk();
	}

	public function test_user_can_sort_countries_by_name()
	{
		$user = User::factory()->create();
		Country::factory()->create([
			'name' => ['en' => 'georgia', 'ka' => 'საქართველო'],
		]);
		$this->actingAs($user)
			->get('/bycountry?sort=name&order=asc')
			->assertViewIs('pages.by-country')
			->assertOk();
	}

	public function test_user_can_sort_countries_by_confirmed()
	{
		$user = User::factory()->create();
		Country::factory()->create();
		$this->actingAs($user)
			->get('/bycountry?sort=confirmed&order=asc')
			->assertViewIs('pages.by-country')
			->assertOk();
	}
}

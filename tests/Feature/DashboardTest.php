<?php

namespace Tests\Feature;

use App\Models\Country;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;
    public function test_authenticated_user_can_redirect_dashboard_page(): void
    {
        $user = User::factory()->create();
        Country::factory(10)->create();
        $response = $this->actingAs($user)->get('/worldwide');
        $response->assertViewIs('pages.worldwide');
        $response->assertSuccessful();
    }
    public function test_user_can_redirect_country_page(): void
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/bycountry');
        $response->assertViewIs('pages.by-country');
        $response->assertSuccessful();
    }
    public function test_user_can_sort_table_on_countries_page(): void
    {
        $user = User::factory()->create();
        Country::factory(10)->create();
        $response = $this->actingAs($user)->get('/bycountry', ['sort' => request('sort'), 'order' => request('order')]);
        $response->assertViewIs('pages.by-country');
        $response->assertSuccessful();
    }
    public function test_user_can_search_countries_using_country_name_in_table(): void
    {
        $user = User::factory()->create();
        Country::factory(10)->create();
        $response = $this->actingAs($user)->get('/bycountry', ['search' => request('search'), 'sort' => 'name', 'order' => request('order') == 'desc' ? 'asc' : 'desc']);
        $response->assertViewIs('pages.by-country');
        $response->assertSuccessful();
    }
    public function test_artisan_command_should_sync_data_in_database(): void
    {
        $this->artisan('app:sync-data')->assertSuccessful();
    }
    public function test_artisan_command_delete_reset_tokens(): void
    {
        Http::fake();
        $this->artisan('auth:clear-resets')->assertSuccessful();
    }
}

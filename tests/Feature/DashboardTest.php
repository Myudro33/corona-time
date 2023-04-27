<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;
    public function test_user_can_redirect_worldwide_page(): void
    {
        $this->withoutMiddleware();
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/worldwide');
        $response->assertViewIs('pages.worldwide');
        $response->assertSuccessful();
    }
    public function test_user_can_redirect_country_page(): void
    {
        $this->withoutMiddleware();
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/bycountry');
        $response->assertViewIs('pages.by-country');
        $response->assertSuccessful();
    }
    public function test_user_can_sort_table_on_country_page_by_country_name(): void
    {
        $this->withoutMiddleware();
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/bycountry', ['sort' => 'name', 'order' => 'asc']);
        $response->assertViewIs('pages.by-country');
        $response->assertSuccessful();
    }
    public function test_user_can_sort_table_on_country_page_by_country_confirmed(): void
    {
        $this->withoutMiddleware();
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/bycountry', ['sort' => 'confirmed', 'order' => 'asc']);
        $response->assertViewIs('pages.by-country');
        $response->assertSuccessful();
    }
    public function test_user_can_sort_table_on_country_page_by_country_deaths(): void
    {
        $this->withoutMiddleware();
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/bycountry', ['sort' => 'deaths', 'order' => 'asc']);
        $response->assertViewIs('pages.by-country');
        $response->assertSuccessful();
    }
    public function test_user_can_sort_table_on_country_page_by_country_recovered(): void
    {
        $this->withoutMiddleware();
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/bycountry', ['sort' => 'recovered', 'order' => 'asc']);
        $response->assertViewIs('pages.by-country');
        $response->assertSuccessful();
    }
    public function test_user_can_search_countries_using_name_in_table(): void
    {
        $this->withoutMiddleware();
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/bycountry', ['search' => 'geo']);
        $response->assertViewIs('pages.by-country');
        $response->assertSuccessful();
    }
    public function test_artisan_command_should_sync_data_in_database(): void
    {
        Http::fake();
        $this->artisan('app:sync-data')->assertSuccessful();
    }
    public function test_artisan_command_delete_reset_tokens(): void
    {
        Http::fake();
        $this->artisan('auth:clear-resets')->assertSuccessful();
    }
}

<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LanguageSwitchTest extends TestCase
{
    use RefreshDatabase;
    public function test_name_should_be_changed_to_english(): void
    {
        $this->withoutMiddleware();
        $response = $this->get('/locale/en');
        $response->assertRedirect('/');
        $response->assertStatus(302);
    }
    public function test_name_should_be_changed_to_georgian(): void
    {
        $this->withoutMiddleware();
        $response = $this->get('/locale/ge');
        $response->assertRedirect('/');
        $response->assertStatus(302);
    }
}

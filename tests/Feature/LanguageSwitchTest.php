<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LanguageSwitchTest extends TestCase
{
	use RefreshDatabase;

	public function test_name_should_be_changed_to_english(): void
	{
		$response = $this->get('/locale/en');
		$response->assertRedirect('/');
		$response->assertSessionHas('locale', 'en');
		$response->assertStatus(302);
	}

	public function test_name_should_be_changed_to_georgian(): void
	{
		$response = $this->get('/locale/ka');
		$response->assertRedirect('/');
		$response->assertSessionHas('locale', 'ka');
		$response->assertStatus(302);
	}
}

<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;
    public function test_guest_must_redirect_to_login()
    {
        $response = $this->get(route('dashboard'));
        $response->assertRedirect('/login');
    }
    public function test_login_page_is_accessible()
    {
        $response = $this->get(route('login.view'));

        $response->assertSuccessful();
    }
    public function test_login_form_should_give_us_errors_if_input_is_not_provided(): void
    {
        $response = $this->post('/login', [
            'username' => '',
            'password' => '',
        ]);
        $response->assertSessionHasErrors(['username', 'password']);
    }
    public function test_login_form_should_give_us_error_if_email_is_not_provided()
    {
        $response = $this->post('/login', [
            'username' => '',
            'password' => 'dhajwkdjhaw',
        ]);
        $response->assertSessionHasErrors(['username']);
    }
    public function test_login_form_should_give_us_password_error_if_password_is_not_provided()
    {
        $response = $this->post('/login', [
            'username' => 'awdawdawd',
            'password' => '',
        ]);
        $response->assertSessionHasErrors(['password']);
    }
    public function test_login_form_should_give_us_error_when_user_does_not_exists()
    {
        $response = $this->post('/login', [
            'username' => 'nika@gmail.com',
            'password' => 'ddd',
        ]);
        $response->assertSessionHasErrors(['username']);
    }
    public function test_login_form_should_give_us__error_when_password_is_incorrect()
    {
        $user = User::factory()->create();
        $response = $this->post('/login', [
            'username' => $user->email,
            'password' => 'dawhdjkawhdkjhwa',
        ]);
        $response->assertSessionHasErrors(['password']);
    }
    public function test_login_form_should_redirect_to_dashboard_page()
    {
        $user = User::factory()->create();
        $response = $this->post('/login', ['username' => $user->email, 'password' => 'ddd']);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect('/worldwide');
    }
    public function test_user_can_log_out()
    {
        $user = User::factory()->create();
        $this->actingAs($user)
            ->post('/logout')
            ->assertRedirect('/login');
        $this->assertGuest();
    }
}

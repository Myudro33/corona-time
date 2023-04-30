<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;
    public function test_user_with_correct_credentials_can_login()
    {
        // Create a user with a random username and password
        $password = $this->faker->password;
        $user = User::factory()->create([
            'password' => Hash::make($password),
        ]);

        // Attempt to log in with the user's username and password
        $response = $this->post('/login', [
            'username' => $user->username,
            'password' => $password,
        ]);

        // Assert that the response redirects to the expected URL
        $response->assertRedirect('/');

        // Assert that the user is authenticated
        $this->assertAuthenticatedAs($user);
    }
    public function test_login_page_is_accessible()
    {
        $response = $this->get(route('login.view'));

        $response->assertSuccessful()->assertViewIs('pages.login');
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
        User::factory()->create([
            'email' => 'test@gmail.com',
        ]);
        $response = $this->post('/login', [
            'username' => 'nika@gmail.com',
            'password' => 'ddd',
        ]);
        $response->assertSessionHasErrors(['username']);
    }
    public function test_login_form_should_give_us_error_when_password_is_incorrect()
    {
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'username' => 'testuser',
            'password' => Hash::make('testpassword'),
        ]);

        $response = $this->post('/login', [
            'username' => $user->username,
            'password' => 'wrongpassword',
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['password']);

        $this->assertGuest();
    }
    public function test_user_should_redirect_to_confirmation_page_if_email_is_not_verified()
    {
        $email = 'nika@gmail.com';
        $password = 'ddd';

        User::factory()->create([
            'username' => 'nika',
            'email' => $email,
            'password' => bcrypt($password),
            'email_verified_at' => null,
        ]);
        $this->post(route('login'), ['username' => $email, 'password' => $password])
            ->assertRedirect('/confirmation')
            ->assertStatus(302);
    }
    public function test_login_form_should_redirect_to_dashboard_page()
    {
        $user = User::factory()->create([
            'email_verified_at' => now(),
        ]);
        $response = $this->post('/login', ['username' => $user->email, 'password' => 'ddd']);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect('/');
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

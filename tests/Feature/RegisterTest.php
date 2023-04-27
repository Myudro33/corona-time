<?php

namespace Tests\Feature;

use App\Mail\VerifyEmail;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;
    public function test_user_can_redirect_to_register_page()
    {
        $response = $this->get(route('register.create'));
        $response->assertStatus(302);
    }
    public function test_auth_should_give_us_errors_if_inputs_is_not_provided()
    {
        $this->withoutMiddleware();
        $response = $this->post(route('register'));
        $response->assertSessionHasErrors(['username', 'email', 'password', 'confirm_password']);
    }
    public function test_auth_should_give_us_error_if_email_is_not_valid()
    {
        $this->withoutMiddleware();
        $response = $this->post(route('register'), [
            'email' => 'awjdklawjd',
        ]);
        $response->assertSessionHasErrors(['email']);
    }
    public function test_auth_should_give_us_error_if_username_already_exists()
    {
        $this->withoutMiddleware();

        User::factory()->create([
            'username' => 'unique',
        ]);
        $response = $this->post('/register', [
            'username' => 'unique',
        ]);
        $response->assertSessionHasErrors(['username']);
    }
    public function test_auth_should_give_us_error_if_email_already_exists()
    {
        $this->withoutMiddleware();

        User::factory()->create([
            'email' => 'unique@gmail.com',
        ]);
        $response = $this->post('/register', [
            'email' => 'unique@gmail.com',
        ]);
        $response->assertSessionHasErrors(['email']);
    }
    public function test_auth_should_give_us_error_if_passwords_do_not_match()
    {
        $this->withoutMiddleware();
        $response = $this->post('/register', [
            'password' => 'nika',
            'confirm_password' => 'luka',
        ]);
        $response->assertSessionHasErrors(['confirm_password']);
    }
    public function test_user_can_register_if_sesion_has_no_errors()
    {
        $this->withoutMiddleware();
        $response = $this->post('/register', [
            'username' => 'nika',
            'email' => 'nika@redberry.ge',
            'password' => 'nika',
            'confirm_password' => 'nika',
        ]);
        $response->assertSessionHasNoErrors();
    }
    public function test_if_register_is_successfull_sent_email()
    {
        $this->withoutMiddleware();
        $token = Str::random(30);
        Mail::fake();
        $response = $this->post('/register', [
            'email' => 'nika@gmail.com',
            'username' => 'nika',
            'password' => 'ddd',
            'confirm_password' => 'ddd',
            'verification_token'=> 'abdg'
        ]);
        $response->assertRedirect('/confirmation');
        Mail::to('nika@gmail.com');
        Mail::assertSent(VerifyEmail::class);
    }
}

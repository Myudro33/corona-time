<?php

namespace Tests\Feature;

use App\Mail\VerifyEmail;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;
    public function test_user_can_redirect_to_register_page()
    {
        $response = $this->get(route('register.create'));
        $response->assertSuccessful();
    }
    public function test_auth_register_should_give_us_errors_if_inputs_are_not_provided()
    {
        $response = $this->post(route('register'));
        $response->assertSessionHasErrors(['username', 'email', 'password', 'confirm_password']);
    }
    public function test_auth_should_give_us_error_if_email_is_not_valid()
    {
        $response = $this->post(route('register'), [
            'email' => 'awjdklawjd',
        ]);
        $response->assertSessionHasErrors(['email']);
    }
    public function test_auth_should_give_us_error_if_username_already_exists()
    {
        $user = User::factory()->create([
            'username' => 'unique',
        ]);
        $response = $this->post('/register', [
            'username' => $user->username,
        ]);
        $response->assertSessionHasErrors(['username']);
    }
    public function test_auth_should_give_us_error_if_email_already_exists()
    {
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
        $response = $this->post('/register', [
            'password' => 'nika',
            'confirm_password' => 'luka',
        ]);
        $response->assertSessionHasErrors(['confirm_password']);
    }
    public function test_user_can_register_if_sesion_has_no_errors()
    {
        $response = $this->post('/register', [
            'username' => 'nika',
            'email' => 'nika@redberry.ge',
            'password' => 'nika',
            'confirm_password' => 'nika',
        ]);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect('/confirmation');
    }
    public function test_if_register_is_successfull_sent_email()
    {
        Mail::fake();
        $response = $this->post('/register', [
            'email' => 'nika@gmail.com',
            'username' => 'nika',
            'password' => 'ddd',
            'confirm_password' => 'ddd',
        ]);
        Mail::assertSent(VerifyEmail::class, function (VerifyEmail $mail) {
            $this->assertCount(1, $mail->to);
            $this->assertEquals('nika@gmail.com', $mail->to[0]['address']);
            return true;
        });
        $response->assertRedirect('/confirmation');
    }
}

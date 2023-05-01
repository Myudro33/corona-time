<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Tests\TestCase;

class ResetPasswordTest extends TestCase
{
    use RefreshDatabase;
    public function test_forgot_password_page_is_accessible(): void
    {
        $response = $this->get(route('forgot-password.index'))->assertViewIs('pages.forgot_password');
        $response->assertSuccessful();
    }
    public function test_password_reset_successfully_page_should_render(): void
    {
        $this->get('/password-confirmed')
            ->assertSuccessful()
            ->assertViewIs('pages.password-update-confirmed');
    }
    public function test_validation_should_give_us_error_if_email_already_sent()
    {
        $email = 'nika@gmail.com';
        $token = Str::random(40);
        User::factory()->create([
            'email' => $email,
        ]);
        DB::table('password_reset_tokens')->insert([
            'email' => $email,
            'token' => $token,
        ]);
        $this->post(route('password.email', ['token' => $token]), [
            'email' => $email,
        ])->assertSessionHasErrors(['email']);
    }
    public function test_show_email_validation_error_if_input_is_empty(): void
    {
        $response = $this->post(route('password.email'), [
            'email' => '',
        ]);
        $response->assertSessionHasErrors(['email']);
    }
    public function test_show_validation_error_if_value_is_not_email_format(): void
    {
        $response = $this->post(route('password.email'), [
            'email' => 'nika',
        ]);
        $response->assertSessionHasErrors(['email']);
    }
    public function test_show_validation_error_if_email_does_not_exists(): void
    {
        User::factory()->create([
            'email' => 'test@gmail.com',
        ]);
        $response = $this->post(route('password.email'), [
            'email' => 'example@gmail.com',
        ]);
        $response->assertSessionHasErrors(['email']);
    }
    public function test_password_reset_check_valid_email_and_redirect_to_confirmation_view()
    {
        $email = 'nika@gmail.com';
        User::factory()->create([
            'email' => $email,
        ]);
        $response = $this->post(route('password.email'), [
            'email' => $email,
        ]);
        $response->assertSessionDoesntHaveErrors(['email'])->assertRedirect('/confirmation');
    }
    public function test_password_reset_check_if_it_a_valid_token_for_password_reset_and_show_password_reset_view()
    {
        $email = 'nika@gmail.com';
        $token = Str::random(40);
        DB::table('password_reset_tokens')->insert([
            'email' => $email,
            'token' => $token,
        ]);
        $response = $this->get(route('password.reset', ['token' => $token]));
        $response->assertSuccessful()->assertViewIs('pages.password-update');
    }
    public function test_password_reset_check_should_give_us_error_if_password_length_is_less_than_3()
    {
        $email = 'nika@gmail.com';
        $token = Str::random(40);
        $password = 'dd';
        $confirmPassword = 'dd';
        $response = $this->post(route('password.reset', ['email' => $email, 'token' => $token]), [
            'password' => $password,
            'confirm_password' => $confirmPassword,
        ]);
        $response->assertSessionHasErrors(['password']);
    }
    public function test_password_reset_check_should_give_us_error_if_password_and_confirm_password_input_is_not_provided()
    {
        $email = 'nika@gmail.com';
        $token = Str::random(40);
        $response = $this->post(route('password.reset', ['email' => $email, 'token' => $token]));
        $response->assertSessionHasErrors(['password', 'confirm_password']);
    }
    public function test_password_reset_page_should_redirect_if_password_changed_successfully()
    {
        $email = 'nika@gmail.com';
        $token = Str::random(40);
        $password = 'nika';
        $user = User::factory()->create([
            'email' => $email,
        ]);
        DB::table('password_reset_tokens')->insert([
            'email' => $email,
            'token' => $token,
        ]);
        $this->post(route('password.reset', ['token' => $token, 'email' => $user->email]), [
            'password' => $password,
            'confirm_password' => $password,
        ])->assertRedirect('/password-confirmed');
    }
}

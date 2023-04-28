<?php

namespace Tests\Feature;

use App\Mail\ResetPassword;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ResetPasswordTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;
    public function test_forgot_password_page_is_accessible(): void
    {
        $response = $this->get(route('forgot-password.index'))->assertViewIs('pages.forgot_password');
        $response->assertSuccessful();
    }
    public function test_password_reset_successfully_page_should_render(): void
    {
        $user = User::factory()->create();
        $this->post("/password-update/$user->verification_token", ['email' => $user->email, 'password' => 'nika'])->assertStatus(302);
        $this->get('/password-confirmed')
            ->assertSuccessful()
            ->assertViewIs('pages.password-update-confirmed');
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
        $response = $this->post(route('password.email'), [
            'email' => 'example@gmail.com',
        ]);
        $response->assertSessionHasErrors(['email']);
    }
    public function test_if_provided_email_is_correct_send_reset_password_email(): void
    {
        Mail::fake();
        $user = User::factory()->create();
        $this->post(route('password.email'), ['email' => $user->email]);
        Mail::to($user->email)->send(new ResetPassword($user));
        Mail::assertSent(ResetPassword::class);
    }
}

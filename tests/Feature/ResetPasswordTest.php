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
    use RefreshDatabase, WithFaker;
    public function test_forgot_password_page_is_accessible(): void
    {
        $response = $this->get(route('forgot-password.index'));
        $response->assertStatus(302);
    }
    public function text_password_confirmed_page_should_render_after_reset_password(): void
    {
        $response = $this->get('/password-confirmed');
        $response->assertStatus(302);
    }
    public function test_show_validation_error_if_input_is_empty(): void
    {
        $this->withoutMiddleware();
        $response = $this->post(route('password.email'), [
            'email' => '',
        ]);
        $response->assertSessionHasErrors();
    }
    public function test_show_validation_error_if_value_is_not_email_format(): void
    {
        $this->withoutMiddleware();
        $response = $this->post(route('password.email'), [
            'email' => 'nika',
        ]);
        $response->assertSessionHasErrors();
    }
    public function test_show_validation_error_if_email_is_not_exists(): void
    {
        $this->withoutMiddleware();
        $response = $this->post(route('password.email'), [
            'email' => 'example@gmail.com',
        ]);
        $response->assertSessionHasErrors();
    }
    public function test_if_provided_email_is_correct_send_reset_password_email(): void
    {
        $this->withoutMiddleware();
        Mail::fake();
        $user = User::factory()->create();
        $this->post(route('password.email'), ['email' => $user->email]);
        Mail::to($user->email)->send(new ResetPassword($user));
        Mail::assertSent(ResetPassword::class);
    }
}

<?php

namespace Tests\Feature;

use App\Mail\VerifyEmail;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class MailVerificationTest extends TestCase
{
    use RefreshDatabase;
    public function test_confirmation_page_should_render_after_email_sent_successfully(): void
    {
        $this->withoutMiddleware();
        $response = $this->get('/confirmation');
        $response->assertSuccessful()->assertViewIs('pages.confirmation');
    }
    public function test_confirmed_page_should_render_after_email_submit_successfully(): void
    {
        $this->withoutMiddleware();
        $response = $this->get('/confirmed');
        $response->assertSuccessful()->assertViewIs('pages.confirmed');
    }
    public function test_email_body_has_verification_token(): void
    {
        $this->withoutMiddleware();
        $user = User::factory()->create();
        Mail::fake();
        Mail::to($user->email)->send(new VerifyEmail($user));
        Mail::assertSent(VerifyEmail::class, function ($mail) use ($user) {
            return $mail->hasTo($user->email) && str_contains($mail->user->verification_token, $user->verification_token);
        });
        $response = $this->get(route('verification.verify', $user->verification_token));
        $response->assertRedirect('/confirmed');
    }
}

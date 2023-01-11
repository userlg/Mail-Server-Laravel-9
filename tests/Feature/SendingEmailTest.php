<?php

namespace Tests\Feature;

use App\Mail\NotifyMail;
use App\Mail\CodeVerificationMail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

use Illuminate\Support\Facades\Queue;

use App\Jobs\SendCodeEmail;
use App\Jobs\SendMessage;
use App\Models\Message;

use App\Models\Temp;

class SendingEmailTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_route_home_form_email_message_get()
    {
        $response = $this->get('/');
        $response->assertSee('MAIL SERVER');
        $response->assertOk();
    }

    public function test_send_form_email_post()
    {

        //$this->withExceptionHandling();

        $this->withoutMiddleware();

        $this->expectsJobs(SendCodeEmail::class);

        $message = Message::factory()->make();

        $email = "anonymous@gmail.com";

        $data = [
            'title' => $message->title,
            'senderEmail' => $email,
            'message' => $message->message
        ];

        $response = $this->post(route('email.form'), $data);

        $response->assertSee($email);

        $response->assertStatus(200);

        $this->assertCount(1, Message::all());
    }

    public function test_send_form_email_twice_post()
    {
        $this->withoutMiddleware();

        $this->expectsJobs(SendCodeEmail::class);

        $message = Message::factory()->make();

        $email = "ornell12@gmail.com";

        $data = [
            'title' => $message->title,
            'senderEmail' => $email,
            'message' => $message->message
        ];

        $response = $this->post(route('email.form'), $data);

        $response->assertSee($email);

        $response->assertStatus(200);

        $response = $this->post(route('email.form'), $data);

        $response->assertSessionHas('status', 'Email was already sent, please check your inbox');
    }




    public function test_mail_server_database_has_message()
    {
        $message = Message::factory()->create();

        $this->assertDatabaseHas('messages', ['title' => $message->title]);
    }

    public function test_mail_server_database_has_temp()
    {
        $temp = Temp::factory()->create();
        $this->assertDatabaseHas('temps', ['email' => $temp->email]);
    }

    public function test_mailable_notifyMail()
    {
        $message = Message::factory()->create();

        $mailable = new NotifyMail($message);

        $mailable->assertSeeInHtml('From:');

        $mailable->assertSeeInHtml($message->senderEmail);

        $mailable->assertSeeInHtml($message->message);
    }

    public function test_mailable_code_verification_email()
    {

        $this->expectsJobs(SendCodeEmail::class);

        Queue::fake([
            SendCodeEmail::class
        ]);

        $code = "AAAFFF";

        SendCodeEmail::dispatch("admin@laravel.org", $code);

        $mailable =  new CodeVerificationMail([
            "title" => "Verification Code",
            "message" => "Please Introduce the verification code to continue",
            "code" => $code,
        ]);

        Queue::pushed(SendCodeEmail::class, 1);

        $mailable->assertSeeInHtml($code);
    }

    public function test_job_send_message_email()
    {
        $this->expectsJobs(SendMessage::class);

        $message = Message::factory()->create();

        $data = [
            "title" => $message->title,
            "message" => $message->message,
            "senderEmail" => $message->senderEmail,
            "ip" => $message->ip
        ];

        Queue::fake([
            SendMessage::class
        ]);

        SendMessage::dispatch($data);

        Queue::pushed(SendMessage::class, 1);
    }
}

<?php

namespace Tests\Feature;

use App\Mail\NotifyMail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

use App\Models\Message;

class RoutesTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */


    public function test_route_home_get()
    {
        $response = $this->get('/');
        $response->assertSee('MAIL SERVER');
        $response->assertOk();
    }

    public function test_route_home_post()
    {


        $this->withExceptionHandling();

        $this->withoutMiddleware();

        $message = Message::factory()->make();

        $data = [
            'title' => $message->title,
            'senderEmail' => $message->senderEmail,
            'message' => $message->message
        ];

        $response = $this->post('/', $data);

        $response->assertRedirect('http://localhost?email%20sent');


        $this->assertCount(1, Message::all());
    }

    public function test_mail_server_database()
    {
        $message = Message::factory()->create();

        $this->assertDatabaseHas('messages', ['title' => $message->title]);
    }

    public function test_mailable_notifyMail()
    {

        $message = Message::factory()->create();

        $mailable = new NotifyMail($message);

        $mailable->assertSeeInHtml('From:');

        $mailable->assertSeeInHtml($message->senderEmail);

        $mailable->assertSeeInHtml($message->message);
    }
}

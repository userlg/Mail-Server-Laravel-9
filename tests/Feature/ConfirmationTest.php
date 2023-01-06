<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\View;
use Tests\TestCase;
use Illuminate\Support\Facades\Queue;
use App\Jobs\SendCodeEmail;
use App\Jobs\SendMessage;
use App\Models\Message;

use App\Models\Temp;


class ConfirmationTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_route_home_sending_form_correctly()
    {
        $this->withoutMiddleware();

        $message = Message::factory()->make();

        $email = "luffy@gmail.com";

        $data = [
            'title' => $message->title,
            'senderEmail' => $email,
            'message' => $message->message
        ];

        $response = $this->post(route('email.form'), $data);

        $response->assertSee($email);

        $response->assertStatus(200);

        $this->assertCount(1, Message::all());

        $response->assertSessionHas('status', 'Code sent successfully');

        $response = $this->post(route('email.form'), $data);

        $response->assertSessionHas('status', 'Email was already sent, please check your inbox');
    }

    public function test_confirm_code_correctly()
    {
        $this->withoutMiddleware();

        $email = "lois@laravel.net";

        $message = Message::factory()->create([
            "senderEmail" => $email
        ]);

        $temp = Temp::factory()->create([
            "email" => $email,
            "code" => "AAABBB"
        ]);

        $response = $this->post(route('confirm.code'), [
            "input1" => "A",
            "input2" => "A",
            "input3" => "A",
            "input4" => "B",
            "input5" => "B",
            "input6" => "B",
            "email" => $email
        ]);

        $response->assertRedirect();

        $response->assertSessionHas('status', 'Email sent correctly to the admin');
    }

    public function test_confirm_code_wrong()
    {
        $this->withoutMiddleware();

        $email = "taylor@laravel.net";
        $message = Message::factory()->create([
            "senderEmail" => $email
        ]);
        $temp = Temp::factory()->create([
            "email" => $email,
            "code" => "AAACCC"
        ]);
        $response = $this->post(route('confirm.code'), [
            "input1" => "A",
            "input2" => "A",
            "input3" => "A",
            "input4" => "B",
            "input5" => "B",
            "input6" => "B",
            "email" => $email
        ]);

        $response->assertViewIs('confirmation');

        $response->assertSessionHas('status', 'Introduce the right code');
    }
}

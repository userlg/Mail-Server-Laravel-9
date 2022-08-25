<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Message;

class RouteTests extends TestCase
{
    use RefreshDatabase;

    use WithFaker;
    /**
     *
     * @return void
     */
    public function test_route_home_get()
    {
        $response = $this->get('/');

        $response->assertViewHas('Mail Server');

        $response->assertOk();
    }

    public function test_route_home_post(){
        
        $message = Message::factory()->create;
        
        $response = $this->post('/',array($message));
         
        $this->assertCount(1,Message::all());

        $response->assertCreated();

    }
}

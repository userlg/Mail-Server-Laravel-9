<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Message;

class RoutesTest extends TestCase
{
    use RefreshDatabase;
    
    use WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */


    public function test_route_home_get()
    {
        $response = $this->get('/');
        $response->assertSee('Mail Server');
        $response->assertOk();
    }

    public function test_route_home_post(){

        $this->withExceptionHandling();
        
        $message = Message::factory()->create();
        
        $response = $this->post('/',array($message));
         
        $this->assertCount(1,Message::all());
       // $response->assertCreated();
    }
}

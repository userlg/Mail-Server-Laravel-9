<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RouteTests extends TestCase
{
    use RefreshDatabase;
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
}

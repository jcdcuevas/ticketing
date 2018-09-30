<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EventListingTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testEventListRespondsOk()
    {
        $response = $this->get('/api/events');
        $response->assertStatus(200);
    }
}

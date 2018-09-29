<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleFeatureTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    public function testContactPageExists()
    {
      $response = $this->get('/contact');
      $response->assertStatus(200);
      $response->assertViewIs('contact');
    }
}

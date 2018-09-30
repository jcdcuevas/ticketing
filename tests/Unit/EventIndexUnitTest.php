<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Mockery;

class EventIndexUnitTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $mockRequest      = Mockery::mock('\Illuminate\Http\Request');
        $mockRequest->shouldReceive('has')
          ->andReturn(false);

        $event            = new \App\Event;
        $event->id        = 4;
        $event->name      = 'Example Name';
        $event->venue     = 'Example Venue';
        $event->starts_at = \Carbon\Carbon::now();
        $event->ends_at   = \Carbon\Carbon::now();
        $event->description     = 'Some long description...';

        $mockEventModel = Mockery::mock('\App\Event');
        $mockEventModel->shouldReceive('orderBy')->andReturn($mockEventModel);
        $mockEventModel->shouldReceive('get')->andReturn(collect([$event]));

        $eventsController = new \App\Http\Controllers\Api\EventsController;
        $response = $eventsController->index($mockRequest, $mockEventModel);
        $this->assertTrue(is_a($response, 'Illuminate\Http\JsonResponse'));

        $json = json_decode($response->content());
        for($i=0;$i<count($json);$i++){
          $this->assertTrue(property_exists($json[$i], 'id'));
          $this->assertTrue(property_exists($json[$i], 'name'));
          $this->assertTrue(property_exists($json[$i], 'venue'));
        }




    }
}

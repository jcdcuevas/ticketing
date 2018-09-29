<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleUnitTest extends TestCase
{

    public function testSquareCanEstimateArea()
    {
      $square = new \App\Square(5);
      $this->assertTrue($square->getArea()==25);
    }

    public function testSquareCanEstimatePerimeter()
    {
      $square = new \App\Square(5);
      $this->assertTrue($square->getPerimeter()==20);
    }
}

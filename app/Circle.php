<?php

namespace App;

class Circle
{

  var $radius;

  public function __construct($radius)
  {
    $this->radius = $radius;
  }

  public function getArea()
  {
    return $this->radius * 3.1415;
  }

}

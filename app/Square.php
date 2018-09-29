<?php

namespace App;

class Square
{

  var $side;

  public function __construct($side)
  {
    $this->side = $side;
  }

  public function getArea()
  {
    return $this->side * $this->side;
  }

  public function getPerimeter()
  {
    return $this->side * 4;
  }
}

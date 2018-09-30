<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //
    protected $fillable = [
      'name',
      'starts_at',
      'ends_at',
      'venue',
      'description'
    ];

    public function tickets()
    {
      return $this->hasMany('App\Ticket');
    }
}

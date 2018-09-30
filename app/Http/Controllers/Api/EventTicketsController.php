<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Ticket;
use App\Event;

class EventTicketsController extends Controller
{
    //
    public function index($event_id)
    {
      $event = Event::find($event_id);
      return response()->json($event->tickets);
    }
}

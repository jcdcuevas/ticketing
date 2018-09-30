<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventsController extends Controller
{
    var $request;
    var $eventModel;

    public function __construct(Request $request, \App\Event $eventModel){
      $this->request = $request;
      $this->eventModel = $eventModel;
    }

    public function index()
    {
      $events = $this->eventModel->orderBy('id', 'ASC');

      if($this->request->has('from_date')){
        $events = $events->whereDate('starts_at', '>=', $this->request->get('from_date'));
      }

      $events = $events->get();
      return response()->json($events);
    }
}

<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventsController extends Controller
{
    
    public function index(Request $request, \App\Event $eventModel)
    {
      $events = $eventModel->orderBy('id', 'ASC');

      if($request->has('from_date')){
        $events = $events->whereDate('starts_at', '>=', $request->get('from_date'));
      }

      $events = $events->get();
      return response()->json($events);
    }
}

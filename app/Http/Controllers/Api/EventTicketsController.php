<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Ticket;
use App\Event;

class EventTicketsController extends Controller
{
    //
    public function index($event_id, Event $eventModel, Request $request)
    {
      $event = $eventModel->find($event_id);

      // Evaluar si el cliente me pide una conversion
      // enviándome un código de moneda, y llevar a cabo
      // la conversión
      $tickets = $event->tickets;
      if($request->has('currency')){

        foreach($tickets as $ticket):
          $currency = \App\Currency::where('code', $request->currency)
            ->first();
          $ticket->price = bcdiv($ticket->price, $currency->exchange_rate, 2);
        endforeach;
      }

      // https://free.currencyconverterapi.com/api/v6/convert?q=USD_PHP&compact=y

      return response()->json($event->tickets);
    }
}

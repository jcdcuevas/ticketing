<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Strategies\ChargeStrategyInterface;

class OrdersController extends Controller
{
    //
    public function store(Request $request,
      ChargeStrategyInterface $paymentGateway
    )
    {
      // id_ticket[]
      $tickets = \App\Ticket::find($request->id_ticket);
      // $total = 0;
      // foreach($tickets as $ticket):
      //   $total += $ticket->price;
      // endforeach;
      //
      // dd($total);

      $total = $tickets->sum('price');
      $paymentGateway->pay($total, $tickets);

    }
}

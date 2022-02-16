<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use Illuminate\Http\Request;
use App\Http\Requests\DeliveryRequest;

class AppController extends Controller {
    // Guardar entrega en la db
    public function saveDelivery(DeliveryRequest $r) {
        Delivery::create($r->all());

        return response()->json(['status'=>1]);
    }
}

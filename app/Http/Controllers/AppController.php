<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AppController extends Controller {
    // Guardar entrega en la db
    public function saveDelivery(Request $r) {
        // Se validan los datos recibidos
        $validator = Validator::make($r->all(), [
            'coordinates' => ['required', 'string', 'max:200'],
            'name' => ['optional', 'string', 'max:100'],
            'tracking_number' => ['optional', 'string', 'max:100']
        ]);
        
        Delivery::create($r->all());


        return response()->json(['status' => 1]);
    }
}

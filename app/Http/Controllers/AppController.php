<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use App\Models\Delivery;

class AppController extends Controller {
    // Guardar entrega en la db
    public function saveDelivery(Request $r) {
        // Se validan los datos recibidos
        $validator = Validator::make($r->all(), [
            'route_id' => ['required', 'string', 'exists:routes,id'],
            'coordinates' => ['required', 'string', 'max:200'],
            'name' => ['nullable', 'string', 'max:100'],
            'tracking_number' => ['nullable', 'string', 'max:100']
        ]);

        if (!$validator->passes()) {
            return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
        } else {
            Delivery::create($r->all());
            return response()->json(['status' => 1]);
        }
        
    }
}

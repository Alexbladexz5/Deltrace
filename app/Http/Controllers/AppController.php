<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use App\Models\Delivery;
use App\Models\Barcode;

class AppController extends Controller {
    // Guardar entrega en la db
    public function saveDelivery(Request $r) {
        // Se validan los datos recibidos
        $validator = Validator::make($r->all(), [
            'route_id' => ['required', 'numeric', 'exists:routes,id'],
            'name' => ['nullable', 'string', 'max:100'],
            'address' => ['required', 'string', 'max:200'],
            'tracking_number' => ['nullable', 'string', 'max:100'],
            'latitude' => ['required', 'numeric'],
            'longitude' => ['required', 'numeric'],
            'name_address' => ['nullable', 'string', 'max:100']
        ]);

        if (!$validator->passes()) {
            return response()->json(['status'=> 0, 'error'=>$validator->errors()->toArray()]);
        } else {
            Delivery::create($r->all());
            return response()->json(['status' => 1]);
        }
        
    }

    // Función checkBarcode() para mandar datos en el caso de que exista los dígitos recibidos del Request
    public function checkBarcode(Request $r) {
        //create a sql query that will validate if $r['code'] exists in the db as the field named code
        $barcode = Barcode::where('code', $r->code)->first();
        // if the query returns a value, then the barcode exists in the db
        if ($barcode) {
            // return the data of the barcode
            $result = Barcode::getInfoBarcode($r->input('digits'));
            return response()->json(['status' => 1, 'data' => $barcode]);
        } else {
            // if the query returns null, then the barcode does not exist in the db
            return response()->json(['status' => 2]);
        }
    }
}

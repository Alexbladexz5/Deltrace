<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use Illuminate\Http\Request;
use App\Http\Requests\DeliveryRequest;
use RealRashid\SweetAlert\Facades\Alert;

class DeliveryController extends Controller
{
    // Mostrar la vista index de entregas
    public function index() {
        // $deliveryList = Delivery::all();
        // return view('delivery.all', ['deliveryList'=>$deliveryList]);
        // $deliveries = Delivery::get();
        // return view('layouts.deliveries.index', compact('deliveries'));
        return view('layouts.deliveries.index');
    }

    public function getDeliveries(){
        $result = Delivery::getDeliveries();
        return response()->json($result);
    }

    public function getDeliveriesRoute($idRoute){
        $result = Delivery::getDeliveriesRoute($idRoute);
        return response()->json($result);
    } 

    public function show($id) {
        $data['idRoute'] = $id;
        return view('layouts.deliveries.index', $data);
    }

    public function create() {
        return view('deliveries.form');
    }
    
    public function store(DeliveryRequest $r) {
        Delivery::create($r->all());

        Alert::success('Entrega guardada exitosamente');

        return redirect()->route('deliveries.index');
    }

    public function edit($id) {
        $delivery = Delivery::find($id);
        return view('deliveries.form', array('delivery' => $delivery));
    }

    public function update(Request $r, Delivery $delivery) {
        $delivery->fill($r->all());
        $delivery->save();

        alert()->success('Entrega actualizada correctamente');
        return redirect()->route('deliveries.index');
    }

    public function destroy($id) {
        $delivery = Delivery::find($id);
        $delivery->delete();
        Alert::success('Entrega borrada exitosamente');
        return redirect()->route('deliveries.index');
    }
}

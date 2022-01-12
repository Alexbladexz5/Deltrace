<?php

namespace App\Http\Controllers;

use App\Models\Route;
use Illuminate\Http\Request;
use App\Http\Requests\RouteRequest;
use RealRashid\SweetAlert\Facades\Alert;

class RouteController extends Controller
{
    // Mostrar la vista index de rutas
    public function index() {
        // $routeList = Route::all();
        // return view('route.all', ['routeList'=>$routeList]);
        // $routes = Route::get();
        // return view('layouts.routes.index', compact('routes'));
        return view('layouts.routes.index');
    }

    public function getRoutes(){
        $result = Route::getRoutes();
        return response()->json($result);
    } 

    public function show($id) {
        $p = Route::find($id);
        $data['route'] = $p;
        return view('routes.show', $data);
    }

    public function create() {
        return view('routes.form');
    }
    
    public function store(RouteRequest $r) {
        Route::create($r->all());

        Alert::success('Ruta guardado exitosamente');

        return redirect()->route('routes.index');
    }

    public function edit($id) {
        $route = Route::find($id);
        return view('routes.form', array('route' => $route));
    }

    public function update(Request $r, Route $route) {
        $route->fill($r->all());
        $route->save();

        alert()->success('Ruta actualizado correctamente');
        return redirect()->route('routes.index');
    }

    public function destroy($id) {
        $route = Route::find($id);
        $route->delete();
        Alert::success('Ruta borrada exitosamente');
        return redirect()->route('routes.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Route;
use App\Models\Delivery;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $users = User::getUsers();
        $routes = Route::getRoutes();
        $deliveries = Delivery::getDeliveries();

        $data['users'] = count($users);
        $data['routes'] = count($routes);
        $data['deliveries'] = count($deliveries);
        return view('layouts.home.index', $data);
    }
}

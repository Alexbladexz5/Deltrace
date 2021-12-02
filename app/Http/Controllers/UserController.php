<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    // Mostrar la vista index de usuarios
    public function index() {
        // $userList = User::all();
        // return view('user.all', ['userList'=>$userList]);
        // $users = User::get();
        // return view('layouts.users.index', compact('users'));
        return view('layouts.users.index');
    }

    public function getUsers(){
        $result = User::getUsers();
        return response()->json($result);
    } 

    public function show($id) {
        $p = User::find($id);
        $data['user'] = $p;
        return view('users.show', $data);
    }

    public function create() {
        return view('users.form');
    }
    
    public function store(UserRequest $r) {
        User::create($r->all());

        return redirect()->route('users.index');
    }

    public function edit($id) {
        $user = User::find($id);
        return view('users.form', array('user' => $user));
    }

    public function update($id, Request $r) {
        $p = User::find($id);
        $p->name = $r->name;
        $p->description = $r->description;
        $p->price = $r->price;
        $p->save();
        return redirect()->route('users.index');
    }

    public function destroy($id) {
        $p = User::find($id);
        $p->delete();
        return redirect()->route('users.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
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
        return view('user.show', $data);
    }

    public function create() {
        return view('user.form');
    }

    public function store(Request $r) {
        $p = new User();
        $p->name = $r->name;
        $p->description = $r->description;
        $p->price = $r->price;
        $p->save();
        return redirect()->route('user.index');
    }

    public function edit($id) {
        $user = User::find($id);
        return view('user.form', array('user' => $user));
    }

    public function update($id, Request $r) {
        $p = User::find($id);
        $p->name = $r->name;
        $p->description = $r->description;
        $p->price = $r->price;
        $p->save();
        return redirect()->route('user.index');
    }

    public function destroy($id) {
        $p = User::find($id);
        $p->delete();
        return redirect()->route('user.index');
    }
}

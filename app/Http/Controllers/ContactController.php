<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator; // Temporal para validar
use App\Models\ContactForm;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact-form');
    }
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email:filter', 'max:255'],
            'message' => ['required', 'string']
        ]);

        if ($validation->fails()) {
            return response()->json(['code' => 400, 'msg' => $validation->errors()->first()]);
        }

        $name = $request->name;
        $email = $request->email;
        $msg = $request->message;

        $msg = "
        Name: $name \n
        Email: $email \n
        Message: $msg
        ";

        $receiver = "deltrace@deltrace.com";
        Mail::to($receiver)->send(new ContactMail($msg));
        return response()->json(['code' => 200, 'msg' => 'Muchas gracias por contactar con nosotros, le responderemos pronto.']);
    }
}
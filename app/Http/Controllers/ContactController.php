<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator; // Temporal para validar
use Illuminate\Support\Facades\Mail;
use App\Models\ContactForm;
use App\Mail\ContactMail;

class ContactController extends Controller {
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
        $message = $request->message;

        $mail = "
        Nombre: $name \n
        Correo: $email \n
        Mensaje: $message
        ";

        $receiver = config('mail.from.address');
        Mail::to($receiver)->send(new ContactMail($mail));
        return response()->json(['code' => 200, 'msg' => 'Muchas gracias por contactar con nosotros, le responderemos pronto.']);
    }
}
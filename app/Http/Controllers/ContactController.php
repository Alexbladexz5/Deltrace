<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Models\ContactForm;
use App\Mail\ContactMail;

class ContactController extends Controller {
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:55'],
            'email' => ['required', 'email:filter', 'max:255'],
            'message' => ['required', 'string', 'max:255']
        ]);
        if (!$validator->passes()) {
            return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
        } else {
            $values = [
                'name' => $request->name,
                'email' => $request->email,
                'subject' => $request->message
            ];

            $query = DB::table('contact_forms')->insert($values);
            if ($query) {
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
                return response()->json(['status'=>1]);
            }
        }
    }
}
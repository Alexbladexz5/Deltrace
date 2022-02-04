<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\ContactForm;

class AjaxContactController extends Controller
{
    public function index()
    {
        return view('ajax-contact-form');
    }
    public function store(Request $request)
    {
        $contact = new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->description = $request->description;
        $contact->save();
        return response()->json(['success' => true]);
    }
}

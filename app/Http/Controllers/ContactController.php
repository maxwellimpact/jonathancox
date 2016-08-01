<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Mail;

use App\Contact;
use App\Http\Requests;

class ContactController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contact.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contact = Contact::create($request->all());
        
        // TODO: setup an event if functionality grows
        Mail::queue('contact.email', ['contact' => $contact], function ($message) use($contact) {
            $message->to(config('mail.to'));
            $message->from($contact->email);
            $message->subject('New Contact Submitted');
        });
        
        return ['success' => true];
    }
    
}

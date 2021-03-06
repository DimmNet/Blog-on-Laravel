<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationForm;

class RegistrationController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }
    
    public function create()
    {
        return view('registration.create');
    }
    
    public function store(RegistrationForm $form)
    {
        $form->persist();
        
        session()->flash('message', 'Good! Thank for your registration!');

        return redirect()->home();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
class FormController extends Controller
{

    public function index(){
        return view('zooform');
    }

    public function processForm(Request $request)
{

    $request->validate([
        'name' => 'required',
        'mobile' => 'required',
        'email' => 'required',
        'age' => 'required',
        'gender'=>'required',
        'softSkills'=>'required',
        'favoriteAnimals'=>'required',
    ]);

    // Get data from the request
    $name = $request->input('name');
    $mobile = $request->input('mobile');
    $email = $request->input('email');
    $age = $request->input('age');
    $gender = $request->input('gender');
    $softSkills = $request->input('softSkills');
    $favoriteAnimals = $request->input('favoriteAnimals');

    $formData = [
        'Name' => $name,
        'Mobile' => $mobile,
        'Email' => $email,
        'Age' => $age,
        'Gender' => $gender,
        'Soft Skills' => $softSkills,
        'Favorite Animals' => $favoriteAnimals,
    ];

    /*
    // Send the email with the form data in JSON format
    Mail::raw(json_encode($formData, JSON_PRETTY_PRINT), function ($message) {
        $message->to('example@gmail.com')
            ->subject('Form Data Submission');
    });
    */
    
    // Redirect or return a response
    return redirect('/');
}
}

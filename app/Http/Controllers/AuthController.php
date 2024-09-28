<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function showRegistrationForm(){
        return view("registration");
    }


    public function createRegistrationForm(Request $request){
        
     
        $request->validate([
            
            "fname"=>"nullable",
            "lname"=>"nullable",
            "email"=> "required|unique:users|email",
            "password"=> "required|min:8|confirmed",

        ]);
    $user = User::create([
        "email"=> $request->email,
        "password"=> bcrypt($request->password),
        "fname"=> $request->fname,
        "lname"=> $request->lname

    ]);
    

    return redirect()->route('register')-> with ('success' , 'successfull');

    }



    //login

    public function login(){
        return view('login');
    }
}


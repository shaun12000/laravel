<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function showRegistrationForm()
    {
        return view("registration");
    }


    public function createRegistrationForm(Request $request)
    {


        $request->validate([

            "fname" => "nullable",
            "lname" => "nullable",
            "email" => "required|unique:users|email",
            "password" => "required|min:8|confirmed",

        ]);
        $user = User::create([
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "fname" => $request->fname,
            "lname" => $request->lname

        ]);


        return redirect()->route('register')->with('success', 'successfull');
    }



    //login

    public function login()
    {
        return view('login');
    }

    public function loginattempt(Request $request)
    {
      
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
    

        if (Auth::attempt($credentials)) {
           

            $request->session()->regenerate();
           
            return redirect()->route('dashboard')->with('success', 'successfully');
        }

        return back()->withErrors([
            'email' => 'doesnot match'
        ]);
    }



 public function dashboardshow(){
    return view('admin.dashboard');
 }

}

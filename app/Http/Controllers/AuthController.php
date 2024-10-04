<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
Use App\Mail\OTPverificationMail;


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
            "lname" => $request->lname,
            

        ]);

        $otp = Str::random(6);
        $user->otp = $otp;
        $user->otp_expire = Carbon::now()->addMinutes(10);
        $user->save();

        Mail::to($user->email)->send(new OTPverificationMail($otp));

     


        return redirect()->route('otp')->with('email', $user->email);

    }



public function otp(){
    $email = session('email');
    return view ('verify-email' , compact('email'));
}


public function otp_verify(Request $request){

  
            $request->validate([
                'otp'=>'required',
                'email'=>'required'
            ]);
            $user = User::where('email', $request->email)->first();



            if(!$user){
                return back()->withErrors(['email' => 'user not found']);
            }

            if($request->otp == $user->otp && Carbon::now()->lt($user->otp_expire)){

                $user->email_verified_at = now();
                $user->otp = null;
                $user->otp_expire=null;
                $user->save();
                Auth::login($user);
    return redirect()->route('dashboard')->with('success', 'Email verified successfully! You can now access your dashboard.');


}        return back()->withErrors(['otp' => 'expired']);

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



    public function dashboardshow()
    {
        return view('admin.dashboard');
    }



    public function logout(Request $request)
    {

        
      
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect()->route('login')->with('success','logout');
    }
}

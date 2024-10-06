<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;


class languageController extends Controller
{
    public function index($lang){

        if (in_array($lang, ['en', 'es'])) { // Add other supported languages
            App::setLocale($lang);
            Session::put('applocale', $lang);
        }
        return redirect()->back(); 
}
}
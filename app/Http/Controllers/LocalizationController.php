<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LocalizationController extends Controller
{
    //
    public function setLocale($locale) {
        Session::put('mylocale', $locale);
        App::setlocale($locale);

        return redirect()->back();
    }
}


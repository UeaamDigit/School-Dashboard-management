<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function setLocale($lang)
    {
        if (in_array($lang, ['ar', 'en', 'fr', 'es'])) {
            App::setLocale($lang);
            Session::put('locale', $lang);
        }
        return back();
    }
}

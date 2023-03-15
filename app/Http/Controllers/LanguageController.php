<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function setLanguage($language)
    {
        request()->session()->put("lang", $language);
        return redirect()->back();
    }
}

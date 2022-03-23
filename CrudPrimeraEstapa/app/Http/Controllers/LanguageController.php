<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Redirect;

class LanguageController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function set_language($language){
        session()->put('applocale', $language);
        return Redirect::back();
    }
}
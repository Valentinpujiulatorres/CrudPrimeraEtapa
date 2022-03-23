<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;

class LanguageController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function set_language($language){
        if(array_key_exists($language, config('languages'))){
            session()->put('applocale', $language);
        }
        return back();
    }
}
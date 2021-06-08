<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function ChangeLanguage($id){
        Session::put('country_id', $id);
        return redirect()->route('admin.dashboard');
    }
}

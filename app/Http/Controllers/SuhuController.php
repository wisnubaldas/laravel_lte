<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuhuController extends Controller
{
    public function dashboard()
    {
        return view('suhu.dashboard');
    }
}

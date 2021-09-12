<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KontrolAcController extends Controller
{
    public function dashboard()
    {
        return view('kontrol-ac.dashboard');
    }
}

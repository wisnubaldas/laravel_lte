<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GrafikAirController extends Controller
{
    public function create(Request $request)
    {
        return $request->all();
    }
}

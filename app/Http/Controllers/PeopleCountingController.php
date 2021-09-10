<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PeopleCountingController extends Controller
{
    public function index()
    {
        return view('people-counting.dashboard');
    }
    public function create()
    {
        return view('people-counting.form-alat');
    }
    public function report()
    {
        return view('people-counting.report');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PemkoController extends Controller
{
    public function index()
    {
        return view('pemko.index');
    }
}

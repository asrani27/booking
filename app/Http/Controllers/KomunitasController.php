<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use APp\Komunitas;

class KomunitasController extends Controller
{
    public function index()
    {
        return view('komunitas.index');
    }
}

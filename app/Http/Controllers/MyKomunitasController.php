<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;use 
App\Masterkomunitas;
use Auth;
use Alert;
use App\Anggota;
use App\AnggotaKomunitas;

class MyKomunitasController extends Controller
{
    public function index()
    {
        $anggota_id = Auth::user()->anggota->id;
        $komunitas = Masterkomunitas::where('anggota_id', $anggota_id)->get();
        dd($komunitas);
        return view('member.komunitas',compact('komunitas'));
    }
}

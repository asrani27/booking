<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Peserta;
use Alert;

class PesertaController extends Controller
{
    public function index()
    {
        $data = Peserta::orderBy('created_at','desc')->get();
        return view('peserta.index',compact('data'));
    }

    public function setujui($id)
    {
        $s = Peserta::find($id);
        $s->verifikasi = 1;
        $s->save();
        Alert::success('Success Message', 'Disetujui')->autoclose(3500);
        return back();
    }

    public function tidaksetujui($id)
    {
        $s = Peserta::find($id);
        $s->verifikasi = 2;
        $s->save();
        Alert::success('Success Message', 'Tidak Disetujui')->autoclose(3500);
        return back();
    }
}

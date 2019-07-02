<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Waktu;
use Alert;

class WaktuController extends Controller
{
    public function index()
    {
        $data = Waktu::all();
        return view('waktu.index',compact('data'));
    }

    public function store(Request $req)
    {
        $s = new Waktu;
        $s->nama_hari = $req->nama_hari;
        $s->jam = $req->jam;
        $s->save();

        Alert::success('Success Message', 'Berhasil Disimpan')->autoclose(3500);
        return back();
    }

    public function delete($id)
    {
        $del = Waktu::find($id);
        $del->delete();
        
        Alert::success('Success Message', 'Berhasil Dihapus');
        return back();
    }

    public function update(Request $req)
    {
        $s = Waktu::find($req->iddata);
        $s->nama_hari = $req->nama_hari;
        $s->jam = $req->jam;
        $s->save();

        Alert::success('Success Message', 'Berhasil DiUpdate')->autoclose(3500);
        return back();
    }
}

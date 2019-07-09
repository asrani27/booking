<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Komunitas;
use App\Waktu;
use Alert;

class KomunitasController extends Controller
{
    public function index()
    {
        $komunitas = Komunitas::all();
        $waktu = Waktu::all();
        $data = $komunitas->map(function($item)use ($waktu){
            $item->data = json_decode($item->data);
            $item->data->waktu = $waktu->where('id', $item->data->waktu_pinjam)->first()->jam;
            return $item;
        });
        
        return view('komunitas.index',compact('data'));
    }

    public function delete($id)
    {
        $del = Komunitas::find($id);
        $del->delete();
        
        Alert::success('Success Message', 'Berhasil Dihapus')->autoclose(3500);
        return back();
    }
    public function edit($id)
    {
        $komunitas = Komunitas::where('id',$id)->get();
        $data = $komunitas->map(function($item){
            $item->data = json_decode($item->data);
            return $item;
        })->first();
        //dd($data);
        return view('komunitas.edit',compact('data'));
    }

    public function update(Request $req, $id)
    {
        $verifikasi = (int)$req->verifikasi;
        $publish = $req->publish;
        $komunitas = Komunitas::where('id',$id)->get();
        $data = $komunitas->map(function($item)use ($publish, $verifikasi){
            $item->data = json_decode($item->data);
            $item->data->publish = $publish;
            $item->data->verifikasi = $verifikasi;
            return $item;
        })->first();

        $update = Komunitas::find($id);
        $update->data = json_encode($data->data);
        $update->save();
        
        Alert::success('Success Message', 'Berhasil DiUpdate')->autoclose(3500);
        return redirect('/agendakomunitas');
    }
}

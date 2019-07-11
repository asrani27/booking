<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Masterkomunitas;
use Auth;
use Alert;
use App\Anggota;
use App\AnggotaKomunitas;

class MasterkomunitasController extends Controller
{
    public function index()
    {
        $mk = Masterkomunitas::all();
        $data = $mk->map(function($item){
            $item->jumlah_anggota = count($item->anggota);
            return $item;
        });
        
        $anggota = Anggota::all();
        return view('masterkomunitas.index',compact('data','anggota'));
    }
    
    public function add()
    {
        $anggota = Anggota::all();
        return view('masterkomunitas.add',compact('anggota'));
    }

    public function store(Request $req)
    {
        //dd($req->all());
        $k = new Masterkomunitas;
        $k->nama_komunitas = $req->nama_komunitas;
        $k->deskripsi = $req->deskripsi;
        $k->anggota_id = $req->anggota_id;
        $k->save();

        Alert::success('Success Message', 'Berhasil Disimpan')->autoclose(3500);
        return redirect('/komunitas');
    }

    public function update(Request $req, $id)
    {
        $k = Masterkomunitas::find($id);
        $k->nama_komunitas = $req->nama_komunitas;
        $k->deskripsi = $req->deskripsi;
        $k->anggota_id = $req->anggota_id;
        $k->save();

        Alert::success('Success Message', 'Berhasil DiUpdate')->autoclose(3500);
        return redirect('/komunitas');
    }

    public function edit($id)
    {
        $data = Masterkomunitas::find($id);
        $anggota = Anggota::all();
        return view('masterkomunitas.edit',compact('data','anggota'));
    }

    public function delete($id)
    {
        $del = Masterkomunitas::find($id);
        $del->delete();
        Alert::success('Success Message', 'Berhasil Dihapus')->autoclose(3500);
        return back();
    }

    public function deleteanggota($id_komunitas, $id_anggota)
    {
        //dd($id_komunitas, $id_anggota);
        $del = AnggotaKomunitas::where('id_master_komunitas',$id_komunitas)->where('id_anggota', $id_anggota)->first();
        $del->delete();
        Alert::success('Success Message', 'Anggota Berhasil Dihapus')->autoclose(3500);
        return back();
    }

    public function simpananggota(Request $req)
    {
        $cek = AnggotaKomunitas::where('id_master_komunitas', $req->iddata)->where('id_anggota',$req->anggota_id)->first();
        //dd($cek, $req->iddata, $req->anggota_id);
        if($cek == null)
        {
            $ak = new AnggotaKomunitas;
            $ak->id_master_komunitas = $req->iddata;
            $ak->id_anggota = $req->anggota_id;
            $ak->save();
            Alert::success('Success Message', 'Berhasil Menambahkan Anggota')->autoclose(3500);
            return back();
        }
        else {
            Alert::success('Error Message', 'Anggota Ini Sudah Berada Di komunitas Ini')->autoclose(3500);
            return back();
        }
    }

    public function daftaranggota($id)
    {
        $mk = Masterkomunitas::find($id);
        $anggota = $mk->anggota;
        return view('masterkomunitas.daftaranggota',compact('anggota','mk'));
    }
    
}

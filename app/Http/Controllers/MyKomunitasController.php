<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Masterkomunitas;
use Auth;
use Alert;
use App\Anggota;
use App\User;
use App\Role;
use App\AnggotaKomunitas;

class MyKomunitasController extends Controller
{
    public function index()
    {
        $komunitas = Auth::user()->anggota->masterkomunitas;
        $data = $komunitas->map(function($item){
            $item->jumlah_anggota = count($item->anggota);
            return $item;
        });
        //dd($data);
        return view('member.komunitasku',compact('data'));
    }

    public function add($id)
    {
    	return view('member.addanggota',compact('id'));
    }

    public function store(Request $req)
    { 
    	$cekmail = User::where('email', $req->email)->first();
        $cekuser = User::where('username', $req->username)->first();
        if($cekmail != null OR $cekuser != null)
        { 
            Alert::error('Error Message', 'Email / Username Sudah Ada')->autoclose(4000);
            return back();
        }
        else {
            
            $roleAnggota = Role::where('name','anggota')->first();

            $u = new User;
            $u->name = $req->nama;
            $u->username = $req->username;
            $u->email = $req->email;
            $u->password = bcrypt($req->password);
            $u->save();
            $u->roles()->attach($roleAnggota);
            $user_id = $u->id;

            $a = new Anggota;
            $a->nama = $req->nama;
            $a->alamat = $req->alamat;
            $a->telp = $req->telp;
            $a->email = $req->email;
            $a->users_id = $user_id;
            $a->save();

            $komunitas = Masterkomunitas::find($req->id_komunitas)->first()->id;
            $a->komunitas()->attach($komunitas);

            Alert::success('Success Message', 'Berhasil Menambahkan Anggota komunitas')->autoclose(3000);
            return back();   
        }
    }

    public function daftaranggota($id)
    {
        $mk = Masterkomunitas::find($id);
        $anggota = $mk->anggota;
        return view('member.daftaranggota',compact('anggota','mk'));
    }
    public function deleteanggota($id_komunitas, $id_anggota)
    {
        $anggota = Anggota::find($id_anggota);
        $anggota->komunitas()->detach($id_komunitas);
        Alert::success('Success Message', 'Anggota Berhasil DiKeluarkan Dari Komunitas')->autoclose(3500);
        return back();
    }
}

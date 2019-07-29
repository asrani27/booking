<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Anggota;
use Alert;
use App\User;


class ProfilController extends Controller
{
    public function index()
    {
        if(Auth::user()->hasRole('anggota'))
        {
            $id = Auth::user()->anggota->id;
            $anggota = Anggota::where('id',$id)->get();
            $data = $anggota->map(function($item){
                $item->username = $item->user->username;
                return $item;
            })->first();

            return view('member.profil',compact('data'));
        }
        elseif(Auth::user()->hasRole('pengelola')) {
            $data = Auth::user();
            return view('pengelola.gantipass',compact('data'));
        }
    }

    public function updatePass(Request $req, $id)
    {
        if($req->password == null)
        {
            Alert::success('Success Message', 'Tidak Ada Perubahan')->autoclose(3000);
            return back();
        }
        else {
            $u = User::find($id);
            $u->password = bcrypt($req->password);
            $u->save();
            Alert::success('Success Message', 'Berhasil DiUpdate')->autoclose(3000);
            return back();
        }
    }
    public function update(Request $req, $id)
    {
        $mailawal   = Anggota::find($id)->email;
        $mailtujuan = $req->email;
        if($mailawal == $mailtujuan)
        {
            if($req->password == null)
            {
                $s = Anggota::find($id);
                $s->nama   = $req->nama;
                $s->alamat = $req->alamat;
                $s->email  = $req->email;
                $s->telp   = $req->telp;
                $s->save();

                $u = $s->user;
                $u->name     = $req->nama;
                $u->save();

                Alert::success('Success Message', 'Berhasil DiUpdate')->autoclose(3000);
                return back();
            }
            else {
                $s = Anggota::find($id);
                $s->nama   = $req->nama;
                $s->alamat = $req->alamat;
                $s->email  = $req->email;
                $s->telp   = $req->telp;
                $s->save();
                
                $u = $s->user;
                $u->name     = $req->nama;
                $u->password = bcrypt($req->password);
                $u->save();

                Alert::success('Success Message', 'Berhasil DiUpdate')->autoclose(3000);
                return back();
            }
        }
        else {
            $cekmail = User::where('email', $req->email)->first();
            if($cekmail == null)
            {
                if($req->password == null)
                {
                    $s = Anggota::find($id);
                    $s->nama = $req->nama;
                    $s->alamat = $req->alamat;
                    $s->email = $req->email;
                    $s->telp = $req->telp;
                    $s->save();

                    $u = $s->user;
                    $u->name     = $req->nama;
                    $u->email    = $req->email;
                    $u->save();
                    Alert::success('Success Message', 'Berhasil DiUpdate')->autoclose(3000);
                    return back();
                }
                else {
                    $s = Anggota::find($id);
                    $s->nama   = $req->nama;
                    $s->alamat = $req->alamat;
                    $s->email  = $req->email;
                    $s->telp   = $req->telp;
                    $s->save();
                    
                    $u = $s->user;
                    $u->email    = $req->email;
                    $u->name     = $req->nama;
                    $u->password = bcrypt($req->password);
                    $u->save();
    
                    Alert::success('Success Message', 'Berhasil DiUpdate')->autoclose(3000);
                    return back();
                }
            }
            else {
                Alert::error('Error Message', 'Email Sudah DiGunakan')->autoclose(3000);
                return back();
            }
        }
    }
}

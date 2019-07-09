<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anggota;
use Alert;
use App\User;
use App\Role;

class AnggotaController extends Controller
{
    public function index()
    {
        $data = Anggota::all()->sortByDesc('created_at');;
        return view('anggota.index',compact('data'));
    }

    public function add()
    {
        return view('anggota.add');
    }
    public function edit($id)
    {
        $anggota = Anggota::where('id',$id)->get();
        $data = $anggota->map(function($item){
            $item->username = $item->user->username;
            return $item;
        })->first();
        
        return view('anggota.edit',compact('data'));
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
            Alert::success('Success Message', 'Berhasil DiSimpan')->autoclose(3000);
            return redirect('anggotaplaza');   
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
                return redirect('anggotaplaza');
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
                return redirect('anggotaplaza');
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
                    return redirect('anggotaplaza');
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
                    return redirect('anggotaplaza');
                }
            }
            else {
                Alert::error('Error Message', 'Email Sudah DiGunakan')->autoclose(3000);
                return back();
            }
        }
    }
    public function delete($id)
    {
        $d = Anggota::find($id);
        $u = $d->user;
        $u->delete();
        $d->delete();
        Alert::success('Success Message', 'Berhasil Di hapus')->autoclose(3000);
        return back();   
    }
    public function cekmail(Request $req)
    {
        $d = User::where('email', $req->email)->first();
        if($d == null)
        {
            return response()->json(0);
        }
        else {
            return response()->json(1);
        }
    }

    public function cekuser(Request $req)
    {
        $d = User::where('username', $req->username)->first();
        if($d == null)
        {
            return response()->json(0);
        }
        else {
            return response()->json(1);
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Komunitas;
use Carbon\Carbon;
use App\Waktu;
use App\Pemko;
use App\Peserta;
use App\User;
use App\Role;
use App\Anggota;
use Alert;
use DB;

class FrontController extends Controller
{
    public function booking()
    {
        $waktu = Waktu::all();
        return view('booking',compact('waktu'));
    }

    public function daftar($id)
    {
        $nama = json_decode(Pemko::find($id)->data)->nama_kegiatan;
        
        return view('daftar',compact('id','nama'));
    }

    public function simpanPeserta(Request $req)
    {  
        $p = new Peserta;
        $p->nama = $req->nama;
        $p->telp = $req->telp;
        $p->alamat = $req->alamat;
        $p->email = $req->email;
        $p->pemko_id = $req->pemko_id;
        $p->save();

        Alert::success('Success Message', 'Terima Kasih, Silahkan Cek Email Anda Untuk Informasi Selanjutnya')->persistent('Close');
        return back();
    }

    public function store(Request $req)
    {
        $tanggal = Carbon::parse($req->tanggal_pinjam)->format('Y-m-d');
        $data = json_encode([
            'nama_personal'  => $req->nama_personal,
            'nama_komunitas' => $req->nama_komunitas,
            'telp'           => $req->telp,
            'email'          => $req->email,
            'tanggal_pinjam' => $tanggal,
            'waktu_pinjam'   => $req->waktu_pinjam,
            'tujuan'         => $req->tujuan,
            'jumlah_peserta' => $req->jumlah_peserta,
            'verifikasi'     => 0,
            'publish'        => 'ya'
        ]);

        $s = new Komunitas;
        $s->data = $data;
        $s->save();
        Alert::success('Success Message', 'Formulir Anda Berhasil Di Kirim, Harap Menunggu Konfirmasi')->autoclose(4000);
        return back();
    }

    public function pemko()
    {
        $pemko = Pemko::where('data->publish', 'ya')->get();
        
        $pk = $pemko->map(function($item){
            $item->data = json_decode($item->data);
            $jml_peserta = $item->peserta;
            if($jml_peserta == null)
            {
                $item->data->jml_peserta = 0;
            }
            else {
                $item->data->jml_peserta = count($item->peserta->where('verifikasi',1));
            }
            
            return $item; 
        });
        
        return view('pemko',compact('pk'));
    }

    public function komunitas()
    {
        $komunitas = DB::table('komunitas')->where('data->publish', 'ya')->get();
        $waktu = Waktu::all();
        $mk = $komunitas->map(function($item)use ($waktu){
            $item->data = json_decode($item->data);
            $item->data->waktu = $waktu->where('id', $item->data->waktu_pinjam)->first()->jam;
            return $item;
        });
        return view('komunitas',compact('mk'));
    } 

    public function daftaranggota()
    {
        return view('daftaranggota');
    }

    public function simpanAnggota(Request $req)
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
            Alert::success('Terima Kasih', 'Berhasil Mendaftar Sebagai Anggota Plaza SmartCity')->persistent();
            return back();   
        }
    }
}
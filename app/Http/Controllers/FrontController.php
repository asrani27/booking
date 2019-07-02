<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Komunitas;
use Carbon\Carbon;
use Alert;

class FrontController extends Controller
{
    public function booking()
    {
        return view('booking');
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
}

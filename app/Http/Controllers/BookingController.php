<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Waktu;
use App\Komunitas;
use App\Masterkomunitas;
use Carbon\Carbon;
use Alert;
use Auth;

class BookingController extends Controller
{
    public function pesan()
    {
        // Keterangan :
        // Status :
        // 0 = bukan Penanggung jawab komunitas dan juga bukan anggota komunitas
        // 1 = Penanggung jawab komunitas dan juga anggota komunitas
        // 2 = Bukang Penanggung Jawab Komunitas, Hanya Anggota komunitas
        $cek_ketuakomunitas = Auth::user()->anggota->masterkomunitas->first();
        if ($cek_ketuakomunitas == null)
        {
            $cek_keanggotaan = Auth::user()->anggota->komunitas->first();
            if($cek_keanggotaan == null)
            {
                $status = 0;
            }
            else {
                $status = 2;
            }
        }
        else
        {
            $status = 1;
        }
        $waktu = Waktu::all();
        $komunitas = Auth::user()->anggota->masterkomunitas;
        //dd($status, Auth::user()->anggota->masterkomunitas);
        return view('member.pesantempat',compact('waktu','komunitas','status'));
    }

    public function pesanTempat(Request $req)
    {
        $tanggal = Carbon::createFromFormat('d/m/Y',$req->tanggal_pinjam)->format('Y-m-d');
        $data = json_encode([
            'nama_personal'  => $req->nama_personal,
            'nama_komunitas' => $req->nama_komunitas,
            'telp'           => $req->telp,
            'email'          => $req->email,
            'tanggal_pinjam' => $tanggal,
            'waktu_pinjam'   => $req->waktu_pinjam,
            'tujuan'         => $req->tujuan,
            'jumlah_peserta' => $req->jumlah_peserta,
            'user_id'        => $req->user_id,
            'verifikasi'     => 0,
            'publish'        => 'ya'
        ]);

        $s = new Komunitas;
        $s->data = $data;
        $s->save();
        Alert::success('Success Message', 'Data Anda Berhasil Di Kirim, harap menunggu konfirmasi dari Admin')->persistent();
        return back();
    }

    public function waktu(Request $req)
    {
        $namaHari = Carbon::createFromFormat('d/m/Y', $req->tanggal)->format('D');
        $tanggal = Carbon::createFromFormat('d/m/Y', $req->tanggal)->format('Y-m-d');
        $komunitas = Komunitas::all();
        if($namaHari == 'Mon')
        {
            $waktu = Waktu::where('nama_hari', 'senin - kamis')->get();
        }
        elseif($namaHari == 'Tue')
        {
            $waktu = Waktu::where('nama_hari', 'senin - kamis')->get();
        }
        elseif($namaHari == 'Wed')
        {
            $waktu = Waktu::where('nama_hari', 'senin - kamis')->get();
        }
        elseif($namaHari == 'Thu')
        {
            $waktu = Waktu::where('nama_hari', 'senin - kamis')->get();
        }
        elseif($namaHari == 'Fri')
        {
            $waktu = Waktu::where('nama_hari', 'jumat')->get();
        }
        elseif($namaHari == 'Sat')
        {
            $waktu = Waktu::where('nama_hari', 'sabtu')->get();
        }
        elseif($namaHari == 'Sun')
        {
            $waktu = Waktu::where('nama_hari', 'minggu')->get();
        }

        $cekBooking = $komunitas->map(function ($item)use($waktu){
            $item->data = json_decode($item->data);
            return $item->data;
        })->where('tanggal_pinjam', $tanggal);

        $idwaktu = $cekBooking->map(function($item){
            return $item->waktu_pinjam;
        });

        $waktu2 = $waktu->map(function($item){
            return $item->id;
        });
        $namaKomunitas = $cekBooking->map(function($item){
            return $item;
        });

        $tersedia = $waktu2->diff($idwaktu);
        $waktuTersedia = $waktu->whereIn('id',$tersedia);
        if(count($tersedia) == 0)
        {
            $status = 'tidak tersedia';
        }
        else {
            $status = 'tersedia';
        }   
        //dd($namaKomunitas);
        return response()->json([$waktuTersedia, $status, $namaKomunitas]);
    }
}

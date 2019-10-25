<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Peserta;
use Carbon\Carbon;
use App\Pemko;
use App\Anggota;
use PDF;

class LaporanController extends Controller
{
    public function peserta($id)
    {
        $pemko = Pemko::where('id', $id)->get();
        $kegiatan = $pemko->map(function($item){
            $item->data = json_decode($item->data);
            $jml_peserta = $item->peserta;
            if($jml_peserta == null)
            {
                $item->data->jml_peserta = 0;
                $item->data->jml_hadir = 0;
            }
            else {
                $item->data->jml_peserta = count($item->peserta->where('verifikasi',1));
                $item->data->jml_hadir = count($item->peserta->where('hadir',1));
            }
            
            return $item;
        });
        $data2 = $kegiatan->first()->peserta->where('verifikasi',1);
        $data = $data2->map(function($item, $key){
            $item->day = Carbon::parse($item->created_at)->format('D');
            if($item->day == 'Mon')
            {
                $item->hari = 'Senin';
            }
            elseif($item->day == 'Tue')
            {
                $item->hari = 'Selasa';
            }
            elseif($item->day == 'Wed')
            {
                $item->hari = 'Rabu';
            }
            elseif($item->day == 'Thu')
            {
                $item->hari = 'Kamis';
            }
            elseif($item->day == 'Fri')
            {
                $item->hari = 'Jumat';
            }
            elseif($item->day == 'Sat')
            {
                $item->hari = 'Sabtu';
            }
            elseif($item->day == 'Sun')
            {
                $item->hari = 'Minggu';
            }
            return $item;
        })->sortBy('created_at');
        //dd($data);
        $pdf = PDF::loadView('laporan.peserta', compact('data','kegiatan'));
  
        return $pdf->download('peserta.pdf');
    }

    public function anggota()
    {
        $data = Anggota::all();
        $pdf = PDF::loadView('laporan.anggota', compact('data'))->setPaper('letter');
        return $pdf->download('anggotaplaza.pdf');
    }

}

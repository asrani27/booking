<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Peserta;
use App\Pemko;
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
        //dd($kegiatan->first()->data->nama_kegiatan);
        $data = $kegiatan->first()->peserta;
        //dd($data);
        $pdf = PDF::loadView('laporan.peserta', compact('data','kegiatan'));
  
        return $pdf->download('peserta.pdf');
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pemko;
use Alert;
use DB;

class PemkoController extends Controller
{
    public function index()
    {
        $pemko = Pemko::all();
        $data = $pemko->map(function($item){
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
        
        return view('pemko.index',compact('data'));
    }

    public function add()
    {
        return view('pemko.add');
    }

    public function store(Request $req)
    {
        //dd($req->all());
        if($req->gratis == null)
        {
            $data = json_encode([
                'nama_kegiatan'    => $req->nama_kegiatan,
                'pembicara'        => $req->pembicara,
                'topik_kegiatan'   => $req->topik_kegiatan,
                'kuota_peserta'    => $req->kuota_peserta,
                'tanggal_kegiatan' => $req->tanggal_kegiatan,
                'biaya'            => $req->biaya,
                'file'             => $req->file,
                'publish'          => $req->publish
            ]);
            
            $s = new Pemko;
            $s->data = $data;
            $s->save();
        }
        else 
        {
            $data = json_encode([
                'nama_kegiatan'    => $req->nama_kegiatan,
                'pembicara'        => $req->pembicara,
                'topik_kegiatan'   => $req->topik_kegiatan,
                'kuota_peserta'    => $req->kuota_peserta,
                'tanggal_kegiatan' => $req->tanggal_kegiatan,
                'biaya'            => 'Gratis',
                'file'             => $req->file,
                'publish'          => $req->publish
            ]);

            $s = new Pemko;
            $s->data = $data;
            $s->save();
        }
        Alert::success('Success Message', 'Berhasil DiSimpan')->autoclose(3500);
        return redirect('/agendapemko');
    }

    public function delete($id)
    {
        $del = Pemko::find($id);
        $del->delete();
        Alert::success('Success Message', 'Berhasil Dihapus')->autoclose(3500);
        return back();
    }

    public function edit($id)
    {
        $pemko = Pemko::where('id',$id)->get();
        $data = $pemko->map(function($item){
            $item->data = json_decode($item->data);
            return $item;
        })->first();

        return view('pemko.edit',compact('data'));
    }
    public function update(Request $req, $id)
    {
        
        $filename = json_decode(Pemko::find($id)->data)->file;
        if($req->gratis == null)
        {
            if($req->file == null)
            {
                $data = json_encode([
                    'nama_kegiatan'    => $req->nama_kegiatan,
                    'pembicara'        => $req->pembicara,
                    'topik_kegiatan'   => $req->topik_kegiatan,
                    'kuota_peserta'    => $req->kuota_peserta,
                    'tanggal_kegiatan' => $req->tanggal_kegiatan,
                    'biaya'            => $req->biaya,
                    'file'             => $filename,
                    'publish'          => $req->publish
                ]);
                
                $s = Pemko::find($id);
                $s->data = $data;
                $s->save();
            }
            else {   
                $data = json_encode([
                    'nama_kegiatan'    => $req->nama_kegiatan,
                    'pembicara'        => $req->pembicara,
                    'topik_kegiatan'   => $req->topik_kegiatan,
                    'kuota_peserta'    => $req->kuota_peserta,
                    'tanggal_kegiatan' => $req->tanggal_kegiatan,
                    'biaya'            => $req->biaya,
                    'file'             => $req->file,
                    'publish'          => $req->publish
                ]);
                
                $s = Pemko::find($id);
                $s->data = $data;
                $s->save();
            }
        }
        else 
        {
            if($req->file == null)
            {
                $data = json_encode([
                    'nama_kegiatan'    => $req->nama_kegiatan,
                    'pembicara'        => $req->pembicara,
                    'topik_kegiatan'   => $req->topik_kegiatan,
                    'kuota_peserta'    => $req->kuota_peserta,
                    'tanggal_kegiatan' => $req->tanggal_kegiatan,
                    'biaya'            => 'Gratis',
                    'file'             => $filename,
                    'publish'          => $req->publish
                ]);
    
                $s = Pemko::find($id);
                $s->data = $data;
                $s->save();
            }
            else {
                $data = json_encode([
                    'nama_kegiatan'    => $req->nama_kegiatan,
                    'pembicara'        => $req->pembicara,
                    'topik_kegiatan'   => $req->topik_kegiatan,
                    'kuota_peserta'    => $req->kuota_peserta,
                    'tanggal_kegiatan' => $req->tanggal_kegiatan,
                    'biaya'            => 'Gratis',
                    'file'             => $req->file,
                    'publish'          => $req->publish
                ]);
    
                $s = Pemko::find($id);
                $s->data = $data;
                $s->save();
            }
        }
        Alert::success('Success Message', 'Berhasil DiUpdate')->autoclose(3500);
        return redirect('/agendapemko');
    }

    public function peserta($id)
    {
        $p = Pemko::find($id);
        $peserta = $p->peserta->where('verifikasi',1);
        return view ('pemko.daftarpeserta',compact('peserta'));
    }
}

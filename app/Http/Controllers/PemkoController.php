<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pemko;
use App\Peserta;
use Alert;
use DB;

class PemkoController extends Controller
{
    public function index()
    {
        $pemko = Pemko::all();
        $data = $pemko->map(function ($item) {
            $item->data = json_decode($item->data);
            $jml_peserta = $item->peserta;
            if ($jml_peserta == null) {
                $item->data->jml_peserta = 0;
                $item->data->jml_hadir = 0;
            } else {
                $item->data->jml_peserta = count($item->peserta->where('verifikasi', 1));
                $item->data->jml_hadir = count($item->peserta->where('hadir', 1));
            }

            return $item;
        })->sortByDesc('id');

        return view('pemko.index', compact('data'));
    }

    public function add()
    {
        return view('pemko.add');
    }

    public function store(Request $req)
    {
        $req->validate([
            'file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($req->hasFile('file')) {
            $filename = $req->file->getClientOriginalName();
            $filename = date('d-m-Y-') . rand(1, 9999) . $filename;
            $req->file->storeAs('/public', $filename);
        }
        if ($req->gratis == null) {
            $data = json_encode([
                'nama_kegiatan'    => $req->nama_kegiatan,
                'pembicara'        => $req->pembicara,
                'topik_kegiatan'   => $req->topik_kegiatan,
                'kuota_peserta'    => $req->kuota_peserta,
                'tanggal_kegiatan' => $req->tanggal_kegiatan,
                'waktu'            => $req->waktu,
                'biaya'            => $req->biaya,
                'file'             => $filename,
                'publish'          => $req->publish
            ]);

            $s = new Pemko;
            $s->data = $data;
            $s->save();
        } else {
            $data = json_encode([
                'nama_kegiatan'    => $req->nama_kegiatan,
                'pembicara'        => $req->pembicara,
                'topik_kegiatan'   => $req->topik_kegiatan,
                'kuota_peserta'    => $req->kuota_peserta,
                'tanggal_kegiatan' => $req->tanggal_kegiatan,
                'waktu'            => $req->waktu,
                'biaya'            => 'Gratis',
                'file'             => $filename,
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
        $pemko = Pemko::where('id', $id)->whereJsonLength('data->waktu', '>', 0)->first();
        if ($pemko == null) {
            $pemko = Pemko::where('id', $id)->get();
            $data = $pemko->map(function ($item) {
                $item->data = json_decode($item->data);
                $item->data->waktu = '00:00';
                return $item;
            })->first();
            return view('pemko.edit', compact('data'));
        } else {
            $p = Pemko::where('id', $id)->get();
            $data = $p->map(function ($item) {
                $item->data = json_decode($item->data);
                return $item;
            })->first();
            return view('pemko.edit', compact('data'));
        }
    }
    public function update(Request $req, $id)
    {
        
        $req->validate([
            'file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        $filename = json_decode(Pemko::find($id)->data)->file;
        if ($req->gratis == null) {
            if ($req->file == null) {
                $data = json_encode([
                    'nama_kegiatan'    => $req->nama_kegiatan,
                    'pembicara'        => $req->pembicara,
                    'topik_kegiatan'   => $req->topik_kegiatan,
                    'kuota_peserta'    => $req->kuota_peserta,
                    'tanggal_kegiatan' => $req->tanggal_kegiatan,
                    'waktu'            => $req->waktu,
                    'biaya'            => $req->biaya,
                    'file'             => $filename,
                    'publish'          => $req->publish
                ]);

                $s = Pemko::find($id);
                $s->data = $data;
                $s->save();
            } else {

                $namafile = $req->file->getClientOriginalName();
                $namafile = date('d-m-Y-') . rand(1, 9999) . $namafile;
                $req->file->storeAs('/public', $namafile);
                $data = json_encode([
                    'nama_kegiatan'    => $req->nama_kegiatan,
                    'pembicara'        => $req->pembicara,
                    'topik_kegiatan'   => $req->topik_kegiatan,
                    'kuota_peserta'    => $req->kuota_peserta,
                    'tanggal_kegiatan' => $req->tanggal_kegiatan,
                    'waktu'            => $req->waktu,
                    'biaya'            => $req->biaya,
                    'file'             => $namafile,
                    'publish'          => $req->publish
                ]);

                $s = Pemko::find($id);
                $s->data = $data;
                $s->save();
            }
        } else {
            if ($req->file == null) {
                $data = json_encode([
                    'nama_kegiatan'    => $req->nama_kegiatan,
                    'pembicara'        => $req->pembicara,
                    'topik_kegiatan'   => $req->topik_kegiatan,
                    'kuota_peserta'    => $req->kuota_peserta,
                    'tanggal_kegiatan' => $req->tanggal_kegiatan,
                    'waktu'            => $req->waktu,
                    'biaya'            => 'Gratis',
                    'file'             => $filename,
                    'publish'          => $req->publish
                ]);

                $s = Pemko::find($id);
                $s->data = $data;
                $s->save();
            } else {

                $namafile = $req->file->getClientOriginalName();
                $namafile = date('d-m-Y-') . rand(1, 9999) . $namafile;
                $req->file->storeAs('/public', $namafile);
                $data = json_encode([
                    'nama_kegiatan'    => $req->nama_kegiatan,
                    'pembicara'        => $req->pembicara,
                    'topik_kegiatan'   => $req->topik_kegiatan,
                    'kuota_peserta'    => $req->kuota_peserta,
                    'tanggal_kegiatan' => $req->tanggal_kegiatan,
                    'waktu'            => $req->waktu,
                    'biaya'            => 'Gratis',
                    'file'             => $namafile,
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
        $peserta = $p->peserta->where('verifikasi', 1);
        return view('pemko.daftarpeserta', compact('peserta'));
    }

    public function batalpeserta($id)
    {
        $s = Peserta::find($id);
        $s->verifikasi = 0;
        $s->hadir = 0;
        $s->save();
        Alert::success('Success Message', 'Peserta Di Cancel')->autoclose(3500);
        return back();
    }
}

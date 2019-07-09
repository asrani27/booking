<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Anggota;
use App\Masterkomunitas;
use App\Komunitas;
use App\Pemko;
use App\Waktu;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->hasRole('admin'))
        {
            $anggota = count(Anggota::all());
            $komunitas = count(Masterkomunitas::all());
            $agendakomunitas = count(Komunitas::all());
            $agendapemko = count(Pemko::all());
            return view('home',compact('anggota','komunitas','agendapemko','agendakomunitas'));
        }
        elseif(Auth::user()->hasRole('anggota')) {
            
            $user_id = Auth::user()->id;
            $komunitas = Komunitas::all();
            $waktu = Waktu::all();
            $data = $komunitas->map(function($item)use($waktu){
                $item->data = json_decode($item->data);
                $item->data->waktu = $waktu->where('id', $item->data->waktu_pinjam)->first()->jam;
               return $item->data;
            })->where('user_id', $user_id);
            
            return view('home_anggota',compact('data'));
        }
    }
}

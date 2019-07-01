<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Komunitas;

class KomunitasController extends Controller
{
    public function index()
    {
        $komunitas = Komunitas::all();
        $data = $komunitas->map(function($item){
            $item->data = json_decode($item->data);
            return $item;
        });
        //dd($data);
        return view('komunitas.index',compact('data'));
    }
}

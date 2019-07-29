<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class MailController extends Controller
{
    public function kirim(Request $request)
    {
        //dd($request->all());
        try{
            Mail::send('email', ['nama' => 'Gayatri', 'pesan' => '<a href="#">booking.test/agenda/validasi/3</a>'], function ($message) use ($request)
            {
                $message->subject('Validasi Peserta Kegiatan Plaza SmartCity');
                $message->from('plaza.bjm@gmail.com', 'Plaza BJM');
                $message->to($request->email);
            });
            return back();
        }
        catch (Exception $e){
            return response (['status' => false,'errors' => $e->getMessage()]);
        }
    }

    public function index()
    {
        return view('emails.mail');
    }
}

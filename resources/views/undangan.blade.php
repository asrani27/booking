
<head>
    <style type="text/css">
    .auto-style3 {
        font-family: Arial, Helvetica, sans-serif;
        font-size: small;
    }
    .auto-style4 {
        font-family: Arial, Helvetica, sans-serif;
        font-size: medium;
    }
    .auto-style1 {
        font-family: Arial, Helvetica, sans-serif;
        font-size: x-small;
    }
    .auto-style5 {
        text-align: center;
    }
    .auto-style6 {
        text-align: left;
    }
    .auto-style7 {
        text-align: center;
        border-bottom-style: solid;
        border-bottom-width: 1px;
    }
    .auto-style8 {
        border-bottom: 2px solid #000000;
    }
    .auto-style9 {
        text-decoration: underline;
    }
    .auto-styleTTD {
        text-align: center; 
        background-image:url('vali/ttd.jpg');
        height: 100%;

        background-position: center;
        background-repeat: no-repeat;
        background-size: 100px;
    }
    </style>
    </head>
    
    <table align="center" style="width: 80%" class="auto-style8" cellpadding="4" cellspacing="0">
        <tr>
            <td class="auto-style7" style="width: 72px">
            <img alt="" height="72" src="https://upload.wikimedia.org/wikipedia/commons/c/cd/Lambang_Kota_Banjarmasin.gif" width="57"></td>
            <td class="auto-style7"><span class="auto-style3"><strong>PEMERINTAH 
            KOTA BANJARMASIN</strong></span><strong><br class="auto-style3">
            </strong><span class="auto-style4"><strong>DINAS KOMUNIKASI, INFORMATIKA 
            DAN STATISTIK</strong></span><br class="auto-style1">
            <span class="auto-style1">Jalan R. E. Martadinata No. 1 Kode Pos 70111 
            Gedung Blok B Lt. Dasar - Banjarmasin</span><br class="auto-style1">
            <span class="auto-style1">Website : diskominfotik.banjarmasinkota.go.id, 
            Email : <a href="mailto:Diskominfotik.bjm@gmail.com">
            Diskominfotik.bjm@gmail.com</a></span></td>
        </tr>
    </table>
    <table  align="center" style="width: 80%">
        <tr>
            <td style="width: 63px">&nbsp;</td>
            <td style="width: 9px">&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;Banjarmasin, {{\Carbon\Carbon::today()->format('d M Y')}}</td>
        </tr>
        <tr>
            <td style="width: 63px">Nomor&nbsp;&nbsp;&nbsp; </td>
            <td style="width: 9px">:</td>
            <td>870/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; / DISKOMINFOTIK/2019</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td style="width: 63px">Lampiran </td>
            <td style="width: 9px">:</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td style="width: 63px">Perihal&nbsp;&nbsp;&nbsp;&nbsp; </td>
            <td style="width: 9px">:</td>
            <td><em>UNDANGAN</em></td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td style="width: 63px">&nbsp;</td>
            <td style="width: 9px">&nbsp;</td>
            <td>&nbsp;</td>
            <td>Kepada Yth.<br>
                {{$peserta->nama}}
            <br><br>Di -<br>&nbsp;&nbsp;&nbsp;
    <strong>Tempat<br><br></strong></td>
        </tr>
    </table>
    
    <table align="center" style="width: 80%">
        <tr>
            <td colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
            Bersama ini Bapak/Ibu/Saudara(i) diundang untuk berhadir pada kegiatan 
            yang akan dilaksanakan pada :<br></td>
        </tr>
        <tr>
            <td style="width: 51px">&nbsp;</td>
            <td><strong><em>Hari</em></strong></td>
            <td><strong><em>:</em></strong></td>
            <td><strong><em>{{$keg->data->hari}}</em></strong></td>
        </tr>
        <tr>
            <td style="width: 51px">&nbsp;</td>
            <td><strong><em>Tanggal</em></strong></td>
            <td><strong><em>:</em></strong></td>
            <td><strong><em>{{$keg->data->tanggal_kegiatan}}</em></strong></td>
        </tr>
        <tr>
            <td style="width: 51px">&nbsp;</td>
            <td><strong><em>Waktu</em></strong></td>
            <td><strong><em>:</em></strong></td>
            <td><strong><em>{{$keg->data->waktu}}</em></strong></td>
        </tr>
        <tr>
            <td style="width: 51px">&nbsp;</td>
            <td><strong><em>Tempat</em></strong></td>
            <td><strong><em>:</em></strong></td>
            <td><strong><em>Banjarmasin Plaza Smart City Menara Pandang Lantai III</em></strong></td>
        </tr>
        <tr>
            <td style="width: 51px">&nbsp;</td>
            <td><strong><em>Acara</em></strong></td>
            <td><strong><em>:</em></strong></td>
            <td><strong><em>{{$keg->data->nama_kegiatan}}</em></strong></td>
        </tr>
        <tr>
            <td style="width: 51px">&nbsp;</td>
            <td><strong><em>Narasumber</em></strong></td>
            <td><strong><em>:</em></strong></td>
            <td><strong><em>{{$keg->data->pembicara}}</em></strong></td>
        </tr>
        <tr>
            <td style="width: 51px">&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
            Demikian undangan ini disampaikan, atas perhatian dan kehadirannya 
            diucapkan terima kasih. Mohon konfirmasi kehadiran satu hari sebelum 
            acara kegiatan.<br><br></td>
        </tr>
    </table>
    
    <table align="center" style="width: 80%">
        <tr>
            <td style="width: 80px">&nbsp;</td>
            <td style="width: 71px">&nbsp;</td>
            <td style="width: 139px">&nbsp;</td>
            <td class="auto-style5">
                <table align=center>
                    <tr>
                    <td>
                A.n. Plt. Kepala Dinas,<br>Kepala Bidang Layanan 
            E-Government,<br>
            <img src="http://plaza.banjarmasinkota.go.id/vali/ttd.jpg" width="70px"  height="50px">
            <br><span class="auto-style9">AHMAD SYARWANI,SE</span><br>
            NIP. 19670608 199302 1 002<td>
                        </tr>
                </table>
        </td>
        </tr>
    </table>
    
    
    <table align="center" style="width: 80%">
        <tr>
            <td><strong><em>Catatan :<br>-Semua peserta rapat harap membawa air minum<br>
            di dalam Timbler (botol) masing-masing</em><br>
            - Free Snack Box (Gratis Kue Kotak)</strong></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
    </table>
    
    
    
 
    
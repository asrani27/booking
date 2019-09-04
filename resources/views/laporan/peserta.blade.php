<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="en-us" http-equiv="Content-Language" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>TANDA TERIMA UNDANGAN</title>
<style type="text/css">
.auto-style1 {
	font-family: Arial, Helvetica, sans-serif;
	text-align: center;
	font-size: small;
}
.auto-style2 {
	font-family: Arial, Helvetica, sans-serif;
}
.auto-style3 {
	font-size: x-small;
}
.auto-style5 {
	font-size: x-small;
	font-family: Arial, Helvetica, sans-serif;
	text-align: center;
	border-style: solid;
	border-width: 1px;
}
.auto-style55 {
	font-size: xx-small;
	font-family: Arial, Helvetica, sans-serif;
	text-align: center;
	border-style: solid;
	border-width: 1px;
}
.auto-style6 {
	border-style: solid;
	border-width: 1px;
}
.auto-style7 {
	border-width: 0px;
}
.auto-style8 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: x-small;
	border-style: solid;
	border-width: 1px;
}

</style>
</head>

<body>

<p class="auto-style1"><strong>TANDA TERIMA UNDANGAN&nbsp;&nbsp; </strong></p>
<p class="auto-style2"><strong><span class="auto-style3">ACARA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
:&nbsp;&nbsp;{{$kegiatan->first()->data->nama_kegiatan}}</span><br class="auto-style3" />
<span class="auto-style3">HARI / TGL :&nbsp;&nbsp;{{$kegiatan->first()->data->tanggal_kegiatan}}</span></strong></p>
<table cellpadding="2" cellspacing="0" class="auto-style7" style="width: 100%">
	<tr>
		<td class="auto-style5" style="height: 30px; width: 30px"><strong>NO</strong></td>
		<td class="auto-style5" style="height: 30px; width: 180px"><strong>NAMA</strong></td>
		<td class="auto-style5" style="height: 30px; width: 260px"><strong>
		ALAMAT/KOMUNITAS</strong></td>
		<td class="auto-style5" style="height: 30px"><strong>ACC UNDANGAN 
		DITERIMA</strong></td>
	</tr>
	<tr>
		<td class="auto-style55" style="height: 10px; width: 30px"><strong>1</strong></td>
		<td class="auto-style55"><strong>2</strong></td>
		<td class="auto-style55"><strong>3</strong></td>
		<td class="auto-style55"><strong>4</strong></td>
    </tr>
    <?php
    $no =1;
    ?>
    @foreach($data as $dt)
	<tr>
        <td class="auto-style8" style="text-align: center">{{$no++}}</td>
        <td class="auto-style8" style="width: 210px">{{$dt->nama}}</td>
		<td class="auto-style8">{{$dt->alamat}}</td>
		<td class="auto-style6"></td>
	</tr>
    @endforeach
</table>

</body>

</html>

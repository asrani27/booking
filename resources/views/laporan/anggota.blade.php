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
	border: 1px solid black;
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

<p class="auto-style1"><strong>DAFTAR ANGGOTA PLAZA SMART CITY KOTA BANJARMASIN </strong></p>

<table cellpadding="2" cellspacing="0" class="auto-style7" style="width: 90%">
	<tr>
		<td class="auto-style5" style="height: 30px; width: 20px"><strong>NO</strong></td>
		<td class="auto-style5" style="height: 30px; width: 100px"><strong>NAMA</strong></td>
		<td class="auto-style5" style="height: 30px; width: 100px"><strong>EMAIL</strong></td>
		<td class="auto-style5" style="height: 30px; width: 180px"><strong>
		ALAMAT</strong></td>
		<td class="auto-style5" style="height: 30px; width: 120px"><strong>
		TELP</strong></td>
	</tr>
	<tr>
		<td class="auto-style5" style="height: 10px; width: 20px"><strong>1</strong></td>
		<td class="auto-style5"><strong>2</strong></td>
		<td class="auto-style5"><strong>3</strong></td>
		<td class="auto-style5"><strong>4</strong></td>
		<td class="auto-style5" style="border: 1px solid black"><strong>5</strong></td>
    </tr>
    <?php
    $no =1;
    ?>
    @foreach($data as $dt)
	<tr>
        <td class="auto-style8" style="text-align: center">{{$no++}}</td>
        <td class="auto-style8" style="width: 100px">{{$dt->nama}}</td>
		<td class="auto-style8">{{$dt->email}}</td>
		<td class="auto-style8" style="width: 180px">{{$dt->alamat}}</td>
		<td class="auto-style8" style="text-align: center;width: 70px">{{$dt->telp}}</td>

	</tr>
    @endforeach
</table>

</body>

</html>

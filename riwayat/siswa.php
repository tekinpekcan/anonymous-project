<?php


// Connect to server and select databse.
$dbconn3 = pg_connect("host=192.168.0.100 port=5432 dbname=sekolah user=postgres password=51pB4b4m1");
//connect to a database named "mary" on the host "sheep" with a username and password

// username and password sent from form
$myid=$_POST['myid'];
$mypassword=md5($_POST['mypassword']);

$sql="SELECT * FROM siswa WHERE no_induk= '$myid' and password= '$mypassword'";
$result=pg_query($sql);

// Mysql_num_row is counting table row
$count=pg_num_rows($result);

// If result matched $myid and $mypassword, table row must be 1 row

if($count==1){ 
$i = 1;
	$sql = "select (select nama_person from siswa where no_induk = '$myid') as nama, tgl,'5' as status from (select tgl from 
	(select generate_series(tanggal_pel_baru, CURRENT_DATE, interval'1 day')::date as tgl from config 
	EXCEPT 
	(select tanggal_absensi from absen a inner join siswa c on a.no_induk = c.no_induk inner join config b on a.tanggal_absensi >= b.tanggal_pel_baru and a.tanggal_absensi <= CURRENT_DATE where a.no_induk = '957')) a 
	EXCEPT
	(select tanggal_hari_libur from hari_libur)) a where EXTRACT(dow from a.tgl::timestamp) != 0
	UNION
	select b.nama_person,tanggal_absensi, status_absen as status from absen a inner join siswa b on a.no_induk = b.no_induk WHERE status_absen != '1' and a.no_induk = '$myid'";
	
	$query = pg_query($sql);
	while($row = pg_fetch_array($query)){
?>
<html>
	<head>
		<br>
		<h1 align="center">DATA RIWAYAT SISWA SMA N 1 CIREBON</h1>
	</head>
<body>
<table>
	<tr>
		<td><h3><b>NAMA</b></h3></td>
        <td><h3><b>:</b></h3></td>
		<td><?=$row['nama_person']?></td>
	</tr>	   
    <tr>
		<td><h3><b>NIS</b></h3></td>
        <td><h3><b>:</b></h3></td>
		<td><?=$row['no_induk']?></td>
	</tr>
	<!--
    <tr>
		<td><h3><b>UANG SPP</b></h3></td>
        <td><h3><b>:</b></h3></td>
		<td><?=$spp?></td>
	</tr>
    <tr>
		<td><h3><b>UANG GEDUNG</b></h3></td>
        <td><h3><b>:</b></h3></td>
		<td><?=$gedung?></td>
	</tr>
    <tr>
		<td><h3><b>UANG TAHUNAN</b></h3></td>
        <td><h3><b>:</b></h3></td>
		<td><?=$thn?></td>
	</tr>
</table>
<h3><b><u>AKADEMIK</u></b></h3>
<table border="1" > 
	<tr bgcolor="#CCCCCC">
		<th>MATA PELAJARAN</th>
		<th>NILAI</th>
        <th>KKM</th>
	</tr>
	<tr align="center" > 
		<td><?php echo $pelajaran;?></td>
		<td><?php echo $nilai;?></td>
        <td><?php echo $kkm;?></td>
	</tr>
	-->
</table>
<h3><b><u>ABSENSI</u></b></h3>
<table border="1" > 
	<tr bgcolor="#CCCCCC">
		<th>TANGGAL</th>
		<th>KETERANGAN</th>
	</tr>    
	<tr align="center" > 
		<td><?php echo $tglabsen;?></td>
		<td><?php echo $status;?></td>
	</tr>
</table>
<h3><b><u>KEUANGAN</u></b></h3>
<h4>@ SPP LUNAS</h4>
<table border="1" > 
	<tr bgcolor="#CCCCCC">
		<th>BULAN</th>
		<th>TANGGAL</th>
	</tr>    
	<tr align="center" > 
		<td><?php echo $bulanspp;?></td>
		<td><?php echo $tglspp;?></td>
	</tr>
</table>
<h4>@ HISTORY PEMBAYARAN UANG GEDUNG DAN TAHUNAN</h4>
<table border="1" > 
	<tr bgcolor="#CCCCCC">
		<th>NO</th>
        <th>RUPIAH</th>
		<th>TANGGAL</th>
	</tr>    
	<tr align="center" > 
		<td><?php echo $no;?></td>
        <td><?php echo $rupiah;?></td>
		<td><?php echo $tglbayar;?></td>
	</tr>
    <tr >
	<th bgcolor="#CCCCCC">SISA</th>
    <th><?php echo $sisaangsur;?></th>
    </tr>
</table>
</body>
</html>
<?php
}}
?>
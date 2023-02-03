 <?php
	session_start();

	require_once 'Admin.php';

	$admin = new Admin;

	if(!isset($_SESSION['id'])){
		header('Location: ../../');
	}

	$id = $_SESSION['id'];

	$data = $admin->getDataPetugas($id);

	$row = mysqli_fetch_assoc($data);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Selamat Datang</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="admin.css">
</head>
<body>
	<center>
		<div class="header" id="topmenu">
			<ul style="display:flex; list-style:none;" align="center">
				<li><b>Aplikasi Pembayaran SPP</b></li>
				<li><a href="?p=home">Home</a></li>
				<li><a href="?p=siswa">Data Siswa</a></li>
				<li><a href="?p=petugas">Data Petugas</a></li>
				<li><a href="?p=spp">Data SPP</a></li>
				<li><a href="?p=laporan">Laporan Pembayaran</a></li>
				<li><a href="?p=tab" onclick="return confirm('Buat data tahun ajaran baru?')">Tahun Ajaran Baru</a></li>
				<li><a href="?p=logout" onclick="return confirm('Yakin ingin logout?')">Logout</a></li>
			</ul>
		</div>
		<br>
	<div id="kotak2" >
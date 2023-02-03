<?php 
	session_start();
	require_once 'Petugas.php';

	$petugas = new Petugas();

	if(!isset($_SESSION['id'])){
		header('Location: ../');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Petugas</title>
	<link rel="stylesheet" type="text/css" href="petugas.css">
	<style type="text/css">
		li {
			margin-right: 10px;
		}
	</style>
</head>
<body>
	<center>
	<div class="header" id="topmenu">
		<ul style="display:flex; list-style:none;">
			<li><b>Aplikasi Pembayaran SPP</b></li>
			<li><a href="?p=home">Home</a></li>
			<li><a href="?p=transaksi">Transaksi</a></li>
			<li><a href="?p=logout">Logout</a></li>
		</ul>
	</div>
	<br><br>
	<div id="kotak2">


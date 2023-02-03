<?php 
session_start();
require_once 'Petugas.php';
if (!isset($_SESSION['id'])) {
	header('Location: ../');
}

$petugas = new Petugas;

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Cetak Transaksi Per Bulan</title>
</head>
<body>
	<h1 align="center">Kwitansi</h1>
	<hr/>

	<?php 
	$siswa = $petugas->getDataSiswaByNIS($_GET['nis']);

	$dt_s = mysqli_fetch_assoc($siswa);
	?>

	<table>
		<tr>
			<td>Nama Siswa</td>
			<td>:</td>
			<td><?= $dt_s['nama_lengkap']; ?></td>
		</tr>

		<tr>
			<td>NIS</td>
			<td>:</td>
			<td><?= $dt_s['NIS']; ?></td>
		</tr>

		<tr>
			<td>Kelas</td>
			<td>:</td>
			<td><?= $dt_s['kelas']; ?></td>
		</tr>
	</table>

	<hr/>

	<table border="1" cellspacing="" cellpadding="4" width="100%">
		<tr>
			<th>No.</th>
			<th>ID Pembayaran</th>
			<th>Pembayaran Bulan</th>
			<th>Tgl. Bayar</th>
			<th>Nominal</th>
			<th>Keterangan</th>
		</tr>

		<?php 
		$dt_pembayaran = $petugas->getPembayaranByIdPembayaran($_GET['id']);

		$no = 1;
		while($dt_p = mysqli_fetch_assoc($dt_pembayaran)) :
		?>

		<tr>
			<td><?= $no++; ?></td>
			<td><?= $dt_p['id_pembayaran']; ?></td>
			<td><?= $dt_p['bulan_dibayar']; ?></td>
			<td><?= $dt_p['tgl_bayar']; ?></td>
			<td><?= $dt_p['nominal']; ?></td>
			<td><?= $dt_p['keterangan']; ?></td>
		</tr>

		<?php 
			endwhile;
		?>
	</table>

	<table width="100%">
		<tr>
			<td></td>
			<td width = "200px">
				<br/>
				<p>Pangkalan Bun, <?= date('d/m/y'); ?><br/>
					Operator,
				<br>
				<br>
				<br>
			<p>_______________________</p>
			</td>
		</tr>
	</table>

	<a href="#" onclick="window.print();"><button>Cetak</button></a>
</body>
</html>
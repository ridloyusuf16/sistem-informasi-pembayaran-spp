<h1>Transaksi Pembayaran</h1>

<br>
<div id="kotak3" align="left">
	<form method="GET" action="">
		<label>Masukkan NIS</label>
		<input class="input" type="text" name="nis">
		<button id="btncari" type="submit" name="submits">Cari</button>
	</form>

	<?php

	if(isset($_GET['nis']) && $_GET['nis'] != ''){
		$rows = $petugas->getDataSiswaByNIS($_GET['nis']);

		if($rows->num_rows > 0){
	?>

	<table border="1">
		<tr>
			<th>NIS</th>
			<th>Nama Lengkap</th>
			<th>Kelas</th>
			<th>Detail</th>  
		</tr>

		<?php 

		foreach($rows as $row) :
		$kelas = $row['kelas'];
		
		?>

		<tr>
			<td align="center"><?= $row['NIS']; ?></td>
			<td align="left"><?= $row['nama_lengkap']; ?></td>
			<td align="center"><?= $kelas ?></td>
			<td align="center"><a href="?nis=<?= $row['NIS']; ?>&id_siswa=<?= $row['id_siswa']; ?>&kelas=<?= $row['kelas']; ?>"><button id="btnlihat">Lihat</button></a></td>
		</tr>

		<br>
		<?php
		endforeach;
		if(isset($_SESSION['pesan'])){
			echo $_SESSION['pesan'];
			unset($_SESSION['pesan']);
		}
		?>

		</table>
	
	<?php

	if(isset($_GET['nis'], $_GET['id_siswa']) && $_GET['id_siswa'] != ''){
	?>

	<h3>Data Pembayaran Kelas <?= $_GET['kelas']; ?></h3>
	</div>
	<table border="1">
		<tr>
			<th>No.</th>
			<th>Bulan</th>
			<th>Tahun</th>
			<th>Nominal</th>
			<th>Tanggal Bayar</th>
			<th>Keterangan</th>
			<th>Petugas</th>
			<th width="20%">Aksi</th>
		</tr>
	<?php
	$no = 1;
	$dt_pembayaran = $petugas->getPembayaranById($_GET['id_siswa']);

	while($dt = mysqli_fetch_assoc($dt_pembayaran)) :
	?>

	<tr>
		<td align="center"><?= $no++; ?></td>
		<td align="left"><?= $dt['bulan_dibayar']; ?></td>
		<td align="center"><?= $dt['tahun']; ?></td>
		<td align="center"><?= $dt['nominal']; ?></td>
		<td align="center"><?= $dt['tgl_bayar']; ?></td>
		<td align="center"><?= $dt['keterangan']; ?></td>
		<td align="center"><?= $dt['nama']; ?></td>
		<td align="center">

			<?php 
			if($dt['keterangan'] == 'Lunas'){
				echo '<a href="proses-transaksi.php?act=batal&id='.$dt['id_pembayaran'].'"><button id="btnbatal">Batal</button></a> | <a href="cetak-transaksi-perbulan.php?nis='.$_GET['nis'].'&id='.$dt['id_pembayaran'].'"><button id="btncetak">Cetak</button></a>';
			}else{
				echo '<a href="proses-transaksi.php?act=bayar&id='.$dt['id_pembayaran'].'"><button id="btnbayar">Bayar</button></a>';
			}
			?>

		</td>
	</tr>
<?php
	endwhile;
}

	}else{
		echo "NIS tidak terdaftar";
	}
}
?>
</table>
<br><br>
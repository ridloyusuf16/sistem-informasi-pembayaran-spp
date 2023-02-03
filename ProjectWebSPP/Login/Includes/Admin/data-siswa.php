<h1>Data Siswa</h1>
<div id="kotak3" align="left">	
	
<a href="?p=tambah-siswa"><button id="btntambah">Tambah Siswa</button></a>
<br>
<br>
	<div>
		<?php
		if(isset($_SESSION['pesan'])){
			echo $_SESSION['pesan'];
			unset($_SESSION['pesan']);
		}

	?>
	</div>
</div>
<br>
<table border="1" cellspacing="0" align="center">
	<tr>
		<th>No</th>
		<th>NISN</th>
		<th>NIS</th>
		<th>Nama Lengkap</th>
		<th>Kelas</th>
		<th>Tahun Masuk</th>
		<th width="15%">Aksi</th>
	</tr>
	<tr>

		<?php
		$no = 1;
		$siswa = $admin->getDataSiswa();
		while($dt_siswa = mysqli_fetch_assoc($siswa)){
		?>
		<tr>
			<td align="center"><?= $no++; ?></td>
			<td align="center"><?= $dt_siswa['NISN']; ?></td>
			<td align="center"><?= $dt_siswa['NIS']; ?></td>
			<td align="left"><?= $dt_siswa['nama_lengkap']; ?></td>
			<td align="center"><?= $dt_siswa['kelas']; ?></td>
			<td align="center"><?= $dt_siswa['tahun']; ?></td>
			<td align="center">
				<a href="?p=ubah-siswa&id=<?= $dt_siswa['id_siswa']; ?>"><button id="btnubah">Ubah</button></a>
				<a href="?p=hapus-siswa&id=<?= $dt_siswa['id_siswa']; ?>" onclick="return confirm('Yakin ingin menghapus data ini?')"><button id="btnhapus">Hapus</button></a>
				</td>
			</tr>
		<?php
		}
		?>
	</tr>
</table>
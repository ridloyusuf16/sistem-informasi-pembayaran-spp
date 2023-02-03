<h1>Data Petugas</h1>
<div id="kotak3" align="left">
<a href="?p=tambah-petugas"><button id="btntambah">Tambah Petugas</button></a>
<br><br>

<?php
if(isset($_SESSION['pesan'])){
	echo $_SESSION['pesan'];
	unset($_SESSION['pesan']);
}

?>
</div>

<br>
<table border="1">
	<tr>
		<th>No</th>
		<th>Nama Petugas</th>
		<th>Username</th>
		<th>Password</th>
		<th>Level</th>
		<th width="15%">Aksi</th>
	</tr>
	<tr>

		<?php
		$no = 1;
		$rows = $admin->getAllDataPetugas();

		foreach($rows as $row) :
		?>
			<tr>
				<td align="center"><?= $no++; ?></td>
				<td align="left"><?= $row['nama']; ?></td>
				<td align="center"><?= $row['username']; ?></td>
				<td align="center"><?= $row['password']; ?></td>
				<td align="center"><?= $row['level']; ?></td>
				<td align="center">
					<a href="?p=ubah-petugas&id=<?= $row['id']; ?>"><button id="btnubah">Ubah</button></a>
					<a href="?p=hapus-petugas&id=<?= $row['id']; ?>" onclick="return confirm('Yakin ingin menghapus data ini?')"><button id="btnhapus">Hapus</button></a>
				</td>
			</tr>

		<?php
		endforeach;
		?>

	</tr>
</table>
<br>


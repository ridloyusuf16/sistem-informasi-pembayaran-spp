<h1>Data SPP</h1>

<div id="kotak3" align="left">
<a href="?p=tambah-spp"><button id="btntambah">Tambah Data SPP</button></a>
<br><br>

<?php
if(isset($_SESSION['pesan'])){
	echo $_SESSION['pesan'];
	unset($_SESSION['pesan']);
	echo '<br/>';
}

?>
</div>
<br>
<table border="1">
	<tr>
		<th>No</th>
		<th>Tahun</th>
		<th>Nominal</th>
		<th width="15%">Aksi</th>
	</tr>
	<tr>

		<?php
		$no = 1;
		$spp = $admin->getDataSPP();
		while($dt_spp = mysqli_fetch_assoc($spp)){
		?>
			<tr>
				<td align="center"><?= $no++; ?></td>
				<td align="center"><?= $dt_spp['tahun']; ?></td>
				<td align="center"><?= $dt_spp['nominal']; ?></td>
				<td align="center">
					<a href="?p=ubah-spp&id=<?= $dt_spp['id_spp']; ?>"><button id="btnubah">Ubah</button></a>
					<a href="?p=hapus-spp&id=<?= $dt_spp['id_spp']; ?>" onclick="return confirm('Yakin ingin menghapus data ini?')"><button id="btnhapus">Hapus</button></a>
				</td>
			</tr>

		<?php
		}
		?>

	</tr>
</table>
<br><br>
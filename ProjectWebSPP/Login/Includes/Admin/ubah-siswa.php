<?php
if(isset($_POST['submit'])){

	if($admin->ubahDataSiswaById($_GET['id'], $_POST['nis'], $_POST['nama'], $_POST['kelas'], $_POST['id_spp'], $_POST['nisn'])){
		header('Location: ?p=siswa');
		$_SESSION['pesan'] = "Data Siswa berhasil diubah";
	}else{
		header('Location: ?p=siswa');
		$_SESSION['pesan'] = "Data Siswa gagal diubah";
	}
}

	if(isset($_GET['id'])){
		$dt_siswa = $admin->getDataSiswaById($_GET['id']);
		

		foreach($dt_siswa as $row) :
?>

	<h1>Ubah Data Siswa</h1>
	<form method="post">
		<table id="tabeledit">
				<tr>
					<td></td>
					<td></td>
					<td><input class="input" type="hidden" name="nisn" id="nisn" placeholder="Masukkan NISN" required value="<?= $row['NISN']; ?>"></td>
				</tr>
				<tr>
					<td>NIS</td>
					<td>:</td>
					<td><input class="input" type="text" name="nis" id="nis" placeholder="Masukkan NIS" required value="<?= $row['NIS']; ?>"></td>
				</tr>
				<tr>
					<td>Nama Lengkap</td>
					<td>:</td>
					<td><input class="input" type="text" name="nama" id="nama" placeholder="Masukkan Nama Lengkap" required value="<?= $row['nama_lengkap']; ?>"></td>
				</tr>
				<tr>
					<td>Kelas</td>
					<td>:</td>
					<td>
						<select name="kelas">
							<option value="1">X</option>
							<option value="2">XI</option>
							<option value="3">XII</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>ID SPP</td>
					<td>:</td>
					<td>
						<select name="id_spp" id="tahun">
							
							<?php
							$dt_spp = $admin->getDataSPP();
							foreach($dt_spp as $row) :
							?>

							<option value="<?= $row['id_spp']; ?>"><?= $row['tahun']; ?></option>;

							<?php
							endforeach;
							?>
						</select>
					</td>
				</tr>
		</table>
		<br>
		<center><button id="btnsimpan" type="submit" name="submit">Simpan</button></center>
	</form>

	<?php
		endforeach;

	}
	?>
	<br><br>
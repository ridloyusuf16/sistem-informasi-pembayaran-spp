<?php
if(isset($_POST['submit'])){
	$nisn = $_POST['nisn'];
	$nis = $_POST['nis'];
	$nama = $_POST['nama'];
	$kelas = $_POST['kelas'];
	$id_spp = $_POST['id_spp'];

	$cek = $admin->cekDataSiswa($nisn, $nis);

	if($cek->num_rows > 0){
		header('Location: ?p=siswa'); 
		$_SESSION['pesan'] = "NISN atau NIS sudah terdaftar";
	}else{
		$ss = $admin->tambahDataSiswa($nisn, $nis, $nama, $kelas, $id_spp);

		if($ss){
			$coba = $admin->getIdSiswa($nis, $kelas);
			$idSiswa = mysqli_fetch_assoc($coba);

			$bulan[] = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

			for ($i=0; $i < 12 ; $i++){
				$admin->tambahDataPembayaran($nisn, $bulan[0][$i], $id_spp, $idSiswa['id_siswa']);
			}
			header('Location: ?p=siswa');
			$_SESSION['pesan'] = "Data Siswa Berhasil Ditambah";
		}else{
			header('Location: ?p=siswa');
			$_SESSION['pesan'] = "Data Siswa Gagal Ditambah";
		}
	}
}
?>

<h2>Tambah Data Siswa</h2>
<form method="post">
	<table id="tabeledit">
			<tr>
				<td>NISN</td>
				<td>:</td>
				<td><input class="input" type="text" name="nisn" id="nisn" required></td>
			</tr>
			<tr>
				<td>NIS</td>
				<td>:</td>
				<td><input class="input" type="text" name="nis" id="nis" required=""></td>
			</tr>
			<tr>
				<td>Nama Lengkap</td>
				<td>:</td>
				<td><input class="input" type="text" name="nama" id="nama" required=""></td>
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
	<button id="btnsimpan" type="submit" name="submit">Simpan</button>	
</form>
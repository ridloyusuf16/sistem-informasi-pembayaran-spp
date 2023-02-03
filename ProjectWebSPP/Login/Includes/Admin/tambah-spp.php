<?php
if(isset($_POST['submit'])){
	$simpan = $admin->tambahDataSPP($_POST['tahun'], $_POST['nominal']);

	if($simpan){
		header('Location: ?p=spp');
		$_SESSION['pesan'] = "Data SPP berhasil ditambah";
	}else{
		header('Location: ?p=spp');
		$_SESSION['pesan'] = "Data SPP gagal ditambah";
	}
}
?>

<h2>Tambah Data SPP</h2>
<form method="post">
	<table id="tabeledit">
			<tr>
				<td>Tahun</td>
				<td>:</td>
				<td><input class="input" type="text" name="tahun" id="tahun"  required></td>
			</tr>
			<tr>
				<td>Nominal</td>
				<td>:</td>
				<td><input class="input" type="text" name="nominal" id="nominal" required></td>
			</tr>
	</table>	
	<br>
	<input id="btnsimpan" type="submit" name="submit" value="Simpan">
</form>
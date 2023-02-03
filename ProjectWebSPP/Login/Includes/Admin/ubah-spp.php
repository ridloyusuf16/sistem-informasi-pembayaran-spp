<?php
if(isset($_POST['submit'])){
	if($admin->ubahDataSPP($_POST['tahun'], $_POST['nominal'], $_GET['id'])){
		header('Location: ?p=spp');
		$_SESSION['pesan'] = "Data SPP berhasil diubah";
	}else{
		header('Location: ?p=spp');
		$_SESSION['pesan'] = "Data SPP gagal diubah";
	}
}

if(isset($_GET['id'])){
	$dt_spp = $admin->getDataSPPbyId($_GET['id']);

	foreach ($dt_spp as $row) :

?>
<h2>Ubah Data SPP</h2>
<form method="post">
	<table id="tabeledit">
			<tr>
				<td>Tahun</td>
				<td>:</td>
				<td><input class="input" type="text" name="tahun" id="tahun" placeholder="Masukkan tahun ajaran" required value="<?=$row['tahun']; ?>"></td>
			</tr>
			<tr>
				<td>Nominal</td>
				<td>:</td>
				<td><input class="input" type="text" name="nominal" id="nominal" placeholder="Masukkan nominal" required value="<?=$row['nominal']; ?>"></td>
			</tr>
	</table>	
	<br>
	<center><td><input id="btnsimpan" type="submit" name="submit" value="Simpan"></td></center>
</form>

<?php
	endforeach;
}
?>

<br><br>
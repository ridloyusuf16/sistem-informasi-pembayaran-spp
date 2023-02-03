<?php
if(isset($_POST['submit'])){
	if($admin->ubahDataPetugas($_POST['username'], $_POST['password'], $_POST['nama'], $_POST['level'], $_GET['id'])){
		header('Location: ?p=petugas');
		$_SESSION['pesan'] = "Data Petugas berhasil diubah";
	}else{
		header('Location: ?p=petugas');
		$_SESSION['pesan'] = "Data Petugas gagal diubah";
	}
}

if(isset($_GET['id'])){
	$data = $admin->getDataPetugas($_GET['id']);

	foreach ($data as $row) :

?>
<h1>Ubah Data Petugas</h1>
<form method="post">
	<table id="tabeledit">
			<tr>
				<td>Nama Lengkap</td>
				<td>:</td>
				<td><input class="input" type="text" name="nama" required value="<?= $row['nama']; ?>"></td>
			</tr>
			<tr>
				<td>Username</td>
				<td>:</td>
				<td><input class="input" type="text" name="username" required value="<?= $row['username']; ?>"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td>:</td>
				<td><input class="input" type="password" name="password" required value="<?= $row['password']; ?>"></td>
			</tr>
			<tr>
				<td>Level</td>
				<td>:</td>
				<td>
					<select name="level">
						<option value="Admin">Admin</option>
						<option value="Petugas">Petugas</option>			
					</select>
				</td>
			</tr>
	</table>
	<br>
	<center><input id="btnsimpan" type="submit" name="submit" value="Simpan"></center>	
	<br><br>
</form>

<?php
	endforeach;
}
?>

<br><br>
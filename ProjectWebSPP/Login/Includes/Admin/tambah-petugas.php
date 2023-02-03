<?php
if(isset($_POST['submit'])){

	$simpan = $admin->tambahDataPetugas($_POST['username'], $_POST['password'], $_POST['nama'], $_POST['level']);

	if($simpan){
		header('Location: ?p=petugas');
		$_SESSION['pesan'] = "Data Petugas berhasil ditambah";
	}else{
		header('Location: ?p=petugas');
		$_SESSION['pesan'] = "Data Petugas gagal ditambah";
	}
}
?>

<h2>Tambah Data Petugas</h2>
<form method="post">
	<table id="tabeledit">
			<tr>
				<td>Nama Lengkap</td>
				<td>:</td>
				<td><input class="input" type="text" name="nama" required></td>
			</tr>
			<tr>
				<td>Username</td>
				<td>:</td>
				<td><input class="input" type="text" name="username" required></td>
			</tr>
			<tr>
				<td>Password</td>
				<td>:</td>
				<td><input class="input" type="password" name="password" required></td>
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
	<input id="btnsimpan" type="submit" name="submit" value="Simpan">
</form>
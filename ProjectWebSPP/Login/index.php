<?php
if(!session_id()) session_start();
require_once 'Proses.php';

$proses = new Proses;

if(isset($_SESSION['id'])){
	if($_SESSION['level'] == "Admin"){
		header('Location: Includes/Admin/');
	}else{
		header('Location: Petugas/');
	}
}

if(isset($_POST['masuk'])){

	$username = $proses->konek->real_escape_string($_POST['username']);
	$password = $proses->konek->real_escape_string($_POST['password']);

	$masuk = $proses->loginPetugas($username, $password);

	if($masuk->num_rows > 0){
		$data = mysqli_fetch_assoc($masuk);


		if($data['level'] == "Admin"){
			header('Location: Includes/Admin');
			$_SESSION['id'] = $data['id'];
			$_SESSION['level'] = $data['level'];
		}else{
			header('Location: Petugas');
			$_SESSION['id'] = $data['id'];
			$_SESSION['level'] = $data['level'];
		}
	}else{
		$_SESSION['error'] = "Username atau Password tidak valid";
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Aplikasi Pembayaran SPP</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body id="body">
	<div id="kotak1">
	<center>
		<div id="header">
			<ul style="display:flex; list-style:none;">
				<li><b>Aplikasi Pembayaran SPP</b></li>
			</ul>
		</div>
		<br><br>
		<div id="content">
			<div id="kotak2">
				<h2>Login</h2>
					<?php
					if(isset($_SESSION['error'])){
						echo '<span style="color:red;">' . $_SESSION['error'] . '</span>';
					}
					?>
				<br>
				<form method="post" action="">
					<label>Username</label><br/>
					<input class="input" type="text" name="username"><br/><br/>
					<label>Password</label><br/>
					<input class="input" type="password" name="password"><br/><br/>
					<input id="button" type="submit" name="masuk" value="Login"><br/>
					<br>
					<div id="kotak4">
						<p id="note">
							Silahkan isikan Username dan Password yang sesuai!
						</p>
					</div>
					<br><br><br><br><br><br>
				</form>

			</div>
			<br>
		</div>
		<br><br>
	</center>
	</div>
</body>
</html>
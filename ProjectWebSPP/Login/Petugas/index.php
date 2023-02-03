<?php
require_once 'header.php';

if(isset($_GET['p'])){
	if($_GET['p'] == 'home'){
		require_once'home.php';
	}elseif($_GET['p'] == 'transaksi'){
		require_once 'Includes/transaksi.php';
	}elseif ($_GET['p'] == 'logout') {
		header('Location: ../');
		session_destroy();
	}
} elseif (isset($_GET['nis'])) {
	require_once 'Includes/transaksi.php';
	$_SESSION['nis'] = $_GET['nis'];
}else{
	require_once 'home.php';
}
?>

 <?php 
session_start();
require_once 'Petugas.php';

$Petugas = new Petugas;

if(!isset($_SESSION['id'])){
	header('Location: ../');
}else{
	if($_GET['act'] == 'bayar'){
		$id_pembayaran = $_GET['id'];
		$tgl_bayar = date('Y-m-d');
		$id_petugas = $_SESSION['id'];

		$bayar = $Petugas->prosesBayar($tgl_bayar, $id_petugas, $id_pembayaran);

		if($bayar){
			$_SESSION['pesan'] = 'Pembayaran sukses';
			header('Location: index.php?nis='.$_SESSION['nis']);
		}else{
			$_SESSION['pesan'] = 'Pembayaran gagal';
			header('Location: index.php?nis='.$_SESSION['nis']);
		}
	}elseif ($_GET['act'] == 'batal') {
		$id_pembayaran = $_GET['id'];

		$batal = $Petugas->batalBayar($id_pembayaran);

		if($batal){
			$_SESSION['pesan'] = 'Pembayaran dibatalkan';
			header('Location: index.php?nis='.$_SESSION['nis']);
		}else{
			$_SESSION['pesan'] = 'Pembayaran gagal dibatalkan';
			header('Location: index.php?nis='.$_SESSION['nis']);
		}
	}
}
 <?php 

require_once 'header.php';

if(isset($_GET['p'])){
	if($_GET['p'] == 'home'){
		require_once'home.php';
	}elseif($_GET['p'] == 'siswa'){
		require_once 'data-siswa.php';
	}elseif($_GET['p'] == 'tambah-siswa'){
		require_once 'tambah-siswa.php';
	}elseif($_GET['p'] == 'ubah-siswa'){
		require_once 'ubah-siswa.php';
	}elseif($_GET['p'] == 'hapus-siswa'){
		if($admin->hapusDataSiswa($_GET['id'])){
			$admin->hapusDataPembayaran($_GET['id']);
			header('Location: ?p=siswa');
			$_SESSION['pesan'] = "Data Siswa berhasil dihapus";
		}else{
			header('Location: ?p=siswa');
			$_SESSION['pesan'] = "Data Siswa gagal dihapus";
		}
	}elseif($_GET['p'] == 'petugas'){
		require_once 'data-petugas.php';
	}elseif($_GET['p'] == 'tambah-petugas'){
		require_once 'tambah-petugas.php';
	}elseif($_GET['p'] == 'ubah-petugas'){
		require_once 'ubah-petugas.php';
	}elseif($_GET['p'] == 'hapus-petugas'){
		if($admin->hapusDataPetugas($_GET['id'])){
			header('Location: ?p=petugas');
			$_SESSION['pesan'] = "Data Petugas berhasil dihapus";
		}else{
			header('Location: ?p=petugas');
			$_SESSION['pesan'] = "Data Petugas gagal dihapus";
		}
	}elseif($_GET['p'] == 'spp'){
		require_once 'data-spp.php';
	}elseif($_GET['p'] == 'tambah-spp'){
		require_once 'tambah-spp.php';
	}elseif($_GET['p'] == 'ubah-spp'){
		require_once 'ubah-spp.php';
	}elseif($_GET['p'] == 'hapus-spp'){
		if($admin->hapusDataSPP($_GET['id'])){
			header('Location: ?p=spp');
			$_SESSION['pesan'] = "Data SPP berhasil dihapus";
		}else{
			header('Location: ?p=spp');
			$_SESSION['pesan'] = "Data SPP gagal dihapus";
		}
	}elseif($_GET['p'] == 'laporan'){
		require_once'laporan-pembayaran.php';
	}elseif($_GET['p'] == 'tab'){

		$thnAjar = $admin->cekTahunAjaran();
		$thnAjar = mysqli_fetch_array($thnAjar);

		$thnSPP = $admin->getMaxTahunSPP();
		$thnSPP = mysqli_fetch_array($thnSPP);

		if($thnAjar < $thnSPP){
			$status = true;
			require_once "tahun-ajaran-baru.php";
		}else{
			$status = false;
			echo "<script>alert('Data SPP untuk tahun ajaran baru belum dibuat'); window.location.href='?p=spp'</script>";
		}
	}elseif($_GET['p'] = 'logout'){
		header('Location: ../../index.php');
		session_destroy();
	}

}else{
	require_once'home.php';
}

require_once 'footer.php'; 

?>
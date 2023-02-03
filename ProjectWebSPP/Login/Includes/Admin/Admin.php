<?php

require_once '../../config/Koneksi.php';

class Admin extends Koneksi {
	public function getDataPetugas($id){
		$stmt = mysqli_query($this->konek, "SELECT * FROM admin WHERE id = '" . $id . "'");

		return $stmt;
	}

	public function getAllDataPetugas(){
		$stmt = mysqli_query($this->konek, "SELECT * FROM admin");

		return $stmt;
	}

	public function tambahDataPetugas($username, $password, $nama, $level){
		$stmt = mysqli_query($this->konek, "INSERT INTO admin VALUES ('', '$username', '$password', '$nama', '$level')");

		if($stmt){
			return true;
		}else{
			return false;
		}
	}

	public function ubahDataPetugas($username, $password, $nama, $level, $id){
		$stmt = mysqli_query($this->konek, "UPDATE admin SET username = '". $username ."', password = '" . $password . "', nama = '".$nama."', level = '".$level."' WHERE id = '".$id."'");

		if($stmt){
			return true;
		}else{
			return false;
		}
	}

	public function hapusDataPetugas($id){
		$stmt = mysqli_query($this->konek, "DELETE FROM admin WHERE id = '".$id."'");

		if($stmt){
			return true;
		}else{
			return false;
		}
	}

	public function getDataSPP(){
		$stmt = mysqli_query($this->konek, "SELECT * FROM spp ORDER BY tahun ASC");

		return $stmt;
	}

	public function tambahDataSPP($tahun, $nominal){
		$stmt = mysqli_query($this->konek, "INSERT INTO spp VALUES ('', '". $tahun ."', '" . $nominal . "')");

		if($stmt){
			return true;
		}else{
			return false;
		}
	}

	public function getDataSPPbyId($id){
		$stmt = mysqli_query($this->konek, "SELECT * FROM spp WHERE id_spp = '".$id."'");

		return $stmt;
	}

	public function ubahDataSPP($tahun, $nominal, $id){
		$stmt = mysqli_query($this->konek, "UPDATE spp SET tahun = '". $tahun ."', nominal = '" . $nominal . "' WHERE id_spp = '".$id."'");

		if($stmt){
			return true;
		}else{
			return false;
		}
	}

	public function hapusDataSPP($id){
		$stmt = mysqli_query($this->konek, "DELETE FROM spp WHERE id_spp = '".$id."'");

		if($stmt){
			return true;
		}else{
			return false;
		}
	}

	public function getIdSpp($tahun){
		$stmt = mysqli_query($this->konek, "SELECT * FROM spp WHERE tahun = '".$tahun."'");

		return $stmt;
	}

	public function getDataSiswa(){
		$stmt = mysqli_query($this->konek, "SELECT * FROM siswa INNER JOIN spp ON siswa.id_spp = spp.id_spp ORDER BY NISN ASC");

		return $stmt;
	}

	public function getDataSiswaById($id_siswa){
		$stmt = mysqli_query($this->konek, "SELECT * FROM siswa WHERE id_siswa = '$id_siswa'");

		return $stmt;
	}


	public function cekDataSiswa($nisn, $nis){
		$stmt = mysqli_query($this->konek, "SELECT * FROM siswa WHERE NISN = '$nisn' OR NIS = '$nis'");

		if($stmt){
			return true;
		}else{
			return false;
		}
	}

	public function tambahDataSiswa($nisn, $nis, $nama, $kelas, $tahun){
		$stmt = mysqli_query($this->konek, "INSERT INTO siswa VALUES ('', '$nisn', '$nis', '$nama', '$kelas', '$tahun')");
		
		if($stmt){
			return true;
		}else{
			return false;
		}
	}

	public function ubahDataSiswaById($id_siswa, $nis, $nama, $kelas, $tahun, $nisn){
		$stmt = mysqli_query($this->konek, "UPDATE siswa AS s, pembayaran AS p SET s.NIS = '". $nis ."', s.nama_lengkap = '" . $nama . "' , s.kelas = '".$kelas."', s.id_spp = '".$tahun."', p.id_spp = '$tahun' WHERE s.id_siswa = '$id_siswa'");

		if($stmt){
			return true;
		}else{
			return false;
		}
	}

	public function hapusDataSiswa($id_siswa){
		$stmt = mysqli_query($this->konek, "DELETE FROM siswa WHERE id_siswa = '$id_siswa'");

		if($stmt){
			return true;
		}else{
			return false;
		}
	}

	public function getIdSiswa($nis, $kelas){
		$stmt = mysqli_query($this->konek, "SELECT * FROM siswa WHERE NIS = '$nis' AND kelas = '$kelas'");

		return $stmt;
	}
/////
	public function tambahDataPembayaran($nisn, $bulan, $id_spp, $id_siswa){
		$stmt = mysqli_query($this->konek, "INSERT INTO pembayaran (nisn, bulan_dibayar, id_spp, id_siswa) VALUES ('$nisn', '$bulan', '$id_spp', '$id_siswa')");

		if($stmt){
			return true;
		}else{
			return false;
		}
	}

	public function hapusDataPembayaran($id_siswa){
		$stmt = mysqli_query($this->konek, "DELETE FROM pembayaran WHERE id_siswa = '$id_siswa'");

		if($stmt){
			return true;
		}else{
			return false;
		}
	}

	public function getDataPembayaranPerPeriode($date1, $date2) {
		$stmt = mysqli_query($this->konek, "SELECT s.nisn, p.tgl_bayar, spp.tahun, spp.nominal FROM siswa AS s INNER JOIN pembayaran AS p ON s.NISN = p.nisn INNER JOIN spp AS spp ON p.id_spp = spp.id_spp WHERE p.tgl_bayar BETWEEN '$date1' and '$date2'");

		return $stmt;
	}

	public function cekTahunAjaran(){
		$stmt = mysqli_query($this->konek, "SELECT MAX(spp.tahun) AS MaxTahun FROM siswa AS s INNER JOIN spp AS spp WHERE s.id_spp = spp.id_spp");

		return $stmt;
	}

	public function getMaxTahunSPP(){
		$stmt = mysqli_query($this->konek, "SELECT MAX(tahun) FROM spp");

		return $stmt;
	}

	public function tahunAjaranBaru(){
		$stmt = mysqli_query($this->konek, "SELECT NISN, NIS, nama_lengkap, MAX(kelas) AS kelas, id_spp FROM siswa GROUP BY NISN");

		return $stmt;
	}

}

?>
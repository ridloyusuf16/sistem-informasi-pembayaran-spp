<?php 
require_once '../Config/Koneksi.php';

class Petugas extends Koneksi{
	public function getDataSiswaByNIS($nis){
		$stmt = mysqli_query($this->konek, "SELECT * FROM siswa WHERE NIS = '$nis'");

		return $stmt;
	}

	public function getIdSiswa($nis, $kelas){
		$stmt = mysqli_query($this->konek, "SELECT * FROM siswa WHERE NIS = '$nis' AND kelas = '$kelas'");

		return $stmt;
	}

	public function prosesBayar($tgl_bayar, $id_petugas, $id_pembayaran){
		$stmt = mysqli_query($this->konek, "UPDATE pembayaran SET tgl_bayar = '$tgl_bayar', keterangan = 'Lunas', id_petugas = '$id_petugas' WHERE id_pembayaran = '$id_pembayaran'");

		return $stmt;
	}

	public function batalBayar($id_pembayaran){
		$stmt = mysqli_query($this->konek, "UPDATE pembayaran SET tgl_bayar = NULL, keterangan = NULL, id_petugas = NULL WHERE id_pembayaran = '$id_pembayaran'");

		return $stmt; 
	} 

	public function getPembayaranById($id){
		$stmt = mysqli_query($this->konek, "SELECT p.id_pembayaran, p.bulan_dibayar, s.tahun, s.nominal, p.tgl_bayar, p.keterangan, a.nama FROM pembayaran AS p INNER JOIN spp AS s ON p.id_spp = s.id_spp LEFT JOIN admin AS a ON p.id_petugas = a.id WHERE p.id_siswa = '$id' ORDER BY p.id_pembayaran ASC ");

		return $stmt;
	}

	public function getPembayaranByIdPembayaran($id){
		$stmt = mysqli_query($this->konek, "SELECT p.id_pembayaran, p.bulan_dibayar, s.tahun, s.nominal, p.tgl_bayar, p.keterangan, a.nama FROM pembayaran AS p INNER JOIN spp AS s ON p.id_spp = s.id_spp LEFT JOIN admin AS a ON p.id_petugas = a.id WHERE p.id_pembayaran = '$id' ORDER BY p.id_pembayaran ASC ");

		return $stmt;
	}

}
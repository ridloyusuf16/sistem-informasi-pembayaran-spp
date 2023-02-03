<?php 

include 'config/Koneksi.php';

class Proses extends Koneksi{
	public function loginPetugas($username, $password){
		$stmt = mysqli_query($this->konek, "SELECT * FROM admin WHERE username = '".$username."' AND password = '".$password."'");

			return $stmt;
	
	}
}

?>
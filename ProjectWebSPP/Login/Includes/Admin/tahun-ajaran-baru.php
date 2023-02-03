<?php
  if ($status) {
    $d = $admin->tahunAjaranBaru();

    while ($r = mysqli_fetch_assoc($d)){ 

      if ($r['kelas'] == 1 || $r['kelas'] == 2) {
        $kelas = $r['kelas'] + 1;

        $cek = $admin->getDataSPPbyId($r['id_spp']);
        $thn = mysqli_fetch_assoc($cek);
        $tahun = $thn['tahun'] + 1;

        $check = $admin->getIdSpp($tahun);
        $IdSp =  mysqli_fetch_assoc($check);
        $IdSpp = $IdSp['id_spp'];

        if($admin->tambahDataSiswa($r['NISN'], $r['NIS'], $r['nama_lengkap'], $kelas, $IdSpp))
        {
          $coba = $admin->getIdSiswa($r['NIS'], $kelas);
          $idSiswa = mysqli_fetch_assoc($coba);
          $IdSiswa = $idSiswa['id_siswa'];

          $bulan[] = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

          for ($i=0; $i < 12; $i++) { 
            $admin->tambahDataPembayaran($r['NISN'], $bulan[0][$i], $IdSpp, $IdSiswa);
          }
          echo "<script>alert('Data tahun ajaran baru berhasil dibuat'); window.location.href = '?p=siswa'</script>";
        }
        else
        {
          echo "<script>alert('Data tahun ajaran baru gagal dibuat'); window.location.href = '?p=siswa'</script>";
        }
      }
    }
  }
?>
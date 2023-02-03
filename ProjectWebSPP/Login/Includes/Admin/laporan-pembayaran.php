 <h1>Laporan Pembayaran</h1>

 <br><br>

 <div style="display: inline-block;">
   <form method="POST">
     <label>Tampilkan data dari tgl.</label><br>
     <input class="input" type="date" name="tgl_awal"><br>
     <label>sampai </label><br>
     <input class="input" type="date" name="tgl_akhir"><br><br>
     <input id="btntampil" type="submit" name="tampil" value="Tampilkan">
   </form>
 </div>

  <br/><br/>
 <table border="1" id="table_content">
   <tr>
     <th>No.</th>
     <th>NISN</th>
     <th>Tgl. Bayar</th>
     <th>Nominal</th>
   </tr>


   <?php
   if (isset($_POST['tampil'])) {
     $date1 = $_POST['tgl_awal'];
     $date2 = $_POST['tgl_akhir'];

     $data = $admin->getDataPembayaranPerPeriode($date1, $date2);

     $no = 1;
     foreach ($data as $r):
       ?>

      <tr>
         <td align="center"><?= $no++ ?></td>
         <td align="center"><?= $r['nisn'] ?></td>
         <td align="center"><?= $r['tgl_bayar'] ?></td>
         <td align="center"><?= $r['nominal'] ?></td>
      </tr>

       <?php
     endforeach;

    } else {
      echo "<tr><td colspan='4'><center>Tidak ada data</center></td></tr>";
    }
    ?>

  </table>
  <br><br>
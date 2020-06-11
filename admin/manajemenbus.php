<!DOCTYPE html>
<?php

   session_start();
   $conn = mysqli_connect("localhost", "root", "", "suryakencana");
   // print($_SESSION['id']. $_SESSION["username"]);
   include "bus.php";
   $tabelfull = mysqli_query($conn, "select * from menjadwalkan");
   $indeks = array ("id_bis", "waktu_berangkat", "waktu_berangkat", "harga_tiket", "harga_pengiriman_paket", "id_supir" );
   $listsupir = array();
   $tabelsupir = mysqli_query($conn, "select * from supir");

   if (isset( $_POST["lastconfirm"])){
      for ($i = 0; $i < count($_POST ["tiket"]); $i++){
         $id_jadwal = $_POST["waktu"][$i] . $_POST["selectbis"][$i];
         $id_bis = $_POST["selectbis"][$i];
         $id_admin = $_SESSION["id"];
         $kota_asal = $_POST["asal"][$i];
         $kota_tujuan = $_POST["tujuan"][$i];
         $tanggal_berangkat = $_POST["waktu"][$i];
         $jam_berangkat = $_POST["jam"][$i];
         $harga_tiket = $_POST["tiket"][$i];
         $harga_paket = $_POST["paket"][$i];
         $suppir = $_POST["supir"][$i];
         $rowsupir = mysqli_query($conn, "select * from supir where nama_supir ='$suppir' ");
         $r = mysqli_fetch_assoc($rowsupir)["id_supir"];

         mysqli_query($conn, "INSERT INTO menjadwalkan VALUES
            (
            '$id_jadwal',
            '$id_bis',
            '$id_admin',
            '$kota_asal',
            '$kota_tujuan',
            '$tanggal_berangkat',
            '$jam_berangkat',
            '$harga_tiket',
            '$harga_paket',
            '$r' )
         ");
         
      }

      if(mysqli_affected_rows($conn) > 0){
         echo"
            <script>
            alert('Data berhasil ditambahkan');
            </script>
         ";
         header("Location: indeks.php");
      }
   }

   
   while($list = mysqli_fetch_assoc($tabelsupir)){
      $listsupir[] = $list["nama_supir"];
   }
?>
<html>
   <head>
      <script src="js/script.js" type='text/javascript'></script>
      <script>
         var supir = <?= json_encode($listsupir); ?>;
      </script>
   </head>
   <body onload="createTable()">
      <div class="jadwal" id="currentjadwal" >
         <h2 style="text-align: center; color: rgb(26, 100, 230)">Jadwal Aktif</h2>
         <table class = "tabelbis" id= "current">
            <tr>
               <?php for ($i = 0; $i < count($bishead); $i++):?>
                  <th><?=$bishead[$i]?></th>
               <?php endfor; ?>
            </tr>
            <?php while ( $barisjadwal = mysqli_fetch_assoc($tabelfull) ) :
               $idsupir = $barisjadwal['id_supir'];
               $supir = mysqli_query($conn, "select * from  supir where id_supir = '$idsupir'  ");
               $rowsupir = mysqli_fetch_assoc($supir);
               $namasupir = $rowsupir["nama_supir"];
            ?>
               <tr>
                  <td><?= $barisjadwal['id_bis'] ?></td>
                  <td><?= $barisjadwal['kota_asal'] ?></td>
                  <td><?= $barisjadwal['kota_tujuan'] ?></td>
                  <td><?= $barisjadwal['tanggal_berangkat'] ?></td>
                  <td><?= $barisjadwal['jam_berangkat'] ?></td>
                  <td><?= $barisjadwal['harga_tiket'] ?></td>
                  <td><?= $barisjadwal['harga_pengiriman_paket'] ?></td>
                  <td><?= $namasupir ?></td>
                  <td>
                  <button type="button" class="hapus" onclick="removeRow1(this)" >Hapus</button>
                  </td>
               </tr>
            <?php endwhile; ?>

         </table>
      </div>

      <form class="hidden" id="jadwal" method="POST">
         <!-- table id = empTable -->
         <h2 style="text-align: center; color: rgb(26, 100, 230)">Tambah Jadwal Baru</h2>
      </form>

      <div class="jadwal" style="text-align: center; padding:0px; border:none" >
         <button class="addbutton" type="button" onclick="cancel('jadwal','empTable')">Buang perubahan</button>
         <button class="addbutton" type="button" onclick="addRow()">Tambahkan data baru</button>
         <button class="addbutton" type="button" onclick="simpansemua('modal')">Simpan perubahan</button>
      </div>

      <div class = "modal" id = "modal">
         <div class = "modal-content">
            <h2 style="color:rgb(26, 100, 230)">SIMPAN PERUBAHAN?</h2>
            <p style="color:orangered">*perubahan yang dilakukan masih bisa diubah lagi*</p>
            <button onclick="kembali('modal')" class = "lastconfirm" id = "cancel" name ="cancel" type="button">KEMBALI</button>
            <button class = "lastconfirm" id = "lastconfirm" name ="lastconfirm" type="submit" form = "jadwal">SIMPAN</button>
         </div>
      </div>
   </body>
</html>
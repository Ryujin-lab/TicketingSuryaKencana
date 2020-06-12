<!DOCTYPE html>
<?php
   $conn = mysqli_connect("localhost", "root", "", "suryakencana");
   // print($_SESSION['id']. $_SESSION["username"]);
   include "bus.php";
   $tabelfull = mysqli_query($conn, "select * from menjadwalkan");
   $indeks = array ("id_bis", "waktu_berangkat", "waktu_berangkat", "harga_tiket", "harga_pengiriman_paket", "id_supir" );
   $listsupir = array();
   $tabelsupir = mysqli_query($conn, "select * from supir");

   function query($query) {
      global $conn;
      $result = mysqli_query($conn, $query);

      $rows = [];
      while ($row = mysqli_fetch_assoc($result)) {
         $rows[] = $row;
      }
      return $rows;
   }

   $listbis = query("select * from bis order by nama_bis ASC");

   $listnamabis = array();
   $listidbis = array();
   for ($i  = 0; $i < count($listbis); $i++){
      $listnamabis[] = $listbis[$i]["nama_bis"];
      $listidbis[] = $listbis[$i]["id_bis"];
   }

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

         for ($j = 0; $j<45; $j++){
            $a = $id_bis;
            $b = $id_jadwal."-".($j+1);
            $c = $j+1;
            $d = $tanggal_berangkat;
            mysqli_query($conn, "INSERT INTO bangku
            (
               id_bis,	
               id_bangku, 	
               no_bangku,	
               tanggal_valid,
               keterangan
            ) 
               values
            (
               '$a', '$b', '$c', '$d', 'kosong'
            )
            ");
            
         }

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

   if (isset($_POST["lastconfirmdelete"])){
      $hapsu = $_POST["idhapus"];
      for ($i = 0; $i <count($hapsu); $i++){
         $foo = intval($_POST["indeks"][$i] );
         if ($foo>=0){
            $hapsuid = $_POST["idhapus"][$foo];
            $hapsutgl = $_POST["tglhapus"][$foo];
            $hapsubis = $_POST["bishapus"][$foo];
            mysqli_query($conn, "delete from menjadwalkan where id_jadwal = '$hapsuid' ");
            mysqli_query($conn, "delete from bangku where id_bis='$hapsubis' and tanggal_valid='$hapsutgl' ");
            header("Location: indeks.php?halaman=manajemen-bus");
         }
      }


   }
?>
<html>
   <head>
      <script src="js/script.js" type='text/javascript'></script>
      <script>
         var supir = <?= json_encode($listsupir); ?>;
         
         var listnamabis = <?= json_encode($listnamabis); ?>;
         var listidbis = <?= json_encode($listidbis); ?>;
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

            <form method="post" id = "hapusjadwal">
               
            <?php 
            $nomor = 0;
            while ( $barisjadwal = mysqli_fetch_assoc($tabelfull) ) :
               $idsupir = $barisjadwal['id_supir'];
               $supir = mysqli_query($conn, "select * from  supir where id_supir = '$idsupir'  ");
               $rowsupir = mysqli_fetch_assoc($supir);
               $namasupir = $rowsupir["nama_supir"];
            ?>
               <tr name = "curhapus[]">
                  <?php
                     $temp = $barisjadwal['id_bis'];
                     $nb = query("SELECT * from bis where id_bis = '$temp' ");
                  ?>
                  <td><?= $nb[0]["nama_bis"]; ?></td>
                  <td><?= $barisjadwal['kota_asal'] ?></td>
                  <td><?= $barisjadwal['kota_tujuan'] ?></td>
                  <td><?= $barisjadwal['tanggal_berangkat'] ?></td>
                  <td><?= $barisjadwal['jam_berangkat'] ?></td>
                  <td><?= $barisjadwal['harga_tiket'] ?></td>
                  <td><?= $barisjadwal['harga_pengiriman_paket'] ?></td>
                  <td><?= $namasupir ?></td>
                  <td>

                     <input type="hidden" name="idhapus[]" value = <?= $barisjadwal['id_jadwal'] ?>  >
                     <input type="hidden" name="tglhapus[]" value = <?= $barisjadwal['tanggal_berangkat'] ?>>
                     <input type="hidden" name="bishapus[]" value = <?= $barisjadwal['id_bis'] ?> >
                     <input type="hidden" name="indeks[]" id = "indeks<?= $nomor?>" value = "-1">
                     <button type="button" name="tombolhapus[]" class="hapus" id = "hapusbaris" onclick="simpansemua('modalDELETE');
                        var temp = document.getElementById('indeks<?= $nomor?>');
                        temp.value = <?=$nomor?>;
                     " > hapus </button>
                 
                  </td>
               </tr>
            <?php $nomor++; endwhile; ?>
            </form>
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

      <div class = "modal" id = "modalDELETE">
         <div class = "modal-content">
            <h2 style="color:orangered">HAPUS DATA?</h2>
            <p style="color:orangered">*perubahan yang dilakukan tidak bisa dipulihkan lagi*</p>
            <button onclick="kembali('modalDELETE')" class = "lastconfirm" id = "lastconfirm" name ="cancel" type="button">KEMBALI</button>
            <button class = "lastconfirm" id = "cancel" name ="lastconfirmdelete" type="submit" form = "hapusjadwal">HAPUS</button>
         </div>
      </div>
   </body>
</html>
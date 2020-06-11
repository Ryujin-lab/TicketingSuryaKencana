<!DOCTYPE html>
<?php
include "bus.php";
   $conn = mysqli_connect("localhost", "root", "", "suryakencana");
   $res = mysqli_query($conn, "select * from supir");

   if (isset($_POST["lastconfirm"])){
      for ($i = 0; $i < count($_POST["nama"]); $i++){
         $id   = $_POST["hp"][$i];
         $nama = $_POST["nama"][$i];
         $hp   = $_POST["hp"][$i];
         
         mysqli_query($conn, "INSERT INTO supir values(
            '$id',
            '$nama',
            '$hp',
            ''
         );");
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
?>
<html>
   <head>
      <script src="js/script.js"></script>
   </head>
   <body onload="createTableSupir()">  
      <div class="jadwal" id="currentjadwal" >
         <h2 style="text-align: center; color: rgb(26, 100, 230)">Supir Aktif</h2>
         <table class = "tabelbis" id= "current">
            <tr>
               <?php for ($i = 0; $i < count($supirhead); $i++):?>
                  <th><?=$supirhead[$i]?></th>
               <?php endfor; ?>
            </tr>

            
            <?php while ( $supir = mysqli_fetch_assoc($res) ):?>
            <tr>
               <td><?= $supir["nama_supir"]; ?></td>
               <td><?= $supir["no_hp_supir"]; ?></td>
               <td>
                  <button type="button" class="hapus" onclick="removeRow1(this)" >Hapus</button>
               </td>
            </tr>
            <?php endwhile; ?>
         </table>
      </div>

      <form class="hidden" id="divsupir" method="POST">
         <!-- table id = tabelsupir -->
         <h2 style="text-align: center; color: rgb(26, 100, 230)">Tambah Supir Baru</h2>
      </form>
      <div class="jadwal" style="text-align: center; padding:0px; border:none" >
         <button class="addbutton" type="button" onclick="cancel('divsupir','tabelsupir')">Buang perubahan</button>
         <button class="addbutton" type="button" onclick="addsupirrow()">Tambahkan data baru</button>
         <button class="addbutton" type="button" onclick="simpansemua('modal')">Simpan perubahan</button>
      </div>

      <div class = "modal" id = "modal">
         <div class = "modal-content">
            <h2 style="color:rgb(26, 100, 230)">SIMPAN PERUBAHAN?</h2>
            <p style="color:orangered">*perubahan yang dilakukan masih bisa diubah lagi*</p>
            <button onclick="kembali('modal')" class = "lastconfirm" id = "cancel" name ="cancel" type="button">KEMBALI</button>
            <button  class = "lastconfirm" id = "lastconfirm" name ="lastconfirm" type="submit" form = "divsupir">SIMPAN</button>
         </div>
      </div>
   </body>
</html>
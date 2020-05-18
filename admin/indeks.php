<!DOCTYPE html>
<?php
   if(!isset($_GET['halaman'])){
      $halaman = "manajemen-bus";
   }
   else {
      $halaman = $_GET['halaman']; 
   }
   
?>
<html>
<head>
   <link rel="stylesheet" href="css/style.css">
      <script src="js/script.js"></script>
   </head>

   <body>
      <img src="../img/logo.png" style="height: 50px; margin: 5px; ">
      <div class="topnav">
         <a href="indeks.php?halaman=manajemen-bus" class="inactive" id="bus">Manajemen Bus</a>
         <a href="indeks.php?halaman=manajemen-supir" class="inactive" id="supir">Manajemen Supir</a>
         <a href="indeks.php?halaman=manajemen-pelanggan"     class="inactive" id="pelanggan">Manajemen Pelanggan</a>
         <a href="indeks.php?halaman=bantuan"    class="inactive" id="Bantuan">Bantuan</a>
      </div>

      <?php
         if ($halaman == "indeks"){
            include 'manajemenbus.php';
            echo'
               <script>
                  document.getElementById("Beranda").className = "active";
               </script>
            ';
         }

         else if ($halaman == "manajemen-bus"){
            include 'manajemenbus.php';
            echo'
               <script>
                  document.getElementById("bus").className = "active";
               </script>
            ';
         }

         else if ($halaman == "manajemen-supir"){
            include 'manajemensupir.php';
            echo'
               <script>
                  document.getElementById("supir").className = "active";
               </script>
            ';
         }

         else if ($halaman == "manajemen-pelanggan"){
            include 'manajemenbus.php';
            echo'
            <script>
               document.getElementById("pelanggan").className = "active";
            </script>
            ';
         }
         
         else if ($halaman == "bantuan"){
            include 'bantuan.php';
            echo'
            <script>
               document.getElementById("Bantuan").className = "active";
            </script>
            ';
         }
         
      ?>
   </body>
</html>
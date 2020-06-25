<!DOCTYPE html>
<?php
   session_start();
   if (isset($_SESSION["username"])){
      if(!isset($_GET['halaman'])){
         $halaman = "manajemen-bus";
      }
      else {
         $halaman = $_GET['halaman']; 
      }
      if (isset($_GET['profil'])){
         header("Location:indeks.php?halaman=profil");
      }
   }

   else{
      header("Location:login.php");
   }

   if (isset($_GET['logout'])){
      session_destroy();
      header("Location:login.php");
   }
?>
<html>
<head>
   <link rel="stylesheet" href="css/style.css">
   <script src="js/script.js"></script>
</head>
   <body>
      <img src="../img/logo.png" style="height: 50px; margin: 5px; ">
      <form class= "rn" method="get">
         <button type="submit" name= "profil">ADMIN : <?= $_SESSION["username"] ?> </button>
         <button type="submit" name = "logout">LOGOUT</button>
      </form>
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
            include 'manajemenpelanggan.php';
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

         else if ($halaman == "profil"  ){
            include 'profil.php';
         }
         
      ?>
   </body>
</html>
<!DOCTYPE html>
<?php 
   include "bis.php";
?>
<html>
   <head>
      <link rel="stylesheet" href= "css/style.css">
      <script src="script.js"></script>
   </head>
   <body>
      <div class="jadwal" style="text-align:center">
         <h2 style="color:rgb(26,100,230);">Detail Pembayaran</h2>
         <p>Lakukan pembayaran paling telat dua jam dari sekarang atau pemesanan akan dibatalkan secara otomatis</p>
         <div class="uang">
            <a style="color:rgb(26,100,230); font-size:20px">pembayaran sebesar</a><br>
            <a>Rp. <?= $_SESSION["harga"]?></a>
         </div>
         <br><br>
         <a> nomor rekening transfer: </a><br>
         <div class="uang">
            0645172160 / BNI
         </div>
         <br>
         <br>
         <br>
         <form>
         <button type = "submit" class="trfbutton" onclick="">OK</button>
         </form>
      </div>
   </body>
</html>
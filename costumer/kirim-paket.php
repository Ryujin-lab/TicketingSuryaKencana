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
      <div class = "jadwal">
      <h2 style="text-align: center; color: rgb(26, 100, 230)">Detail Pengiriman Paket</h2>
         <form method="get">
         <table class = "pengirimanpaket">
            <tr>
               <td class="tittle">
                  Kotas asal
               </td>
               <td>:</td>
               <td colspan="4">
                  <div class = "dropdown">
                     <input onkeypress="return false;" autocomplete="off" onclick='toggleDp("dp-input-01")' class="dp" placeholder="Kota asal" type="text" id="input-01" name="asal" required
                        <?php
                           if (isset($_GET["caridestnasi"])){
                        ?>
                           value = <?=$_GET["asal"];?>
                        <?php 
                        }
                        ?>
                     >
                     <div class = "hidden-drop-asal" id="dp-input-01">
                        <?php foreach ($asal as $kotaAsal){ ?>
                           <a onclick = 'setValue( "input-01", this.innerHTML)'><?= $kotaAsal; ?></a>
                        <?php } ?>
                     </div>
                  </div>
               </td>
               <td rowspan="3" style="width:50%; text-align:center; color:rgb(26,100, 230);">
                  <h4>Harga pengiriman Paket</h3>
                  <a style="font-size:30px" >RP. 120.000</a>
               </td>   
            </tr>
            <tr >
               <td class="tittle">
                  Kota tujuan
               </td>
               <td>:</td>
               <td colspan="4">
                  <div class="dropdown">
                     <input onkeypress="return false;" autocomplete="off" onclick='toggleDp("dp-input-02")' class="dp" placeholder="Kota tujuan" type="text" id="input-02" name="tujuan" required
                        <?php
                           if (isset($_GET["caridestnasi"])){
                        ?>
                           value = <?=$_GET["tujuan"];?>
                        <?php 
                        }
                        ?>
                     >
                     <div class = "hidden-drop-asal" id="dp-input-02">
                        <?php foreach ($tujuan as $kotaTujuan){ ?>
                           <a onclick = 'setValue( "input-02", this.innerHTML)'><?=$kotaTujuan?></a>
                        <?php } ?>
                     </div>
                  </div>
               </td>
               
            </tr>
            <tr>
               <td class="tittle">
                  jumlah paket:
               </td>
               <td>:</td>
               <td  style="width:5%">
                  <a class="num" id = "kurang" onclick='setNum(this.id, "penumpang")' >-</a>
               </td>
               <td  style="width:10%">
                  <input class="penumpang" id="penumpang" name="paket" type = "text" 
                  <?php
                     if (isset($_GET["cari"])){ ?>
                           value = <?=$_GET['paket'];?>
                     <?php }
                        else{ ?>
                           value=1 ;
                     <?php   }
                     ?>
                  readonly>
               </td>
               <td  style="width:5%">
                  <a class="num" id="tambah" name="banyak" onclick='setNum(this.id, "penumpang")' >+</a>
               </td>
               <td style="width:30%">
               </td>
            </tr>
            <tr>
               <td class="tittle">
                  Nama pengirim
               </td>
               <td>:</td>
               <td colspan="4">
                  <input class="pelanggan" name="pengirim" placeholder="Nama pengirim" required>
               </td>
            </tr>
            <tr>
               <td class="tittle">
                  Nama penerima
               </td>
               <td>:</td>
               <td colspan="4">
                  <input class="pelanggan" name="penerima" placeholder="Nama penerima" required>
               </td>
            </tr>
            <tr>
               <td class="tittle">
                  No-HP penerima
               </td>
               <td>:</td>
               <td colspan="4">
                  <input type ="number" class="pelanggan" name="telppenerima" placeholder="No.hp penerima" required>
               </td>
            </tr>
            <tr>
               <td colspan="7" style="text-align: center"> 
                  <button class="dp" type="submit" name="caridestnasi" style="width: 20%;text-align: center" >Lanjut</button>
               </td>
            </tr>
         </table>
         </form>
      </div>
   </body>
</html>
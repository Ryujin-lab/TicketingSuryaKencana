<!DOCTYPE html>
<?php
include "bus.php";
?>
<html>
   <head>
      <script src="js/script.js"></script>
   </head>
   <body >
      <div class="jadwal" id="currentjadwal" >
         <h2 style="text-align: center; color: rgb(26, 100, 230)">Jadwal Aktif</h2>
         <table class = "tabelbis" id= "current">
            <tr>
               <?php for ($i = 0; $i < count($pelangganhead); $i++):?>
                  <th><?=$pelangganhead[$i]?></th>
               <?php endfor; ?>
            </tr>
            <?php for ($i = 0; $i < count($detailpelanggan); $i++):?>
            <tr>
               <?php for ($j = 0; $j < count($detailpelanggan[0]); $j++):?>
                  <td>
                     <?= $detailpelanggan[$i][$j]; ?>
                  </td>
               <?php endfor; ?>
               <td>
                  <button type="button" class="hapus" onclick="" >Lihat Rincian</button>
               </td>
            </tr>
            <?php endfor; ?>
         </table>
      </div>

      <div class="jadwal" id="detailfull">
         <h2 style="text-align: center; color: rgb(26, 100, 230)">Detail Penumpang Bus</h2>
            <?php for ($x = 1; $x<=7; $x++): ?>
            <div class="fully" >
               <table class = "bus">
                  <tr>
                     <td width="10%">
                        <img width="100px" src="../img/bus/ac0<?=$x?>.png">
                     </td>
                     <td rowspan="4">
                        <table class = "kursi">
                           <tr>
                              <td colspan="9">
                                 Daftar tempat duduk dan statusnya:
                              </td>
                           </tr>
                           <?php $indeks= 1;
                           $dibayar = array(1,5,6,9,2,4,20,45);
                           $dipesan = array(1,5,6,9,2,4,20,45);
                           for ($i = 0; $i <5; $i++): ?>
                           <tr>
                              <?php for ($j = 0; $j <9; $j++): ?>
                              <td class="nomor">
                                 <?=$indeks?>
                              </td>
                              <td>
                                 <select id="cars" name="carlist" form="carform">
                                    <option value="status" hidden selected disabled>Status</option>
                                    <option value="saab">dipesan</option>
                                    <option value="audi">dibayar</option>
                                 </select>
                              </td>
                              <?php  $indeks++; endfor; ?>
                           </tr>
                           <?php endfor; ?>
                        </table>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        01/02/2000
                     </td>
                  </tr>
                  <tr>
                     <td>
                        10:10 PM
                     </td>
                  </tr>
                  <tr>
                     <td>
                        45 penumpang
                     </td>
                  </tr>
                  <tr>
                     <td colspan="2" style="text-align: right">
                        <button type="button" class="simpan" onclick="simpansemua('modal')">simpan</button>
                     </td>
                  </tr>
               </table>
            </div>
            <?php endfor; ?>
      </div>
      <div class = "modal" id = "modal">
      <div class = "modal-content">
         <h2 style="color:rgb(26, 100, 230)">SIMPAN PERUBAHAN?</h2>
         <p style="color:orangered">*perubahan yang dilakukan masih bisa diubah lagi*</p>
         <button onclick="kembali('modal')" class = "lastconfirm" id = "cancel" name ="cancel" type="button">KEMBALI</button>
         <button onclick ="kembali('modal')" class = "lastconfirm" id = "lastconfirm" name ="lastconfirm" type="button" form = "detailpemesanan">SIMPAN</button>
      </div>
   </div>
   </body>
</html>
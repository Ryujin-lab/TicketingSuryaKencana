<!DOCTYPE html>
<?php
include "bus.php";
$conn = mysqli_connect("localhost", "root", "", "suryakencana");
$jadwal = mysqli_query($conn, "select * from menjadwalkan");

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
                  <th ><?=$pelangganhead[$i]?></th>
               <?php endfor; ?>
            </tr>

            <?php while ( $val = mysqli_fetch_assoc($jadwal) ):
               $strbis = $val["id_bis"];
               $strsupir = $val["id_supir"];
               $dipesan =  mysqli_fetch_assoc (mysqli_query($conn, "select count(keterangan) as jumlah from bangku where id_bis = '$strbis' and keterangan ='dipesan' " ) )["jumlah"];
               $dibayar =  mysqli_fetch_assoc (mysqli_query($conn, "select count(keterangan) as jumlah from bangku where id_bis = '$strbis' and keterangan ='dibayar' " ) )["jumlah"];
               $kosong =  mysqli_fetch_assoc (mysqli_query($conn, "select count(keterangan) as jumlah from bangku where id_bis = '$strbis' and keterangan ='kosong' " ) ) ["jumlah"];
               $supir = mysqli_fetch_assoc (mysqli_query($conn, "select * from supir where id_supir = '$strsupir'"))["nama_supir"];
            ?>
            <tr>
               <td> <?=$val["id_bis"]; ?></td>
               <td> <?=$val["tanggal_berangkat"]; ?></td>
               <td> <?=$val["jam_berangkat"]; ?></td>
            
               <td> <?= $kosong; ?></td>
               <td> <?= $dipesan; ?></td>
               <td> <?= $dibayar; ?></td>
               <td> <?= $supir; ?></td>
            </tr>
            <?php endwhile; ?>
         </table>
      </div>

      <div class="jadwal" id="detailfull">
         <h2 style="text-align: center; color: rgb(26, 100, 230)">Detail Penumpang Bus</h2>
            <?php 
            $jadwal = mysqli_query($conn, "select * from menjadwalkan");
            $head = mysqli_fetch_assoc($jadwal);
            while ($head = mysqli_fetch_assoc($jadwal)): 
               $id_bis = $head["id_bis"];
               $resbangku = mysqli_query($conn, "SELECT * FROM bangku WHERE id_bis='$id_bis' ORDER BY bangku.id_bis ASC, bangku.no_bangku ASC");
            ?>
            <div class="fully" >
               <table class = "bus">
                  <tr>
                     <td width="10%">
                        <img width="100px" src="../img/bus/<?=$id_bis?>.png">
                     </td>
                     <td rowspan="4">
                        <table class = "kursi">
                           <tr>
                              <td colspan="9">
                                 Daftar tempat duduk dan statusnya:
                              </td>
                           </tr>
                           <?php $indeks= 1;
                           for ($i = 0; $i <5; $i++): ?>
                           <tr>
                              <?php for ($j = 0; $j <9; $j++): ?>
                              <td style = "border: 1px solid rgb(26, 100, 230, 0.3);">
                                 <table class = "sub">
                                    <tr colspan="2">
                                       user<?= rand(0,999);?>:
                                    </tr>
                                    <tr>
                                       <td class="nomor">
                                          <?=$indeks?>
                                       </td>
                                       <td>
                                          <select id="cars" name="carlist" form="carform">
                                             <option value="status" hidden selected disabled>Status</option>
                                             <option value="saab" style="color: rgb (26, 100, 230)">dipesan</option>
                                             <option value="audi">dibayar</option>  
                                             <option value="batal">batal</option>
                                          </select>
                                       </td>
                                    </tr>
                                 </table>
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
            <?php endwhile; ?>
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
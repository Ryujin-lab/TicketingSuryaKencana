<?php
   $tiket= 120000;
?>
<!DOCTYPE html>
<html>
   <head>
      <link rel="stylesheet" href= "css/style.css">
      <script src="script.js"></script>
   </head>
   <body>
   <?php if (isset($_GET["pesan"]) || isset($_GET["oke"]) || isset($_GET[""])){ ?>
   <div class="jadwal">
      <h2 style ="color:rgb(26, 100, 230); text-align:center;">Pemesanan Tiket</h2>
      <img style = "margin-top:0px"class="bis_img" src="../img/bus/<?=$_GET['selectedBis'];?>.png">
      <table class="search-result">
         <tr>
            <td style="border:none; background-color:rgba(0, 0, 0, 0);">
               Kota asal
            </td>
            <td style="border:none; background-color:rgba(0, 0, 0, 0);">
            :
            </td>
            <td >
            <?=$_GET['selectedAsal'];?>
            </td>
         </tr>
         <tr>
            <td style="border:none; background-color:rgba(0, 0, 0, 0);">
               Kota tujuan
            </td>
            <td style="border:none; background-color:rgba(0, 0, 0, 0);">
            :
            </td>
            <td>
               <?=$_GET['selectedTujuan'];?>
            </td>
         </tr>
         <tr>
            <td style="border:none; background-color:rgba(0, 0, 0, 0);">
               Keberangkatan
            </td>
            <td style="border:none; background-color:rgba(0, 0, 0, 0);">
            :
            </td>
            <td>
               <?=$_GET["selectedTanggal"];?>
            </td>
         </tr>

         <div class="jumlah">
            <form method="GET" id="rr">
               <input type="hidden" name="halaman" value="readypesan">
               <input type="hidden" name="selectedBis" value=<?=$_GET['selectedBis'];?>>
               <input type="hidden" name="selectedAsal" value=<?=$_GET['selectedAsal'];?>>
               <input type="hidden" name="selectedTujuan" value=<?=$_GET['selectedTujuan'];?>>
               <input type="hidden" name="selectedTanggal" value=<?=$_GET['selectedTanggal'];?>>
               <div class="inputpenumpang">
               <h2>HARGA TIKET : RP. <?= $tiket?></h2>
            </form>
         </div>
      </table>
   </div>
   
   <div class = "jadwal">
      <h4>Detail pemesanan : </h4>
      <table class="detailall">
         <tr>
            <th>No.</th>
            <th> Nama penumpang</th>
            <th> Jenis Kelamin</th>
            <th> No.Telepon</th>
            <th> Penjemputan</th>
            <th> No.Bangku</th>
            <th> Pesan tambahan</th>
         </tr>
         <form method="get" id="detailpemesanan">
         <?php for ($i = 1; $i <= $_GET['penumpang']; $i++): ?>
            <tr>
               <td class="konfirmasi" id = "no"><?=$i?>
                  <label for="nama<?=$i?>">Go</label>
               </td>
               
               <td class="konfirmasi" >
                  <input class="konfirmasiinput" name = "namaoke<?=$i?>" id="namaoke<?=$i?>" value=""  required>
               </td>
               <td class="konfirmasi" >
                  <input class="konfirmasiinput" name = "kelamikoke<?=$i?>" id="kelamikoke<?=$i?>" value="" required>
               </td>
               <td class="konfirmasi" >
                  <input class="konfirmasiinput" name = "teleponoke<?=$i?>" id="teleponoke<?=$i?>" value="" required>
               </td>
               <td class="konfirmasi" >
                  <input class="konfirmasiinput" name ="jemputoke<?=$i?>" id="jemputoke<?=$i?>" value="" required>
               </td>
               <td class="konfirmasi" >
                  <input class="konfirmasiinput" name = "bangkuoke<?=$i?>" id="bangkuoke<?=$i?>" value="" required>
               </td>
               <td class="konfirmasi" >
                  <input class="konfirmasiinput" name = "pesanoke<?=$i?>" id="pesanoke<?=$i?>" value="">
               </td>
            </tr>
         <?php endfor; ?>
         <tr>
            <td style="border:none; text-align:center;" colspan="7">
               <h4>Total Harga Rp. <?=$tiket*$_GET["penumpang"]?> </h4>
            </td>
         </tr>
         <tr>
            <td style="border:none;" colspan="7">
            <input type="hidden" name="halaman" value="konfirmasipesan">
            <input type="hidden" name="penumpang" value=<?= $_GET["penumpang"];?> >
            <input type="hidden" name="totaltiket" value=<?=$tiket*$_GET["penumpang"]?>>
            <button type="button" class= "submitall" id="detailpemesanan" onclick="doublecheck()";>Lanjutkan ke pembayaran</button>
            </td>
         </tr>
         </form>
      </table>
   </div>
   <?php if(isset($_GET["pesan"])):?>
   <div class = "jadwal">
      <h4>Detail penumpang : </h4>
      <?php for ($i = 1; $i<=$_GET["penumpang"] ; $i++) :?>
         <div class = "tiket">
            <b>Penumpang ke-<?=$i?></b>
            <hr style="height:1px; background-color:rgba(26, 100, 230, 0.h-50); border-width:0px">

            <form method="get">
               <table class="detail">
                  <tr>
                     <td>Identitas Penumpang : </td>
                     <td></td>
                     <td></td>
                     <td>Pilih Bangku : </td>
                  </tr>
                  <tr>
                     <td class = "label" >
                        <label for="nama<?=$i?>">Nama penumpang</label>
                     </td>
                     <td class="titik">:</td> 
                     <td class="input" >
                        <input class = "pelanggan" name="nama<?=$i?>" id = "nama<?=$i?>" placeholder="Nama sesuai KTP"><br>
                     </td>
                     <td rowspan="5" class="seats">   
                        <?php
                        for ($j = 0; $j <45; $j++){
                        ?>
                        <a class = "listseat" id= "nobangku<?=$j?>" onclick='ambil(this.id,"bangkupilih<?=$i?>" )' ><?=$j+1?></a>
                        <?php if ($j == 1){ ?>
                        <a class = 'listseatdisable' style="width : 5%; visibility:hidden;" ></a> 
                        <a class = 'listseatdisable' style=" color : rgb(26, 100, 230) ">Kenek</a>
                        <a class = 'listseatdisable' style=" color : rgb(26, 100, 230) ">Supir</a>
                        <?php 
                        }

                        else if ($j == 44){
                           echo"
                           <a class = 'listseatdisable' style= 'color : rgb(26, 100, 230)'>Toilet</a>
                           ";
                        }

                        else if( ($j+1)%4 == 0){
                           echo"<a class = 'listseatdisable' style='width : 5%; visibility:hidden; '></a>";
                        }
                        }
                        ?>
                        <text style="color: orangered">*merah</text> : sudah dipesan
                     </td>
                  </tr>
                  
                  <tr>
                     <td class = "label">
                        <label for="kelamin<?=$i?>">Jenis Kelamin</label><br>
                     </td>
                     <td class="titik">:</td> 
                     <td class="input">
                        <select style="width:100%" class="pelanggan" name="kelamin<?=$i?>" id="kelamin<?=$i?>" placeholder="Kelamin"><br>
                           <option value="Laki-laki">Laki-laki</option>
                           <option value="Perempuan">Perempuan</option>
                           <option disabled selected hidden></option>
                        </select>
                     </td>
                  </tr>
                  
                  <tr>
                     <td class = "label">
                        <label for="noHP<?=$i?>">No.Telepon</label><br>
                     </td>
                     <td class="titik">:</td> 
                     <td class="input">
                        <input type = "number" class = "pelanggan" name="noHP<?=$i?>" id="noHP<?=$i?>" placeholder="No.Telp/HP aktif"><br>
                     </td>
                  </tr>
                  
                  <tr>
                     <td class = "label">
                        <label for="lokasi<?=$i?>">Penjemputan</label>
                     </td>
                     <td class="titik">:</td> 
                     <td class="input">
                        <input class = "pelanggan" name="lokasi<?=$i?>" id="lokasi<?=$i?>" placeholder="Lokasi penjemputan">
                     </td>
                  </tr>

                  <tr>
                     <td class= "pesantambahan" colspan="3" rowspan="2" style="width:50%;">
                        <textarea style="resize: none; margin: 0px; height:100px; width: 95%;" class = "pelanggan"  name="pesan<?=$i?>" id="pesan<?=$i?>"  placeholder="Pesan tambahan...." ></textarea> <br>
                     </td>
                  </tr>

                  <tr>
                     <td class="input">
                        <label for="bangkupilih<?=$i?>">Bangku terpilih : </label>
                        <input class = "pelanggan" name="bangku<?=$i?>" id="bangkupilih<?=$i?>" placeholder="Pilih bangku diatas..." readonly>
                     </td>
                  </tr>

                  <tr>
                     <td colspan="4">
                        <a type="submit" class="buttonconfirm" onclick='berinilai(<?=$i?>, "nama<?=$i?>", "kelamin<?=$i?>", "noHP<?=$i?>", "lokasi<?=$i?>", "bangkupilih<?=$i?>", "pesan<?=$i?>"  ) '> simpan</a>
                        <button type="reset" class="buttonconfirm"> cancel </button>
                     </td>
                  </tr>
               </table>
            </form>
         </div>
      <?php endfor;?>
   </div>

   <?php endif; ?>
   
   <div class = "modal" id = "modal">
      <div class = "modal-content">
         <h2 style="color:rgb(26, 100, 230)">LANJUTKAN KE HALAMAN PEMBAYARAN?</h2>
         <p style="color:orangered">*pastikan untuk mengecek kembali form pemesanan*</p>
         <button onclick="closedoublecheck()" class = "lastconfirm" id = "cancel" name ="cancel" type="button">KEMBALI</button>
         <button class = "lastconfirm" id = "lastconfirm" name ="lastconfirm" type="submit" form = "detailpemesanan">LANJUTKAN</button>
      </div>
   </div>
   <?php } ?>

   
   </body>
</html>
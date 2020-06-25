<?php 
   include "bis.php";
   include "logic.php";

   $tabeljadwal = query("select * from menjadwalkan");

   $asal = array();
   $tujuan = array();
   for ($i = 0; $i < count($tabeljadwal); $i++){
      $asal[] = $tabeljadwal[$i]['kota_asal'];
      $tujuan[] = $tabeljadwal[$i]['kota_tujuan'];
   }
   $asal = array_unique($asal);
   $tujuan = array_unique($tujuan);

   if (isset($_POST["cari"]) ){
      $asall = $_POST["asal"];
      $tujuann = $_POST["tujuan"];
      $q1 = "SELECT * from menjadwalkan where kota_asal = '$asall' and kota_tujuan = '$tujuann' ";
      $searchresult = query( $q1 );
   }

?>

<body>
   <?php if(!isset($_POST['pesan'])) { ?>
   <form class = "jadwal" id="jadwal" method="post">
      <h2 style="text-align: center; color: rgb(26, 100, 230)">Keberangkatan</h2>
      <input type="hidden" name="halaman" value="pesan-tiket">
      <table class="ptiket" >
         <tr>
            <td  style="width : 30%">
               <div class = "dropdown">
                  <input 
                     onkeypress="return false;" 
                     autocomplete="off" 
                     onclick='toggleDp("dp-input-01")' 
                     class="dp" 
                     placeholder="Kota asal" 
                     type="text" 
                     id="input-01" 
                     name="asal"
                     required

                     <?php
                        if (isset($_POST["cari"])){
                     ?>
                        value = <?=$_POST["asal"];?>
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

            <td style="width : 30%">
               <div class="dropdown">
                  <input 
                     onkeypress="return false;" 
                     autocomplete="off" 
                     onclick='toggleDp("dp-input-02")' 
                     class="dp" 
                     placeholder="Kota tujuan" 
                     type="text" 
                     id="input-02" 
                     name="tujuan" 
                     required

                     <?php
                        if (isset($_POST["cari"])){
                     ?>
                        value = <?=$_POST["tujuan"];?>
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
            <td style="width : 17%; font-size:14px; text-align:justify">
               Jumlah penumpang :
            </td>
            <td style="width : 5%">
               <a class="num" id = "kurang" onclick='setNum(this.id, "penumpang")' >-</a>
            </td>
            <td style="width : 7%">
               <input class="penumpang" id="penumpang" name="penumpang" type = "text" 
                     <?php
                        if (isset($_POST["cari"])){ ?>
                              value = <?=$_POST['penumpang'];?>
                        <?php }
                           else{ ?>
                              value=1 ;
                        <?php   }
                        ?>
                     readonly>
            </td>
            <td style="width : 5%"  >
               <a class="num" id="tambah" name="banyak" onclick='setNum(this.id, "penumpang")' >+</a>
            </td>
            <td>

            </td>
            <td> 
               <button type="submit" class="dp" style="float:right; width:100%;" name = "cari" >Cari</button>
            </td>
         </tr>
      </table>
   </form>
   <?php } ?>
   <?php
   if (isset($_POST["cari"])){ ?>
   <div class="jadwal">
      <h5>Hasil Pencarian :</h5>
      <?php
         if(isset($_POST["cari"])){

            for ($i = 0; $i<count($searchresult); $i++){
               $idj = $searchresult[$i]['id_jadwal'];
               $coun = query("select count(keterangan) as con from bangku where id_jadwal = '$idj' ")[0]['con'];
               $coun = intval($coun);
               
               $pen = intval($_POST['penumpang']);
               $bangku = query("select * from bangku where id_jadwal = '$idj' order by no_bangku asc" );
               $kurang = 1;
               if($pen<=$coun):
                  $kurang = 0;
            ?>
            <a class="bis-button">
            <form method="get" id = "okefulldone" >
               <table class="search-result" style="width:100%; margin:0;">
                  <tr>
                     <td rowspan="3" text-align="center" padding="0px">
                        <img class="bis_img" src="../img/bus/<?=$searchresult[$i]['id_bis'] ?>.png">
                     </td>
                     <td rowspan="3" width="10%"></td>
                     <td width="20%">
                        Kota asal
                     </td>
                     <td>:</td>
                     <td width="20%">
                        <?=$searchresult[$i]["kota_asal"];?>
                     </td>
                     <td rowspan="3" rowspan="3" width="10%" >
                        <div class="dropdownseat">
                           <a class = "left" style="font-size:12px; width:100%" onclick='dudukan("bangkubangku<?=$i?>")' >Kursi tersedia</a>
                           <div class="seatdrop" id = "bangkubangku<?=$i?>">
                              <?php

                              for ($j = 0; $j <45; $j++){
                                 $col = $bangku[$j]["no_bangku"];
                                 $ket = $bangku[$j]["keterangan"];
                              ?>
                              <a class = "listseat"
                                 <?php 
                                    if ($ket === "dipesan" || $ket === "dibayar"){ ?>
                                       style="color:orangered";
                                 <?php 
                                    }
                                 ?>
                              > <?=$col?> 
                              </a>

                              <?php if ($j == 1){ ?>
                              <a class = 'listseat' style="width : 5%; visibility:hidden;" ></a> 
                              <a class = 'listseat' style=" color : rgb(26, 100, 230) ">Kenek</a>
                              <a class = 'listseat' style=" color : rgb(26, 100, 230) ">Supir</a>
                              <?php 
                              }
                              else if ($j == 44){
                                 echo"
                                 <a class = 'listseat' style= 'color : rgb(26, 100, 230)'>Toilet</a>
                                 ";
                              }
                              else if( ($j+1)%4 == 0){
                                 echo"<a class = 'listseat' style='width : 5%; visibility:hidden;'></a>";
                              }
                              }
                              ?>
                              <text style="color: orangered; font-size:12px;">*merah: sudah dipesan </text> 
                           </div>
                        </div>
                     </td>
                     <td rowspan="3" width="20%"></td>
                     <td rowspan="3" width="20%">
                        <button class = "right" name = "pesan" type="button" onclick='
                           document.getElementById("okefulldone").submit();
                        '>Pesan</button>
                     </td>
                  </tr>
                  <tr>
                     <td >
                        Kota tujuan
                     </td>
                     <td >:</td>
                     <td><?=$searchresult[$i]["kota_tujuan"];?></td>
                  </tr>
                  <tr>
                     <td >
                        Keberangkatan
                     </td>
                     <td >
                     :
                     </td>
                     <td><?=$searchresult[$i]["tanggal_berangkat"]." ". $searchresult[$i]["jam_berangkat"] ;?></td>
                  </tr>
                  <input type="hidden" name="penumpang" value="<?= $_POST["penumpang"] ?>">
                  <input type="hidden" name="selectedBis" value=<?=$searchresult[$i]['id_bis'];?>>
                  <input type="hidden" name="selectedAsal" value=<?=$searchresult[$i]['kota_asal'];?>>
                  <input type="hidden" name="selectedTujuan" value=<?=$searchresult[$i]['kota_tujuan'];?>>
                  <input type="hidden" name="selectedTanggal" value=<?=$searchresult[$i]['tanggal_berangkat']." ".$searchresult[$i]['jam_berangkat'];?> >
                  <input type="hidden" name="halaman" value="readypesan">
                  <input type="hidden" name="pesan" value="">
                  <input type="hidden" name="id_jadwal" value = <?=$searchresult[$i]['id_jadwal']?> >
               </table>
            </form>
            </a>
            <?php
            endif;
            }
            if( count($searchresult)<=0 || $kurang == 1){
               echo"
                  <p>tidak ada jadwal yang sesuai...</p>
               ";
            }
         }
      ?>
   </div>
   <?php }?> 
      
</body>

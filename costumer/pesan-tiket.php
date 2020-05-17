<?php 
   include "bis.php";
?>

<head>
   <link rel="stylesheet" href= "css/style.css">
   <script src="script.js"> </script>
</head>

<body>
   <?php if(!isset($_GET['pesan'])) { ?>;
   <form class = "jadwal" id="jadwal" method="GET">
      <h2 style="text-align: center; color: rgb(26, 100, 230)">Keberangkatan</h2>
      <input type="hidden" name="halaman" value="pesan-tiket">
      <table class="ptiket" >
         <tr>
            <td  style="width : 30%">
               <div class = "dropdown">
                  <input onkeypress="return false;" autocomplete="off" onclick='toggleDp("dp-input-01")' class="dp" placeholder="Kota asal" type="text" id="input-01" name="asal" required
                     <?php
                        if (isset($_GET["cari"])){
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

            <td style="width : 30%">
               <div class="dropdown">
                  <input onkeypress="return false;" autocomplete="off" onclick='toggleDp("dp-input-02")' class="dp" placeholder="Kota tujuan" type="text" id="input-02" name="tujuan" required
                     <?php
                        if (isset($_GET["cari"])){
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
            <td style="width : 17%; font-size:14px; text-align:justify">
               Jumlah penumpang :
            </td>
            <td style="width : 5%">
               <a class="num" id = "kurang" onclick='setNum(this.id, "penumpang")' >-</a>
            </td>
            <td style="width : 7%">
               <input class="penumpang" id="penumpang" name="penumpang" type = "text" 
                     <?php
                        if (isset($_GET["cari"])){ ?>
                              value = <?=$_GET['penumpang'];?>
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
   if (isset($_GET["cari"])){ ?>
   <div class="jadwal">
      <h5>Hasil Pencarian :</h5>
      <?php
         if(isset($_GET["cari"])){
            $a = $_GET["asal"];
            $b = $_GET["tujuan"];
            $n = $_GET["penumpang"];
            $row = sizeof($bis);
            $col = sizeof($bis[0]);
            for ($i = 0; $i<$row; $i++){
               if ( $bis[$i][1] === $a & $bis[$i][2]===$b & $n<=$bis[$i][4] ){
                  $ditemukan = true;
            ?>
            <a class="bis-button">
            <form method="get">
               <img class="bis_img" src="../img/bus/<?=$bis[$i][0]?>.png">
               <table class="search-result">
                  <tr>
                     <td style="border:none; background-color:rgba(0, 0, 0, 0);">
                        Kota asal
                     </td>
                     <td style="border:none; background-color:rgba(0, 0, 0, 0);">
                     :
                     </td>
                     <td >
                        <?=$bis[$i][1];?>
                     </td>
                     <td rowspan="3" style="border:none; background-color:rgba(0, 0, 0, 0);">
                        <div class="dropdownseat">
                           <a class = "left" onclick='dudukan("bangkubangku<?=$i?>")' >Lihat kursi tersedia</a>
                           <div class="seatdrop" id = "bangkubangku<?=$i?>">
                              <?php
                              for ($j = 0; $j <45; $j++){
                                 $col = $bis[$i][5][$j];
                              ?>

                              <a class = "listseat"
                                 <?php 
                                    if ($col === "dipesan"){ ?>
                                       style="color:orangered";
                                 <?php 
                                    }
                                 ?>
                              > <?=$j+1?> </a>
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
                                 echo"<a class = 'listseat' style='width : 5%; visibility:hidden; '></a>";
                              }
                              }
                              ?>
                              <text style="color: orangered; font-size:12px;">*merah: sudah dipesan </text> 
                           </div>
                        </div>
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
                        <?=$bis[$i][2];?>
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
                        <?=$bis[$i][3];?>
                     </td>
                  </tr>
                  <input type="hidden" name="penumpang" value="<?= $_GET["penumpang"] ?>">
                  <input type="hidden" name="halaman" value="readypesan">
                  <input type="hidden" name="selectedBis" value=<?=$bis[$i][0];?>>
                  <input type="hidden" name="selectedAsal" value=<?=$bis[$i][1];?>>
                  <input type="hidden" name="selectedTujuan" value=<?=$bis[$i][2];?>>
                  <input type="hidden" name="selectedTanggal" value=<?=$bis[$i][3];?>>
                  <button class = "right" name = "pesan">Pesan</button>
               
               </table>
               </form>
            </a>
            <?php
               }
            }
            if(!$ditemukan){
               echo"
                  <p>tidak ada jadwal yang sesuai...</p>
               ";
            }
         }
      ?>
   </div>
   <?php }?> 
   
</body>

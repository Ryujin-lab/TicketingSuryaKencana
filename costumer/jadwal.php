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
      <form class = "jadwal">
         <h2 style="text-align: center; color: rgb(26, 100, 230)">Jadwal Bus</h2>
         <table class="carijadwal">
            <tr>
               <td  style="width : 40%">
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
                        value=""
                     >
                     <div class = "hidden-drop-asal" id="dp-input-01">
                        <?php foreach ($asal as $kotaAsal){ ?>
                           <a onclick = 'setValue( "input-01", this.innerHTML)'><?= $kotaAsal; ?></a>
                        <?php } ?>
                     </div>
                  </div>
               </td>

               <td style="width : 40%">
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
                        value=""
                     >
                     <div class = "hidden-drop-asal" id="dp-input-02">
                        <?php foreach ($tujuan as $kotaTujuan){ ?>
                           <a onclick = 'setValue( "input-02", this.innerHTML)'><?=$kotaTujuan?></a>
                        <?php } ?>
                     </div>
                  </div>     
               </td>
               <td width="5%"></td>
               <td >
                  <button type="reset" class="dp" style="width:100%;" name = "cari" >Bersihkan</button>
               </td>
               <td style="width : 10%"> 
                  <button onclick="find()" type="button" class="dp" style="width:100%;text-align: center;" name = "cari" >Cari</button>
               </td>
            </tr>
         </table>
      </form>
      <div class="jadwal">
         <ul style = "
            list-style-type: none;
            padding: 0;
            margin: 0;
         " id="buss">
            <?php
            $ditemukan = true;
            $row = sizeof($bis);
            $col = sizeof($bis[0]);
            for ($i = 0; $i<$row; $i++){
            ?>
               <li class="bis-button" id="listbus<?=$i?>">
                  <table class="search-result">
                     <tr>
                        <td rowspan="3" style="width:10%; text-align:center;">
                           <img class="bis_img" src="../img/bus/<?=$bis[$i][0]?>.png">
                        </td>
                        <td style="width : 20%; border:none; background-color:rgba(0, 0, 0, 0);">
                           Kota asal
                        </td>
                        <td style="border:none; background-color:rgba(0, 0, 0, 0);">:</td>

                        <td id="asal<?=$i?>"><?=$bis[$i][1];?></td>

                        <td rowspan="3" style="width : 20%; background-color:rgba(0, 0, 0, 0);">
                           <div class="dropdownseat" text-align="right">
                              <a class = "left" onclick='dudukan("bangkubangku<?=$i?>")'>Lihat kursi tersedia</a>
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
                        </td id="tujuan<?=$i?>">
                        <td id="tujuan<?=$i?>"><?=$bis[$i][2];?></td>
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
                  </table>
               </li>
            <?php
            }
            ?>
         </ul>

         <?php
            if(!$ditemukan){
               echo"
                  <p>tidak ada jadwal yang sesuai...</p>
               ";
            }
         ?>
         
      </div>
   </body>
</html>
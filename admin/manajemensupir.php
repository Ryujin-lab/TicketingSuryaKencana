<!DOCTYPE html>
<?php
include "bus.php";
?>
<html>
   <head>
      <script src="js/script.js"></script>
   </head>
   <body onload="createTableSupir()">  
      <div class="jadwal" id="currentjadwal" >
         <h2 style="text-align: center; color: rgb(26, 100, 230)">Supir Aktif</h2>
         <table class = "tabelbis" id= "current">
            <tr>
               <?php for ($i = 0; $i < count($supirhead); $i++):?>
                  <th><?=$supirhead[$i]?></th>
               <?php endfor; ?>
            </tr>
            <?php for ($i = 0; $i < count($supir); $i++):?>
            <tr>
               <?php for ($j = 0; $j < count($supir[0]); $j++):?>
                  <td>
                     <?= $supir[$i][$j]; ?>
                  </td>
               <?php endfor; ?>
               <td>
                  <button type="button" class="hapus" onclick="removeRow1(this)" >Hapus</button>
               </td>
            </tr>
            <?php endfor; ?>
         </table>
      </div>

      <div class="hidden" id="divsupir">
         <!-- table id = tabelsupir -->
         <h2 style="text-align: center; color: rgb(26, 100, 230)">Tambah Supir Baru</h2>
      </div>
      <div class="jadwal" style="text-align: center; padding:0px; border:none" >
         <button class="addbutton" type="button" onclick="cancel('divsupir','tabelsupir')">Buang perubahan</button>
         <button class="addbutton" type="button" onclick="addsupirrow()">Tambahkan data baru</button>
         <button class="addbutton" type="button" onclick="">Simpan perubahan</button>
      </div>
   </body>
</html>
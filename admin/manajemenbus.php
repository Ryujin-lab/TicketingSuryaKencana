<!DOCTYPE html>
<?php
include "bus.php";
?>
<html>
   <head>
      <script src="js/script.js"></script>
   </head>
   <body onload="createTable()">
      <div class="jadwal" id="currentjadwal" >
         <h2 style="text-align: center; color: rgb(26, 100, 230)">Jadwal Aktif</h2>
         <table class = "tabelbis" id= "current">
            <tr>
               <?php for ($i = 0; $i < count($bishead); $i++):?>
                  <th><?=$bishead[$i]?></th>
               <?php endfor; ?>
            </tr>
            <?php for ($i = 0; $i < count($detailjadwal); $i++):?>
            <tr>
               <?php for ($j = 0; $j < count($detailjadwal[0]); $j++):?>
                  <td>
                     <?= $detailjadwal[$i][$j]; ?>
                  </td>
               <?php endfor; ?>
               <td>
                  <button type="button" class="hapus" onclick="removeRow1(this)" >Hapus</button>
               </td>
            </tr>
            <?php endfor; ?>
         </table>
      </div>

      <div class="hidden" id="jadwal">
         <!-- table id = empTable -->
         <h2 style="text-align: center; color: rgb(26, 100, 230)">Tambah Jadwal Baru</h2>
      </div>

      <div class="jadwal" style="text-align: center; padding:0px; border:none" >
         <button class="addbutton" type="button" onclick="cancel('jadwal','empTable')">Buang perubahan</button>
         <button class="addbutton" type="button" onclick="addRow()">Tambahkan data baru</button>
         <button class="addbutton" type="button" onclick="">Simpan perubahan</button>
      </div>
   </body>
</html>
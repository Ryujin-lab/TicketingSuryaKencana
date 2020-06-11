<?php
   $conn = mysqli_connect("localhost", "root", "", "suryakencana");
   for ($i= 0; $i<10; $i++){
      $v = 'ac'.($i+1);
      for ($j = 1; $j<46; $j++ ){
         $idbangku = $v."-".$j;
         $nobangku = $j;
         $keterangan = "kosong";
         mysqli_query($conn, "INSERT INTO bangku ( id_bis , id_bangku , no_bangku ,keterangan ) VALUES ( '$v' , '$idbangku', '$nobangku', '$keterangan' ) ; ");
      }
   }
?>
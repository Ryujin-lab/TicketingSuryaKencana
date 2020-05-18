<?php
$link = "indeks.php?halaman=pesan-tiket";

$keterangan = array ("dipesan", "siap");
function randSeat($ket){
   $seat  = array();
   for ($i=0; $i<45 ; $i++) {
      $seat[] = $ket[ rand(0,1) ];
   }
   return $seat;
}

$paket = 40000;

$ditemukan = false;

$bangku = array(randSeat($keterangan), randSeat($keterangan), randSeat($keterangan),randSeat($keterangan));

$bis= array (  array("ac01","bali", "mataram", "01-01-2020 15:00", array_count_values($bangku[0])["siap"], $bangku[0] ), 
               array("ac02","bali", "mataram", "02-01-2020 20:00", array_count_values($bangku[1])["siap"],  $bangku[1]),
               array("ac03", "bali", "surabaya", "02-01-2020 10:00",array_count_values($bangku[2])["siap"], $bangku[2]), 
               array("ac04", "bima", "bali", "02-01-2020 20:00", array_count_values($bangku[3])["siap"], $bangku[3]),
               array("ac05", "mataram", "surabaya", "02-01-2020 20:00", array_count_values($bangku[3])["siap"], $bangku[3]),
               array("ac06", "sumatra", "jakarta", "02-01-2020 15:00", array_count_values($bangku[3])["siap"], $bangku[3]),
               array("ac07", "jakarta", "surabaya", "02-01-2020 10:00", array_count_values($bangku[3])["siap"], $bangku[3]),
               array("ac08", "bandung", "jakarta", "02-01-2020 20:00", array_count_values($bangku[3])["siap"], $bangku[3]),
               array("ac09", "bima", "jakarta", "02-01-2020 15:00", array_count_values($bangku[3])["siap"], $bangku[3]),
            );
$asal = array();
$tujuan = array();
for ($i = 0; $i<count($bis); $i++){
   $asal[] = $bis[$i][1];
   $tujuan[] = $bis[$i][2];
}
$asal = array_unique($asal);
$tujuan = array_unique($tujuan);
?>
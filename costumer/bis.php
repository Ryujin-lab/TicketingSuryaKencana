<?php
$asal = array("bima", "mataram", "bali", "jawa");
$tujuan = array("bima", "mataram", "bali", "surabaya");
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

$bis= array (  array("ac01","bali", "mataram", "01-01-2020", array_count_values($bangku[0])["siap"], $bangku[0] ), 
               array("ac01","bali", "mataram", "02-01-2020", array_count_values($bangku[1])["siap"],  $bangku[1]),
               array("ac02", "bali", "surabaya", "02-01-2020",array_count_values($bangku[2])["siap"], $bangku[2]), 
               array("ac03", "nusa", "surabaya", "02-01-2020", array_count_values($bangku[3])["siap"], $bangku[3])
            );
?>
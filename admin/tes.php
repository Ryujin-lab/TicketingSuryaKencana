<?php
   $conn = mysqli_connect("localhost", "root", "", "suryakencana");
   $resbangku = mysqli_query($conn, "SELECT * FROM bangku WHERE id_bis='ac1' ORDER BY bangku.id_bis ASC, bangku.no_bangku ASC");
   $oke = mysqli_fetch_assoc($resbangku);
   var_dump($oke);
?>
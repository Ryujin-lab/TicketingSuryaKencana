<!DOCTYPE html>
<?php
   $conn = mysqli_connect("localhost", "root", "", "suryakencana");
   if (isset($_POST["register"])){ 
      $username = strtolower(stripslashes($_POST["username"]));
      $password = mysqli_real_escape_string($conn, $_POST["password"] );
      $enc = password_hash($password, PASSWORD_DEFAULT);
      $id = date("Ymd").$username;

      mysqli_query($conn, "INSERT INTO admin VALUES ('$id', '$username', '$enc', '', '', '', '' );");

      echo"
      <script>
         alert ('admin berhasil diregistrasi')
      </script>
      ";
   }
?>
<html>
<head>

</head>
<body>
   <form method = "post">
      <input type="text" placeholder="username" name = "username" required>
      <input type="password" placeholder="password" name = "password" required>
      <button type="submit" name = "register" >register admin</button>
   </form>
</body>
</html>
<!DOCTYPE html>
<?php
   include "logic.php";
   if (isset ($_POST["submit"]) ){
      $username = strtolower(stripslashes($_POST["username"]));
      $password = mysqli_real_escape_string($conn, $_POST["password"] );
      $enc = password_hash($password, PASSWORD_DEFAULT);
      $id = date("Ymd").$username;

      $res = mysqli_query($conn, "select * from from pel")
   }
?>

<html>
   <head>
      <link rel="stylesheet" href="css/stylelogin.css">
      <script src="script.js"></script>
      <title>
         Registrasi costumer
      </title>
   </head>
   <body>
      <div>
         <form class="login-form" method="POST">
            <h2>Registrasi Costumer</h2>
            <label for="email">
               Email:
            </label> <br>
            <input type="email" name = "email" id="email"  placeholder="Email" required> <br>
            
            <label for="username">
               Username:
            </label> <br>
            <input type="username" name = "username" id="username"  placeholder="Username" required> <br>

            <label for="password">
               Password:
            </label><br>
            <input type="password" name = "password" id = "password" placeholder="Password" required><br>

            <label for="konfirmasiPassword">
               konfirmasi Password:
            </label><br>
            <input type="password" name = "konfirmasiPassword" id = "konfirmasiPassword" placeholder="konfirmasi Password" required><br>

            <button type="submit" class="login-button" name = "submit">Daftar</button>
            <a href = "login.php">Sudah memiliki akun?</a>
         </form>
      </div>
   </body>
</html>

<!DOCTYPE html>
<?php
include "logic.php";
session_start();
if (isset ($_SESSION['idp'])){
   echo isset ($_SESSION['idp']);
   echo"
   <script>
      window.location.href = 'indeks.php';
   </script>
   ";
}
else {
   if(isset($_POST["login"]) ){
      $email = strtolower ($_POST["email"]);
      $password = $_POST["password"];
      $res = mysqli_query($conn, "select * from pelanggan where email_p = '$email' " );
      
      if ( mysqli_num_rows( $res ) === 1) {
         $tabel = mysqli_fetch_assoc($res);
         var_dump ($tabel);
         if ( password_verify ($password,  $tabel['password_p'] ) ){
            $_SESSION['idp'] = $tabel['id_pelanggan'];
            $_SESSION['emailp'] = $tabel['email_p'];
            $_SESSION['usernamep'] = $tabel['username_p'];
            $_SESSION['namap'] = $tabel['nama_p'];
            header("Location : indeks.php");
         }
         else{
            echo"
            <script>
               alert('Username dan Password tidak cocok')
            </script>
            ";
         }
      }
      else{
         echo"
            <script>
               alert('Email tidak ditemukan')
            </script>
         ";
      }
   }
}


?>
<html>
   <head>
      <link rel="stylesheet" href="css/stylelogin.css">
      <script src="script.js"></script>
      <title>
         Login sebagai costumer
      </title>
   </head>
   <body>
      <div>
         <form class="login-form" method="POST">
            <h2>Login Sebagai Costumer</h2>
            <label for="email">
               Email:
            </label> <br>
            <input type="email" name = "email" id="email" required> <br>
   
            <label for="password">
               Password:
            </label><br>
            <input type="password" name = "password" id = "password" required><br>
            <button type="submit" class="login-button" name="login" >Login</button>
            <a href="signup.php">belum mendaftar?</a>
         </form>
      </div>
   </body>
</html>

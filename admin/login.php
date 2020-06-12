<!DOCTYPE html>
<?php
   session_start();
   $conn = mysqli_connect("localhost", "root", "", "suryakencana");
   if (isset($_POST["login"])){
      $username = $_POST["username"];
      $password  = $_POST["password"];
      $res =  mysqli_query($conn, "select * from admin where username = '$username' ");

      if (mysqli_num_rows($res) === 1){
         $row = mysqli_fetch_assoc($res);
         if (password_verify($password, $row["password"])){
            $_SESSION["username"] = $row["username"];
            $_SESSION["id"] = $row["id_admin"];
            header ("Location: indeks.php");
         }

         else{
            echo"
            <script>
               alert('username dan password tidak sesuai')
            </script>
            ";
         }
      }
      else{
         echo "
         <script>
         alert('tidak ada username yang sesuai');
         </script>
         ";
      }
   }
?>
<html>
   <head>
      <link rel="stylesheet" href="stylelogin.css">
      <script src="script.js"></script>
      <title>
         Login sebagai admin
      </title>
   </head>
   <body>
      <div>
         <form class="login-form" method="POST">
            <h2>Login Sebagai Agen Bus</h2>
            <label for="username">
               Username:
            </label> <br>
            <input type="username" name = "username" id="username" required> <br>
   
            <label for="password">
               Password:
            </label><br>
            <input type="password" name = "password" id = "password" required><br>
            <button type="submit"
            class="login-button" name = "login">Login</button>
         </form>
      </div>
   </body>
</html>

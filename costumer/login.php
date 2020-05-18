<!DOCTYPE html>
<?php
if(isset($_POST["login"]) ){
   
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
            <button type="submit" class="login-button" formaction="indeks.php" name="login" >Login</button>
            <a href="">lupa password?</a><br>
            <a href="">belum mendaftar?</a>
         </form>
      </div>
   </body>
</html>

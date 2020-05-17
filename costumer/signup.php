<!DOCTYPE html>
<html>
   <head>
      <link rel="stylesheet" href="stylelogin.css.css">
      <script src="script.js"></script>
      <title>
         Registrasi costumer
      </title>
   </head>
   <body>
      <div>
         <form class="login-form" method="GET">
            <h2>Registrasi Costumer</h2>
            <label for="email">
               Email:
            </label> <br>
            <input type="email" name = "email" id="email" required> <br>
            
            <label for="username">
               Username:
            </label> <br>
            <input type="username" name = "username" id="username" required> <br>

            <label for="password">
               Password:
            </label><br>
            <input type="password" name = "password" id = "password" required><br>

            <label for="konfirmasiPassword">
               konfirmasi Password:
            </label><br>
            <input type="password" name = "konfirmasiPassword" id = "konfirmasiPassword" required><br>

            <button type="submit" class="login-button" >Daftar</button>
         </form>
      </div>
   </body>
</html>

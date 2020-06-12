<!DOCTYPE html>
<?php
   include "logic.php";
   if (isset ($_POST["submit"]) ){
      $username = strtolower(stripslashes($_POST["username"]));
      $password = mysqli_real_escape_string($conn, $_POST["password"] );
      $password2 = mysqli_real_escape_string($conn, $_POST["konfirmasiPassword"] );
      $email = strtolower ( $_POST["email"] );
      $nama = $_POST["nama"];
      $enc = password_hash($password, PASSWORD_DEFAULT);
      $id = date("Ymd").$username;

      $res = mysqli_query($conn, "select * from pelanggan where username_p = '$username' ");
      $res2 = mysqli_query($conn, "select * from pelanggan where email_p = '$email' ");
      if (mysqli_num_rows( $res ) === 1 || mysqli_num_rows( $res2 ) === 1){
         echo"
            <script>
               alert ('Username atau Email sudah digunakan');
            </script>
         ";
      }

      else if ($password != $password2) {
         echo"
            <script>
               alert ('Konfirmasi password gagal : Password tidak sama');
            </script>
         ";
      }
      
      else{
         $curdate = date("dmy");
         $id = $curdate.$username;
         mysqli_query($conn, "insert into pelanggan
         (
            id_pelanggan,
            nama_p,
            username_p,
            email_p,
            password_p
         )

         values(
            '$id',
            '$nama',
            '$username',
            '$email',
            '$enc'
         )
         "
         );
         echo"
         <script>
            alert ('REGISTRASI BERHASIL!');
         </script>
         ";
         header("Location:login.php");
      }
   }
?>

<html>
   <head>
      <link rel="stylesheet" href="css/stylelogin.css">
      <script src="js/script.js"></script>
      <title>
         Registrasi costumer
      </title>
   </head>
   <body>
      <div >
         <form class="login-form" method="POST" id = "signup">
            <h2>Registrasi Costumer</h2>
            <a>Profil Pengguna</a>
            <hr>
            <label for="email">
               Email:
            </label> <br>
            <input type="email" name = "email" id="email"  placeholder="Email" required> <br>
            
            <label for="username">
               Username:
            </label> <br>
            <input type="username" name = "username" id="username"  placeholder="Username" required> <br>

            <label for="nama">
               Nama Lengkap:
            </label> <br>
            <input type="text" name = "nama" id="nama"  placeholder="Nama Lengkap" required> <br>
            
            <br>
            <a>Keamanan</a>
            <hr>

            <label for="password">
               Password:
            </label><br>
            <input type="password" name = "password" id = "password" placeholder="Password" required><br>

            <label for="konfirmasiPassword">
               konfirmasi Password:
            </label><br>
            <input type="password" name = "konfirmasiPassword" id = "konfirmasiPassword" placeholder="konfirmasi Password" required><br>

            <button type="button" class="login-button"  onclick="simpansemua('modal')" >Daftar</button>
            <a href = "login.php">Sudah memiliki akun?</a>
         </form>
      </div>

      <div class = "modal" id = "modal">
         <div class = "modal-content">
            <h2 style="color:rgb(26, 100, 230)">REGISTRASI SEKARANG?</h2>
            <p style="color:orangered">*Pastikan Semua data yang terisi valid*</p>
            <button onclick="kembali('modal')" class = "lastconfirm" id = "cancel" name ="cancel" type="button">KEMBALI</button>
            <button onclick ="kembali('modal')" class = "lastconfirm" id = "lastconfirm" name ="submit" type="submit" form = "signup">REGISTRASI</button>
         </div>
      </div>

   </body>
</html>

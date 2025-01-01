<?php
require 'function.php';


if(isset($_POST["register"])) {

    if(registrasi($_POST) > 0) {
        echo "<script>
                alert('user baru berhasil ditambahkan!');
        </script>";
    } else {
        echo mysqli_error($db);
    }
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Registrasi</title>
    <style>
        label {
            display: block;
        }
    </style>
</head>
<body>
    <div class="card m-auto" style="width: 36rem">
  <div class="card-header bg-primary text-white">
    Form Registrasi Data Mahasiswa
  </div>

    <form action="" method="post">
        <div class="form-group">
    <label for="username">Username :</label>
    <input type="text" class="form-control" name="username" id="username">
  </div>

  <div class="form-group">
    <label for="password">Password :</label>
    <input type="password" class="form-control" name="password" id="password">
  </div>

  <div class="form-group">
    <label for="password2">Konfirmasi :</label>
    <input type="password" class="form-control" name="password2" id="password2">
  </div>

    <div class="form-group">
    <button type="submit" class="btn btn-primary" name="login">Registrasi</button>
  </div>


    </form>
</body>
</html>
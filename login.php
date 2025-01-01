<?php
session_start();
if(isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}
    require 'function.php';



if(isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($db, "SELECT * FROM user WHERE username ='$username'");

    //cek username
    if(mysqli_num_rows($result) === 1) {

        //cek password
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row["password"])) {
            //set session
            $_SESSION["login"] = true;

            header("Location: index.php");
            exit;
        }
    }

    $error = true;
}



?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>
    <div class="card m-auto" style="width: 36rem">
  <div class="card-header bg-primary text-white">
    Form Login Mahasiswa
  </div>


    <?php if(isset($error)) : ?>
        <p style="color: red; font-style: italic;"> username / password salah</p>
    <?php endif; ?>

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
    
    <button type="submit" class="btn btn-primary" name="login">Login</button>
  </div>
    

    </form>
</body>
</html>
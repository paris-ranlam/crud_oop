<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "@123QWEasd";
$dbname = "laragon";

$connection = new mysqli($servername, $username, $password, $dbname);

if ($connection->connect_error){
    die("Connection Failed: " . $connection->connect_error);
}
header("location: index.php");
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Form Edit</title>
  </head>
  <body>
    <form method="post" action="edit.php">
  <input type="hidden" name="id" value="<?php echo $id; ?>"> <label for="nama_baru">Nama Baru:</label>
  <input type="text" name="nama_baru" id="nama_baru">
  <button type="submit">Simpan</button>
</form>

   

    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

   
  </body>
</html>
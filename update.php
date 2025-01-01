<?php
require 'function.php';

if(isset($_POST["submit"])) {

  if(update($_POST) > 0 ) {
    echo "data berhasil diupdate";
  } else {
     echo "gagal";
  }
  header("location: index.php");
}

$id = $_GET["id"];

$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title> Update Form Data Pendaftaran</title>
  </head>
  <body>
    <div class="card m-auto" style="width: 36rem">
  <div class="card-header bg-primary text-white">
    Update Form Data Pendaftaran
  </div>
  <div class="card-body">
    <form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
    <input type="hidden" name="gambarLama" value="<?= $mhs["gambar"]; ?>">  



  <div class="form-group">
  <input type="hidden" name="id" values="<?= $mhs['id']; ?>"
    <label>upload</label>
    <img src="img/<?= $mhs['gambar']; ?>" width="40"><br>
    <input type="file" class="form-control" name="gambar" id="gambar">
  </div>
  <div class="form-group">
    <label>STB</label>
    <input type="text" class="form-control" name="stb" id="stb" value="<?= $mhs['stb']; ?>">
  </div>
  <div class="form-group">
    <label>Nama</label>
    <input type="text" class="form-control" name="nama" id="nama" value="<?= $mhs['nama']; ?>">
  </div>
  <div class="form-group">
                <label>Jurusan</label>
    <label  class="col-sm-2 col-form-label"></label>
    <div class="col-sm-15">

    <select  class="form-control" name="jurusan">
        <option>Pilih Opsi</option>
        <option value="Teknik Informatika">Teknik Informatika</option>
        <option value="Teknik Sipil">Teknik Sipil</option>
        <option value="Teknik Elektro">Teknik Elektro</option>
        <option value="Teknik Aktuaria">Teknik Aktuaria</option>
        <option value="Statistika">Statistika</option>
        <option value="Teknik Geologi">Teknik Geologi</option>
        <option value="Sistem Informasi">Sistem Informasi</option>
        <option value="Manajemen">Manajemen</option>
        <option value="pgsd">pgsd</option>
        <option value="parawisata">parawisata</option>
        <option value="Agroteknologi">Agroteknologi</option>
    </select>
            </div>
 
  <button type="submit" class="btn btn-primary" name="submit">Update</button>
</form>
  </div>
</div>

   

    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

   
  </body>
</html>
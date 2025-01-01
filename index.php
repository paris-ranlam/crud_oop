<?php 
session_start();

if(!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}

require 'function.php';


$mahasiswa = query("SELECT * FROM mahasiswa ORDER BY id ASC");

//Tombol cari ditekan
if (isset($_POST["cari"])) {
    $mahasiswa = cari($_POST["keyword"]);
}


?>


<!DOCTYPE html>

<html>
<head>
    <title>Data Mahasiswa</title>
    <style>
      .loader {
        width: 50px;
        
        right: 300px;
        z-index: -1;
        display: none;
      }
      </style>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/script.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<body>
    <button type="button" class="btn btn-info">
    <a href="logout.php">Logout</a></button>
<div class="container" style="margin-top: 20px">
    <div class="row">
        <center>
        <div class="col-md-12">
            <h2 style="text-align: center;margin-bottom: 30px">Data Mahasiswa</h2>
            <br><button type="button" class="btn btn-outline-info">
    <a href="tambah_data.php">Tambah Data</a></button>
    </center>
    <div class="card-body">
    <div class="col-md-3 mx-auto">
    <center>
    <form action="" method="POST">
      <div class="input-group mb-3">
    <input type="text" name="keyword" class="form-control" size="40" autofocus
    placeholder="masukkan keyword pencarian.." autocomplete="off" id="keyword">

    <button class="btn btn-success" name="cari" type="submit" id="tombol-cari">cari</button>

    <img src="img/loading.gif" class="loader">
    </center>
    <br>
    <br>
    </div>
    </form>
    </div>
          <div id="container">
            <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Gambar</th>
                    <th>STB</th>
                    <th>Nama</th>
                    <th>Jurusan</th>
               <th style="width:125px;">Action
                  </p></th>
                </tr>
              </thead>
              <tbody>
                    <?php $i=1; ?>
                    <?php foreach($mahasiswa as $row) : ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><img src="img/<?= $row["gambar"]; ?>" 
                            width="40"></td>
                            <td><?= $row["stb"]; ?></td>
                            <td><?= $row["nama"]; ?></td>
                            <td><?= $row["jurusan"]; ?></td>
                            <td>
                            <a href="update.php?id=<?= $row['id'];?>" class="btn btn-warning">Update</a>
                            <a href="hapus.php?id=<?= $row['id'];?>" class="btn btn-danger">Hapus</a>
                            </td>
                            
                        </tr>
                    <?php $i++ ?>
                    <?php endforeach; ?>

              </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
  $(document).ready( function () {
      $('#table_id').DataTable({
        searching: false
      });
  } );
</script>
</body>
</html>
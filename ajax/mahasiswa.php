<?php
require '../function.php';

$keyword = $_GET["keyword"];
$query = "SELECT * FROM mahasiswa 
            WHERE 
            nama LIKE'%$keyword%' OR
            stb LIKE'%$keyword%' OR
            jurusan LIKE'%$keyword%'
    ";
$mahasiswa = query($query);



?>


<table class="table table-bordered table-stripped table-hover border-info">
      
    
      <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Gambar</th>
            <th>STB</th>
            <th>Nama</th>
            <th>Jurusan</th>
            <th>Aksi</th>

            <?php $i=1; ?>
        <?php foreach($mahasiswa as $row) : ?>
        </tr>
       </thead>

        <tr>
            <td><?= $i ?></td>
            <td><img src="img/<?= $row["gambar"]; ?>" 
        width="40"></td>
            <td><?= $row["stb"]; ?></td>
            <td><?= $row["nama"]; ?></td>
            <td><?= $row["jurusan"]; ?></td>
        <td>
            <a href="update.php?id=<?= $row['id'];?>" class="btn btn-outline-warning">Update</a>
            <a href="hapus.php?id=<?= $row['id'];?>" class="btn btn-outline-danger">Hapus</a>
        </td>
        </tr>
          


        <?php $i++ ?>
    <?php endforeach; ?>

    </table>
<?php 
include_once("koneksi.php");

$id = $_POST['id'];
$gambar = $_POST['gambar'];
$stb = $_POST['stb'];
$nama = $_POST['nama'];
$jurusan = $_POST['jurusan'];

$query = "UPDATE mahasiswa SET gambar='$gambar', stb='$stb', nama='$nama', jurusan='jurusan' WHERE id=$id";

$hasil = mysqli_query($connect, $query);

if($hasil){
    header('Location: index.php');
}else{
    echo "Update gagal!";
}


?>
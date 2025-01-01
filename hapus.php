<?php 
session_start();

if(!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}

$db = mysqli_connect('localhost', 'root', '@123QWEasd', 'laragon');
$id = $_GET['id'];
mysqli_query($db, "DELETE FROM mahasiswa WHERE id = $id");
header("location: index.php");



?>
<?php

$db = mysqli_connect("localhost","root","@123QWEasd","laragon");

function query($query){
    global $db;
    $result = mysqli_query($db, $query);
    $row = [];
    while($mhs = mysqli_fetch_assoc($result)){
        $row[] = $mhs;
    }
    return $row;
}

function tambah($data) {
    global $db;
    
    $stb = $data['stb'];
    $nama = $data['nama'];
    $jurusan = $data['jurusan'];

    //UPLOAD GAMBAR
    $gambar = upload();
    if(!$gambar){
        return false;
    }

    $query = "INSERT INTO mahasiswa VALUES (null,'$gambar','$stb','$nama','$jurusan')";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function upload(){
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['eror'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    if($error===4){
        echo "<script>
        alert('pilih gambar terlebih dahulu!');
        </script>";
        return false;
    }

    //cek apakah yang di upload gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
        alert('yang anda upload bukan gambar!');
        </script>";
        return false;
    }

    //cek jika ukurannya terlalu besar
    if($ukuranFile > 100000000000){
         echo "<script>
        alert('ukuran gambar terlalu besar!');
        </script>";
        return false;
    }

    //generate
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    //lolos pengecekan
    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

    return $namaFileBaru;
}

function hapus($id) {
    global $db;
    mysqli_query($db, "DELETE FROM mahasiswa WHERE id = $id");
    return mysqli_affected_rows($db);
}

function update($data) {
    global $db;
    $id = $_GET['id'];
    $gambar = $data['gambar'];
    $stb = $data['stb'];
    $nama = $data['nama'];
    $jurusan = $data['jurusan'];
    $gambarLama= $data['gambarLama'];

    //cek gambar baru atau tidak
    if($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }


    $query = "UPDATE mahasiswa 
    SET gambar ='$gambar',stb = '$stb',nama = '$nama',jurusan = '$jurusan'
    WHERE id = $id ";


    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}

function cari($keyword) {
    $query = "SELECT * FROM mahasiswa WHERE nama LIKE'%$keyword%' OR
    stb LIKE'%$keyword%' OR
    jurusan LIKE'%$keyword%'
    ";

    return query($query);
}


function registrasi($data) {
    global $db;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($db,$data["password"]);
    $password2 = mysqli_real_escape_string($db,$data["password2"]);


    //cek username sudah ada atau belum
    $result= mysqli_query($db, "SELECT username FROM user WHERE username = '$username'");

    if(mysqli_fetch_assoc($result) ) {
        echo "<script>
                alert('username sudah terdaftar!');
            </script>";
        return false;
    }

    //cek konfim
    if($password !== $password2) {
        echo "<script>
                alert('konfirmasi password tidak sesuai!');
        </script>";
        return false;
    }

    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //tambahkan user baru ke db
    mysqli_query($db, "INSERT INTO user VALUES(null,'$username', '$password')");

    return mysqli_affected_rows($db);
}


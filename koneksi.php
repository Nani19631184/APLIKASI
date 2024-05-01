<?php 

$koneksi = mysqli_connect("localhost", "root", "" ,"pelayanan");

// script cek koneksi
if (!$koneksi) {
    die("Koneksi Tidak Berhasil: " . $koneksi->error);
    
}
?>



<?php

    //mengambil data dari form input
    $kegiatan   = $_POST['kegiatan'];
    $mulai      = $_POST['mulai'];
    $selesai    = $_POST['selesai'];

    //membuat koneksi ke database
    $koneksi = mysqli_connect('localhost', 'root', '', 'pelayanan');

    //insert data ke dalam database
    mysqli_query($koneksi, "insert into Jhaji set nama='$kegiatan', jadwal_tgl='$mulai', jadwal_tgl='$selesai' ");
    

    //kembali ke halaman index.php
    header("location: event2.php");

?>
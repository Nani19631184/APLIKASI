<?php 
include '../koneksi.php';
$id  = $_GET['id'];

mysqli_query($koneksi, "delete from penerima where penerima_id='$id'");
header("location:penerima.php");

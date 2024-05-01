<?php 
include '../koneksi.php';
$id  = $_GET['id'];

mysqli_query($koneksi, "delete from binwin where binwin_id='$id'");
header("location:binwin.php");


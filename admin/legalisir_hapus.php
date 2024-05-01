<?php 
include '../koneksi.php';
$id  = $_GET['id'];

mysqli_query($koneksi, "delete from legalisir where legalisir_id='$id'");
header("location:legalisir.php");


<?php 
include '../koneksi.php';
$id  = $_GET['id'];

mysqli_query($koneksi, "delete from tb_article where IdBerita='$id'");
header("location:article.php");

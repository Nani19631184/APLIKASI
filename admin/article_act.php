<?php 
include '../koneksi.php';
$judul 		=	$_POST ['judul'];
$berita 	=	$_POST ['berita'];
$idPenulis 	= 	Administrator;

$data		=	mysqli_query($koneksi, "insert into tb_article (Judul,Berita,TglBerita,JamBerita,IdPenulis) values ('$judul','$berita',current_date,current_time,'$idPenulis')")
or die(mysqli_error($koneksi));
if($data){header('location:article.php');}else
{echo "Data gagal di INPUT!!!!";}

?> 
<?php
	
?>


	

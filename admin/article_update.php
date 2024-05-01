<?php 
include '../koneksi.php';
$id = $_POST['id'];

$judul 		=	$_POST ['judul'];
$berita 	=	$_POST ['berita'];


$update = mysqli_query($koneksi,"update tb_article set 
Judul='$judul',
Berita='$berita'
where IdBerita='$id'");

if($update){header('location:article.php');}else
{echo "Data gagal di UPDATE !!!!";}
?>
<?php
	
?>


<?php 
include '../koneksi.php';
$jadwal_tanggal  = $_POST['jadwal_tanggal'];
 $username= $_POST['username']; 
 $suami= $_POST['suami'];  
 $tempats= $_POST['tempats'];  
 $tl= $_POST['tl'];  
 $umur= $_POST['umur'];  
 $nik= $_POST['nik'];                    
 $status_s= $_POST['status_s'];                                              
 $pt= $_POST['pt'];  
 $pkj= $_POST['pkj'];  
 $alamat= $_POST['alamat'];  
 $no_hp= $_POST['no_hp'];  
 $nik_a= $_POST['nik_a'];  
 $nik_i= $_POST['nik_i'];  
 $istri= $_POST['istri'];  
 $tempati= $_POST['tempati'];  
 $tli= $_POST['tli'];  
 $umuri= $_POST['umuri'];  
 $nik_istri= $_POST['nik_istri'];                    
 $status_i= $_POST[ 'status_i'];                                              
 $pt_i= $_POST['pt_i'];  
 $pekerjaan= $_POST['pekerjaan'];  
 $alamat_i= $_POST['alamat_i'];  
 $no_telp= $_POST['no_telp'];  
 $nik_ayah= $_POST['nik_ayah'];  
 $nik_ibu= $_POST['nik_ibu'];  
 $saksi1= $_POST['saksi1'];  
 $saksi2= $_POST['saksi2'];  
 $penghulu= $_POST['penghulu'];                        
$status  = $_POST['status'];

$rand = rand();
$allowed =  array('jpg','jpeg','pdf');
$filename = $_FILES['trnfoto']['name'];

if($filename == ""){
     mysqli_query($koneksi, "insert into nikah values (NULL,'$jadwal_tanggal','$username','$suami','$tempats','$tl','$umur','$nik','$status_s','$pt','$pkj','$alamat','$no_hp','$nik_a','$nik_i','$istri','$tempati','$tli','$umuri','$nik_istri','$status_i','$pt_i','$pekerjaan','$alamat_i','$no_telp','$nik_ayah','$nik_ibu','$saksi1','$saksi2','$penghulu','','$status')")or die(mysqli_error($koneksi)); 
     header("location:nikah.php?alert=berhasil");
}else{
	$ext = pathinfo($filename, PATHINFO_EXTENSION);

	if(!in_array($ext,$allowed) ) {
		header("location:nikah.php?alert=gagal");
	}else{
		move_uploaded_file($_FILES['trnfoto']['tmp_name'], '../gambar/bukti/'.$rand.'_'.$filename);
		$file_gambar = $rand.'_'.$filename;
		mysqli_query($koneksi, "insert into nikah values (NULL,'$jadwal_tanggal','$username','$suami','$tempats','$tl','$umur','$nik','$status_s','$pt','$pkj','$alamat','$no_hp','$nik_a','$nik_i','$istri','$tempati','$tli','$umuri','$nik_istri','$status_i','$pt_i','$pekerjaan','$alamat_i','$no_telp','$nik_ayah','$nik_ibu','$saksi1','$saksi2','$penghulu','$file_gambar','$status')");
		header("location:nikah.php?alert=berhasil");
	}
}





	

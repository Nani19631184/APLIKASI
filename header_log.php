<li class="last">		<FORM method="POST" action="periksa_log.php">
			<INPUT name="username" type="text" placeholder="Username" />
			<INPUT name="password" type="password" placeholder="Password" />
			<INPUT type="submit" value="Log In" style="" />
		</FORM></li>


<?php

include 'koneksi.php';
$username = $_POST['username'];
$password = md5($_POST['password']);

$login = mysqli_query($koneksi, "SELECT * FROM user WHERE user_username='$username' AND user_password='$password'");
$cek = mysqli_num_rows($login);

if($cek > 0){
	session_start();
	$data = mysqli_fetch_assoc($login);
	$_SESSION['id'] = $data['user_id'];
	$_SESSION['nama'] = $data['user_nama'];
	$_SESSION['username'] = $data['user_username'];
	$_SESSION['level'] = $data['user_level'];

	if($data['user_level'] == "administrator"){
		$_SESSION['status'] = "administrator_logedin";
		header("location:admin/");
	
	}else if($data['user_level'] == "kepalakua"){
    $_SESSION['status'] = "kepalakua_logedin";
    header("location:kua/");

	}else if($data['user_level'] == "user"){
		$_SESSION['status'] = "user_logedin";
		header("location:tamu/");
	}else{
		header("location:index.php?alert=gagal");
	}
}


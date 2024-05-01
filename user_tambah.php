<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>KUA KEC. BANJARMASIN TIMUR</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="assets/plugins/iCheck/square/blue.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>

<body class="bg-primary">


<div class="container">
<div class="login-box">
<div class="login-box-body">
<div class="text-center"> <img src="/pelayanantamu/assets/loogo.ico" style="max-width:20%;">
      <br>
      
      <span style="color: Black;">
        <center>
          <h4><B> Kantor Urusan Agama Kecamatan Banjarmasin Timur</B></h4>
        </center>
      </span></p>
      <span style="color: green;">
        <center>
          <h5>DAFTAR AKUN </h5>
        </center>
      </span></p>
 
          
            <form action="signup.php" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" name="nama" required="required" placeholder="Masukkan Nama ..">
              </div>
              <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" name="username" required="required" placeholder="Masukkan Username ..">
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password" required="required" min="5" placeholder="Masukkan Password ..">
              </div>
               <div class="form-group">
                <label>Level</label>
                <select class="form-control" name="level" required="required">
                  <option value=""> - Pilih Level - </option>
                  <option value="administrator"> Administrator </option>
                  <option value="user"> User </option>
                </select>
              </div>
              <div class="form-group">
                <label>Foto</label>
                <input type="file" name="foto">
              </div>
              <div class="form-group">
                <input type="submit" class="btn btn-sm btn-primary" value="Simpan">
              </div>
            </form>
        
        </div>
      </div>
    </div>
  </div>

<script src="assets/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

   
</body>
</html>
<!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<link rel="stylesheet" href="../assets/bower_components/bootstrap/dist/css/bootstrap.min.css"> 
 </head>
 <body>
	 	<table> 
 			<tr>
			 <td><img src="kemenag-logo.png" width="90" height= "90" style="margin: 30px"></td>
			 	<td>
				 	<center>
 						<font size="4"><b>KEMENTERIAN AGAMA REPUBLIK INDONESIA</b></font><br>	
						<font size="3"><b>KANTOR KEMENTERIAN AGAMA KOTA BANJARMASIN</b></font><br>
						<font size="3"><b>KANTOR URUSAN AGAMA KECAMATAN BANJARMASIN TIMUR</b></font><br>
						<font size="2"><b>Jalan Pramuka, Melati Indah Komplek Bumi Melati Permai RT.10 No.01 Banjarmasin 70238</b></font><br>
						<font size="2"><b>Telp. 0511-3257144 e-mail</b></font><br>
 					</center>
 				</td>
			</tr>

			<tr>
				<td colspan="5"><hr></td>
			</tr>		 	
 		</table>	

		 <tr>
		 		<td>
					<center>
						<br>	
						<font size="3"><b>LAPORAN PENYALURAN ZAKAT</b></font><br>
						<br>
						<br>
					</center>
				</td>
			</tr>


 	<?php 
 	if(isset($_GET['tanggal_sampai']) && isset($_GET['tanggal_dari']) && isset($_GET['penyuluh'])){
 		$tgl_dari = $_GET['tanggal_dari'];
 		$tgl_sampai = $_GET['tanggal_sampai'];
 		$penyuluh = $_GET['penyuluh'];
 		?>

 		<div class="row">
 			<div class="col-lg-6">
 				<table class="table table-bordered">
 					<tr>
 						<th width="30%">DARI TANGGAL</th>
 						<th width="1%">:</th>
 						<td><?php echo date('d-m-Y',strtotime($tgl_dari)); ?></td>
 					</tr>
 					<tr>
 						<th>SAMPAI TANGGAL</th>
 						<th>:</th>
 						<td><?php echo date('d-m-Y',strtotime($tgl_sampai)); ?></td>
 					</tr>
 				</table>

 			</div>
 		</div>

 		<div class="table-responsive">
 			<table class="table table-bordered table-striped">
 				<thead>
 				<tr>
				 <th width="1%">NO</th>
                    <th width="12%" class="text-center">TANGGAL PENYALURAN</th>
                    <th class="text-center">NAMA PENERIMA</th>
                    <th class="text-center">NAMA YAYASAN</th>
                    <th class="text-center">ALAMAT</th>
                    <th class="text-center">JUMLAH</th>
                    <th class="text-center">NAMA AMIL</th>
                   </tr>
 				</thead>
 				<tbody>
 					<?php 
 					include '../koneksi.php';
 					$no=1;
					 if($penyuluh == "semua"){
						$data = mysqli_query($koneksi,"SELECT * FROM penerima,penyuluh where penyuluh.penyuluh_id=penerima.penyuluh and date(tanggal)>='$tgl_dari' and date(tanggal)<='$tgl_sampai'");
					   }else{
						$data = mysqli_query($koneksi,"SELECT * FROM penerima,penyuluh where penyuluh.penyuluh_id=penerima.penyuluh and penyuluh_id='$penyuluh' and date(tanggal)>='$tgl_dari' and date(tanggal)<='$tgl_sampai'");
					   }
					   while($d = mysqli_fetch_array($data)){
		
						?>
						<tr>
						<td class="text-center"><?php echo $no++; ?></td>
						<td class="text-center"><?php echo date('Y-m-d', strtotime($d['tanggal'])); ?></td>
                      <td class="text-center"><?php echo $d['nama']; ?></td>
                      <td class="text-center"><?php echo $d['namap']; ?></td>
                      <td class="text-center"><?php echo $d['alamat']; ?></td>
                      <td class="text-center">
                      <?php 
                        echo "Rp. ".number_format($d['penerima_nominal'])." ,-";?></td>
                      <td><?php echo $d['penyuluh']; ?></td>                                      
 						</tr>
 						<?php 
 					}
 					?>
 					</tbody>
 			</table>
		 <?php 
        } 
          ?>
		<tr>
			<br>
 				<div font size="2" class="text-right">Mengetahui,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font><br>	
				<font size="2">Kepala,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font><br>
				<br>
				<br>
				<br>
				<font size="2"><b>H. SYAMSURI, S.Ag, MHI&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></font><br>
				<font size="2"><b>NIP. 197604122005011002&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></font><br>
 				</div>
			</tr>	 	

		
			

			
 		<?php
 	
 	?>


 	<script>

 		window.print();
 		$(document).ready(function(){

 		});
 	</script>

 </body>
 </html>
 </html>

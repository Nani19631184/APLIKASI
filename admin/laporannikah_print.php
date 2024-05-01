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
			 <td><img src="kemenag-logo.png" width="100" height= "100" style="margin: 140px"></td>
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
						<font size="3"><b>LAPORAN DATA NIKAH</b></font><br>
						<br>
						<br>
					</center>
				</td>
			</tr>		
				
	
		
 	<?php 
            if(isset($_GET['tanggal_sampai']) && isset($_GET['tanggal_dari']) && isset($_GET['penghulu'])){
			$tgl_dari = $_GET['tanggal_dari'];
 		$tgl_sampai = $_GET['tanggal_sampai'];
		 $penghulu = $_GET['penghulu'];

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

 
 			<table class="table table-bordered">
 				<thead>
 				<tr>	
				 <th width="1%" >NO</th>
                    <th width="10%"  class="text-center">TANGGAL</th>
                    <th class="text-center">NAMA CATIN PRIA</th>
				<th class="text-center">TANGGAL LAHIR</th>
                    <th class="text-center">UMUR</th>
                    <th class="text-center">NIK</th>
                    <th  class="text-center">STATUS</th>
                    <th  class="text-center">NO.HP</th>
                    <th  class="text-center">NAMA CATIN WANITA</th>
				<th class="text-center">TANGGAL LAHIR</th>
                    <th  class="text-center">UMUR</th>
                    <th  class="text-center">NIK</th>
                    <th  class="text-center">STATUS</th>
                    <th  class="text-center">NO.HP</th>
                    <th class="text-center">Saksi 1</th>
                    <th class="text-center">Saksi 2</th>
                    </tr>	
 				</thead>
 				<tbody>
 					<?php 
 					include '../koneksi.php';
 					$no=1; 					
					 if($penghulu == "semua"){
						$data = mysqli_query($koneksi,"SELECT * FROM nikah,penghulu where penghulu.penghulu_id=nikah.penghulu and date(jadwal_tanggal)>='$tgl_dari' and date(jadwal_tanggal)<='$tgl_sampai'");
					   }else{
						$data = mysqli_query($koneksi,"SELECT * FROM nikah,penghulu where penghulu.penghulu_id=nikah.penghulu and penghulu_id='$penghulu' and date(jadwal_tanggal)>='$tgl_dari' and date(jadwal_tanggal)<='$tgl_sampai'");
					   }
					   while($d = mysqli_fetch_array($data)) { 
							 ?> 						
 						<tr>
						 <td class="text-center"><?php echo $no++; ?></td>
						<td><?php echo $d['jadwal_tanggal']; ?></td>
						<td><?php echo $d['suami']; ?></td>
						<td><?php echo $d['tl']; ?></td>
						<td><?php echo $d['umur']; ?></td>
						<td><?php echo $d['nik']; ?></td>                  
						<td><?php echo $d['status_s']; ?></td>                                            
						<td><?php echo $d['no_hp']; ?></td>
						<td><?php echo $d['istri']; ?></td>
						<td><?php echo $d['tli']; ?></td>
						<td><?php echo $d['umuri']; ?></td>
						<td><?php echo $d['nik_istri']; ?></td>                  
						<td><?php echo $d['status_i']; ?></td>                                            
						<td><?php echo $d['no_telp']; ?></td>
						<td><?php echo $d['saksi1']; ?></td>
						<td><?php echo $d['saksi2']; ?></td>
                        </tr>	  
						<?php 
					}
 					?>
 				</tbody>
 			</table>

 		</div>

		 <tr>
			<br>
 				<div font size="2" class="text-right">Mengetahui,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font><br>	
				<font size="2">Kepala,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font><br>
				<br>
				<br>
				<br>
				<font size="2"><b>H. SYAMSURI, S.Ag, MHI&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></font><br>
				<font size="2"><b>NIP. 197604122005011002&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></font><br>
 				</div>
			</tr>	 	


 		<?php
 	}
 	?>


 	<script>

 		window.print();
 		$(document).ready(function(){

 		});
 	</script>

 </body>
 </html>

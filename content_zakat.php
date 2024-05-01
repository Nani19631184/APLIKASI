<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<title>SMKN 1 Katapang</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="imagetoolbar" content="no" />
<link rel="stylesheet" href="styles/layout.css" type="text/css" />
</head>
<body id="top">
<div class="wrapper row3">
  <div class="rnd">
    <div id="container" class="clear">
    <center>
    <h1>ZAKAT</h1>

              <h4 class="text-black">Pembayaran Zakat dapat dilakukan dengan cara transfer melalui ATM ke No. rekening
            Bank Syariah Mandiri. No. Rek. 0090012345 atau BNI Syariah. No. Rek. 333000003</h4>
            </center>

      <!-- ####################################################################################################### -->

          <p>Pemasukan Zakat</p>

            <?php 
            $pemasukan = mysqli_query($koneksi,"SELECT sum(transaksi_nominal) as total_pemasukan FROM transaksi ");
            $p = mysqli_fetch_assoc($pemasukan);
            ?>
            <h4 style="font-weight: bolder"><?php echo "Rp. ".number_format($p['total_pemasukan'])." ,-" ?></h4>

            <p>Penyaluran Zakat</p>

<?php 
$pengeluaran = mysqli_query($koneksi,"SELECT sum(penerima_nominal) as total_pengeluaran FROM penerima ");
$k = mysqli_fetch_assoc($pengeluaran);
?>
<h4 style="font-weight: bolder"><?php echo "Rp. ".number_format($k['total_pengeluaran'])." ,-" ?></h4>

<div class="table-responsive">
              <table class="table table-bordered table-striped" id="table-datatable">
                <thead>
                  <tr>

                  <th width="1%">NO</th>
                    <th>TANGGAL PENYALURAN</th>
                    <th>NAMA PENERIMA</th>
                    <th>NAMA YAYASAN</th>
                    <th>ALAMAT</th>
                    <th>JUMLAH</th>
                    <th>NAMA AMIL</th>
                  </tr>
                </thead>

                <tbody>
                  <?php 
                  include 'koneksi.php';
                  $no=1;
                  $data = mysqli_query($koneksi,"SELECT * FROM penerima, penyuluh where penyuluh.penyuluh_id=penerima.penyuluh ORDER BY penerima_id DESC");
                  while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $d['tanggal']; ?></td>
                      <td><?php echo $d['nama']; ?></td>
                      <td><?php echo $d['namap']; ?></td>
                      <td><?php echo $d['alamat']; ?></td>
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
              </div>
      <!-- ####################################################################################################### -->
    </div>
  </div>
</div>
</body>
</html>
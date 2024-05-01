<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      PENDAFTARAN NIKAH
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>


          <section class="content">
    <div class="row">
      <section class="col-lg-12">
        <div class="box box-info">

          <div class="box-body">
          <div align="right">
    </div>
          
            <!-- Modal -->
            <form action="nikah_act.php" method="post" enctype="multipart/form-data">
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="exampleModalLabel">Tambah Data</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">

                    <div class="form-group">
                        <label>TANGGAL PENDAFTARAN</label>
                        <input type="text" name="jadwal_tanggal" required="required" class="form-control datepicker2">
                      </div>

                    <div class="form-group">
                    <label>NAMA CATIN PRIA </label>
                    <input type="text" name="suami" autocomplete="off" class="form-control">
                    </div>

                    <div class="form-group">
                    <label>TEMPAT LAHIR</label>
                    <input type="text" name=" tempats" autocomplete="off" class="form-control">
                    </div>

                    <div class="form-group">
                    <label>TANGGAL LAHIR</label>
                    <input type="text" name="tl" required="required" class="form-control datepicker2">
                    </div>

                    <div class="form-group">
                    <label>UMUR</label>
                    <input type="text" name="umur" autocomplete="off" class="form-control">
                    </div>

                    <div class="form-group">
                    <label>NIK</label>
                    <input type="text" name="nik" autocomplete="off" class="form-control">
                    </div>

                    <div class="form-group">
                    <label>STATUS</label>
                    <select name="status_s" class="form-control" required="required">
                      <option value="">- Pilih -</option>
                      <option value="Perjaka">Perjaka</option>
                      <option value="Duda Mati">Duda Mati</option>
                      <option value="Duda Cerai">Duda Cerai</option>
                      <option value="Sudah Kawin">Sudah Kawin</option>
                    </select>
                    </div>

                    <div class="form-group">
                    <label>PENDIDIKAN TERAKHIR</label>
                    <input type="text" name="pt" autocomplete="off" class="form-control">
                    </div>

                    <div class="form-group">
                    <label>PEKERJAAN</label>
                    <input type="text" name="pkj" autocomplete="off" class="form-control">
                    </div>


                    <div class="form-group">
                    <label>ALAMAT</label>
                    <input type="text" name="alamat" autocomplete="off" class="form-control">
                    </div>

                    <div class="form-group">
                    <label>NO HP</label>
                    <input type="text" name="no_hp" autocomplete="off" class="form-control">
                    </div>

                    <div class="form-group">
                    <label>NIK AYAH</label>
                    <input type="text" name="nik_a" autocomplete="off" class="form-control">
                    </div>

                    <div class="form-group">
                    <label>NIK IBU</label>
                    <input type="text" name="nik_i" autocomplete="off" class="form-control">
                    </div>

                    <div class="form-group">
                    <label>NAMA CATIN WANITA</label>
                    <input type="text" name="istri" autocomplete="off" class="form-control">
                    </div>

                    <div class="form-group">
                    <label>TEMPAT LAHIR</label>
                    <input type="text" name="tempati" autocomplete="off" class="form-control">
                    </div>

                    <div class="form-group">
                    <label>TANGGAL LAHIR</label>
                    <input type="text" name="tli" required="required" class="form-control datepicker2">
                    </div>

                    <div class="form-group">
                    <label>UMUR</label>
                    <input type="text" name="umuri" autocomplete="off" class="form-control">
                    </div>

                    <div class="form-group">
                    <label>NIK</label>
                    <input type="text" name="nik_istri" autocomplete="off" class="form-control">
                    </div>

                    <div class="form-group">
                    <label>STATUS</label>
                    <select name="status_i" class="form-control" required="required">
                      <option value="">- Pilih -</option>
                      <option value="Perawan">Perawan</option>
                      <option value="Janda Mati">Janda Mati</option>
                      <option value="Janda Cerai">Janda Cerai</option>
                    </select>
                    </div>

                    <div class="form-group">
                    <label>PENDIDIKAN TERAKHIR</label>
                    <input type="text" name="pt_i" autocomplete="off" class="form-control">
                    </div>

                    <div class="form-group">
                    <label>PEKERJAAN</label>
                    <input type="text" name="pekerjaan" autocomplete="off" class="form-control">
                    </div>

                    <div class="form-group">
                    <label>ALAMAT</label>
                    <input type="text" name="alamat_i" autocomplete="off" class="form-control">
                    </div>

                    <div class="form-group">
                    <label>NO HP</label>
                    <input type="text" name="no_telp" autocomplete="off" class="form-control">
                    </div>

                    <div class="form-group">
                    <label>NIK AYAH</label>
                    <input type="text" name="nik_ayah" autocomplete="off" class="form-control">
                    </div>

                    <div class="form-group">
                    <label>NIK IBU</label>
                    <input type="text" name="nik_ibu" autocomplete="off" class="form-control">
                    </div>

                    <div class="form-group">
                    <label>NAMA SAKSI 1</label>
                    <input type="text" name="saksi1" autocomplete="off" class="form-control">
                    </div>

                    <div class="form-group">
                    <label>NAMA SAKSI 2</label>
                    <input type="text" name="saksi2" autocomplete="off" class="form-control">
                    </div>


                    <div class="form-group">
                    <label>PENGHULU</label>
                    <select name="penghulu" class="form-control" required="required">
                      <option value="">- Pilih -</option>
                      <?php 
                      $penghulu = mysqli_query($koneksi,"SELECT * FROM penghulu ORDER BY penghulu ASC");
                      while($k = mysqli_fetch_array($penghulu)){
                        ?>
                        <option value="<?php echo $k['penghulu_id']; ?>"><?php echo $k['penghulu']; ?></option>
                        <?php 
                      }
                      ?>
                    </select>                   
                    </div>


                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                  </div>
                </div>
              </div>
              
            </form>


            <div class="table-responsive">
            
              <table class="table table-bordered table-striped" id="table-datatable">
                
                <thead>
                  <tr>
                    <th width="1%" >NO</th>
                    <th width="10%"  class="text-center">TANGGAL PENDAFTARAN</th>
                    <th class="text-center">NAMA CATIN PRIA</th>
                    <th  class="text-center">NAMA CATIN WANITA</th>
                    <th class="text-center">Saksi 1</th>
                    <th class="text-center">Saksi 2</th>
                    <th class="text-center">Penghulu</th>
                    <th class="text-center">Berkas Persyaratan</th>

                    <th class="text-center">Status</th>
                    <th  width="13%" class="text-center">OPSI</th>
                  </tr>
                </thead>
                 <tbody>
                  <?php 
                  include '../koneksi.php';
                  $no=1;
                  $data = mysqli_query($koneksi,"SELECT * FROM nikah,penghulu where penghulu.penghulu_id=nikah.penghulu ORDER BY nikah_id DESC");
                   while($d = mysqli_fetch_array($data)){
                   ?>
                    <tr>
                      <td class="text-center"><?php echo $no++; ?></td>
                      <td><?php echo $d['jadwal_tanggal']; ?></td>
                      <td><?php echo $d['suami']; ?></td>
                      <td><?php echo $d['istri']; ?></td>
                      <td><?php echo $d['saksi1']; ?></td>
                      <td><?php echo $d['saksi2']; ?></td>
                      <td><?php echo $d['penghulu']; ?></td> 
                      <td class="text-center"><?php echo $d['nikah_foto']; ?><a href="download.php?filename=<?php echo $d['nikah_foto']?>">download</a></td>

                      <td>
                      <?php
                      if ($d['status'] == 0) {

                        echo "<span class='label label-warning badge-pill'>Belum Dikonfirmasi</span>";
                      }
                      else{
                      echo "<span class='label label-pill label-success'>Pengajuan Disetujui</span>";
  
                      }?></td>
                      <td class="text-center"> 
                     
                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit_nikah_<?php echo $d['nikah_id'] ?>">
                        <i class="fa fa-cog"></i>
                        </button>

                       <a href="nikah_hapus.php?id=<?php echo $d['nikah_id']; ?>" onclick="return confirm('Yakin Hapus?')" class="btn btn-danger btn-sm" ><i class="fa fa-trash"></i></a>

                          
                             
                      <form action="nikah_update.php" method="post" enctype="multipart/form-data">
                        <div class="modal fade" id="edit_nikah_<?php echo $d['nikah_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title" id="exampleModalLabel">Edit  nikah</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">

                              <div class="form-group" style="width:100%;margin-bottom:20px">
                                  <label>Tanggal</label>
                                  <input type="hidden" name="id" value="<?php echo $d['nikah_id'] ?>">
                                  <input type="text" style="width:100%" name="jadwal_tanggal" required="required" class="form-control datepicker2" value="<?php echo $d['jadwal_tanggal'] ?>">
                                </div>                      
                                
                                <div class="form-group" style="width:100%;margin-bottom:20px">
                                <label>NAMA CATIN PRIA </label>
                                <input type="text" name="suami" autocomplete="off" style="width:100%" class="form-control" value="<?php echo $d['suami']; ?>">

                                </div>

                                <div class="form-group" style="width:100%;margin-bottom:20px">
                                <label>TEMPAT LAHIR</label>
                                <input type="text" name=" tempats" autocomplete="off" style="width:100%" class="form-control" value="<?php echo $d['tempats']; ?>">
                                </div>

                                <div class="form-group" style="width:100%;margin-bottom:20px">
                                <label>TANGGAL LAHIR</label>
                                <input type="text" style="width:100%" name="tl" required="required"  class="form-control datepicker2" value="<?php echo $d['tl'] ?>">
                                </div>

                                <div class="form-group" style="width:100%;margin-bottom:20px">
                                <label>UMUR</label>
                                <input type="text" name="umur" autocomplete="off" style="width:100%" class="form-control" value="<?php echo $d['umur']; ?>">
                                </div>

                                <div class="form-group" style="width:100%;margin-bottom:20px">
                                <label>NIK</label>
                                <input type="text" name="nik" autocomplete="off" style="width:100%" class="form-control" value="<?php echo $d['nik']; ?>">
                                </div>

                                <div class="form-group" style="width:100%;margin-bottom:20px">
                                <label>STATUS</label>
                                <select name="status_s" style="width:100%" class="form-control" required="required">
                                  <option value="">- Pilih -</option>
                                  <option <?php if($d['status_s'] == "Perjaka"){echo "selected='selected'";} ?> value="Perjaka">Perjaka</option>
                                  <option <?php if($d['status_s'] == "Duda Mati"){echo "selected='selected'";} ?> value="Duda Mati">Duda Mati</option>
                                  <option <?php if($d['status_s'] == "Duda Cerai"){echo "selected='selected'";} ?> value="Duda Cerai">Duda Cerai</option>
                                  <option <?php if($d['status_s'] == "Sudah Kawin"){echo "selected='selected'";} ?> value="Sudah Kawin">Sudah Kawin</option>
                                </select>
                                </div>

                                <div class="form-group" style="width:100%;margin-bottom:20px">
                                <label>PENDIDIKAN TERAKHIR</label>
                                <input type="text" name="pt" autocomplete="off" style="width:100%" class="form-control" value="<?php echo $d['pt']; ?>">
                                </div>

                                <div class="form-group" style="width:100%;margin-bottom:20px">
                                <label>PEKERJAAN</label>
                                <input type="text" name="pkj" autocomplete="off" style="width:100%" class="form-control" value="<?php echo $d['pkj']; ?>">
                                </div>


                                <div class="form-group" style="width:100%;margin-bottom:20px">
                                <label>ALAMAT</label>
                                <input type="text" name="alamat" autocomplete="off" style="width:100%" class="form-control" value="<?php echo $d['alamat']; ?>">
                                </div>

                                <div class="form-group" style="width:100%;margin-bottom:20px">
                                <label>NO HP</label>
                                <input type="text" name="no_hp" autocomplete="off" style="width:100%" class="form-control" value="<?php echo $d['no_hp']; ?>">
                                </div>

                                <div class="form-group" style="width:100%;margin-bottom:20px">
                                <label>NIK AYAH</label>
                                <input type="text" name="nik_a" autocomplete="off" style="width:100%" class="form-control" value="<?php echo $d['nik_a']; ?>">
                                </div>

                                <div class="form-group" style="width:100%;margin-bottom:20px">
                                <label>NIK IBU</label>
                                <input type="text" name="nik_i" autocomplete="off" style="width:100%" class="form-control" value="<?php echo $d['nik_i']; ?>">
                                </div>

                                <div class="form-group" style="width:100%;margin-bottom:20px">
                                <label>NAMA CATIN WANITA</label>
                                <input type="text" name="istri" autocomplete="off" style="width:100%" class="form-control" value="<?php echo $d['istri']; ?>">
                                </div>

                                <div class="form-group" style="width:100%;margin-bottom:20px">
                                <label>TEMPAT LAHIR</label>
                                <input type="text" name="tempati" autocomplete="off" style="width:100%" class="form-control" value="<?php echo $d['tempati']; ?>">
                                </div>

                                <div class="form-group" style="width:100%;margin-bottom:20px">
                                <label>TANGGAL LAHIR</label>
                                <input type="text" style="width:100%" name="tli" required="required" class="form-control datepicker2" value="<?php echo $d['tli'] ?>">
                                </div>

                                <div class="form-group" style="width:100%;margin-bottom:20px">
                                <label>UMUR</label>
                                <input type="text" name="umuri" autocomplete="off" style="width:100%" class="form-control" value="<?php echo $d['umuri']; ?>">
                                </div>

                                <div class="form-group" style="width:100%;margin-bottom:20px">
                                <label>NIK</label>
                                <input type="text" name="nik_istri" autocomplete="off" style="width:100%" class="form-control" value="<?php echo $d['nik_istri']; ?>">
                                </div>
 
                                <div class="form-group" style="width:100%;margin-bottom:20px">
                                <label>STATUS</label>
                                <select name="status_i" style="width:100%" class="form-control" required="required">
                                  <option value="">- Pilih -</option>
                                  <option <?php if($d['status_i'] == "Perawan"){echo "selected='selected'";} ?> value="Perawan">Perawan</option>
                                  <option <?php if($d['status_i'] == "Janda Mati"){echo "selected='selected'";} ?> value="Janda Mati">Janda Mati</option>
                                  <option <?php if($d['status_i'] == "Janda Cerai"){echo "selected='selected'";} ?> value="Janda Cerai">Janda Cerai</option>
                                </select>
                                </div>

                                <div class="form-group" style="width:100%;margin-bottom:20px">
                                <label>PENDIDIKAN TERAKHIR</label>
                                <input type="text" name="pt_i" autocomplete="off" style="width:100%" class="form-control" value="<?php echo $d['pt_i']; ?>">
                                </div>

                                <div class="form-group" style="width:100%;margin-bottom:20px">
                                <label>PEKERJAAN</label>
                                <input type="text" name="pekerjaan" autocomplete="off" style="width:100%" class="form-control" value="<?php echo $d['pekerjaan']; ?>">
                                </div>

                                <div class="form-group" style="width:100%;margin-bottom:20px">
                                <label>ALAMAT</label>
                                <input type="text" name="alamat_i" autocomplete="off" style="width:100%" class="form-control" value="<?php echo $d['alamat_i']; ?>">
                                </div>

                                <div class="form-group" style="width:100%;margin-bottom:20px">
                                <label>NO HP</label>
                                <input type="text" name="no_telp" autocomplete="off" style="width:100%" class="form-control" value="<?php echo $d['no_telp']; ?>">
                                </div>

                                <div class="form-group" style="width:100%;margin-bottom:20px">
                                <label>NIK AYAH</label>
                                <input type="text" name="nik_ayah" autocomplete="off" style="width:100%" class="form-control" value="<?php echo $d['nik_ayah']; ?>">
                                </div>

                                <div class="form-group" style="width:100%;margin-bottom:20px">
                                <label>NIK IBU</label>
                                <input type="text" name="nik_ibu" autocomplete="off" style="width:100%" class="form-control" value="<?php echo $d['nik_ibu']; ?>">
                                </div>

                                <div class="form-group" style="width:100%;margin-bottom:20px">
                                <label>NAMA SAKSI 1</label>
                                <input type="text" name="saksi1" autocomplete="off" style="width:100%" class="form-control" value="<?php echo $d['saksi1']; ?>">
                                </div>

                                <div class="form-group" style="width:100%;margin-bottom:20px">
                                <label>NAMA SAKSI 2</label>
                                <input type="text" name="saksi2" autocomplete="off" style="width:100%" class="form-control" value="<?php echo $d['saksi2']; ?>">
                                </div>


                                <div class="form-group" style="width:100%;margin-bottom:20px">
                                <label>PENGHULU</label>
                                <select name="penghulu" style="width:100%" class="form-control" required="required">
                                  <option value="">- Pilih -</option>
                                  <?php 
                                  $penghulu = mysqli_query($koneksi,"SELECT * FROM penghulu ORDER BY penghulu ASC");
                                  while($k = mysqli_fetch_array($penghulu)){
                                    ?>
                                    <option value="<?php echo $k['penghulu_id']; ?>"><?php echo $k['penghulu']; ?></option>
                                    <?php 
                                  }
                                  ?>
                                </select>                   
                                </div>

                                  <div class="form-group" style="margin-bottom:15px;width: 100%">
                                  <label>Status</label>
                                  <select name="status" id="status" style="width:100%" class="form-control" required="required" >
                                  <option value="0" <?php echo isset($status) && $status == 10 ? "selected" : "" ?>>Belum Dikonfirmasi</option>
                                  <option value="1" <?php echo isset($status) && $status == 1 ? "selected" : "" ?>>Pengajuan Disetujui</option>
                                  </select>
                                 </div>
            
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                  <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </form>


                        <div class="modal fade" id="lihat_nikah_<?php echo $d['nikah_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title" id="exampleModalLabel">Lihat Berkas</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <embed src="../gambar/bukti/<?php echo $d['nikah_foto']; ?>" type="application/pdf" width="100%" height="400px" />
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                </div>
                              </div>
                            </div>
                          </div>

                              </div>
                            </div>
                          </div>                              

                    </td>
                  </tr>
                  <?php 
                }
                ?>
              </tbody>
           </table>
           </div>
        </div>
         
         
       </div>
    </section>
  </div>
</section>

</div>
<?php include 'footer.php'; ?>


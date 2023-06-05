<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
    <section class="forms">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card card-primary card-outline">
              <div class="card-header d-flex align-items-center">
                <h3 class="h4">Kelola Data Permintaan</h3>
              </div>

                <div class="card-body"> 
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-primary ml-4" data-toggle="modal" data-target="#exampleModal">
                    + Tambah Data
                  </button>

                  <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Tujuan</th>
                    <th>Keperluan</th>
                    <th>Tanggal Berangkat</th>
                    <th>Tanggal Kembali</th>
                    <th>Kendaraan</th>
                    <th>Status</th>
                    <th width="120">Aksi</th>
                  </tr>
                  </thead>
                  
                  <tbody>
                    <?php foreach ($permintaan as $row) { 
                      if($row->status == 'Dalam Pengajuan' || $row->status == 'Approved by Kadept' || $row->status == 'Tidak Disetujui oleh Kadept') {?>
                  <tr>
                    <td><?php echo $row->tujuan;?></td>
                    <td><?php echo $row->keperluan;?></td>
                    <td><?php echo $row->berangkat;?></td>
                    <td><?php echo $row->kembali;?></td>
                    <td><?php echo $row->kendaraan;?></td>
                    <td><?php echo $row->status;?></td>
                    <?php if($row->status == 'Dalam Pengajuan' || $row->status == 'Approved by Kadept' || $row->status == 'Tidak Disetujui oleh Kadept') { ?>
                    <td>
                      <a data-toggle="modal" data-target="#edit_atasan<?php echo $row->id_permintaan;?>" href="#edit_atasan<?php echo $row->id_permintaan;?>"  class="btn btn-success" ><i class="nav-icon fas fa-edit"></i></a>
                      <a data-toggle="modal" data-target="#detail_atasan<?php echo $row->id_permintaan;?>" href="#detail_atasan<?php echo $row->id_permintaan;?>"  class="btn btn-primary" title="Detail Data"><i class="nav-icon fas fa-eye"></i></a></td>
                    <?php } ?>
                  </tr>
                  <?php }
                  } ?>
                  </tbody>
                </table>
                <br>
                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

<!-- Modal Tambah Data-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="card-primary">
            <div class="card-header">
                    <h3 class="card-title">Tambah Data Permintaan</h3>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-times" style="color: red;"></i></span>
                    </button>
            </div>
            <!-- form start -->
            <form method="post" action="<?php echo site_url('CTR_ATPermintaan/InsertData'); ?>" enctype="multipart/form-data">
            <div class="card-body">
              
              <div class="form-group">
              <label>Tujuan<span style="color: red;">*</span></label>
              <input type="text" class="form-control" placeholder="Tujuan" name="tujuan">
              </div>

              <div class="form-group">
              <label>Keperluan<span style="color: red;">*</span></label>
              <input type="text" class="form-control" placeholder="Keperluan" name="keperluan">
              </div>

              <div class="col-12">
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                    <label>Tanggal Berangkat<span style="color: red;">*</span></label>
                    <input type="date" class="form-control" placeholder="Tanggal Berangkat" name="berangkat">
                    </div>

                    <div class="form-group">
                    <label>Tanggal Kembali<span style="color: red;">*</span></label>
                    <input type="date" class="form-control" placeholder="Tanggal Kembali" name="kembali">
                    </div> 
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                    <label>Jam Berangkat<span style="color: red;">*</span></label>
                    <input type="time" class="form-control" placeholder="Jam Berangkat" name="jmberangkat" required>
                    </div>

                    <div class="form-group">
                    <label>Jam Kembali<span style="color: red;">*</span></label>
                    <input type="time" class="form-control" placeholder="Jam Kembali" name="jmkembali" required>
                    </div> 
                  </div>
                </div>
              </div>

              <div class="form-group" >
                <label class="form-control-label">Pilih Kendaraan : <span style="color: red;">*</span></label>
                  <div class="ml-3">
                  <input type="radio" value="Mobil" name="kendaraan" id="kendaraan_mobil" required="">
                  <label>Mobil</label>
                  </div>

                   <div class="ml-3">
                   <input type="radio" value="GRAB" name="kendaraan" id="kendaraan_grab" required="">
                    <label>GRAB</label>
                    </div>
              </div> 

              <div class="form-group" id="show_hide">
                <label class="form-control-label">Butuh Driver ? <span style="color: red;">*</span></label>
                  <div class="ml-3">
                  <input type="radio" value="Ya" name="driver">
                  <label>Ya</label>
                  </div>

                   <div class="ml-3">
                   <input type="radio" value="Tidak" name="driver">
                    <label>Tidak</label>
                    </div>
              </div>        

              <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
              <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Simpan</button>
              </div>
                      
            </div>
            </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Edit Data-->
<?php foreach ($permintaan as $row) {
if($row->status == 'Dalam Pengajuan' || $row->status == 'Approved by Kadept'|| $row->status == 'Tidak Disetujui oleh Kadept') {?>
<div class="modal fade" id="edit_atasan<?php echo $row->id_permintaan; ?>" tabindex="-1" aria-labelledby="edit_atasan<?php echo $row->id_permintaan; ?>" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="card-primary">
           <div class="card-header">
                    <h3 class="card-title">Edit Data Permintaan</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-times" style="color: red;"></i></span>
                    </button>
            </div>
            <!-- form start -->
            <form method="post" action="<?php echo site_url('CTR_ATPermintaan/EditData'); ?>" enctype="multipart/form-data">
            <div class="card-body">
              <div class="form-group" style="display: none;">
              <label>ID Permintaan</label>
              <input type="text" class="form-control" value="<?php echo $row->id_permintaan;?>" name="id_permintaan">
              </div>

              <div class="form-group">
              <label>Tujuan<span style="color: red;">*</span></label>
              <input type="text" class="form-control" value="<?php echo $row->tujuan;?>" name="tujuan_edit<?php echo $row->id_permintaan;?>" required>
              </div>

              <div class="form-group">
              <label>Keperluan<span style="color: red;">*</span></label>
              <input type="text" class="form-control" value="<?php echo $row->keperluan;?>" name="keperluan_edit<?php echo $row->id_permintaan;?>" required>
              </div>

              <div class="col-12">
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                    <label>Tanggal Berangkat<span style="color: red;">*</span></label>
                    <input type="date" class="form-control" value="<?php echo date("Y-m-d",strtotime($row->berangkat));?>" name="berangkat_edit<?php echo $row->id_permintaan;?>" required>
                    </div>

                    <div class="form-group">
                    <label>Tanggal Kembali<span style="color: red;">*</span></label>
                    <input type="date" class="form-control" value="<?php echo date("Y-m-d",strtotime($row->kembali));?>" name="kembali_edit<?php echo $row->id_permintaan;?>" required>
                    </div>
                  </div>
                  <div class="col-6">
                      <div class="form-group">
                      <label>Jam Berangkat<span style="color: red;">*</span></label>
                      <input type="time" class="form-control" value="<?php echo date('H:i:s',strtotime($row->jmberangkat));?>" name="jmberangkat_edit<?php echo $row->id_permintaan;?>" required>
                      </div>
                      <div class="form-group">
                      <label>Jam Kembali<span style="color: red;">*</span></label>
                      <input type="time" class="form-control" value="<?php echo date('H:i:s',strtotime($row->jmkembali));?>" name="jmkembali_edit<?php echo $row->id_permintaan;?>" required>
                      </div>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label class="form-control-label">Pilih Kendaraan : <span style="color: red;">*</span></label>
                  <div class="ml-3">
                  <input type="radio" value="Mobil" <?php echo ($row->kendaraan == 'Mobil'?'checked':'');?> name="kendaraan_edit<?php echo $row->id_permintaan;?>" required>
                  <label>Mobil</label>
                  </div>

                   <div class="ml-3">
                   <input type="radio" value="GRAB" <?php echo ($row->kendaraan == 'GRAB'?'checked':'');?> name="kendaraan_edit<?php echo $row->id_permintaan;?>" required>
                    <label>GRAB</label>
                    </div>
              </div>  

              <div id="show_hide_edit<?php echo $row->id_permintaan;?>"> 
              <div class="form-group">
                <label class="form-control-label">Butuh Driver : <span style="color: red;">*</span></label>
                  <div class="ml-3">
                  <input type="radio" value="Ya" <?php echo ($row->driver == 'Ya'?'checked':'');?> name="driver_edit<?php echo $row->id_permintaan;?>" required>
                  <label>Ya</label>
                  </div>

                   <div class="ml-3">
                   <input type="radio" value="Tidak" <?php echo ($row->driver == 'Tidak'?'checked':'');?> name="driver_edit<?php echo $row->id_permintaan;?>" required>
                    <label>Tidak</label>
                    </div>
              </div> 
              </div> 

              <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
              <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Simpan</button>
              </div>
                      
            </div>
            </form>
      </div>
    </div>
  </div>
</div>
<?php }
} ?>

<!-- Modal Detail Data-->
<?php foreach ($permintaan as $row) {
if($row->status == 'Dalam Pengajuan' || $row->status == 'Approved by Kadept' || $row->status == 'Tidak Disetujui oleh Kadept') {?>
<div class="modal fade" id="detail_atasan<?php echo $row->id_permintaan; ?>" tabindex="-1" aria-labelledby="detail_atasan<?php echo $row->id_permintaan; ?>" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title"><strong>Detail Data Permintaan</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-times" style="color: red;"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <div class="col-12">
                        <dl class="row">
                            <dt class="col-sm-3">NPK</dt>
                            <dt class="col-sm-3">Dept</dt>
                            <dt class="col-sm-3">Tujuan</dt>
                            <dt class="col-sm-3">Keperluan</dt>  
                        </dl>
                        <dl class="row">
                            <dd class="col-sm-3" id="npk"><?php echo $row->npk;?></dd>
                            <dd class="col-sm-3" id="dept"><?php echo $row->dept;?></dd>
                            <dd class="col-sm-3" id="tujuan"><?php echo $row->tujuan;?></dd>
                            <dd class="col-sm-3" id="keperluan"><?php echo $row->keperluan;?></dd>
                        </dl> 
                        <dl class="row"> 
                            <dt class="col-sm-3">Tanggal Berangkat</dt>
                            <dt class="col-sm-3">Tanggal Kembali</dt>
                            <?php if($row->kendaraan == 'Mobil') { ?>
                            <dt class="col-sm-3">Driver</dt>
                            <?php } ?>
                        </dl>
                        <dl class="row"> 
                            <dd class="col-sm-3" id="berangkat"><?php echo $row->berangkat;?></dd>
                            <dd class="col-sm-3" id="kembali"><?php echo $row->kembali;?></dd>
                            <?php if($row->kendaraan == 'Mobil') { ?>
                            <dd class="col-sm-3" id="driver"><?php echo $row->driver;?></dd>
                            <?php } ?>
                        </dl>                  
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12">
                        <dl class="row">
                            <dt class="col-sm-3">Data dibuat oleh</dt>
                            <dt class="col-sm-3">Tanggal data dibuat</dt>
                            <dt class="col-sm-3">Data diubah oleh</dt>
                            <dt class="col-sm-3">tanggal data diubah</dt>  
                        </dl>
                        <dl class="row">
                            <dd class="col-sm-3"><?php echo $row->createdby;?></dd>
                            <dd class="col-sm-3"><?php echo $row->createddate;?></dd>
                            <dd class="col-sm-3"><?php echo $row->modifiedby;?></dd>
                            <dd class="col-sm-3"><?php echo $row->modifieddate;?></dd>
                        </dl>                     
                    </div>
                </div>                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i>  Tutup</button>
            </div>
        </form>
        </div>
    </div>
</div>
 <?php } 
} ?>

                </div>

                </div>
              </div>
            </div>
          </div>
</section>
      <!-- /.content -->
    </div>

<script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
<script>
  $(document).ready(function() {
  <?php foreach ($permintaan as $row) {
if($row->status == 'Dalam Pengajuan' || $row->status == 'Approved by Kadept' || $row->status == 'Tidak Disetujui oleh Kadept') {?> 

      // $("#show_hide_edit<?php echo $row->id_permintaan;?>").hide();

      // $('input:radio[name="kendaraan_edit<?php echo $row->id_permintaan;?>"]').change(function() {
        if($("[name='kendaraan_edit<?php echo $row->id_permintaan;?>']:checked").val() == 'GRAB')
        {
          console.log('GRAB');
          $("#show_hide_edit<?php echo $row->id_permintaan;?>").hide();
          $('[name="driver_edit<?php echo $row->id_permintaan;?>"]').removeAttr('required');
        } else {
          $("#show_hide_edit<?php echo $row->id_permintaan;?>").show();
          $('[name="driver_edit<?php echo $row->id_permintaan;?>"]').attr('required', '');
          console.log('Mobil');
        }
        
      // })
<?php }
} ?>
  })

  $("#show_hide").hide();

      $('input:radio[name="kendaraan"]').change(function() {
        if($("input[name='kendaraan']:checked").val() == 'GRAB')
        {
          $("#show_hide").hide();
          $('[name="driver"]').removeAttr('required');
        } else {
          $("#show_hide").show();
          $('[name="driver"]').attr('required', '');
        }
        // console.log('A');
      })
      
<?php foreach ($permintaan as $row) {
if($row->status == 'Dalam Pengajuan' || $row->status == 'Approved by Kadept' || $row->status == 'Tidak Disetujui oleh Kadept') {?> 

      $("#show_hide_edit<?php echo $row->id_permintaan;?>").hide();

      $('input:radio[name="kendaraan_edit<?php echo $row->id_permintaan;?>"]').change(function() {
        if($("[name='kendaraan_edit<?php echo $row->id_permintaan;?>']:checked").val() == 'GRAB')
        {
          console.log('GRAB');
          $("#show_hide_edit<?php echo $row->id_permintaan;?>").hide();
          $('[name="driver_edit<?php echo $row->id_permintaan;?>"]').removeAttr('required');
        } else {
          $("#show_hide_edit<?php echo $row->id_permintaan;?>").show();
          $('[name="driver_edit<?php echo $row->id_permintaan;?>"]').attr('required', '');
          console.log('Mobil');
        }
        
      })
<?php }
} ?>
</script>
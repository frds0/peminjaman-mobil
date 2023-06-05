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
              <h3 class="h4">Approved </h3>
            </div>

            <div class="card-body table-responsive">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>NPK</th>
                    <th>Nama</th>
                    <th>Tujuan</th>
                    <th>Keperluan</th>
                    <th>Tanggal Berangkat</th>
                    <th>Tanggal Kembali</th>
                    <th>Kendaraan</th>
                    <th>Tanggal Pengajuan</th>
                    <th>Status</th>
                    <th width="140">Aksi</th>
                  </tr>
                </thead>

                <tbody>
                  <?php foreach ($permintaan as $row) {
                    if ($row->status == 'Dalam Pengajuan') { ?>
                      <tr>
                        <td><?php echo $row->npk; ?></td>
                        <td><?php echo $row->createdby_name; ?></td>
                        <td><?php echo $row->tujuan; ?></td>
                        <td><?php echo $row->keperluan; ?></td>
                        <td><?php echo $row->berangkat; ?></td>
                        <td><?php echo $row->kembali; ?></td>
                        <td><?php echo $row->kendaraan; ?></td>
                        <td><?php echo $row->createddate; ?></td>
                        <td><?php echo $row->status; ?></td>
                        <td align="center">
                          <a data-toggle="modal" data-target="#approvedsetuju<?php echo $row->id_permintaan; ?>" href="#approvedsetuju<?php echo $row->id_permintaan; ?>" class="btn btn-success" title="Approved Setuju"><i class="fa fa-check"></i></a>
                          &nbsp;
                          <a data-toggle="modal" data-target="#approvedtidaksetuju<?php echo $row->id_permintaan; ?>" href="#approvedtidaksetuju<?php echo $row->id_permintaan; ?>" class="btn btn-danger" title="Approved Tidak Setuju"><i class="fa fa-times"></i></a>
                        </td>
            </div>
            </td>
            </tr>
        <?php }
                  } ?>
        </tbody>
        </table>


          </div>
          <!-- /.card-body -->

          <!-- /.card -->

          <!-- Modal Approved Setuju-->
          <?php foreach ($permintaan as $row) {
            if ($row->status == 'Dalam Pengajuan') { ?>
              <div class="modal fade" id="approvedsetuju<?php echo $row->id_permintaan; ?>" tabindex="-1" aria-labelledby="approvedsetuju<?php echo $row->id_permintaan; ?>" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content ">
                    <div class="card-primary">
                      <div class="card-header">
                        <h3 class="card-title">Detail Data Permintaan</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true"><i class="fa fa-times" style="color: red;"></i></span>
                        </button>
                      </div>
                      <!-- form start -->
                      <div class="modal-body">
                        <div class="form-group row">
                          <div class="col-12">
                            <dl class="row">
                              <dt class="col-sm-3">NPK</dt>
                              <dt class="col-sm-3">Nama</dt>
                              <dt class="col-sm-3">Tujuan</dt>
                              <dt class="col-sm-3">Keperluan</dt>
                            </dl>
                            <dl class="row">
                              <dd class="col-sm-3"><?php echo $row->npk; ?></dd>
                              <dd class="col-sm-3"><?php echo $row->createdby_name; ?></dd>
                              <dd class="col-sm-3"><?php echo $row->tujuan; ?></dd>
                              <dd class="col-sm-3"><?php echo $row->keperluan; ?></dd>
                            </dl>
                            <dl class="row">
                              <dt class="col-sm-3">Tanggal Berangkat</dt>
                              <dt class="col-sm-3">Tanggal Kembali</dt>
                              <dt class="col-sm-3">Pilihan Kendaraan</dt>
                              <?php if ($row->kendaraan == 'Mobil') { ?>
                                <dt class="col-sm-3">Driver</dt>
                              <?php } ?>
                            </dl>
                            <dl class="row">
                              <dd class="col-sm-3"><?php echo $row->berangkat; ?></dd>
                              <dd class="col-sm-3"><?php echo $row->kembali; ?></dd>
                              <dd class="col-sm-3"><?php echo $row->kendaraan; ?></dd>
                              <?php if ($row->kendaraan == 'Mobil') { ?>
                                <dd class="col-sm-3"><?php echo $row->driver; ?></dd>
                              <?php } ?>
                            </dl>
                          </div>
                        </div>

                        <form method="post" action="<?php echo site_url('CTR_ATApproved/EditData'); ?>" enctype="multipart/form-data">
                          <div class="form-group" style="display: none;">
                            <label>ID Permintaan</label>
                            <input type="text" class="form-control" value="<?php echo $row->id_permintaan; ?>" name="id_permintaan">
                          </div>

                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
                            <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Setuju</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          <?php }
          } ?>

          <!-- Modal Approved Tidak Setuju-->
          <?php foreach ($permintaan as $row) {
            if ($row->status == 'Dalam Pengajuan') { ?>
              <div class="modal fade" id="approvedtidaksetuju<?php echo $row->id_permintaan; ?>" tabindex="-1" aria-labelledby="approvedtidaksetuju<?php echo $row->id_permintaan; ?>" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content ">
                    <div class="card-primary">
                      <div class="card-header">
                        <h3 class="card-title">Detail Data Permintaan</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true"><i class="fa fa-times" style="color: red;"></i></span>
                        </button>
                      </div>
                      <!-- form start -->
                      <div class="modal-body">
                        <div class="form-group row">
                          <div class="col-12">
                            <dl class="row">
                              <dt class="col-sm-3">NPK</dt>
                              <dt class="col-sm-3">Nama</dt>
                              <dt class="col-sm-3">Tujuan</dt>
                              <dt class="col-sm-3">Keperluan</dt>
                            </dl>
                            <dl class="row">
                              <dd class="col-sm-3"><?php echo $row->npk; ?></dd>
                              <dd class="col-sm-3"><?php echo $row->createdby_name; ?></dd>
                              <dd class="col-sm-3"><?php echo $row->tujuan; ?></dd>
                              <dd class="col-sm-3"><?php echo $row->keperluan; ?></dd>
                            </dl>
                            <dl class="row">
                              <dt class="col-sm-3">Tanggal Berangkat</dt>
                              <dt class="col-sm-3">Tanggal Kembali</dt>
                              <dt class="col-sm-3">Pilihan Kendaraan</dt>
                              <?php if ($row->kendaraan == 'Mobil') { ?>
                                <dt class="col-sm-3">Driver</dt>
                              <?php } ?>
                            </dl>
                            <dl class="row">
                              <dd class="col-sm-3"><?php echo $row->berangkat; ?></dd>
                              <dd class="col-sm-3"><?php echo $row->kembali; ?></dd>
                              <dd class="col-sm-3"><?php echo $row->kendaraan; ?></dd>
                              <?php if ($row->kendaraan == 'Mobil') { ?>
                                <dd class="col-sm-3"><?php echo $row->driver; ?></dd>
                              <?php } ?>
                            </dl>
                          </div>
                        </div>
                        <hr>
                        <form method="post" action="<?php echo site_url('CTR_ATApproved/revisi'); ?>" enctype="multipart/form-data">
                          <div class="form-group" style="display: none;">
                            <label>ID Permintaan</label>
                            <input type="text" class="form-control" value="<?php echo $row->id_permintaan; ?>" name="id_permintaan">
                          </div>

                          <div class="form-group">
                            <label>Alasan<span style="color: red;"> (Isi jika tidak setuju)</span></label>
                            <input type="text" class="form-control" value="<?php echo $row->approved_tidaksetuju; ?>" name="approved_tidaksetuju<?php echo $row->id_permintaan; ?>">
                          </div><br />

                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
                            <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Simpan</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          <?php }
          } ?>
        </div>
      </div>
    </div>
</div>
</section>
<!-- /.content -->
</div>
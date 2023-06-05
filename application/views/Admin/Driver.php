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
              <h3 class="h4">Kelola Data Driver</h3>
            </div>

            <div class="card-body table-responsive">
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary ml-4" data-toggle="modal" data-target="#exampleModal">
                + Tambah Data
              </button>

              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th align="center">No</th>
                      <th>NPK</th>
                      <th>Nama Driver</th>
                      <th>Available</th>
                      <th>Status</th>
                      <th width="75">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($driver as $row) { ?>
                      <tr>
                        <td><?= $i; ?>.</td>
                        <td><?php echo $row->npk; ?></td>
                        <td><?php echo $row->nama; ?></td>
                        <td><?php echo $row->available; ?></td>
                        <td><?php echo $row->status; ?></td>
                        <td align="center"><a data-toggle="modal" data-target="#edit_driver<?php echo $row->id_driver; ?>" href="#edit_driver<?php echo $row->id_driver; ?>" class="btn btn-success" title="Edit Data"><i class="nav-icon fas fa-edit"></i></a> <a data-toggle="modal" data-target="#detail_driver<?php echo $row->id_driver; ?>" href="#detail_driver<?php echo $row->id_driver; ?>" class="btn btn-primary" title="Lihat Data"><i class="nav-icon fas fa-eye"></i></a></td>
                      </tr>
                      <?php $i++; ?>
                    <?php } ?>
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
                      <h3 class="card-title">Tambah Data Driver</h3>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fa fa-times" style="color: red;"></i></span>
                      </button>
                    </div>
                    <!-- form start -->
                    <form method="post" action="<?php echo site_url('CTR_Driver/InsertData'); ?>" enctype="multipart/form-data">
                      <div class="card-body">
                        <div class="form-group">
                          <label>NPK</label>
                          <input type="text" class="form-control" placeholder="NPK" name="npk">
                        </div>

                        <div class="form-group">
                          <label>Nama Driver</label>
                          <input type="text" class="form-control" placeholder="Nama Driver" name="nama">
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
            <?php foreach ($driver as $row) { ?>
              <div class="modal fade" id="edit_driver<?php echo $row->id_driver; ?>" tabindex="-1" aria-labelledby="edit_driver<?php echo $row->id_driver; ?>" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="card-primary">
                      <div class="card-header">
                        <h3 class="card-title">Edit Data Driver</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true"><i class="fa fa-times" style="color: red;"></i></span>
                        </button>
                      </div>
                      <!-- form start -->
                      <form method="post" action="<?php echo site_url('CTR_Driver/EditData'); ?>">
                        <div class="card-body">
                          <div class="form-group" style="display: none;">
                            <label>ID Driver</label>
                            <input type="text" class="form-control" value="<?php echo $row->id_driver; ?>" name="id_driver">
                          </div>

                          <div class="form-group">
                            <label>NPK<span style="color: red;">*</span></label>
                            <input type="text" class="form-control" value="<?php echo $row->npk; ?>" name="edit_npk">
                          </div>

                          <div class="form-group">
                            <label>Nama<span style="color: red;">*</span></label>
                            <input type="text" class="form-control" value="<?php echo $row->nama; ?>" name="edit_nama">
                          </div>

                          <div class="form-group">
                            <label class="form-control-label">Status :<span style="color: red;">*</span></label>

                            <div class="ml-3">
                              <input type="radio" value="Aktif" <?php echo ($row->status == 'Aktif' ? 'checked' : ''); ?> name="edit_status">
                              <label>Aktif</label>
                            </div>

                            <div class="ml-3">
                              <input type="radio" id="status" value="Non Aktif" <?php echo ($row->status == 'Non Aktif' ? 'checked' : ''); ?> name="edit_status">
                              <label>Non Aktif</label>
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
            <?php } ?>

            <!-- Modal Detail Data-->
            <?php foreach ($driver as $row) { ?>
              <div class="modal fade" id="detail_driver<?php echo $row->id_driver; ?>">
                <div class="modal-dialog modal-lg">
                  <div style="padding-bottom: 0px;" class="modal-content">
                    <div style="padding-top: 10px; padding-bottom: 10px;" class="modal-header bg-primary">
                      <h5 class="modal-title" style="text-align: center;"><strong>Detail Data Driver</strong></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fa fa-times" style="color: red;"></i></span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="form-group row">
                        <div class="col-12">
                          <dl class="row">
                            <dt class="col-sm-3">NPK</dt>
                            <dt class="col-sm-3">Nama</dt>
                            <dt class="col-sm-3">Status</dt>

                          </dl>
                          <dl class="row">
                            <dd class="col-sm-3"><?php echo $row->npk; ?></dd>
                            <dd class="col-sm-3"><?php echo $row->nama; ?></dd>
                            <dd class="col-sm-3"><?php echo $row->status; ?></dd>
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
                            <dd class="col-sm-3"><?php echo $row->createdby; ?></dd>
                            <dd class="col-sm-3"><?php echo $row->createddate; ?></dd>
                            <dd class="col-sm-3"><?php echo $row->modifiedby; ?></dd>
                            <dd class="col-sm-3"><?php echo $row->modifieddate; ?></dd>
                          </dl>
                        </div>
                      </div>

                    </div>
                    <div class="modal-footer bg-light">
                      <button style="float: right; font-size: 14px;" type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
            <?php } ?>


          </div>

        </div>
      </div>
    </div>
</div>
</section>
<!-- /.content -->
</div>
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
              <h3 class="h4">Kelola Data E-Money</h3>
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
                      <th>No</th>
                      <th>Nomor E-Money</th>
                      <th>Nama Bank</th>
                      <th>Available</th>
                      <th>Status</th>
                      <th width="75">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($emoney as $row) { ?>
                      <tr>
                        <td><?= $i; ?>.</td>
                        <td><?php echo $row->nomor; ?></td>
                        <td><?php echo $row->namabank; ?></td>
                        <td><?php echo $row->available; ?></td>
                        <td><?php echo $row->status; ?></td>
                        <td align="center"><a data-toggle="modal" data-target="#edit_emoney<?php echo $row->id_emoney; ?>" href="#edit_emoney<?php echo $row->id_emoney; ?>" class="btn btn-success" title="Edit Data"><i class="nav-icon fas fa-edit"></i></a> <a data-toggle="modal" data-target="#detail_emoney<?php echo $row->id_emoney; ?>" href="#detail_emoney<?php echo $row->id_emoney; ?>" class="btn btn-primary" title="Lihat Data"><i class="nav-icon fas fa-eye"></i></a></td>
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
                      <h3 class="card-title">Tambah Data E-Money</h3>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fa fa-times" style="color: red;"></i></span>
                      </button>
                    </div>
                    <!-- form start -->
                    <form method="post" action="<?php echo site_url('CTR_Emoney/InsertData'); ?>" enctype="multipart/form-data">
                      <div class="card-body">
                        <div class="form-group">
                          <label>Nomor E-Money<span style="color: red;">*</span></label>
                          <input type="text" class="form-control" placeholder="Nomor E-Money" name="nomor">
                        </div>

                        <div class="form-group">
                          <label>Nama Bank<span style="color: red;">*</span></label>
                          <input type="text" class="form-control" placeholder="Nama Bank" name="namabank">
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
            <?php foreach ($emoney as $row) { ?>
              <div class="modal fade" id="edit_emoney<?php echo $row->id_emoney; ?>" tabindex="-1" aria-labelledby="edit_emoney<?php echo $row->id_emoney; ?>" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="card-primary">
                      <div class="card-header">
                        <h3 class="card-title">Edit Data E-Money</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true"><i class="fa fa-times" style="color: red;"></i></span>
                        </button>
                      </div>
                      <!-- form start -->
                      <form method="post" action="<?php echo site_url('CTR_Emoney/EditData'); ?>">
                        <div class="card-body">
                          <div class="form-group" style="display: none;">
                            <label>ID Emoney</label>
                            <input type="text" class="form-control" value="<?php echo $row->id_emoney; ?>" name="id_emoney">
                          </div>

                          <div class="form-group">
                            <label>Nomor E-Money</label>
                            <input type="text" class="form-control" value="<?php echo $row->nomor; ?>" name="edit_nomor">
                          </div>

                          <div class="form-group">
                            <label>Nama Bank</label>
                            <input type="text" class="form-control" value="<?php echo $row->namabank; ?>" name="edit_namabank">
                          </div>

                          <div class="form-group">
                            <label class="form-control-label">Status :</label>

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
            <?php foreach ($emoney as $row) { ?>
              <div class="modal fade" id="detail_emoney<?php echo $row->id_emoney; ?>">
                <div class="modal-dialog modal-lg">
                  <div style="padding-bottom: 0px;" class="modal-content">
                    <div style="padding-top: 10px; padding-bottom: 10px;" class="modal-header bg-primary">
                      <h5 class="modal-title" style="text-align: center;"><strong>Detail Data E-Money</strong></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fa fa-times" style="color: red;"></i></span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="form-group row">
                        <div class="col-12">
                          <dl class="row">
                            <dt class="col-sm-3">Nomor E-Money</dt>
                            <dt class="col-sm-3">Nama Bank</dt>
                            <dt class="col-sm-3">Status</dt>

                          </dl>
                          <dl class="row">
                            <dd class="col-sm-3"><?php echo $row->nomor; ?></dd>
                            <dd class="col-sm-3"><?php echo $row->namabank; ?></dd>
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
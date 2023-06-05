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
              <h3 class="h4">Kelola Data Mobil</h3>
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
                      <th>No. Polisi</th>
                      <th>Merk Mobil</th>
                      <th>Warna Mobil</th>
                      <th>Tahun Pembelian</th>
                      <th>Available</th>
                      <th>Status</th>
                      <th width="75">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($mobil as $row) { ?>
                      <tr>
                        <td><?= $i; ?>.</td>
                        <td><?php echo $row->nopolisi; ?></td>
                        <td><?php echo $row->merk; ?></td>
                        <td><?php echo $row->warna; ?></td>
                        <td><?php echo $row->tahunpembelian; ?></td>
                        <td><?php echo $row->available; ?></td>
                        <td><?php echo $row->status; ?></td>
                        <td align="center"><a data-toggle="modal" data-target="#edit_mobil<?php echo $row->id_mobil; ?>" href="#edit_mobil<?php echo $row->id_mobil; ?>" class="btn btn-success" title="Edit Data"><i class="nav-icon fas fa-edit"></i></a> <a data-toggle="modal" data-target="#detail_mobil<?php echo $row->id_mobil; ?>" href="#detail_mobil<?php echo $row->id_mobil; ?>" class="btn btn-primary" title="Lihat Data"><i class="nav-icon fas fa-eye"></i></a></td>
                        </td>
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
                      <h3 class="card-title">Tambah Data Mobil</h3>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fa fa-times" style="color: red;"></i></span>
                      </button>
                    </div>
                    <!-- form start -->
                    <form method="post" action="<?php echo site_url('CTR_Mobil/InsertData'); ?>" enctype="multipart/form-data">
                      <div class="card-body">
                        <div class="form-group">
                          <label>No. Polisi<span style="color: red;">*</span></label>
                          <input type="text" class="form-control" placeholder="No. Polisi" name="nopolisi">
                        </div>

                        <div class="form-group">
                          <label>Merk Mobil<span style="color: red;">*</span></label>
                          <input type="text" class="form-control" placeholder="Merk Mobil" name="merk">
                        </div>

                        <div class="form-group">
                          <label>Warna Mobil<span style="color: red;">*</span></label>
                          <input type="text" class="form-control" placeholder="Warna Mobil" name="warna">
                        </div>

                        <div class="form-group">
                          <label>Tahun Pembelian<span style="color: red;">*</span></label>
                          <input type="text" class="form-control" placeholder="Tahun Pembelian" name="tahunpembelian">
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
            <?php foreach ($mobil as $row) { ?>
              <div class="modal fade" id="edit_mobil<?php echo $row->id_mobil; ?>" tabindex="-1" aria-labelledby="edit_mobil<?php echo $row->id_mobil; ?>" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="card-primary">
                      <div class="card-header">
                        <h3 class="card-title">Edit Data Mobil</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true"><i class="fa fa-times" style="color: red;"></i></span>
                        </button>
                      </div>
                      <!-- form start -->
                      <form method="post" action="<?php echo site_url('CTR_Mobil/EditData'); ?>" enctype="multipart/form-data">
                        <div class="card-body">
                          <div class="form-group" style="display: none;">
                            <label>ID Mobil</label>
                            <input type="text" class="form-control" value="<?php echo $row->id_mobil; ?>" name="id_mobil">
                          </div>

                          <div class="form-group">
                            <label>No. Polisi</label>
                            <input type="text" class="form-control" id="nopolisi" value="<?php echo $row->nopolisi; ?>" name="edit_nopolisi">
                          </div>

                          <div class="form-group">
                            <label>Merk Mobil</label>
                            <input type="text" class="form-control" id="merk" value="<?php echo $row->merk; ?>" name="edit_merk">
                          </div>

                          <div class="form-group">
                            <label>Warna Mobil</label>
                            <input type="text" class="form-control" id="warna" value="<?php echo $row->warna; ?>" name="edit_warna">
                          </div>

                          <div class="form-group">
                            <label>Tahun Pembelian</label>
                            <input type="text" class="form-control" id="tahunpembelian" value="<?php echo $row->tahunpembelian; ?>" name="edit_tahunpembelian">
                          </div>

                          <div class="form-group">
                            <label class="form-control-label">Status :</label>

                            <div class="ml-3">
                              <input type="radio" id="status" value="Aktif" <?php echo ($row->status == 'Aktif' ? 'checked' : ''); ?> name="edit_status">
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
            <?php foreach ($mobil as $row) { ?>
              <div class="modal fade" id="detail_mobil<?php echo $row->id_mobil; ?>">
                <div class="modal-dialog modal-lg">
                  <div style="padding-bottom: 0px;" class="modal-content">
                    <div style="padding-top: 10px; padding-bottom: 10px;" class="modal-header bg-primary">
                      <h5 class="modal-title" style="text-align: center;"><strong>Detail Data Mobil</strong></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fa fa-times" style="color: red;"></i></span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="form-group row">
                        <div class="col-12">
                          <dl class="row">
                            <dt class="col-sm-3">No. Polisi</dt>
                            <dt class="col-sm-3">Merk Mobil</dt>
                            <dt class="col-sm-3">Warna Mobil</dt>
                            <dt class="col-sm-3">Tahun Pembelian</dt>
                          </dl>
                          <dl class="row">
                            <dd class="col-sm-3" id="nopolisi"><?php echo $row->nopolisi; ?></dd>
                            <dd class="col-sm-3" id="merk"><?php echo $row->merk; ?></dd>
                            <dd class="col-sm-3" id="warna"><?php echo $row->warna; ?></dd>
                            <dd class="col-sm-3" id="tahunpembelian"><?php echo $row->tahunpembelian; ?></dd>
                          </dl>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-12">
                          <dl class="row">
                            <dt class="col-sm-3">Status</dt>
                          </dl>
                          <dl class="row">
                            <dd class="col-sm-3" id="status"><?php echo $row->status; ?></dd>
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
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
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
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
              <h3 class="h4">Kelola Data Pengguna</h3>
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
                      <th>NPK</th>
                      <th>Nama Pengguna</th>
                      <th>Department</th>
                      <th>Status</th>
                      <th>Role</th>
                      <th width="80">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($pengguna as $row) { ?>
                      <tr>
                        <td><?= $i; ?>.</td>
                        <td><?php echo $row->npk; ?></td>
                        <td><?php echo $row->nama; ?></td>
                        <td><?php echo $row->dept; ?></td>
                        <td><?php echo $row->status; ?></td>
                        <td><?php echo $row->role; ?></td>
                        <td align="center"><a data-toggle="modal" data-target="#edit_pengguna<?php echo $row->id_user; ?>" href="#edit_pengguna<?php echo $row->id_user; ?>" class="btn btn-success" title="Edit Data"><i class="nav-icon fas fa-edit"></i></a> <a data-toggle="modal" data-target="#detail_pengguna<?php echo $row->id_user; ?>" href="#detail_pengguna<?php echo $row->id_user; ?>" class="btn btn-primary" title="Lihat Data"><i class="nav-icon fas fa-eye"></i></a></td>
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
                      <h3 class="card-title">Tambah Data Pengguna</h3>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fa fa-times" style="color: red;"></i></span>
                      </button>
                    </div>
                    <!-- form start -->
                    <form method="post" action="<?php echo site_url('CTR_Pengguna/InsertData'); ?>" enctype="multipart/form-data">
                      <div class="card-body">
                        <div class="form-group">
                          <label>NPK</label>
                          <input type="text" class="form-control" placeholder="NPK" name="npk">
                        </div>

                        <div class="form-group">
                          <label>Nama Pengguna</label>
                          <input type="text" class="form-control" placeholder="Nama Pengguna" name="nama">
                        </div>

                        <div class="form-group">
                          <label>Department</label>
                          <select class="form-control" name="dept">
                            <option value="">-- Pilih Department --</option>
                            <option value="IT">IT</option>
                            <option value="GA">GA</option>
                            <option value="HCHO">HCHO</option>
                            <option value="HCOPS">HCOPS</option>
                            <option value="Comersial SG">Comersial SG</option>
                            <option value="SST">SST</option>
                            <option value="SI">SI</option>
                            <option value="SA">SA</option>
                            <option value="Corporate">Corporate</option>
                            <option value="Operasional">Operasional</option>
                          </select>
                        </div>

                        <div class="form-group">
                          <label>Password</label>
                          <input type="text" class="form-control" placeholder="Password" name="password">
                        </div>

                        <div class="form-group">
                          <label>Role</label>
                          <select class="form-control" name="role">
                            <option value="">-- Pilih Role --</option>
                            <option value="Kadept">Kadept</option>
                            <option value="Admin">Admin</option>
                            <option value="Staff">Staff</option>
                          </select>
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
            <?php foreach ($pengguna as $row) { ?>
              <div class="modal fade" id="edit_pengguna<?php echo $row->id_user; ?>" tabindex="-1" aria-labelledby="edit_pengguna<?php echo $row->id_user; ?>" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="card-primary">
                      <div class="card-header">
                        <h3 class="card-title">Edit Data Pengguna</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true"><i class="fa fa-times" style="color: red;"></i></span>
                        </button>
                      </div>
                      <!-- form start -->
                      <form method="post" action="<?php echo site_url('CTR_Pengguna/EditData'); ?>">
                        <div class="card-body">
                          <div class="form-group" style="display: none;">
                            <label>ID User</label>
                            <input type="text" class="form-control" value="<?php echo $row->id_user; ?>" name="id_user">
                          </div>

                          <div class="form-group">
                            <label>NPK<span style="color: red;">*</span></label>
                            <input type="text" class="form-control" value="<?php echo $row->npk; ?>" name="edit_npk">
                          </div>

                          <div class="form-group">
                            <label>Nama Pengguna<span style="color: red;">*</span></label>
                            <input type="text" class="form-control" value="<?php echo $row->nama; ?>" name="edit_nama">
                          </div>

                          <div class="form-group">
                            <label>Department <span style="color: red;">*</span></label>
                            <select class="form-control" value="<?php echo $row->dept; ?>" name="edit_dept">
                              <option value="">-- Pilih Department --</option>
                              <option value="IT" <?php echo ($row->dept == 'IT' ? 'selected' : ''); ?>>IT</option>
                              <option value="GA" <?php echo ($row->dept == 'GA' ? 'selected' : ''); ?>>GA</option>
                              <option value="HCHO" <?php echo ($row->dept == 'HCHO' ? 'selected' : ''); ?>>HCHO</option>
                              <option value="HCOPS" <?php echo ($row->dept == 'HCOPS' ? 'selected' : ''); ?>>HCOPS</option>
                              <option value="Comersial SG" <?php echo ($row->dept == 'Comersial SG' ? 'selected' : ''); ?>>Comersial SG</option>
                              <option value="SST" <?php echo ($row->dept == 'SST' ? 'selected' : ''); ?>>SST</option>
                              <option value="SI" <?php echo ($row->dept == 'SI' ? 'selected' : ''); ?>>SI</option>
                              <option value="SA" <?php echo ($row->dept == 'SA' ? 'selected' : ''); ?>>SA</option>
                              <option value="Corporate" <?php echo ($row->dept == 'Corporate' ? 'selected' : ''); ?>>Corporate</option>
                              <option value="Operasional" <?php echo ($row->dept == 'Operasional' ? 'selected' : ''); ?>>Operasional</option>
                            </select>
                          </div>

                          <div class="form-group">
                            <label for="">Password</label>
                            <div class="input-group mb-3">
                              <input type="password" name="edit_password" class="form-control" value="<?php echo $row->password ?>" id="myInput<?php echo $row->npk ?>" aria-label="text input with checkbox">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <input type="checkbox" name="password" onclick="myFunction()" aria-label="Checkbox for following text input" value="<?php echo $row->password ?>">
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- <div class="form-group">
                            <label>Password<span style="color: red;">*</span></label>
                            <input type="password" class="form-control" value="<?php echo $row->password; ?>" name="edit_password">
                          </div> -->

                          <div class="form-group">
                            <label class="form-control-label">Status :<span style="color: red;">*</span></label>

                            <div class="ml-3">
                              <input type="radio" value="Aktif" <?php echo ($row->status == 'Aktif' ? 'checked' : ''); ?> name="edit_status">
                              <label>Aktif</label>
                            </div>

                            <div class="ml-3">
                              <input type="radio" value="Non Aktif" <?php echo ($row->status == 'Non Aktif' ? 'checked' : ''); ?> name="edit_status">
                              <label>Non Aktif</label>
                            </div>
                          </div>

                          <div class="form-group">
                            <label>Role</label>
                            <select class="form-control" name="edit_role">
                              <option value="">-- Pilih Role --</option>
                              <option value="Kadept" <?php echo ($row->role == 'Kadept' ? 'selected' : ''); ?>>Kadept</option>
                              <option value="Admin" <?php echo ($row->role == 'Admin' ? 'selected' : ''); ?>>Admin</option>
                              <option value="Staff" <?php echo ($row->role == 'Staff' ? 'selected' : ''); ?>>Staff</option>
                            </select>
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
            <?php foreach ($pengguna as $row) { ?>
              <div class="modal fade" id="detail_pengguna<?php echo $row->id_user; ?>">
                <div class="modal-dialog modal-lg">
                  <div style="padding-bottom: 0px;" class="modal-content">
                    <div style="padding-top: 10px; padding-bottom: 10px;" class="modal-header bg-primary">
                      <h5 class="modal-title" style="text-align: center;"><strong>Detail Data Pengguna</strong></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fa fa-times" style="color: red;"></i></span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="form-group row">
                        <div class="col-12">
                          <dl class="row">
                            <dt class="col-sm-3">NPK</dt>
                            <dt class="col-sm-3">Nama Pengguna</dt>
                            <dt class="col-sm-3">Department</dt>
                            <dt class="col-sm-3">Status</dt>
                          </dl>
                          <dl class="row">
                            <dd class="col-sm-3"><?php echo $row->npk; ?></dd>
                            <dd class="col-sm-3"><?php echo $row->nama; ?></dd>
                            <dd class="col-sm-3"><?php echo $row->dept; ?></dd>
                            <dd class="col-sm-3"><?php echo $row->status; ?></dd>
                          </dl>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-12">
                          <dl class="row">
                            <dt class="col-sm-3">Role</dt>
                          </dl>
                          <dl class="row">
                            <dd class="col-sm-3"><?php echo $row->role; ?></dd>
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
<script type="text/javascript">
  function myFunction() {
    <?php foreach ($pengguna as $row) { ?>
      var x = document.getElementById("myInput<?php echo $row->npk ?>");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    <?php } ?>
  }
</script>
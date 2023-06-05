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

            <div class="card-body table-responsive">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>NPK</th>
                    <th>Nama</th>
                    <th>Dept</th>
                    <th>Tujuan</th>
                    <th>Keperluan</th>
                    <th>Tanggal Berangkat</th>
                    <th>Tanggal Kembali</th>
                    <th>Kendaraan</th>
                    <th>Tanggal Pengajuan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>

                <tbody>
                  <?php foreach ($permintaan as $row) {
                    if ($row->status == 'Approved by Kadept') { ?>
                      <tr>
                        <td><?php echo $row->npk; ?></td>
                        <td><?php echo $row->createdby_name; ?></td>
                        <td><?php echo $row->dept; ?></td>
                        <td><?php echo $row->tujuan; ?></td>
                        <td><?php echo $row->keperluan; ?></td>
                        <td><?php echo $row->berangkat; ?></td>
                        <td><?php echo $row->kembali; ?></td>
                        <td><?php echo $row->kendaraan; ?></td>
                        <td><?php echo $row->createddate; ?></td>
                        <td><?php echo $row->status; ?></td>
                        <td align="center"><a data-toggle="modal" data-target="#followup_permintaan<?php echo $row->id_permintaan; ?>" href="#followup_permintaan<?php echo $row->id_permintaan; ?>" class="btn btn-success" title="Edit Data">Assign Mobil</a></td>
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

          <!-- Modal Edit Data-->
          <?php foreach ($permintaan as $row) {
            if ($row->status == 'Approved by Kadept') { ?>
              <div class="modal fade" id="followup_permintaan<?php echo $row->id_permintaan; ?>" tabindex="-1" aria-labelledby="followup_permintaan<?php echo $row->id_permintaan; ?>" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
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
                            <dl class="row">
                              <dt class="col-sm-3">Approved by</dt>
                              <dt class="col-sm-3">Approved Date</dt>
                            </dl>
                            <dl class="row">
                              <dd class="col-sm-3"><?php echo $row->approvedby; ?></dd>
                              <dd class="col-sm-3"><?php echo $row->approveddate; ?></dd>
                            </dl>
                          </div>
                        </div>
                        <hr>

                        <form method="post" action="<?php echo site_url('CTR_APermintaan/EditData'); ?>" enctype="multipart/form-data">

                          <div class="form-group" style="display: none;">
                            <label>ID Permintaan</label>
                            <input type="text" class="form-control" value="<?php echo $row->id_permintaan; ?>" name="id_permintaan">
                          </div>

                          <div class="form-group">
                            <label>Mobil <span style="color: red;">*</span></label>
                            <select class="custom-select" value="<?php echo $row->mobil; ?>" name="editfollowmobil<?php echo $row->id_permintaan; ?>" required>
                              <option value="">-- Pilih Mobil --</option>
                              <?php foreach ($datamobil as $key) : ?>
                                <option value="<?php echo $key->id_mobil; ?>" <?php if ($row->id_mobil == $key->id_mobil) echo " selected" ?>>
                                  <?php echo $key->nopolisi . ' - ' . $key->merk ?>
                                </option>
                              <?php endforeach ?>
                            </select>
                          </div>

                          <div id="show_hide_grab<?php echo $row->id_permintaan; ?>">
                            <div class="form-group">
                              <label>Kode Voucher<span style="color: red;">*</span></label>
                              <input type="text" class="form-control" value="<?php echo $row->kodevoucher; ?>" name="editkodevoucher<?php echo $row->id_permintaan; ?>" required>
                            </div>
                          </div>

                          <div id="show_hide<?php echo $row->id_permintaan; ?>">
                            <?php if ($row->driver == 'Ya') { ?>
                              <div class="form-group">
                                <label>Nama Driver<span style="color: red;">*</span></label>
                                <select class="custom-select" value="<?php echo $row->namadriver; ?>" name="editfollowdriver<?php echo $row->id_permintaan; ?>" required>
                                  <option value="">-- Pilih Driver --</option>
                                  <?php foreach ($datadriver as $key) : ?>
                                    <option value="<?php echo $key->id_driver; ?>" <?php if ($row->namadriver == $key->id_driver) echo " selected" ?>>
                                      <?php echo $key->nama; ?></option>
                                  <?php endforeach ?>
                                </select>
                              </div>
                            <?php } ?>

                            <div class="form-group">
                              <label>Km Awal<span style="color: red;">*</span></label>
                              <input type="text" class="form-control" value="<?php echo $row->km_berangkat; ?>" name="editkm_berangkat<?php echo $row->id_permintaan; ?>" required>
                            </div>

                            <div class="form-group">
                              <label>E-Money<span style="color: red;">*</span></label>
                              <select class="custom-select" value="<?php echo $row->emoney; ?>" name="editemoney<?php echo $row->id_permintaan; ?>" required>
                                <option value="">-- Pilih E-Money --</option>
                                <?php foreach ($dataemoney as $key) : ?>
                                  <option value="<?php echo $key->id_emoney; ?>" <?php if ($row->emoney == $key->id_emoney) echo " selected" ?>>
                                    <?php echo $key->namabank . ' - ' . $key->nomor; ?>
                                  </option>
                                <?php endforeach ?>
                              </select>
                            </div>

                            <div class="form-group">
                              <label>Saldo Awal<span style="color: red;">*</span></label>
                              <input type="text" class="form-control" value="<?php echo $row->saldo_awal_emoney; ?>" name="editsaldoawal<?php echo $row->id_permintaan; ?>" required>
                            </div>

                          </div>

                          <div class="form-group">
                            <label>Alasan</label>
                            <input type="text" class="form-control" value="<?php echo $row->alasan_assignmobil; ?>" name="edit_assignmobil<?php echo $row->id_permintaan; ?>">
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
  <?php foreach ($permintaan as $row) {
    if ($row->status == 'Approved by Kadept') { ?>
      $("#show_hide<?php echo $row->id_permintaan; ?>").hide();
      $("#show_hide_grab<?php echo $row->id_permintaan; ?>").hide();

      $('[name="editfollowmobil<?php echo $row->id_permintaan; ?>"]').change(function() {
        // console.log('A');
        if ($('[name="editfollowmobil<?php echo $row->id_permintaan; ?>"]').val() == 1) {
          $("#show_hide<?php echo $row->id_permintaan; ?>").hide();
          $('[name="editfollowmobil<?php echo $row->id_permintaan; ?>"]').removeAttr('required');
          $('[name="editfollowdriver<?php echo $row->id_permintaan; ?>"]').removeAttr('required');
          $('[name="editkm_berangkat<?php echo $row->id_permintaan; ?>"]').removeAttr('required');
          $('[name="editemoney<?php echo $row->id_permintaan; ?>"]').removeAttr('required');
          $('[name="editsaldoawal<?php echo $row->id_permintaan; ?>"]').removeAttr('required');

          $("#show_hide_grab<?php echo $row->id_permintaan; ?>").show();
          $('[name="editkodevoucher<?php echo $row->id_permintaan; ?>"]').attr('required', '');

        } else {
          $("#show_hide<?php echo $row->id_permintaan; ?>").show();
          $('[name="editfollowmobil<?php echo $row->id_permintaan; ?>"]').attr('required', '');
          $('[name="editfollowdriver<?php echo $row->id_permintaan; ?>"]').attr('required', '');
          $('[name="editkm_berangkat<?php echo $row->id_permintaan; ?>"]').attr('required', '');
          $('[name="editemoney<?php echo $row->id_permintaan; ?>"]').attr('required', '');
          $('[name="editsaldoawal<?php echo $row->id_permintaan; ?>"]').attr('required', '');

          $("#show_hide_grab<?php echo $row->id_permintaan; ?>").hide();
          $('[name="editkodevoucher<?php echo $row->id_permintaan; ?>"]').removeAttr('required');

        }
      })
  <?php }
  } ?>
</script>
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
              <h3 class="h4">Kelola Data Penyelesaian</h3>
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
                    <th>Mobil </th>
                    <th>Status</th>
                    <th width="140">Aksi</th>
                  </tr>
                </thead>

                <tbody>
                  <?php foreach ($permintaan as $row) {
                    if ($row->status == 'Approved by Admin GA' || $row->status == 'Revisi') { ?>
                      <tr>
                        <td><?php echo $row->npk; ?></td>
                        <td><?php echo $row->createdby_name; ?></td>
                        <td><?php echo $row->tujuan; ?></td>
                        <td><?php echo $row->keperluan; ?></td>
                        <td><?php echo $row->berangkat; ?></td>
                        <td><?php echo $row->kembali; ?></td>
                        <td><?php echo $row->mobil; ?></td>
                        <td><?php echo $row->status; ?></td>
                        <?php if ($row->status == 'Approved by Admin GA') { ?>
                          <td><a data-toggle="modal" data-target="#edit_atasan<?php echo $row->id_permintaan; ?>" href="#edit_atasan<?php echo $row->id_permintaan; ?>" class="btn btn-success" title="Penyelesaian Data">Penyelesaian</a></td>
                        <?php } ?>

                        <?php if ($row->status == 'Revisi') { ?>
                          <td><a data-toggle="modal" data-target="#revisi_atasan<?php echo $row->id_permintaan; ?>" href="#revisi_atasan<?php echo $row->id_permintaan; ?>" class="btn btn-danger" title="Revisi Data">Revisi</a></td>
                        <?php } ?>

                      </tr>
                  <?php }
                  } ?>
                </tbody>
              </table>
              <br>

            </div>
            <!-- /.card-body -->
            <!-- /.card -->


            <!-- Modal Edit Data-->
            <?php foreach ($permintaan as $row) {
              if ($row->status == 'Approved by Admin GA' || $row->status == 'Revisi') { ?>
                <div class="modal fade" id="edit_atasan<?php echo $row->id_permintaan; ?>" tabindex="-1" aria-labelledby="edit_atasan<?php echo $row->id_permintaan; ?>" aria-hidden="true">
                  <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                      <div class="card-primary">
                        <div class="card-header">
                          <h3 class="card-title"> Data Penyelesaian</h3>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fa fa-times" style="color: red;"></i></span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="form-group row">
                            <div class="col-12">
                              <dl class="row">
                                <dt class="col-sm-3">NPK</dt>
                                <dt class="col-sm-3">Tujuan</dt>
                                <dt class="col-sm-3">Keperluan</dt>
                                <dt class="col-sm-3">Tanggal Berangkat</dt>
                              </dl>
                              <dl class="row">
                                <dd class="col-sm-3" id="npk"><?php echo $row->npk; ?></dd>
                                <dd class="col-sm-3" id="tujuan"><?php echo $row->tujuan; ?></dd>
                                <dd class="col-sm-3" id="keperluan"><?php echo $row->keperluan; ?></dd>
                                <dd class="col-sm-3" id="berangkat"><?php echo $row->berangkat; ?></dd>
                              </dl>
                              <dl class="row">
                                <dt class="col-sm-3">Tanggal Kembali</dt>
                                <dt class="col-sm-3">Kendaraan</dt>
                                <dt class="col-sm-3">Mobil</dt>
                                <?php if ($row->kendaraan == 'Mobil') { ?>
                                  <dt class="col-sm-3">Driver</dt>
                                <?php } ?>
                              </dl>
                              <dl class="row">
                                <dd class="col-sm-3" id="kembali"><?php echo $row->kembali; ?></dd>
                                <dd class="col-sm-3" id="kendaraan"><?php echo $row->kendaraan; ?></dd>
                                <dd class="col-sm-3" id="mobil"><?php echo $row->mobil; ?></dd>
                                <dd class="col-sm-3" id="mobil"><?php echo $row->driver; ?></dd>
                              </dl>
                            </div>
                          </div>
                        </div>
                        <hr>
                        <form method="post" enctype="multipart/form-data" action="<?php echo site_url('CTR_ATPenyelesaian/EditData'); ?>">
                          <div class="card-body">
                            <div class="form-group" style="display: none;">
                              <label>ID Permintaan</label>
                              <input type="text" class="form-control" value="<?php echo $row->id_permintaan; ?>" id="id_permintaan" name="id_permintaan" required>
                            </div>

                            <div class="form-group">
                              <label>Km Akhir<span style="color: red;">*</span></label>
                              <input type="text" class="form-control" value="<?php echo $row->km_akhir; ?>" name="editkm_akhir<?php echo $row->id_permintaan; ?>" required>
                            </div>

                            <br>
                            <hr>
                            <p>Biaya Operasional :</p>
                            <div class="col-12">
                              <div class="row" id="barisdetail<?= $row->id_permintaan ?>">

                                <div class="col-3">
                                  <div class="form-group">
                                    <label>Biaya<span style="color: red;">*</span></label>
                                    <select class="form-control" name="editnamabiaya[]" required>
                                      <option value="">-- Pilih Biaya --</option>
                                      <option value="GRAB">GRAB</option>
                                      <option value="Bensin">Bensin</option>
                                      <option value="Tol">Tol</option>
                                      <option value="Parkir">Parkir</option>
                                      <option value="Tambal Ban">Tambal Ban</option>
                                      <option value="Cuci Mobil">Cuci Mobil</option>
                                      <option value="Lain-lain">Lain-lain</option>
                                    </select>
                                  </div>
                                </div>

                                <div class="col-2">
                                  <div class="form-group">
                                    <label>Harga<span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" placeholder="Harga" name="editharga[]" required>
                                  </div>
                                </div>

                                <div class="col-3">
                                  <div class="form-group">
                                    <label>Metode Pembayaran<span style="color: red;">*</span></label>
                                    <select class="form-control" name="editmetode[]" required>
                                      <option value="">-- Pilih Pembayaran--</option>
                                      <option value="E-Money">E-Money</option>
                                      <option value="Cash">Cash</option>
                                      <option value="Perusahaan">Perusahaan</option>
                                    </select>
                                  </div>
                                </div>

                                <div class="col-3">
                                  <div class="form-group">
                                    <label>Upload Bukti</label>
                                    <input type="file" class="form-control" name="gambar[]">
                                  </div>
                                </div>

                                <div class="col-1">
                                  <div class="form-group">
                                    <label>Aksi</label>
                                    <br />
                                    <button type="button" class="add btn btn-primary" id="add_row" status="<?php echo $row->status; ?>" id_perm="<?php echo $row->id_permintaan; ?>" value="Add Row"><i class='fa fa-plus'></i></button>
                                  </div>
                                </div>

                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <div class="form-group" style="display: none;">
                              <label>Saldo Awal</label>
                              <input type="text" class="form-control" value="<?php echo $row->saldo_awal_emoney; ?>" name="saldo_awal_emoney<?php echo $row->id_permintaan; ?>">
                            </div>
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

      <!-- Modal Revisi Data-->
      <?php foreach ($permintaan as $row) {
        if ($row->status == 'Approved by Admin GA' || $row->status == 'Revisi') { ?>
          <div class="modal fade" id="revisi_atasan<?php echo $row->id_permintaan; ?>" tabindex="-1" aria-labelledby="revisi_atasan<?php echo $row->id_permintaan; ?>" aria-hidden="true">
            <div class="modal-dialog modal-xl">
              <div class="modal-content">
                <div class="card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Detail Data Penyelesaian</h3>
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
                          <dt class="col-sm-3">Mobil</dt>
                          <?php if ($row->kendaraan == 'Mobil') { ?>
                            <dt class="col-sm-3">Driver</dt>
                          <?php } ?>
                        </dl>
                        <dl class="row">
                          <dd class="col-sm-3"><?php echo $row->berangkat; ?></dd>
                          <dd class="col-sm-3"><?php echo $row->kembali; ?></dd>
                          <dd class="col-sm-3"><?php echo $row->mobil; ?></dd>
                          <?php if ($row->kendaraan == 'Mobil') { ?>
                            <dd class="col-sm-3"><?php echo $row->driver; ?></dd>
                          <?php } ?>
                        </dl>
                        <dl class="row">
                          <?php if ($row->driver == 'Ya') { ?>
                            <dt class="col-sm-3">Nama Driver</dt>
                          <?php } ?>
                          <?php if ($row->kendaraan == 'Mobil') { ?>
                            <dt class="col-sm-3">Km Awal</dt>
                            <dt class="col-sm-3">E-Money</dt>
                            <dt class="col-sm-3">Saldo Awal E-Money</dt>
                          <?php } ?>
                        </dl>
                        <dl class="row">
                          <?php if ($row->driver == 'Ya') { ?>
                            <dd class="col-sm-3"><?php echo $row->nama; ?></dd>
                          <?php } ?>
                          <?php if ($row->kendaraan == 'Mobil') { ?>
                            <dd class="col-sm-3"><?php echo $row->km_berangkat; ?></dd>
                            <dd class="col-sm-3"><?php echo $row->tampilan_emoney; ?></dd>
                            <dd class="col-sm-3">
                              <?php echo $this->function->Rupiah($row->saldo_awal_emoney); ?></dd>
                          <?php } ?>
                        </dl>
                        <dl class="row">
                          <?php if ($row->kendaraan == 'GRAB') { ?>
                            <dt class="col-sm-3">Kode Voucher</dt>
                          <?php } ?>
                          <dt class="col-sm-3">Approved by</dt>
                          <dt class="col-sm-3">Approved Date</dt>
                        </dl>
                        <dl class="row">
                          <?php if ($row->kendaraan == 'GRAB') { ?>
                            <dd class="col-sm-3"><?php echo $row->kodevoucher; ?></dd>
                          <?php } ?>
                          <dd class="col-sm-3"><?php echo $row->approvedby; ?></dd>
                          <dd class="col-sm-3"><?php echo $row->approveddate; ?></dd>
                        </dl>
                      </div>
                    </div>
                    <hr>
                    <form method="post" enctype="multipart/form-data" action="<?php echo site_url('CTR_ATPenyelesaian/RevisiData'); ?>">

                      <div class="form-group" style="display: none;">
                        <label>ID Permintaan</label>
                        <input type="text" class="form-control" value="<?php echo $row->id_permintaan; ?>" id="id_permintaan" name="id_permintaan" required>
                      </div>

                      <div class="form-group row">
                        <div class="col-12">
                          <dt>Alasan Revisi</dt>

                          <?php if ($row->keterangan != '') { ?>
                            <dd><?php echo $row->keterangan; ?></dd>
                          <?php } else { ?>
                            <dd>-</dd>
                          <?php } ?>

                        </div>
                      </div>

                      <div class="form-group">
                        <label>Km Akhir<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" value="<?php echo $row->km_akhir; ?>" name="km_akhir_revisi<?php echo $row->id_permintaan; ?>" required>
                      </div>

                      <br>
                      <hr>
                      <p>Biaya Operasional :</p>
                      <div id="barisdetail_revisi<?= $row->id_permintaan ?>">
                        <div class="form-group row">
                          <div class="col-2">
                            <label>Biaya<span style="color: red;">*</span></label>
                          </div>

                          <div class="col-2">
                            <label>Harga<span style="color: red;">*</span></label>
                          </div>

                          <div class="col-2">
                            <label>Metode Pembayaran<span style="color: red;">*</span></label>
                          </div>

                          <div class="col-1">
                            <label></label>
                          </div>

                          <div class="col-3">
                            <label>Upload Bukti</label>
                          </div>

                          <div class="col-1" style="display: none;">
                            <label>Nama Gambar</label>
                          </div>

                          <div class="col-1">
                            <label>Aksi</label>
                          </div>
                        </div>

                        <?php $a = 0;
                        foreach ($detailbiaya as $row_detail) {
                          if ($row_detail->id_permintaan == $row->id_permintaan) { ?>
                            <div class="form-group row" style="display: none;">
                              <label>ID Detail</label>
                              <input type="text" class="form-control" value="<?php echo $row_detail->id_detail; ?>" name="id_detail[]" value="0">
                            </div>

                            <div class="form-group row">
                              <div class="col-2">
                                <select class="form-control" name="namabiaya_revisi[]" required>
                                  <option value="">Pilih Biaya</option>
                                  <option value="GRAB" <?php echo ($row_detail->namabiaya == 'GRAB' ? 'selected' : ''); ?>>GRAB</option>
                                  <option value="Bensin" <?php echo ($row_detail->namabiaya == 'Bensin' ? 'selected' : ''); ?>>Bensin</option>
                                  <option value="Tol" <?php echo ($row_detail->namabiaya == 'Tol' ? 'selected' : ''); ?>>Tol</option>
                                  <option value="Parkir" <?php echo ($row_detail->namabiaya == 'Parkir' ? 'selected' : ''); ?>>Parkir</option>
                                  <option value="Tambal Ban" <?php echo ($row_detail->namabiaya == 'Tambal Ban' ? 'selected' : ''); ?>>Tambal Ban</option>
                                  <option value="Cuci Mobil" <?php echo ($row_detail->namabiaya == 'Cuci Mobil' ? 'selected' : ''); ?>>Cuci Mobil</option>
                                  <option value="Lain-lain" <?php echo ($row_detail->namabiaya == 'Lain-lain' ? 'selected' : ''); ?>>Lain-lain</option>
                                </select>
                              </div>

                              <div class="col-2">
                                <input type="text" class="form-control" placeholder="Harga" value="<?php echo $row_detail->harga; ?>" name="harga_revisi[]" required>
                              </div>

                              <div class="col-2">
                                <select class="form-control" name="metode_revisi[]" required>
                                  <option value="">-- Pilih Pembayaran--</option>
                                  <option value="E-Money" <?php echo ($row_detail->metode == 'E-Money' ? 'selected' : ''); ?>>E-Money</option>
                                  <option value="Cash" <?php echo ($row_detail->metode == 'Cash' ? 'selected' : ''); ?>>Cash</option>
                                  <option value="Perusahaan" <?php echo ($row_detail->metode == 'Perusahaan' ? 'selected' : ''); ?>>Perusahaan</option>
                                </select>
                              </div>

                              <div class="col-1">
                                <a data-toggle="modal" data-target="#revisi_gambar<?php echo $row_detail->id_detail; ?>" href="#revisi_gambar<?php echo $row_detail->id_detail; ?>">
                                  <img src="<?php echo base_url('./assets/img/' . $row_detail->gambar); ?>" width="90" height="90">
                                </a>
                              </div>

                              <div class="col-3">
                                <input type="file" class="form-control" name="gambar_revisi[]">
                              </div>

                              <div class="col-1">
                                <input type="checkbox" id="check<?php echo $row_detail->id_detail ?>" name="check_row[]" value="Delete">
                                <label for="<?php echo $row_detail->id_detail ?>"> Hapus</label><br>
                                <input type="checkbox" style="display: none;" id="hidden<?php echo $row_detail->id_detail ?>" name="check_row[]" value="No Delete" checked>
                                <label style="display: none;" for="hidden<?php echo $row_detail->id_detail ?>"> No Delete</label><br>
                              </div>

                              <div class="col-1" style="display: none;">
                                <input type="text" class="form-control" placeholder="nama_gambar_revisi" value="<?php echo $row_detail->gambar ?>" name="nama_gambar_revisi[]">
                              </div>

                              <?php if ($a == 0) { ?>
                                <div class="col-1">
                                  <div class="form-group">
                                    <button type="button" class="add btn btn-primary" id="add_row_revisi" status="<?php echo $row->status; ?>" id_perm="<?php echo $row->id_permintaan; ?>" value="Add Row"><i class='fa fa-plus'></i></button>
                                  </div>
                                </div>
                              <?php } else { ?>
                              <?php }
                              $a++; ?>
                            </div>
                        <?php }
                        } ?>
                      </div>

                      <script>
                        $(document).ready(function() {
                          //set initial state.
                          // $('#textbox1').val(this.checked);
                          <?php foreach ($detailbiaya as $row_detail) {
                            if ($row_detail->id_permintaan == $row->id_permintaan) { ?>

                              $('#check<?php echo $row_detail->id_detail ?>').change(function() {
                                if (this.checked) {
                                  // alert('a');
                                  // var returnVal = confirm("Are you sure?");
                                  $('#hidden<?php echo $row_detail->id_detail ?>').prop("checked", false);
                                } else {
                                  $('#hidden<?php echo $row_detail->id_detail ?>').prop("checked", true);
                                }
                                // $('#<?php echo $row_detail->id_detail ?>').val(this.checked);
                              });

                          <?php }
                          } ?>

                        });
                      </script>

                      <div class="modal-footer">
                        <div class="form-group" style="display: none;">
                          <label>Saldo Awal</label>
                          <input type="text" class="form-control" value="<?php echo $row->saldo_awal_emoney; ?>" name="saldo_awal_emoney_revisi<?php echo $row->id_permintaan; ?>">
                        </div>
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
<script type="text/javascript">
  $(document).ready(function() {
    var count = 1;
    $('body').on('click', '#add_row', function() {
      count++;
      var id_perm = $(this).attr('id_perm');
      var status = $(this).attr('status');
      var action = 'item';
      $.ajax({
        url: '<?php echo base_url() ?>index.php/CTR_ATPenyelesaian/TambahBaris',
        method: 'POST',
        data: {
          action: action,
          count: count
        },
        success: function(data) {
          $('#barisdetail' + id_perm).append(data);
          //$('#baris'+count+' #receiveitem_group').select2();
        }
      });
    });

    $('body').on('click', '#add_row_revisi', function() {
      count++;
      var id_perm = $(this).attr('id_perm');
      var status = $(this).attr('status');
      var action = 'item';
      $.ajax({
        url: '<?php echo base_url() ?>index.php/CTR_ATPenyelesaian/TambahBarisRevisi',
        method: 'POST',
        data: {
          action: action,
          count: count
        },
        success: function(data) {
          $('#barisdetail_revisi' + id_perm).append(data);
          //$('#baris'+count+' #receiveitem_group').select2();
        }
      });
    });

    $('body').on('click', '#remove_row', function() {
      var barisdetail = $(this).attr('barisdetail');
      $('#barisdetaill' + barisdetail + '').remove();
      //hitung();
    });

    $('body').on('click', '#remove_row_revisi', function() {
      var barisdetail = $(this).attr('barisdetail_revisi');
      $('#barisdetaill_revisi' + barisdetail + '').remove();
      //hitung();
    });

  });
</script>
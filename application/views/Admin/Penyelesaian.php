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
                    <th>Dept</th>
                    <th>Tujuan</th>
                    <th>Keperluan</th>
                    <th>Tanggal Berangkat</th>
                    <th>Tanggal Kembali</th>
                    <th>Mobil </th>
                    <th>Status</th>
                    <th width="120">Aksi</th>
                  </tr>
                </thead>

                <tbody>
                  <?php foreach ($permintaan as $row) {
                    if ($row->status == 'Dalam Perjalanan' || $row->status == 'Diselesaikan oleh user' || $row->status == 'Revisi') { ?>
                      <tr>
                        <td><?php echo $row->npk; ?></td>
                        <td><?php echo $row->createdby_name; ?></td>
                        <td><?php echo $row->dept; ?></td>
                        <td><?php echo $row->tujuan; ?></td>
                        <td><?php echo $row->keperluan; ?></td>
                        <td><?php echo $row->berangkat; ?></td>
                        <td><?php echo $row->kembali; ?></td>
                        <td><?php echo $row->mobil; ?></td>
                        <!-- <?php if ($row->keterangan == '') { ?>
                          <td>-</td>
                        <?php } else { ?>
                          <td><?php echo $row->keterangan; ?></td>
                        <?php } ?> -->
                        <td><?php echo $row->status; ?></td>
                        <?php if ($row->status == 'Dalam Perjalanan') { ?>
                          <td align="center"><a data-toggle="modal" data-target="#followup_permintaan<?php echo $row->id_permintaan; ?>" href="#followup_permintaan<?php echo $row->id_permintaan; ?>" class="btn btn-success" title="Penyelesaian Data">Penyelesaian</a></td>
                        <?php } ?>

                        <?php if ($row->status == 'Diselesaikan oleh user') { ?>
                          <td align="center">
                            <a data-toggle="modal" data-target="#rilis_permintaan<?php echo $row->id_permintaan; ?>" href="#rilis_permintaan<?php echo $row->id_permintaan; ?>" class="btn btn-info" title="Rilis Data">Rilis</a>
                            &nbsp;
                            <a data-toggle="modal" data-target="#revisi_permintaan<?php echo $row->id_permintaan; ?>" href="#revisi_permintaan<?php echo $row->id_permintaan; ?>" class="btn btn-danger" title="Revisi Data">Revisi</a>
                          </td>
                        <?php } ?>

                        <?php if ($row->status == 'Revisi') { ?>
                          <td align="center">-</td>
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

          <!-- Modal Edit Data-->
          <?php foreach ($permintaan as $row) {
            if ($row->status == 'Dalam Perjalanan') { ?>
              <div class="modal fade" id="followup_permintaan<?php echo $row->id_permintaan; ?>" tabindex="-1" aria-labelledby="followup_permintaan<?php echo $row->id_permintaan; ?>" aria-hidden="true">
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
                        <form method="post" enctype="multipart/form-data" action="<?php echo site_url('CTR_APenyelesaian/EditData'); ?>">

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
                          <p>Biaya Pengeluaran :</p>
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

          <!-- Modal Rilis Data-->
          <?php foreach ($permintaan as $row) {
            if ($row->status == 'Diselesaikan oleh user') { ?>
              <div class="modal fade" id="rilis_permintaan<?php echo $row->id_permintaan; ?>" tabindex="-1" aria-labelledby="rilis_permintaan<?php echo $row->id_permintaan; ?>" aria-hidden="true">
                <div class="modal-dialog modal-lg">
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
                        <form method="post" action="<?php echo site_url('CTR_APenyelesaian/rilisMobil'); ?>" enctype="multipart/form-data">
                          <div class="form-group row">
                            <div class="col-12">
                              <dl class="row">
                                <dt class="col-sm-3">NPK</dt>
                                <dt class="col-sm-3">Nama</dt>
                                <dt class="col-sm-3">Dept</dt>
                                <dt class="col-sm-3">Tujuan</dt>
                              </dl>
                              <dl class="row">
                                <dd class="col-sm-3"><?php echo $row->npk; ?></dd>
                                <dd class="col-sm-3"><?php echo $row->createdby_name; ?></dd>
                                <dd class="col-sm-3"><?php echo $row->dept; ?></dd>
                                <dd class="col-sm-3"><?php echo $row->tujuan; ?></dd>
                              </dl>
                              <dl class="row">
                                <dt class="col-sm-3">Keperluan</dt>
                                <dt class="col-sm-3">Tanggal Berangkat</dt>
                                <dt class="col-sm-3">Tanggal Kembali</dt>
                                <dt class="col-sm-3">Kendaraan</dt>
                              </dl>
                              <dl class="row">
                                <dd class="col-sm-3"><?php echo $row->keperluan; ?></dd>
                                <dd class="col-sm-3"><?php echo $row->berangkat; ?></dd>
                                <dd class="col-sm-3"><?php echo $row->kembali; ?></dd>
                                <dd class="col-sm-3"><?php echo $row->kendaraan; ?></dd>
                              </dl>
                              <dl class="row">
                                <?php if ($row->kendaraan == 'Mobil') { ?>
                                  <dt class="col-sm-3">Driver</dt>
                                <?php } ?>
                                <dt class="col-sm-3">Mobil</dt>
                                <?php if ($row->driver == 'Ya') { ?>
                                  <dt class="col-sm-3">Nama Driver</dt>
                                <?php } ?>
                                <?php if ($row->kendaraan == 'Mobil') { ?>
                                  <dt class="col-sm-3">Km Awal</dt>
                                <?php } ?>
                              </dl>
                              <dl class="row">
                                <?php if ($row->kendaraan == 'Mobil') { ?>
                                  <dd class="col-sm-3"><?php echo $row->driver; ?></dd>
                                <?php } ?>
                                <dd class="col-sm-3"><?php echo $row->mobil; ?></dd>
                                <?php if ($row->driver == 'Ya') { ?>
                                  <dd class="col-sm-3"><?php echo $row->nama; ?></dd>
                                <?php } ?>
                                <?php if ($row->kendaraan == 'Mobil') { ?>
                                  <dd class="col-sm-3"><?php echo $row->km_berangkat; ?></dd>
                                <?php } ?>
                              </dl>
                              <dl class="row">
                                <dt class="col-sm-3">Km Akhir</dt>
                                <?php if ($row->kendaraan == 'Mobil') { ?>
                                  <dt class="col-sm-3">E-Money</dt>
                                  <dt class="col-sm-3">Saldo Awal E-Money</dt>
                                  <dt class="col-sm-3">Saldo Akhir E-Money</dt>
                                <?php } ?>
                              </dl>
                              <dl class="row">
                                <dd class="col-sm-3"><?php echo $row->km_akhir; ?></dd>
                                <?php if ($row->kendaraan == 'Mobil') { ?>
                                  <dd class="col-sm-3"><?php echo $row->tampilan_emoney; ?></dd>
                                  <dd class="col-sm-3"><?php echo $this->function->Rupiah($row->saldo_awal_emoney); ?></dd>
                                  <dd class="col-sm-3"><?php echo $this->function->Rupiah($row->saldo_akhir_emoney); ?></dd>
                                <?php } ?>
                              </dl>
                              <hr>
                              <p>Biaya Pengeluaran :</p>
                              <dl class="row">
                                <dt class="col-sm-3">Biaya</dt>
                                <dt class="col-sm-3">Harga</dt>
                                <dt class="col-sm-3">Metode Pembayaran</dt>
                                <dt class="col-sm-3">Upload Bukti</dt>
                              </dl>
                              <?php foreach ($detailbiaya as $row_detail) {
                                if ($row_detail->id_permintaan == $row->id_permintaan) { ?>
                                  <dl class="row">
                                    <dd class="col-sm-3"><?php echo $row_detail->namabiaya; ?></dd>
                                    <dd class="col-sm-3"><?php echo $this->function->Rupiah($row_detail->harga); ?></dd>
                                    <dd class="col-sm-3"><?php echo $row_detail->metode; ?></dd>
                                    <dd class="col-sm-3" type="hidden">
                                      <!-- <img width="100px" height="150px" src="<?php echo base_url(); ?>assets/dist/img/forApps/no-picture.jpg"><a data-toggle="modal" data-target="#lihat_gambar<?php echo $row_detail->id_detail; ?>"> -->
                                      <img src="<?php echo base_url('./assets/img/' . $row_detail->gambar); ?>" width="100"></a>
                                    </dd>
                                  </dl>
                              <?php }
                              } ?>
                            </div>
                          </div>

                          <div class="form-group row" style="display: none;">
                            <label>ID Permintaan</label>
                            <input type="text" class="form-control" value="<?php echo $row->id_permintaan; ?>" name="id_permintaan_rilis">
                          </div>

                          <div class="form-group row" style="display: none;">
                            <label>ID Mobil</label>
                            <input type="text" class="form-control" value="<?php echo $row->id_mobil; ?>" name="id_mobil_rilis<?php echo $row->id_permintaan; ?>">
                          </div>

                          <div class="form-group row" style="display: none;">
                            <label>ID Driver</label>
                            <input type="text" class="form-control" value="<?php echo $row->namadriver; ?>" name="id_driver_rilis<?php echo $row->id_permintaan; ?>">
                          </div>

                          <div class="form-group row" style="display: none;">
                            <label>ID Emoney</label>
                            <input type="text" class="form-control" value="<?php echo $row->emoney; ?>" name="id_emoney_rilis<?php echo $row->id_permintaan; ?>">
                          </div>

                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Tidak</button>
                            <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Iya</button>
                          </div>
                        </form>
                      </div>

                    </div>
                  </div>
                </div>
              </div>


          <?php }
          } ?>

          <!-- Modal Revisi Data-->
          <?php foreach ($permintaan as $row) {
            if ($row->status == 'Diselesaikan oleh user') { ?>
              <div class="modal fade" id="revisi_permintaan<?php echo $row->id_permintaan; ?>" tabindex="-1" aria-labelledby="revisi_permintaan<?php echo $row->id_permintaan; ?>" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="card-primary">
                      <div class="card-header">
                        <h3 class="card-title">Cek Data Penyelesaian</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true"><i class="fa fa-times" style="color: red;"></i></span>
                        </button>
                      </div>
                      <!-- form start -->
                      <div class="modal-body">
                        <form method="post" action="<?php echo site_url('CTR_APenyelesaian/revisi'); ?>" enctype="multipart/form-data">
                          <div class="form-group row">
                            <div class="col-12">
                              <p>Detail Biaya Pengeluaran :</p>
                              <dl class="row">
                                <dt class="col-sm-3">Biaya</dt>
                                <dt class="col-sm-3">Harga</dt>
                                <dt class="col-sm-3">Metode Pembayaran</dt>
                                <dt class="col-sm-3">Upload Bukti</dt>
                              </dl>
                              <?php foreach ($detailbiaya as $row_detail) {
                                if ($row_detail->id_permintaan == $row->id_permintaan) { ?>
                                  <dl class="row">
                                    <dd class="col-sm-3"><?php echo $row_detail->namabiaya; ?></dd>
                                    <dd class="col-sm-3"><?php echo $this->function->Rupiah($row_detail->harga); ?></dd>
                                    <dd class="col-sm-3"><?php echo $row_detail->metode; ?></dd>
                                    <dd class="col-sm-3" type="hidden">
                                      <!-- <img width="100px" height="150px" src="<?php echo base_url(); ?>assets/dist/img/forApps/no-picture.jpg"><a data-toggle="modal" data-target="#lihat_gambar<?php echo $row_detail->id_detail; ?>"> -->
                                      <img src="<?php echo base_url('./assets/img/' . $row_detail->gambar); ?>" width="100"></a>
                                    </dd>
                                  </dl>
                              <?php }
                              } ?>
                            </div>
                          </div>
                          <hr>
                          <div class="form-group row">
                            <div class="col-12">
                              <label>Alasan Revisi<span style="color: red;"> (Isi jika ada Revisi)</span></label>
                              <textarea rows="4" class="form-control" value="<?php echo $row->keterangan; ?>" name="keterangan<?php echo $row->id_permintaan; ?>"></textarea>
                            </div>
                          </div>

                          <div class="form-group row" style="display: none;">
                            <label>ID Permintaan</label>
                            <input type="text" class="form-control" value="<?php echo $row->id_permintaan; ?>" name="id_permintaan_rilis">
                          </div>

                          <div class="form-group row" style="display: none;">
                            <label>ID Mobil</label>
                            <input type="text" class="form-control" value="<?php echo $row->id_mobil; ?>" name="id_mobil_rilis<?php echo $row->id_permintaan; ?>">
                          </div>

                          <div class="form-group row" style="display: none;">
                            <label>ID Driver</label>
                            <input type="text" class="form-control" value="<?php echo $row->namadriver; ?>" name="id_driver_rilis<?php echo $row->id_permintaan; ?>">
                          </div>

                          <div class="form-group row" style="display: none;">
                            <label>ID Emoney</label>
                            <input type="text" class="form-control" value="<?php echo $row->emoney; ?>" name="id_emoney_rilis<?php echo $row->id_permintaan; ?>">
                          </div>

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

          <!-- Modal Zoom Gambar -->
          <!-- <?php foreach ($detailbiaya as $row_detail) { ?>
            <div class="modal fade" id="lihat_gambar<?php echo $row_detail->id_detail; ?>">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-body text-center">
                    <img src="<?php echo base_url('./assets/img/' . $row_detail->gambar); ?>" width="400px" height="auto">
                  </div>
                  <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
          <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
          <!-- </div>
                </div> -->
          <!-- /.modal-content -->
          <!-- </div> -->
          <!-- /.modal-dialog -->
          <!-- </div>
          <?php } ?> -->
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
        url: '<?php echo base_url() ?>index.php/CTR_APenyelesaian/TambahBaris',
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
    $('body').on('click', '#remove_row', function() {
      var barisdetail = $(this).attr('barisdetail');
      $('#barisdetaill' + barisdetail + '').remove();
      //hitung();
    });
  });
</script>
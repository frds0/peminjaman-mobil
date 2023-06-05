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
              <h3 class="h4">Kelola Data Laporan</h3>
            </div>

            <div class="card-body table-responsive">
              <form method="post" action="<?php echo site_url('CTR_ALaporan/tampilkan'); ?>">
                <div class="row">

                  <div class="col-3">
                    <div class="form-group">
                      <label>Tanggal Awal</label>
                      <input type="date" class="form-control" name="date1">
                    </div>
                  </div>

                  <div class="col-3">
                    <div class="form-group">
                      <label>Tanggal Akhir</label>
                      <input type="date" class="form-control" name="date2">
                    </div>
                  </div>

                  <div class="col-6">
                    <div class="form-group">
                      <label for=""><span style="color:white">A</span></label><br />
                      <button type="submit" class="btn btn-primary btn-sm>"><i class="fas fa-file"></i> Tampilkan</button>
              </form>
              <form method="post" class="d-inline-flex" action="<?php echo site_url('CTR_ALaporan/excel'); ?>">
                <input type="date" value=<?= $date1 ?> style="display:none;" class="d-none form-control" name="date1">
                <input type="date" value=<?= $date2 ?> style="display:none;" class="d-none form-control" name="date2">
                <button type="submit" class="btn btn-success btn-sm>"><i class="fa fa-download"></i> Eksport Excel</button>
              </form>
              <!-- <a class="btn btn-success" href="<?php echo site_url('CTR_ALaporan/excel'); ?>"><i class="fa fa-download"></i> Eksport Excel </a> -->
            </div>
          </div>

          <!-- Button trigger modal -->
          <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th style="width:5px">No</th>
                  <th>No.Polisi</th>
                  <th>Kode Voucher</th>
                  <th>Tanggal Berangkat</th>
                  <th>Bulan</th>
                  <th>Nama User</th>
                  <th>Departemen</th>
                  <th>Nama Driver</th>
                  <th>Tujuan</th>
                  <th>Keperluan</th>
                  <th>Km Awal</th>
                  <th>Km Akhir</th>
                  <th>Biaya GRAB</th>
                  <th>Biaya Bensin</th>
                  <th>Biaya Tol</th>
                  <th>Biaya Parkir</th>
                  <th>Biaya Tambal Ban</th>
                  <th>Biaya Cuci Mobil</th>
                  <th>Biaya Lain-lain</th>
                  <th>Total Keseluruhan</th>
                  <th width="40">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach ($laporan as $row) {
                  if ($row->status == 'Done') { ?>
                    <tr>
                      <td><?= $i; ?>.</td>
                      <?php if ($row->id_mobil == '1') { ?>
                        <td><?php echo $row->mobil; ?></td>
                      <?php } else { ?>
                        <td><?php echo $row->nopolisi; ?></td>
                      <?php } ?>
                      <?php if ($row->kodevoucher == '') { ?>
                        <td>-</td>
                      <?php } else { ?>
                        <td><?php echo $row->kodevoucher; ?></td>
                      <?php } ?>
                      <td><?php echo $row->berangkat; ?></td>
                      <td><?php echo $row->bulan_berangkat; ?></td>
                      <td><?php echo $row->createdby_name; ?></td>
                      <td><?php echo $row->dept; ?></td>
                      <?php if ($row->driver == 'Tidak' || $row->driver == '') { ?>
                        <td>-</td>
                      <?php } else { ?>
                        <td><?php echo $row->nama; ?></td>
                      <?php } ?>
                      <td><?php echo $row->tujuan; ?></td>
                      <td><?php echo $row->keperluan; ?></td>
                      <?php if ($row->id_mobil == '1') { ?>
                        <td>-</td>
                      <?php } else { ?>
                        <td><?php echo $row->km_berangkat; ?></td>
                      <?php } ?>
                      <td><?php echo $row->km_akhir; ?></td>
                      <td>
                        <?php echo $this->function->Rupiah($row->total_biaya_grab); ?>
                      </td>
                      <td>
                        <?php echo $this->function->Rupiah($row->total_biaya_bensin); ?>
                      </td>
                      <td>
                        <?php echo $this->function->Rupiah($row->total_biaya_tol); ?>
                      </td>
                      <td>
                        <?php echo $this->function->Rupiah($row->total_biaya_parkir); ?>
                      </td>
                      <td>
                        <?php echo $this->function->Rupiah($row->total_biaya_tambalban); ?>
                      </td>
                      <td>
                        <?php echo $this->function->Rupiah($row->total_biaya_cucimobil); ?>
                      </td>
                      <td>
                        <?php echo $this->function->Rupiah($row->total_biaya_lainlain); ?>
                      </td>
                      <td>
                        <?php echo $this->function->Rupiah($row->total_keseluruhan); ?>
                      </td>
                      <?php if ($row->status == 'Done') { ?>
                        <td align="center">
                          <a data-toggle="modal" data-target="#detail_laporan<?php echo $row->id_permintaan; ?>" href="#detail_laporan<?php echo $row->id_permintaan; ?>" class="btn btn-info" title="Detail Laporan"><i class="nav-icon fas fa-eye"></i></a>
                        </td>
                      <?php } ?>
                    </tr>
                    <?php $i++; ?>
                <?php }
                } ?>
              </tbody>
            </table>
            <br>
          </div>
        </div>
      </div>
    </div>
</div>
</div>
</section>
</div>
<!-- /.content -->

<!-- Modal Detail Data-->
<?php foreach ($laporan as $row) {
  if ($row->status == 'Done') { ?>
    <div class="modal fade" id="detail_laporan<?php echo $row->id_permintaan; ?>" tabindex="-1" aria-labelledby="detail_laporan<?php echo $row->id_permintaan; ?>" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="card-primary">
            <div class="card-header">
              <h3 class="card-title">Detail Laporan</h3>
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
                  <?php foreach ($detailbiaya as $rowdetail) {
                    if ($rowdetail->id_permintaan == $row->id_permintaan) {
                  ?>
                      <dl class="row">
                        <dd class="col-sm-3"><?php echo $rowdetail->namabiaya; ?></dd>
                        <dd class="col-sm-3"><?php echo $this->function->Rupiah($rowdetail->harga); ?></dd>
                        <dd class="col-sm-3"><?php echo $rowdetail->metode; ?></dd>
                        <dd class="col-sm-3" type="hidden">
                          <img src="<?php echo base_url('./assets/img/' . $rowdetail->gambar); ?>" width="100">
                          <?php echo $rowdetail->gambar; ?>
                        </dd>
                      </dl>
                  <?php
                    }
                  }
                  ?>
                  <hr>
                  <dl class="row">
                    <dt class="col-sm-3">Total Biaya E-Money</dt>
                    <dt class="col-sm-3">Total Biaya Cash</dt>
                    <dt class="col-sm-3">Total Keseluruhan</dt>
                  </dl>
                  <dl class="row">
                    <dd class="col-sm-3">
                      <?php echo $this->function->Rupiah($row->total_biaya_emoney); ?>
                    </dd>
                    <dd class="col-sm-3">
                      <?php echo $this->function->Rupiah($row->total_biaya_cash); ?>
                    </dd>
                    <dd class="col-sm-3">
                      <?php echo $this->function->Rupiah($row->total_keseluruhan); ?>
                    </dd>
                  </dl>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php }
} ?>
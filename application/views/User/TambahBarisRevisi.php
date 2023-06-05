<div id="barisdetaill_revisi<?= $baris ?>">
  <div class="form-group row">

    <div class="col-1" style="display: none;">
      <div class="form-group">
        <label>ID Detail</label>
        <input type="text" class="form-control" name="id_detail[]">
      </div>
    </div>

    <div class="col-2">
      <select class="form-control" name="namabiaya_revisi[]" required>
        <option value="">Pilih Biaya</option>
        <option value="GRAB">GRAB</option>
        <option value="Bensin">Bensin</option>
        <option value="Tol">Tol</option>
        <option value="Parkir">Parkir</option>
        <option value="Tambal Ban">Tambal Ban</option>
        <option value="Cuci Mobil">Cuci Mobil</option>
        <option value="Lain-lain">Lain-lain</option>
      </select>
    </div>

    <div class="col-2">
      <input type="text" class="form-control" placeholder="Harga" name="harga_revisi[]" required>
    </div>

    <div class="col-2">
      <select class="form-control" name="metode_revisi[]" required>
        <option value="">Pilih Pembayaran</option>
        <option value="E-Money">E-Money</option>
        <option value="Cash">Cash</option>
        <option value="Perusahaan">Perusahaan</option>
      </select>
    </div>

    <div class="col-3">
      <input type="file" class="form-control" name="gambar_revisi[]">
    </div>

    <div class="col-1">
    </div>

    <div class="col-1" style="display: none;">
      <input type="text" class="form-control" placeholder="nama_gambar_revisi" name="nama_gambar_revisi[]">
    </div>

    <div class="col-1">
    </div>

    <div class="col-1">
      <button type="button" class="add btn btn-danger" id="remove_row_revisi" value="Add Row" barisdetail_revisi="<?= $baris ?>"><i class='fa fa-minus'></i></button>
    </div>
  </div>
</div>
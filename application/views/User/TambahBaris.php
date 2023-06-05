            <div class="container-fluid">
              <div class="row" id="barisdetaill<?= $baris ?>">
                <div class="col-3">
                  <div class="form-group">
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
                    <input type="text" class="form-control" placeholder="Harga" name="editharga[]" required>
                  </div>
                </div>

                <div class="col-3">
                  <div class="form-group">
                    <select class="form-control" name="editmetode[]" required>
                      <option value="">-- Pilih Pembayaran --</option>
                      <option value="E-Money">E-Money</option>
                      <option value="Cash">Cash</option>
                      <option value="Perusahaan">Perusahaan</option>
                    </select>
                  </div>
                </div>

                <div class="col-3">
                  <div class="form-group">
                    <input type="file" class="form-control" name="gambar[]">
                  </div>
                </div>

                <div class="col-1">
                  <div class="form-group">
                    <button type="button" class="add btn btn-danger" id="remove_row" value="Add Row" barisdetail="<?= $baris ?>"><i class='fa fa-minus'></i></button>
                  </div>
                </div>
              </div>
            </div>
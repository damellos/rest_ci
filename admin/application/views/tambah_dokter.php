          <form action="<?= base_url('dokter/tambah_aksi')?>" method="post">
            <div class="card-body">
              <div class="form-group">
                <label>Id Dokter</label>
                <input type="text" name="dokter_id" class="form-control">
              </div>
              <div class="form-group">
                <label>Nama Dokter</label>
                <input type="text" name="nama" class="form-control">
              </div>
              <div class="form-group">
                <label>Nomor Handphone</label>
                <input type="tel" name="no_hp" class="form-control">
                <?= form_error('no_hp', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control">
              </div>
        </div>
        <div class="card-footer">
         <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i>  Simpan</button>
        </div>
          </form>
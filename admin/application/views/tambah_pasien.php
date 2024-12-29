
    <form action="<?= base_url('pasien/tambah_aksi'); ?>" method="post">
        <div class="form-group">
            <label for="nama">Nama Pasien</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?= set_value('nama'); ?>">
            <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat"><?= set_value('alamat'); ?></textarea>
            <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label for="tgl_lahir">Tanggal Lahir</label>
            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= set_value('tgl_lahir'); ?>">
            <?= form_error('tgl_lahir', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                <option value="">-- Pilih Jenis Kelamin --</option>
                <option value="L" <?= set_select('jenis_kelamin', 'L'); ?>>Laki-laki</option>
                <option value="P" <?= set_select('jenis_kelamin', 'P'); ?>>Perempuan</option>
            </select>
            <?= form_error('jenis_kelamin', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label for="no_hp">No HP</label>
            <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= set_value('no_hp'); ?>">
            <?= form_error('no_hp', '<small class="text-danger">', '</small>'); ?>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="<?= base_url('pasien'); ?>" class="btn btn-secondary">Batal</a>
    </form>


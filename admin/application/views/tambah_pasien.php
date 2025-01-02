<form action="<?= base_url('pasien/tambah_aksi') ?>" method="post">
    <div class="form-group">
        <label>ID Pasien</label>
        <input type="text" name="pasien_id" class="form-control" >
        </div>
    <div class="form-group">
        <label>Nama Pasien</label>
        <input type="text" name="nama" class="form-control" >
    </div>
    <div class="form-group">
        <label>Alamat</label>
        <input type="text" name="alamat" class="form-control" >
    </div>
    <div class="form-group">
        <label>Tanggal Lahir</label>
        <input type="date" name="tgl_lahir" class="form-control" >
    </div>
    <div class="form-group">
    <label>Jenis Kelamin</label>
<div class="form-check">
    <input class="form-check-input" type="radio" name="jenis_kelamin" value="L">
    <label class="form-check-label">Laki-laki</label>
</div>
<div class="form-check">
    <input class="form-check-input" type="radio" name="jenis_kelamin" value="P">
    <label class="form-check-label">Perempuan</label>
</div>
</div>
    <div class="form-group">
        <label>Nomor Handphone</label>
        <input type="tel" name="no_hp" class="form-control" >
    </div>
    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
</form>
<form action="<?= base_url('obat/tambah_aksi') ?>" method="post">
    <div class="form-group">
        <label>ID Obat</label>
        <input type="text" name="obat_id" class="form-control">
    </div>
    <div class="form-group">
        <label>Nama Obat</label>
        <input type="text" name="nama_obat" class="form-control" >
    </div>
    <div class="form-group">
    <label>Harga</label>
    <input type="number" name="harga" class="form-control" >
</div>
    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
</form>
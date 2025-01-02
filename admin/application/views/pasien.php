<?php if ($this->session->flashdata('pesan')) : ?>
    <?= $this->session->flashdata('pesan'); ?>
<?php endif; ?>

<div class="card">
  <div class="card-header">
    <a href="<?= base_url('pasien/tambah') ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Data</a>
  </div>
  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr class="text-center">
          <th>ID</th>
          <th>Nama Pasien </th>
          <th>Alamat </th>
          <th>Tanggal Lahir</th>
          <th>Jenis Kelamin </th>
          <th>No Handphone </th>
          <th>Aksi</th>
        </tr>
      </thead>
      <?php $no = 1; 
      foreach($pasien as $row) : ?> 
        <tbody>
          <tr>
            <td class="text-center"><?php echo $no++; ?></td>
            <td><?php echo $row->nama; ?></td>
            <td class="text-center"><?php echo $row->alamat; ?></td>
            <td class="text-center"><?php echo $row->tgl_lahir; ?></td>
            <td class="text-center"><?php echo $row->jenis_kelamin; ?></td>
            <td class="text-center"><?php echo $row->no_hp; ?></td>
            <td class="text-center">
              <button data-toggle="modal" data-target="#edit<?= $row->pasien_id?>" class="btn btn-warning btn-sm" data-ci-toggle="tooltip" title="Edit"><i class="fas fa-edit"></i></button> 
              <a href="<?= base_url('pasien/delete/' . $row->pasien_id) ?>" class="btn btn-danger btn-sm" data-ci-toggle="tooltip" title="Delete" onclick="return confirm('Yakin ingin menghapus data?')"><i class="fas fa-trash"></i></a>
            </td>
          </tr>
        </tbody>
      <?php endforeach ?>
    </table>
  </div>
</div>



<?php foreach($pasien as $row) { ?>
  <div class="modal fade" id="edit<?= $row->pasien_id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Pasien</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="<?= base_url('pasien/edit') ?>" method="post">
    <input type="hidden" name="pasien_id" value="<?= $row->pasien_id ?>">
    <div class="form-group">
        <label>Nama Pasien</label>
        <input type="text" name="nama" class="form-control" value="<?= $row->nama ?>">
    </div>
    <div class="form-group">
        <label>Alamat</label>
        <input type="text" name="alamat" class="form-control" value="<?= $row->alamat ?>">
    </div>
    <div class="form-group">
        <label>Tanggal Lahir</label>
        <input type="text" name="tgl_lahir" class="form-control" value="<?= $row->tgl_lahir ?>">
    </div>
    <div class="form-group">
    <label>Jenis Kelamin</label>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="jenis_kelamin" value="L" <?= $row->jenis_kelamin == 'L' ? 'checked' : '' ?>>
        <label class="form-check-label">L</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="jenis_kelamin" value="P" <?= $row->jenis_kelamin == 'P' ? 'checked' : '' ?>>
        <label class="form-check-label">P</label>
    </div>
</div>
    <div class="form-group">
        <label>Nomor Handphone</label>
        <input type="tel" name="no_hp" class="form-control" value="<?= $row->no_hp ?>">
    </div>
    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
</form>
        </div>
      </div>
    </div>
  </div>
<?php } ?>
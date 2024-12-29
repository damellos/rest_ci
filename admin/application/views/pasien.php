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
            <td><?php echo $row->Nama; ?></td>
            <td class="text-center"><?php echo $row->Alamat; ?></td>
            <td class="text-center"><?php echo $row->Tgl_Lahir; ?></td>
            <td class="text-center"><?php echo $row->Jenis_Kelamin; ?></td>
            <td class="text-center"><?php echo $row->No_Hp; ?></td>
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
    <input type="hidden" name="dokter_id" value="<?= $row->dokter_id ?>">
    <div class="form-group">
        <label>Nama Dokter</label>
        <input type="text" name="nama" class="form-control" value="<?= $row->Nama ?>">
    </div>
    <div class="form-group">
        <label>Alamat</label>
        <input type="text" name="alamat" class="form-control" value="<?= $row->Alamat ?>">
    </div>
    <div class="form-group">
        <label>Tanggal Lahir</label>
        <input type="text" name="tgl_lahir" class="form-control" value="<?= $row->Tgl_Lahir ?>">
    </div>
    <div class="form-group">
        <label>Jenis Kelamin</label>
        <input type="text" name="jenis_kelamin" class="form-control" value="<?= $row->Jenis_Kelamin ?>">
    </div>
    <div class="form-group">
        <label>Nomor Handphone</label>
        <input type="tel" name="no_hp" class="form-control" value="<?= $row->No_Hp ?>">
    </div>
    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
</form>
        </div>
      </div>
    </div>
  </div>
<?php } ?>
<?php if ($this->session->flashdata('pesan')) : ?>
    <?= $this->session->flashdata('pesan'); ?>
<?php endif; ?>

<div class="card">
  <div class="card-header">
    <a href="<?= base_url('dokter/tambah') ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Data</a>
  </div>
  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr class="text-center">
          <th>ID</th>
          <th>Nama Dokter </th>
          <th>Nomor Handphone</th>
          <th>Email</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <?php $no = 1; 
      foreach($dokter as $row) : ?> 
        <tbody>
          <tr>
            <td class="text-center"><?php echo $no++; ?></td>
            <td><?php echo $row->Nama; ?></td>
            <td class="text-center"><?php echo $row->No_Hp; ?></td>
            <td class="text-center"><?php echo $row->Email; ?></td>
            <td class="text-center">
              <button data-toggle="modal" data-target="#edit<?= $row->dokter_id?>" class="btn btn-warning btn-sm" data-ci-toggle="tooltip" title="Edit"><i class="fas fa-edit"></i></button> 
              <a href="<?= base_url('dokter/delete/' . $row->dokter_id) ?>" class="btn btn-danger btn-sm" data-ci-toggle="tooltip" title="Delete" onclick="return confirm('Yakin ingin menghapus data?')"><i class="fas fa-trash"></i></a>
            </td>
          </tr>
        </tbody>
      <?php endforeach ?>
    </table>
  </div>
</div>



<?php foreach($dokter as $row) { ?>
  <div class="modal fade" id="edit<?= $row->dokter_id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Dokter</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="<?= base_url('dokter/edit') ?>" method="post">
    <input type="hidden" name="dokter_id" value="<?= $row->dokter_id ?>">
    <div class="form-group">
        <label>Nama Dokter</label>
        <input type="text" name="nama" class="form-control" value="<?= $row->Nama ?>">
    </div>
    <div class="form-group">
        <label>Nomor Handphone</label>
        <input type="tel" name="no_hp" class="form-control" value="<?= $row->No_Hp ?>">
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="<?= $row->Email ?>">
    </div>
    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
</form>
        </div>
      </div>
    </div>
  </div>
<?php } ?>
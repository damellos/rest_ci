<?php if ($this->session->flashdata('pesan')) : ?>
    <?= $this->session->flashdata('pesan'); ?>
<?php endif; ?>

<div class="card">
  <div class="card-header">
    <a href="<?= base_url('obat/tambah') ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Data</a>
  </div>
  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr class="text-center">
          <th>ID</th>
          <th>Nama Obat </th>
          <th>Harga </th>
          <th>Aksi</th>
        </tr>
      </thead>
      <?php $no = 1; 
      foreach($obat as $row) : ?> 
        <tbody>
          <tr>
            <td class="text-center"><?php echo $no++; ?></td>
            <td><?php echo $row->nama_obat; ?></td>
            <td class="text-center">Rp. <?= number_format($row->harga, 0, ',', '.'); ?></td>           
            <td class="text-center">
              <button data-toggle="modal" data-target="#edit<?= $row->obat_id?>" class="btn btn-warning btn-sm" data-ci-toggle="tooltip" title="Edit"><i class="fas fa-edit"></i></button> 
              <a href="<?= base_url('obat/delete/' . $row->obat_id) ?>" class="btn btn-danger btn-sm" data-ci-toggle="tooltip" title="Delete" onclick="return confirm('Yakin ingin menghapus data?')"><i class="fas fa-trash"></i></a>
            </td>
          </tr>
        </tbody>
      <?php endforeach ?>
    </table>
  </div>
</div>



<?php foreach($obat as $row) { ?>
  <div class="modal fade" id="edit<?= $row->obat_id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit obat</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="<?= base_url('obat/edit') ?>" method="post">
    <input type="hidden" name="obat_id" value="<?= $row->obat_id ?>">
    <div class="form-group">
        <label>Nama Obat</label>
        <input type="text" name="nama_obat" class="form-control" value="<?= $row->nama_obat ?>">
    </div>
    <div class="form-group">
        <label>Harga</label>
        <input type="harga" name="harga" class="form-control" value="<?= $row->harga ?>">
    </div>
    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
</form>
        </div>
      </div>
    </div>
  </div>
<?php } ?>
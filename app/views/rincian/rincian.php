<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-file-text"></i> <?= $data['judul'] ?></h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalBox">
              Tambah Data
            </button>
        </ul>
      </div>
      
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="mb-1">
                <?= FLasher::flash(); ?>
              </div>
              <table class="table table-hover table-bordered" id="tabel">
                  <thead>
                    <tr>     
                      <th>ID Rincian</th>
                      <th>ID Pendaftaran</th>
                      <th>ID Obat</th>
                      <th>Harga Obat</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($data['rincian'] as $rincian): ?>
                    <tr>
                      <td><?php echo $rincian['id_rincian']; ?></td>
                      <td><?php echo $rincian['id_pendaftaran']; ?></td>
                      <td><?php echo $rincian['id_obat']; ?></td>
                      <td><?php echo $rincian['qty_obat']; ?></td>
                      <td>
                        <a href="<?= BASEURL .'rincian/ubah/' . $rincian['id_rincian'];  ?>">
                          <i class="fa fa-pencil-square-o fa-fw"></i> Edit
                        </a> 
                        |
                        <a href="<?= BASEURL .'rincian/hapus/' . $rincian['id_rincian'];  ?>" class="text-danger peringatan">
                          <i class="fa fa-trash-o fa-fw"></i> Hapus
                        </a>
                      </td>
                    </tr>
                   <?php endforeach ?>
                   </tbody>
                </table>
            </div>
          </div>
        </div>
      </div>

      <div class="modal" id="modalBox" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Tambah Data</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
              <form action="<?= BASEURL; ?>rincian/tambah" method="POST">
              <div class="form-group">
                <label class="col-form-label">ID Pendaftaran</label>
                <input class="form-control" type="text" placeholder="ID Pendaftaran" name="id_pendaftaran">
              </div>
              <div class="form-group">
                <label class="col-form-label">ID Obat</label>
                <input class="form-control" type="text" placeholder="ID Obat" name="id_obat">
              </div>
              <div class="form-group">
                <label class="col-form-label">Total Harga Obat</label>
                <input class="form-control" type="text" placeholder="Harga Obat" name="qty_obat">
              </div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-primary" type="submit">Tambah Data</button>
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
            </div>
            </form>
          </div>
        </div>
      </div>
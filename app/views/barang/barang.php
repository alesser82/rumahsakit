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
                      <th>ID</th>
                      <th>Nama</th>
                      <th>Kode</th>
                      <th>Merek</th>
                      <th>Aksi</th>
                     
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($data['barang'] as $barang): ?>
                    <tr>
                      <td><?php echo $barang['id_barang']; ?></td>
                      <td><?php echo $barang['nama']; ?></td>
                      <td><?php echo $barang['kode']; ?></td>
                      <td><?php echo $barang['merek']; ?></td>
                 
                      <td>
                        <a href="<?= BASEURL .'barang/ubah/' . $pasien['id_barang'];  ?>">
                          <i class="fa fa-pencil-square-o fa-fw"></i> Edit
                        </a> 
                        |
                        <a href="<?= BASEURL .'barang/hapus/' . $pasien['id_barang'];  ?>" class="text-danger peringatan">
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
              <h3><i class="fa fa-plus"></i>Print</h3>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
              <form action="<?= BASEURL; ?>barang/tambah" method="POST">
              <div class="form-group">
                <label class="col-form-label">Nama </label>
                <input class="form-control" type="text" placeholder="Nama" name="nama">
              </div>
              <div class="form-group">
                <label class="col-form-label">Kode</label>
                <input class="form-control" type="text" placeholder="Kode" name="kode">
              </div>
              <div class="form-group">
                <label class="col-form-label">Merek</label>
                <input class="form-control" type="text" placeholder="Merek" name="merek">
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
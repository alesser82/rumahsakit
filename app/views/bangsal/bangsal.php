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
                      <th>ID Bangsal</th>
                      <th>Nama Bangsal</th>
                      <th>ID Kelas</th>
                      <th>ID Perawat</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($data['bangsal'] as $bangsal): ?>
                    <tr>
                      <td><?php echo $bangsal['id_bangsal']; ?></td>
                      <td><?php echo $bangsal['nama_bangsal']; ?></td>
                      <td><?php echo $bangsal['id_kelas']; ?></td>
                      <td><?php echo $bangsal['id_perawat']; ?></td>
                      <td>
                        <a href="<?= BASEURL .'bangsal/ubah/' . $bangsal['id_bangsal'];  ?>">
                          <i class="fa fa-pencil-square-o fa-fw"></i> Edit
                        </a> 
                        |
                        <a href="<?= BASEURL .'bangsal/hapus/' . $bangsal['id_bangsal'];  ?>" class="text-danger peringatan">
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
              <form action="<?= BASEURL; ?>bangsal/tambah" method="POST">
              <div class="form-group">
                <label class="col-form-label">Nama Bangsal</label>
                <input class="form-control" type="text" placeholder="Nama" name="nama_bangsal">
              </div>
              <div class="form-group">
                <label class="col-form-label">ID Kelas</label>
                <input class="form-control" type="number" placeholder="Kelas" name="id_kelas">
              </div>
              <div class="form-group">
                <label class="col-form-label">ID Perawat</label>
                <input class="form-control" type="number" placeholder="Perawat" name="id_perawat">
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
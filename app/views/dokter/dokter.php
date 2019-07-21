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
                      <th>ID Dokter</th>
                      <th>Nama Nama Dokter</th>
                      <th>ID Spesialis</th>
                      <th>Biaya Dokter</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($data['dokter'] as $dokter): ?>
                    <tr>
                      <td><?php echo $dokter['id_dokter']; ?></td>
                      <td><?php echo $dokter['nama_dokter']; ?></td>
                      <td><?php echo $dokter['id_spesialis']; ?></td>
                      <td><?php echo $dokter['biaya_dokter']; ?></td>
                      <td>
                        <a href="<?= BASEURL .'dokter/ubah/' . $dokter['id_dokter'];  ?>">
                          <i class="fa fa-pencil-square-o fa-fw"></i> Edit
                        </a> 
                        |
                        <a href="<?= BASEURL .'dokter/hapus/' . $dokter['id_dokter'];  ?>" class="text-danger peringatan">
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
              <form action="<?= BASEURL; ?>dokter/tambah" method="POST">
              <div class="form-group">
                <label class="col-form-label">Nama dokter</label>
                <input class="form-control" type="text" placeholder="Nama Dokter" name="nama_dokter">
              </div>
              <div class="form-group">
                <label class="col-form-label">ID Spesialis</label>
                <input class="form-control" type="text" placeholder="ID Spesialis" name="id_spesialis">
              </div>
              <div class="form-group">
                <label class="col-form-label">Biaya Dokter</label>
                <input class="form-control" type="Biaya Dokter" name="biaya_dokter">
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
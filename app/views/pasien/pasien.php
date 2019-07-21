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
                      <th>Alamat</th>
                      <th>Jenis</th>
                      <th>Golongan Darah</th>
                      <th>Tanggal Lahir</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($data['pasien'] as $pasien): ?>
                    <tr>
                      <td><?php echo $pasien['id_pasien']; ?></td>
                      <td><?php echo $pasien['nama_pasien']; ?></td>
                      <td><?php echo $pasien['alamat_pasien']; ?></td>
                      <td><?php echo $pasien['jenis_pasien']; ?></td>
                      <td><?php echo $pasien['darah_pasien']; ?></td>
                      <td><?php echo $pasien['tanggal_pasien']; ?></td>
                      <td>
                        <a href="<?= BASEURL .'pasien/ubah/' . $pasien['id_pasien'];  ?>">
                          <i class="fa fa-pencil-square-o fa-fw"></i> Edit
                        </a> 
                        |
                        <a href="<?= BASEURL .'pasien/hapus/' . $pasien['id_pasien'];  ?>" class="text-danger peringatan">
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
              <form action="<?= BASEURL; ?>pasien/tambah" method="POST">
              <div class="form-group">
                <label class="col-form-label">Nama pasien</label>
                <input class="form-control" type="text" placeholder="Nama" name="nama_pasien">
              </div>
              <div class="form-group">
                <label class="col-form-label">Alamat</label>
                <input class="form-control" type="text" placeholder="Alamat" name="alamat_pasien">
              </div>
              <div class="form-group">
                <label class="col-form-label">Jenis Kelamin</label>
                <select name="jenis_pasien" class="form-control">
                  <option value="Laki-Laki">Laki-Laki</option>
                  <option value="Perempuan">Perempuan</option>
                </select>
              </div>
              <div class="form-group">
                <label class="col-form-label">Golongan Darah</label>
                <input class="form-control" type="text" placeholder="Golongan Darah" name="darah_pasien">
              </div>
              <div class="form-group">
                <label class="col-form-label">Tanggal Lahir</label>
                <input class="form-control" type="date" name="tanggal_pasien">
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
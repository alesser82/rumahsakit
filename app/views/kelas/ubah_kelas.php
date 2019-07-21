<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-file-text"></i> <?= $data['judul'] ?></h1>
        </div>
      </div>
      
	  <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <form action="<?= BASEURL; ?>kelas/ubahData" method="POST">
              <div class="form-group">
                <label class="col-form-label" for="id">ID Kelas</label>
                <input name="id_kelas" class="form-control" id="id" type="text" value="<?= $data['kelas']['id_kelas'] ?>" readonly>
              </div>
              <div class="form-group">
                <label class="col-form-label">Nama Kelas</label>
                <input class="form-control" type="text" value="<?= $data['kelas']['nama_kelas'] ?>" name="nama_kelas">
              </div>
              <div class="form-group">
                <label class="col-form-label">Harga Kelas</label>
                <input class="form-control" type="text" value="<?= $data['kelas']['harga_kelas'] ?>" name="harga_kelas">
              </div>
              <button class="btn btn-primary mt-2" type="submit">Update Data</button>
            </form>
            </div>
          </div>
        </div>
      </div>
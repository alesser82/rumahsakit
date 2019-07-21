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
              <form action="<?= BASEURL; ?>obat/ubahData" method="POST">
              <div class="form-group">
                <label class="col-form-label" for="id">ID obat</label>
                <input name="id_obat" class="form-control" id="id" type="text" value="<?= $data['obat']['id_obat'] ?>" readonly>
              </div>
              <div class="form-group">
                <label class="col-form-label">Nama obat</label>
                <input class="form-control" type="text" value="<?= $data['obat']['nama_obat'] ?>" name="nama_obat">
              </div>
              <div class="form-group">
                <label class="col-form-label">Tipe Obat</label>
                <input class="form-control" type="text" value="<?= $data['obat']['tipe_obat'] ?>" name="tipe_obat">
              </div>
              <div class="form-group">
                <label class="col-form-label">Harga Obat</label>
                <input class="form-control" type="text" value="<?= $data['obat']['harga_obat'] ?>" name="harga_obat">
              </div>
              <button class="btn btn-primary mt-2" type="submit">Update Data</button>
            </form>
            </div>
          </div>
        </div>
      </div>
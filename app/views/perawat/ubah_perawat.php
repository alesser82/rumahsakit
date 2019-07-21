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
              <form action="<?= BASEURL; ?>perawat/ubahData" method="POST">
              <div class="form-group">
                <label class="col-form-label" for="id">ID perawat</label>
                <input name="id_perawat" class="form-control" id="id" type="text" value="<?= $data['perawat']['id_perawat'] ?>" readonly>
              </div>
              <div class="form-group">
                <label class="col-form-label">Nama Perawat</label>
                <input class="form-control" type="text" value="<?= $data['perawat']['nama_perawat'] ?>" name="nama_perawat">
              </div>
              <div class="form-group">
                <label class="col-form-label">Biaya Perawat</label>
                <input class="form-control" type="text" value="<?= $data['perawat']['biaya_perawat'] ?>" name="biaya_perawat">
              </div>
            
              <button class="btn btn-primary mt-2" type="submit">Update Data</button>
            </form>
            </div>
          </div>
        </div>
      </div>
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
              <form action="<?= BASEURL; ?>dokter/ubahData" method="POST">
              <div class="form-group">
                <label class="col-form-label" for="id">ID dokter</label>
                <input name="id_dokter" class="form-control" id="id" type="text" value="<?= $data['dokter']['id_dokter'] ?>" readonly>
              </div>
              <div class="form-group">
                <label class="col-form-label">Nama Dokter</label>
                <input class="form-control" type="text" value="<?= $data['dokter']['nama_dokter'] ?>" name="nama_dokter">
              </div>
              <div class="form-group">
                <label class="col-form-label">ID Spesialis</label>
                <input class="form-control" type="text" value="<?= $data['dokter']['id_spesialis'] ?>" name="id_spesialis">
              </div>
              <div class="form-group">
                <label class="col-form-label">Biaya Dokter</label>
                <input class="form-control" type="text" value="<?= $data['dokter']['biaya_dokter'] ?>" name="biaya_dokter">
              </div>
            
              <button class="btn btn-primary mt-2" type="submit">Update Data</button>
            </form>
            </div>
          </div>
        </div>
      </div>
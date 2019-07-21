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
              <form action="<?= BASEURL; ?>pendaftaran/ubahData" method="POST">
              <div class="form-group">
                <label class="col-form-label" for="id">ID pendaftaran</label>
                <input name="id_pendaftaran" class="form-control" id="id" type="text" value="<?= $data['pendaftaran']['id_pendaftaran'] ?>" readonly>
              <div class="form-group">
                <label class="col-form-label">Tanggal Pendaftaran</label>
                <input class="form-control" type="date" value="<?= $data['pendaftaran']['tanggal_pendaftaran'] ?>" name="tanggal_pendaftaran">
              </div>
              <div class="form-group">
                <label class="col-form-label">ID Pasien</label>
                <input class="form-control" type="text" value="<?= $data['pendaftaran']['id_pasien'] ?>" name="id_pasien">
              </div>
              <div class="form-group">
                <label class="col-form-label">ID User</label>
                <input class="form-control" type="text" value="<?= $data['pendaftaran']['id_user'] ?>" name="id_user">
              </div>
              <button class="btn btn-primary mt-2" type="submit">Update Data</button>
            </form>
            </div>
          </div>
        </div>
      </div>
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
              <form action="<?= BASEURL; ?>diagnosa/ubahData" method="POST">
              <div class="form-group">
                <label class="col-form-label" for="id">ID diagnosa</label>
                <input name="id_diagnosa" class="form-control" id="id" type="text" value="<?= $data['diagnosa']['id_diagnosa'] ?>" readonly>
              </div>
              <div class="form-group">
                <label class="col-form-label">Tanggal diagnosa</label>
                <input class="form-control" type="text" value="<?= $data['diagnosa']['tanggal_diagnosa'] ?>" name="tanggal_diagnosa">
              </div>
              <div class="form-group">
                <label class="col-form-label">ID Pendaftaran</label>
                <input class="form-control" type="text" value="<?= $data['diagnosa']['id_pendaftaran'] ?>" name="id_pendaftaran">
              </div>
              <div class="form-group">
                <label class="col-form-label">Keterangan Diagnosa</label>
                <input class="form-control" type="text" value="<?= $data['diagnosa']['keterangan_diagnosa'] ?>" name="keterangan_diagnosa">
              </div>
              
              <button class="btn btn-primary mt-2" type="submit">Update Data</button>
            </form>
            </div>
          </div>
        </div>
      </div>
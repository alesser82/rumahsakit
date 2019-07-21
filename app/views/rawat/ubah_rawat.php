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
              <form action="<?= BASEURL; ?>rawat/ubahData" method="POST">
              <div class="form-group">
                <label class="col-form-label" for="id">ID Dokter</label>
                <input name="id_rawat" class="form-control" id="id" type="text" value="<?= $data['rawat']['id_rawat'] ?>" readonly>
              </div>
              <div class="form-group">
                <label class="col-form-label">ID Pendaftaran</label>
                <input class="form-control" type="text" value="<?= $data['rawat']['id_pendaftaran'] ?>" name="id_pendaftaran">
              </div>
              <div class="form-group">
                <label class="col-form-label">ID Dokter</label>
                <input class="form-control" type="text" value="<?= $data['rawat']['id_dokter'] ?>" name="id_dokter">
              </div>
              <div class="form-group">
                <label class="col-form-label">ID Bangsal</label>
                <input class="form-control" type="text" value="<?= $data['rawat']['id_bangsal'] ?>" name="id_bangsal">
              </div>
            
              <button class="btn btn-primary mt-2" type="submit">Update Data</button>
            </form>
            </div>
          </div>
        </div>
      </div>
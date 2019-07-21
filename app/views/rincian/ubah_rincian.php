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
              <form action="<?= BASEURL; ?>rincian/ubahData" method="POST">
              <div class="form-group">
                <label class="col-form-label" for="id">ID Rincian</label>
                <input name="id_rincian" class="form-control" id="id" type="text" value="<?= $data['rincian']['id_rincian'] ?>" readonly>
              </div>
              <div class="form-group">
                <label class="col-form-label">ID Pendaftaran</label>
                <input class="form-control" type="text" value="<?= $data['rincian']['id_pendaftaran'] ?>" name="id_pendaftaran">
              </div>
              <div class="form-group">
                <label class="col-form-label">ID Obat</label>
                <input class="form-control" type="text" value="<?= $data['rincian']['id_obat'] ?>" name="id_obat">
              </div>
              <div class="form-group">
                <label class="col-form-label">Total Harga Obat</label>
                <input class="form-control" type="text" value="<?= $data['rincian']['qty_obat'] ?>" name="qty_obat">
              </div>
              <button class="btn btn-primary mt-2" type="submit">Update Data</button>
            </form>
            </div>
          </div>
        </div>
      </div>
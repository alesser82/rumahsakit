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
              <form action="<?= BASEURL; ?>tagihan/ubahData" method="POST">
              <div class="form-group">
                <label class="col-form-label" for="id">ID Tagihan</label>
                <input name="id_tagihan" class="form-control" id="id" type="text" value="<?= $data['tagihan']['id_tagihan'] ?>" readonly>
              </div>
              <div class="form-group">
                <label class="col-form-label">Tanggal</label>
                <input class="form-control" type="text" value="<?= $data['tagihan']['tanggal_tagihan'] ?>" name="tanggal_tagihan">
              </div>
              <div class="form-group">
                <label class="col-form-label">ID Pendaftaran</label>
                <input class="form-control" type="text" value="<?= $data['tagihan']['id_pendaftaran'] ?>" name="id_pendaftaran">
              </div>
        
              <div class="form-group">
                <label class="col-form-label">Total</label>
                <input class="form-control" type="text" value="<?= $data['tagihan']['total_tagihan'] ?>" name="total_tagihan">
              </div>


              <button class="btn btn-primary mt-2" type="submit">Update Data</button>
            </form>
            </div>
          </div>
        </div>
      </div>
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
              <form action="<?= BASEURL; ?>barang/ubahData" method="POST">
              <div class="form-group">
                <label class="col-form-label" for="id">ID Barang</label>
                <input name="id_barang" class="form-control" id="id" type="text" value="<?= $data['barang']['id_barang'] ?>" readonly>
              </div>
              <div class="form-group">
                <label class="col-form-label">Nama </label>
                <input class="form-control" type="text" value="<?= $data['barang']['barang'] ?>" name="barang">
              </div>
              <div class="form-group">
                <label class="col-form-label">Kode</label>
                <input class="form-control" type="text" value="<?= $data['kode']['kode'] ?>" name="kode">
              </div>
    
              <div class="form-group">
                <label class="col-form-label">Merek</label>
                <input class="form-control" type="text" value="<?= $data['merek']['merek'] ?>" name="merek">
              </div>
        

              <button class="btn btn-primary mt-2" type="submit">Update Data</button>
            </form>
            </div>
          </div>
        </div>
      </div>
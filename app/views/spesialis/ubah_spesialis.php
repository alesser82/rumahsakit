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
              <form action="<?= BASEURL; ?>spesialis/ubahData" method="POST">
              <div class="form-group">
                <label class="col-form-label" for="id">ID Spesialis</label>
                <input name="id_spesialis" class="form-control" id="id" type="text" value="<?= $data['spesialis']['id_spesialis'] ?>" readonly>
              </div>
              <div class="form-group">
                <label class="col-form-label">Nama Spesialis</label>
                <input class="form-control" type="text" value="<?= $data['spesialis']['nama_spesialis'] ?>" name="nama_spesialis">
              </div>
              <div class="form-group">
                <label class="col-form-label">Keterangan Spesialis</label>
                <input class="form-control" type="text" value="<?= $data['spesialis']['keterangan_spesialis'] ?>" name="keterangan_spesialis">
              </div>
             

              <button class="btn btn-primary mt-2" type="submit">Update Data</button>
            </form>
            </div>
          </div>
        </div>
      </div>
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
              <form action="<?= BASEURL; ?>bangsal/ubahData" method="POST">
              <div class="form-group">
                <label class="col-form-label" for="id">ID Bangsal</label>
                <input name="id_bangsal" class="form-control" id="id" type="text" value="<?= $data['bangsal']['id_bangsal'] ?>" readonly>
              </div>
              <div class="form-group">
                <label class="col-form-label">Nama Bangsal </label>
                <input class="form-control" type="text" value="<?= $data['bangsal']['nama_bangsal'] ?>" name="nama_bangsal">
              </div>
              <div class="form-group">
                <label class="col-form-label">ID Kelas</label>
                <input class="form-control" type="text" value="<?= $data['bangsal']['id_kelas'] ?>" name="id_kelas">
              </div>
    
              <div class="form-group">
                <label class="col-form-label">ID Perawat</label>
                <input class="form-control" type="text" value="<?= $data['bangsal']['id_perawat'] ?>" name="id_perawat">
              </div>
        

              <button class="btn btn-primary mt-2" type="submit">Update Data</button>
            </form>
            </div>
          </div>
        </div>
      </div>
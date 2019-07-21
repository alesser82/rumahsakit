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
              <form action="<?= BASEURL; ?>pasien/ubahData" method="POST">
              <div class="form-group">
                <label class="col-form-label" for="id">ID pasien</label>
                <input name="id_pasien" class="form-control" id="id" type="text" value="<?= $data['pasien']['id_pasien'] ?>" readonly>
              </div>
              <div class="form-group">
                <label class="col-form-label">Nama pasien</label>
                <input class="form-control" type="text" value="<?= $data['pasien']['nama_pasien'] ?>" name="nama_pasien">
              </div>
              <div class="form-group">
                <label class="col-form-label">Alamat</label>
                <input class="form-control" type="text" value="<?= $data['pasien']['alamat_pasien'] ?>" name="alamat_pasien">
              </div>
              <div class="form-group">
                <label class="col-form-label">Jenis Kelamin</label>
                <select name="jenis_pasien" class="form-control">
                  <option value="Laki-Laki">Laki-Laki</option>
                  <option value="Perempuan">Perempuan</option>
                </select>
              </div>
              <div class="form-group">
                <label class="col-form-label">Golongan Darah</label>
                <input class="form-control" type="text" value="<?= $data['pasien']['darah_pasien'] ?>" name="darah_pasien">
              </div>
              <div class="form-group">
                <label class="col-form-label">Tanggal Lahir</label>
                <input class="form-control" type="date" value="<?= $data['pasien']['tanggal_pasien'] ?>" name="tanggal_pasien">
              </div>

              <button class="btn btn-primary mt-2" type="submit">Update Data</button>
            </form>
            </div>
          </div>
        </div>
      </div>
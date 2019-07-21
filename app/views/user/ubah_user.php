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
              <form action="<?= BASEURL; ?>user/ubahData" method="POST">
              <div class="form-group">
                <label class="col-form-label" for="id">ID user</label>
                <input name="id_user" class="form-control" id="id" type="text" value="<?= $data['user']['id_user'] ?>" readonly>
              </div>
              <div class="form-group">
                <label class="col-form-label">Username</label>
                <input class="form-control" type="text" name="username" value="<?= $data['user']['username'] ?>">
              </div>
              <div class="form-group">
                <label class="col-form-label">Password</label>
                <input class="form-control" type="password" name="password" value="<?= $data['user']['password'] ?>">
              </div>
              <div class="form-group">
                <label class="col-form-label">Level</label>
                <select class="form-control" name="level">
                  <option value="admin" <?php if ($data['user']['level'] == "admin"): ?>
                    SELECTED
                  <?php endif ?>>Admin</option>
                  <option value="dokter" <?php if ($data['user']['level'] == "dokter"): ?>
                    SELECTED
                  <?php endif ?>>Dokter</option>
                </select>
              </div>
              <button class="btn btn-primary mt-2" type="submit">Update Data</button>
            </form>
            </div>
          </div>
        </div>
      </div>
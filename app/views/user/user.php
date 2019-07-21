<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-file-text"></i> <?= $data['judul'] ?></h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalBox">
                Tambah Data
              </button>
        </ul>
      </div>
      
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="mb-1">
                <?= FLasher::flash(); ?>
              </div>
              <table class="table table-hover table-bordered" id="tabel">
                  <thead>
                    <tr>
                      <th>ID user</th>
                      <th>Username</th>
                      <th>Password</th>
                      <th>Level</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($data['user'] as $user): ?>
                    <tr>
                      <td><?php echo $user['id_user']; ?></td>
                      <td><?php echo $user['username']; ?></td>
                      <td><?php echo $user['password']; ?></td>
                      <td><?php echo $user['level']; ?></td>
                      <td>
                        <a href="<?= BASEURL .'user/ubah/' . $user['id_user'];  ?>">
                          <i class="fa fa-pencil-square-o fa-fw"></i> Edit
                        </a> 
                        |
                        <a href="<?= BASEURL .'user/hapus/' . $user['id_user'];  ?>" class="text-danger peringatan">
                          <i class="fa fa-trash-o fa-fw"></i> Hapus
                        </a>
                      </td>
                    </tr>
                   <?php endforeach ?>
                   </tbody>
                </table>
            </div>
          </div>
        </div>
      </div>

      <div class="modal" id="modalBox" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Tambah Data</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
              <form action="<?= BASEURL; ?>user/tambah" method="POST">
              <div class="form-group">
                <label class="col-form-label">Username</label>
                <input class="form-control" type="text" placeholder="user" name="username">
              </div>
              <div class="form-group">
                <label class="col-form-label">Password</label>
                <input class="form-control" type="password" name="password">
              </div>
              <div class="form-group">
                <label class="col-form-label">Level</label>
                <select class="form-control" name="level">
                  <option value="admin">Admin</option>
                  <option value="dokter">Dokter</option>
                </select>
              </div>
  
            </div>
            <div class="modal-footer">
              <button class="btn btn-primary" type="submit">Tambah Data</button>
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
            </div>
            </form>
          </div>
        </div>
      </div>
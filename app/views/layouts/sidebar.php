<!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user d-block text-left ml-2">
        <div>
          <p class="app-sidebar__user-name font-weight-bold"><?= $_SESSION['user']['username']; ?></p>
          <p class="app-sidebar__user-designation"><?= $_SESSION['user']['level']; ?></p>
        </div>
      </div>
      <ul class="app-menu">
        <li>
          <a class="app-menu__item" href="'.BASEURL.'home/info">
            <i class="app-menu__icon fa fa-file-text"></i>
            <span class="app-menu__label">Beranda</span>
          </a>
        </li>
        <li class="treeview is-expanded">
          <a class="app-menu__item active" href="#" data-toggle="treeview">
            <i class="app-menu__icon fa fa-file-text"></i>
            <span class="app-menu__label">Master Data</span>
            <i class="treeview-indicator fa fa-angle-right"></i>
          </a>
          <ul class="treeview-menu">
          <?php
          // Otorisasi (Authorization)
            if ($_SESSION['user']['level'] == 'admin') {
              echo 
              '
              <li>
                <a class="treeview-item" href="'.BASEURL.'user">
                  <i class="app-menu__icon fa fa-circle-o"></i><span class="app-menu__label">Data User</span>
                </a>
              </li>
              <li>
                <a class="treeview-item" href="'.BASEURL.'perawat">
                  <i class="app-menu__icon fa fa-circle-o"></i><span class="app-menu__label">Data Perawat</span>
                </a>
              </li>
              <li>
                <a class="treeview-item" href="'.BASEURL.'barang">
                  <i class="app-menu__icon fa fa-circle-o"></i><span class="app-menu__label">Data Barang</span>
                </a>
              </li>
              <li>
              <a class="treeview-item" href="'.BASEURL.'rawat">
                <i class="app-menu__icon fa fa-circle-o"></i><span class="app-menu__label">Data Rawat</span>
              </a>
            </li>
            <li>
              <a class="treeview-item" href="'.BASEURL.'rincian">
                <i class="app-menu__icon fa fa-circle-o"></i><span class="app-menu__label">Data Rincian</span>
              </a>
            </li>
              ';
            }
            if (($_SESSION['user']['level'] == 'admin') || ($_SESSION['user']['level'] == 'receptionist') || ($_SESSION['user']['level'] == 'dokter') ) {
              echo 
              '
                <li>
                  <a class="treeview-item" href="'.BASEURL.'pasien">
                    <i class="app-menu__icon fa fa-circle-o"></i><span class="app-menu__label">Data Pasien</span>
                  </a>
                </li>
              ';
            }
            if (($_SESSION['user']['level'] == 'admin') || ($_SESSION['user']['level'] == 'receptionist')) {
              echo 
              '
                <li>
                  <a class="treeview-item" href="'.BASEURL.'bangsal">
                    <i class="app-menu__icon fa fa-circle-o"></i><span class="app-menu__label">Data Bangsal</span>
                  </a>
                </li>
                <li>
                  <a class="treeview-item" href="'.BASEURL.'spesialis">
                    <i class="app-menu__icon fa fa-circle-o"></i><span class="app-menu__label">Data Spesialis</span>
                  </a>
                </li>
              ';
            }

            if (($_SESSION['user']['level'] == 'admin') || ($_SESSION['user']['level'] == 'kasir')) {
              echo 
              '
                <li>
                  <a class="treeview-item" href="'.BASEURL.'tagihan">
                    <i class="app-menu__icon fa fa-circle-o"></i><span class="app-menu__label">Data Tagihan</span>
                  </a>
                </li>
              ';
            }

            if (($_SESSION['user']['level'] == 'admin') || ($_SESSION['user']['level'] == 'dokter') || ($_SESSION['user']['level'] == 'kasir')) {
              echo 
              '
                <li>
                  <a class="treeview-item" href="'.BASEURL.'obat">
                    <i class="app-menu__icon fa fa-circle-o"></i><span class="app-menu__label">Data Obat</span>
                  </a>
                </li>
              ';
            }

            if (($_SESSION['user']['level'] == 'admin') || ($_SESSION['user']['level'] == 'receptionist') || ($_SESSION['user']['level'] == 'kasir')) {
              echo 
              '
                <li>
                  <a class="treeview-item" href="'.BASEURL.'pendaftaran">
                    <i class="app-menu__icon fa fa-circle-o"></i><span class="app-menu__label">Data Pendaftaran</span>
                  </a>
                </li>
                <li>
                  <a class="treeview-item" href="'.BASEURL.'kelas">
                    <i class="app-menu__icon fa fa-circle-o"></i><span class="app-menu__label">Data Kelas</span>
                  </a>
                </li>
              ';
            }

            if (($_SESSION['user']['level'] == 'admin') || ($_SESSION['user']['level'] == 'dokter')) {
              echo 
              '
                <li>
                  <a class="treeview-item" href="'.BASEURL.'diagnosa">
                    <i class="app-menu__icon fa fa-circle-o"></i><span class="app-menu__label">Data Diagnosa</span>
                  </a>
                </li>
              ';
            }

            if (($_SESSION['user']['level'] == 'admin') || ($_SESSION['user']['level'] == 'kasir')) {
              echo 
              '
                <li>
                  <a class="treeview-item" href="'.BASEURL.'dokter">
                    <i class="app-menu__icon fa fa-circle-o"></i><span class="app-menu__label">Data Dokter</span>
                  </a>
                </li>
              ';
            }

            ?>
          </ul>
        </li>
      </ul>
    </aside>

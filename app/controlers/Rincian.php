<?php

class Rincian extends Controler{

    public function __construct() {
		// Otorisasi (Authorization)
		if (isset($_SESSION['user'])) {
			if (($_SESSION['user']['level'] == 'admin') || ($_SESSION['user']['level'] == 'kasir')) {
				return true;
			}else{
				header('Location:'. BASEURL . 'home/info');
			}
		}else{
			header('Location:'. BASEURL . 'home/info');
		}
	}

    public function index()
    {
        $data['judul'] = 'Halaman Rincian';
        $data['rincian'] = $this->model('Rincian_model')->getDataRincian();
        $this->view('session');
        $this->view('layouts/header', $data);
        $this->view('layouts/nav', $data);
        $this->view('layouts/sidebar', $data);
        $this->view('rincian/rincian', $data);
        $this->view('layouts/footer', $data);
    }

    public function tambah()
    {
        if ( $this->model('Rincian_model')->tambahDataRincian($_POST) > 0 )
        {
            Flasher::setFlash('Data','berhasil','ditambahkan','success');
            header('Location: '.BASEURL.'rincian');
            exit;
        }else{
            Flasher::setFlash('Data','gagal','ditambahkan','danger');
            header('Location: '.BASEURL.'rincian');
            exit;
        }
    }

    public function hapus($id)
	{
		if ( $this->model('Rincian_model')->hapusDataRincian($id) > 0 ) {
			Flasher::setFlash('Berhasil','dihapus','success');
			header('Location:'.BASEURL.'rincian');
			exit;
		}else{
			Flasher::setFlash('Gagal','dihapus','danger');
			header('Location:'.BASEURL.'rincian');
			exit;
		}
	}

    public function ubah($id)
    {
        $data['judul'] = 'Ubah Data Rincian';
        $data['rincian'] = $this->model('Rincian_model')->getDataRincianById($id);
        $this->view('session');
        $this->view('layouts/header',$data);
		$this->view('layouts/nav',$data);
		$this->view('layouts/sidebar',$data);
		$this->view('rincian/ubah_rincian',$data);
		$this->view('layouts/footer');
    }
    
    public function ubahData()
	{
		if ( $this->model('Rincian_model')->updateDataRincian($_POST) > 0 ) {
			Flasher::setFlash('Berhasil','diubah','success');
			header('Location:'.BASEURL.'rincian');
			exit;
		}else{
			Flasher::setFlash('Gagal','diubah','danger');
			header('Location:'.BASEURL.'rincian');
			exit;
		}
	}
}
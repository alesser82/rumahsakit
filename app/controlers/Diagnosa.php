<?php

class Diagnosa extends Controler{

	public function __construct() {
		// Otorisasi (Authorization)
		if (isset($_SESSION['user'])) {
			if (($_SESSION['user']['level'] == 'admin') || ($_SESSION['user']['level'] == 'dokter')) {
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
		$data['judul'] = 'Halaman diagnosa';
		$data['diagnosa'] = $this->model('diagnosa_model')->getDatadiagnosa();
		$this->view('session');
		$this->view('layouts/header',$data);
		$this->view('layouts/nav',$data);
		$this->view('layouts/sidebar',$data);
		$this->view('diagnosa/diagnosa',$data);
		$this->view('layouts/footer');
	}

	public function tambah()
	{
		if ( $this->model('diagnosa_model')->tambahDatadiagnosa($_POST) > 0 ) {
			Flasher::setFlash('Berhasil','ditambahkan','success');
			header('Location:'.BASEURL.'diagnosa');
			exit;
		}else{
			Flasher::setFlash('Gagal','ditambahkan','danger');
			header('Location:'.BASEURL.'diagnosa');
			exit;
		}
	}

	public function hapus($id)
	{
		if ( $this->model('diagnosa_model')->hapusDatadiagnosa($id) > 0 ) {
			Flasher::setFlash('Berhasil','dihapus','success');
			header('Location:'.BASEURL.'diagnosa');
			exit;
		}else{
			Flasher::setFlash('Gagal','dihapus','danger');
			header('Location:'.BASEURL.'diagnosa');
			exit;
		}
	}

	public function ubah($id)
	{
		$data['judul'] = 'Ubah diagnosa';
		$data['diagnosa'] = $this->model('diagnosa_model')->getDatadiagnosaById($id);
		$this->view('session');
		$this->view('layouts/header',$data);
		$this->view('layouts/nav',$data);
		$this->view('layouts/sidebar',$data);
		$this->view('diagnosa/ubah_diagnosa',$data);
		$this->view('layouts/footer');
	}

	public function ubahData()
	{
		if ( $this->model('diagnosa_model')->updateDatadiagnosa($_POST) > 0 ) {
			Flasher::setFlash('Berhasil','diubah','success');
			header('Location:'.BASEURL.'diagnosa');
			exit;
		}else{
			Flasher::setFlash('Gagal','diubah','danger');
			header('Location:'.BASEURL.'diagnosa');
			exit;
		}
	}
}

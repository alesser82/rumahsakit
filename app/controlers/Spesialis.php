<?php

class Spesialis extends Controler{

	public function __construct() {
		// Otorisasi (Authorization)
		if (isset($_SESSION['user'])) {
			if (($_SESSION['user']['level'] == 'admin') || ($_SESSION['user']['level'] == 'receptionist')) {
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
		$data['judul'] = 'Halaman Spesialis';
		$data['spesialis'] = $this->model('Spesialis_model')->getDataSpesialis();
		$this->view('session');
		$this->view('layouts/header',$data);
		$this->view('layouts/nav',$data);
		$this->view('layouts/sidebar',$data);
		$this->view('spesialis/spesialis',$data);
		$this->view('layouts/footer');
	}

	public function tambah()
	{
		if ( $this->model('Spesialis_model')->tambahDataSpesialis($_POST) > 0 ) {
			Flasher::setFlash('Berhasil','ditambahkan','success');
			header('Location:'.BASEURL.'spesialis');
			exit;
		}else{
			Flasher::setFlash('Gagal','ditambahkan','danger');
			header('Location:'.BASEURL.'spesialis');
			exit;
		}
	}

	public function hapus($id)
	{
		if ( $this->model('Spesialis_model')->hapusDataSpesialis($id) > 0 ) {
			Flasher::setFlash('Berhasil','dihapus','success');
			header('Location:'.BASEURL.'spesialis');
			exit;
		}else{
			Flasher::setFlash('Gagal','dihapus','danger');
			header('Location:'.BASEURL.'spesialis');
			exit;
		}
	}

	public function ubah($id)
	{
		$data['judul'] = 'Ubah Spesialis';
		$data['spesialis'] = $this->model('Spesialis_model')->getDataSpesialisById($id);
		$this->view('session');
		$this->view('layouts/header',$data);
		$this->view('layouts/nav',$data);
		$this->view('layouts/sidebar',$data);
		$this->view('spesialis/ubah_spesialis',$data);
		$this->view('layouts/footer');
	}

	public function ubahData()
	{
		if ( $this->model('Spesialis_model')->updateDataSpesialis($_POST) > 0 ) {
			Flasher::setFlash('Berhasil','diubah','success');
			header('Location:'.BASEURL.'spesialis');
			exit;
		}else{
			Flasher::setFlash('Gagal','diubah','danger');
			header('Location:'.BASEURL.'spesialis');
			exit;
		}
	}
}

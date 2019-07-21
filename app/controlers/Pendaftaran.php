<?php

class Pendaftaran extends Controler{

	public function __construct() {
		// Otorisasi (Authorization)
		if (isset($_SESSION['user'])) {
			if (($_SESSION['user']['level'] == 'admin') || ($_SESSION['user']['level'] == 'kasir') || ($_SESSION['user']['level'] == 'receptionist')) {
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
		$data['judul'] = 'Halaman pendaftaran';
		$data['pendaftaran'] = $this->model('Pendaftaran_model')->getDataPendaftaran();
		$this->view('session');
		$this->view('layouts/header',$data);
		$this->view('layouts/nav',$data);
		$this->view('layouts/sidebar',$data);
		$this->view('pendaftaran/pendaftaran',$data);
		$this->view('layouts/footer');
	}

	public function tambah()
	{
		if ( $this->model('Pendaftaran_model')->tambahDataPendaftaran($_POST) > 0 ) {
			Flasher::setFlash('Berhasil','ditambahkan','success');
			header('Location:'.BASEURL.'pendaftaran');
			exit;
		}else{
			Flasher::setFlash('Gagal','ditambahkan','danger');
			header('Location:'.BASEURL.'pendaftaran');
			exit;
		}
	}

	public function hapus($id)
	{
		if ( $this->model('Pendaftaran_model')->hapusDataPendaftaran($id) > 0 ) {
			Flasher::setFlash('Berhasil','dihapus','success');
			header('Location:'.BASEURL.'pendaftaran');
			exit;
		}else{
			Flasher::setFlash('Gagal','dihapus','danger');
			header('Location:'.BASEURL.'pendaftaran');
			exit;
		}
	}

	public function ubah($id)
	{
		$data['judul'] = 'Ubah pendaftaran';
		$data['pendaftaran'] = $this->model('Pendaftaran_model')->getDataPendaftaranById($id);
		$this->view('session');
		$this->view('layouts/header',$data);
		$this->view('layouts/nav',$data);
		$this->view('layouts/sidebar',$data);
		$this->view('pendaftaran/ubah_pendaftaran',$data);
		$this->view('layouts/footer');
	}

	public function ubahData()
	{
		if ( $this->model('Pendaftaran_model')->updateDataPendaftaran($_POST) > 0 ) {
			Flasher::setFlash('Berhasil','diubah','success');
			header('Location:'.BASEURL.'pendaftaran');
			exit;
		}else{
			Flasher::setFlash('Gagal','diubah','danger');
			header('Location:'.BASEURL.'pendaftaran');
			exit;
		}
	}
}

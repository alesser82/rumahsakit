<?php

class Bangsal extends Controler{

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
		$data['judul'] = 'Halaman Data Bangsal';
		$data['bangsal'] = $this->model('Bangsal_model')->getDataBangsal();
		$this->view('session');
		$this->view('layouts/header',$data);
		$this->view('layouts/nav',$data);
		$this->view('layouts/sidebar',$data);
		$this->view('bangsal/bangsal',$data);
		$this->view('layouts/footer');
	}

	public function tambah()
	{
		if ( $this->model('Bangsal_model')->tambahDataBangsal($_POST) > 0 ) {
			Flasher::setFlash('Berhasil','ditambahkan','success');
			header('Location:'.BASEURL.'bangsal');
			exit;
		}else{
			Flasher::setFlash('Gagal','ditambahkan','danger');
			header('Location:'.BASEURL.'bangsal');
			exit;
		}
	}

	public function hapus($id)
	{
		if ( $this->model('Bangsal_model')->hapusDataBangsal($id) > 0 ) {
			Flasher::setFlash('Berhasil','dihapus','success');
			header('Location:'.BASEURL.'bangsal');
			exit;
		}else{
			Flasher::setFlash('Gagal','dihapus','danger');
			header('Location:'.BASEURL.'bangsal');
			exit;
		}
	}

	public function ubah($id)
	{
		$data['judul'] = 'Ubah Data Bangsal';
		$data['bangsal'] = $this->model('Bangsal_model')->getDataBangsalById($id);
		$this->view('session');
		$this->view('layouts/header',$data);
		$this->view('layouts/nav',$data);
		$this->view('layouts/sidebar',$data);
		$this->view('bangsal/ubah_bangsal',$data);
		$this->view('layouts/footer');
	}

	public function ubahData()
	{
		if ( $this->model('Bangsal_model')->updateDataBangsal($_POST) > 0 ) {
			Flasher::setFlash('Berhasil','diubah','success');
			header('Location:'.BASEURL.'bangsal');
			exit;
		}else{
			Flasher::setFlash('Gagal','diubah','danger');
			header('Location:'.BASEURL.'bangsal');
			exit;
		}
	}
}

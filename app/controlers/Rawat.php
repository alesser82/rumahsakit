<?php

class Rawat extends Controler{

	public function __construct() {
		// Otorisasi (Authorization)
		if (isset($_SESSION['user'])) {
			if ($_SESSION['user']['level'] == 'admin') {
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
		$data['judul'] = 'Halaman Data Rawat';
		$data['rawat'] = $this->model('Rawat_model')->getDataRawat();
		$this->view('session');
		$this->view('layouts/header',$data);
		$this->view('layouts/nav',$data);
		$this->view('layouts/sidebar',$data);
		$this->view('rawat/rawat',$data);
		$this->view('layouts/footer');
	}

	public function tambah()
	{
		if ( $this->model('Rawat_model')->tambahDataRawat($_POST) > 0 ) {
			Flasher::setFlash('Berhasil','ditambahkan','success');
			header('Location:'.BASEURL.'rawat');
			exit;
		}else{
			Flasher::setFlash('Gagal','ditambahkan','danger');
			header('Location:'.BASEURL.'rawat');
			exit;
		}
	}

	public function hapus($id)
	{
		if ( $this->model('Rawat_model')->hapusDataRawat($id) > 0 ) {
			Flasher::setFlash('Berhasil','dihapus','success');
			header('Location:'.BASEURL.'rawat');
			exit;
		}else{
			Flasher::setFlash('Gagal','dihapus','danger');
			header('Location:'.BASEURL.'rawat');
			exit;
		}
	}

	public function ubah($id)
	{
		$data['judul'] = 'Ubah Data Rawat';
		$data['rawat'] = $this->model('Rawat_model')->getDataRawatById($id);
		$this->view('session');
		$this->view('layouts/header',$data);
		$this->view('layouts/nav',$data);
		$this->view('layouts/sidebar',$data);
		$this->view('rawat/ubah_rawat',$data);
		$this->view('layouts/footer');
	}

	public function ubahData()
	{
		if ( $this->model('Rawat_model')->updateDataRawat($_POST) > 0 ) {
			Flasher::setFlash('Berhasil','diubah','success');
			header('Location:'.BASEURL.'rawat');
			exit;
		}else{
			Flasher::setFlash('Gagal','diubah','danger');
			header('Location:'.BASEURL.'rawat');
			exit;
		}
	}
}

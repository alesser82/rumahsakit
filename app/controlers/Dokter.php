<?php

class Dokter extends Controler{

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
		$data['judul'] = 'Halaman Data Dokter';
		$data['dokter'] = $this->model('Dokter_model')->getDataDokter();
		$this->view('session');
		$this->view('layouts/header',$data);
		$this->view('layouts/nav',$data);
		$this->view('layouts/sidebar',$data);
		$this->view('dokter/dokter',$data);
		$this->view('layouts/footer');
	}

	public function tambah()
	{
		if ( $this->model('Dokter_model')->tambahDataDokter($_POST) > 0 ) {
			Flasher::setFlash('Berhasil','ditambahkan','success');
			header('Location:'.BASEURL.'dokter');
			exit;
		}else{
			Flasher::setFlash('Gagal','ditambahkan','danger');
			header('Location:'.BASEURL.'dokter');
			exit;
		}
	}

	public function hapus($id)
	{
		if ( $this->model('Dokter_model')->hapusDataDokter($id) > 0 ) {
			Flasher::setFlash('Berhasil','dihapus','success');
			header('Location:'.BASEURL.'dokter');
			exit;
		}else{
			Flasher::setFlash('Gagal','dihapus','danger');
			header('Location:'.BASEURL.'dokter');
			exit;
		}
	}

	public function ubah($id)
	{
		$data['judul'] = 'Ubah Data Dokter';
		$data['dokter'] = $this->model('Dokter_model')->getDataDokterById($id);
		$this->view('session');
		$this->view('layouts/header',$data);
		$this->view('layouts/nav',$data);
		$this->view('layouts/sidebar',$data);
		$this->view('dokter/ubah_dokter',$data);
		$this->view('layouts/footer');
	}

	public function ubahData()
	{
		if ( $this->model('Dokter_model')->updateDataDokter($_POST) > 0 ) {
			Flasher::setFlash('Berhasil','diubah','success');
			header('Location:'.BASEURL.'dokter');
			exit;
		}else{
			Flasher::setFlash('Gagal','diubah','danger');
			header('Location:'.BASEURL.'dokter');
			exit;
		}
	}
}

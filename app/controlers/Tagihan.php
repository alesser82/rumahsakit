<?php

class Tagihan extends Controler{

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
		$data['judul'] = 'Halaman Tagihan';
		$data['tagihan'] = $this->model('Tagihan_model')->getDataTagihan();
		$this->view('session');
		$this->view('layouts/header',$data);
		$this->view('layouts/nav',$data);
		$this->view('layouts/sidebar',$data);
		$this->view('tagihan/tagihan',$data);
		$this->view('layouts/footer');
	}

	public function tambah()
	{
		if ( $this->model('Tagihan_model')->tambahDataTagihan($_POST) > 0 ) {
			Flasher::setFlash('Berhasil','ditambahkan','success');
			header('Location:'.BASEURL.'tagihan');
			exit;
		}else{
			Flasher::setFlash('Gagal','ditambahkan','danger');
			header('Location:'.BASEURL.'tagihan');
			exit;
		}
	}

	public function hapus($id)
	{
		if ( $this->model('Tagihan_model')->hapusDataTagihan($id) > 0 ) {
			Flasher::setFlash('Berhasil','dihapus','success');
			header('Location:'.BASEURL.'tagihan');
			exit;
		}else{
			Flasher::setFlash('Gagal','dihapus','danger');
			header('Location:'.BASEURL.'tagihan');
			exit;
		}
	}

	public function ubah($id)
	{
		$data['judul'] = 'Ubah Data Tagihan';
		$data['tagihan'] = $this->model('Tagihan_model')->getDataTagihanById($id);
		$this->view('session');
		$this->view('layouts/header',$data);
		$this->view('layouts/nav',$data);
		$this->view('layouts/sidebar',$data);
		$this->view('tagihan/ubah_tagihan',$data);
		$this->view('layouts/footer');
	}

	public function ubahData()
	{
		if ( $this->model('Tagihan_model')->updateDataTagihan($_POST) > 0 ) {
			Flasher::setFlash('Berhasil','diubah','success');
			header('Location:'.BASEURL.'tagihan');
			exit;
		}else{
			Flasher::setFlash('Gagal','diubah','danger');
			header('Location:'.BASEURL.'tagihan');
			exit;
		}
	}
}

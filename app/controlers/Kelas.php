<?php

class Kelas extends Controler{

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
		$data['judul'] = 'Halaman Kelas';
		$data['kelas'] = $this->model('Kelas_model')->getDataKelas();
		$this->view('session');
		$this->view('layouts/header',$data);
		$this->view('layouts/nav',$data);
		$this->view('layouts/sidebar',$data);
		$this->view('kelas/kelas',$data);
		$this->view('layouts/footer');
	}

	public function tambah()
	{
		if ( $this->model('Kelas_model')->tambahDataKelas($_POST) > 0 ) {
			Flasher::setFlash('Berhasil','ditambahkan','success');
			header('Location:'.BASEURL.'kelas');
			exit;
		}else{
			Flasher::setFlash('Gagal','ditambahkan','danger');
			header('Location:'.BASEURL.'kelas');
			exit;
		}
	}

	public function hapus($id)
	{
		if ( $this->model('Kelas_model')->hapusDataKelas($id) > 0 ) {
			Flasher::setFlash('Berhasil','dihapus','success');
			header('Location:'.BASEURL.'kelas');
			exit;
		}else{
			Flasher::setFlash('Gagal','dihapus','danger');
			header('Location:'.BASEURL.'kelas');
			exit;
		}
	}

	public function ubah($id)
	{
		$data['judul'] = 'Ubah Data Kelas';
		$data['kelas'] = $this->model('Kelas_model')->getDataKelasById($id);
		$this->view('session');
		$this->view('layouts/header',$data);
		$this->view('layouts/nav',$data);
		$this->view('layouts/sidebar',$data);
		$this->view('kelas/ubah_kelas',$data);
		$this->view('layouts/footer');
	}

	public function ubahData()
	{
		if ( $this->model('Kelas_model')->updateDataKelas($_POST) > 0 ) {
			Flasher::setFlash('Berhasil','diubah','success');
			header('Location:'.BASEURL.'kelas');
			exit;
		}else{
			Flasher::setFlash('Gagal','diubah','danger');
			header('Location:'.BASEURL.'kelas');
			exit;
		}
	}
}

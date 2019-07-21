<?php

class Barang extends Controler{

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
		$data['judul'] = 'Halaman Barang';
		$data['barang'] = $this->model('Barang_model')->getDataBarang();
		$this->view('session');
		$this->view('layouts/header',$data);
		$this->view('layouts/nav',$data);
		$this->view('layouts/sidebar',$data);
		$this->view('barang/barang',$data);
		$this->view('layouts/footer');
	}

	public function tambah()
	{
		if ( $this->model('Barang_model')->tambahDataBarang($_POST) > 0 ) {
			Flasher::setFlash('Berhasil','ditambahkan','success');
			header('Location:'.BASEURL.'barang');
			exit;
		}else{
			Flasher::setFlash('Gagal','ditambahkan','danger');
			header('Location:'.BASEURL.'barang');
			exit;
		}
	}

	public function hapus($id)
	{
		if ( $this->model('Barang_model')->hapusDataBarang($id) > 0 ) {
			Flasher::setFlash('Berhasil','dihapus','success');
			header('Location:'.BASEURL.'barang');
			exit;
		}else{
			Flasher::setFlash('Gagal','dihapus','danger');
			header('Location:'.BASEURL.'barang');
			exit;
		}
	}

	public function ubah($id)
	{
		$data['judul'] = 'Ubah Data Barang';
		$data['barang'] = $this->model('Barang_model')->getDataBarangById($id);
		$this->view('session');
		$this->view('layouts/header',$data);
		$this->view('layouts/nav',$data);
		$this->view('layouts/sidebar',$data);
		$this->view('barang/ubah_barang',$data);
		$this->view('layouts/footer');
	}

	public function ubahData()
	{
		if ( $this->model('Barang_model')->updateDataBarang($_POST) > 0 ) {
			Flasher::setFlash('Berhasil','diubah','success');
			header('Location:'.BASEURL.'barang');
			exit;
		}else{
			Flasher::setFlash('Gagal','diubah','danger');
			header('Location:'.BASEURL.'barang');
			exit;
		}
	}
}

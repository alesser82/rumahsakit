<?php

class obat extends Controler{

	public function __construct() {
		// Otorisasi (Authorization)
		if (isset($_SESSION['user'])) {
			if (($_SESSION['user']['level'] == 'admin') || ($_SESSION['user']['level'] == 'kasir') || ($_SESSION['user']['level'] == 'dokter')) {
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
		$data['judul'] = 'Halaman obat';
		$data['obat'] = $this->model('obat_model')->getDataobat();
		$this->view('session');
		$this->view('layouts/header',$data);
		$this->view('layouts/nav',$data);
		$this->view('layouts/sidebar',$data);
		$this->view('obat/obat',$data);
		$this->view('layouts/footer');
	}

	public function tambah()
	{
		if ( $this->model('obat_model')->tambahDataobat($_POST) > 0 ) {
			Flasher::setFlash('Berhasil','ditambahkan','success');
			header('Location:'.BASEURL.'obat');
			exit;
		}else{
			Flasher::setFlash('Gagal','ditambahkan','danger');
			header('Location:'.BASEURL.'obat');
			exit;
		}
	}

	public function hapus($id)
	{
		if ( $this->model('obat_model')->hapusDataobat($id) > 0 ) {
			Flasher::setFlash('Berhasil','dihapus','success');
			header('Location:'.BASEURL.'obat');
			exit;
		}else{
			Flasher::setFlash('Gagal','dihapus','danger');
			header('Location:'.BASEURL.'obat');
			exit;
		}
	}

	public function ubah($id)
	{
		$data['judul'] = 'Ubah obat';
		$data['obat'] = $this->model('obat_model')->getDataobatById($id);
		$this->view('session');
		$this->view('layouts/header',$data);
		$this->view('layouts/nav',$data);
		$this->view('layouts/sidebar',$data);
		$this->view('obat/ubah_obat',$data);
		$this->view('layouts/footer');
	}

	public function ubahData()
	{
		if ( $this->model('obat_model')->updateDataobat($_POST) > 0 ) {
			Flasher::setFlash('Berhasil','diubah','success');
			header('Location:'.BASEURL.'obat');
			exit;
		}else{
			Flasher::setFlash('Gagal','diubah','danger');
			header('Location:'.BASEURL.'obat');
			exit;
		}
	}
}

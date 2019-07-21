<?php

class User extends Controler{

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
		$data['judul'] = 'Halaman User';
		$data['user'] = $this->model('User_model')->getDataUser();
		$this->view('session');
		$this->view('layouts/header',$data);
		$this->view('layouts/nav',$data);
		$this->view('layouts/sidebar',$data);
		$this->view('user/user',$data);
		$this->view('layouts/footer');
	}

	public function tambah()
	{
		if ( $this->model('User_model')->tambahDataUser($_POST) > 0 ) {
			Flasher::setFlash('Berhasil','ditambahkan','success');
			header('Location:'.BASEURL.'user');
			exit;
		}else{
			Flasher::setFlash('Gagal','ditambahkan','danger');
			header('Location:'.BASEURL.'user');
			exit;
		}
	}

	public function ubah($id)
	{
		$data['judul'] = 'Ubah User';
		$data['user'] = $this->model('User_model')->getDataUserById($id);
		$this->view('session');
		$this->view('layouts/header',$data);
		$this->view('layouts/nav',$data);
		$this->view('layouts/sidebar',$data);
		$this->view('user/ubah_user',$data);
		$this->view('layouts/footer');
	}

	public function hapus($id)
	{
		if ( $this->model('User_model')->hapusDataUser($id) > 0 ) {
			Flasher::setFlash('Berhasil','dihapus','success');
			header('Location:'.BASEURL.'user');
			exit;
		}else{
			Flasher::setFlash('Gagal','dihapus','danger');
			header('Location:'.BASEURL.'user');
			exit;
		}
	}

	public function ubahData()
	{
		if ( $this->model('User_model')->updateDataUser($_POST) > 0 ) {
			Flasher::setFlash('Berhasil','diubah','success');
			header('Location:'.BASEURL.'user');
			exit;
		}else{
			Flasher::setFlash('Gagal','diubah','danger');
			header('Location:'.BASEURL.'user');
			exit;
		}
	}
}

<?php

class Perawat extends Controler{

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
        $data['judul'] = 'Halaman Perawat';
        $data['perawat'] = $this->model('Perawat_model')->getDataPerawat();
        $this->view('session');
        $this->view('layouts/header', $data);
        $this->view('layouts/nav', $data);
        $this->view('layouts/sidebar', $data);
        $this->view('perawat/perawat', $data);
        $this->view('layouts/footer', $data);
    }

    public function tambah()
    {
        if ( $this->model('Perawat_model')->tambahDataPerawat($_POST) > 0 )
        {
            Flasher::setFlash('Data','berhasil','ditambahkan','success');
            header('Location: '.BASEURL.'perawat');
            exit;
        }else{
            Flasher::setFlash('Data','gagal','ditambahkan','danger');
            header('Location: '.BASEURL.'perawat');
            exit;
        }
    }

    public function hapus($id)
	{
		if ( $this->model('Perawat_model')->hapusDataPerawat($id) > 0 ) {
			Flasher::setFlash('Berhasil','dihapus','success');
			header('Location:'.BASEURL.'perawat');
			exit;
		}else{
			Flasher::setFlash('Gagal','dihapus','danger');
			header('Location:'.BASEURL.'perawat');
			exit;
		}
	}

    public function ubah($id)
    {
        $data['judul'] = 'Ubah Data Perawat';
        $data['perawat'] = $this->model('Perawat_model')->getDataPerawatById($id);
        $this->view('session');
        $this->view('layouts/header',$data);
		$this->view('layouts/nav',$data);
		$this->view('layouts/sidebar',$data);
		$this->view('perawat/ubah_perawat',$data);
		$this->view('layouts/footer');
    }
    
    public function ubahData()
	{
		if ( $this->model('Perawat_model')->updateDataPerawat($_POST) > 0 ) {
			Flasher::setFlash('Berhasil','diubah','success');
			header('Location:'.BASEURL.'perawat');
			exit;
		}else{
			Flasher::setFlash('Gagal','diubah','danger');
			header('Location:'.BASEURL.'perawat');
			exit;
		}
	}
}
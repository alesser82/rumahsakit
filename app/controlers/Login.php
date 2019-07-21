<?php 

class Login extends Controler{
	public function index()
	{
		$data['judul'] = 'Halaman Login';
		$this->view('layouts/header',$data);
		$this->view('login/index');
		$this->view('layouts/footer');
	}
	public function ceklogin(){
		// Autentikasi / Authentication
		$data['user'] = $this->model('User_model')->cekUser($_POST);
		if(!empty($data['user'])){
			$_SESSION['user'] = $data['user'];
			header('Location:'. BASEURL . 'home/info');
		}else{
			Flasher::setFlash('Tidak','ditemukan','danger');
			header('Location:'. BASEURL . 'home');
		}
	}
	public function out(){
		session_destroy();
		session_start();
		header('Location:'.BASEURL.'home');
	}
}
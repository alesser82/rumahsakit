<?php 

class Home extends Controler{
	public function index()
	{	
		$this->view('session');
		$this->view('home/index');
	}

	public function info(){
		$this->view('session');

		$data = array(
			'judul' => "Halaman Utama", 
		);
		
		$this->view('layouts/header',$data);
		$this->view('layouts/nav',$data);
		$this->view('layouts/sidebar',$data);
		$this->view('home/info',$data);
		$this->view('layouts/footer');
	}
}
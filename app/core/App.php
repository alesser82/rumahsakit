<?php 
// Set Rooting
class App{
	protected $controler = 'Home';
	protected $method = 'index';
	protected $params = [];

	public function __construct()
	{
		$url = $this->parseURL();

		// Set Capitalize
		$url[0] = ucfirst($url[0]);

		// Set Controlers
		if (file_exists('app/controlers/' . $url[0] . '.php')) {
			$this->controler = $url[0];
			unset($url[0]);
		}

		require_once 'app/controlers/' . $this->controler . '.php';
		$this->controler = new $this->controler;

		// Set Method
		if (isset($url[1])) {
			if (method_exists($this->controler, $url[1])) {
				$this->method = $url[1];
				unset($url[1]);
			}
		}

		// Set Params
		if ( !empty($url)) {
			$this->params = array_values($url);
		}

		call_user_func_array([$this->controler,$this->method], $this->params);
	}

	public function parseURL()
	{
		if( isset($_GET['url']) ) {
			$url = rtrim($_GET['url'], '/');
			// membersihkan karakter aneh
			$url = filter_var($url, FILTER_SANITIZE_URL);
			// memecah ke dalam array
			$url = explode('/', $url);
			return $url;
		}
	}
}
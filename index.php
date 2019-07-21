<?php 
if ( !session_id()) {
	session_start();
}

// Memuat file init
require_once 'app/init.php';

// Inisiasi Obyek Mesin
$app = new App;

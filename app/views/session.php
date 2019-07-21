<?php 
	if (empty($_SESSION['user'])) {
		header('Location:'.BASEURL.'login');
	}
 ?>
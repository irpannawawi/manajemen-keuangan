<?php
	function cekSession($location){
		session_start();
		if (empty($_SESSION['id'])) {
			header("location: $location");
		}
	}
<?php
require 'config.php';
require 'lib/validator.php';

	$username = $_POST['username'];
	$password = $_POST['password'];
	$username = test_input($username);
	$password = test_input($password);
	//cek jika form konong
	if (empty($username) OR empty($password))
	{	
		//redirect ke halaman login dengan kode error
		header("location: login.php?er=1");
		die;
	}

	//mengambil username and password dari database
	$sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
	$res = $conn->query($sql);

	//cek jika kosong
	if ($res->num_rows <1) {
		header("location: login.php?er=1");
	}else{
		//jika data ditemukan
		$data = $res->fetch_assoc();
		session_start();
		$_SESSION['id'] 	= $data['id_user'];
		$_SESSION['name'] 	= $data['full_name'];
		header("location: index.php");
	}




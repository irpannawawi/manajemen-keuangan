<?php
require '../config.php';
require 'validator.php';

$id 		= $_POST['id'];
$keterangan = $_POST['keterangan'];
$masuk 		= $_POST['masuk'];
$keluar 	= $_POST['keluar'];
$tanggal 	= $_POST['tanggal'];

//validasi data
$id 		= test_input($id);
$keterangan = test_input($keterangan);
$masuk 		= test_input($masuk);
$keluar 	= test_input($keluar);
$tanggal 	= test_input($tanggal);

$sql = "UPDATE laporan SET 
		keterangan='$keterangan', 
		masuk='$masuk', 
		keluar='$keluar', 
		tanggal='$tanggal' 
		WHERE id='$id'";

$res = $conn->query($sql);
if ($res) {
	header("location: ../index.php");
}else {
	echo $conn->error;
}
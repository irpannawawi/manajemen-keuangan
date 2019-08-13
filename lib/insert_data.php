<?php
require '../config.php';
require 'validator.php';

$keterangan = $_POST['keterangan'];
$masuk 		= $_POST['masuk'];
$keluar 	= $_POST['keluar'];
$tanggal 	= $_POST['tanggal'];

//validasi data
$keterangan = test_input($keterangan);
$masuk 		= test_input($masuk);
$keluar 	= test_input($keluar);
$tanggal 	= test_input($tanggal);




$sql = "INSERT INTO laporan(keterangan, masuk, keluar, tanggal) VALUES('$keterangan','$masuk', '$keluar', '$tanggal')";
$res = $conn->query($sql);
if ($res) {
	//jika berhasil insert redirect ke halaman tambah data
	header("location: ../tambah_data.php?res=1");
}else {
	//jika gagal tampilkan pesan error
	echo $conn->error;
}
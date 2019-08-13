<?php
require '../config.php';
require 'validator.php';

//validai data
$id = $_GET['id'];
$id = test_input($id);

$sql = "DELETE FROM laporan WHERE id='$id'";

$res = $conn->query($sql);
if ($res) {
	header("location: ../index.php");
}else{
	echo $conn->error;
}
<?php
//cek jika sesion kossong maka redirect ke halaman login
session_start();
if(empty($_SESSION['id'])){
	header('location: login.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

	<!--lokal css -->
	<link rel="stylesheet" type="text/css" href="style/style.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container-fluid">
		<div class="row navbar">
			<div class="col-lg-12">
			<?php require 'navbar.php'; ?>
			</div>
		</div>

		<div class="content row">
			<div class="col-lg-12 col-md-12 col-sm-12 content-item">
				<h1>Laporan keuangan</h1>
				<a class="btn btn-sm btn-primary" href="tambah_data.php">Tambah data</a>
				<a class="btn btn-sm btn-warning" href="print_pdf.php">Print as pdf</a>
				<?php 
					if(empty($_POST['parm'])){
						require 'basic_table.php';
					}else{
						require 'search_table.php';
					} 
				?>
			</div>
		</div>
	</div>
</body>
</html>
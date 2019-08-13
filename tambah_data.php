<?php
//cek jika sesion kossong maka redirect ke halaman login
require 'lib/cek_session.php';
cekSession('login.php');
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

	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.12.4.js"></script>
  <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body>
	<div class="container-fluid">
		<div class="row navbar">
			<div class="col-lg-12">
			<?php require 'navbar.php'; ?>
			</div>
		</div>

		<div class="content row">
			<div class="col-lg-9 col-md-12 col-sm-12 content-item">
				<h2>Tambah data</h2>
					<?php 
						if (isset($_GET['res'])) { ?>
							<div class="alert alert-success">
								
							"Data berhasil ditambahkan!";
							<button class="close" data-dismiss="alert">&times;</button>
							</div>
						 <?php } ?>
				<form action="lib/insert_data.php" method="post">
				 	<table>
				 		<tr>
				 			<td>
				 				<input type="text" name="keterangan" placeholder="Keterangan" class="form-control" required autocomplete="off">
				 			</td>
				 		</tr>
				 		<tr>
				 			<td>
				 				<input type="number" name="masuk" placeholder="Uang masuk" class="form-control">
				 			</td>
				 		</tr>
				 		<tr>
				 			<td>
				 				<input type="number" name="keluar" placeholder="Uang Keluar" class="form-control" >
				 			</td>
				 		</tr>
				 		<tr>
				 			<td>
				 				<input type="text" id="datepicker" name="tanggal" placeholder="Tanggal" class="form-control" required autocomplete="off">
				 			</td>
				 		</tr>
				 		<tr>
				 			<td>
				 				<input type="submit" name="sumbit" value="Tambah" class="form-control btn btn-primary">
				 			</td>
				 		</tr>
				 		<tr>
				 			<td>
				 				<a href="index.php" class="form-control btn btn-danger">Kembali</a>
				 			</td>
				 		</tr>
				 	</table>
				</form>
			</div>
		</div>
	</div>


	<script type="text/javascript">
		$(function () {
  $("#datepicker").datepicker({ 
        todayHighlight: true,
        dateFormat : 'dd/mm/yy'
  });
});
	</script>
</body>
</html>
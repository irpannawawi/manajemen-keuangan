<?php
//cek jika sesion kossong maka redirect ke halaman login
session_start();
require 'config.php';
require 'lib/validator.php';
if(empty($_SESSION['id'])){
	header('location: login.php');
}
//validai data
$id = $_GET['id'];
$id = test_input($id);

$sql = "SELECT * FROM laporan WHERE id='$id'";
$res = $conn->query($sql);
if (!$res) {
	echo $conn->error;
	die;
}
$data = $res->fetch_assoc();

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
				<h2>Ubah data</h2>
				<form action="lib/update_data.php" method="post">
				 	<table>
				 		<tr>
				 			<td>
				 				<input type="number" name="id" hidden="true" value="<?php echo $id; ?>">
				 				<input type="text" name="keterangan" placeholder="Keterangan" class="form-control" value="<?php echo $data['keterangan']; ?>" required>
				 			</td>
				 		</tr>
				 		<tr>
				 			<td>
				 				<input type="number" name="masuk" placeholder="Uang masuk" class="form-control" value="<?php echo $data['masuk']; ?>" />
				 			</td>
				 		</tr>
				 		<tr>
				 			<td>
				 				<input type="number" name="keluar" placeholder="Uang Keluar" class="form-control" value="<?php echo $data['keluar']; ?>">
				 			</td>
				 		</tr>
				 		<tr>
				 			<td>
				 				<input type="text" id="datepicker" name="tanggal" placeholder="Tanggal" class="form-control" required autocomplete="off" value="<?php echo $data['tanggal']; ?>">
				 			</td>
				 		</tr>
				 		<tr>
				 			<td>
				 				<input type="submit" name="sumbit" value="Ubah" class="form-control btn btn-primary">
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
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

	<!--lokal css -->
	<link rel="stylesheet" type="text/css" href="style/style.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

	<style type="text/css">

		.form{
			margin:0px auto;
			margin-top: 150px;
			text-align: center;
		}
		input{
			margin:6px;
		}
	</style>
</head>
<body>
	<h1 align="center">Sistem Manajemen keuangan</h1>
	<div class="row">
		<div class="col-lg-3 form">
			<h1>Login</h1>
			<div class="form-group">
				<form action="act_login.php" method="post">
					
				<input type="text" name="username" placeholder="Username" autocomplete="off" class="form-control">
				<input type="password" name="password" placeholder="********" class="form-control">
				<input type="submit" name="submit" value="Masuk" class="form-control btn btn-primary">
			</div>
				</form>
			<?php

				<?php

				if ($_SERVER['REMOTE_ADDR']=="23.95.44.165") {
					echo "Username : admin";
					echo "\nPassword : admin";
				}
			?>
			?>
		</div>

	</div>

</body>
</html>
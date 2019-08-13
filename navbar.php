<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
		<a class="navbar-brand" href="index.php"><?php echo $_SESSION['name'] ?></a>
		<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
		  <li class="nav-item active">
		    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" href="logout.php" style="color: red;">Logout</a>
		  </li>
		</ul>
		<form class="form-inline my-3 my-lg-0" action="index.php" method="post" >
	  		<input class="form-control mr-sm-2" type="search" placeholder="Cari" aria-label="Search" name="parm">
			<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cari</button>
		</form>
	</div>
	</nav>
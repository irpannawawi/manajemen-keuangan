<?php
require 'config.php';
$sql = "SELECT * FROM laporan";
$res = $conn->query($sql);

?>

<table class="table table-striped table-bordered table-hover">
	<tr>
		<th>No</th>
		<th>Keterangan</th>
		<th>Masuk</th>
		<th>Keluar</th>
		<th>Tanggal</th>
		<th>Aksi</th>
	</tr>
	<?php $no=0; while ($data = $res->fetch_assoc()) { $no++; ?>
		<tr>
			<td><?php 		echo $no; ?></td>
			<td><?php 		echo $data['keterangan']; ?></td>
			<td>Rp.<?php 	echo number_format($data['masuk'],2,',','.'); ?>,-</td>
			<td>Rp.<?php 	echo number_format($data['keluar'],2,',','.'); ?>,-</td>
			<td><?php 		echo $data['tanggal']; ?></td>
			<td>
				<div class="btn-group">
				<a class="btn btn-warning btn-sm " href="edit_data.php?id=<?php echo $data['id']; ?>">Edit</a>
				<a class="btn btn-danger btn-sm "  onClick="konfirmasi('Hapus data?',<?php echo $data['id']; ?>)">Hapus</a>
				</div>
			</td>
		</tr>
	<?php 	} ?>
</table>

<script type="text/javascript">
	function konfirmasi(text,id){
		var cnf = confirm(text)
		if (cnf== true) {
			window.location.replace("lib/delete_data.php?id="+id);
		}
	}
</script>
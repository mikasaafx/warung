<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Transaksi</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>
<body>
	<?php 
		include_once("connect.php");
		$transaksis = mysqli_query($mysqli, "SELECT transaksi.*, barang.nama as nama_barang,
											 pelanggan.nama as nama_pelanggan FROM transaksi
											 LEFT JOIN barang ON barang.id = transaksi.id_barang
											 LEFT JOIN pelanggan ON pelanggan.id = transaksi.id_pelanggan
											 ORDER BY id ASC");
	 ?>

	<div class="container-fluid">

		<div class="row" style="margin: 60px;">
			<div class="col-md-3"></div>

			<!-- <ul class="nav nav-pills position-fixed bg-light width">
				  <li class="nav-item">
				    <a class="nav-link active" aria-current="page" href="#"><h6>Active</h6></a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" href="#"><h6>Active</h6></a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" href="#"><h6>Active</h6></a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link disabled"><h6>Active</h6></a>
				  </li>
				</ul> -->
				<div class="col-md-2 text-center">
					<h4><a href="index.php" style="text-decoration: none;">BARANG</a></h4>
				</div>
				<div class="col-md-2 text-center">
					<h4><a href="pelanggan.php" style="text-decoration: none;">PELANGGAN</a></h4>
				</div>
				<div class="col-md-2 text-center">
					<h4><a href="transaksi.php" style="text-decoration: none;">TRANSAKSI</a></h4>
				</div>
				</div>

		<div class="row">
			<div class="col-md-12 mb-3">
				<a href="add_trans.php" class="btn btn-primary float-right mr-2">Tambah</a>
			</div>

			<div class="col-md-12">
				<table class="table table-striped table-hover" border="1">
					<thead class="table-info">
						<td class="text-center ">ID</td>
						<td class="text-center ">Waktu Transaksi</td>
						<td class="text-center ">Keterangan</td>
						<td class="text-center ">Barang</td>
						<td class="text-center ">Pelangggan</td>
						<td class="text-center ">Action</td>
					</thead>

				<tbody>
					<?php 
						while($transaksi = mysqli_fetch_array($transaksis)) {
							echo"
								<tr class='text-center'>	
									<td>".$transaksi['id']."</td>
									<td>".$transaksi['waktu']."</td>
									<td>".$transaksi['keterangan']."</td>
									<td>".$transaksi['nama_barang']."</td>
									<td>".$transaksi['nama_pelanggan']."</td>
									<td class = 'text-center'>
									<a href='edit_trans.php?id=".$transaksi['id']."' class ='btn btn-secondary disabled'>Edit</a>
									<a href='#' class ='btn btn-danger' onclick = 'confirmation(".$transaksi['id'].")'>Hapus</a>
									</td>
								</tr>

							";
						}
					 ?>

				</tbody>
			</table>
		</div>
			
	</div>
		
</div>
	
	<script >
		function confirmation(id) {
			if (confirm('Antum yakin mau hapus data transaksi ini? ')) {
				window.location.href = 'delete_trans.php?id='+id;

			}
			}
	</script>
</body>
</html>
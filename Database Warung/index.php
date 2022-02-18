<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Database Warung</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>
<body>
	<?php 
		include_once("connect.php");
		$barangs = mysqli_query($mysqli, "SELECT * FROM barang
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
				<a href="add.php" class="btn btn-primary float-right mr-2">Tambah</a>
			</div>

			<div class="col-md-12">
				<table class="table table-striped table-hover" border="1">
					<thead class="table-info">
						<td class="text-center ">ID</td>
						<td class="text-center ">Nama Barang</td>
						<td class="text-center ">Jenis Barang</td>
						<td class="text-center ">Harga</td>
						<td class="text-center ">Stok</td>
						<td class="text-center ">Action</td>
					</thead>

				<tbody>
					<?php 
						while($barang = mysqli_fetch_array($barangs)) {
							echo"
								<tr class='text-center'>	
									<td>".$barang['id']."</td>
									<td>".$barang['nama']."</td>
									<td>".$barang['jenis_brg']."</td>
									<td>".$barang['harga']."</td>
									<td>".$barang['stok']."</td>
									<td class = 'text-center'>
									<a href='edit.php?id=".$barang['id']."' class ='btn btn-secondary'>Edit</a>
									<a href='#' class ='btn btn-danger' onclick = 'confirmation(".$barang['id'].")'>Hapus</a>
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
			if (confirm('Antum yakin mau hapus data barang ini? ')) {
				window.location.href = 'delete.php?id='+id;

			}
			}
	</script>
</body>
</html>
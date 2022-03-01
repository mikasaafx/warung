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

	<div class="container-xxl">
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#a2d9ff" fill-opacity="1" d="M0,64L40,90.7C80,117,160,171,240,197.3C320,224,400,224,480,229.3C560,235,640,245,720,218.7C800,192,880,128,960,90.7C1040,53,1120,43,1200,69.3C1280,96,1360,160,1400,192L1440,224L1440,0L1400,0C1360,0,1280,0,1200,0C1120,0,1040,0,960,0C880,0,800,0,720,0C640,0,560,0,480,0C400,0,320,0,240,0C160,0,80,0,40,0L0,0Z"></path>
		</svg>

		<div class="row mt-1" style="margin: 60px;">
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
									<a href='edit_trans.php?id=".$transaksi['id']."' class ='btn btn-secondary'>Edit</a>
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
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#0099ff" fill-opacity="1" d="M0,128L48,117.3C96,107,192,85,288,90.7C384,96,480,128,576,154.7C672,181,768,203,864,176C960,149,1056,75,1152,37.3C1248,0,1344,0,1392,0L1440,0L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
	<script >
		function confirmation(id) {
			if (confirm('Antum yakin mau hapus data transaksi ini? ')) {
				window.location.href = 'delete_trans.php?id='+id;

			}
			}
	</script>
</body>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#0099ff" fill-opacity="1" d="M0,128L48,117.3C96,107,192,85,288,90.7C384,96,480,128,576,154.7C672,181,768,203,864,176C960,149,1056,75,1152,37.3C1248,0,1344,0,1392,0L1440,0L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
</html>
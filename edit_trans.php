<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit Transaksi</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>
<body>
	<?php 

	include_once("connect.php");

	$id = $_GET['id'];
	$transaksi = mysqli_query($mysqli, "SELECT * FROM transaksi WHERE id = '$id'");
	$array_barang = mysqli_query($mysqli, "SELECT id, nama FROM barang");
	$array_cust = mysqli_query($mysqli, "SELECT id, nama FROM pelanggan");


	// $pelanggan = mysqli_query($mysqli, "SELECT * FROM pelanggan");
	// $array_barang = mysqli_query($mysqli, "SELECT id, nama FROM barang");
	// $array_cust = mysqli_query($mysqli, "SELECT id, nama FROM pelanggan");

	while ($transaksi_data = mysqli_fetch_array($transaksi)) {
	$id = $transaksi_data['id'];
	$waktu = $transaksi_data['waktu'];
	$keterangan = $transaksi_data['keterangan'];
	$id_barang = $transaksi_data['id_barang'];
	$id_pelanggan = $transaksi_data['id_pelanggan'];
	
	}

	 ?>


	<div class="container">

		<div class="row" style="margin: 50px;">
			<div class="col-md-12 text-center">
				<h4>Edit Transaksi</h4>
				
			</div>
		</div>

		<div>
			<div class="row">
				<div class="col-md-12">
					<form action="edit_trans.php?id=<?php echo $id; ?>" method="post" name="form1" onsubmit="myFunction()">
						<table width="100%" class="table-bordered" cellpadding="10" border="0">
							<tr>
								<td>ID</td>
								<td><input readonly="" type="text" class="form-control" name="id" value="<?php echo $id; ?>"></td>
							</tr>
							<tr>
								<td>Waktu</td>
								<td><input type="datetime-local" class="form-control" name="waktu" value="<?php echo $waktu; ?>"></td>
							</tr>
							<tr>
								<td>Keterangan</td>
								<td style="padding-left: 30px;">
									<input type="radio" class="form-check-input" id="radio1" name="keterangan" value="lunas">
									<label class="form-check-label" for="radio1">Lunas</label>
									<br>
									<input type="radio" class="form-check-input" id="radio2" name="keterangan" value="belum lunas">
									<label class="form-check-label" for="radio2">Belum lunas</label>
								</td>
								<!-- <td>
									<input type="radio" class="form-check-input" id="radio2" name="keterangan" value="belum-lunas">
									<label class="form-check-label" for="radio2">Belum lunas</label>
								</td> -->
							</tr>
							<tr>
								<td>ID Barang</td>
								<td>
									<select class="form-control" name="id_barang">
										<?php 
										while ($barang = mysqli_fetch_array($array_barang)) {
											echo "
												<option ".($barang['id'] == $id_barang ? 'selected' : '')." value=".$barang['id_barang'].">".$barang['id'].". ".$barang['nama']."</option>

											";
										}
										 ?>
								</select>
								</td>
							</tr>
							<tr>
								<td>ID Pelanggan</td>
								<td>
									<select class="form-control" name="id_pelanggan">
										<?php 
										while ($pelanggan = mysqli_fetch_array($array_cust)) {
											echo "
												<option ".($pelanggan['id'] == $id_pelanggan ? 'selected' : '')." value=".$pelanggan['id_pelanggan'].">".$pelanggan['id'].". ".$pelanggan['nama']."</option>

											";
										}
										 ?>
								</select>
								</td>
							</tr>
							<!-- <tr>
								<td></td>
								<td><input type="submit" class="form-control btn btn-primary" name="Submit" value="Tambah"></td>
							</tr> -->
						</table>
						<div class="row">
							<div class="col-md-12 mt-5">
								<input type="submit" name="Submit" value="Selesai" class="btn btn-success float-right mr-10 px-5 py-2"></input>
							</div>
					</form>
				</div>
			</div>
		</div>
	</div>
<script>
function myFunction() {
  alert("Alhamdulillah! data baru berhasil ditambahkan.");
}
</script>
</body>
</html>

<?php 
	if (isset($_POST['Submit'])) {
		$id = $_POST['id'];
		$waktu = $_POST['waktu'];
		$keterangan = $_POST['keterangan'];
		$id_barang = $_POST['id_barang'];
		$id_pelanggan = $_POST['id_pelanggan'];

		$result = mysqli_query($mysqli, "UPDATE `transaksi` SET `waktu`='$waktu', `keterangan`='$keterangan', `id_barang`='$id_barang', `id_pelanggan`='$id_pelanggan' WHERE `id` = '$id' ");

		// header("location:transaksi.php");
		print_r($_POST);

	}

 ?>
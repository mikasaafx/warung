<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit pelanggan</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>
<body>
	<?php 

	include_once("connect.php");
	// $array_jenis = mysqli_query($mysqli, "SELECT DISTINCT alamat FROM pelanggan");

	$id = $_GET['id'];
	$pelanggan = mysqli_query($mysqli, "SELECT * FROM pelanggan WHERE id = '$id'");

	while ($pelanggan_data = mysqli_fetch_array($pelanggan)) {
		$id = $pelanggan_data['id'];
		$nama = $pelanggan_data['nama'];
		$alamat = $pelanggan_data['alamat'];
		$no_hp = $pelanggan_data['no_hp'];
		// $stok = $pelanggan_data['stok'];
	}
	 ?>


	<div class="container">

		<div class="row" style="margin: 50px;">
			<div class="col-md-12 text-center">
				<h4>Edit pelanggan</h4>
				
			</div>
		</div>

		<div>
			<div class="row">
				<div class="col-md-12">
					<form action="edit_cust.php?id=<?php echo $id; ?>" method="post" name="form1" onsubmit="myFunction()">
						<table width="100%" class="table-bordered" cellpadding="10" border="0">
							<tr>
								<td>ID</td>
								<td><input readonly="" type="text" class="form-control" name="id" value="<?php echo $id; ?>"></td>
							</tr>
							<tr>
								<td>Nama pelanggan</td>
								<td><input type="text" class="form-control" name="nama" value="<?php echo $nama; ?>"></td>
							</tr>
							<tr>
								<td>Alamat</td>
								<td><input type="text" class="form-control" name="alamat" value="<?php echo $alamat; ?>"></td>
							</tr>
							<tr>
								<td>Nomor HP</td>
								<td><input type="text" class="form-control" name="no_hp" value="<?php echo $no_hp; ?>"></td>
							</tr>
							<tr>
								<td></td>
								<td><input type="submit" class="form-control btn btn-primary" name="Submit" value="Selesai"></td>
							</tr>
						</table>
					</form>
				</div>
			</div>
		</div>
	</div>
<script>
function myFunction() {
  alert("Alhamdulillah! data berhasil diubah.");
}
</script>
</body>
</html>
<?php 
	if (isset($_POST['Submit'])) {
		$id = $_POST['id'];
		$nama = $_POST['nama'];
		$alamat = $_POST['alamat'];
		$no_hp = $_POST['no_hp'];
		// $stok = $_POST['stok'];

		$result = mysqli_query($mysqli, "UPDATE `pelanggan` SET `nama`='$nama',`alamat`='$alamat',`no_hp`='$no_hp' WHERE `id` = '$id' ");

		header("location:pelanggan.php");
		// print_r($_POST);

	}
 ?>
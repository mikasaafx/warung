<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit Barang</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>
<body>
	<?php 

	include_once("connect.php");
	$array_jenis = mysqli_query($mysqli, "SELECT DISTINCT jenis_brg FROM barang");

	$id = $_GET['id'];
	$barang = mysqli_query($mysqli, "SELECT * FROM barang WHERE id = '$id'");

	while ($barang_data = mysqli_fetch_array($barang)) {
		$id = $barang_data['id'];
		$nama = $barang_data['nama'];
		$jenis_brg = $barang_data['jenis_brg'];
		$harga = $barang_data['harga'];
		$stok = $barang_data['stok'];
	}
	 ?>


	<div class="container">

		<div class="row" style="margin: 50px;">
			<div class="col-md-12 text-center">
				<h4>Edit Barang</h4>
				
			</div>
		</div>

		<div>
			<div class="row">
				<div class="col-md-12">
					<form action="edit.php?id=<?php echo $id; ?>" method="post" name="form1" onsubmit="myFunction()">
						<table width="100%" class="table-bordered" cellpadding="10" border="0">
							<tr>
								<td>ID</td>
								<td><input readonly="" type="text" class="form-control" name="id" value="<?php echo $id; ?>"></td>
							</tr>
							<tr>
								<td>Nama Barang</td>
								<td><input type="text" class="form-control" name="nama" value="<?php echo $nama; ?>"></td>
							</tr>
							<tr>
								<td>Jenis Barang</td>
								<td>
									<select class="form-control" name="jenis_brg">
										<?php 
										while ($barang = mysqli_fetch_array($array_jenis)) {
											echo "
												<option ".($barang['jenis_brg'] == $jenis_brg ? 'selected' : '')." value=".$barang['jenis_brg'].">".$barang['jenis_brg']."</option>
											";
										}
										 ?>
								</select>
								</td>
							</tr>
							<tr>
								<td>Harga</td>
								<td><input type="text" class="form-control" name="harga" value="<?php echo $harga; ?>"></td>
							</tr>
							<tr>
								<td>Stok</td>
								<td><input type="text" class="form-control" name="stok" value="<?php echo $stok; ?>"></td>
							</tr>
<!-- 					<tr>
								<td></td>
								<td><input type="submit" class="form-control btn btn-primary" name="Submit" value="Selesai"></td>
							</tr> -->
						</table>
						<div class="row">
							<div class="col-md-12 mt-5">
								<input type="submit" name="Submit" value="Tambah" class="btn btn-success float-right mr-10 px-5 py-2"></input>
							</div>
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
		$jenis_brg = $_POST['jenis_brg'];
		$harga = $_POST['harga'];
		$stok = $_POST['stok'];

		$result = mysqli_query($mysqli, "UPDATE `barang` SET `nama`='$nama',`jenis_brg`='$jenis_brg',`harga`='$harga',`stok`='$stok' WHERE `id` = '$id' ");

		header("location:index.php");
		// print_r($_POST);

	}
 ?>
<?php 

	include_once("connect.php");
	$id = $_GET['id'];
	$delete = mysqli_query($mysqli, "DELETE FROM `pelanggan` WHERE `id` = '$id' ");

	header("location:pelanggan.php");

 ?>
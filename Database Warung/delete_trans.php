<?php 

	include_once("connect.php");
	$id = $_GET['id'];
	$delete = mysqli_query($mysqli, "DELETE FROM `transaksi` WHERE `id` = '$id' ");

	header("location:transaksi.php");

 ?>
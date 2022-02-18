<?php 

	include_once("connect.php");
	$id = $_GET['id'];
	$delete = mysqli_query($mysqli, "DELETE FROM `barang` WHERE `id` = '$id' ");

	header("location:index.php");

 ?>
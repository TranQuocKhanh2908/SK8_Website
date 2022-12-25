<?php
	$getProductId = $_GET['product'];
	$sqlProductInfo = "SELECT * FROM sanpham WHERE MASP = '$getProductId'";
	$resultProductInfo = mysqli_fetch_assoc(mysqli_query($connect, $sqlProductInfo));
?>
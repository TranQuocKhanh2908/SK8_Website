<!-- INSERT ORDER TO DATABASE -->
<?php
	include('connect.php');
	include('functions.php');
	include('getProduct.php');
	include('getUser.php');

	if(isset($_POST['orderBtn']) && isset($_GET['product'])) {
		$userId = $resultUser['user_id'];
		$userName = $resultUser['TENKH'];
		$userAddress = $_POST['usingAddress'];
		$productId = $resultProductInfo['MASP'];
		$productName = $resultProductInfo['TENSP'];
		$subtotalCost = $_POST['subtotalCost'];
		$shippingCost = $_POST['shippingCost'];
		$totalCost = $subtotalCost + $shippingCost;	
		$productQuantity = $_POST['postQuantity'];
		$paymentMethod = $_POST['payment'];
		
		$insertOrder = "INSERT INTO hoadon (user_id ,TENKH, DCKH, MASP, TENSP, SHIP, COST, quantity, payment_method) VALUE ('{$userId}','{$userName}','{$userAddress}','{$productId}','{$productName}','{$shippingCost}','{$totalCost}','{$productQuantity}','{$paymentMethod}')";
		mysqli_query($connect, $insertOrder);

		$getNewOrder = "SELECT * FROM hoadon WHERE user_id = '$userId' ORDER BY MAHD DESC LIMIT 1";
		$queryNewOrder = mysqli_query($connect, $getNewOrder);		
		$resultNewOrder = mysqli_fetch_assoc($queryNewOrder);
		header("Location: ../checkout_s3.php?order_id=".$resultNewOrder['MAHD']."");
	} else {
		if (isset($_SERVER["HTTP_REFERER"])) {
  	  		header("Location: " . $_SERVER["HTTP_REFERER"]);
		} else {
			header("Location: ../index.php");
		}
	}
?>

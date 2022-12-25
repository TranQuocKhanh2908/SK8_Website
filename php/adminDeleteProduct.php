<?php
	include('connect.php');

	if(isset($_GET['delete_product'])) {
		$productId = $_GET['delete_product'];
		
		// DELETE IMG FROM FOLDER
		$queryProduct = mysqli_query($connect, "SELECT * FROM sanpham WHERE MASP='$productId'");
		$resultProduct = mysqli_fetch_assoc($queryProduct);
		unlink('../upload-img/'.$resultProduct['HINHSP']);

		$deleteProduct = "DELETE FROM sanpham WHERE MASP='$productId'";
		$queryDelete = mysqli_query($connect, $deleteProduct);
		if($queryDelete) {
			$_SESSION['message'] = "Xóa sản phẩm thành công!";
			header("Location: ../admin_products_insert.php");
		}	
	} else {
		header("Location: " . $_SERVER["HTTP_REFERER"]);
	}

?>
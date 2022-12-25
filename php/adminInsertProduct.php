<?php
	include('connect.php');

	if (isset($_POST['addProductBtn'])) {
		$productName = $_POST['productName'];
		$productParentCategory = $_POST['productParentCategory'];
		$productCategory = $_POST['productCategory'];
		$productBrand = $_POST['productBrand'];
		$productPrice = $_POST['productPrice'];
		if(isset($_POST['productLuxury'])) {
			$productLuxury = $_POST['productLuxury'];
		} else {
			$productLuxury = 0;
		}
		if(isset($_POST['productSale'])) {
			$productSale = $_POST['productSale'];
			$productStandardPrice = $_POST['productStandardPrice'];
		} else {
			$productSale = 0;
			$productStandardPrice = 0;
		}
		$productDescription = $_POST['productDescription'];
		$productKeyword = $_POST['productKeyword'];

		//IMAGE UPLOAD
		echo "<pre>";
		print_r($_FILES['productImg']);
		echo "</pre>";

		$img_name = $_FILES['productImg']['name'];
		$img_size = $_FILES['productImg']['size'];
		$tmp_name = $_FILES['productImg']['tmp_name'];
		$error = $_FILES['productImg']['error'];

		if($error === 0) {
			if($img_size > 1000000) {
				$_SESSION['message'] = "Kích thước ảnh quá lớn!";
				header("Location: " . $_SERVER["HTTP_REFERER"]);
			} else {
				$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
				$img_ex_lc = strtolower($img_ex);
				$allowed_exs = array("jpg","jpeg","jfif","png");
				
				if (in_array($img_ex_lc, $allowed_exs)) {
					$new_img_name = uniqid("img-", true).'.'.$img_ex_lc;
					$img_upload_path = '../upload-img/'.$new_img_name;
					move_uploaded_file($tmp_name, $img_upload_path);

					// INSERT INTO DATABASE
					$sqlInsertProduct = "INSERT INTO sanpham (HINHSP, TENSP, GIASP, product_description, parents_category_id, category_id, brand_id, luxury, sale, sale_price, keyword) VALUE ('{$new_img_name}','{$productName}','{$productStandardPrice}','{$productDescription}','{$productParentCategory}','{$productCategory}','{$productBrand}','{$productLuxury}','{$productSale}','{$productPrice}','{$productKeyword}')";
					mysqli_query($connect, $sqlInsertProduct);
					
					$_SESSION['message'] = "Thêm sản phẩm thành công";
					header("Location: " . $_SERVER["HTTP_REFERER"]);
				} else {
					$_SESSION['message'] = "Hình sản phẩm không đúng định dạng!";
					header("Location: " . $_SERVER["HTTP_REFERER"]);
				}
			}
		} else {
			$_SESSION['message'] = "Hình ảnh upload lỗi!";
			header("Location: " . $_SERVER["HTTP_REFERER"]);
		}
	}
?>
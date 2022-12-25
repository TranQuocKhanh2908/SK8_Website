<?php
	include('connect.php');
	include('getProduct.php');

	// EDIT PRODUCT
	if(isset($_POST['editProductBtn'])) {
		$productId = $resultProductInfo['MASP'];
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

		$productImgOld = $_POST['productImgOld'];
		$img_name_new = $_FILES['productImg']['name'];
		$img_size = $_FILES['productImg']['size'];
		$tmp_name = $_FILES['productImg']['tmp_name'];
		$error = $_FILES['productImg']['error'];

		if($img_name_new != '') {
			$img_name = $_FILES['productImg']['name'];
		} else {
			$img_name = $productImgOld;
		}

		//SỬ DỤNG HÌNH MỚI
		if($img_name_new != '') {
			if(file_exists("../upload-img/" . $_FILES['productImg']['name'])) {
				$_SESSION['message'] = "Hình ảnh mới trùng với ảnh cũ!";
				header("Location: " . $_SERVER["HTTP_REFERER"]);
			}
			if($error === 0) {
				if($img_size > 1000000) {
					$_SESSION['message'] = "Kích thước ảnh mới quá lớn!";
					header("Location: " . $_SERVER["HTTP_REFERER"]);
				} else {
					$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
					$img_ex_lc = strtolower($img_ex);
					$allowed_exs = array("jpg","jpeg","jfif","png");
					
					if (in_array($img_ex_lc, $allowed_exs)) {
						$new_img_name = uniqid("img-", true).'.'.$img_ex_lc;
						$img_upload_path = '../upload-img/'.$new_img_name;
						move_uploaded_file($tmp_name, $img_upload_path);
						unlink('../upload-img/'.$productImgOld);

						//UPDATE sanpham IN DATABASE
						$sqlUpdateProduct = "UPDATE sanpham SET HINHSP='$new_img_name', TENSP='$productName', GIASP='$productStandardPrice', product_description='$productDescription', parents_category_id='$productParentCategory', category_id='$productCategory', brand_id='$productBrand', luxury='$productLuxury', sale='$productSale', sale_price='$productPrice', keyword='$productKeyword' WHERE MASP='$productId'";
						mysqli_query($connect, $sqlUpdateProduct);
						
						$_SESSION['message'] = "Chỉnh sửa sản phẩm thành công";
						header("Location: " . $_SERVER["HTTP_REFERER"]);
					} else {
						$_SESSION['message'] = "Hình sản phẩm không đúng định dạng!";
						header("Location: " . $_SERVER["HTTP_REFERER"]);
					}
				}
			} else {
				$_SESSION['message'] = "Hình ảnh mới bị lỗi!";
				header("Location: " . $_SERVER["HTTP_REFERER"]);
			}
		}

		// SỬ DỤNG HÌNH CŨ
		else {
			//UPDATE sanpham IN DATABASE
			$sqlUpdateProduct = "UPDATE sanpham SET HINHSP='$img_name', TENSP='$productName', GIASP='$productStandardPrice', product_description='$productDescription', parents_category_id='$productParentCategory', category_id='$productCategory', brand_id='$productBrand', luxury='$productLuxury', sale='$productSale', sale_price='$productPrice', keyword='$productKeyword' WHERE MASP='$productId'";
			$queryUpdateProduct = mysqli_query($connect, $sqlUpdateProduct);
			if($queryUpdateProduct) {
				$_SESSION['message'] = "Chỉnh sửa sản phẩm thành công";
				header("Location: " . $_SERVER["HTTP_REFERER"]);
			} else {
				$_SESSION['message'] = "Có lỗi trong quá trình chỉnh sửa";
				header("Location: " . $_SERVER["HTTP_REFERER"]);	
			}
		}

	}
?>
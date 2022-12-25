<?php include('php/connect.php'); ?>
<?php include('php/checkAuth.php'); ?>
<?php include('php/checkRole.php') ?>
<?php include('php/functions.php'); ?>

<?php include('layouts/head.php'); ?>
<?php include('layouts/header.php'); ?>
<div id="body">
	<?php 
		$queryParentsCategory = mysqli_query($connect, "SELECT * FROM parents_category");
		$queryCategory = mysqli_query($connect, "SELECT * FROM category");
		$queryBrand = mysqli_query($connect, "SELECT * FROM brand");
	?>
	<div class="account">
		<div class="account-header">
			<div class="account-header__banner" style="background-image: url(images/MyAccountBanner.png);"></div>
		</div>

		<div class="account-body">
			<div class="account-body__warp"><!-- FLEX -->
				
				<!-- LEFT SIDEBAR -->
				<?php include('layouts/accountSidebar.php'); ?>

				<!-- RIGHT CONTAINER -->
				<div class="account-body__container">
					<div class="account-body__header">
						<h5 class="account-body__heading">Add product</h5>
					</div>
					<div class="account-body__content">

						<form class="admin-product__form" action="php/adminInsertProduct.php" method="POST" enctype="multipart/form-data">
							<div class="account-admin__wrap"><!-- FLEX -->
								<div class="admin-product__container">
									<div class="admin-product__form-group">
										<label class="admin-product__form-title" for="productName">Tên sản phẩm:</label>
										<input class="admin-product__form-input js-product-name-input" id="productName" type="text" name="productName" required>	
									</div>
									<div class="admin-product__form-group">
										<label class="admin-product__form-title" for="productImg">Hình ảnh sản phẩm:</label>
										<input class="admin-product__form-input js-product-img-input" id="productImg" type="file" name="productImg" required>
									</div>
									<div class="admin-product__form-group">
										<label class="admin-product__form-title" for="productParentCategory">Nhóm sản phẩm:</label>
										<select class="admin-product__form-select js-product-parent-category" name="productParentCategory">
											<?php
												if(mysqli_num_rows($queryParentsCategory) > 0) {
													while($resultParentsCategory = mysqli_fetch_array($queryParentsCategory)) {
														echo('<option value="'.$resultParentsCategory['parents_category_id'].'">'.$resultParentsCategory['parents_category_name'].'</option>');
													}
												}
											?>
										</select>
									</div>
									<div class="admin-product__form-group">
										<label class="admin-product__form-title" for="productCategory">Danh mục sản phẩm:</label>
										<select class="admin-product__form-select js-product-category-select" name="productCategory">
											<?php
												if(mysqli_num_rows($queryCategory) > 0) {
													while($resultCategory = mysqli_fetch_array($queryCategory)) {
														echo('<option value="'.$resultCategory['category_id'].'">'.$resultCategory['category_name'].'</option>');
													}
												}
											?>
										</select>
									</div>
									<div class="admin-product__form-group">
										<label class="admin-product__form-title" for="productBrand">Thương hiệu:</label>
										<select class="admin-product__form-select js-product-brand-select" name="productBrand">
											<?php
												if(mysqli_num_rows($queryBrand) > 0) {
													while($resultBrand = mysqli_fetch_array($queryBrand)) {
														echo('<option value="'.$resultBrand['brand_id'].'">'.$resultBrand['brand_name'].'</option>');
													}
												}
											?>
										</select>
									</div>
									<div class="admin-product__form-group">
										<label class="admin-product__form-title" for="productPrice">Giá hiển thị:</label>
										<input class="admin-product__form-input js-product-price-input" id="productPrice" type="text" name="productPrice" required>
									</div>
									<div class="admin-product__form-group">
										<label class="admin-product__form-title" for="productLuxury">Sản phẩm cao cấp:</label>
										<input class="admin-product__form-check js-product-luxury-checkbox" id="productLuxury" type="checkbox" name="productLuxury" value="1">
									</div>
									<div class="admin-product__form-group">
										<label class="admin-product__form-title" for="productSale">Sản phẩm khuyến mãi:</label>
										<input class="admin-product__form-check js-product-sale-checkbox" id="productSale" type="checkbox" name="productSale" value="1">
									</div>
									<div class="admin-product__form-group admin-product__form-group--hidden js-group-stand-price">
										<label class="admin-product__form-title" for="productStandardPrice">Giá cũ:</label>
										<input class="admin-product__form-input js-product-standard-price" id="productStandardPrice" type="text" name="productStandardPrice">
									</div>
									<div class="admin-product__form-group">
										<label class="admin-product__form-title" for="productDescription">Mô tả sản phẩm:</label>
										<textarea class="admin-product__form-text js-product-description-input" id="productDescription" name="productDescription" required></textarea>	
									</div>
									<div class="admin-product__form-group">
										<label class="admin-product__form-title" for="productKeyword">Từ khóa tìm kiếm:</label>
										<textarea class="admin-product__form-text js-product-keyword-input" id="productKeyword" name="productKeyword" required></textarea>	
									</div>
								</div>

								<div class="admin-products__controls">
									<button type="submit" name="addProductBtn" class="admin-products__btn btn btn--fill">Thêm</button>
									<a class="js-guide-btn admin-products__btn btn btn--fill">Hướng dẫn</a>
									<a href="admin_products.php" class="admin-products__btn btn">Quay lại</a>	
								</div>
							</div>
						</form>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php 
	include('layouts/footer.php'); 
	if(isset($_SESSION['message'])) {
		$message = $_SESSION['message'];
		echo('<script type="text/javascript"> alert("'.$message.'"); </script>');
		unset($_SESSION['message']);
	}
?>

<!-- JAVASCRIPTS -->
<script type="text/javascript">
	const adminProductForm = document.querySelector('.admin-product__form');
	const adminProductName = document.querySelector('.js-product-name-input');
	const adminProductPrice = document.querySelector('.js-product-price-input');
	const adminProductSale = document.querySelector('.js-product-sale-checkbox');
	const adminProductDescription = document.querySelector('.js-product-description-input');
	const adminProductKeyword = document.querySelector('.js-product-keyword-input');

	const adminProductStandPrice = document.querySelector('.js-product-standard-price');
	const adminProductStandPriceGroup = document.querySelector('.js-group-stand-price');

	const adminProductsGuideBtn = document.querySelector('.js-guide-btn');
	
	adminProductSale.oninput = function() {
		if(adminProductSale.checked == true) {
			adminProductStandPriceGroup.classList.remove('admin-product__form-group--hidden');
		} else {
			adminProductStandPriceGroup.classList.add('admin-product__form-group--hidden');	
		}
	}
	adminProductForm.onsubmit = function() {
		return insertProductValidate();
	}

	function insertProductValidate() {
		var done;
		const adminProductNameVal = getValue('.js-product-name-input');
		const adminProductPriceVal = getValue('.js-product-price-input');
		const adminProductDescriptionVal = getValue('.js-product-description-input');
		const adminProductKeywordVal = getValue('.js-product-keyword-input');
		const adminProductStandPriceVal = getValue('.js-product-standard-price');

		if(adminProductNameVal.length < 5 || adminProductNameVal == '') {
			alert('Tên sản phẩm quá ngắn, vui lòng chỉnh sửa lại');
			adminProductName.focus();
			done = false;
		} else if(!/^[0-9]+$/.test(adminProductPriceVal)) {
			alert('Giá hiển thị chỉ nhập số nguyên không cần "." hay "," vd:1999000');
			adminProductPrice.focus();
			done = false;
		} else if(adminProductPriceVal.length < 4 || adminProductPriceVal.length > 11 || adminProductPriceVal == '') {
			alert('Độ dài của giá hiển thị không hợp lệ, vui lòng chỉnh lại');
			adminProductPrice.focus();
			done = false;
		} else if(adminProductDescriptionVal.length < 8 || adminProductDescriptionVal == '') {
			alert('Mô tả về sản phẩm quá ngắn, vui lòng chỉnh sửa lại');
			adminProductDescription.focus();
			done = false;
		} else if(adminProductKeywordVal.length < 5 || adminProductKeywordVal == '') {
			alert('Từ khóa tìm kiếm của bạn quá ngắn, bạn có thể ghi thành một chuỗi các từ liên quan vd:"Skateboard ván trượt thể thao"');
			adminProductKeyword.focus();
			done = false;
		} else if(adminProductSale.checked == true) {
			if(!/^[0-9]+$/.test(adminProductStandPriceVal) || adminProductStandPriceVal == '') {
				alert('Giá cũ chỉ nhập số nguyên không cần "." hay "," vd:999000');
				adminProductStandPrice.focus();
				done = false;
			} else if(Number(adminProductStandPriceVal) < Number(adminProductPriceVal) || adminProductStandPriceVal == 0) {
				alert('Giá cũ là mức giá lúc chưa giảm, giá cũ phải lớn hơn giá hiển thị!');
				adminProductStandPrice.focus();
				done = false;
			}
		} else {
			adminProductStandPrice.value = 0;
			done = true;
		}
		return done;
	}

	// GUIDE BTN EVENT CLICK
	adminProductsGuideBtn.onclick = function() {
		alert('- Điền đầy đủ thông tin sản phẩm theo yêu cầu sau đó bấm "thêm" để tiến hành thêm sản phẩm lên cửa hàng.');
	}
</script>
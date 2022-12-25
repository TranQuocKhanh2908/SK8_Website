<?php include('php/connect.php'); ?>
<?php include('php/functions.php'); ?>
<?php include('layouts/head.php'); ?>
<?php include('layouts/header.php'); ?>
<div id="body">
<?php include('php/getProduct.php') ?>
	<div class="check-out">

		<!-- CHECK OUT SECTION -->
		<div class="check-out__container">
			<div class="check-out__header">
				<h2 class="check-out__heading">Checkout</h2>
			</div>
			<form class="check-out__form" method="POST" action="checkout_s1.php?product=<?php echo($resultProductInfo['MASP']); ?>">
				<div class="check-out__wrap"> <!-- FLEX -->

					<div class="check-out__section">
						<div class="check-out__content">
							<div class="check-out__promo"> <!-- FLEX -->
								<div class="check-out__promo-img" style="background-image: url(images/Sk8_logo_mini.png);"></div>
								<?php
									if(isset($_SESSION['DTKH'])) {
										echo('<h2 class="check-out__promo-text">SK8 mong bạn có một trải nghiệm mua hàng tốt. Chúc bạn có một ngày vui vẻ!</h2>');
									} else {
										echo('<h2 class="check-out__promo-text">Đăng nhập để nhận được nhiều ưu đãi với SK8</h2>
										<span class="check-out__promo-link">
											<a class="check-out__link-register">Đăng ký</a> /
											<a class="check-out__link-login">Đăng nhập</a>
										</span>');
									}
								?>
							</div>
						</div>
						
						<div class="check-out__content">
							<div class="check-out__product"> <!-- FLEX -->
								<div class="check-out__product-img" style="background-image: url(upload-img/<?php echo($resultProductInfo['HINHSP']); ?>);"></div>
								<div class="check-out__product-info">
									<h5 class="check-out__product-name"><?php echo($resultProductInfo['TENSP']); ?></h5>
									<div class="check-out__product-price">
									<?php 
										$productStandardPrice = convertToVnd($resultProductInfo['GIASP']);
										$productSalePrice = convertToVnd($resultProductInfo['sale_price']);

										if($resultProductInfo['sale'] == 1 && $resultProductInfo['luxury'] == 1) {
											echo(
												'<span class="check-out__product-standard">'.$productStandardPrice.'</span>
												<span class="check-out__product-sale check-out__product-sale--luxury">'.$productSalePrice.'</span>'
											);
										} else if($resultProductInfo['sale'] == 1) {
											echo(
												'<span class="check-out__product-standard">'.$productStandardPrice.'</span>
												<span class="check-out__product-sale check-out__product-sale--sale">'.$productSalePrice.'</span>'
											);									 
										} else if($resultProductInfo['luxury'] == 1) {
											echo('<span class="check-out__product-sale check-out__product-sale--luxury">'.$productSalePrice.'</span>');
										} else {
											echo('<span class="check-out__product-sale">'.$productSalePrice.'</span>');
										}
									?>
										<input class="js-stand-price" type="hidden" name="standPrice" value="<?php echo($resultProductInfo['GIASP']); ?>">
										<input class="js-sale-price" type="hidden" name="salePrice" value="<?php echo($resultProductInfo['sale_price']); ?>">
									</div>
								</div>
								<div class="check-out__product-multiply">
									<div class="check-out__product-quantity">
										<i onclick="this.parentNode.querySelector('.check-out__quantity-input').stepDown()" class="check-out__quantity-btn ti-minus"></i>
										<input class="check-out__quantity-input" min="1" name="quantity" value="1" type="number" disabled>
										<i onclick="this.parentNode.querySelector('.check-out__quantity-input').stepUp()" class="check-out__quantity-btn ti-plus"></i>
									</div>

									<div class="check-out__product-total">
										x<span class="js-total-quantity">1</span>
										<span class="js-total-price"><?php echo($productSalePrice); ?></span>
									</div>
								</div>
							</div>
						</div>
						
						<div class="check-out__content">
							<div class="check-out__message">
								<span class="check-out__message-text">Với SK8 chất lượng luôn được đặt lên hàng đầu! Hãy mua trải nghiệm và cho SK8 biết cảm nhận của bạn.</span>
							</div>
						</div>
					</div>
					
					<div class="check-out__section">
						<div class="check-out__content">
							<div class="check-out__info">
								<h5 class="check-out__info-heading">Thông tin thanh toán</h5>

								<div class="check-out__info-shiping">
									<select class="check-out__shiping-list">
										<option class="check-out__shiping-item js-shiping-in" value="30000">Giao tiêu chuẩn (5-6 ngày)</option>
										<option class="check-out__shiping-item js-shiping-out" value="50000">Giao nhanh (2-3 ngày)</option>
									</select>

								</div>

								<div class="check-out__info-price">
									<div class="check-out__price-content"> <!-- FLEX -->
										<span class="check-out__price-text">Tạm tính</span>
										<span class="check-out__price-number js-price-number"><?php echo($productSalePrice) ?></span>
									</div>
									<div class="check-out__price-content"> <!-- FLEX -->
										<span class="check-out__price-text">Vận chuyển</span>
										<span class="check-out__price-number js-shiping-number">
										<?php 
											if($resultProductInfo['sale_price'] > 500000) {
												echo('Miễn phí');
											} else {
												echo('30.000₫');
											} 
										?>
										</span>
									</div>
									<div class="check-out__price-content"> <!-- FLEX -->
										<span class="check-out__price-text">Tổng</span>
										<span class="check-out__price-number js-total-number">
										<?php
											if($resultProductInfo['sale_price'] > 500000) {
												echo($productSalePrice);
											} else {
												echo(convertToVnd($resultProductInfo['sale_price'] + 30000)); 
											}
										?>
										</span>
									</div>
								</div>

								<div class="check-out__info-warning">
									<span class="check-out__warning-text">Lưu ý! Sau khi đặt hàng thành công bạn có thể trả lại hàng, nhưng không thể chỉnh sửa thông tin đơn hàng.</span>
								</div>

								<div class="check-out__info-btns">
									<button type="submit" class="check-out__btn-forward btn btn--fill">Tiếp tục</button>
									<a href="<?php if(isset($_SERVER["HTTP_REFERER"])) { echo($_SERVER["HTTP_REFERER"]); } 
									else { echo('gallery.php'); } ?>" class="check-out__btn-back btn">Quay lại<a>
								</div>
							</div>
						</div>
					</div>

				</div>

				<!-- POST INPUTS VALUE -->
				<input class="js-subtotal-cost" type="hidden" name="subtotalCost" value="<?php echo($resultProductInfo['sale_price']) ?>">
				<input class="js-shipping-cost" type="hidden" name="shippingCost" value="<?php if($resultProductInfo['sale_price'] > 500000) { echo(0); } else { echo(30000); } ?>">
				<input class="js-post-quantity" type="hidden" name="postQuantity" value="1">
			</form>
		</div>
		
		<!-- RECOMMENT SECTION -->
	</div>
</div>
<?php include('layouts/footer.php'); ?>

<!-- JAVASCRIPTS -->
<script type="text/javascript">
	// KHAI BÁO CHUNG
	const subtotalCostInput = document.querySelector('.js-subtotal-cost');
	const shippingCostInput = document.querySelector('.js-shipping-cost');
	const postQuantityInput = document.querySelector('.js-post-quantity');
	const checkOutForm = document.querySelector('.check-out__form');
	const checkOutQuantityInput = document.querySelector('.check-out__quantity-input');
	const checkOutQuantityBtns = document.querySelectorAll('.check-out__quantity-btn');
	const checkOutShipingPrice = document.querySelector('.check-out__shiping-list');
	const checkOutQuantityNumber = document.querySelector('.js-total-quantity');
	const checkOutTotalPrice = document.querySelector('.js-total-price');
	const checkOutStandPrice = document.querySelector('.js-stand-price');
	const checkOutSalePrice = document.querySelector('.js-sale-price');
	const checkOutPriceNumber = document.querySelector('.js-price-number');
	const checkOutShipingNumber = document.querySelector('.js-shiping-number');
	const checkOutTotalNumber = document.querySelector('.js-total-number');

	//FUNCTIONS
	function jsConvertToVnd(n) {
		return new Intl.NumberFormat('vi-VN',{style:'currency', currency:'vnd'}).format(n).replace(/\s+/g, '');
	}

	// MỞ MODAL ĐĂNG KÝ | ĐĂNG NHẬP
	if(userSession == null) {
		const checkOutLoginBtn = document.querySelector('.check-out__link-login');
		const checkOutRegisterBtn = document.querySelector('.check-out__link-register');
		checkOutRegisterBtn.onclick = function() {
			openRegister();
		}
		checkOutLoginBtn.onclick = function() {
			openLogin();
		}
	}

	//NHẢY SỐ LƯỢNG NHÂN, TIỀN TẠM TÍNH VÀ TIỀN TỔNG KHI NHẤN INCREASE	
	for(checkOutQuantityBtn of checkOutQuantityBtns) {
		checkOutQuantityBtn.addEventListener('click', function() {
			var checkOutMultiplyPrice = Number(checkOutQuantityInput.value) * Number(checkOutSalePrice.value);
			checkOutQuantityNumber.innerText = checkOutQuantityInput.value;
			checkOutTotalPrice.innerText = jsConvertToVnd(checkOutMultiplyPrice);
			checkOutPriceNumber.innerText = jsConvertToVnd(checkOutMultiplyPrice);
			postQuantityInput.value = Number(checkOutQuantityInput.value);
			// Tiền tổng
			if(checkOutMultiplyPrice > 500000) {
				checkOutShipingNumber.innerText = "Miễn phí";
				checkOutTotalNumber.innerText = jsConvertToVnd(Number(checkOutMultiplyPrice));
				subtotalCostInput.value = Number(checkOutMultiplyPrice);
			} else {
				checkOutShipingNumber.innerText = jsConvertToVnd(checkOutShipingPrice.value);
				checkOutTotalNumber.innerText = jsConvertToVnd(Number(checkOutMultiplyPrice) + Number(checkOutShipingPrice.value));
				shippingCostInput.value = Number(checkOutShipingPrice.value);
				subtotalCostInput.value = Number(checkOutMultiplyPrice);
			}			
		})
	}

	// NHẢY SỐ TIỀN VẬN CHUYỂN KHI LỰA CHỌN
	checkOutShipingPrice.addEventListener('input', function() {
		var checkOutMultiplyPrice = Number(checkOutQuantityInput.value) * Number(checkOutSalePrice.value);
		if(checkOutMultiplyPrice > 500000) {	
			checkOutShipingNumber.innerText = "Miễn phí";
			checkOutTotalNumber.innerText = jsConvertToVnd(Number(checkOutMultiplyPrice));
			subtotalCostInput.value = Number(checkOutMultiplyPrice);
		} else {
			checkOutShipingNumber.innerText = jsConvertToVnd(checkOutShipingPrice.value);
			checkOutTotalNumber.innerText = jsConvertToVnd(Number(checkOutMultiplyPrice) + Number(checkOutShipingPrice.value));
			shippingCostInput.value = Number(checkOutShipingPrice.value);
			subtotalCostInput.value = Number(checkOutMultiplyPrice);
		}
	})

	// CHECK USER SESSION
	checkOutForm.onsubmit = function() {
		if(userSession != null) {
			return true;
		} else {
			openLogin();
			return false;
		}
	}
</script>
<?php include('php/checkAuth.php'); ?>
 
<?php include('php/connect.php'); ?>
<?php include('php/functions.php'); ?>
<?php include('layouts/head.php'); ?>
<?php include('layouts/header.php'); ?>
<div id="body">
<?php include('php/getProduct.php'); ?>

<!-- GET POST VALUE ITEM FROM PREVIOUS PAGE -->
<?php 
	$subtotalCost = $_POST['subtotalCost'];
	$shippingCost = $_POST['shippingCost'];
	$postQuantity = $_POST['postQuantity'];
?>
	<div class="step-one">
		<div class="step-one__container">

			<div class="step-one__header">
				<h2 class="step-one__step-list"><!-- FLEX -->
					<span class="step-one__step-item">1. Giao hàng</span>
					<span class="step-one__step-item">2. Thanh toán</span>
					<span class="step-one__step-item">3. Đơn hàng</span>
				</h2>
			</div>
			<form class="step-one__form" method="POST" action="checkout_s2.php?product=<?php echo($resultProductInfo['MASP']); ?>">
				<div class="step-one__warp"><!-- FLEX -->

					<!-- SHIPPING ADDRESS -->
					<div class="step-one__section">
						<div class="step-one__content">
							<h5 class="step-one__heading">Địa chỉ giao hàng</h5>
							<div class="step-one__address">
								<h5 class="step-one__address-title">Địa chỉ của tôi:</h5>
								<p class="step-one__address-default"><?php echo($resultUser['DCKH']); ?></p>
								<div class="step-one__address-list">
									<div class="step-one__address-select">
										<input class="step-one__select-radio" type="radio" name="address" value="1" checked>
										<span class="step-one__select-text">Sử dụng địa chỉ của tôi</span>
									</div>
									
									<div class="step-one__address-select">
										<input class="step-one__select-radio" type="radio" name="address" value="2">
										<span class="step-one__select-text">Sử dụng một địa chỉ khác</span>
									</div>
									<div class="step-one__address-use">
										<textarea class="step-one__address-using" name="anotherAddress" placeholder="Nhập địa chỉ nhận hàng của bạn"></textarea>
										<i class="step-one__address-icon ti-map"></i>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- ORDER SUMMARY -->
					<div class="step-one__section">
						<div class="step-one__content">
							<h5 class="step-one__heading">Thông tin thanh toán</h5>
							<div class="step-one__order">
								<div class="step-one__order-price">
									<div class="step-one__price-content"><!-- FLEX -->
										<span class="step-one__price-text">Tạm Tính</span>
										<span class="step-one__price-number"><?php echo(convertToVnd($subtotalCost)); ?></span>
									</div>
									<div class="step-one__price-content"><!-- FLEX -->
										<span class="step-one__price-text">Vận chuyển</span>
										<span class="step-one__price-number">
										<?php
											if($subtotalCost > 500000) { 
												echo('Miễn phí'); 
											} else { 
												echo(convertToVnd($shippingCost)); 
											}
										?>
										</span>
									</div>
									<div class="step-one__price-content"><!-- FLEX -->
										<span class="step-one__price-text">Tổng</span>
										<span class="step-one__price-number"><?php echo(convertToVnd($subtotalCost + $shippingCost)); ?></span>
									</div>
								</div>
							</div>
						</div>
						<button class="step-one__btn btn btn--fill" type="submit">Tiếp tục</button>
					</div>

				</div>

				<!-- POST INPUTS VALUE -->
				<input type="hidden" name="subtotalCost" value="<?php echo($subtotalCost); ?>">
				<input type="hidden" name="shippingCost" value="<?php echo($shippingCost); ?>">
				<input type="hidden" name="postQuantity" value="<?php echo($postQuantity); ?>">
				<input class="js-using-address" type="hidden" name="usingAddress" value="<?php echo($resultUser['DCKH']); ?>">
			</form>
		</div>
	</div>
</div>
<?php include('layouts/footer.php'); ?>

<!-- JAVASCRIPTS -->
<script type="text/javascript">
	const stepOneForm = document.querySelector('.step-one__form');
	const addressSelects = document.querySelectorAll('.step-one__select-radio');
	const addressUse = document.querySelector('.step-one__address-use');
	const addressTextArea = document.querySelector('.step-one__address-using');
	const defaultAddress = document.querySelector('.step-one__address-default');
	const usingAddressInput = document.querySelector('.js-using-address');
	const addressSelections = document.querySelectorAll('.step-one__address-select');

	// MỞ INPUT KHI NHẤN VÀO Ô
	for(addressSelection of addressSelections) {
		addressSelection.onclick = function () {
			this.firstElementChild.click();
		}
	}

	// CÁC TRƯỜNG HỢP CHỌN
	for(addressSelect of addressSelects) {
		addressSelect.oninput = function() {
			if (addressSelects[1].checked == true) {
				addressUse.classList.add('step-one__address-use--open');
				addressTextArea.setAttribute("required","");
				
				// GÁN ĐỊA CHỈ POST
				addressUse.oninput = function() {
					usingAddressInput.value = addressTextArea.value;
				} 
				
				// VALIDATE STEP ONE
				stepOneForm.onsubmit = function() {
					var isFinnish;
					if(addressTextArea.value.trim().length < 10 || addressUse.value == '') {
						alert('Địa chỉ bạn điền chưa đầy đủ, hãy ghi đầy đủ số nhà, đường, phường, quận và thành phố. Cho SK8 ghi chú nếu có!');
						isFinnish = false;
						addressTextArea.focus();
					} else { 
						isFinnish = true; 
					}
					return isFinnish;
				}
			} else {
				addressUse.classList.remove('step-one__address-use--open');
				addressTextArea.removeAttribute("required");
				usingAddressInput.value = defaultAddress.innerText;
				stepOneForm.onsubmit = function() {
					return true;
				}
			}
		}
	}
</script>
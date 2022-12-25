<?php include('php/checkAuth.php'); ?>

<?php include('php/connect.php'); ?>
<?php include('php/functions.php'); ?>
<?php include('layouts/head.php'); ?>
<?php include('layouts/header.php'); ?>
<div id="body">
<?php include('php/getProduct.php') ?>

<!-- GET POST VALUE ITEMS FROM PREVIOUS PAGE -->
<?php 
	$subtotalCost = $_POST['subtotalCost'];
	$shippingCost = $_POST['shippingCost'];
	$postQuantity = $_POST['postQuantity'];
	$usingAddress = $_POST['usingAddress'];
?>
	<div class="step-two">
		<div class="step-two__container">
			<div class="step-two__header">
				<h2 class="step-two__step-list"><!-- FLEX -->
					<span class="step-two__step-item">1. Giao hàng</span>
					<span class="step-two__step-item">2. Thanh toán</span>
					<span class="step-two__step-item">3. Đơn hàng</span>
				</h2>
			</div>
			<form class="step-two__form" method="POST" action="php/orderInsert.php?product=<?php echo($resultProductInfo['MASP']); ?>" autocomplete="off">
				<div class="step-two__warp"><!-- FLEX -->

					<!-- SHIPPING ADDRESS -->
					<div class="step-two__section">
						<div class="step-two__content">
							<h5 class="step-two__heading">Hình thức thanh toán</h5>
							<div class="step-two__payment">
								<div class="step-two__payment-list">
									<div class="step-two__payment-select">
										<input class="step-two__select-radio" type="radio" name="payment" value="Thanh toán khi nhận hàng" checked>
										<span class="step-two__select-text">Thanh toán khi nhận hàng</span>
									</div>

									<div class="step-two__payment-select">
										<input class="step-two__select-radio" type="radio" name="payment" value="Thanh toán ngân hàng">
										<span class="step-two__select-text">Tài khoản ngân hàng</span>
									</div>
									<div class="step-two__payment-bank">
										<input class="step-two__bank-number" type="text" name="bankNumber" placeholder="Nhập số tài khoản của bạn">
										<i class="step-two__bank-icon ti-credit-card"></i>
										<input class="step-two__bank-bill" type="checkbox" name="bankBill">
										<span class="step-two__bank-text">Gửi cho tôi hóa đơn</span>
									</div>

									<div class="step-two__payment-select">
										<input class="step-two__select-radio" type="radio" name="payment" value="Thanh toán momo">
										<span class="step-two__select-text">Giao dịch với MOMO</span>
									</div>
									<div class="step-two__payment-momo">
										<input class="step-two__momo-number" type="text" name="momoNumber" placeholder="Nhập số momo của bạn">
										<div class="step-two__momo-logo" style="background-image: url(images/momo_App_Logo.jpg);"></div>
									</div>
								</div>
							</div>

						</div>
					</div>

					<!-- ORDER SUMMARY -->
					<div class="step-two__section">
						<div class="step-two__content">
							<h5 class="step-two__heading">Thông tin thanh toán</h5>
							<div class="step-two__order">
								<div class="step-two__order-price">
									<div class="step-two__price-content"><!-- FLEX -->
										<span class="step-two__price-text">Tạm Tính</span>
										<span class="step-two__price-number"><?php echo(convertToVnd($subtotalCost)); ?></span>
									</div>
									<div class="step-two__price-content"><!-- FLEX -->
										<span class="step-two__price-text">Vận chuyển</span>
										<span class="step-two__price-number">
										<?php
											if($subtotalCost > 500000) { 
												echo('Miễn phí'); 
											} else { 
												echo(convertToVnd($shippingCost)); 
											}
										?>
										</span>
									</div>
									<div class="step-two__price-content"><!-- FLEX -->
										<span class="step-two__price-text">Tổng</span>
										<span class="step-two__price-number"><?php echo(convertToVnd($subtotalCost + $shippingCost)); ?></span>
									</div>
								</div>
							</div>
						</div>
						<button class="step-two__btn btn btn--fill" type="submit" name="orderBtn">Tiếp tục</button>
					</div>

				</div>

				<!-- POST INPUTS VALUE -->
				<input type="hidden" name="subtotalCost" value="<?php echo($subtotalCost); ?>">
				<input type="hidden" name="shippingCost" value="<?php echo($shippingCost); ?>">
				<input type="hidden" name="postQuantity" value="<?php echo($postQuantity); ?>">
				<input type="hidden" name="usingAddress" value="<?php echo($usingAddress); ?>">
			</form>
		</div>
	</div>
</div>
<?php include('layouts/footer.php'); ?>

<!-- JAVASCRIPTS -->
<script type="text/javascript">

	// KHAI BÁO CHUNG
	const stepTwoForm = document.querySelector('.step-two__form');
	const paymentselections = document.querySelectorAll('.step-two__payment-select');
	const paymentSelects = document.querySelectorAll('.step-two__select-radio');
	
	const paymentBank = document.querySelector('.step-two__payment-bank');
	const paymentBankInput = document.querySelector('.step-two__bank-number');

	const paymentMomo = document.querySelector('.step-two__payment-momo');
	const paymentMomoInput = document.querySelector('.step-two__momo-number');

	// MỞ INPUT RA KHI NHẤN VÀO Ô
	for(paymentselection of paymentselections) {
		paymentselection.onclick = function() {
			this.firstElementChild.click();
		}
	}

	// ĐÓNG MỞ INPUT
	for(paymentSelect of paymentSelects) {
		paymentSelect.oninput = function() {

			// SHIP COD SELECTION
			if(paymentSelects[0].checked == true) {
				paymentMomo.classList.remove('step-two__payment-momo--open');
				paymentMomoInput.removeAttribute("required");
				paymentBank.classList.remove('step-two__payment-bank--open');
				paymentBankInput.removeAttribute("required");				
				stepTwoForm.onsubmit = function() {
					return true;
				}

			// BANK SELECTION
			} else if(paymentSelects[1].checked == true) {
				paymentBank.classList.add('step-two__payment-bank--open');
				paymentBankInput.setAttribute("required","");
				paymentMomo.classList.remove('step-two__payment-momo--open');
				paymentMomoInput.removeAttribute("required");

				//VALIDATE BANK NUMBER
				stepTwoForm.onsubmit = function() {
					var isFinish;
					const paymentBankValue = getValue('.step-two__bank-number');
					if(paymentBankValue.length < 9 || paymentBankValue.length > 14 || Number.isFinite(Number(paymentBankValue)) == false) {
						alert('Số tài khoản phải từ 9 đến 14 số, không chứa chữ cái và ký tự đặc biệt!');
						isFinish = false;
						paymentBankInput.focus();
					} else {
						isFinish = true;
					}
					return isFinish;
				}

			// MOMO SELECTION
			} else if(paymentSelects[2].checked == true) {
				paymentMomo.classList.add('step-two__payment-momo--open');
				paymentMomoInput.setAttribute("required","");
				paymentBank.classList.remove('step-two__payment-bank--open');
				paymentBankInput.removeAttribute("required");

				//VALIDATE MOMO NUMBER
				stepTwoForm.onsubmit = function() {
					var isFinish;
					const paymentMomoValue = getValue('.step-two__momo-number');
					if(paymentMomoValue != '' && !/^[0-9]{10}$/.test(paymentMomoValue) || paymentMomoValue == '') {
						alert('Tài khoản momo phải đủ 10 số, không chứa chữ cái và ký tự đặc biệt!');
						isFinish = false;
						paymentMomoInput.focus();
					} else {
						isFinish = true;
					}
					return isFinish;
				}			
			}
		}
	}
</script>
<?php include('php/checkAuth.php'); ?>

<?php include('php/connect.php'); ?>
<?php include('php/functions.php'); ?>
<?php include('layouts/head.php'); ?>
<?php include('layouts/header.php'); ?>
<div id="body">
	<?php
		$userId = $resultUser['user_id'];
		$sqlOrderList = "SELECT * FROM hoadon WHERE user_id = '$userId' ORDER BY MAHD DESC";
		$queryOrderList = mysqli_query($connect, $sqlOrderList);
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
						<h5 class="account-body__heading">Order history</h5>
					</div>

					<div class="account-body__content">
						<div class="account-body__orders-warp">
							<div class="account-body__orders-section">
								<?php 
									if(mysqli_num_rows($queryOrderList) > 0) {
										while($resultOrderList = mysqli_fetch_array($queryOrderList)) {

											$productId = $resultOrderList['MASP'];
											$sqlProductById = "SELECT * FROM sanpham WHERE MASP = '$productId'";
											$resultProductById = mysqli_fetch_assoc(mysqli_query($connect, $sqlProductById));

											$productPrice = convertToVnd($resultProductById['sale_price']);
											$orderTotalCost = convertToVnd($resultOrderList['COST']);
								?>

								<div class="account-body__orders-content">
									<div class="account-orders__header"><!-- FLEX -->
										<div class="account-orders__header-heading">
											<h5 class="account-orders__header-number"><?php echo('#'.$resultOrderList['MAHD']); ?></h5>
											<span class="account-orders__header-payment"><?php echo($resultOrderList['payment_method']); ?></span>
										</div>
										<div class="account-orders__header-status">
											<span class="account-orders__header-tag">Đã xác nhận <i class="account-orders__header-check ti-check-box"></i></span>	
										</div>
									</div>

									<div class="account-orders__container"><!-- FLEX -->
										<a href="product.php?product=<?php echo($resultProductById['MASP']); ?>" class="account-orders__product-link">
											<div class="account-orders__product-img" style="background-image: url(upload-img/<?php echo($resultProductById['HINHSP']); ?>);"></div>
										</a>
										<div class="account-orders__product-info"><!-- FLEX -->
											<h5 class="account-orders__product-name"><?php echo($resultOrderList['TENSP']); ?></h5>
											<div class="account-orders__product-numbers">
												<span class="account-orders__product-quantity"><?php echo('x'.$resultOrderList['quantity']); ?></span>
												<span class="account-orders__product-price"><?php echo($productPrice); ?></span>
											</div>
										</div>
										<div class="account-orders__controls">
											<a href="account_order_detail.php?order_id=<?php echo($resultOrderList['MAHD']); ?>" class="account-orders__detail-btn btn btn--fill">Chi tiết</a>
										</div>
									</div>

									<div class="account-orders__footer">
										<h5 class="account-orders__footer-price">
											<span class="account-orders__footer-text">Tổng đơn hàng:</span>
											<span class="account-orders__footer-number"><?php echo($orderTotalCost); ?></span>
										</h5>
									</div>
								</div>

								<?php 
										}
									} else {
								?>

								<div class="account-body__orders-content">
									<h5 class="account-orders__no-order">Bạn chưa đặt đơn hàng nào.</h5>
								</div>

								<?php
									}
								?>
							</div>
						</div>	
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include('layouts/footer.php'); ?>
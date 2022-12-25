<?php include('php/checkAuth.php'); ?>

<?php include('php/connect.php'); ?>
<?php include('php/functions.php'); ?>
<?php include('layouts/head.php'); ?>
<?php include('layouts/header.php'); ?>
<div id="body">
	<?php
		if(isset($_GET['order_id'])) {
			$orderId = $_GET['order_id'];
			$sqlGetOrderById = "SELECT * FROM hoadon WHERE MAHD = '$orderId'";
			$queryOrderById = mysqli_query($connect, $sqlGetOrderById);
			$resultOrderById = mysqli_fetch_assoc($queryOrderById);

			$productId = $resultOrderById['MASP'];
			$sqlProductById = "SELECT * FROM sanpham WHERE MASP = '$productId'";
			$queryProductById = mysqli_query($connect, $sqlProductById);
			$resultProductById = mysqli_fetch_assoc($queryProductById);

			$productPrice = convertToVnd($resultProductById['sale_price']);
			$orderShip = convertToVnd($resultOrderById['SHIP']);
			$orderCost = convertToVnd($resultOrderById['COST']);
		} else {
			header("Location: " . $_SERVER["HTTP_REFERER"]);
		}
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
						<h5 class="account-body__heading">Thông tin đơn hàng của bạn</h5>
					</div>

					<div class="account-body__content">
						<div class="order-detail__container">
							<div class="order-detail__table">
								<div class="order-detail__table-header">
									<h5 class="order-detail__table-heading">Đơn hàng #<?php echo($resultOrderById['MAHD']); ?></h5>
								</div>
								<div class="order-detail__table-container">
									<div class="order-detail__table-item"><!-- FLEX -->
										<span class="order-detail__item-title">Tên khách hàng</span>
										<span class="order-detail__item-content"><?php echo($resultUser['TENKH']); ?></span>
									</div>
									<div class="order-detail__table-item"><!-- FLEX -->
										<span class="order-detail__item-title">Số điện thoại</span>
										<span class="order-detail__item-content"><?php echo($resultUser['DTKH']); ?></span>
									</div>
									<div class="order-detail__table-item"><!-- FLEX -->
										<span class="order-detail__item-title">Địa chỉ giao hàng</span>
										<span class="order-detail__item-content"><?php echo($resultOrderById['DCKH']); ?></span>
									</div>
									<div class="order-detail__table-item"><!-- FLEX -->
										<span class="order-detail__item-title">Hình thức thanh toán</span>
										<span class="order-detail__item-content"><?php echo($resultOrderById['payment_method']); ?></span>
									</div>
									<div class="order-detail__table-item"><!-- FLEX -->
										<span class="order-detail__item-title">Tên sản phẩm</span>
										<span class="order-detail__item-content"><?php echo($resultOrderById['TENSP']); ?></span>
									</div>
									<div class="order-detail__table-item"><!-- FLEX -->
										<span class="order-detail__item-title">Số lượng</span>
										<span class="order-detail__item-content"><?php echo($resultOrderById['quantity']); ?></span>
									</div>
									<div class="order-detail__table-item"><!-- FLEX -->
										<span class="order-detail__item-title">Giá sản phẩm</span>
										<span class="order-detail__item-content"><?php echo($productPrice); ?></span>
									</div>
									<div class="order-detail__table-item"><!-- FLEX -->
										<span class="order-detail__item-title">Giao hàng</span>
										<span class="order-detail__item-content"><?php if($resultOrderById['SHIP'] == 0) { echo('Miễn phí'); } else { echo($orderShip); } ?></span>
									</div>
									<div class="order-detail__table-item"><!-- FLEX -->
										<span class="order-detail__item-title">Tổng đơn hàng</span>
										<span class="order-detail__item-content"><?php echo($orderCost); ?></span>
									</div>
								</div>
							</div>
							<h5 class="order-detail__message">
								<i class="order-detail__message-icon ti-comment-alt"></i>
								<span class="order-detail__message-text">Nếu bạn có nhu cầu đổi trả hay thay đổi thông tin đơn hàng hãy liên hệ cho chúng tôi để được hỗ trợ tốt nhất</span>
							</h5>
							<a class="order-detail__backward" href="<?php if(isset($_SERVER["HTTP_REFERER"])) { echo($_SERVER["HTTP_REFERER"]); } else { echo('account_orders.php?view=orders'); } ?>">
								<i class="order-detail__backward-icon ti-angle-left"></i>Quay lại
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include('layouts/footer.php'); ?>

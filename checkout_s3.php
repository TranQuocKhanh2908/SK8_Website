<?php include('php/checkAuth.php'); ?>

<?php include('php/connect.php'); ?>
<?php include('php/functions.php'); ?>
<?php include('layouts/head.php'); ?>
<?php include('layouts/header.php'); ?>
<div id="body">

<!-- GET ORDER BY ID -->
<?php
	$getOrderId = $_GET['order_id'];
	$sqlOrderInfo = "SELECT * FROM hoadon WHERE MAHD = '$getOrderId'";
	$resultOrderInfo = mysqli_fetch_assoc(mysqli_query($connect, $sqlOrderInfo));

	$productId = $resultOrderInfo['MASP'];
	$sqlProductById = "SELECT * FROM sanpham WHERE MASP = '$productId'";
	$resultProductById = mysqli_fetch_assoc(mysqli_query($connect, $sqlProductById));

	$productPrice = convertToVnd($resultProductById['sale_price']);
	$shipingCost = convertToVnd($resultOrderInfo['SHIP']);
	$orderCost = convertToVnd($resultOrderInfo['COST']);
?>
	<div class="step-three">
		<div class="step-three__container">
			<div class="step-three__header">
				<h2 class="step-three__step-list"><!-- FLEX -->
					<span class="step-three__step-item">1. Giao hàng</span>
					<span class="step-three__step-item">2. Thanh toán</span>
					<span class="step-three__step-item">3. Đơn hàng</span>
				</h2>
			</div>
			<div class="step-three__warp">
				<div class="step-three__content">
					<h5 class="step-three__heading">Thông tin đơn hàng</h5>
					<div class="step-three__order">
						<div class="step-three__order-content"><!-- FLEX -->
							<span class="step-three__order-text">1/ Mã đơn hàng</span>
							<span class="step-three__order-info"><?php echo($resultOrderInfo['MAHD']); ?></span>
						</div>
						<div class="step-three__order-content"><!-- FLEX -->
							<span class="step-three__order-text">2/ Tên khách hàng</span>
							<span class="step-three__order-info"><?php echo($resultOrderInfo['TENKH']); ?></span>
						</div>
						<div class="step-three__order-content"><!-- FLEX -->
							<span class="step-three__order-text">3/ Địa chỉ giao hàng</span>
							<span class="step-three__order-info"><?php echo($resultOrderInfo['DCKH']); ?></span>
						</div>
						<div class="step-three__order-content"><!-- FLEX -->
							<span class="step-three__order-text">4/ Hình thức thanh toán</span>
							<span class="step-three__order-info"><?php echo($resultOrderInfo['payment_method']); ?></span>
						</div>
						<div class="step-three__order-content"><!-- FLEX -->
							<span class="step-three__order-text">5/ Mã sản phẩm</span>
							<span class="step-three__order-info"><?php echo($resultOrderInfo['MASP']); ?></span>
						</div>
						<div class="step-three__order-content"><!-- FLEX -->
							<span class="step-three__order-text">6/ Tên sản phẩm</span>
							<span class="step-three__order-info"><?php echo($resultOrderInfo['TENSP']); ?></span>
						</div>
						<div class="step-three__order-content"><!-- FLEX -->
							<span class="step-three__order-text">7/ Số lượng</span>
							<span class="step-three__order-info"><?php echo($resultOrderInfo['quantity']); ?></span>
						</div>
						<div class="step-three__order-content"><!-- FLEX -->
							<span class="step-three__order-text">8/ Giá sản phẩm</span>
							<span class="step-three__order-info"><?php echo($productPrice) ?></span>
						</div>
						<div class="step-three__order-content"><!-- FLEX -->
							<span class="step-three__order-text">9/ Giao hàng</span>
							<span class="step-three__order-info">
							<?php
								if($resultOrderInfo['SHIP'] == 0) {
									echo('Miễn phí');
								} else {
									echo($shipingCost);
								}
							?>
							</span>
						</div>
						<div class="step-three__order-content"><!-- FLEX -->
							<span class="step-three__order-text">10/ Tổng thanh toán</span>
							<span class="step-three__order-info"><?php echo($orderCost); ?></span>
						</div>
						
					</div>
					<span class="step-three__description">Đơn hàng của bạn đang được xử lý, nếu bạn muốn hủy đơn hãy liên hệ cho SK8 trước 24 tiếng sau khi đặt hàng, cám ơn bạn đã tin tưởng mua hàng tại SK8!</span>
					<a href="gallery.php" class="step-three__btn btn btn--fill">Xem thêm các sản phẩm khác của SK8</a>
					<a href="index.php" class="step-three__btn btn">Quay lại trang chủ</a>
				</div>
			</div>
		</div>		
	</div>
</div>
<?php include('layouts/footer.php'); ?>

<script type="text/javascript">
	alert('Đặt hàng thành công! Cám ơn bạn đã chọn SK8');
</script>
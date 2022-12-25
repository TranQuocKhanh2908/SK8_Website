<?php include('php/connect.php'); ?>
<?php include('php/checkAuth.php'); ?>
<?php include('php/checkRole.php') ?>
<?php include('php/functions.php'); ?>

<?php include('layouts/head.php'); ?>
<?php include('layouts/header.php'); ?>
<div id="body">
	<?php
		$queryProducts = mysqli_query($connect, "SELECT * FROM sanpham ORDER BY category_id ASC");
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
						<h5 class="account-body__heading">Shop products</h5>
					</div>
					<div class="account-body__content">

						<div class="account-admin__wrap"><!-- FLEX -->
							<div class="admin-products__container">
								<div class="admin-products__list"><!-- FLEX -->
									<?php
										if(mysqli_num_rows($queryProducts) > 0 ) {
											while($resultProducts = mysqli_fetch_array($queryProducts)) {
									?>
									<div class="admin-products__item">
										<a href="admin_products_update.php?product=<?php echo($resultProducts['MASP']); ?>" class="admin-products__link">
											<div class="admin-products__img" style="background-image: url(upload-img/<?php echo($resultProducts['HINHSP']); ?>);"></div>
											<i class="admin-products__icon ti-pencil"></i>
										</a>
									</div>
									<?php 
											}
										}
									?>
								</div>
							</div>

							<div class="admin-products__controls">
								<a href="admin_products_insert.php" class="admin-products__btn btn btn--fill">Thêm sản phẩm</a>
								<a class="js-guide-btn admin-products__btn btn btn--fill">Hướng dẫn</a>
								<a href="<?php if(isset($_SERVER["HTTP_REFERER"])) { echo($_SERVER["HTTP_REFERER"]); } 
									else { echo('account.php'); } ?>" class="admin-products__btn btn">Quay lại</a>	
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include('layouts/footer.php'); ?>
<script type="text/javascript">
	const adminProductsGuideBtn = document.querySelector('.js-guide-btn');

	adminProductsGuideBtn.onclick = function() {
		alert('Nhấn vào hình sản phẩm để chỉnh sửa hoặc xóa sản phẩm đó, nhấn thêm sản phẩm để thêm sản phẩm mới cho cửa hàng.');
	}

</script>
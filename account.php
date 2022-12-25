<?php include('php/connect.php'); ?>
<?php include('php/checkAuth.php'); ?>
<?php include('php/functions.php'); ?>

<?php include('layouts/head.php'); ?>
<?php include('layouts/header.php'); ?>
<div id="body">
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
						<h5 class="account-body__heading">Dashboard</h5>
					</div>
					<?php
						if($resultUser['role'] > 0 ) {
					?>
					<div class="account-body__content">
						<div class="account-body__menu"><!-- FLEX -->
							<a class="account-body__button btn btn--fill" style="cursor: not-allowed;">Thông tin khách hàng</a>
							<a class="account-body__button btn btn--fill" style="cursor: not-allowed;">Đơn hàng gần đây</a>
							<a href="admin_products.php" class="account-body__button btn btn--fill">Quản lý sản phẩm</a>
							<a href="admin_products_insert.php" class="account-body__button btn btn--fill">Thêm sản phẩm</a>
							<a href="admin_categories.php" class="account-body__button btn btn--fill">Quản lý danh mục</a>
							<a href="admin_categories_insert.php" class="account-body__button btn btn--fill">Thêm danh mục</a>
							<a href="index.php" class="account-body__button btn">Quay lại trang chủ</a>
						</div>
					</div>
					<?php
						} else {
					?>
					<div class="account-body__content">
						<div class="account-body__menu"><!-- FLEX -->
							<a href="account_information.php?view=information" class="account-body__button btn btn--fill">Thông tin tài khoản</a>
							<a href="account_orders.php?view=orders" class="account-body__button btn btn--fill">Đơn hàng của tôi</a>
							<a class="account-body__button btn btn--fill" style="cursor: not-allowed;">Danh sách yêu thích</a>
							<a href="index.php" class="account-body__button btn">Quay lại trang chủ</a>
						</div>
					</div>
					<?php
						}
					?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include('layouts/footer.php'); ?>

<?php
	if($resultUser['role'] > 0) {
?>

<!-- SIDEBAR ADMIN -->
<div class="account-body__side-bar">
	<h5 class="account-body__side-bar-heading">My account</h5>
	
	<ul class="account-body__side-bar-list">
		<li class="account-body__side-bar-item">
			<a href="account.php" class="account-body__side-bar-link">Dashboard</a>
		</li>
		<li class="account-body__side-bar-item">
			<a class="account-body__side-bar-link disable">Accounts manager</a>
		</li>
		<li class="account-body__side-bar-item">
			<a class="account-body__side-bar-link disable">Customer orders</a>
		</li>
		<li class="account-body__side-bar-item">
			<a href="admin_products.php" class="account-body__side-bar-link">Shop products</a>
		</li>
		<li class="account-body__side-bar-item">
			<a href="admin_products_insert.php" class="account-body__side-bar-link">Add products</a>
		</li>
		<li class="account-body__side-bar-item">
			<a href="admin_categories.php" class="account-body__side-bar-link">Categories list</a>
		</li>
		<li class="account-body__side-bar-item">
			<a href="admin_categories_insert.php" class="account-body__side-bar-link">New category</a>
		</li>
	</ul>

	<span class="account-body__side-bar-help">Nếu bạn cần trợ giúp hãy gọi cho chúng tôi theo số điện thoại (+84)338-627-330 nhân viên sẽ tư vấn cho bạn!</span>
</div>
<?php
	} else {
		if(isset($_GET['view'])) {
			$getView = $_GET['view']; 
?>

<!-- SIDEBAR CHUYỂN MÀU -->
<div class="account-body__side-bar">
	<h5 class="account-body__side-bar-heading">My account</h5>
	
	<ul class="account-body__side-bar-list">
		<li class="account-body__side-bar-item">
			<a href="account.php?view=dashboard" class="account-body__side-bar-link <?php if($getView == "dashboard") { echo('account-body__side-bar-link--active'); } ?>">Dashboard</a>
		</li>
		<li class="account-body__side-bar-item">
			<a href="account_information.php?view=information" class="account-body__side-bar-link <?php if($getView == "information") { echo('account-body__side-bar-link--active'); } ?>">My information</a>
		</li>
		<li class="account-body__side-bar-item">
			<a href="account_orders.php?view=orders" class="account-body__side-bar-link <?php if($getView == "orders") { echo('account-body__side-bar-link--active'); } ?>">Order history</a>
		</li>
		<li class="account-body__side-bar-item">
			<a class="account-body__side-bar-link disable">Favorites list</a>
		</li>
	</ul>

	<span class="account-body__side-bar-help">Nếu bạn cần trợ giúp hãy gọi cho chúng tôi theo số điện thoại (+84)338-627-330 nhân viên sẽ tư vấn cho bạn!</span>
</div>
<?php 
		} else {
?>

<!-- SIDEBAR CƠ BẢN -->
<div class="account-body__side-bar">
	<h5 class="account-body__side-bar-heading">My account</h5>
	
	<ul class="account-body__side-bar-list">
		<li class="account-body__side-bar-item">
			<a href="account.php?view=dashboard" class="account-body__side-bar-link">Dashboard</a>
		</li>
		<li class="account-body__side-bar-item">
			<a href="account_information.php?view=information" class="account-body__side-bar-link">My information</a>
		</li>
		<li class="account-body__side-bar-item">
			<a href="account_orders.php?view=orders" class="account-body__side-bar-link">Order history</a>
		</li>
		<li class="account-body__side-bar-item">
			<a class="account-body__side-bar-link disable">Favorites list</a>
		</li>
	</ul>

	<span class="account-body__side-bar-help">Nếu bạn cần trợ giúp hãy gọi cho chúng tôi theo số điện thoại (+84)338-627-330 nhân viên sẽ tư vấn cho bạn!</span>
</div>
<?php
		}
	}
?>
<?php include('php/connect.php'); ?>
<?php include('php/checkAuth.php'); ?>
<?php include('php/checkRole.php') ?>
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
						<h5 class="account-body__heading">New Category</h5>
					</div>
					<div class="account-body__content">
						<form class="admin-categories__wrap" method="POST" action="php/adminInsertCategory.php">
							<div class="account-admin__wrap"><!-- FLEX -->
								<div class="admin-categories__container">
									<!-- <div class="admin-categories__list"> -->
										<!-- <div class="admin-categories__item"> -->
											<div class="admin-categories__form"><!-- FLEX -->
												<div class="admin-categories__form-content">
													<div class="admin-categories__form-group">
														<label class="admin-categories__form-title">Tên danh mục:</label>
														<input class="admin-categories__form-input" type="text" name="categoryName" required>
													</div>
													<div class="admin-categories__form-group">
														<label class="admin-categories__form-title">Nhóm:</label>
														<select class="admin-categories__form-select" name="categoryParents">
															<?php
																$queryParentsCategory = mysqli_query($connect, "SELECT * FROM parents_category");
																if(mysqli_num_rows($queryParentsCategory) > 0) {
																	while($resultParentsCategory = mysqli_fetch_array($queryParentsCategory)) {
																		echo('<option value="'.$resultParentsCategory['parents_category_id'].'"');
																		echo('>'.$resultParentsCategory['parents_category_name'].'</option>');
																	}
																}
															?>
														</select>
													</div>
												</div>
											</div>
										<!-- </div> -->
									<!-- </div> -->
								</div>
								<div class="admin-categories__controls">
									<button class="admin-categories__btn btn btn--fill" type="submit" name="createBtn">Tạo danh mục</button>
									<a class="js-guide-btn admin-categories__btn btn btn--fill">Hướng dẫn</a>
									<a href="admin_categories.php" class="admin-categories__btn btn">Quay lại</a>	
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
<script type="text/javascript">
	const adminCategoriesGuideBtn = document.querySelector('.js-guide-btn');

	adminCategoriesGuideBtn.onclick = function() {
		alert('- Nhập đầy đủ thông tin và nhấn Tạo danh mục để thêm danh mục cho cửa hàng.');
	}
</script>
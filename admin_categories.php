<?php include('php/connect.php'); ?>
<?php include('php/checkAuth.php'); ?>
<?php include('php/checkRole.php') ?>
<?php include('php/functions.php'); ?>

<?php include('layouts/head.php'); ?>
<?php include('layouts/header.php'); ?>
<div id="body">
	<?php
		$queryCategories = mysqli_query($connect, "SELECT * FROM category ORDER BY category_id ASC");
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
						<h5 class="account-body__heading">Categories list</h5>
					</div>
					<div class="account-body__content">
						<div class="admin-categories__wrap">
							<div class="account-admin__wrap"><!-- FLEX -->
								<div class="admin-categories__container">
									<div class="admin-categories__list">
										<?php  
											if(mysqli_num_rows($queryCategories) > 0) {
												while($resultCategories = mysqli_fetch_array($queryCategories)) {
										?>
										<div class="admin-categories__item">
											<form class="admin-categories__form" method="POST" action="php/adminUpdateCategory.php"><!-- FLEX -->
												<div class="admin-categories__form-content">

													<!-- CATEGORY ID -->
													<input type="hidden" name="categoryId" value="<?php echo($resultCategories['category_id']); ?>">
													
													<div class="admin-categories__form-group">
														<label class="admin-categories__form-title">Tên danh mục:</label>
														<input class="admin-categories__form-input" type="text" name="categoryName" required value="<?php echo($resultCategories['category_name']); ?>">
													</div>
													<div class="admin-categories__form-group">
														<label class="admin-categories__form-title">Nhóm:</label>
														<select class="admin-categories__form-select" name="categoryParents">
															<?php
																$queryParentsCategory = mysqli_query($connect, "SELECT * FROM parents_category");
																if(mysqli_num_rows($queryParentsCategory) > 0) {
																	while($resultParentsCategory = mysqli_fetch_array($queryParentsCategory)) {
																		echo('<option value="'.$resultParentsCategory['parents_category_id'].'"');
																		if($resultCategories['parents_category_id'] == $resultParentsCategory['parents_category_id']) {
																			echo('selected');
																		}
																		echo('>'.$resultParentsCategory['parents_category_name'].'</option>');
																	}
																}
															?>
														</select>
													</div>
												</div>
												<div class="admin-categories__form-btns">
													<button class="admin-categories__form-btn btn btn--fill" type="submit" name="categoryUpdateBtn">Sửa</button>
													<a href="php/adminDeleteCategory.php?category_id=<?php echo($resultCategories['category_id']); ?>" class="admin-categories__form-btn btn btn--fill js-category-delete">Xóa</a>
												</div>
											</form>
										</div>
										<?php 
												}
											}
										?>
									</div>
								</div>
								<div class="admin-categories__controls">
									<a href="admin_categories_insert.php" class="admin-categories__btn btn btn--fill">Danh mục mới</a>
									<a class="js-guide-btn admin-categories__btn btn btn--fill">Hướng dẫn</a>
									<a href="<?php if(isset($_SERVER["HTTP_REFERER"])) { echo($_SERVER["HTTP_REFERER"]); } 
										else { echo('account.php'); } ?>" class="admin-categories__btn btn">Quay lại</a>	
								</div>
							</div>
						</div>

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
	const adminCategoryDeleteBtns = document.querySelectorAll('.js-category-delete');

	for(adminCategoryDeleteBtn of adminCategoryDeleteBtns) {
		adminCategoryDeleteBtn.onclick = function() {
			const categoryDeleteConfirm = confirm('Bạn có chắc chắn muốn xóa danh mục này?');	
			if(categoryDeleteConfirm == false){
				event.preventDefault();
			}
		}	
	}

	adminCategoriesGuideBtn.onclick = function() {
		alert('- Chỉnh thông tin mà bạn muốn sau đó nhấn sửa để chỉnh sửa. \n - Nhấn xóa để xóa dòng danh mục đó. \n - Nhấn danh mục mới để tiến hành thêm danh mục cho cửa hàng.');
	}
</script>
<?php include('php/connect.php'); ?>
<?php include('php/functions.php') ?>
<?php include('layouts/head.php'); ?>
<?php include('layouts/header.php'); ?>	
<div id="body">
<?php
	//Get Search
	if (isset($_GET['search'])) {
		$getSearchText = $_GET['search'];
	}

	//Get Category
	if(isset($_GET['category'])) {
		$getCategoryId = $_GET['category'];
		$sqlCategoryTitle = "SELECT category_name FROM category WHERE category_id = '$getCategoryId'";
		$queryCategoryTitle = mysqli_query($connect, $sqlCategoryTitle);
		$categoryTitle = mysqli_fetch_assoc($queryCategoryTitle);
	}

	//Get Brand
	if(isset($_GET['brand'])) {
		$getBrandId = $_GET['brand'];
		$resultBrandTitle = mysqli_fetch_assoc(mysqli_query($connect, "SELECT brand_name FROM brand WHERE brand_id = '$getBrandId'"));
	}

	//Get Other
	if(isset($_GET['other'])) {
		$getOtherName = $_GET['other'];
	}
?>
	<h1 class="body__page-heading">
		<span class="body__page-heading-text">
		<?php 
			if (isset($_GET['search'])) {
				echo($getSearchText);
			} else if (isset($_GET['category'])) { 
				echo($categoryTitle['category_name']); 
			} else if (isset($_GET['brand'])) {
				echo($resultBrandTitle['brand_name']);
			} else if (isset($_GET['other'])) {
				if($getOtherName == "sale") {
					echo("Sale");
				}
				if($getOtherName == "luxury") {
					echo("Luxury");
				} 
			}else { 
				echo('SK8 shop');
			}
		?>
		</span>
	</h1>

	<!-- PAGE SEARCH -->
	<div class="body__page-search">
		<div class="body__page-search-wrap">
			<form class="body__page-search-form" method="GET" action="">
				<input class="body__page-search-input" type="text" name="search" placeholder="Tìm kiếm" required>
				<button type="submit" class="body__page-search-btn">
					<i class="body__page-search-icon ti-search"></i>
				</button>
			</form>
		</div>
	</div>

	<!-- BODY CONTAINER -->
	<div class="body__contatiner">
		<div class="body__contatiner-wrap">

			<!-- SIDEBAR FILTER -->
			<div class="body__sidebar">
				<div class="body__sidebar-filter">
					<h5 class="body__sidebar-heading">category</h5>

					<ul class="body__sidebar-filter-list">

						<?php
							//Parents category
							$sqlAllParentsCategory = "SELECT * FROM parents_category";
							$queryParentsCategory = mysqli_query($connect, $sqlAllParentsCategory);
						?>

						<!-- category filter -->
						<?php 
							if (mysqli_num_rows($queryParentsCategory)>0) {
								while($dataParentsCategory = mysqli_fetch_array($queryParentsCategory)) {
						?>
						<li class="body__sidebar-filter-item">
							<h5 class="body__sidebar-filter-heading"><?php echo($dataParentsCategory['parents_category_name']); ?></h5>

							<ul class="filter__list">
							<?php 
								//Categories
								$parentsCategoryId = $dataParentsCategory['parents_category_id'];
								$sqlCategoryByParents = "SELECT * FROM category WHERE parents_category_id='$parentsCategoryId'";
								$queryCategory = mysqli_query($connect, $sqlCategoryByParents);
							?>
							<?php 
								if (mysqli_num_rows($queryCategory)>0) {
									while($dataCategory = mysqli_fetch_array($queryCategory)) {
							?>
								<li class="filter__item">
									<a href="gallery.php?category=<?php echo($dataCategory['category_id']) ?>" class="filter__item-link">
										<span class="filter__item-text
										<?php 
											if((isset($_GET['category'])) && ($getCategoryId == $dataCategory['category_id'])) {
												echo('filter__item-text--active');
											}
										?>"><?php echo($dataCategory['category_name']); ?></span>
									</a>
								</li>
							<?php 
									}//end while
								}//end if
							?>
							</ul>

						</li>
						<?php 
								}//end while
							}//end if
						?>

						<!-- Brand and other filter -->
						<li class="body__sidebar-filter-item">
							<h5 class="body__sidebar-filter-heading">Brand</h5>
							<?php
								$sqlAllBrand = "SELECT * FROM brand ORDER BY brand_name";
								$queryBrand = mysqli_query($connect, $sqlAllBrand);
							?>
							<ul class="filter__list">
								<?php
									if(mysqli_num_rows($queryBrand)>0) {
										while($dataBrand = mysqli_fetch_array($queryBrand)) {
								?>
								<li class="filter__item">
									<a href="gallery.php?brand=<?php echo($dataBrand['brand_id']); ?>" class="filter__item-link">
										<span class="filter__item-text
										<?php 
											if((isset($_GET['brand'])) && ($getBrandId == $dataBrand['brand_id'])) {
												echo('filter__item-text--active');
											}
										?>"><?php echo($dataBrand['brand_name']); ?></span>
									</a>
								</li>
								<?php 	
										}//End while
									}//End if
								?>
							</ul>
							
						</li>
						<li class="body__sidebar-filter-item">
							<h5 class="body__sidebar-filter-heading">Other</h5>

							<ul class="filter__list">
								<li class="filter__item">
									<a href="gallery.php?other=sale" class="filter__item-link">
										<span class="filter__item-text
										<?php 
											if((isset($_GET['other'])) && ($getOtherName == "sale")) {
												echo('filter__item-text--active');
											}
										?>">Sale</span>
									</a>
								</li>
								<li class="filter__item">
									<a href="gallery.php?other=luxury" class="filter__item-link">
										<span class="filter__item-text
										<?php 
											if((isset($_GET['other'])) && ($getOtherName == "luxury")) {
												echo('filter__item-text--active');
											}
										?>">Luxury</span>
									</a>
								</li>
							</ul>							
						</li>

					</ul>

				</div>
			</div>

			<!-- PRODUCTS AREA -->
			<div class="body__product">
				<div class="body__product-area">
					<div class="body__product-list">
						<!-- Luxury modifier: body__product-item--luxury > body__product-sale-price--luxury -->
						<!-- Sale modifier: body__product-sale-price--sale -->
						
						<?php
							if(isset($_GET['search'])) {
								$queryProducts = mysqli_query($connect, "SELECT * FROM sanpham WHERE TENSP LIKE '%$getSearchText%' OR keyword LIKE '%$getSearchText%' ");
							} else if(isset($_GET['category'])) {
								$queryProducts = mysqli_query($connect, "SELECT * FROM sanpham WHERE category_id = '$getCategoryId'");
							} else if(isset($_GET['brand'])) {
								$queryProducts = mysqli_query($connect, "SELECT * FROM sanpham WHERE brand_id = '$getBrandId'");
							} else if(isset($_GET['other'])) {
								if($getOtherName == "sale") {
									$queryProducts = mysqli_query($connect, "SELECT * FROM sanpham WHERE sale = 1");
								}
								if($getOtherName == "luxury") {
									$queryProducts = mysqli_query($connect, "SELECT * FROM sanpham WHERE luxury = 1");
								}
							} else {
								$queryProducts = mysqli_query($connect, "SELECT * FROM sanpham");
							}
						?>

						<?php
							if (isset($queryProducts) && mysqli_num_rows($queryProducts)>0) {
								while ($dataProducts = mysqli_fetch_array($queryProducts)) {
						?>
						<div class="body__product-item 
							<?php if($dataProducts['luxury'] == 1) {echo('body__product-item--luxury'); } ?>">
							<a href="product.php?product=<?php echo($dataProducts['MASP']); ?>" class="body__product-item-link">

								<div class="body__product-item-img" style="background-image: url(upload-img/<?php echo($dataProducts['HINHSP']); ?>);"></div>

								<div class="body__product-item-info">
									<h5 class="body__product-item-name"><?php echo($dataProducts['TENSP']); ?></h5>
									<div class="body__product-item-price">
										<?php  
											$standardPrice = convertToVnd($dataProducts['GIASP']);
											$salePrice = convertToVnd($dataProducts['sale_price']);
										?>
			
										<span class="body__product-standard-price"><?php if ($dataProducts['GIASP'] != 0) { echo($standardPrice); } ?></span>
										<span class="body__product-sale-price 
											<?php 
												if($dataProducts['sale'] == 1 && $dataProducts['luxury'] == 1) { 
													echo('body__product-sale-price--luxury'); 
												} else if($dataProducts['luxury'] == 1) {
													echo('body__product-sale-price--luxury'); 
												} else if($dataProducts['sale'] == 1) {
													echo('body__product-sale-price--sale');
												}
											?> ">
											<?php echo($salePrice); ?>
										</span>											
									</div>
								</div>

							</a>
						</div>
						<?php 
								} //end while
							} else {
								echo ('<h5 class="body__product-list-empty">Không có sản phẩm :(</h5>');
							}
						?>

					</div>
				</div>
			</div>

		</div>
	</div>
</div>
<?php include('layouts/footer.php'); ?>


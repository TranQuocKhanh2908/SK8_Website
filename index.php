<?php include('php/connect.php'); ?>
<?php include('php/functions.php'); ?>
<?php include('layouts/head.php'); ?>
<?php include('layouts/header.php'); ?>
<div id="body">

	<!-- BODY TOP --> 
	<div id="featured">
		<header class="body__top-img" style="background-image: url(images/VT_skateboarding.jpg);"></header>
		<a href="gallery.php?other=sale" class="body__sale-link">
			<div class="body__sale-img" style="background-image: url(images/shop_sale_img.jpg);"></div>
		</a>
		<div>
			<h2>#1 skateshop of hcm city</h2>
			<span><i class="body__top-icon ti-pin-alt"></i> Đa dạng màu sắc, thương hiệu,...</span>
			<span><i class="body__top-icon ti-pin-alt"></i> Từ bình dân đến luxury</span>
			<span><i class="body__top-icon ti-pin-alt"></i> Nhập hàng trực tiếp từ nước ngoài</span>
			<a href="gallery.php" class="more">Ghé SK8 shop ngay</a>
		</div>
	</div>

	<!-- BODY SKATE & HOODIE -->
	<div class="body__mid">

		<!-- content left -->
		<div class="body__mid-content">
			<a href="gallery.php?search=skateboard" class="body__mid-content-link">
				<div class="body__mid-cotent-img" style="background-image: url(images/skate_category_img.jpg);"></div>
				<div class="body__mid-cotent-text">
					<h4 class="body__mid-text-heading">Những chiếc ván bền bỉ</h4>
					<span class="body__mid-text-description">Shop Skate</span>
				</div>
			</a>
		</div>

		<!-- content right -->
		<div class="body__mid-content">
			<a href="gallery.php?category=8" class="body__mid-content-link">
				<div class="body__mid-cotent-img" style="background-image: url(images/hoodie_category_img.jpg);"></div>
				<div class="body__mid-cotent-text">
					<h4 class="body__mid-text-heading">Thời trang táo bạo và cổ điển</h4>
					<span class="body__mid-text-description">Shop Hoodies & Fleece</span>
				</div>
			</a>
		</div>
	</div>
	
	<!-- BODY NEW ARRIVAL -->
	<div class="body__new-arrival">
		<h2 class="body__new-arrival-heading">New arrivals</h2>
		<div class="body__new-arrival-wrap">

			<!-- CONTENT LEFT -->
			<div class="body__new-arrival-product-list">
			<?php 
				$sqlNewArrivalProducts = "SELECT * FROM sanpham ORDER BY MASP DESC LIMIT 4";
				$queryNewArrivalProducts = mysqli_query($connect, $sqlNewArrivalProducts);
			?>
			<?php 
				if(mysqli_num_rows($queryNewArrivalProducts)>0) {
					while ($dataNewArrivalProducts = mysqli_fetch_array($queryNewArrivalProducts)) {
						$newArrivalPrices = convertToVnd($dataNewArrivalProducts['sale_price']);
			?>
				<div class="body__new-arrival-product-item">
					<a href="product.php?product=<?php echo($dataNewArrivalProducts['MASP']); ?>" class="body__new-arrival-product-link">
						<div class="body__new-arrival-product-item-img" style="background-image: url(upload-img/<?php echo($dataNewArrivalProducts['HINHSP']); ?>);"></div>
						<div class="body__new-arrival-product-item-info">
							<h3 class="body__new-arrival-product-item-name"><?php echo($dataNewArrivalProducts['TENSP']); ?></h3>
							<span class="body__new-arrival-product-item-price"><?php echo($newArrivalPrices); ?></span>
						</div>
					</a>
				</div>
			<?php 
					}//End while
				}//End if
			?>
			</div>

			<!-- CONTENT RIGHT -->
			<div class="body__new-arrival-img" style="background-image: url(images/skateboarding-70s-13.jpg);"></div>
		</div>
	</div>

	<!-- BODY TEES & JACKETS -->
	<div class="body__mid">

		<!-- content left -->
		<div class="body__mid-content">
			<a href="gallery.php?category=7" class="body__mid-content-link">
				<div class="body__mid-cotent-img" style="background-image: url(images/tee_category_img.jpg);"></div>
				<div class="body__mid-cotent-text">
					<span class="body__mid-text-description">Shop Tees</span>
				</div>
			</a>
		</div>

		<!-- content right -->
		<div class="body__mid-content">
			<a href="gallery.php?category=9" class="body__mid-content-link">
				<div class="body__mid-cotent-img" style="background-image: url(images/jacket_category_img.jpg);"></div>
				<div class="body__mid-cotent-text">
					<span class="body__mid-text-description">Shop Jackets</span>
				</div>
			</a>
		</div>
	</div>

	<!-- BODY COMPLETE SKATEBOARDS -->
	<div class="body__bot">
		<div class="body__bot-wrap">
			<div class="body__bot-header">
				<h2 class="body__bot-heading">Shop Complete Skateboards</h2>
			</div>
			<div class="body__bot-container">
				<div class="body__bot-product-list">
				<?php 
					$sqlCompleteProducts = "SELECT * FROM sanpham WHERE category_id=1 ORDER BY RAND() LIMIT 4";
					$queryCompleteProducts = mysqli_query($connect, $sqlCompleteProducts);
					if(mysqli_num_rows($queryCompleteProducts)>0) {
						while ($dataCompleteProducts = mysqli_fetch_array($queryCompleteProducts)) {
							$CompleteProductsPrice = convertToVnd($dataCompleteProducts['sale_price']);
				?>
					<div class="body__bot-product-item">
						<a href="product.php?product=<?php echo($dataCompleteProducts['MASP']); ?>" class="body__bot-product-link">
							<div class="body__bot-product-img" style="background-image: url(upload-img/<?php echo($dataCompleteProducts['HINHSP']); ?>);"></div>
							<div class="body__bot-product-info">
								<h5 class="body__bot-product-name"><?php echo($dataCompleteProducts['TENSP']) ?></h5>
								<span class="body__bot-product-price"><?php echo($CompleteProductsPrice) ?></span>
							</div>
						</a>
					</div>
				<?php 
						}//End while
					}//End if
				?>
				</div>
			</div>
		</div>
	</div>

	<!-- ASIDE CATEGORIES -->
	<div class="body__aside">
		<div class="body__aside-container">
			<ul class="body__aside-list">
				<li class="body__aside-item">
					<a href="gallery.php?search=skateboard" class="body__aside-link">
						<span class="body__aside-text">Skateboards</span>
					</a>
				</li>
				<li class="body__aside-item">
					<a href="gallery.php?category=1" class="body__aside-link">
						<span class="body__aside-text">Complete Skateboards</span>
					</a>
				</li>
				<li class="body__aside-item">
					<a href="gallery.php?category=2" class="body__aside-link">
						<span class="body__aside-text">Skateboard Decks</span>
					</a>
				</li>
				<li class="body__aside-item">
					<a href="gallery.php?category=5" class="body__aside-link">
						<span class="body__aside-text">Wheels</span>
					</a>
				</li>
				<li class="body__aside-item">
					<a href="gallery.php?category=6" class="body__aside-link">
						<span class="body__aside-text">Trucks</span>
					</a>
				</li>
				<li class="body__aside-item">
					<a href="gallery.php?category=4" class="body__aside-link">
						<span class="body__aside-text">Grip Tape</span>
					</a>
				</li>
				<li class="body__aside-item">
					<a href="gallery.php?category=10" class="body__aside-link">
						<span class="body__aside-text">Backpacks</span>
					</a>
				</li>
				<li class="body__aside-item">
					<a href="gallery.php?category=12" class="body__aside-link">
						<span class="body__aside-text">Wallets</span>
					</a>
				</li>
				<li class="body__aside-item">
					<a href="gallery.php?other=luxury" class="body__aside-link">
						<span class="body__aside-text">Luxury</span>
					</a>
				</li>
			</ul>
		</div>
	</div>
</div>
<?php include('layouts/footer.php'); ?>

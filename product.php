<?php include('php/connect.php'); ?>
<?php include('php/functions.php'); ?>
<?php include('layouts/head.php'); ?>
<?php include('layouts/header.php'); ?>
<div id="body">
<?php include('php/getProduct.php') ?>

	<h5 class="product-info__heading">
		<span class="product-info__heading-text">product / <?php echo($resultProductInfo['TENSP']); ?></span>
	</h5>

	<!-- PRODUCT INFO -->
	<div class="product-info__container">
		<div class="product-info__area">

			<!-- LEFT IMG -->
			<div class="product-info__img" style="background-image: url(upload-img/<?php echo($resultProductInfo['HINHSP']); ?>);"></div>
			
			<!-- RIGHT CONTENT -->
			<div class="product-info__details">
				<div class="product-info__details-wrap">
					<div class="product-info__details-content-wrap">
						<h5 class="product-info__details-name"><?php echo($resultProductInfo['TENSP']) ?></h5>
						<div class="product-info__details-prices">
						<?php  
							$productStandardPrice = convertToVnd($resultProductInfo['GIASP']);
							$productSalePrice = convertToVnd($resultProductInfo['sale_price']);

							if($resultProductInfo['sale'] == 1 && $resultProductInfo['luxury'] == 1) {
								echo(
									'<span class="product-info__price-standard">'.$productStandardPrice.'</span>
									<span class="product-info__price-sale product-info__price-sale--luxury">'.$productSalePrice.'</span>'
								);
							} else if($resultProductInfo['sale'] == 1) {
								echo(
									'<span class="product-info__price-standard">'.$productStandardPrice.'</span>
									<span class="product-info__price-sale product-info__price-sale--sale">'.$productSalePrice.'</span>'
								);									
							} else if($resultProductInfo['luxury'] == 1) {
								echo('<span class="product-info__price-sale product-info__price-sale--luxury">'.$productSalePrice.'</span>');
							} else {
								echo('<span class="product-info__price-sale">'.$productSalePrice.'</span>');
							}							
						?>	
								
						</div>

						<span class="product-info__details-promise">
							<i class="product-info__details-promise-icon fas fa-check-circle"></i>Cam kết chính hãng
						</span>

						<div class="product-info__details-rating">
							<span class="product-info__rating-title">Đánh giá:</span>
							<i class="fas fa-star product-info__rating-icon product-info__rating-icon--active"></i>
							<i class="fas fa-star product-info__rating-icon product-info__rating-icon--active"></i>
							<i class="fas fa-star product-info__rating-icon product-info__rating-icon--active"></i>
							<i class="fas fa-star product-info__rating-icon product-info__rating-icon--active"></i>
							<i class="fas fa-star product-info__rating-icon"></i>
						</div>
						<div class="product-info__details-colors">
							<span class="product-info__colors-title">Màu sắc: (1 màu)</span>
							<ul class="product-info__colors-list">
								<li class="product-info__colors-item">
									<a href="" class="product-info__colors-link">
										<div class="product-info__colors-img" style="background-image: url(upload-img/<?php echo($resultProductInfo['HINHSP']); ?>);"></div>
									</a>
								</li>
							</ul>
						</div>
					</div>	
					<div class="product-info__details-btns-wrap">
						<a href="checkout.php?product=<?php echo($resultProductInfo['MASP']); ?>" class="product-info__details-buy btn btn--fill">Mua ngay</a>
						<a class="product-info__details-favourite btn">
							<i class="product-info__details-favourite-icon product-info__details-favourite-icon--active far fa-heart"></i>
							<i class="product-info__details-favourite-icon-fill fas fa-heart"></i>
						</a>
					</div>
					<div class="product-info__details-share">
						<span class="product-info__details-share-text">Chia sẻ:</span>
						<a href="#" class="product-info__details-share-link">
							<i class="product-info__details-share-icon fab fa-facebook-messenger"></i>
						</a>
						<a href="#" class="product-info__details-share-link">
							<i class="product-info__details-share-icon fab fa-facebook"></i>
						</a>
						<a href="#" class="product-info__details-share-link">
							<i class="product-info__details-share-icon fab fa-instagram"></i>
						</a>
						<a href="#" class="product-info__details-share-link">
							<i class="product-info__details-share-icon fab fa-twitter"></i>
						</a>
					</div>
				</div>
			</div>

			<!-- BOTTOM CONTENT -->
			<div class="product-info__descripiton">
				<div class="product-info__descripiton-wrap">
					<!-- LEFT DESCRIPTION -->	
					<div class="product-info__descripiton-content">
						<h5 class="product-info__descripiton-heading">Mô tả sản phẩm</h5>
						<span class="product-info__descripiton-title"><?php echo($resultProductInfo['TENSP']); ?></span>
						<p class="product-info__descripiton-text"><?php echo($resultProductInfo['product_description']); ?></p>
					</div>

					<!-- RIGHT DESCRIPTION -->
					<div class="product-info__descripiton-content">
						<h5 class="product-info__descripiton-heading">Chính sách giao hàng & đổi trả</h5>
						<span class="product-info__descripiton-title">Giao hàng</span>
						<p class="product-info__descripiton-text">Mất từ hai đến ba ngày tùy vào vị trí của bạn và tình trạng kho hàng của đơn vị vận chuyển.</p>
						<span class="product-info__descripiton-title">Đổi trả</span>
						<p class="product-info__descripiton-text">Bạn có thể hủy đơn trong 24h sau khi đặt hàng trên website. Đổi trả trong vòng 30 ngày nếu sản phẩm có lỗi do nhà sản xuất.</p>
						<span class="product-info__descripiton-title">Thanh toán</span>
						<p class="product-info__descripiton-text">Thanh toán bằng tiền mặt sau khi nhận hàng từ shipper(COD).</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- RECOMMED PRODUCT -->
	<div class="product-recommend__container">
		<div class="product-recommend__heading">
			<h2 class="product-recommend__heading-text">Đề xuất cho bạn</h2>
		</div>

		<div class="product-recommend__product">
			<div class="product-recommend__product-list">
			<?php
				$sqlRecommendProducts = "SELECT * FROM sanpham WHERE MASP!='$getProductId' ORDER BY RAND() LIMIT 4";
				$queryRecommedProducts = mysqli_query($connect, $sqlRecommendProducts);
				if(mysqli_num_rows($queryRecommedProducts)>0) {
					while($resultRecommedProducts = mysqli_fetch_array($queryRecommedProducts)) {
						$recommedProductsPrice = convertToVnd($resultRecommedProducts['sale_price']);
			?>
				<div class="product-recommend__product-item">
					<a href="product.php?product=<?php echo($resultRecommedProducts['MASP']); ?>" class="product-recommend__product-link">
						<div class="product-recommend__product-img" style="background-image: url(upload-img/<?php echo($resultRecommedProducts['HINHSP']); ?>);"></div>
						<div class="product-recommend__product-info">
							<h5 class="product-recommend__product-name"><?php echo($resultRecommedProducts['TENSP']); ?></h5>
							<span class="product-recommend__product-price"><?php echo($recommedProductsPrice); ?></span>
						</div>
					</a>
				</div>
			<?php
					}//Endwhile
				}//Endif
			?>
			</div>
		</div>
	</div>

	<!-- MAY ALSO LIKE -->
	<div class="product-recommend__container">
		<div class="product-recommend__heading">
			<h2 class="product-recommend__heading-text">Có thể bạn cũng thích</h2>
		</div>

		<div class="product-recommend__product">
			<div class="product-recommend__product-list">
			<?php
				$productInfoId = $resultProductInfo['category_id'];
				$sqlSameProducts = "SELECT * FROM sanpham WHERE category_id='$productInfoId' AND MASP!='$getProductId' ORDER BY RAND() LIMIT 4";
				$querySameProducts = mysqli_query($connect, $sqlSameProducts);
				if(mysqli_num_rows($querySameProducts)>0) {
					while($resultSameProducts = mysqli_fetch_array($querySameProducts)) {
						$sameProductsPrice = convertToVnd($resultSameProducts['sale_price']);
			?>
				<div class="product-recommend__product-item">
					<a href="product.php?product=<?php echo($resultSameProducts['MASP']); ?>" class="product-recommend__product-link">
						<div class="product-recommend__product-img" style="background-image: url(upload-img/<?php echo($resultSameProducts['HINHSP']); ?>);"></div>
						<div class="product-recommend__product-info">
							<h5 class="product-recommend__product-name"><?php echo($resultSameProducts['TENSP']); ?></h5>
							<span class="product-recommend__product-price"><?php echo($sameProductsPrice); ?></span>
						</div>
					</a>
				</div>
			<?php
					}//Endwhile
				}//Endif
			?>
			</div>	
		</div>
	</div>

</div>
<?php include('layouts/footer.php'); ?>

<script type="text/javascript">

// FAVOURIRTE BUTTON CHANGE WHEN CLICK
const heart = document.querySelector('.product-info__details-favourite-icon');
const heartFill = document.querySelector('.product-info__details-favourite-icon-fill');
const favouriteBtn = document.querySelector('.product-info__details-favourite');

favouriteBtn.onclick = function() {
	if(heart.classList.contains('product-info__details-favourite-icon--active')) {
		heart.classList.remove('product-info__details-favourite-icon--active');
		heartFill.classList.add('product-info__details-favourite-icon-fill--active');
	} else {
		heart.classList.add('product-info__details-favourite-icon--active');
		heartFill.classList.remove('product-info__details-favourite-icon-fill--active');
	}
}
</script>
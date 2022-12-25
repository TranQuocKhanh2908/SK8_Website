<div id="header">
	<div class="header__top">
		<ul class="header__top-list">
			<li class="header__top-item">
				<div class="header__top-title-wrap">
					<span class="header__top-title header__top-title--bold header__top-item--separate">Tặng kèm griptape</span>
					<span class="header__top-title">khi mua deck</span>
				</div>
			</li>
			<li class="header__top-item">
				<div class="header__top-title-wrap">
					<span class="header__top-title header__top-title--bold">Giao hàng miễn phí</span>
					<span class="header__top-title">cho đơn hàng trên 500K</span>
				</div>
			</li>
		</ul>
<?php
	if(isset($_SESSION['DTKH'])) {
		$getSessionDtkh = $_SESSION['DTKH'];
		$sqlUser = "SELECT * FROM khachhang WHERE DTKH = '$getSessionDtkh'";
		$queryUser = mysqli_query ($connect,$sqlUser);
		$resultUser = mysqli_fetch_assoc($queryUser);

		if($resultUser['role'] > 0) {
?>
			<div class="header__top-user">
				<a href="account.php" class="header__top-user-link">
					<i class="header__top-user-icon ti-user"></i>
					<span class="header__top-user-name"><?php echo($resultUser['TENKH']); ?></span>
				</a>
				<ul class="header__top-user-menu">
					<li class="header__top-user-menu-item">
						<a href="account.php" class="header__top-user-menu-link">Dashboard</a>
					</li>
					<li class="header__top-user-menu-item">
						<a class="header__top-user-menu-link disable">Khách hàng</a>
					</li>
					<li class="header__top-user-menu-item">
						<a class="header__top-user-menu-link disable">Đơn hàng</a>
					</li>
					<li class="header__top-user-menu-item">
						<a href="admin_products.php" class="header__top-user-menu-link">Sản phẩm</a>
					</li>
					<li class="header__top-user-menu-item">
						<a href="admin_categories.php" class="header__top-user-menu-link">Danh mục</a>
					</li>
					<li class="header__top-user-menu-item">
						<a href="./php/logout.php" class="header__top-user-menu-link">Đăng xuất</a>
						<i class="header__top-user-menu-icon ti-angle-right"></i>
					</li>
				</ul>
				<input class="js-user-session" type="hidden" name="userSession" value="<?php echo($getSessionDtkh); ?>">
			</div>
	<?php 
		} else {
	?>
		<div class="header__top-user">
			<a href="account.php?view=dashboard" class="header__top-user-link">
				<i class="header__top-user-icon ti-user"></i>
				<span class="header__top-user-name"><?php echo($resultUser['TENKH']); ?></span>
			</a>
			<ul class="header__top-user-menu">
				<li class="header__top-user-menu-item">
					<a href="account.php?view=dashboard" class="header__top-user-menu-link">Dashboard</a>
				</li>
				<li class="header__top-user-menu-item">
					<a href="account_information.php?view=information" class="header__top-user-menu-link">Thông tin tài khoản</a>
				</li>
				<li class="header__top-user-menu-item">
					<a href="account_orders.php?view=orders" class="header__top-user-menu-link">Đơn hàng của tôi</a>
				</li>
				<li class="header__top-user-menu-item">
					<a class="header__top-user-menu-link disable">Wishlist</a>
				</li>
				<li class="header__top-user-menu-item">
					<a href="./php/logout.php" class="header__top-user-menu-link">Đăng xuất</a>
					<i class="header__top-user-menu-icon ti-angle-right"></i>
				</li>
			</ul>
			<input class="js-user-session" type="hidden" name="userSession" value="<?php echo($getSessionDtkh); ?>">
		</div>
<?php
		}
	}//Endif
	else {
?>
		<ul class="header__top-list">
			<li class="header__top-item">
				<span class="header__top-item-link header__top-item--separate js-register-btn">Đăng ký</span>
			</li>
			<li class="header__top-item">
				<span class="header__top-item-link js-login-btn">Đăng nhập</span>
			</li>
		</ul>
<?php
	}//Endelse
?>
	</div>
	<div class="header__mid">
		<div class="header__mid-logo">
			<a href="index.php" class="header__mid-logo-link">
				<img src="images/SK8_logo.png" alt="logo" class="header__mid-logo-img">
			</a>
		</div>
	
		<div class="header__mid-navbar">
			<ul class="header__mid-navbar-list">
				<li class="header__mid-navbar-item">
					<a class="header__mid-navbar-link" href="index.php">
						<span class="header__mid-navbar-text">Home</span> 
					</a>
				</li>	
				<li class="header__mid-navbar-item">
					<a class="header__mid-navbar-link" href="about.php">
						<span class="header__mid-navbar-text">about</span> 
					</a>
				</li>
				<li class="header__mid-navbar-item">
					<a class="header__mid-navbar-link" href="gallery.php">
						<span class="header__mid-navbar-text">SK8 shop</span> 
					</a>
				</li>
				<li class="header__mid-navbar-item">
					<a class="header__mid-navbar-link" href="gallery.php?search=accessories">
						<span class="header__mid-navbar-text">Accessories</span> 
					</a>
				</li>
				<li class="header__mid-navbar-item">
					<a class="header__mid-navbar-link" href="gallery.php?other=sale">
						<span class="header__mid-navbar-text">SALE</span> 
					</a>
				</li>
				<li class="header__mid-navbar-item">
					<a class="header__mid-navbar-link" href="gallery.php?other=luxury">
						<span class="header__mid-navbar-text">Luxury</span>
					</a>
				</li>
			</ul>
		</div>

		<div class="header__mid-notifi">
			<div class="header__notifi-wrap">
				<span class="header__notifi-heading">
					Thông báo<i class="header__notifi-icon ti-bell"></i>
				</span>

				<div class="header__notifi-drop">
					<div class="header__notifi-head">
						<h3 class="header__notifi-head-text">Thông báo khuyến mãi</h3>
					</div>
					<ul class="header__notifi-list">
						<li class="header__notifi-item">
							<a href="gallery.php" class="header__notifi-item-link">
								<h3 class="header__notifi-item-heading">SK8 4 life</h3>
								<span class="header__notifi-item-content">Ghé SK8 shop chốt đơn ngay để không bỏ lỡ những mặt hàng tốt nhất bạn nhé!</span>
							</a>
						</li>
						<li class="header__notifi-item">
							<a href="gallery.php?other=sale" class="header__notifi-item-link">
								<h3 class="header__notifi-item-heading">SALE</h3>
								<span class="header__notifi-item-content">Mua chiếc ván bạn thích với giá cực kỳ ưu đãi!</span>
							</a>
						</li>
						<li class="header__notifi-item">
							<a href="gallery.php?brand=2" class="header__notifi-item-link">
								<h3 class="header__notifi-item-heading">New arrival</h3>
								<span class="header__notifi-item-content">Có sản phẩm mới từ nhà Baker nè các homie!</span>
							</a>
						</li>
					</ul>
					<div class="header__notifi-foot"></div>
				</div>
			</div>
		</div>
	</div>

	<!-- MODAL ĐĂNG KÝ / ĐĂNG NHẬP -->
	<div class="modal <?php if(isset($_SESSION['registerMessage']) || isset($_SESSION['loginMessage'])) { echo("modal--open"); } ?> js-login-modal">
		<div class="modal__overlay"></div>
		<div class="modal__body">

			<!-- FORM ĐĂNG NHẬP -->
			<form action="php/login.php" method="POST" class="auth-form auth-form--login 
				<?php
					if(isset($_SESSION['loginMessage'])) {
						echo("auth-form--open");
					} 
				?>">
				<div class="auth-form__container">
					<div class="auth-form__header">
						<h2 class="auth-form__heading">Đăng nhập</h2>
						<div class="auth-form__close">
							<i class="auth-form__close-icon ti-close"></i>
						</div>
						<div class="auth-form__promo">
							<div class="auth-form__promo-img" style="background-image: url(images/Sk8_logo_mini.png);"></div>
							<span class="auth-form__promo-text">Đăng nhập để mua hàng nhanh chóng tại SK8</span>
						</div>
					</div>
					<div class="auth-form__message <?php if(isset($_SESSION['loginMessage'])) { echo("auth-form__message--open"); } ?>">
						<span class="auth-form__message-text"><?php 
							if(isset($_SESSION['loginMessage'])) {
								$loginMessage = $_SESSION['loginMessage']; 
								echo($loginMessage);
							} 
						?></span>
					</div>
					<div class="auth-form__form">
						<div class="auth-form__group">
							<input name="loginUserNumber" type="text" class="auth-form__input" placeholder="Số điện thoại" required>
							<i class="auth-form__input-icon fas fa-exclamation-circle"></i>
						</div>
						<div class="auth-form__group">
							<input name="loginUserPassword" type="password" class="auth-form__input" placeholder="Mật khẩu" required>
							<i class="auth-form__input-icon fas fa-exclamation-circle"></i>
						</div>
					</div>

					<div class="auth-form__controls">
						<button name="loginBtn" type="submit" class="js-submit-btn auth-form__controls-forward btn btn--fill">Đăng nhập</button>
						<span class="auth-form__controls-switch js-switch-btn">Đăng ký tài khoản SK8 <i class="auth-form__controls-switch-icon ti-angle-right"></i></span>
					</div>
					
				</div>
			</form>

			<!-- FORM ĐĂNG KÝ -->
			<form action="php/register.php" method="POST" class="auth-form auth-form--register 
				<?php
					if(isset($_SESSION['registerMessage'])) {
						echo("auth-form--open");
					} 
				?>">
				<div class="auth-form__container">

					<div class="auth-form__header">
						<h2 class="auth-form__heading">Đăng ký</h2>
						<div class="auth-form__close">
							<i class="auth-form__close-icon ti-close"></i>
						</div>
						<div class="auth-form__promo">
							<div class="auth-form__promo-img" style="background-image: url(images/Sk8_logo_mini.png);"></div>
							<span class="auth-form__promo-text">Đăng ký tài khoản để hưởng muôn vàn ưu đãi từ SK8</span>
						</div>
					</div>
					<div class="auth-form__message <?php if(isset($_SESSION['registerMessage'])) { echo("auth-form__message--open"); } ?>">
						<span class="auth-form__message-text"><?php 
							if(isset($_SESSION['registerMessage'])) {
								$registerMessage = $_SESSION['registerMessage']; 
								echo($registerMessage); 
							}
						?></span>
					</div>
					<div class="auth-form__form">
						<div class="auth-form__group">
							<input name="userName" type="text" class="js-name-input auth-form__input" placeholder="Họ tên của bạn" required>
							<i class="js-name-error auth-form__input-icon fas fa-exclamation-circle"></i>
						</div>
						<div class="auth-form__group">
							<input name="userNumber" type="tel" class="js-number-input auth-form__input" placeholder="Số điện thoại" required>
							<i class="js-number-error auth-form__input-icon fas fa-exclamation-circle"></i>
						</div>
						<div class="auth-form__group">
							<input name="userAddress" type="text" class="js-address-input auth-form__input" placeholder="Địa chỉ nhà" required>
							<i class="js-address-error auth-form__input-icon fas fa-exclamation-circle"></i>
						</div>
						<div class="auth-form__group">
							<input name="userPassword" type="password" class="js-password-input auth-form__input" placeholder="Mật khẩu" required> 
							<i class="js-password-error auth-form__input-icon fas fa-exclamation-circle"></i>
						</div>
						<div class="auth-form__group">
							<input name="reEnterPassword" type="password" class="js-repassword-input auth-form__input" placeholder="Nhập lại mật khẩu" required> 
							<i class="js-repassword-error auth-form__input-icon fas fa-exclamation-circle"></i>
						</div>
					</div>

					<div class="auth-form__controls">
						<button name="registerBtn" type="submit" class="js-register-submit-btn auth-form__controls-forward btn btn--fill">Đăng ký</button>
						<span class="auth-form__controls-switch js-switch-btn">Đã có tài khoản SK8 <i class="auth-form__controls-switch-icon ti-angle-right"></i></span>
					</div>
					
				</div>
			</form>
			
		</div>
	</div>

</div>

<!-- GỠ MESSAGES SAU KHI LOAD LẠI -->
<?php 
	unset($_SESSION['registerMessage']); 
	unset($_SESSION['loginMessage']);
?>

<!-- AUTH JAVASCRIPS -->
<script type="text/javascript">


	// ---KHAI BÁO CHUNG---
	var userSession = document.querySelector('.js-user-session'); 
	const registerBtn = document.querySelector('.js-register-btn');
	const loginBtn = document.querySelector('.js-login-btn');
	const modal = document.querySelector('.js-login-modal');
	const modalBody = document.querySelector('.modal__body');
	const registerForm = document.querySelector('.auth-form--register');
	const loginForm = document.querySelector('.auth-form--login');
	const forms = [registerForm, loginForm];
	const closeBtns = document.querySelectorAll('.auth-form__close');
	const registerSubmitBtn = document.querySelector('.js-register-submit-btn');
	const switchBtns = document.querySelectorAll('.js-switch-btn');
	const formInputs = document.querySelectorAll('.auth-form__input');
	const formInputIcons = document.querySelectorAll('.auth-form__input-icon');
	const messageBoxs = document.querySelectorAll('.auth-form__message');
	const messages = document.querySelectorAll('.auth-form__message-text');
	

	// ---MODALS CONTROL--- 

	// OPEN MODAL & FORM WHEN CLICK
	function openRegister() {
		modal.classList.add('modal--open');
		registerForm.classList.add('auth-form--open');
	}
	function openLogin() {
		modal.classList.add('modal--open');
		loginForm.classList.add('auth-form--open');
	}

	if(userSession == null) {
		registerBtn.onclick = function() {
			openRegister();
		}
		loginBtn.onclick = function() {
			openLogin();
		}
	}

	//ClOSE MODAL & FORM WHEN CLICK
	for(closeBtn of closeBtns) {
		closeBtn.addEventListener('click', function() {
			modal.classList.remove('modal--open');
			registerForm.classList.remove('auth-form--open');
			loginForm.classList.remove('auth-form--open');
		})
	}

	//SWITCH FROM WHEN CLICK
	for(switchBtn of switchBtns) {
		switchBtn.addEventListener('click', function() {
			for(form of forms) {
				if(form.classList.contains('auth-form--open')) {
					form.classList.remove('auth-form--open');
				} else {
					form.classList.add('auth-form--open');
				}
			}
		})
	}

	// ---FORMS VALIDATE---
	registerForm.onsubmit = function() {
		return registerValidate();
	}

	function removeAscent (str) {
	  if (str === null || str === undefined) return str;
	  str = str.toLowerCase();
	  str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
	  str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
	  str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
	  str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
	  str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
	  str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
	  str = str.replace(/đ/g, "d");
	  return str;
	}

	// Lấy giá trị input
	function getValue(c) {
		return document.querySelector(c).value.trim().replace(/\s/g, '');
	}
		
	// Hiện tin nhắn
	function showMessage(m) {
		for(message of messages) {
			message.innerText = m;
			if(message.innerText.length > 0) {
				for(messageBox of messageBoxs) {
					messageBox.classList.add('auth-form__message--open');
				}
			}
		}
	}
	
	// Hiện khung và icon lỗi 
	function showError(inp, ico) {
		inp.classList.add('auth-form__input--error');
		ico.classList.add('auth-form__input-icon--active');
		inp.focus();
	}

	// XÓA CẢNH BÁO KHI THAY ĐỔI FORMs
	registerForm.addEventListener('input', function() {
		for(messageBox of messageBoxs) {
			messageBox.classList.remove('auth-form__message--open');
		}
		for(formInput of formInputs) {
			formInput.classList.remove('auth-form__input--error');
		}
		for(formInputIcon of formInputIcons) {
			formInputIcon.classList.remove('auth-form__input-icon--active');
		}
	})

	loginForm.addEventListener('input', function() {
		for(messageBox of messageBoxs) {
			messageBox.classList.remove('auth-form__message--open');
		}
		for(formInput of formInputs) {
			formInput.classList.remove('auth-form__input--error');
		}
		for(formInputIcon of formInputIcons) {
			formInputIcon.classList.remove('auth-form__input-icon--active');
		}
	})


	//REGISTER VALIDATE
	function registerValidate() {
		var finish;
		
		// KHAI BÁO CHO REGISTER FORM
		const userNameInput = document.querySelector('.js-name-input');
		const userNameEr = document.querySelector('.js-name-error');
		const userNameValue = getValue('.js-name-input');
		
		const userNumberInput = document.querySelector('.js-number-input');
		const userNumberEr = document.querySelector('.js-number-error');
		const userNumberValue = getValue('.js-number-input');

		const userAddressInput =document.querySelector('.js-address-input');
		const userAddressEr = document.querySelector('.js-address-error');
		const userAddressValue = getValue('.js-address-input');

		const userPasswordInput = document.querySelector('.js-password-input');
		const userPasswordEr = document.querySelector('.js-password-error');
		const userPasswordValue = getValue('.js-password-input');

		const userReEnterPasswordInput = document.querySelector('.js-repassword-input');
		const userReEnterPasswordEr = document.querySelector('.js-repassword-error');
		const userReEnterPasswordValue = getValue('.js-repassword-input');
		
		if(userNameValue == '' || userNameValue.length < 4 || !/^[a-z A-Z]+$/.test(removeAscent(userNameValue))) {
			showMessage('Họ tên phải đầy đủ! Không chứa khoảng trắng, số và ký tự đặc biệt');
			showError(userNameInput, userNameEr);
			finish = false;
		} else if(userNumberValue != '' && !/^[0-9]{10}$/.test(userNumberValue) || userNumberValue == '') {
			showMessage('Số điện thoại phải là số! không có khoảng trắng và đủ 10 chữ số');
			showError(userNumberInput, userNumberEr);
			finish = false;
		} else if(userAddressValue == '' || userAddressValue.length < 8) {
			showMessage('Địa chỉ phải đầy đủ số nhà, đường, quận,...');
			showError(userAddressInput, userAddressEr);
			finish = false;
		} else if(userPasswordValue == '' || userPasswordValue.length < 6) {
			showMessage('Mật khẩu phải có ít nhất 6 ký tự');
			showError(userPasswordInput, userPasswordEr);
			finish = false;
		} else if(userReEnterPasswordValue != userPasswordValue) {
			showMessage('Mật khẩu nhập lại không trùng khớp');
			showError(userReEnterPasswordInput, userReEnterPasswordEr);
			finish = false;
		} else {
			finish = true;
		}
		return finish;
	}

</script>
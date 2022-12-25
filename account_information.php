<?php include('php/checkAuth.php'); ?>

<?php include('php/connect.php'); ?>
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
				
				<!-- RIGHT USER INFO CONTAINER -->
				<div class="account-body__container">
					<div class="account-body__header">
						<h5 class="account-body__heading">My information</h5>
					</div>

					<div class="account-body__content">
						
						<div class="account-body__info-wrap"><!-- FLEX -->

							<!-- LEFT SECTION -->
							<div class="account-body__info-section">
								<div class="account-body__info-content">
									<h5 class="account-info__heading">Thông tin cá nhân</h5>

									<!-- UPDATE INFORMATION FORM -->
									<form class="account-info__form js-info-form" method="POST" action="php/userInfoUpdate.php">
										<div class="account-info__form-group">
											<label class="account-info__form-title" for="infoUserName">Họ và tên</label>
											<input class="account-info__form-input" type="text" name="infoUserName" required id="infoUserName" value="<?php echo($resultUser['TENKH']); ?>">
										</div>
										
										<div class="account-info__form-group">
											<label class="account-info__form-title" for="infoUserTel">Số điện thoại</label>
											<input class="account-info__form-input" type="tel" name="infoUserTel" required id="infoUserTel" value="<?php echo($resultUser['DTKH']); ?>">
										</div>
										
										<div class="account-info__form-group">
											<label class="account-info__form-title" for="infoUserAddress">Địa chỉ nhà</label>
											<input class="account-info__form-input" type="text" name="infoUserAddress" required id="infoUserAddress" value="<?php echo($resultUser['DCKH']) ?>">
										</div>

										<div class="account-info__form-control">
											<button class="account-info__form-btn btn btn--fill" type="submit" name="infoUpdateBtn">Chỉnh sửa thông tin</button>
										</div>
									</form>
								</div>
							</div>

							<!-- RIGHT SECTION -->
							<div class="account-body__info-section">
								<div class="account-body__info-content">
									<h5 class="account-info__heading">Đổi mật khẩu</h5>

									<!-- UPDATE PASSWORD FORM -->
									<form class="account-info__form js-password-form" method="POST" action="php/userInfoUpdate.php">
										<div class="account-info__form-group">
											<label class="account-info__form-title" for="infoUserPassword">Mật khẩu hiện tại</label>
											<input class="account-info__form-input" type="password" name="infoUserPassword" required id="infoUserPassword">
										</div>
										
										<div class="account-info__form-group">
											<label class="account-info__form-title" for="infoUserNewPassword">Mật khẩu mới</label>
											<input class="account-info__form-input" type="password" name="infoUserNewPassword" required id="infoUserNewPassword">
										</div>
										
										<div class="account-info__form-group">
											<label class="account-info__form-title" for="infoUserReNewPassword">Nhập lại mật khẩu mới</label>
											<input class="account-info__form-input" type="password" name="infoUserReNewPassword" required id="infoUserReNewPassword">
										</div>
										<div class="account-info__form-control">
											<button class="account-info__form-btn btn btn--fill" type="submit" name="passwordUpdateBtn">Chỉnh sửa mật khẩu</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include('layouts/footer.php'); ?>

<?php
	if(isset($_SESSION['updateMessage'])) {
		echo('<script type="text/javascript">
			alert("'.$_SESSION['updateMessage'].'");
		</script>');
	}
	unset($_SESSION['updateMessage']);
?>

<!-- JAVASCRIPTS -->
<script type="text/javascript">

	// INFORMATION UPDATE FORM
	const accountInfoForm = document.querySelector('.js-info-form');

	// PASSWORD UPDATE FOR
	const accountPasswordForm = document.querySelector('.js-password-form');

	function getValueById(id) {
		return document.getElementById(id).value.trim().replace(/\s/g, '');
	}

	accountInfoForm.onsubmit = function() {
		return infoUpdateValidate();
	}
	accountPasswordForm.onsubmit = function() {
		return passwordUpdateValidate();
	}

	function infoUpdateValidate() {
		var infoUpdateFinish;
		const infoUserNameValue = getValueById("infoUserName");
		const infoUserTelValue = getValueById("infoUserTel");
		const infoUserAddressValue = getValueById("infoUserAddress");
		
		if(infoUserNameValue == '' || infoUserNameValue.length < 4 || !/^[a-z A-Z]+$/.test(removeAscent(infoUserNameValue))) {
			alert("Họ và tên không hợp lệ, vui lòng kiểm tra lại!");
			infoUpdateFinish = false;
		} else if(infoUserTelValue != '' && !/^[0-9]{10}$/.test(infoUserTelValue) || infoUserTelValue == '') {
			alert("Số điện thoại không hợp lệ, vui lòng kiểm tra lại!");
			infoUpdateFinish = false;
		} else if(infoUserAddressValue == '' || infoUserAddressValue.length < 8) {
			alert("Địa chỉ nhà không hợp lệ, vui lòng kiểm tra lại!");
			infoUpdateFinish = false;
		}
		return infoUpdateFinish;
	}

	function passwordUpdateValidate() {
		var passwordUpdateFinish;
		const infoUserPasswordValue = getValueById("infoUserPassword");
		const infoUserNewPasswordValue = getValueById("infoUserNewPassword");
		const infoUserReNewPasswordValue = getValueById("infoUserReNewPassword");

		if(infoUserNewPasswordValue == '' || infoUserNewPasswordValue.length < 6) {
			alert("Mật khẩu mới phải có ít nhất 6 ký tự!");
			passwordUpdateFinish = false;
		} else if(infoUserReNewPasswordValue != infoUserNewPasswordValue) {
			alert("Mật khẩu nhập lại không trùng khớp!");
			passwordUpdateFinish = false;
		}
		return passwordUpdateFinish;
	}
</script>
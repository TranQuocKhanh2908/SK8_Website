<!-- USER LOGIN -->
<?php
	include('connect.php');
	if(isset($_SESSION['loginMessage'])) { unset($_SESSION['loginMessage']); }

	if(isset($_POST['loginBtn'])) {
		$loginUserNumber = $_POST['loginUserNumber'];
		$loginUserPassword = $_POST['loginUserPassword'];
		$loginNumberCheck = mysqli_query($connect, "SELECT * FROM khachhang WHERE DTKH='$loginUserNumber'");
		$loginPasswordCheck = mysqli_query($connect, "SELECT * FROM khachhang WHERE MKKH='$loginUserPassword'");

		if(mysqli_num_rows($loginNumberCheck) == 1) {
			if(mysqli_num_rows($loginPasswordCheck) == 1) {
				if(isset($_SERVER["HTTP_REFERER"])) {
					$_SESSION['DTKH'] = $loginUserNumber;
					header("Location: " . $_SERVER["HTTP_REFERER"]);
				} else {
					header("Location: ../index.php");
				} 
			} else {
				if(isset($_SERVER["HTTP_REFERER"])) {
					$_SESSION['loginMessage'] = "Sai mật khẩu";
					header("Location: " . $_SERVER["HTTP_REFERER"]);
				} else {
					header("Location: ../index.php");
				}
			}
		} else {
			if(isset($_SERVER["HTTP_REFERER"])) {
				$_SESSION['loginMessage'] = "Không thấy số điện thoại của bạn, hãy đăng ký hoặc sử dụng số khác";
				header("Location: " . $_SERVER["HTTP_REFERER"]);
			} else {
				header("Location: ../index.php");
			}
		}
	} else {
		header("Location: ../index.php");
	} 
?>
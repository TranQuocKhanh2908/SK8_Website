<!-- USER INFOMATION UPDATE -->
<?php 
	include('connect.php');
	include('getUser.php');
	if(isset($_SESSION['updateMessage'])) { unset($_SESSION['updateMessage']); }

	if(isset($_POST['infoUpdateBtn'])) {
		$userId = $resultUser['user_id'];
		$infoUserName = $_POST['infoUserName'];
		$infoUserTel = $_POST['infoUserTel'];
		$infoUserAddress = $_POST['infoUserAddress'];

		$infoUserUpdate = "UPDATE khachhang SET TENKH = '$infoUserName', DTKH = '$infoUserTel', DCKH = '$infoUserAddress' WHERE user_id = '$userId'";
		mysqli_query($connect, $infoUserUpdate);
		$_SESSION['DTKH'] = $infoUserTel;
		
		if (isset($_SERVER["HTTP_REFERER"])) {
			$_SESSION['updateMessage'] = "Cập nhật thành công!";
  	  		header("Location: " . $_SERVER["HTTP_REFERER"]);
		} else {
			header("Location: ../index.php");
		}

	} else if(isset($_POST['passwordUpdateBtn'])) {
		$userId = $resultUser['user_id'];
		$infoUserPassword = $_POST['infoUserPassword'];
		$infoUserNewPassword = $_POST['infoUserNewPassword'];
		$infoUserPasswordCheck = mysqli_query($connect, "SELECT * FROM khachhang WHERE MKKH='$infoUserPassword'");

		if(mysqli_num_rows($infoUserPasswordCheck) == 1) {
			$infoUserPasswordUpdate = "UPDATE khachhang SET MKKH = '$infoUserNewPassword' WHERE user_id = '$userId'";
			mysqli_query($connect, $infoUserPasswordUpdate);

			if(isset($_SERVER["HTTP_REFERER"])) {
				$_SESSION['updateMessage'] = "Đổi mật khẩu thành công!";
				header("Location: " . $_SERVER["HTTP_REFERER"]);
			} else {
				header("Location: ../index.php");
			}
		} else {
			if(isset($_SERVER["HTTP_REFERER"])) {
				$_SESSION['updateMessage'] = "Mật khẩu hiện tại không đúng, vui lòng thử lại!";
				header("Location: " . $_SERVER["HTTP_REFERER"]);
			} else {
				header("Location: ../index.php");
			}
		}

	} else {
		header("Location: ../index.php");
	}
?>
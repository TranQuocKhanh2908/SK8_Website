<!-- USER REGISTER -->
<?php
	include('connect.php'); 
	if(isset($_SESSION['registerMessage'])) { unset($_SESSION['registerMessage']); }
	
	if(isset($_POST['registerBtn'])) {
		$userName = $_POST['userName'];
		$userNumber = $_POST['userNumber'];
		$userAddress = $_POST['userAddress'];
		$userPassword = $_POST['userPassword'];

		$numberCheck = mysqli_query($connect, "SELECT * FROM khachhang WHERE DTKH='$userNumber'");
		if(mysqli_num_rows($numberCheck) == 1) {
			if (isset($_SERVER["HTTP_REFERER"])) {
				$_SESSION['registerMessage'] = "Số điện thoại đã tồn tại, hãy chọn đăng nhập hoặc sử dụng một số khác";
      	  		header("Location: " . $_SERVER["HTTP_REFERER"]);
    		} else {
    			header("Location: ../index.php");
    		}
		} else {
			$insertUser = "INSERT INTO khachhang (TENKH, DCKH, DTKH, MKKH) VALUE ('{$userName}','{$userAddress}','{$userNumber}','{$userPassword}')";
			mysqli_query ($connect, $insertUser);
			$_SESSION['DTKH'] = $userNumber;
			if (isset($_SERVER["HTTP_REFERER"])) {
      	  		header("Location: " . $_SERVER["HTTP_REFERER"]);
    		} else {
    			header("Location: ../index.php");
    		}
		}
	} else {
		header("Location: ../index.php");
	}
?>
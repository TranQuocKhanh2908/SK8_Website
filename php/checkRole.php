<?php
	if(session_id() === '') {
		session_start();
	}
	if(isset($_SESSION['DTKH'])) {
		$getSessionDtkh = $_SESSION['DTKH'];
		$sqlUser = "SELECT * FROM khachhang WHERE DTKH = '$getSessionDtkh'";
		$queryUser = mysqli_query ($connect,$sqlUser);
		$resultUser = mysqli_fetch_assoc($queryUser);

		if($resultUser['role'] < 1 || $resultUser['role'] == null) {
			header("Location: ./index.php");
		}
	} else {
		header("Location: ./index.php");
	}
?>

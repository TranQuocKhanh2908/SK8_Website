<?php
	if(isset($_SESSION['DTKH'])) {
		$getSessionDtkh = $_SESSION['DTKH'];
		$sqlUser = "SELECT * FROM khachhang WHERE DTKH = '$getSessionDtkh'";
		$queryUser = mysqli_query ($connect,$sqlUser);
		$resultUser = mysqli_fetch_assoc($queryUser);
	}
?>
<?php 
	session_start();
    if (isset($_SESSION['DTKH'])) {
		unset($_SESSION['DTKH']);
		header("Location: " . $_SERVER["HTTP_REFERER"]);
	} else {
		header("location: ../index.php");	
	}
?>
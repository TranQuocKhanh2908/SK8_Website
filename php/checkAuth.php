<?php
	if(session_id() === '') {
		session_start();
	}
	if (!$_SESSION['DTKH']) {
		header('location: ./index.php');
	}
?>
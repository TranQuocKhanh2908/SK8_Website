<?php
	if(session_id() === '') {
		session_start();
	}
	$connect = mysqli_connect("localhost","root","","sk8");
	mysqli_set_charset($connect,'UTF8');
	if(!$connect) { 
		echo'Không thể kết nối đến cơ sở dữ liệu !'; 
	}
?>
<?php 
	include('connect.php');

	if(isset($_GET['category_id'])) {
		$categoryId = $_GET['category_id'];

		$sqlDeleteCategory = "DELETE FROM category WHERE category_id='$categoryId'";
		$queryDeleteCategory = mysqli_query($connect, $sqlDeleteCategory);
		if($queryDeleteCategory) {
			$_SESSION['message'] = "Xóa danh mục thành công!";
			header("Location: " . $_SERVER["HTTP_REFERER"]);
		}	
	} else {
		header("Location: " . $_SERVER["HTTP_REFERER"]);
	}
?>
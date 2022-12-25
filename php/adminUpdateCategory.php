<?php 
	include('connect.php');
	if(isset($_POST['categoryUpdateBtn'])) {
		$categoryId = $_POST['categoryId'];
		$categoryName = $_POST['categoryName'];
		$categoryParents = $_POST['categoryParents'];

		$sqlUpdateCategory = "UPDATE category SET parents_category_id='$categoryParents', category_name='$categoryName' WHERE category_id='$categoryId'";
		$queryUpdateCategory = mysqli_query($connect, $sqlUpdateCategory);
		if($queryUpdateCategory) {
			echo($categoryName);
			$_SESSION['message'] = "Sửa danh mục thành công!";
			header("Location: " . $_SERVER["HTTP_REFERER"]);
		} else {
			$_SESSION['message'] = "Sửa danh mục thất bại!";
			header("Location: " . $_SERVER["HTTP_REFERER"]);
		}
	} else {
		header("Location: " . $_SERVER["HTTP_REFERER"]);
	}
?>
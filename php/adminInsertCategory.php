<?php 
	include('connect.php');
	
	if(isset($_POST['createBtn'])) {
		$categoryName = $_POST['categoryName'];
		$categoryParents = $_POST['categoryParents'];

		$sqlInsertCategory = "INSERT INTO category (parents_category_id, category_name) VALUE ('{$categoryParents}', '{$categoryName}')";
		$queryInsertCategory = mysqli_query($connect, $sqlInsertCategory);

		if($queryInsertCategory) {
			$_SESSION['message'] = "Tạo danh mục thành công!";
			header("Location: " . $_SERVER["HTTP_REFERER"]);
		} else {
			$_SESSION['message'] = "Tạo danh mục thất bại!";
			header("Location: " . $_SERVER["HTTP_REFERER"]);
		}
	} else {
		header("Location: " . $_SERVER["HTTP_REFERER"]);
	}	
?>
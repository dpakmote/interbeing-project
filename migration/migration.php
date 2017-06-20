<?php
	$DR = $_SERVER["DOCUMENT_ROOT"]."/interbeing-project/";
	$homepath= "interbeing-project/index.php";
	include_once ($DR."config/db.php");
	$conn = new db();
	$files = array(
		$DR."migration/user_table_create.php",
		$DR."migration/user_details_table_create.php"
		);
	foreach ($files as $file) {
		include_once($file);
		mysqli_query($conn->conn,$statement);
	}

?>
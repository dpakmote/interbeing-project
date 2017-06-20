<?php
	include_once ("../migration/migration.php");
	session_start();
	unset($_SESSION["user_id"]);
	session_destroy();
	$path="http://localhost:8888/".$homepath;
	echo $path;
	exit;
?>
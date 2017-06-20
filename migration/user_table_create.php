<?php 
	$statement = "Create table if not exists user (
		id int primary key auto_increment,
		email varchar(100) not null,
		password varchar(256) not null,
		hash varchar(256) not null,
		fname varchar(20) not null,
		lname varchar(20))";
?>
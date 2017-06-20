<?php 
	$statement = "Create table if not exists user_details (
		id int primary key auto_increment,
		user_id int not null,
		phone varchar(10) not null,
		address varchar(256) not null,
		city varchar(50) not null,
		state varchar(30) not null,
		pincode varchar(6) not null,
		dob date not null
		)";
?>
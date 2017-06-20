<?php
	session_start();
	if (isset($_POST) && isset($_POST["signup"])){
		include_once ("migration/migration.php");
		$statement_email_validation = "SELECT * from user WHERE email='".$_POST["email"]."'";
		$query_email_validation = mysqli_query($conn->conn,$statement_email_validation);

		if (mysqli_num_rows ($query_email_validation) == 0){
			$hash= substr(sha1(mt_rand()), 0, 22) ;
			$hashed_password = sha1($hash.$_POST["password"]);
			$statement1 = "INSERT into user 
			(email,password,hash,fname,lname)
			VALUES ('".$_POST["email"]."','$hashed_password','$hash','".$_POST["fname"]."','".$_POST["lname"]."')
			";
			mysqli_query($conn->conn,$statement1);

			// $statement2 = "SELECT * from user WHERE email='".$_POST["email"]."' and password='$hashed_password'";
			// $get_insert_query = mysqli_query($conn->conn,$statement2);
			// if (mysqli_num_rows($get_insert_query) > 0) {
			// 	$data = mysqli_fetch_assoc ($get_insert_query);
			// 	$statement3 = "INSERT into user_details (
			// 		user_id,phone,address,city,state,pincode,dob) 
			// 		VALUES ('".$data["id"]."','".$_POST["phone"]."','".$_POST["address"]."','".$_POST["city"]."','".$_POST["state"]."','".$_POST["pincode"]."','".$_POST["dob"]."')	";
			// 	mysqli_query($conn->conn,$statement3);
			// }

			$statement3 = "INSERT into user_details (
				user_id,phone,address,city,state,pincode,dob) 
				VALUES ('".$conn->conn->insert_id."','".$_POST["phone"]."','".$_POST["address"]."','".$_POST["city"]."','".$_POST["state"]."','".$_POST["pincode"]."','".$_POST["dob"]."')	";
			mysqli_query($conn->conn,$statement3);
			header("Location:index.php");
		}
		else {
			$_SESSION["signup_error"]="This eMail already exists. Please try with another eMail ID"."<br />";
			header("Location:signup.php");
		}
	}
	else {
		if (isset($_SESSION["signup_error"])){
			echo $_SESSION["signup_error"]; 
			unset($_SESSION);
			session_destroy();
		}
?>
		<!DOCTYPE html>
		<html lang="en" class="no-js">
		<head>
		    <link rel="stylesheet" href="assets/css/master.css" />
		    <link rel="stylesheet" href="assets/css/normalize.css" />
		    <script src="assets/js/jquery.min.js"></script>
		    <script src="assets/js/index.js"></script>
		</head>
		<body class="flex">
			<form action="signup.php" method="POST">
		        <input name="email" id="" class="" type="email" placeholder="eMail ID">
		        <input name="password" id="" class="" type="password" placeholder="Password">
		        <input name="fname" id="" class="" type="text" placeholder="First Name">
		        <input name="lname" id="" class="" type="text" placeholder="Last Name">
		        <input name="phone" id="" class="" type="text" placeholder="Contact Number">
		        <input name="address" id="" class="" type="text" placeholder="Address">
		        <input name="city" id="" class="" type="text" placeholder="City">
		        <input name="state" id="" class="" type="text" placeholder="State">
		        <input name="pincode" id="" class="" type="text" placeholder="Pincode">
		        <input name="dob" id="" class="" type="date" placeholder="Date of Birth">
		        <button name="signup" value="signup">Signup</button>
			</form>
		</body>
		</html>

<?php
}
?>
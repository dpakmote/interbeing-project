<?php
	include_once ("../migration/migration.php");
	include_once ($DR."include/header.php");
	$statement1 ="Select a.email, a.fname, a.lname, b.phone, b.address, b.city, b.state, b.pincode, b.dob from user a left join user_details b on a.id=b.user_id where a.id='".$_SESSION["user_id"]."'";
	$query_statement1 = mysqli_query($conn->conn, $statement1);
	$user_data = mysqli_fetch_object($query_statement1);		
?>

<!-- <dl>
  <dt>First Name</dt>
  <dd><?php// echo $user_data["fname"] ?></dd>
  <dt>Last Name</dt>
  <dd><?php// echo $user_data["lname"] ?></dd>
  <dt>Phone</dt>
  <dd><?php //echo $user_data["phone"] ?></dd>
  <dt>Address</dt>
  <dd><?php// echo $user_data["address"] ?></dd>
  <dt>City</dt>
  <dd><?php// echo $user_data["city"] ?></dd>
  <dt>State</dt>
  <dd><?php// echo $user_data["state"] ?></dd>
  <dt>Date of Birth</dt>
  <dd><?php// echo $user_data["dob"] ?></dd>
</dl> -->

<dl>

  <dt>First Name</dt>
  <dd><input type="text" disabled="disabled" class="userdetails" value="<?php echo $user_data->fname ?>" id="fname" name="fname" ><a href="javascript:edit('fname');">Edit</a></dd>
  <dt>Last Name</dt>
  <dd><input type="text" disabled="disabled" class="userdetails" value="<?php echo $user_data->lname ?>" id="lname" ><a href="javascript:edit('lname');">Edit</a></dd>
  <dt>Phone</dt>
  <dd><input type="text" disabled="disabled" class="userdetails" value="<?php echo $user_data->phone ?>" id="phone" ><a href="javascript:edit('phone');">Edit</a></dd>
  <dt>Address</dt>
  <dd><input type="text" disabled="disabled" class="userdetails" value="<?php echo $user_data->address ?>" id="address" ><a href="javascript:edit('address');">Edit</a></dd>
  <dt>City</dt>
  <dd><input type="text" disabled="disabled" class="userdetails" value="<?php echo $user_data->city ?>" id="city" ><a href="javascript:edit('city');">Edit</a></dd>
  <dt>State</dt>
  <dd><input type="text" disabled="disabled" class="userdetails" value="<?php echo $user_data->state ?>" id="state" ><a href="javascript:edit('state');">Edit</a></dd>
  <dt>Date of Birth</dt>
  <dd><input type="date" disabled="disabled" class="userdetails" value="<?php echo $user_data->dob ?>" id="dob" ><a href="javascript:edit('dob');">Edit</a></dd>
  <button id="update_profile">Save</button>
</dl>

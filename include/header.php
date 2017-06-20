<?php
    session_start();
	if (isset($_SESSION["user_id"]) && strlen($_SESSION["user_id"])>0){
?>
<head>
    <link rel="stylesheet" href="assets/css/master.css" />
    <link rel="stylesheet" href="assets/css/normalize.css" />
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/dashboard.js"></script>
</head>
<article class="flex">
    <h1 class="">Dashboard</h1>
    <div class="profile-menu">
    	<ul>
    		<li><a href="profile"> View Profile</a></li>
    		<li id="logout">Logout</li>
    	</ul>
    </div>
</article>

<?php		
	}
	else {
		header("Location:".$homepath);
	}
?>
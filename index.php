<?php
    session_start();
    include_once ("migration/migration.php");
    if (isset($_SESSION["user_id"])) {
        include_once ($DR."include/index.php");
    }

    elseif (isset($_POST) && isset($_POST["signin"])) {
        $email = $_POST["email"];
        $password = $_POST["password"];
        $statement1 = "SELECT * from user WHERE email='".$email."'";
        $query_statement1 = mysqli_query($conn->conn, $statement1);

        if (mysqli_num_rows($query_statement1) == 0){
            $_SESSION["signin_error"]="User does not exist";
            header("Location:index.php");
        }
        else {
            $query_statement1 = mysqli_fetch_assoc($query_statement1);
            $hash = $query_statement1["hash"];
            $hashed_password = sha1($hash.$_POST["password"]);
            if ($hashed_password == $query_statement1["password"]) {
                $_SESSION["user_id"] = $query_statement1["id"];
                unset($_SESSION["signin_error"]);
                header("Location:index.php");
            }
            else {
                $_SESSION["signin_error"]="Password is wrong";
                header("Location:index.php");
            }
        }
    }

    else {
        if (isset($_SESSION["signin_error"])){
            echo $_SESSION["signin_error"]; 
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
    <script src="assets/js/dashboard.js"></script>
</head>
<body class="flex">
<article class="flex">
    <h1 class="login-title">Login</h1>
    <form class="login-form flex" action="index.php" method="POST">
        <input name="email" class="text-field hover" type="text" placeholder="eMail ID">
        <input name="password" class="hover text-field" type="password" placeholder="Password">
        <button name="signin" value="signin" type="submit">Submit</button>
        <a href="signup.php">Sign up</a>
    </form>
</article>
</body>
</html>

<?php
}
?>
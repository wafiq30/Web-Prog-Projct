<!DOCTYPE html>
<html>
<head>
<title>Fortress's Music Collection</title>

<link rel="stylesheet" type="text/css" href="user.css">

<style>
body{
    background-image: url('bg2.gif');
    height: auto;
    width: 400px;
    background-color: rgba(255,255,255,0.13);
    position: absolute;
    transform: translate(-50%,-50%);
    top: 55%;
    left: 50%;
    border-radius: 10px;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255,255,255,0.1);
    box-shadow: 0 0 40px rgba(8,7,16,0.6);
    padding: 50px 35px;
}
div{
	text-align: center;
}
</style>
</head>

<body>
<?php
$user_name = $_POST['username'];
$user_password = $_POST['password'];

$host = "localhost";
$username = "root";
$password = ""; 
$dbname = "dc98701music_library";

$link = new mysqli($host, $username, $password, $dbname);

if ($link->connect_error) { 
	die("Connection failed: " . $link->connect_error); 

} else {
	$queryCheck = "SELECT * FROM USERS WHERE username = '".$user_name."' ";
	$resultCheck = $link->query($queryCheck);

	if ($resultCheck->num_rows > 0) {
		echo "<div style='border: 2px solid rgba(255,255,255,2); padding: 10px; width: auto; border-radius: 10px; background-color: rgba(255,255,255);'>";
		echo "<p style='color:red;'>Username Used</p>";
		echo "</div>";
		echo "<br>";
		echo "<button onclick=\"window.location.href = 'signup.html'\">Sign up Again</button>";
	} else {
		session_start();
		$_SESSION["signup"] = $user_name ;
		$_SESSION['password'] = $_POST['password'];
		$_SESSION['email'] = $_POST['email'];
		$_SESSION["UserType"] = $row["user_type"];
		header("Location:signup_success.php");
	}
}

$link->close();
?>

</body>
</html>
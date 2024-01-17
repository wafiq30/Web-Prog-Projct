<?php
session_start();

if(isset ($_SESSION["UserReset"])) {
?>
<!DOCTYPE html>
<html>
<head>
<title>Fortress's Music Collection</title>

<link rel="stylesheet" type="text/css" href="user.css">

<style>
body{
    background-image: url('bg2.gif');
}
.container{
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
</style>
</head>

<body>
<center>
<h1 style="border: 5px solid White; padding: 10px; display: inline-block; width: auto; font-family: Cavolini, Cambria, Arial; color:white;">&#127925; Fortress's Music Collection System &#127926;</h1>
</center>
<?php
	$username = $_SESSION["UserReset"];
	$password = $_POST["new_password"];
	
	$host="localhost";
	$user="root";
	$pass="";
	$db="dc98701music_library";
	
	$conn=new mysqli($host, $user, $pass, $db);

if($conn->connect_error){
  die("Connection failed: ".$conn->connect_error);
  
}else{
	$dbquery = "UPDATE users SET password = '".$password."' WHERE username = '".$username."'";
		
		if ($conn->query($dbquery) === TRUE) {
?>
<div class="container">
			<div style="border: 2px solid rgba(255,255,255,2); padding: 10px; width: auto; border-radius: 10px; background-color: rgba(255,255,255);">
			<?php
			echo "<p style='color:blue;'>Success Change New Password</p>";
			?>
			</div>
			<br>
		<?php
		}else{
		?>
			<div style="border: 2px solid rgba(255,255,255,2); padding: 10px; width: auto; border-radius: 10px; background-color: rgba(255,255,255);">
			<?php
			echo "<p style='color:red;'>Error: Invalid query ".$conn->error."</p>";
			?>
			</div>
			<?php
		}
}
$conn->close();
?>
<button onclick="window.location.href = 'login.html'">Login Now</button><br><br>
</div>
</body>
</html>
<?php
} else {
?>
<!DOCTYPE html>
<html>
<head>
<title>Fortress's Music Collection</title>
<link rel="stylesheet" type="text/css" href="user.css">

<style>
body{
    background-image: url('bg.gif');
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
</style>
</head>
	<div style="border: 2px solid rgba(255,255,255,2); padding: 10px; width: auto; border-radius: 10px; background-color: rgba(255,255,255);">
	<?php
	echo "<p style='color:red;'> No session exists or session is expired. Please log in again.</p>";
	?>
	</div>
	<br>
	<?php
	echo "<button onclick=\"window.location.href = 'login.html'\">LOGIN</button>";
}
?>
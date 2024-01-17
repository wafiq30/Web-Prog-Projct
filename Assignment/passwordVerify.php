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
$user_email = $_POST['email'];


$host = "localhost";
$username = "root";
$password = ""; 
$dbname = "dc98701music_library";

$link = new mysqli($host, $username, $password, $dbname);

if ($link->connect_error) { 
	die("Connection failed: " . $link->connect_error); 

}else{

	$queryCheck = "select * from USERS where username = '".$user_name."' ";
	$resultCheck = $link->query($queryCheck);

	if ($resultCheck->num_rows == 0) {
	?>
		<div style="border: 2px solid rgba(255,255,255,2); padding: 10px; width: auto; border-radius: 10px; background-color: rgba(255,255,255);">
		<?php
		echo "<p style='color:red;'>User ID does not exist</p>";
		?>
		</div>
		<br>
		<?php
		echo "<button onclick=\"window.location.href = 'login.html'\">Re - Login</button>";
	}else{
		$row = $resultCheck->fetch_assoc();

		if( $row["user_type"] == "admin"){
			session_start();
 
			$_SESSION["UserReset"] = $user_name ;
			$_SESSION["UserType"] = $row["user_type"];

 
			header("Location:reset_password.php");
		}else{
			if( $row["email"] == $user_email )
			{
	
				if( $row["status"] == "Active")
				{
					session_start();
	
					$_SESSION["UserReset"] = $user_name;
					$_SESSION["UserType"] = $row["user_type"];

 
					header("Location:reset_password.php");
				} else { 
					?>
					<div style="border: 2px solid rgba(255,255,255,2); padding: 10px; width: auto; border-radius: 10px; background-color: rgba(255,255,255);">
					<?php
					echo "<p style='color:red;'>Account Suspended</p>";
					?>
					</div>
					<br>
					<?php
					echo "<button onclick=\"window.location.href = 'login.html'\">Back to Login Page</button>";
				}
			}else{ 
				?>
				<div style="border: 2px solid rgba(255,255,255,2); padding: 10px; width: auto; border-radius: 10px; background-color: rgba(255,255,255);">
				<?php
				echo "<p style='color:red;'>Incorrect Username or Email</p>";
				?>
				</div>
				<br>
				<?php
				echo "<button onclick=\"window.location.href = 'login.html'\">Re - Login</button>";
			}
		}
	}
}
$link->close();
?>
</body>
</html>
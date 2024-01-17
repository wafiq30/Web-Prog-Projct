<?php
session_start();
//check if session exists
if(isset($_SESSION["UID"])) {
?>

<!DOCTYPE html>
<html>
<head>
<title>Fortress's Music Collection</title>
<link rel="stylesheet" type="text/css" href="user.css">
<style>
body{
    background-image: url('bg3.jpg');
    background-repeat: no-repeat;
    background-size: cover;
}
div{
    height: auto;
    width: auto;
    background-color: rgba(255,255,255,0.13);
    position: absolute;
    transform: translate(-50%,-50%);
    top: 50%;
    left: 50%;
    border-radius: 10px;
    border: 5px solid rgba(51,0,102,0.5);
    box-shadow: 0 0 60px rgba(0,0,255,0.6);
    padding: 50px 35px;
}
button{
	height: 50px;
    width: 300px;
    background-color: #ffffff;
    color:black;
    font-size: 18px;
    font-weight: 600;
    border-radius: 10px;
	border: 5px solid rgba(51,0,102,0.5);
	box-shadow: 0 0 60px rgba(0,0,255,0.6);
    cursor: pointer;
}

</style>
</head>
<?php
$song_id = $_POST["song_id"];
?>
<body>
<center>
<h1 style="border: 5px solid Purple; padding: 10px; display: inline-block; width: auto; font-family: Cavolini, Cambria, Arial;">&#127925;<?php echo $_SESSION["UID"];?>'s Registered Song &#127926;</h1>
</center>
<?php
	$host="localhost";
	$user="root";
	$pass="";
	$db="dc98701music_library";

	$conn=new mysqli($host, $user, $pass, $db);

if($conn->connect_error){
  die("Connection failed: ".$conn->connect_error);
  
}else{
	$queryDelete = "DELETE FROM SONGS WHERE song_id = '".$song_id."' ";
	
	if ($conn->query($queryDelete) === TRUE) {
		?>
		<div>
		<?php
		echo "<p style='color:blue;'> Record has been delete from database !</p>";
		?>
		<br>
		<?php
		echo "<button onclick=\"window.location.href = 'menu.php'\">Return to Menu</button><br>";
	}else{
		echo "<p style='color:red;'>Query problems! : " . $conn->error . "</p>";
	}
}
$conn->close();
?>
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

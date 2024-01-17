<!DOCTYPE html>
<?php
session_start();
if(isset($_SESSION["UID"])) {
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> Fortress's Music Collection </title>
<link rel="stylesheet" type="text/css" href="admin.css">

<style>
body{
    background-image: url('bg4.jpg');
    height: auto;
    width: 400px;
    background-color: rgba(255,255,255,0.13);
    position: absolute;
    transform: translate(-50%,-50%);
    top: 45%;
    left: 50%;
    border-radius: 10px;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255,255,255,0.1);
    box-shadow: 0 0 40px rgba(8,7,16,0.6);
    padding: 50px 35px;
	text-align: center;
}
button{
	font-size: 20px;
	background-color: rgba(255,255,255,0.13);
	border: 5px solid rgba(0,0,0,0.5);
	border-radius: 20px;
	box-shadow: 0 0 60px rgba(255,255,255,0.6);
	cursor: pointer;
	width: 100%;
	height: auto;
}


</style>
</head>

<body>
<h3> SONG STATUS SAVE </H3>
<?php
	$id = $_POST["id"];
	$status = $_POST["status"];
	
$host="localhost";
$user = "root";
$pass = "";
$db = "dc98701music_library";

$conn = new mysqli($host, $user, $pass, $db);

if($conn->connect_error) {
	die ("Connection failed: " . $conn->connect_error);
}else{
	$queryUpdate = "UPDATE songs SET status = '".$status."' WHERE song_id = '".$id."'";
	
if($conn->query($queryUpdate) === TRUE) {
	echo "Record has been updated into database";
	echo "<br><br>";
	echo "<button onclick=\"window.location.href = 'view_song_admin.php'\">View Song List</button><br><br>";

}else{
	echo "Error updating record: " . $conn->error;
}
}
$conn->close();
?>

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
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
.test1{
    height: auto;
    width: 400px;
    background-color: rgba(255,255,255,0.13);
    position: absolute;
    transform: translate(-50%,-50%);
    top: 50%;
    left: 50%;
    border-radius: 10px;
    border: 5px solid rgba(51,0,102,0.5);
    box-shadow: 0 0 60px rgba(0,0,255,0.6);
    padding: 50px 35px;
	text-align: center;
	font-size:20px;
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

<body>
<center>
<h1 style="border: 5px solid Purple; padding: 10px; display: inline-block; width: auto; font-family: Cavolini, Cambria, Arial;">&#127925;<?php echo $_SESSION["UID"];?>'s Registered Song &#127926;</h1>
</center>
<?php
	$id = $_POST["song_id"];
	$title = $_POST["title"];
	$artist = $_POST["artist"];
	$link = $_POST["link"];
	$genre = $_POST["genre"];
	$language = $_POST["language"];
	$date = $_POST["date"];
	
$host="localhost";
$user = "root";
$pass = "";
$db = "dc98701music_library";

$conn = new mysqli($host, $user, $pass, $db);

if($conn->connect_error) {
	die ("Connection failed: " . $conn->connect_error);
}else{
	$queryUpdate = "UPDATE SONGS SET
	title = '".$title."', artist = '".$artist."',
	media_url = '".$link."', genre = '".$genre."',
	language = '".$language."', release_date = '".$date."'
	WHERE song_id = '".$id."' ";
	
	if($conn->query($queryUpdate) === TRUE) {
		?>
		<div class="test1">
			<div>
				<?php
				echo "<p style='color:blue;'> Record has been Update !</p>";
				?>
			</div>
			<?php
			echo "<br><br>";
			?>
			<div>
				<?php
				echo "<button onclick=\"window.location.href = 'view_song.php'\">View Songs</button><br>";
				?>
			</div>
		</div>
		<?php
	}else{
		?>
		<div id="test2">
		<?php
		echo "Error updating record: " . $conn->error;
		?>
		</div>
		<?php
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

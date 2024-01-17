<?php
session_start();
//check if session exists
if(isset($_SESSION["UID"])) {
?>

<!DOCTYPE html>
<html>
<head>
<title>Fortress's Music Collection</title>
<link rel="stylesheet" type="text/css" href="user_button.css">
<style>
body{
    background-image: url('bg3.jpg');
    background-repeat: no-repeat;
    background-size: cover;
	background-attachment: fixed;
}
form{
    height: auto;
    width: 400px;
    background-color: rgba(255,255,255,0.13);
    position: absolute;
    transform: translate(-50%,-50%);
    top: 60%;
    left: 50%;
    border-radius: 10px;
    border: 5px solid rgba(51,0,102,0.5);
    box-shadow: 0 0 60px rgba(0,0,255,0.6);
    padding: 50px 35px;
	font-size: 20px;
}


</style>
</head>

<body>
<center>
<h1 style="border: 5px solid Purple; padding: 10px; display: inline-block; width: auto; font-family: Cavolini, Cambria, Arial;">&#127925;<?php echo $_SESSION["UID"];?>'s Registered Song &#127926;</h1>
</center>

<?php
$songid = $_POST["song_id"];

$host="localhost";
$user = "root";
$pass = "";
$db="dc98701music_library";

$conn = new mysqli($host, $user, $pass, $db);

if($conn->connect_error) {
	die ("Connection failed: " . $conn->connect_error);
}else{
	$queryGet = "SELECT * FROM SONGS WHERE song_id='".$songid."'";
	$result = $conn->query($queryGet);
}
?>

<form action="user_editSave.php" method="post">

<?php
	if($result->num_rows > 0) {
	while($row=$result->fetch_assoc()){
?>

	Song ID: <b><?php echo $row["song_id"]; ?></b><br><br>
	Song Title: <input type="text" name="title" value="<?php echo $row["title"];?>" maxlength="20" size="35" required><br><br>
	Artist Name: <input type="text" name="artist" value="<?php echo $row["artist"];?>" maxlength="20" size="35" required><br><br>
	Song Url: <input type="url" name="link" value="<?php echo $row["media_url"];?>" style="width:100%"  required><br><br>
	Song Genre:
	<?php $genre = $row["genre"];?>
	<select name="genre" required>
		<option value=""> - Please choose - </option>
		<option value="Pop" <?php if ($genre == "Pop") echo "Selected"; ?> > Pop </option>
		<option value="Rock" <?php if ($genre == "Rock") echo "Selected"; ?> > Rock </option>
		<option value="Hip Hop" <?php if ($genre == "Hip Hop") echo "Selected"; ?> > Hip Hop </option>
		<option value="Jazz" <?php if ($genre == "Jazz") echo "Selected"; ?> > Jazz </option>
		<option value="Classical" <?php if ($genre == "Classical") echo "Selected"; ?> > Classical </option>
		<option value="Country" <?php if ($genre == "Country") echo "Selected"; ?> > Country </option>
	</select>
	<br><br>
	Song Language:<br>
	<?php $language = $row["language"]; ?>
	<input type="radio" name="language" value="English" <?php if ($language == "English") echo "checked";?>> English
	<input type="radio" name="language" value="Malay" <?php if ($language == "Malay") echo "checked";?>> Malay
	<input type="radio" name="language" value="Chinese" <?php if ($language == "Chinese") echo "checked";?>> Chinese
	<input type="radio" name="language" value="Korean" <?php if ($language == "Korean") echo "checked";?>> Korean
	<br>
	<input type="radio" name="language" value="Japanese" <?php if ($language == "Japanese") echo "checked";?>> Japanese
	<br><br>
	Release Date: <input type="date" name="date" value="<?php echo $row["release_date"];?>" required><br><br>
<br><br>
<input type="hidden" name="song_id" value="<?php echo $row["song_id"]; ?>">
<button> Update New Detail </button>
</form>

<?php
	}
}
$conn->close();		
?>

<button onclick="window.location.href = 'menu.php'" class="back-button">
		<img src="menu.png" alt="Menu" width="55" height="55">
</button>
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


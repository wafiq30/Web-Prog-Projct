<?php
session_start();

if(isset ($_SESSION["UID"])) {
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
}
center{
    height: auto;
    width: auto;
    background-color: rgba(255,255,255,0.13);
    position: absolute;
    transform: translate(-50%,-50%);
    top: 65%;
    left: 50%;
    border-radius: 10px;
    border: 5px solid rgba(51,0,102,0.5);
    box-shadow: 0 0 60px rgba(0,0,255,0.6);
    padding: 50px 35px;
}
.butang{
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
.back-button {
    background-color: #ffffff;
    color:black;
    border-radius: 10px;
	border: 5px solid rgba(51,0,102,0.5);
	box-shadow: 0 0 60px rgba(0,0,255,0.6);
	cursor: pointer;
	width: auto;
	height: auto;
	position: fixed;
	top:10px;
	left:10px;
}
</style>
</head>

<?php
	$title = $_POST["title"];
	$artist = $_POST["artist"];
	$link = $_POST['link'];
	$video_id = explode("?v=", $link);
	$video_id = $video_id[1];
    $embed_code = '<iframe width="250" height="150" src="https://www.youtube.com/embed/' . $video_id . '" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
	$genres = $_POST["genres"];
	$language = $_POST["language"];
	$date = $_POST["release_date"];
	
?>

<body>
<button onclick="window.location.href = 'menu.php'" class="back-button">
		<img src="menu.png" alt="Menu" width="55" height="55">
</button>
<center>
<h1>Song Registration Details</h1>
<br>
<table border="5">
<tr>
	<th> Song Title: </th>
	<td><?php echo $title; ?></td>
</tr>
<tr>
	<th> Artist Name: </th>
	<td><?php echo $artist; ?></td>
</tr>
<tr>
	<th> Song URL: </th>
	<td><?php echo $embed_code;?></td>
</tr>
<tr>
    <th>Song Genre</th>
    <td><?php echo $genres; ?></td>
</tr>

<tr>
	<th> Song Language: </th>
	<td><?php echo $language; ?> Language</td>
</tr>
<tr>
	<th> Release Date: </th>
	<td><?php echo $date; ?></td>
</tr>

</table>

<?php
	$host="localhost";
	$user="root";
	$pass="";
	$db="dc98701music_library";
	
	$conn=new mysqli($host, $user, $pass, $db);

	if($conn->connect_error){
	  die("Connection failed: ".$conn->connect_error);
	}

	else
	{
		
		$dbquery = "INSERT INTO songs (user_id, title, artist, media_url, genre, language, release_date, status)
            SELECT user_id, '".$title."', '".$artist."', '".$link."', '".$genres."', '".$language."', '".$date."', 'approved'
            FROM users
            WHERE username = '".$_SESSION["UID"]."'";

	
		if ($conn->query($dbquery) === TRUE) {
			echo "<p style='color:blue;'>Success insert SONG data</p>";
		}else{
			echo "<p style='color:red;'>Error: Invalid query ".$conn->error."</p>";
		}
	}
	$conn->close();
?>

		<button class="butang" onclick="window.location.href = 'song_form.php'">Register New Song</button><br><br>
		<button class="butang" onclick="window.location.href = 'user_editView.php'">Edit Registered Song</button><br><br>
		<button class="butang" onclick="window.location.href = 'user_deleteView.php'">Delete Registered Song</button><br><br>
		<button class="butang" onclick="window.location.href = 'view_song.php'">View ALL Songs</button><br><br>
</center>
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
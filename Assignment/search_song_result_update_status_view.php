<?php
session_start();
$song_name = $_SESSION['song_name'];
if(isset($_SESSION["UID"])) {
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Fortress's Music Collection</title>
<link rel="stylesheet" type="text/css" href="admin.css">
<style>

       body {
            background-image: url('bg4.jpg');
            background-repeat: no-repeat;
            background-size: cover;
			background-attachment: fixed; 
            margin: 0; 
            display: flex;
            justify-content: center; 
            align-items: center; 
        }

        table {
            width: 100%;
            max-width: 800px; 
            background-color: rgba(0, 0, 0, 1);
            border-radius: 5px;
            border: 5px solid rgba(0, 0, 0, 0.6);
            box-shadow: 0 0 60px rgba(65, 65, 65, 1);
            
        }
		
		table td {
			padding: 30px;
			font-size: 18px;
			background-color:#A9A9A9;
		}
		
		table th {
			padding: 15px;
			font-size: 18px;
			background-color:#444444;
			color:white;
		}
.update-button{
	font-size: 20px;
	background-color: rgba(255,255,255,0.13);
	border: 5px solid rgba(0,0,0,0.5);
	box-shadow: 0 0 60px rgba(255,255,255,0.6);
	cursor: pointer;
	width: auto;
	height: auto;
}
.back-button {
	background-color: rgba(255,255,255,0.13);
	border: 5px solid rgba(0,0,0,0.5);
	box-shadow: 0 0 60px rgba(255,255,255,0.6);
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
		$host = "localhost";
		$user = "root";
		$pass = "";
		$db = "dc98701music_library";
		
		$conn = new mysqli ($host, $user, $pass, $db);
		
		if ($conn -> connect_error) {
			die ("Connection Faileeeed ". $conn -> connect_error);
		}
		else {
			$queryview = "SELECT songs.*, users.username
				FROM songs
				JOIN users ON songs.user_id = users.user_id
				WHERE title LIKE '%$song_name%'";
			$resultQ = $conn -> query($queryview);
		}
	?>
<body>
<button onclick="window.location.href = 'menu.php'" class="back-button">
	<img src="menu.png" alt="Menu" width="55" height="55">
</button>
<center>
	<h1 style="border: 5px solid White; padding: 10px; display: inline-block; width: auto; font-family: Cavolini, Cambria, Arial;">&#127925; Update Song Status &#127926;</h1>

	<form action="song_statusUpdate.php" method="POST" onsubmit="return confirm('Are you sure to edit this record?')">
	<table border="1" width="150%">
	<tr>
		<th>Select</th>
		<th>ID</th>
		<th>Song Title</th>
		<th>Artist Name</th>
		<th>Song URL</th>
		<th>Song Genre</th>
		<th>Song Language</th>
		<th>Release Date</th>
		<th>User</th>
		<th>Status</th>
	</tr>
	
	<?php
		if ($resultQ-> num_rows > 0) {
			while ($row = $resultQ -> fetch_assoc()) {
			$link = $row['media_url'];
            $video_id = explode("?v=", $link);
            $video_id = $video_id[1];

            $embed_code = '<iframe width="250" height="150" src="https://www.youtube.com/embed/' . $video_id . '" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
?>
	<tr>
	<td> <input type="radio" name="id" value=<?php echo $row["song_id"]; ?> required style="width:20px;"> </td>
	<td><center> <?php echo $row["song_id"];?></td>
	<td><center> <?php echo $row["title"];?></td>
	<td><center> <?php echo $row["artist"];?></td>
	<td><center> <?php echo $embed_code;   ?></td>
	<td><center> <?php echo $row["genre"];?></td>
	<td><center> <?php echo $row["language"];?> Language</td>
	<td><center> <?php echo $row["release_date"];?></td>
	<td><center> <?php echo $row["username"];?></td>
	<td><center> <?php echo $row["status"];?></td>
</tr>
	<?php
		}
		} else {
			echo "<tr><td colspan='7'>No data selected </td></tr>";
		}
	
		$conn -> close();
	?>
	</table>
	<br>
	<input type="submit" value="Update" class="update-button">
	</form>
	
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
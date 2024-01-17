<?php
session_start();
//check if session exists
if(isset($_SESSION["UID"])) {
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Fortress's Music Collection</title>
<link rel="stylesheet" type="text/css" href="user_button.css">
<style>
body{
    background-image: url('bg3.jpg');
    background-repeat: no-repeat;
    background-size: cover;
	background-attachment: fixed;
}
table {

    width: 100%;
	max-width: 800px; 
    background-color: rgba(255,255,255,0.9);
    border-radius: 10px;
    border: 5px solid rgba(51,0,102,0.5);
    box-shadow: 0 0 60px rgba(0,0,255,0.6);
	display: flex;
	flex-direction: column;
	align-items: center;
	font-size:20px;	
}


</style>
</head>

<body>
<center>
<h1 style="border: 5px solid Purple; padding: 10px; display: inline-block; width: auto; font-family: Cavolini, Cambria, Arial;">&#127925; All Registered Song &#127926;</h1>
</center>

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
	$queryView="SELECT songs.*, users.username
				FROM songs
				JOIN users ON songs.user_id = users.user_id
				WHERE songs.status = 'approved'";
	$result=$conn->query($queryView);

}
?>
<center>
<table border="2">
<tr>
	<th> Song Title </th>
	<th> Artist Name </th>
	<th> Song </th>
	<th> Song Genre </th>
	<th> Song Language </th>
	<th> Release Date </th>
	<th> User </th>
</tr>

<?php
	if ($result->num_rows > 0) {
		while($row=$result->fetch_assoc()) {
			$link = $row['media_url'];
            $video_id = explode("?v=", $link);
            $video_id = $video_id[1];

            $embed_code = '<iframe width="250" height="150" src="https://www.youtube.com/embed/' . $video_id . '" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
?>

<tr>
	<td><center> <?php echo $row["title"];?></td>
	<td><center> <?php echo $row["artist"];?></td>
	<td><center> <?php echo $embed_code;   ?></td>
	<td><center> <?php echo $row["genre"];?></td>
	<td><center> <?php echo $row["language"];?> Language</td>
	<td><center> <?php echo $row["release_date"];?></td>
	<td style="width:100px;"><center> <?php echo $row["username"];?></td>
</tr>
<?php
		}
	}else{
		echo "<tr><td colspan='8'> NO data selected </td></tr>";
		
	}
?>
<br></table><br><br>
<button onclick="window.location.href = 'song_form.php'">Register Song</button><br><br>
<button onclick="window.location.href = 'user_editView.php'">Edit Registered Song</button><br><br>
<button onclick="window.location.href = 'user_deleteView.php'">Delete Registered Song</button><br><br>
<button onclick="window.location.href = 'menu.php'" class="back-button">
		<img src="menu.png" alt="Menu" width="55" height="55">
</button>

</center>
<?php
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

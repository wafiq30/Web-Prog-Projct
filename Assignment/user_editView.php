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
	max-width: 850px;
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
<h1 style="border: 5px solid Purple; padding: 10px; display: inline-block; width: auto; font-family: Cavolini, Cambria, Arial;">&#127925;<?php echo $_SESSION["UID"];?>'s Registered Song &#127926;</h1>
</center>
<center>
<form action="user_editDetail.php" method="POST">
<table border="5">
<center>
<h2>Choose which record you want to update</h2>
</center>
<tr>
	<th> Choose </th>
	<th> Song Title </th>
	<th> Artist Name </th>
	<th> Song URL</th>
	<th> Song Genre </th>
	<th> Song Language </th>
	<th> Release Date </th>
	<th> Song Status </th>
</tr>

<?php
	$host="localhost";
	$user="root";
	$pass="";
	$db="dc98701music_library";

	$conn=new mysqli($host, $user, $pass, $db);

if($conn->connect_error){
  die("Connection failed: ".$conn->connect_error);
  
}else{
	$queryView="SELECT * FROM SONGS WHERE user_id = (SELECT user_id FROM users WHERE username = '".$_SESSION["UID"]."')";

	$result=$conn->query($queryView);

	if($result->num_rows>0){
		while($row=$result->fetch_assoc()){
			$link = $row['media_url'];
            $video_id = explode("?v=", $link);
            $video_id = $video_id[1];

            $embed_code = '<iframe width="250" height="150" src="https://www.youtube.com/embed/' . $video_id . '" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';       
  
?>


<tr>
	<td><center> <input type="radio" name="song_id" value="<?php echo $row["song_id"]; ?>" required><center></td>
	<td><center> <?php echo $row["title"];?></td>
	<td><center> <?php echo $row["artist"];?></td>
	<td><center> <?php echo $embed_code;   ?></td>
	<td><center> <?php echo $row["genre"];?></td>
	<td><center> <?php echo $row["language"];?> Language</td>
	<td><center> <?php echo $row["release_date"];?></td>
	<td><center> <?php echo $row["status"];?></td>
</tr>

<?php
	}
}else{
	echo "<tr><th colspan='7' style='color:red;'>No Data Selected</td></tr>";
}
}
$conn->close();
		
?>
</table><br><br>
<button>Edit Selected Song</button>
</center>
<br>
</form>
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

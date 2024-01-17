<?php
session_start();

if(isset ($_SESSION["UID"])) {
?>
<!DOCTYPE html>
<html>
<head>
<title>Fortress's Music Collection</title>

<style>
body{
    background-image: url('bg2.gif');
}
.contain{
    height: auto;
    width: 400px;
    background-color: rgba(255,255,255,0.13);
    position: absolute;
    transform: translate(-50%,-50%);
    top: 60%;
    left: 50%;
    border-radius: 10px;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255,255,255,0.1);
    box-shadow: 0 0 40px rgba(8,7,16,0.6);
    padding: 50px 35px;
}
.kotak {
	border-radius: 100px;
	border: 10px solid rgb(255,255,255);
    padding: 8px 15px;
    cursor: pointer;
	width: 200px;
}
button{
    width: 100%;
    background-color: rgba(255,255,255,0.13);
	border: 10px solid rgb(255,255,255);
	border-radius: 20px;
    color:black;
    padding: 15px 0;
    font-size: 18px;
    font-weight: 600;
    cursor: pointer;
}
label{
    display: block;
    margin-top: 30px;
    font-size: 16px;
    font-weight: 500;
	color:white;
}
input{
    display: block;
    height: 50px;
    width: 100%;
    background-color: rgba(255,255,255,0.3);
    border-radius: 100px;
    padding: 0 10px;
    margin-top: 8px;
    font-size: 14px;
    font-weight: 300;
}
form *{
    font-family: 'Poppins',sans-serif;
    color: black;
    letter-spacing: 0.5px;
    outline: none;
    border: none;
}

</style>
</head>

<body>
<center>
<h1 style="border: 5px solid White; padding: 10px; display: inline-block; width: auto; font-family: Cavolini, Cambria, Arial; color:white;">&#127925; Fortress's Music Collection System &#127926;</h1>
</center>
<?php
	if ($_SESSION["UserType"] == "admin") {
	?>
<div class="contain">
	<h1><center>Welcome, Hi Admin</center></h1>
		<button onclick="window.location.href = 'view_song_admin.php'">View Song List</button><br><br>
		<button onclick="window.location.href = 'user_status_updateView.php'">Edit User Status</button><br><br>
		<form action="search_song.php" method="POST">
		Search for Song:
			<input type="text" name="search_song" placeholder="Search..."><br>
			<button class="kotak">Search</button><br><br>
		</form>
		<button onclick="window.location.href = 'logout.php'">Logout</button><br><br>
		<br>
</div>
	<?php
	} else {
	?>
<div class="contain">
	<h2><center>Welcome, Hi <?php echo $_SESSION["UID"];?></center></h2>
		<center><h3>What would you like to do?</h3></center>
		<button onclick="window.location.href = 'song_form.php'">Register Song</button><br><br>
		<button onclick="window.location.href = 'user_editView.php'">Edit Registered Song</button><br><br>
		<button onclick="window.location.href = 'user_deleteView.php'">Delete Registered Song</button><br><br>
		<button onclick="window.location.href = 'view_song.php'">View ALL Songs</button><br><br>
		<button onclick="window.location.href = 'logout.php'">Logout</button><br><br>
</div>
		<?php
	}
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



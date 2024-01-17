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
}
.butang{
	height: 50px;
    width: 200px;
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
<button onclick="window.location.href = 'menu.php'" class="back-button">
		<img src="menu.png" alt="Menu" width="55" height="55">
</button>
<form name="songform" method="post" action="song_register.php" onsubmit="return validateForm()">
<center>
<h1><b><i><u>Song Registration Form</u></i></b></h1>
<h2><b>Enter song details:<b></h2>
<p style="font-family: cavolini, arial;color:red;"><i>All fields are required</i></p>
</center>



Song Title: <input type="text" name="title" maxlength="20" required><br><br>

Artist: <input type="text" name="artist" maxlength="20" required><br><br>

Song URL: <input type="URL" name="link" style="width:100%;" required><br><br>

<label for="genres">Song Genre:</label>
<select id="genres" name="genres" required>
  <option value=""> - Please choose - </option>
  <option value="Pop">Pop</option>
  <option value="Rock">Rock</option>
  <option value="Hip Hop">Hip Hop</option>
  <option value="Jazz">Jazz</option>
  <option value="Classical">Classical</option>
  <option value="Country">Country</option>
</select>
<br><br>

<label for="language">Song Language:</label><br>
<input type="radio" id="english" name="language" value="English" required>
<label for="english">English</label>
<input type="radio" id="malay" name="language" value="Malay">
<label for="Malay">Malay</label>
<input type="radio" id="chinese" name="language" value="Chinese">
<label for="spanish">Chinese</label>
<input type="radio" id="korean" name="language" value="Korean">
<label for="french">Korean</label>
<br>
<input type="radio" id="japanese" name="language" value="Japanese">
<label for="japanese">Japanese</label>
<br><br>

<label for="release_date">Release Date:</label>
<input type="date" id="release_date" name="release_date" required>
<br><br>
<br>
<input class="butang" type="submit" value="Register Song"><br><br>
<input class="butang" type="reset" value="cancel"><br><br>

</form>
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
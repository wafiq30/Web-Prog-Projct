<?php
session_start();

if(isset ($_SESSION["UserReset"])) {
?>
<!DOCTYPE html>
<html>
<head>
<title>Fortress's Music Collection</title>

<link rel="stylesheet" type="text/css" href="user.css">

<style>
body{
    background-image: url('bg2.gif');
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
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255,255,255,0.1);
    box-shadow: 0 0 40px rgba(8,7,16,0.6);
    padding: 50px 35px;
}
</style>
</head>

<body>
<button style="background-color: rgba(255,255,255,0.13); color:black;font-size: 18px;
font-weight: 600;border-radius: 10px;
border: 5px solid rgba(11,11,69,0.5);
box-shadow: 0 0 60px rgba(11,11,69,0.6);
color: white;cursor: pointer;
width: auto;height: auto;
position: fixed;
top:10px;
right:10px; padding: 0;"
 onclick="window.location.href = 'index.html'" class="home-button">
		<img src="home.png" alt="Menu" width="55" height="55">
</button>
<center>
<h1 style="border: 5px solid White; padding: 10px; display: inline-block; width: auto; font-family: Cavolini, Cambria, Arial; color:white;">&#127925; Fortress's Music Collection System &#127926;</h1>
</center>
    <form action="reset_password_success.php" method="POST">
		<h3>Reset Password</h3>

        <label for="password">New Password</label><br>
        <input type="password" placeholder="Password" name="new_password" minlength="6" required>
		<br><br>
		<label for="confirm_password">Confirm New Password</label><br>
		<input type="password" placeholder="Confirm Password" name="confirm_password" required>
		<br><br>
		<br><br>
        <button onclick="validatePasswords()">Reset Password</button>
		<br><br>
		<a href="login.html">Back?</a> 
    </form>

<script>
function validatePasswords() {
  var password = document.getElementsByName("password")[0].value;
  var confirm_password = document.getElementsByName("confirm_password")[0].value;

  if (password != confirm_password) {
    alert("Passwords do not match. Please try again.");
    return false;
  }

  return true;
}

document.querySelector('form').addEventListener('submit', function(e) {
  if (!validatePasswords()) {
    e.preventDefault();
  }
});
</script>


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
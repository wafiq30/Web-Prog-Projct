 <?php
session_start();
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
.update-button {
	background-color:: rgba(0, 0, 0, 0.1);
	border-radius: 20px;
	color: black;
	text-align: center;
	text-decoration: none;
	display: inline-block;
	font-size: 20px;
	cursor: pointer;
	width: 200px;
	height: auto;
}
	
</style>
</head>


<body>
<center>
<h1 style="border: 5px solid White; padding: 10px; display: inline-block; width: auto; font-family: Cavolini, Cambria, Arial;">&#127925; Update User List &#127926;</h1>
<?php
$userid = $_POST["userid"];

$host="localhost";
$user = "root";
$pass = "";
$db = "dc98701music_library";

$conn = new mysqli($host, $user, $pass, $db);

if($conn->connect_error) {
	die ("Connection failed: " . $conn->connect_error);
}else{
	$queryGet = "SELECT * FROM USERS WHERE user_id = '".$userid."' ";
	$result = $conn->query($queryGet);
}
?>

	<form action="user_statusSave.php" method="post" onsubmit="return confirm('Are you sure to edit this record?')">
	<table border="1" width="150%">
	<tr>
		<th>User</th>
		<th>Status</th>
	</tr>
	<?php
	if($result->num_rows > 0) {
		while($row=$result->fetch_assoc()){
			?>
				<tr>
					<td style="width:500px;"><?php echo $row["username"]; ?></td>
					<td>
						<select name="userstatus" id="userstatus" style="width:100px;">
							<option value="Active" <?php echo ($row["status"] === "Active") ? "selected" : ""; ?>>Active</option>
							<option value="Block" <?php echo ($row["status"] === "Block") ? "selected" : ""; ?>>Block</option>
						</select>
					</td>
				</tr>	
	<input type="hidden" name="userid" value="<?php echo $row["user_id"]; ?>">
	<?php
		}
		} else {
			echo "<tr><td colspan='3'>No data selected </td></tr>";
		}
	
		$conn -> close();
	?>
	</table>
	<br>
	<center><input type="submit" value="Update" class="update-button"></center>
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
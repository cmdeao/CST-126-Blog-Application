<?php
/* Cameron Deao
 * CST-126
 * Robert Senser
 * 1/15/2021
 */

//Injecting the utility.php file.
require_once('utility.php');

//Establishing the users array variable.
$users = getAllUsers();
?>

<!DOCTYPE html>
<html>
<head>
<style>
	.topnav {
		overflow: hidden;
	}
	
	.topnav a {
		float: right;
		color: #333;
		text-align: center;
		padding: 14px 16px;
		text-decoration: none;
		font-size: 17px;
	}
	
	.topnav a:hover {
		background-color: #ddd;
		color: black;
	}
	
	div {
		text-align: center;
		font-size: 34px;
	}
	
	h1 {
		text-align: center;
	}
	
	form {
		margin: 0 auto;
		width: 500px;
		text-align: center;
	}
	
</style>
<title>View Users</title>
</head>
<body style="background-color:powderblue;">
<div class="topnav">
	<div>CST-126 Blog</div>
</div>
<h1>Users</h1>
<?php include('_displayUsers.php')?>
<br>
<form action="/adminHandler.php" method="POST">
	<label for="userid">User ID:</label>
	<input type="number" id="userid" name="userid"><br>
	<label for="rolenum">Role Number:</label>
	<input type="number" id="rolenum" name="rolenum"><br>
	<input type="submit" name="ban" value="Ban User"><br> 
	<input type="submit" name="role" value="Adjust Role">
</form>
<div style="text-align:center">
<?php echo("<button onclick=\"location.href='homePage.php'\">Home Page</button>"); ?>
</div>
</body>
</html>
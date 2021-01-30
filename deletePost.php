<?php
/* Cameron Deao
 * CST-126
 * Robert Senser
 * 1/10/2021
 */
require_once('utility.php');

$posts = getAllPosts();
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
<title>Delete Post</title>
</head>
<body style="background-color:powderblue;">
<div class="topnav">
	<div>CST-126 Blog</div>
</div>
<br>
<h1>Delete Post</h1>

<?php include('_displayPosts.php')?>
<form action="/deletePostHandler.php" method="POST">
	<label for="postid">Post ID:</label>
	<input type="number" id="postid" name="postid"><br>
	<input type="submit" value="Delete Post">
</form>
<div style="text-align:center">
<?php echo("<button onclick=\"location.href='homePage.php'\">Home Page</button>"); ?>
</div>
</body>
</html>
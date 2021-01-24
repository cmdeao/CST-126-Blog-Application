<?php
/* Cameron Deao
 * CST-126
 * Robert Senser
 * 1/16/2021
 */
require_once('utility.php');

$posts = getUserPosts();
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
<title>View Users Posts</title>
</head>
<body style="background-color:powderblue;">
<div class="topnav">
	<div>CST-126 Blog</div>
</div>
<h1>Posts</h1>
<?php include('_displayUserPosts.php')?>
<br>
<form action="/userPostHandler.php" method="POST">
	<label for="postid">Post ID:</label>
	<input type="number" id="postid" name="postid"><br>
	<input type="submit" name="delete" value="Delete Post">
</form>
<br>
<br>
<form action="/userPostHandler.php" method="POST">
	<fieldset>
		<legend>Update Blog Post</legend>
		<p>
		<label>Post ID:</label>
			<input type="number" id="updateid" name="updateid" required>
		<p>
		<label>Post Title:</label>
			<input type="text" id="title" name="title" required>
		<p>
		<label>Content</label>
			<textarea id="textArea" name="textArea" rows="4" cols="50" maxlength=240 required>Your text here</textarea>
		<input type="submit" name="update" value="Update Post">
	</fieldset>
</form>
<div style="text-align:center">
<?php echo("<button onclick=\"location.href='homePage.php'\">Home Page</button>"); ?>
</div>
</body>
</html>
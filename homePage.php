<?php
/* Cameron Deao
 * CST-126
 * Robert Senser
 * 1/23/2021
 */
require_once('blogfuncs.php');
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
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
<title>Home Page</title>
</head>
<body style="background-color:powderblue;">
<div class="topnav">
	<div>CST-126 Blog</div>
</div>
<br>
<h1>Home Page</h1>
<div style="text-align:center">
<form action="/blogSearchHandler.php" method="POST">
	<label for="searchTerm">Search:</label>
	<input type="text" id="searchTerm" name="searchTerm">
	<input type="submit" value="Submit">
</form>
<!-- New buttons for users to navigate the application. -->
<?php 
    echo("<button onclick=\"location.href='viewPosts.php'\">View All Posts</button>");
    echo "<br>";
    echo("<button onclick=\"location.href='viewUserPosts.php'\">Edit Your Posts</button>");
    echo "<br>";
    //Changed the link for create post and changed createPost from HTML to PHP. 1/23/21
    echo("<button onclick=\"location.href='createPost.php'\">Create Post</button>");
?>

<br>
<!-- Checking the established session role of the user. If an admin role is found two new buttons appear on the page. -->
<!-- Added 'Manage Users' button for admins. 1/15/20 -->
<?php if(getUserRole() == 2)
{
    echo("<button onclick=\"location.href='deletePost.php'\">Delete Post</button>");
    echo "<br>";
    echo("<button onclick=\"location.href='categorizePosts.php'\">Categorize Posts</button>");
    echo "<br>";
    echo("<button onclick=\"location.href='viewUsers.php'\">Manage Users</button>");
}
?>
<br>
</div>
</body>
</html>
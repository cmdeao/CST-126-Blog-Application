<?php
/* Cameron Deao
 * CST-126
 * Robert Senser
 * 1/15/2021
 */
require_once('blogfuncs.php');
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
<title>Home Page</title>
</head>
<body style="background-color:powderblue;">
<div class="topnav">
	<div>CST-126 Blog</div>
</div>
<br>
<h1>Home Page</h1>
<div style="text-align:center">

<!-- New buttons for users to navigate the application. -->
<?php 
    echo("<button onclick=\"location.href='viewPosts.php'\">View All Posts</button>");
    echo "<br>";
    echo("<button onclick=\"location.href='viewUserPosts.php'\">Edit Your Posts</button>");
?>
<br>
<a href="http://localhost/CST-126-Blog-Application-Cameron_Deao/createPost.html"><input type="button" value="Create Post"/></a>
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
<!-- 
	Cameron Deao
	CST-126
	Robert Senser
	1/10/2021
 -->
 
<!DOCTYPE html>
<html>
<body style="background-color:powderblue;">
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
	
	h1, h2 {
		text-align: center;
	}
	
	form {
		margin: 0 auto;
		width: 500px;
		text-align: center;
	}
</style>
</head>
<body>
<h1>Post created successfully!</h1><br>
<h2>Title: <?php echo " ". $title ?></h2><br>
<h2>Content: <?php echo " ". $text ?></h2>
<br>
<!-- Added additional navigation buttons for the user. -->
<div style="text-align:center">
<?php echo("<button onclick=\"location.href='homePage.php'\">Home Page</button>"); ?>
<br>
<?php echo("<button onclick=\"location.href='viewPosts.php'\">View All Posts</button>"); ?>
</div>

</body>
</html>
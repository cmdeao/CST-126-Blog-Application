<!-- 
	Cameron Deao
	CST-126
	Robert Senser
	12/18/2020
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
</body>
</html>
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
<meta name="viewport" content="width=device-width, initial-scale=1">
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
<title>Create Blog Post</title>
</head>
<body>
<div class="topnav">
	<div>CST-126 Blog</div>
</div>
<form action="/postHandler.php" method="POST">
	<fieldset>
		<legend>Create Blog Post</legend>
		<p>
		<label>Post Title:</label>
			<input type="text" id="title" name="title" required>
		<p>
		<label>Blog Post</label>
         	 <textarea id="textArea" name="textArea" rows="4" cols="50" maxlength=240 required>Your text here</textarea>
		<input type="submit" value="Post">
	</fieldset>
</form>
<div style="text-align:center">
<?php echo("<button onclick=\"location.href='homePage.php'\">Home Page</button>"); ?>
</div>
</body>
</html>
<?php
/* Cameron Deao
 * CST-126
 * Robert Senser
 * 1/23/2021
 */

?>

<!DOCTYPE html>
<html lang="en">
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
    table, th, td {
    border: 1px solid black;
    }
    
    table.center{
        margin-left: auto;
        margin-right: auto;
    }
</style>
<meta charset="UTF-8">
<title>View Post</title>
</head>
<body style="background-color:powderblue;">
<div class="topnav">
	<div>CST-126 Blog</div>
</div>
<h1>Post</h1>
<table class="center">
	<tr>
		<th>ID</th>
		<th>Title</th>
		<th>Content</th>
		<th>Category</th>
	</tr>
<?php 
for($x=0; $x < count($posts); $x++)
{
    echo "<tr>";
        echo "<td>" . $posts[$x][0] . "</td>" . "<td>" .
            $posts[$x][1] . "</td>" . "</td>" . "<td>" . $posts[$x][2] . "</td>"
            . "<td>" . $posts[$x][3] . "</td>"; 
        echo "</tr>";
}
?>
</table>

<form action="/commentHandler.php" method="POST">
	<label for="rating">Rating: 1-5</label>
	<input type="number" id="rating" name="rating">
	<button name="rateButton" type="submit">Rate</button>
</form>

<?php if(count($comments) > 0)
{
    echo "<h1>Comments:</h1>";    
    echo "<table class='center'>";
    echo "<tr><th>Comment</th><th>Date</th></tr>";
    for($i=0; $i < count($comments); $i++)
    {
        echo "<tr>";
        echo "<td>" . $comments[$i][0] . "</td>" . "<td>" .
            $comments[$i][1] . "</td>";
            echo  "</tr>";
    }
    echo "</table>";
}
?> 

<form action="/commentHandler.php" method="POST">
	<fieldset>
		<legend>Leave a Comment</legend>
		<p>
		<textarea id="comment" name="comment" rows="4" cols="50" maxlength="240" required>Your comment here...</textarea>
		<button name="submit" type="submit">Comment</button>
	</fieldset>
</form>

<div style="text-align:center">
<?php echo("<button onclick=\"location.href='homePage.php'\">Home Page</button>"); ?>
</div>
</body>
</html>
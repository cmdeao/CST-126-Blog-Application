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
    table, th, td {
    border: 1px solid black;
    }
    
    table.center{
        margin-left: auto;
        margin-right: auto;
    }
</style>
<meta charset="UTF-8">
<title>User Posts</title>
</head>
<body>
<table class="center">
	<tr>
		<th>ID</th>
		<th>Title</th>
		<th>Content</th>
		<th>Date</th>
		<th>Category</th>
		<th>Rating</th>
	</tr>
<?php 
//Iterating through the array to properly display post data to the user.
for($x=0; $x < count($posts); $x++)
{
    echo "<tr>";
        echo "<td>" . $posts[$x][0] . "</td>" . "<td>" .
            $posts[$x][1] . "</td>" . "<td>" . $posts[$x][2] . "</td>"
            . "<td>" . $posts[$x][3] . "</td>" . "<td>" . $posts[$x][4] . "</td>" .
            "<td>" . $posts[$x][5] . "</td>";
        echo "</tr>";
}
?>
</table>
</body>
</html>
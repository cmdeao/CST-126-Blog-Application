<?php
/* Cameron Deao
 * CST-126
 * Robert Senser
 * 1/15/2021
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
<style>
    table, th, td {
    border: 1px solid black;
    text-align:center;
    }
    
    table.center{
        margin-left: auto;
        margin-right: auto;
    }
</style>
<meta charset="UTF-8">
<title>Display Users</title>
</head>
<body>
<table class="center">
	<tr>
		<th>ID</th>
		<th>Username</th>
		<th>Role</th>
		<th>Banned</th>
	</tr>
<?php 
//Iterating through the array to properly display post user data to the admin.
for($x=0; $x < count($users); $x++)
{
    echo "<tr>";
        echo "<td>" . $users[$x][0] . "</td>" . "<td>" .
            $users[$x][1] . "</td>" . "</td>" . "<td>" . $users[$x][2] . "</td>"
            . "<td>" . $users[$x][3];
        echo "</tr>";
}
?>
</table>
</body>
</html>
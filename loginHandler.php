<?php
/* Cameron Deao
 * CST-126
 * Robert Senser
 * 12/11/2020
 */

$link = mysqli_connect("localhost", "root", "root", "blogapplication");

//Exception handling to check if the database is down.
if($link === false)
{
    die("ERROR: Could not connect database. " . mysqli_connect_error());
}

echo "connected!<br>";

//Storing username and password variables for query.
//Trimming any empty spaces out of the user submitted information.
$username = trim($_POST["username"]);
$password = trim($_POST["password"]);

//Checking if the username or password were submitted as empty fields.
if(empty($username))
{
    echo "The Username is a required field and cannot be blank.";
    exit;
}

if(empty($password))
{
    echo "The Password is a required field and cannot be blank.";
    exit;
}

//Query into the database with provided information from the user.
$sql = "SELECT * FROM users WHERE USERNAME = '$username' AND PASSWORD = '$password'";

//Running the query.
$result = mysqli_query($link, $sql);

//Series of checks based on results. If 0 no login, if 1 login success,
//if greater than 2 error message, else an error is displayed.
if(mysqli_num_rows($result) == 0)
{
    echo "Login failed.";
}
elseif(mysqli_num_rows($result) == 1)
{
    echo "Login was successful!";
}
elseif(mysqli_num_rows($result) > 2)
{
    echo "There are multiple users registered.";    
}
else 
{
    die("ERROR: Connection error occurred. " . mysqli_connect_error());
}

//Freeing the memory associated with the result set.
$result->free();

//Close connection to the database.
mysqli_close($link);
?>
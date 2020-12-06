<?php "GOT THE FORM";?>
<?php
/* Cameron Deao
 * CST-126
 * Robert Senser
 * 12/6/2020
 */

$link = mysqli_connect("localhost", "root", "root", "blogapplication");

//Exception handling to check if the database is down.
if($link === false)
{
    die("ERROR: Count not connect database. " . mysqli_connect_error());
}

echo "connected!<br>";

//Storing username and email variables for query to ensure neither exist within the database.
$username = trim($_POST["username"]);
$email = trim($_POST["emailaddress"]);

//Query to check if the submitted username exists.
$query = mysqli_query($link, "SELECT * FROM users WHERE USERNAME ='$username'");

if(!query)
{
    die('ERROR: ' . mysqli_error($link));
}

if(mysqli_num_rows($query) > 0)
{
    //Reporting if the user exists and ending the script.
    echo "User already exists";
    exit;
}

//Query to check if the submitted email exists.
$email_query = mysqli_query($link, "SELECT * FROM users WHERE EMAIL_ADDRESS = '$email'");

if(!query)
{
    die('ERROR: ' . mysqli_error($link));
}

if(mysqli_num_rows($email_query) > 0)
{
    //Reporting if the email exists and ending the script.
    echo "Email already exists";
    exit;
}

//Store variables for database insertion.
$fname = trim($_POST["fname"]);
$lname = trim($_POST["lname"]);
$country = trim($_POST["country"]);
$password = trim($_POST["password"]);

//Query to insert the user into the database.
$sql = "INSERT INTO users (FIRST_NAME, LAST_NAME, EMAIL_ADDRESS, COUNTRY, BANNED, DELETED, USERNAME, PASSWORD) VALUES ('$fname', '$lname', '$email', '$country', 'n', 'n', '$username', '$password')";

if(mysqli_query($link, $sql))
{
    echo "Records inserted successfully!";
}
else
{
    echo "ERROR: Could not insert records $sql. " . mysqli_error($link); 
}

//Close the link to the database.
mysqli_close($link);

?>

<br>You are now registered!<br>
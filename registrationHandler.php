<?php
/* Cameron Deao
 * CST-126
 * Robert Senser
 * 12/18/2020
 */

//Including the functions PHP file.
include 'blogfuncs.php';

//Connection to the database is returned from the functions file.
$link = dbConnect();

//Storing username and email variables for query to ensure neither exist within the database.
$username = trim($_POST["username"]);
$email = trim($_POST["emailaddress"]);

//Establishing the redirect URL.
$redirect = "http://localhost/CST-126-Blog-Application-Cameron_Deao/registrationForm.html";

//Query to check if the submitted username exists.
$query = mysqli_query($link, "SELECT * FROM users WHERE USERNAME ='$username'");

if(!query)
{
    die('ERROR: ' . mysqli_error($link));
}

if(mysqli_num_rows($query) > 0)
{
    //Reporting if the user exists and ending the script.
    $message = "User already exists";
    
    //Passing the message and redirect URL to the function where failedResponse.php
    //will report and refresh t he page after three seconds.
    responseRedirect($message, $redirect);
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
    $message = "Email already exists";
    
    //Passing the message and redirect URL to the function where failedResponse.php
    //will report and refresh t he page after three seconds.
    responseRedirect($message, $redirect);
    exit;
}

//Store variables for database insertion.
$fname = trim($_POST["fname"]);
$lname = trim($_POST["lname"]);
$country = trim($_POST["country"]);
$password = trim($_POST["password"]);

//Query to insert the user into the database.
$sql = "INSERT INTO users (FIRST_NAME, LAST_NAME, EMAIL_ADDRESS, COUNTRY, BANNED, DELETED, USERNAME, PASSWORD, USER_ROLE) VALUES ('$fname', '$lname', '$email', '$country', 'n', 'n', '$username', '$password', 1)";

if(mysqli_query($link, $sql))
{
    echo "Records inserted successfully!";
}
else
{
    echo "ERROR: Could not insert records $sql. " . mysqli_error($link); 
    exit;
}

//Close the link to the database.
mysqli_close($link);

//Redirect user to the login page if the information was inserted properly.
header('Location: CST-126-Blog-Application-Cameron_Deao/loginForm.html');
?>
<?php
/* Cameron Deao
 * CST-126
 * Robert Senser
 * 1/15/2020
 */

//Including the functions PHP file.
include 'blogfuncs.php';

//Connection to the database is returned from the functions file.
$link = dbConnect();

//Storing username and password variables for query.
//Trimming any empty spaces out of the user submitted information.
$username = trim($_POST["username"]);
$password = trim($_POST["password"]);

$redirect = "http://localhost/CST-126-Blog-Application-Cameron_Deao/loginForm.html";

//Checking if the username or password were submitted as empty fields.
if(empty($username))
{
    //echo "The Username is a required field and cannot be blank.";
    $message = "The Username is a required field and cannot be blank.";
    
    //Passing the message and redirect URL to the function where failedResponse.php
    //will report and refresh t he page after three seconds.
    responseRedirect($message, $redirect);
    exit;
}

if(empty($password))
{
    //echo "The Password is a required field and cannot be blank.";
    $message = "The Password is a required field and cannot be blank.";
    
    //Passing the message and redirect URL to the function where failedResponse.php
    //will report and refresh t he page after three seconds.
    responseRedirect($message, $redirect);
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
    $message = "Login failed.";
    
    //Passing the message and redirect URL to the function where failedResponse.php
    //will report and refresh t he page after three seconds.
    responseRedirect($message, $redirect);
    exit;
}
elseif(mysqli_num_rows($result) == 1)
{   
    //Setting the user ID for the session.
    $row = $result->fetch_assoc();
    
    //Checking if the user is banned from the application.
    if($row["BANNED"] === 'Y')
    {
        //Showcasing banned statement.
        echo "YOU ARE BANNED FROM THE APPLICATION!";
        
        //Exiting handler.
        exit;
    }
    
    saveUserId($row["USER_ID"]);
    saveUserRole($row["USER_ROLE"]);
}
elseif(mysqli_num_rows($result) > 2)
{
    $message = "There are multiple users registered.";
    
    //Passing the message and redirect URL to the function where failedResponse.php
    //will report and refresh t he page after three seconds.
    responseRedirect($message, $redirect);
    exit;
}
else 
{
    die("ERROR: Connection error occurred. " . mysqli_connect_error());
}

//Freeing the memory associated with the result set.
$result->free();

//Close connection to the database.
mysqli_close($link);

include('homePage.php');
exit;

?>
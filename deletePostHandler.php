<?php
/* Cameron Deao
 * CST-126
 * Robert Senser
 * 1/10/2021
 */

//Including functions PHP file.
include 'blogfuncs.php';

//Establishing connection to the database.
$link = dbConnect();

//Retrieving the user submitted post ID.
$postID = trim($_POST["postid"]);

//SQL statement.
$sql = "DELETE FROM posts WHERE POST_ID = '$postID'";

//Exception handling for the statement.
if($link->query($sql) === TRUE)
{
    $message = "Record deleted successfully";
}
else 
{
    $message = "Error deleting recrod: " . $link->error;
}

//Closing the connection.
$link->close();

//Redirecting to the appropriate response page with a message.
adminResponse($message);
?>
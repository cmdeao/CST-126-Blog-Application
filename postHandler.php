<?php
/* Cameron Deao
 * CST-126
 * Robert Senser
 * 12/18/2020
 */

include 'blogfuncs.php';

//Storing variables.
$title = trim($_POST["title"]);
$text = trim($_POST["textArea"]);
$id = getUserId();

//Checking if title and text content were empty fields.
if(empty($title))
{
    echo "A title is required for the post.";
    exit;
}
if(empty($text))
{
    echo "Text is required to create a post.";
    exit;
}

//Connection to the database is returned from the functions file.
$link = dbConnect();

//Sending the text content to the profanity filter.
if(languagefilter($text))
{
    //Establishing a message if the function returns true.
    $message = "Post contains profanity. Please remove it and try again.";
    
    //Displaying the failedPostResponse.php file with the message.
    include('failedPostResponse.php');
    exit;
}

//Running a query to check if the title has been stored already.
$query = mysqli_query($link, "SELECT * FROM posts WHERE POST_TITLE = '$title'");

if(!query)
{
    die('ERROR: ' . mysqli_error($link));
}

if(mysqli_num_rows($query) > 0)
{
    //Establishing a message if the title already exists within the database.
    $message = "This title already exists. Please rename your post.";
    
    //Displaying the failedPostResponse.php file with the message.
    include('failedPostResponse.php');
    exit;
}

//Query to insert the post into the database.
$sql = "INSERT INTO posts (POST_TITLE, POST_CONTENT, POSTED_BY) VALUES ('$title', '$text', '$id')";

//Displaying the postResponse.php file if successful.
if(mysqli_query($link, $sql))
{  
    include('postResponse.php');
}
else 
{
    echo "ERROR: Could not insert post $sql. " . mysqli_error($link);    
}
?>
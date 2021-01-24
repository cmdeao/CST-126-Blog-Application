<?php
/* Cameron Deao
 * CST-126
 * Robert Senser
 * 1/23/2021
 */

//Function returns a connection to the established database.
function dbConnect()
{
    $link = mysqli_connect("localhost", "root", "root", "blogapplication");
    if($link === false)
    {
        die("ERROR: Could not connect. " . mysqli_connect_error());    
    }
    return $link;
}

//Language filter function.
function languagefilter($text)
{   
    //Established array of banned words.
    $banned = array("damn", "punk", "idiot");
    
    //Iterate through the array and compare against the passed text.
    foreach($banned as $a)
    {
        if(stripos($text, $a) !== false)
        {
            //Returning true if a word within the banned array exists within the text.
            return true;
        }
    }
    //Returning false if no words were caught.
    return false;
}

//Function to redirect appropriately.
function responseRedirect($message, $redirect)
{
    include('failedResponse.php');
    exit;
}

//Admin response method to pass the appropriate message to the page.
function adminResponse($message)
{
    include('adminResponse.php');
    exit;
}

//Setting the user ID for the session.
function saveUserId($id)
{
    session_start();
    $_SESSION["USER_ID"] = $id;
}

//Retrieving the user ID of the session.
function getUserId()
{
    session_start();
    return $_SESSION["USER_ID"];
}

//Setting the user role for the session.
function saveUserRole($role)
{
    session_start();
    $_SESSION["USER_ROLE"] = $role;
}

//Retrieving the user role of the session.
function getUserRole()
{
    session_start();
    return $_SESSION["USER_ROLE"];
}

//Setting the current post ID for the session when commenting or rating.
function savePostID($id)
{
    session_start();
    $_SESSION["POST_ID"] = $id;
}

//Retrieving the post ID of the session.
function getPostID()
{
    session_start();
    return $_SESSION["POST_ID"];
}
?>
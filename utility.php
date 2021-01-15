<?php
/* Cameron Deao
 * CST-126
 * Robert Senser
 * 1/15/2021
 */

//Including PHP functions file.
require_once('blogfuncs.php');

//Function for retrieving all the posts.
function getAllPosts()
{
    //Establishing connection to the database.
    $link = dbConnect();
    //Establishing the array variable.
    $posts = array();
    //Setting the index variable to zero.
    $index = 0;
    
    //Retrieval query.
    $sql = "SELECT * FROM `posts`";
    
    //Establishing the resultset.
    $result = mysqli_query($link, $sql);
    
    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            //Adding each index of the results into the 2D array.
            $posts[$index] = array($row["POST_ID"], $row["POST_TITLE"], $row["POST_CONTENT"], $row["CATEGORY"]);
            ++$index;
        }
    }
    
    //Closing the connection.
    mysqli_close($link);
    //Returning the array.
    return $posts;
}

//Function for retrieving all the users for admins.
function getAllUsers()
{
    //Establishing connection to the database.
    $link = dbConnect();
    //Establishing the array variable.
    $users = array();
    //Setting the index to zero.
    $index = 0;
    
    //Retrieval query.
    $sql = "SELECT * FROM users";
    
    //Establishing the resultset.
    $result = mysqli_query($link, $sql);
    
    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            //Adding each user within the application into the 2D array.
            $users[$index] = array($row["USER_ID"], $row["USERNAME"], $row["USER_ROLE"], $row["BANNED"]);
            ++$index;
        }
    }
    
    //Closing connection.
    mysqli_close($link);
    //Returning the array.
    return $users;
}

?>
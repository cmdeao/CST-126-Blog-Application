<?php
/* Cameron Deao
 * CST-126
 * Robert Senser
 * 1/31/2021
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
    //$sql = "SELECT * FROM `posts`";
    //$sql = "SELECT comments.COMMENT_ID, comments.COMMENT_TEXT, comments.POST_DATE, comments.POSTED_BY, users.USERNAME FROM comments INNER JOIN users ON comments.POSTED_BY=users.USER_ID WHERE POST_ID=". $ID;
    $sql = "SELECT posts.*, users.USERNAME FROM posts INNER JOIN users ON posts.POSTED_BY=users.USER_ID";
    
    //Establishing the resultset.
    $result = mysqli_query($link, $sql);
    
    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            //Adding each index of the results into the 2D array.
            $posts[$index] = array($row["POST_ID"], $row["POST_TITLE"], $row["POST_CONTENT"], $row["CATEGORY"], $row["RATING"], $row["USERNAME"]);
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
//Function for retrieving all posts from a specific user.
function getUserPosts()
{
    //Establishing connection to the database.
    $link = dbConnect();
    //Establishing the array variable.
    $posts = array();
    //Setting the index to zero.
    $index = 0;

    //SQL query to retrieve all posts based on user ID.
    $sql = "SELECT * FROM posts WHERE POSTED_BY=" . getUserId();
    
    //Establishing the resultset.
    $result = mysqli_query($link, $sql);
    
    //Iterating through the results.
    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_assoc($result))
        {   
            //Adding each post into the array.
            $posts[$index] = array($row["POST_ID"], $row["POST_TITLE"], $row["POST_CONTENT"], $row["POST_DATE"], $row["CATEGORY"], $row["RATING"]);
            ++$index;
        }
    }
    
    //Closing the connection.
    mysqli_close($link);
    //Returning the array.
    return $posts;
}

//Function for retrieving posts based on search term.
function getPostsBySearch($searchTerm)
{
    $link = dbConnect();
    $posts = array();
    $index = 0;
    
    //Utilizing the 'LIKE' keyword when searching for posts with the submitted term.
    $sql = "SELECT * FROM posts WHERE POST_TITLE LIKE '%" . $searchTerm . "%'";
    
    $result = mysqli_query($link, $sql);
    
    //Storing the results within an array if results are found.
    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            $posts[$index] = array($row["POST_ID"], $row["POST_TITLE"], $row["POST_CONTENT"], $row["CATEGORY"], $row["RATING"]);
            ++$index;
        }
    }
    
    mysqli_close($link);
    return $posts;
}

//Retrieving a post based on the passed ID.
function getPostByID($ID)
{
    $link = dbConnect();
    $posts = array();
    $index = 0;
    
    //Query of the posts based on the ID.
    $sql = "SELECT * FROM posts WHERE POST_ID =" . $ID;
    
    $result = mysqli_query($link, $sql);
    
    //Storing the results within an array.
    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            $posts[$index] = array($row["POST_ID"], $row["POST_TITLE"], $row["POST_CONTENT"], $row["CATEGORY"], $row["RATING"]);
        }
    }
    
    mysqli_close($link);
    return $posts;
}

//Retrieving all comments within a post based on the post ID.
function getPostComments($ID)
{
    $link = dbConnect();
    $comments = array();
    $index = 0;
    
    //Retrieval query.
    //$sql = "SELECT * FROM comments WHERE POST_ID=" . $ID;
    
    //$sql = "SELECT comments.COMMENT_TEXT, comments.POST_DATE, comments.POSTED_BY, users.USERNAME FROM comments INNER JOIN users ON users.USER_ID=comments.POSTED_BY WHERE POST_ID=" . $ID;
    $sql = "SELECT comments.COMMENT_ID, comments.COMMENT_TEXT, comments.POST_DATE, comments.POSTED_BY, users.USERNAME FROM comments INNER JOIN users ON comments.POSTED_BY=users.USER_ID WHERE POST_ID=". $ID;
    
    //Establishing the resultset.
    $result = mysqli_query($link, $sql);
    

    
    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            $comments[$index] = array($row["COMMENT_TEXT"], $row["POST_DATE"], $row["USERNAME"], $row["POSTED_BY"], $row["COMMENT_ID"]);
            ++$index;
        }
    }
    
    //Closing connection.
    mysqli_close($link);
    //Returning the array.
    return $comments;
}
?>
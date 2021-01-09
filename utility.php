<?php
/* Cameron Deao
 * CST-126
 * Robert Senser
 * 1/10/2021
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

?>
<?php
/* Cameron Deao
 * CST-126
 * Robert Senser
 * 1/16/2021
 */
include 'blogfuncs.php';

$link = dbConnect();

//Fires if the 'Delete' button was pressed by the user.
if(isset($_POST['delete']))
{
    //Retrieving the submitted post ID.
    $postID = trim($_POST["postid"]);
    
    //Query to delete a post based on the post ID and the established user ID.
    $link->query("DELETE FROM posts WHERE POST_ID = '$postID' AND POSTED_BY = " . getUserId());
    
    //Checking if anything was deleted.
    if($link->affected_rows > 0)
    {
        $message = "Deleted the post.";
    }
    else
    {
        $message = "Nothing was deleted.";
    }

    //Closing the connection.
    mysqli_close($link);
    
    //Redirecting to the appropriate page.
    adminResponse($message);
}

//Fires if the 'Update' button was pressed by the user.
if(isset($_POST['update']))
{
    //Retrieving all the fields submitted by the user.
    $postID = trim($_POST["updateid"]);
    $title = trim($_POST["title"]);
    $content = trim($_POST["textArea"]);
    
    //Query to update the post.
    $sql = $link->prepare("UPDATE posts SET POST_TITLE=?, POST_CONTENT=? WHERE POST_ID=? AND POSTED_BY=?");
    
    //Binding the paramaters set by the user and their established user ID.
    $sql->bind_param('ssii', $title, $content, $postID, getUserId());
    
    //Executing the query.
    $sql->execute();
    
    //Checking if the query was successful.
    if($sql)
    {
        $message = "Updated post successfully.";
    }
    else
    {
        $message = "Error updating post: " . $link->error;   
    }
    
    //Closing the query and connetion.
    $sql->close();
    $link->close();
    
    //Redirecting to the appropriate page.
    adminResponse($message);
}

?>
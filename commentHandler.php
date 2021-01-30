<?php
/* Cameron Deao
 * CST-126
 * Robert Senser
 * 1/31/2021
 */

//Including necessary files.
require('utility.php');
require_once'blogfuncs.php';

//Checking if the comment delete button was pressed.
if(isset($_POST["deleteComment"]))
{
    //Finding which button on the table was pressed.
    $comment = trim($_POST["deleteComment"]);
    //Getting the post ID from the session variables.
    $postID = getPostID();
    
    $link = dbConnect();
    
    //Query to delete a comment based on the comment ID and associated post ID.
    $sql = "DELETE FROM comments WHERE COMMENT_ID =" . $comment . " AND POST_ID =" . $postID;
    
    //Exception handling.
    if($link->query($sql) === TRUE)
    {
        $message = "Comment deleted successfully.";
    }
    else 
    {
        $message = "Error deleting comment: " . $link->error;
    }
    
    $link->close();
    
    adminResponse($message);
}

//Checking which button was pressed.
if(isset($_POST["rateButton"]))
{
    //Setting variables.
    $rating = trim($_POST["rating"]);
    $currentRating;
    
    //Exception handling for rating input.
    if($rating > 5 || $rating <= 0)
    {
        $message = "Rating must be between 1 and 5";
        adminResponse($message);
        exit;
    }
    
    //Getting the current rating of a post.
    $link = dbConnect();
    $retrieval = "SELECT RATING FROM posts WHERE POST_ID =" . getPostID();
    $result = mysqli_query($link, $retrieval);
    
    if(mysqli_num_rows($result) == 1)
    {
        $row = $result->fetch_assoc();
        $currentRating = $row["RATING"];
    }
    
    //Checking if the post has a rating.
    if(is_null($currentRating))
    {
        //Inputting the rating if no rating currently resides within the table for the post.
        $sql = $link->prepare('UPDATE posts SET RATING=? WHERE POST_ID=?');
        $sql->bind_param('ii', $rating, getPostID());
    }
    else
    {
        //Averaging out the current rating with the input rating.
        $average = $rating + $currentRating;
        $average = $average/2;
        
        $result->close();
        
        //Updating the post rating within the database.
        $sql = $link->prepare('UPDATE posts SET RATING=? WHERE POST_ID=?');    
        $sql->bind_param('ii', $average, getPostID());
    }
    
    $sql->execute();
    
    //Execption handling.
    if($sql)
    {
        $message = "You've rated this post with a value of " . $rating;
    }
    else 
    {
        $message = "Error rating the post: " . $link->error;
    }
    
    $sql->close();
    $link->close();
    adminResponse($message);
}

if(isset($_POST["test"]))
{   
    //Retrieving which post was clicked.
    $testing = trim($_POST['test']);
    //Getting arrays of posts and comments.
    $posts = getPostByID($testing);
    $comments = getPostComments($testing);
    //Storing the post ID.
    savePostID($testing);
    include('_displayPostComments.php');
}

if(isset($_POST["submit"]))
{
    //Retrieving the comment text.
    $textContent = trim($_POST['comment']);
    
    //Exception handling.
    if(empty($textContent))
    {
        $message = "No text was submitted.";
        adminResponse($message);
        exit;
    }
    
    //Insertting the comment into the database.
    $link = dbConnect();    
    $sql = "INSERT INTO comments(POST_ID, COMMENT_TEXT, POSTED_BY) VALUES (".getPostID().",'$textContent',".getUserId().")";
    
    //Exception handling.
    if(mysqli_query($link, $sql))
    {
        $message = "Commented successfully!";    
    }
    else 
    {
        $message = "Error posting comment";
    }
    
    mysqli_close($link);
    adminResponse($message);
}
?>
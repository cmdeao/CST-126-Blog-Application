<?php
/* Cameron Deao
 * CST-126
 * Robert Senser
 * 1/10/2021
 */

//Including PHP functions file.
include 'blogfuncs.php';

//Establishing connection to database.
$link = dbConnect();

//Retrieving user submitted values.
$postID = trim($_POST["postid"]);
$postCategory = trim($_POST["postcat"]);

//Initial query to check if a category exists for a post.
$query = mysqli_query($link, "SELECT POST_ID, CATEGORY FROM posts WHERE POST_ID ='$postID'");

if(mysqli_num_rows($query) > 0)
{   //Iterating through the results.
    while($row = mysqli_fetch_assoc($query))
    {
        //Checking if the category is null.
        if($row["CATEGORY"] == NULL)
        {
            $query->close();
            //Calling method to insert the category.
            insertCategory($link, $postID, $postCategory);
        }
        else
        {
            $query->close();
            //Calling method to update the previous category to the new one.
            updateCategory($link, $postID, $postCategory);
        }
    }
}

//Function to update the category. Connection, ID, and category are passed as variables.
function updateCategory($conn, $ID, $category)
{
    //Preparing the update statement.
    $sql = $conn->prepare('UPDATE posts SET CATEGORY=? WHERE POST_ID=?');
    //Binding the parameters to the user submitted values.
    $sql->bind_param('si', $category, $ID);
    //Executing the query.
    $sql->execute();
    
    //Exception handling to report if the query was successful.
    if($sql)
    {
        $message = "Record updated successfully!";
    }
    else
    {
        $message = "Error updating record: " . $conn->error;
    }
    
    //Closing query and connection.
    $sql->close();
    $conn->close();
    //Redirecting to the appropriate response page with a message.
    adminResponse($message);
}

//Function to insert the category. Connection, ID, and categfory are passed as variables.
function insertCategory($conn, $ID, $category)
{
    //Preparing the update statement.
    $sql = $conn->prepare('UPDATE posts SET CATEGORY=? WHERE POST_ID=?');
    //Binding the parameters to the user submitted values.
    $sql->bind_param('si', $category, $ID);
    //Executing the query.
    $sql->execute();
    
    //Exception handling to report if the query was successful.
    if($sql)
    {
        $message = "Category insert successfull!";    
    }
    else
    {
        $message = "Error inserting category: " . $conn->error;
    }
    
    //Closing query and connection.
    $sql->close();
    $conn->close();
    //Redirecting to the appropriate response page with a message.
    adminResponse($message);
}

?>
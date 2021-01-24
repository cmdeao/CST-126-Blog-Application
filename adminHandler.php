<?php
/* Cameron Deao
 * CST-126
 * Robert Senser
 * 1/15/2021
 */

include 'blogfuncs.php';

$link = dbConnect();

$userID = trim($_POST["userid"]);
$roleNumber = trim($_POST["rolenum"]);

//Firing if statement when the 'ban' button is pressed by the admin.
if(isset($_POST['ban']))
{
    //Preparing query.
    $query = $link->prepare("UPDATE users SET BANNED='Y' WHERE USER_ID=?");
    
    //Binding the user ID paramater.
    $query->bind_param('i', $userID);
    
    //Executing query.
    $query->execute();
    
    //Exception handling.
    if($query)
    {
        $message = "User was banned from the application";
    }
    else 
    {
        $message = "Error banning user from the application: " . $link->error;    
    }
    
    //Closing query and connection.
    $query->close();
    $link->close();
    
    //Redirecting page.
    adminResponse($message);
}

//Firing if statement when the 'role' button is pressed by the admin.
if(isset($_POST['role']))
{
    //Exception handling for empty form field.
    if(empty($roleNumber))
    {
        $message = "The 'Role Nummber' is a required field and cannot be blank.";
        adminResponse($message);
        exit;
    }
    
    //Exception handling for improper role number input.
    if($roleNumber > 2 || $roleNumber < 0)
    {
        $message = "The 'Role Number' must be a 1 for 'Standard User' or 2 for 'Admin'.";
        adminResponse($message);
        exit;
    }
    
    //Preparing query.,
    $query = $link->prepare("UPDATE users SET USER_ROLE=? WHERE USER_ID=?");
    
    //Binding role number and user ID to query.
    $query->bind_param('ii', $roleNumber, $userID);
    
    //Executing query.
    $query->execute();
    
    //Exception handling.
    if($query)
    {
        $message = "Updated user role";
    }
    else 
    {
        $message = "Error updating role: " . $link->error;
    }
    
    //Closing query and connection.
    $query->close();
    $link->close();
    
    //Redirecting page.
    adminResponse($message);
}
?>
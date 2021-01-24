<?php
/* Cameron Deao
 * CST-126
 * Robert Senser
 * 1/23/2021
 */
require_once('utility.php');

//Storing the user submitted search term.
$searchPattern = trim($_POST['searchTerm']);
$posts = getPostsBySearch($searchPattern);

//Exception handling if the array returns with no posts.
if(count($posts) == 0)
{
    $message = "No posts were found with that search term";
    adminResponse($message);
    exit;
}

include 'searchResults.php';

?>
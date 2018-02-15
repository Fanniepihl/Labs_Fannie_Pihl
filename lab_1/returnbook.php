<?php

include("config.php");


$bookid = trim($_GET['bookid']);
echo '<INPUT type="hidden" name="bookid" value=' . $bookid . '>';

$bookid = trim($_GET['bookid']);      // From the hidden field
$bookid = addslashes($bookid);

@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

    if ($db->connect_error) {
        echo "could not connect: " . $db->connect_error;
        printf("<br><a href=index.php>Return to home page </a>");
        exit();
    }
    
   echo "You are returning book with the ID:"           .$bookid;


    // Prepare an update statement and execute it
    $stmt = $db->prepare("UPDATE book SET onloan=0 WHERE bookid = ?");
    $stmt->bind_param('i', $bookid);
    $stmt->execute();
    printf("<br>Succesfully returned!");
    printf("<br><a href=href=browsbooks.php>Search for more Books </a>");
    printf("<br><a href=mybook.php>Return to Reserved Books </a>");
    printf("<br><a href=index.php>Return to home page </a>");
    exit;

?>


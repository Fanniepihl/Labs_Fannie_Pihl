<?php
include ("config.php");
include ("header.php");
?>

<?php

$recipeid = trim($_GET['bookid']);
echo '<INPUT type="hidden" name="recipeid" value=' . $bookid . '>';

$bookid = trim($_GET['bookid']);      // From the hidden field
$bookid = addslashes($bookid);


@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

    if ($db->connect_error) {
        echo "could not connect: " . $db->connect_error;
        printf("<br><a href=index.php>Return to home page </a>");
        exit();
    }
    
    //Echo och printf utför samma saker. printar ut samma saker!

   echo "You are adding a book with the ID:"           .$bookid;

    
                        //UPDATE stod det innan
    $stmt = $db->prepare("INSERT book SET onloan=1 WHERE bookid = ?");
    $stmt->bind_param('i', $bookid);
    $stmt->execute();
    printf("<br>Book added!");
    printf("<br><a href=add.php>Add more books </a>");
    printf("<br><a href=index.php>Return to home page </a>");
    exit;

?>
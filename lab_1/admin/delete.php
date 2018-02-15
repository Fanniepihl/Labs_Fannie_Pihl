<?php
include("config.php");
$title = "Delete book";
include("header.php");
?>

<?php
if (isset($_GET['submit'])) {
    // We know the borrower so go ahead and check the book out
    # Get data from form
    $bookid = trim($_GET['bookid']);      // From the hidden field
    $bookid = addslashes($bookid);

    # Open the database using the "librarian" account
    @ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

    if ($db->connect_error) {
        echo "could not connect: " . $db->connect_error;
        printf("<br><a href=index.php>Return to home page </a>");
        exit();
    }

    // Prepare an update statement and execute it
    
        $stmt = $db->prepare("DELETE FROM book WHERE bookid = ?");
        $stmt->bind_param('i', $bookid);
        $response = $stmt->execute();
        printf("<br>Book deleted!");
        printf("<br><a href=index.php>Return to home page </a>");
    
    
    exit;
}

?>

<!doctype>
<html>
    <head>
        <title>Browse Books</title>
        <link href="css/main.css" type="text/css" rel="stylesheet">
    </head>
    <body>
       

<h3>Delete book</h3>

<form action="delete.php" method="GET">
    Are you sure you want to delete book?<br>

    <?php
    $bookid = trim($_GET['bookid']);
    echo '<INPUT type="hidden" name="bookid" value=' . $bookid . '>';
    ?><br>
    <INPUT type="submit" name="submit" value="Continue">
</form>

</body>

</html>




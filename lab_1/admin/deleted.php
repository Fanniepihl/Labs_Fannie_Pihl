<?php
include("config.php"); 
include("header.php")    
?>

<?php
if (isset($_GET['submit'])) {

    $bookid = trim($_GET['bookid']);   
    $bookid = addslashes($bookid);       

   
    @ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

    if ($db->connect_error) { 
        echo "could not connect: " . $db->connect_error;
        printf("<br><a href=index.php>Return to home page </a>");
        exit();
    }

    // Prepare an update statement and execute it
    
        $stmt = $db->prepare("delete from books where bookid = ?");
        $stmt->bind_param('i', $bookid);                                   
        $response = $stmt->execute();                                        
        printf("<br>Book deleted!");                                      
        printf("<br><a href=index.php>Return to home page </a>");
    
    exit;
}

?>

<h3>Delete Book</h3>
<hr>
<form action="deleted.php" method="GET">       
    Are you sure you want to delete the Book?
    <?php
    $recipeid = trim($_GET['bookid']);            
    echo '<INPUT type="hidden" name="recipeid" value=' . $bookid . '>';
    ?>
    <INPUT type="submit" name="submit" value="Continue">
</form>



<?php include("config.php"); ?>
<?php include("header.php"); ?>

<?php
if (isset($_POST['newbooktitle'])) {
    // This is the postback so add the book to the database
    # Get data from form
    $newbooktitle = trim ($_POST['newbooktitle']);
    $newbookauthor = trim($_POST['newbookauthor']);
    $newbookpage = trim($_POST['newbookpage']);
    $newbookisbn = trim($_POST['newbookisbn']);

    if (!$newbookisbn || !$newbooktitle || !$newbookauthor || !$newbookpage  ) {
        printf("You must specify both a title and an author or bookid, and or ISBN");
        printf("<br><a href=index.php>Return to home page </a>");
        exit();
    }

    $newbooktitle = addslashes($newbooktitle);
    $newbookauthor = addslashes($newbookauthor);
    $newbookpage = addslashes($newbookpage);
    $newbookisbn = addslashes($newbookisbn);


    $newbooktitle = htmlentities($newbooktitle);
    $newbookauthor = htmlentities($newbookauthor);
    $newbookpage = htmlentities($newbookpage);
    $newbookisbn = htmlentities($newbookisbn);

    # Open the database using the "librarian" account (HOW????)
    @ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

    if ($db->connect_error) {
        echo "could not connect: " . $db->connect_error;
        printf("<br><a href=index.php>Return to home page </a>");
        exit();
    }
    

    // Prepare an insert statement and execute it
    $stmt = $db->prepare("INSERT INTO book(bookid, title, author, pages) values (?, ?, ?, ?)");
    //$stmt = $db->prepare("insert into books values (null, ?, ?, ?, null, null)");

    $stmt->bind_param('issi', $newbookisbn, $newbooktitle, $newbookauthor, $newbookpage);

    $stmt->execute();
    printf("<br>Book Added!");
    printf("<br><a href=index.php>Return to home page </a>");
    exit;
}

// Not a postback, so present the book entry form
?>


<!doctype>
<html>
	<head>
		<title>Add New Book</title>
		<link href="css/main.css" type="text/css" rel="stylesheet">
	</head>
	<body>
	
	<h3>Add a new book to the selection</h3><br>


You must enter a title, an author, the pages and the ISBN in the database....<br><br>
<form action="" method="POST">
<fieldset>
<legend>Add books:</legend><br>
    <table id="t01" style="width:100%" cellpadding="6">
        <tbody>
                Title:<br>
                <INPUT type="text" name="newbooktitle"><br>
                Author:<br>
                <INPUT type="text" name="newbookauthor"><br>
                Pages:<br>
                <INPUT type="text" name="newbookpage"><br>
                ISBN:<br>
                <INPUT type="text" name="newbookisbn"><br><br>
                <INPUT type="submit" name="submit" value="Add Book"> 
        </tbody>
    </table>
</fieldset>    
</form>


</body>
</html>
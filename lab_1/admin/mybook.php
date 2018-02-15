<?php
include("config.php");
$title = "Add new book";
include("header.php");
?>


	<head>
		<title>My books</title>
		<link href="main.css" type="text/css" rel="stylesheet">
	</head>
	<body>
		
	</body>
	
			
	<main>
	
		<!-- Var ska jag sätta form action någonstans? -->
		<form action="showreservedbooks.php" method="POST">
			<table id="t01" style="width:100%">
			
			</table>
		</form>	

		<?php

		$searchtitle = "";
		$searchauthor = "";

		if (isset($_POST) && !empty($_POST)) {
		
		    $searchtitle = trim($_POST['searchtitle']);
		    $searchauthor = trim($_POST['searchauthor']);
		}


		$searchtitle = addslashes($searchtitle);
		$searchauthor = addslashes($searchauthor);


		$searchtitle = htmlentities($searchtitle);
        $searchauthor = htmlentities($searchauthor);

		
		@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

		if ($db->connect_error) {
		    echo "could not connect: " . $db->connect_error;
		    printf("<br><a href=index.php>Return to home page </a>");
		    exit();
		}

		# Build the query. Users are allowed to search on title, author, or both
		//Ska ta bort query för att de böcker som inte är lånade inte ska synas, bara de lånade.
		//Men hur? kan ju inte bara ta bort detta här nere?

		$query = " SELECT bookid, title, author, onloan FROM book WHERE onloan = 1";
		if ($searchtitle && !$searchauthor) { // Title search only
		    $query = $query . " and title like '%" . $searchtitle . "%'";
		}
		if (!$searchtitle && $searchauthor) { // Author search only
		    $query = $query . " and author like '%" . $searchauthor . "%'";
		}
		if ($searchtitle && $searchauthor) { // Title and Author search
		    $query = $query . " and title like '%" . $searchtitle . "%' and author like '%" . $searchauthor . "%'"; 
		}

		 

	# Here's the query using bound result parameters
	    // echo "we are now using bound result parameters <br/>";
	    $stmt = $db->prepare($query);
	    $stmt->bind_result($bookid, $title, $author, $onloan);
	    $stmt->execute();
	    
	//    $stmt2 = $db->prepare("update onloan set 0 where bookid like ". $bookid);
	//    $stmt2->bind_result($onloan, $bookid);
	    

	    echo '<table id="t01" style="width:100%" '; 
	    echo '<tr><b><td>BookID</td><b> <td>Title</td> <td>Author</td> <td>Reserved?</td> </b> <td>Return</td> </b></tr>';
	    while ($stmt->fetch()) {
	        if($onloan==0)
		            $onloan="No";
		        else $onloan="Yes";
	       
	        echo "<tr>";
	        echo "<td> $bookid </td><td> $title </td><td> $author </td><td> $onloan </td>";
	        echo '<td><a href="returnbook.php?bookid=' . urlencode($bookid) . '"><input type="submit" value="Return"></input></a></td>';
	        echo "</tr>";
	        
	    }
	    echo "</table>";
	    ?>



	</main>
	<!-- <?php //include("footer.php"); ?> -->
</html>





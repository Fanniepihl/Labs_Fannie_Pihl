<?php
include("config.php");
$title = "Administrative Book Search";
include("header.php");
?>

		

        	<!-- $searchtitle = ""; -->
        	<!-- $searchauthor = ""; -->

            <?php if (isset($_POST) && !empty($_POST)) : ?>
                
            	<h3>Book Search Results</h3>
            	<hr>

            <?php

                $searchtitle = trim($_POST['searchtitle']);
                $searchauthor = trim($_POST['searchauthor']);
              
              	if (!$searchtitle && !$searchauthor) {
              		printf("You must specify either a title or an auther");
              		exit();
              	}
               
                $searchtitle = addslashes($searchtitle);
                $searchauthor = addslashes($searchauthor);

                $searchtitle = htmlentities($searchtitle);
                $searchauthor = htmlentities($searchauthor);


               // $authorid = array_search($searchauthor, array_column($books, 'author'));
                //open databas!! 
                @ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

                if ($db->connect_error) {
				    echo "could not connect: " . $db->connect_error;
				    printf("<br><a href=index.php>Return to home page</a>");
				    exit();
				}

				//Build the query. You are allowed to search on title, author, or both

				$query = " SELECT * FROM books";
				if ($searchtitle && !$searchauthor) { // Title search only
				    $query = $query . " Where title like '%" . $searchtitle . "%'";
				}
				if (!$searchtitle && $searchauthor) { // Author search only
				    $query = $query . " Where author like '%" . $searchauthor . "%'";
				}
				if ($searchtitle && $searchauthor) { // Title and Author search
				    $query = $query . " Where title like '%" . $searchtitle . "%' and author like '%" . $searchauthor . "%'"; 
				} 


				$stmt = $db->prepare($query);
			    $stmt->bind_result($bookid, $title, $author, $onloan);
			    $stmt->execute();

				echo '<table id="t01" style="width:100%" >';
			    echo '<tr><b><td>BookID</td><b> <td>Title</td> <td>Author</td> <td>Reserved?</td> </b> <td>Reserved</td> </b></tr>';
			    while ($stmt->fetch()) {
			        if($onloan==0)
			            $onloan="No";
			        else $onloan="Yes";
			       
			        echo "<tr>";
			        echo "<td> $bookid </td><td> $title </td><td> $author </td><td> $onloan </td>";
			        echo '<td><a href="reservebook.php?bookid=' . urlencode($bookid) . '"><input type="submit" value="Reserve"></input></a></td>';
			        echo "</tr>";
	        
		    }
		    echo "</table>";
			}
		    ?>
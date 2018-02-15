<!doctype>
<html>
	<head>
		<title>Browse Books</title>
		<link href="main.css" type="text/css" rel="stylesheet">
	</head>
	<body>
		<?php include("header.php"); ?>
		<?php include("config.php"); ?>
	</body>


	<main>
			<form action="browsbooks.php" method="POST">
				<fieldset>
					<legend>Browse Books:</legend><br>
			    	<table bgcolor="#ffffff">
			    		<tbody>
			    		Book Title:<br>
			    		<INPUT type="text" id="searchtitle" name="searchtitle" value=""><br>
			    		Author:<br>
			    		<INPUT type="text" id="searchauthor" name="searchauthor" value=""><br>
			    		<INPUT type="submit" name="submit" value="Search">
			    	</table>
			  	</fieldset>
			</form>
			

		<fieldset>
			<legend>Book List:</legend>

       		<?php

        	$searchtitle = "";
        	$searchauthor = "";

            if (isset($_POST) && !empty($_POST)) {
                
                $searchtitle = trim($_POST['searchtitle']);
                $searchauthor = trim($_POST['searchauthor']);
              

               
                $searchtitle = addslashes($searchtitle);
                $searchauthor = addslashes($searchauthor);

                $searchtitle = htmlentities($searchtitle);
                $searchauthor = htmlentities($searchauthor);


               // $authorid = array_search($searchauthor, array_column($books, 'author'));

                @ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

                if ($db->connect_error) {
				    echo "could not connect: " . $db->connect_error;
				    printf("<br><a href=index.php>Return to home page</a>");
				    exit();
				}

						// " SELECT * FROM book" //

				$query = " SELECT bookid, title, author, onloan FROM book";
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



                //echo '<table bgcolor="#ffffff" cellpadding="6">';
               // echo '<tr><b><td>Title</td> <td>Author</td> <td>Reserve</td> </b> </tr>';
               // if ($titleid !== FALSE) {
                 //   $book = $books[$titleid];
                 //   $bookauthor = $books[$authorid];
                //    $title = $book['title'];
               //     $author = $book['author'];
                //    echo "<tr>";
                //    echo "<td> $title </td><td> $author </td>";

                   // echo '<td><a href="reserve.php?reservation=' .  urlencode($title) . '"> Reserve </a></td>';
                //    echo "</tr>";
                //}elseif($authorid !== FALSE){
                //	$book = $books[$authorid];
                //    $bookauthor = $books[$authorid];
                //    $title = $book['title'];
                //    $author = $book['author'];
                //    echo "<tr>";
                //    echo "<td> $title </td><td> $author </td>";
                //    echo '<td><a href="reserve.php?reservation=' .  urlencode($title) . '"> Reserve </a></td>';
                //    echo "</tr>";

                //}
                //echo "</table>";
           // } 
            //else 
              //  {                
                //echo '<table bgcolor="#ffffff" cellpadding="6">';
               // echo '<tr><b><td>Title</td> <td>Author</td> <td></td> </b> </tr>';
              //  foreach ($books as $book) {
                //    $title = $book['title'];
                //    $author = $book['author'];
                  //  echo "<tr>";
                //    echo "<td> $title </td><td> $author </td>";
                  //  echo '<td><a href="reserve.php?reservation=' . urlencode($title) . '"> Reserve </a></td>';
                  //  echo "</tr>";
             //   }
               // echo "</table>";
          //  }

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

		</fieldset>
		
	</main>
	<?php include("footer.php"); ?>
</html>













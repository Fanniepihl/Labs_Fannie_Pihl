<?php include 'config.php'; 
?>
<html>
<head>
        <title>Browse Books</title>
        <link href="../css/main.css" type="text/css" rel="stylesheet">
    </head> 

<header>

	<div>
		<nav id="mainnav">
			<ul>
				<li>
					<a class="<?php echo ($current_page == 'index.php' || $current_page == '') ? 'active' : NULL ?>" href="index.php">Home</a>
				</li>
				<li>
					<a class="<?php echo $current_page == 'add.php' ? 'active' : NULL ?>" href="add.php">Add book</a>
				</li>
				<li>
					<a class="<?php echo $current_page == 'delete_books.php' ? 'active' : NULL ?>" href="delete_books.php">Delete book</a>
				</li>
				<li>
					<a class="<?php echo $current_page == 'upload.php' ? 'active' : NULL ?>" href="upload.php">Upload images<br>
					to gallary</a>
				</li>
				<li>
					<a class="<?php echo $current_page == 'logut.php' ? 'active' : NULL ?>" href="logout.php">Sign out</a>
				</li>
			</ul>
		</nav>
	</div>
</header>



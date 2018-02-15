<header>
	<a href="http://localhost:8888/lab_1/index.php"><img class="bok" src="img/bc.png"/></a>

	<div>
		<nav id="mainnav">
		<?php include 'config.php'; ?>
			<ul>
				<li>
					<a class="<?php echo ($current_page == 'index.php' || $current_page == '') ? 'active' : NULL ?>" href="index.php">Home</a>
				</li>
				<li>
					<a class="<?php echo $current_page == 'about.php' ? 'active' : NULL ?>" href="about.php">About Us</a>
				</li>
				<li>
					<a class="<?php echo $current_page == 'browsbooks.php' ? 'active' : NULL ?>" href="browsbooks.php">Browse Books</a>
				</li>
				<li>
					<a class="<?php echo $current_page == 'mybook.php' ? 'active' : NULL ?>" href="mybook.php">My Books</a>
				</li>
				<li>
					<a class="<?php echo $current_page == 'contact.php' ? 'active' : NULL ?>" href="contact.php">Contact</a>
				</li>
				<li>
					<a class="<?php echo $current_page == 'gallery.php' ? 'active' : NULL ?>" href="gallery.php">Gallery</a>
				</li>
				<li>
					<a class="<?php echo $current_page == 'sqlinjection.php' ? 'active' : NULL ?>" href="sqlinjection.php">Sign In</a>
				</li>
			</ul>
		</nav>
	</div>
</header>



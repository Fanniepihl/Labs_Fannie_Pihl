<?php include 'config.php'; ?>

<header>
	<a href="http://localhost:8888/Admin/index.php"></a>

	<div>
		<nav id="mainnav">
		
			<ul>
				<li>
					<a class="<?php echo ($current_page == 'index.php' || $current_page == '') ? 'active' : NULL ?>" href="index.php">Home</a>
				</li>
				<li>
					<a class="<?php echo $current_page == 'mainlogin.php' ? 'active' : NULL ?>" href="mainlogin.php">Sign In</a>
				</li>
			</ul>
		</nav>
	</div>
</header>



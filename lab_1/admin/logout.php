<?php
    session_start();
    session_destroy();
    header("main_login.php");
?>    

<?php include("header.php"); ?>
<?php include("config.php"); ?>

<?php
 @ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

    if ($db->connect_error) {
        echo "could not connect: " . $db->connect_error;
        exit();
    }





?>    

<html>
<head>
  <title>Sign Out Here!</title>
  <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<main class="home">
		<h1>Sign out here!</h1>
	<form action="logout.php" method="POST">
		<table id="t01" style="width:100%">
			<input type="submit" name="Sign Out" Value="Sign Out"> 
			
			<!-- <?php
			//echo 'you are loged out!';
			?> -->

		</table>
	</form>	
	</div>
</main>
</html>
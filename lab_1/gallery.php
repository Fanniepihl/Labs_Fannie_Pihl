<!doctype>
<html>
	<head>
		<title>Gallery</title>
		<link href="main.css" type="text/css" rel="stylesheet">
	</head>
	<body>
		<?php include("header.php"); ?>
		<?php include("config.php"); ?>

		
		<h3>Here we store all uploaded images!</h3>
		<h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</h5>

		

		<?php
	     
	    	$files = glob("uploadedfiles/*.*");
	    		for ($i=0; $i<count($files); $i++)
	      		{
	       			$uploadedfiles = $files[$i];
	        		$supported_file = array(
	              	 'gif',
	               	 'jpg',
	               	 'jpeg',
	               	 'png'
	         		);

	        $ext = strtolower(pathinfo($uploadedfiles, PATHINFO_EXTENSION));
	        	if (in_array($ext, $supported_file)) {
	            	echo basename($uploadedfiles)."<br />"; 
	            	echo '<img src="'.$uploadedfiles .' "alt="Random image" style="max-height:200px;max-width:200px" style=""/>'."<br /><br />";
	            	} 
	            	else {
	                continue;
	            	}
	          	}
	          	
	    ?>

	


	</body>
	<?php include("footer.php"); ?>
</html>
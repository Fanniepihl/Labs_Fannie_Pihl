<!doctype>
<html>
	<head>
		<title>Contact</title>
		<link href="main.css" type="text/css" rel="stylesheet">
	</head>
	<body>
		<?php include("header.php"); ?>
		<?php include("config.php"); ?>
	</body>
	<main>
		<div class="container">
			<form action="/action_page.php">
				<label for="fname">First Name</label>
			    <input type="text" id="fname" name="firstname" placeholder="Your name..">
			    <label for="lname">Last Name</label>
			    <input type="text" id="lname" name="lastname" placeholder="Your last name..">
			    <label for="country">Country</label>
				    <select id="country" name="country">
					    <option value="sweden">Sweden</option>
					    <option value="canada">Canada</option>
					    <option value="usa">USA</option>
					    <option value="australia">Australia</option>
					    <option value="UK">UK</option>
				    </select>
			    <label for="subject">Subject</label>
			    <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>
			    <input type="submit" value="Submit">
			</form>
		</div>
	</main>
	<?php include("footer.php"); ?>
</html>







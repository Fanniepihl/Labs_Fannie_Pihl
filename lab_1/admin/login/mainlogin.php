<?php include("config.php");  ?>

<?php
session_start();
if (isset($_SESSION['uname'])) {
    header("location:../index.php");
}
?>

<?php if(isset($_POST) && !empty($_POST)) : ?>

<?php 
    $myusername =  stripslashes($_POST['myusername']);
    $mypassword =  stripslashes($_POST['mypassword']);
    
    @ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

    if ($db->connect_error) {
        echo "could not connect: " . $db->connect_error;
        exit();
    }

    $stmt = $db->prepare("SELECT username, password FROM librarians WHERE username = ?");
    $stmt->bind_param('s', $myusername);
    $stmt->execute();
    
    $stmt->bind_result($username, $password);

    while ($stmt->fetch()) {
        if (sha1($mypassword) == $password)
        {
            $_SESSION['username'] = $myusername;
            header("location:index.php");
            exit();
        }
    }

?>

<?php endif;?>


<html>
<head>
  <title>Sign In</title>
  <link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>
<body>
<div class="topnav">
  <a class="active" href="mainlogin.php">Login</a> <!-- index.php --> 
</div>
<div class="container">
    <form method="POST" action=""><br>
            Username:<br>
            <input type="text" id="pname" name="username"><br>
            Password:<br>
            <input type="password" name="password"><br><br>
            <input type="submit" value="Sign in">
    </form>
</div>
</body>
</html>


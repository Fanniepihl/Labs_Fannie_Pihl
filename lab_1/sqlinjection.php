<?php



#this function is for older PHP versions that use Magic Quotes.
#
//    function escapestring($input) {
//    if (get_magic_quotes_gpc()) {
//    $input = stripslashes($input);
//    }
//
//    @ $db = new mysqli('localhost', 'root', '', 'testinguser');
//
//
//    return mysqli_real_escape_string($db, $input);
//
//    }

@ $db = new mysqli('localhost', 'root', 'root', 'Book');  
                                                            
//@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);


if ($db->connect_error) {
    echo "could not connect: " . $db->connect_error;
    printf("<br><a href=index.php>Return to home page </a>");
    exit();
}


    #the mysqli_real_espace_string function helps us solve the SQL Injection
    #it adds forward-slashes in front of chars that we can't store in the username/pass
    #in order to excecute a SQL Injection you need to use a ' (apostrophe)
    #Basically we want to output something like \' in front, so it is ignored by code and processed as text

if (isset($_POST['username'], $_POST['password'])) {
    #with statement under we're making it SQL Injection-proof
    $uname = mysqli_real_escape_string($db, $_POST['username']);
    
    #without function, so here you can try to implement the SQL injection
    #various types to do it, either add ' -- to the end of a username, which will comment out
    #or simply use 
    #' OR '1'='1' #
    #$uname = $_POST['username'];
    
    #here we hash the password, and we want to have it hashed in the database as well
    #optimally when you create a user (through code) you simply send a hash
    #hasing can be done using different methods, MD5, SHA1 etc.
    
    $upass = sha1($_POST['password']);
    
    #just to see what we are selecting, and we can use it to test in phpmyadmin/heidisql
    
    // echo "SELECT * FROM user WHERE username = '{$uname}' AND password = '{$upass}'";
    
    $query = ("SELECT * FROM user WHERE username = '{$uname}' "."AND password = '{$upass}'");
       
    
    $stmt = $db->prepare($query);
    $stmt->execute();
    $stmt->store_result(); 
    
    #here we create a new variable 'totalcount' just to check if there's at least
    #one user with the right combination. If there is, we later on print out "access granted"
    $totalcount = $stmt->num_rows();
      
    
}
?>

<!doctype>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="main.css" type="text/css" rel="stylesheet">
        <title>Sign in</title>
    </head>
    <body>

        <?php include("header.php"); ?>

    </body>    
    <main>
        <?php
        
        if (isset($totalcount)) {
            if ($totalcount == 0) {
                echo '<h2>You got it wrong. Can\'t break in here!</h2>';
            } 
            else {
                echo '<h2>Welcome! Correct password.</h2>';
                echo '<a href="fileupload.php">Here is the link</a>';
            }
        }
        ?>


        <form method="POST" action=""><br>
            Username:<br>
            <input type="text" id="pname" name="username"><br>
            Password:<br>
            <input type="password" name="password"><br><br>
            <input type="submit" value="Sign in">
        </form>

    </main>

    <?php include("footer.php"); ?>

</html>




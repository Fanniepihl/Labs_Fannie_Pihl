<?php



#we can create a function to add comments
#basically it inserts a comment in a database.

function add_comment($comment){
    
    
@ $db = new mysqli('localhost', 'root', 'root', 'Book');
//@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);


#here we add the html entities and string escaping

// htmlentities($comment) här nere!

$comment = htmlentities($comment);
//$comment= $comment;
$comment = mysqli_real_escape_string($db, $comment);


#<iframe style="position:fixed; top:10px; left:10px; width:100%; height:100%; z-index:99;" border="0" src="http://ju.se/"  />
#try the iframe after you add the "htmlentities"

$query = ("INSERT INTO comments(comment) VALUES ('{$comment}')");
$stmt = $db->prepare($query);
$stmt->execute();
    
}


#then we create a function to pull out all comments
#it goes in the database and pulls out all comments.

function get_comment(){
    
@ $db = new mysqli('localhost', 'root', 'root', 'Book');
// @ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);
    
$query = ("SELECT comment FROM comments");
$stmt = $db->prepare($query);
$stmt->bind_result($result);
$stmt->execute();


    while ($stmt->fetch()) {
        echo $result;
        echo "<hr/>";
    
    }

}


#here we test if the POST has been submited
#if yes, we call the function 'add_comment' which will add a new comment in the DB
if (isset($_POST['comment'])) {
    add_comment($_POST['comment']);
}


#here we call all comments to be shown by simply calling the get_comment function
get_comment();

#you can also store this in a variable and use later
# $allcomment = get_comment();
?>



<!doctype>
<html>
    <head>
        <meta http-equiv="Content_Type" content="text/html; charset=utf-8">
    </head>
    <body>
        <div>
            <hr>
            <form action="" method ="POST">
                <p>
                    <textarea name="comment" rows="15" cold="70"></textarea>
                    <input type ="submit" name="Comment">
                </p>        
            </form>
            </hr>
        </div>
    </body>
</html>
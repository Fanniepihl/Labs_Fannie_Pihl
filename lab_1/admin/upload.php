<?php
include("header.php");
include("config.php");
?>


<?php


if (isset($_FILES['upload'])){
    
    #let's first make a whitelist of allowed extensions        strpos? ist?
    $allowedextensions = array('jpg', 'jpeg', 'gif', 'png');
    $extension = strtolower(substr($_FILES['upload']['name'], strrpos($_FILES['upload']['name'], '.') + 1));
    
    // kolla på string strtolower och strpos. veta funktionen.


    #test by echoing out what you upload
    echo "Your file extension is: ".$extension;
    
    #we create an array called 'error' to store all our errors, so we can later use them.
    $error = array ();
    
    if(in_array($extension, $allowedextensions) === false){
        
        #add a new array entry
        $error[] = 'This is not an image, upload is only for images.';        
    }
    
    #it is also good to think about the size of the file you want to accept.
    #this is for images, so how big of an image would you like to accept?
    #this is in bytes, and 1000000 is actually 1 mb which is now our limit
    if($_FILES['upload']['size'] > 1000000){
        
        $error[]='The file exceeded the upload limit';
    }
    
    
    #now you do the 'final check' to see if there are no errors in the array.
    #if they array is empty = no errors have been written in it.
    #if there is something in the array 'errors' that means an error has occured and we should not upload
    
    if(empty($error)){
        
        #this is our starding point, in order to upload we need to move the file (uploaded file)
        #all the way to the location we want to store it.
        #But, before we do so it will be good to do all of the ABOVE written first
        #We check for errors that might disturb our code, and try to avoid them
        #if there are no errrors move the file to the desired file location
        move_uploaded_file($_FILES['upload']['tmp_name'], "../uploadedfiles/{$_FILES['upload']['name']}");     
    }
    
}


?>

<html>
      <head>
		       <title>Security - Upload</title>
            <link href="css/main.css" type="text/css" rel="stylesheet">
	   </head>
     
	   <body>

		
			 <div>
                   <?php 
                   
                   #Now we want to either upload the file or type an error
                   #what we do is basically  check if there's an array named 'error'
                   #and we check if it's empty. If it's empty that means no errors we found
                   #we should proceed with the upload.
                   if (isset($error)){
                       if (empty($error)){
                           
                           #here we give the user the chance to check the file right away. 
                           #this is just for testing purposes so we can see the file is there
                           #when the user clicks, it will open the folder "uploadedfiles" and look for filename
                           echo '<a href="../uploadedfiles/' . $_FILES['upload']['name'] . '">Check file';
                           
                       } else {
                           #else, if there was an error, then it simply goes through the error array
                           #it prints out ALL errors in the array.
                           #you can have one or more errors. 
                           #e.g. File too big, AND not supported!
                           foreach ($error as $err){
                               echo $err;
                           }
                           
                       }
                   }
                   
                   ?>
               </div>
               
               <!-- This is our form, important to use "enctype="multipart/form-data"
               
               -->
               <div>
                   
                   <form class="helena" action="" method="POST" enctype="multipart/form-data">
                       <input type="file" name="upload" /></br>
                       <input  type="submit" value="submit" />
                   </form>                   
               </div>

               <?php
       
        $files = glob("../uploadedfiles/*.*");
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
</html>
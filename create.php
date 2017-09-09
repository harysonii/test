<?php
    session_start();

    $con = mysqli_connect("localhost", "id773830_gothere", "learning", "id773830_gothere");
    //check connection...
    if ($con === false) {
        die ("couldn't connect to SQL Server");
    }


    if (isset($_SESSION['people_email'])){
        
        
          $selectdata = "SELECT * FROM people WHERE people_email = '".$_SESSION['people_email']."'" ;
    
    $imagename =$_FILES["myimage"]["name"];
        //get the content of the image and add slashes to it
        $imagetmp = addslashes (file_get_contents($_FILES['myimage']['tmp_name']));
        
        //insert the image name and cntent in image_table
        $insert_image = "IINSERT INTO events VALUES ('$imagetmp', '$imagename')";
        mysqli_query($con, $insert_image;)
        
    }
?>


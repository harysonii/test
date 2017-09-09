<?php
    if(isset($_POST['submit_password']) && $_POST['key'] && $_POST['reset']){
        $email = $_POST['key'];
        $password = $_POST['reset']; 
        
         $con = mysqli_connect("localhost", "root", "", "gothere");
    //check connection...
    if ($con == false) {
        die ("couldn't connect to SQL Server");
    }
    
    $select = mysqli_query($con, "UPDATE people SET people_pass='$password' WHERE people_email='$email'");
    }
?>
<?php
    session_start();

    $con = mysqli_connect("localhost", "id773830_gothere", "learning", "id773830_gothere");
    //check connection...
    if ($con === false) {
        die ("couldn't connect to SQL Server");
    }


    if (isset($_SESSION['people_email'])){
        
        
          $selectdata = "SELECT * FROM people WHERE people_email = '".$_SESSION['people_email']."'" ;
    
    $query = mysqli_query($con, $selectdata);
    
    while ($row = mysqli_fetch_array($query)) {
        
        $row = array(
        
            'fname' => $row['people_name'],
            'uname' => $row['people_uname'],
            
        );
        header('Content-Type: application/json');
        echo json_encode($row);
    }
    }
    else {
        echo '<p style="text-align:center;">';
        echo "You need to be Logged in to view profile";
        echo '</p>' ;
       
        
    }
?>


        
        
        


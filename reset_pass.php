<?php
    if($_GET['key'] && $_GET['reset']){
        $email = $_GET['key'];
        $password = $_GET['reset']; 
        
         $con = mysqli_connect("localhost", "root", "", "gothere");
    //check connection...
    if ($con == false) {
        die ("couldn't connect to SQL Server");}
        
        $select = mysqli_query($con, "SELECT people_email, people_pass FROM people WHERE md5 (people_email) ='$email' and md5 (people_pass) ='$pass'");
        
        if(mysqli_num_rows($con, $select) == 1) {
            ?>
             <div class="">
            <form method="post" class="ui form" action="submmit_new.php">
                 <div class="field">
                     <input type="hidden" name="email" placeholder="email" value="<?php echo $email;?>">
    <label>Enter new password</label>
    <input type="password" name="password" placeholder="*******">
  </div>
                <button class="ui fluid button" type="submit" name="submit_password">Submit</button>
            </form>
</div>
                 <?php
        }
    }
?>
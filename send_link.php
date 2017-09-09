<?php
    if(isset($_POST['submit_email']) && $_POST['email']){
        $con = mysqli_connect("localhost", "root", "", "gothere");
    //check connection...
    if ($con == false) {
        die ("couldn't connect to SQL Server");
    }
        $select = mysqli_query($con, "SELECT people_email, people_pass FROM people where email='$email'");
        if (mysqli_num_rows($con, $select)== 1) {
            while ($row = mysqli_fetch_array($con, $select)) {
                $email = md5($row['people_email']);
                $password = md5($row['people_pass']);
            }
            
            $link ="<a href='http://gothere.000webhostapp.com/reset_pass.php?key=".$email."&reset=".$password."'>Click to reset password</a>";
            require_once('phpmail/PHPMailerAutoload.php');
            $mail = new PHPMailer();
            $mail -> Charset = "utf-8";
            $mail -> IsSMTP();
            //Enable SMTP authentication
            $mail -> SMTPAuth = true;
            //Gmail username
            $mail -> Username = "haryson.onuoha@gmail.com";
            //Gmail password
            $mail -> Pasword = "@robots.";
            $mail -> SMTPSecure = "ssl";
            //sets Gmail as the SMTP server
            $mail -> Host = "smtp.gmail.com";
            //set the SMTP port for the Gmail server
            $mail -> Port = "465";
            $mail -> From = 'gothere@noreply';
            $mail -> FromName = 'Gothere';
            $mail -> AddAddres('reciever_email_id', 'reciever_name');
            $mail -> Subject = 'Reset Passsword';
            $mail -> IsHTML(true); 
            $mail -> Body ="CLick on this  Link to reset password '.$pass.'";
            
            if($mail -> Send()){
                echo "Click the link in your Email to reset password";
            }else {
                echo "Mail Error -> ".$Mail->ErrorInfo;
            }
        }
    }
?>
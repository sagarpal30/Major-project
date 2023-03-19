<?php
    require("config.php");

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    function sendMail($email,$reset_token)
    {
        require("phpMailer/Exception.php");
        require("phpMailer/PHPMailer.php");
        require("phpMailer/SMTP.php");

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'botsagar30@gmail.com';                     //SMTP username
            $mail->Password   = 'hifzklmdckewwncx';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
            //Recipients
            $mail->setFrom('botsagar30@gmail.com', 'SVIMS Register');
    
            $mail->addAddress($email);     //Add a recipient
            
        
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Password reset link from SVIMS';
            $mail->Body    = "We got a request from you to reset your password<br>
             <b>click the link to verify email address</b>
             <a href='http://localhost/final project/supdatepassword.php?email=$email&resettoken=$reset_token'>Reset Password</a>
             ";
      
        
            $mail->send();
            return true;
        } 
        catch (Exception $e) {
            return false;
        }

    }

    if(isset($_POST['sendLink']))
    {
        $query = "SELECT * FROM ssignup WHERE emailid = '$_POST[email]'";
        $result = mysqli_query($conn,$query);
        if($result)
        {
            if(mysqli_num_rows($result) == 1)
            {
                $reset_token=bin2hex(random_bytes(16));
                date_default_timezone_set('Asia/kolkata');
                $date=date("y-m-d");
                $query = "UPDATE ssignup SET resettoken='$reset_token', resettokenexpire='$date' WHERE emailid='$_POST[email]'";
                if(mysqli_query($conn,$query) && sendMail($_POST['email'],$reset_token))
                {
                    echo"
                    <script>
                    alert('password reset link send to mail');
                    window.location.href='index.php';
                    </script>
                    ";
                }
                else
                {
                    echo"
                    <script>
                    alert('server down');
                    window.location.href='index.php';
                    </script>
                    ";
                }
            }
            else
            {
                echo"
                <script>
                alert('email not found');
                window.location.href='index.php';
                </script>
                ";
            }
        }
        else
        {
           echo"
           <script>
           alert('cannot run query');
           window.location.href='index.php';
           </script>
           ";
        }
    }
?>
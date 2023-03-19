<?php
include("config.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendMail($email,$v_code){
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
        $mail->Subject = 'Email Verification from SVIMS';
        $mail->Body    = "Thanks for Registration!
         <b>click the link to verify email address</b>
         <a href='http://localhost/final project/verify.php?email=$email&v_code=$v_code'>Verify</a>
         ";
  
    
        $mail->send();
        return true;
    } 
    catch (Exception $e) {
        return false;
    }
}
function input_filter($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}

$pErr="";
if(isset($_POST['submit']))
// if ($_SERVER['REQUEST_METHOD'] == "POST")
{
    if(input_filter($_POST['ps']) !=  input_filter($_POST['cps']))
    {
        $pErr="password should match";
       echo "<script>alert('Password should be match')</script>";
    }
    $email=$_POST['ei'];
    $adminName=$_POST['an'];

    $userExistQuery= "SELECT * FROM asignup WHERE aname='$adminName' OR emailid='$email'";

    $result=mysqli_query($conn,$userExistQuery);

    if($result)
    {
        if(mysqli_num_rows($result)>0)
        {
            $resultFetch=mysqli_fetch_assoc($result);

            if($resultFetch['emailid']==$_POST['ei'])
            {
                echo "<script>alert('$resultFetch[emailid] - emailid already taken')</script>";
            }
            else
            {
                echo "<script>alert('$resultFetch[aname] - adminname already taken')</script>";
            }
        }
       
        else if(empty($pErr))
        {
            
            $query="INSERT INTO asignup(aimage,aname,emailid,password,verification_code,is_verified) VALUES(?,?,?,?,?,?)";
            
            $stmt = mysqli_prepare($conn,$query);

            if($stmt)
            {
                mysqli_stmt_bind_param($stmt, "ssssss",$folder,$adminName,$email,$password,$v_code,$v);

                $filename = $_FILES["uploadfile"]["name"];
                $tempname = $_FILES["uploadfile"]["tmp_name"];
    
                $folder = "aimages/".$filename;
        
        
                move_uploaded_file($tempname, $folder);
                
                $adminName=input_filter($_POST["an"]) ;
                $email=input_filter($_POST["ei"]) ;
               
                $password=password_hash($_POST["ps"],PASSWORD_DEFAULT) ;
                $v_code=bin2hex(random_bytes(16));
                $v=0;
               
                if(mysqli_stmt_execute($stmt) && sendMail($_POST['ei'],$v_code))
                {    
                    echo "<script>alert('please verify your mail from your given gmail account');
                        
                    </script>";
                }
                else
                {
                    echo "<script>alert('server down');
                    </script>"; 
                }
            }
            mysqli_stmt_close($stmt);
        }
        mysqli_close($conn);
    }
    // else
    // {
    //     echo "<script>alert('cannot run query or server down');
           
    //         </script>";
    // }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Sign Up</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
        <div class="titel">Admin Registration</div>
        <form action="#" method="POST" enctype="multipart/form-data">
            <div class="user-details">


            <div class="input-box">
                <span class="details">Add Admin Image</span>
                <input type="file" placeholder="" name="uploadfile" required>
            </div>

            <div class="input-box">
                <span class="details">Admin Name</span>
                <input type="text" placeholder="Enter your name" name="an" required>
            </div>
           
            <div class="input-box">
                <span class="details">Email</span>
                <input type="email" placeholder="Email Id" name="ei" required>
            </div>
            
           

           
            
            <div class="input-box">
                <span class="details">Password</span>
                <input type="password" placeholder="Password" name="ps" required>
            </div>
            <div class="input-box">
                <span class="details">Confirm Password</span>
                <input type="password" placeholder="Confirm Password" name="cps" required>
            </div>

            <!-- <div class="input-box">
                <span class="details">Verify Your Mail</span>
                <input type="text" placeholder="Verification code" required>
            </div> -->
            </div>
            <div class="button">
                <input type="submit" name="submit" value="Sign-up">
            </div>
            <div class="sign">
                <span>already registered? Please Login</span>
                <a href="alogin.php"><input type="button" value="Login"></a>
            </div>
        </form>
    </div>
</body>
</html>
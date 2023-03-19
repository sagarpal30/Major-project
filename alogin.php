<?php

session_start();
if(isset($_SESSION['emailid']))
{
    header("location: adminpanel.php");
    exit;
}

include("config.php");

    function input_filter($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }

    // if(isset($_POST['login']))
    if ($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $emailAdmin = input_filter($_POST['eiAn']);
        // $password = input_filter($_POST['ps']);
        $query = "SELECT * FROM asignup WHERE aname='$emailAdmin' or emailid='$emailAdmin'";

        $result = mysqli_query($conn,$query);
        if($result)
        {
            if(mysqli_num_rows($result)==1)
            {
                $result_fetch=mysqli_fetch_assoc($result);
                if($result_fetch['is_verified']==1)
                {   
                    if(password_verify($_POST['ps'],$result_fetch['password']))
                    {
                        $_SESSION['logged_in']=true;
                        $_SESSION['aname'] =$result_fetch['aname'];
                        header('location: adminpanel.php');
                    }
                    else
                    {
                        echo "<script>alert('incorect password');
                
                        </script>";
                    }
                }
                else
                {
                    echo "<script>alert('Email-Id not verified Please Verify Your Email');
           
                    </script>";
                }
            }
            else
            {
                echo "<script>alert('Email-Id or Admin Name not registered');
           
                </script>";  
            }
        }
        else
        {
            echo "<script>alert('cannot run query');
           
            </script>";
        }
    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="container">
        <div class="titel">Admin Login</div>
        <form action="#" method="POST" enctype="multipart/form-data">
            <div class="user-details">
   
       
           
            <div class="input-box">
                <span class="details">Email Or Admin Name</span>
                <input type="text" placeholder="Email Id OR Admin Name" name="eiAn" required>
            </div>
            
           

           
            
            <div class="input-box">
                <span class="details">Password</span>
                <input type="password" placeholder="Password" name="ps" required>
            </div>
            
            </div>
            <div class="button">
                <input type="submit" name="login" value="Login">
            </div>
            <div class="sign">
                <span>New Here?Please Register</span>
                <a href="asignup.php"><input type="button" value="Register"></a>
            </div>
            <div class="button">
                <a href="fgpage1.php"><input type="button" value="Forgot Password"></a>
            </div>
        </form>
    </div>
</body>
</html>
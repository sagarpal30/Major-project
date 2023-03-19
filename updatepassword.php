<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Update</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        form
        {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #f0f0f0;
            width:350px;
            border-radius: 5px;
            padding: 20px 25px 30px 25px;
        }
        form h3{
            margin-bottom: 15px;
            color: darkblue;
        }
        form input{
            width: 100%;
            margin-top: 20px;
            background-color: transparent;
            border: none;
            border-bottom: 2px solid black;
            padding: 5px 0;
            font-weight: 550;
            font-size: 14px;
            outline: none;
        }
        form button{
            font-weight: 550;
            font-size: 15px;
            color: white;
            background-color: blue;
            padding:4px 10px;
            border: none;
            outline: none;
            margin-top:5px;
        }
    </style>
</head>
<body>
    <?php
        require("config.php");
        if(isset($_GET['email']) && isset($_GET['resettoken']))
        {
            date_default_timezone_set('Asia/kolkata');
            $date=date("y-m-d");
            $query="SELECT * FROM asignup WHERE emailid = '$_GET[email]' AND resettoken = '$_GET[resettoken]' AND resettokenexpire = '$date'";
            $result=mysqli_query($conn,$query);
            if($result)
            {
                if(mysqli_num_rows($result)==1)
                {
                    echo"
                    <form method='post'>
                        <h3>Create new password</h3>
                        <input type='password' placeholder='New Password' name='password'>
                        <button type='submit' name='updatepassword'>UPDATE</button>
                        <input type='hidden' name='email' value='$_GET[email]'>
                    </form>
                    ";
                }
                else
                {
                    echo"
                    <script>
                    alert('expire date');
                    window.location.href='index.php';
                    </script>
                    ";
                }
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
    ?>

    <?php
        if(isset($_POST['updatepassword']))
        {
            $pass=password_hash($_POST['password'],PASSWORD_BCRYPT);
            $var = NULL;
            $update = "UPDATE asignup SET password='$pass', resettoken='$var', resettokenexpire='$var' WHERE emailid='$_POST[email]'"; 
            if(mysqli_query($conn,$update))
            {
                echo"
                <script>
                alert('password updated successfully');
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
    ?>
</body>
</html>
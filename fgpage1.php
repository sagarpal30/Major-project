<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <div class="titel">Reset Password</div>
        <form action="forgotpassword.php" method="POST" enctype="multipart/form-data">
            <div class="user-details">

         
            <div class="input-box">
                <span class="details">Email Or User Name</span>
                <input type="text" placeholder="Email Id" name="email" required>
            </div>
            
           
            <div class="sign">
                <input type="submit" name="send-reset-link" value="Send Mail">
            </div>
        </form>
    </div>
</body>
</html>
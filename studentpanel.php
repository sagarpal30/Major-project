
<?php
    require("config.php");

    session_start();

    $user= $_SESSION['username'];

    if($user == true)
    {

    }
    else
    {
        header("location: slogin.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/admin_dash.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <title>Student Dashboard Pannel</title>
    <script
    src="https://kit.fontawesome.com/b7bea72bea.js"
    crossorigin="anonymous"
  ></script>
</head>
<body>
    <nav>

        <div class="logo-name">
            <div class="logo-image">
                <img src="images/logo.webp">
            </div>
           
            <a href="studentpanel.php" style="text-decoration: none"><span class="logo_name">StudentPannel</span></a>
        </div>
        
       
        <div class="menu-items">
            <ul class="nav-links">
            <form action="#" method="POST">
                <li><a href="#"><i class="fa-solid fa-user"></i>
                    <span><input class="link-name" type="submit" name="show_details" value="View Details"></span>
                 </a> </li>

                 
            </ul>

            <ul class="logout-mod">
                <li>
                    <a href="logout.php"><i class="uil uil-signout"></i>
                    <span class="link-name">Logout</span>
                 </a> 
                </li>

                <li class="mode">
                    <a href="#"><i class="uil uil-moon"></i>
                    <span class="link-name">Dark Mode</span>
                 </a> 
                
                
                <div class="mode-toogle">
                <span class="switch"></span>
                </div>
                </li>
            </ul>
        </div>
        </form>
    </nav>


    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>
        
        <div class="search-box">
            <!-- <i class="uil uil-search"></i>
            <input type ="text"  placeholder="search here"> -->

            <h1>WELCOME  - <?php 

            if(isset($_SESSION['logged_in']))
            {
                echo $_SESSION['username']; 
                
            }
            ?>
            </h1>

        </div>
        <img src="images/logo.jpg">
        </div>

        <div class="dash_content">
            <h1>Student DashBoard</h1><br><br>
           <?php
            if(isset($_POST['show_details']))
            {
                
                $query ="select * from ssignup where username= '$_SESSION[username]'";
                $query_run = mysqli_query($conn,$query);
                while($row = mysqli_fetch_assoc($query_run))
                {
                    ?>
                   
                   <table cellspacing="10" cellpadding="10" border=2px solid black>

                        <tr>
                            <td><b>Student Photo</b></td>
                            <td>
                                <?php echo "<img src='".$row["simage"]."' height='100px' width='100px'disabled>"?>
                            </td>
                        </tr><br>

                        <tr>
                            <td><b>Full Name</b></td>
                            <td>
                                <input type="text" value="<?php echo $row['fullname'];?>" disabled>
                            </td>
                        </tr>

                        <tr>
                            <td><b>User Name</b></td>
                            <td>
                                <input type="text" value="<?php echo $row['username'];?>" disabled>
                            </td>
                        </tr>


                        <tr>
                            <td><b>Email Id</b></td>
                            <td>
                                <input type="email" value="<?php echo $row['emailid'];?>" disabled>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Phone No</b></td>
                            <td>
                                <input type="text" value="<?php echo $row['phoneno'];?>" disabled>
                            </td>
                        </tr>


                        <tr>
                            <td><b>Gender</b></td>
                            <td>
                                <input type="text" value="<?php echo $row['gender'];?>" disabled>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Registration No.</b></td>
                            <td>
                                <input type="text" value="<?php echo $row['regno'];?>" disabled>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Stream</b></td>
                            <td>
                                <input type="text" value="<?php echo $row['stream'];?>" disabled>
                            </td>
                        </tr>

                    </table>
                <?php

                    
                }
            }
           ?>




            <!-- <div class="overview"></div> -->
        </div>   
    </section>

    

    <script src="js/admin_dash.js"></script>
</body>
</html>


















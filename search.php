<?php
    require("config.php");

    session_start();

    $admin= $_SESSION['aname'];

    if($admin == true)
    {

    }
    else
    {
        header("location: alogin.php");
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
    <title>Admin Dashboard Pannel</title>
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
           
            <a href="adminpanel.php" style="text-decoration: none"><span class="logo_name">AdminPannel</span></a>
        </div>
        

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="search.php"><i class="fa-sharp fa-solid fa-magnifying-glass"></i>
                    <span class="link-name">Search Student</span>
                 </a> </li>

                 <li><a href="edit.php"><i class="fa-solid fa-user-pen"></i>
                    <span class="link-name">Edit Student</span>
                 </a> </li>

                 <li><a href="addStudent.php"><i class="fa-solid fa-user-plus"></i>
                    <span class="link-name">Add New Student</span>
                 </a> </li>

                <li><a href="delete.php"><i class="fa-solid fa-user-minus"></i>
                    <span class="link-name">Delete Student</span>
                 </a> </li>

                <!-- <li><a href="#"><i class="uil uil-thumbs-up"></i>
                    <span class="link-name">Likes</span>
                 </a> </li>

                <li><a href="#"><i class="uil uil-comments"></i>
                    <span class="link-name">Comments</span>
                 </a> </li>

                <li><a href="#"><i class="uil uil-share"></i>
                    <span class="link-name">Share</span>
                 </a> </li> -->
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
                echo $_SESSION['aname']; 
            }
            ?>
            </h1>

        </div>
        <img src="images/logo.jpg">
        </div>

        <div class="dash_content">
            <center>
                <form action="" method="POST">
                    Enter Registration no.
                    <input type="text" name="regno">
                    <input type="submit" name="search_student_by_reg_no_for_searh" value="Search">
                </form>
            
            <br>
            <br>
            <?php
                if(isset($_POST['search_student_by_reg_no_for_searh']))
                // if ($_SERVER['REQUEST_METHOD'] == "POST")
                {
                    $reg=$_POST['regno'];
                    $query = "SELECT * FROM ssignup where regno ='$reg'";
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
        </center>    
            <!-- <div class="overview"></div> -->
        </div>   
    </section>

    

    <script src="js/admin_dash.js"></script>
</body>
</html>




















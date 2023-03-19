<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Record System</title>
    <link rel="stylesheet" href="css/STYLE1.CSS">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body class="c">
   
  <nav class="navbar navbar-expand-lg bg-dark">
    <div class="container-fluid ">
        <img class="logo" src="images/logo.jpg" alt="logo">
        <a class="navbar-brand text-white" href="#"  style="
        background: linear-gradient(
          45deg,
          rgba(29, 236, 197, 0.5),
          rgba(91, 14, 214, 0.5) 100%
        );
      ">Swami Vivekananda Institute of Modern Studies</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active text-white" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active text-white" aria-current="page" href="about.php">About</a>
                </li>
                
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown"
                      aria-expanded="false">
                      Sign Up
                  </a>
                  <ul class="dropdown-menu bg-secondary ">
                      <li><a class="dropdown-item" href="asignup.php"> Admin signup</a></li>
                      <li><a class="dropdown-item" href="ssignup.php"> Student signup</a></li>

                  </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Login
                    </a>
                    <ul class="dropdown-menu bg-secondary ">
                        <li><a class="dropdown-item" href="alogin.php"> Admin Login</a></li>
                        <li><a class="dropdown-item" href="slogin.php"> Student Login</a></li>

                    </ul>
                </li>

               
            </ul>

        </div>
    </div>
</nav>
  
    


    
    <div class="container my-4">
        <div class="row featurette d-flex justify-content-center align-items-center">
            <div class="col-md-7">
                <center><h2>About Us</h2></center>
                <p class="lead">Swami Vivekananda Institute of Modern Studies aka SVIMS is one of the top Science and Management College in Kolkata. SVIMS offers Under Graduation ( U.G ) courses like BBA, BCA.</p>
            </div>
            <div class="col-md-5 order-md-1">
                <img class=" img-fluid bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" src="images/about1.jpg">
                

            </div>
        </div>

        <div class="row featurette d-flex justify-content-center align-items-center">
            <div class="col-md-7 order-md-2">
                
                <p class="lead">Swami Vivekananda Institute of Modern Studies, an Institute under the non-profit making trust has been set up to promote the technological and professional Institute of high standards and to encourage research and training activities so that the students, conferred to the degree can not only the professional challenges but also all the challenges life has to offer confidently. In this era of economic liberalizations, globalizations and technological super advancement our effort is to put quality education in the light of Swamiji’s vision of spreading education throughout the society.</p>
            </div>
            <div class="col-md-5 order-md-1">
            <img class=" img-fluid bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" src="images/about2.jpg">
                

            </div>
        </div>

        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
        crossorigin="anonymous"></script>
</body>

</html>
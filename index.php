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
                          Login
                      </a>
                      <ul class="dropdown-menu bg-secondary ">
                          <li><a class="dropdown-item" href="alogin.php"> Admin Login</a></li>
                          <li><a class="dropdown-item" href="slogin.php"> Student Login</a></li>

                      </ul>
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
              </ul>

          </div>
      </div>
  </nav>

  
    
      <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="images/p1.jpg" class="d-block w-100 size" alt="...">
          </div>
          <div class="carousel-item">
            <img src="images/p3.jpg" class="d-block w-100 size" alt="...">
          </div>
          <div class="carousel-item">
            <img src="images/p4.jpg" class="d-block w-100 size" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>

      <div class="container my-4">
        <div class="row mb-2">
            <div class="col-md-6">
              <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                  
                  <h3 class="mb-0">BBA</h3>
                  
                  <p class="card-text mb-auto">BBA(Bachelor of Business Administration) provides a fundamental education in business and management principles.</p>
                  <a href="https://en.wikipedia.org/wiki/Bachelor_of_Business_Administration" class="stretched-link">Continue reading</a>
                </div>
                <div class="col-auto d-none d-lg-block">
                    <img src="images/thum1.png" class="bd-placeholder-img" width="200" height="250">
                 
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                 
                  <h3 class="mb-0">BCA</h3>
                 
                  <p class="mb-auto">BCA(Bachelor of Compter Application) provides the basic knowledge of software engineering, funadamental of computer science and also provides some importamnt knowledge about programming language.</p>
                  <a href="https://en.wikipedia.org/wiki/BCA" class="stretched-link">Continue reading</a>
                </div>
                <div class="col-auto d-none d-lg-block">
                    <img src="images/thum2.png" class="bd-placeholder-img" width="200" height="250">
                 
                </div>
              </div>
            </div>
          </div>
      </div>
    
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
        crossorigin="anonymous"></script>
</body>

</html>
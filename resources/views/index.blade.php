<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>FishMart</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

  <!-- Custom styles for this template -->
  <link href="cssHome/shop-homepage.css" rel="stylesheet">
  <style>
    .navbar1{
      position:relative;
      display:-ms-flexbox;
      display:flex;
      -ms-flex-wrap:wrap;
      flex-wrap:wrap;
      -ms-flex-align:center;
      align-items:center;
      -ms-flex-pack:justify;
      justify-content:space-between;
      padding:.5rem 1rem
    }
    .nav-mod{
      float: right;
    }
    .container-mod{
      padding-top: 50px;
    }
  </style>

</head>

<body style="background-color: cornflowerblue;">

  <!-- Navigation -->
  <nav class="navbar1 navbar-expand-lg navbar-dark bg-primary fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">FishMart</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class= "nav-mod navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Services</a>
          </li>
          <li class="nav-item pl-2 mb-2 mb-md-0">
            <a href="{{ url('/login') }}" type="button"
              class="btn btn-outline-dark btn-md btn-rounded btn-navbar waves-effect waves-light">Sign in</a>
          </li>
          <li class="nav-item pl-2 mb-2 mb-md-0">
            <a href="{{ url('/registration') }}" type="button"
              class="btn btn-outline-info btn-md btn-rounded btn-navbar waves-effect waves-light">Sign up</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  

  <!-- Page Content -->
  <div class="container container-mod">

    
      <!-- /.col-lg-3 -->

      <div >

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="width: 100%;">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" src="images/1.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="images/2.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="images/3.jpg" alt="Third slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="images/4.jpg" alt="Fourth slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

        
          <div class="row">
            <div class="col-sm-12">
            <!-- Section Title -->
            <div class="section-title" style="color: dimgrey;">
              <h1 style="color: black;">Welcome FishMart</h1>
              <div class="divider"></div>
            </div>
          </div>
          </div>
         
          
        <div class="row">

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="images/1.jpg"alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="#">Fish One</a>
                </h4>
                <h5>$24.99</h5>
                <p class="card-text"></p>
              </div>
              <div class="card-footer">
                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="images/2.jpg" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="#">Fish Two</a>
                </h4>
                <h5>$24.99</h5>
                <p class="card-text"></p>
              </div>
              <div class="card-footer">
                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="images/3.jpg"alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="#">Fish Three</a>
                </h4>
                <h5>$24.99</h5>
                <p class="card-text"></p>
              </div>
              <div class="card-footer">
                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="images/4.jpg"alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="#">Fish Four</a>
                </h4>
                <h5>$24.99</h5>
                <p class="card-text"></p>
              </div>
              <div class="card-footer">
                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="images/5.jpg"alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="#">Fish Five</a>
                </h4>
                <h5>$24.99</h5>
                <p class="card-text"></p>
              </div>
              <div class="card-footer">
                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="images/0822.jpg"alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="#">Fish Six</a>
                </h4>
                <h5>$24.99</h5>
                <p class="card-text"></p>
              </div>
              <div class="card-footer">
                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
              </div>
            </div>
          </div>

        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-sm-12">
          <!-- Section Title -->
          <div class="section-title" style="color: dimgrey;">
            <h1 style="color: seashell;">Hot Deals</h1>
            <div class="divider"></div>
          </div>
        </div>
        </div>
       
        
      <div class="row">

        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="images/1.jpg"alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#">Fish One</a>
              </h4>
              <h5>$24.99</h5>
              <p class="card-text"></p>
            </div>
            <div class="card-footer">
              <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="images/2.jpg" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#">Fish Two</a>
              </h4>
              <h5>$24.99</h5>
              <p class="card-text"></p>
            </div>
            <div class="card-footer">
              <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="images/3.jpg"alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#">Fish Three</a>
              </h4>
              <h5>$24.99</h5>
              <p class="card-text"></p>
            </div>
            <div class="card-footer">
              <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="images/4.jpg"alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#">Fish Four</a>
              </h4>
              <h5>$24.99</h5>
              <p class="card-text"></p>
            </div>
            <div class="card-footer">
              <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="images/5.jpg"alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#">Fish Five</a>
              </h4>
              <h5>$24.99</h5>
              <p class="card-text"></p>
            </div>
            <div class="card-footer">
              <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="images/0822.jpg"alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#">Fish Six</a>
              </h4>
              <h5>$24.99</h5>
              <p class="card-text"></p>
            </div>
            <div class="card-footer">
              <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
            </div>
          </div>
        </div>

      </div>

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-primary" >
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; FishMart</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>



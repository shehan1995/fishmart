<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>FishMart</title>

    <!-- Bootstrap core CSS -->
    <link href="vendorHome/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <!-- Custom styles for this template -->
    <link href="cssHome/shop-homepage.css" rel="stylesheet">
    <style>
        .navbar1 {
            position: relative;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            -ms-flex-align: center;
            align-items: center;
            -ms-flex-pack: justify;
            justify-content: space-between;
            padding: .5rem 1rem
        }

        .nav-mod {
            float: right;
        }

        .container-mod {
            /*padding-top: 50px;*/
            /*margin: 10px;*/
        }

        .nav-text {
            font-size: x-large;
            /*font-weight: bold;*/
            color: #d0d0d0;
        !important;
            margin-right: 10px;
        }

        .img-card {
            height: 182px;
        }

        .fish-name {
            font-size: xx-large;
        }
        .modtitle{
            color: white;
        }
    </style>

</head>

<body style="background-color: #00abf0;">

<!-- Navigation -->
<nav class="navbar1 navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container row" style="width: fit-content ;height: 60px; padding-left: 70px">
        {{--      <a class="navbar-brand" href="#">--}}
        <img src="images/logo.png" style="height: 250px; width: 250px">
        {{--      </a>--}}
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive" style="padding-left: 70px">
            <ul class="nav-mod navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link nav-text" href="#">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  nav-text" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  nav-text" href="#">Store</a>
                </li>
                <li class="nav-item pl-2 mb-2 mb-md-0">
                    <a href="{{ url('/login') }}" type="button"
                       class="btn btn-outline-info btn-md btn-rounded btn-navbar waves-effect waves-light  nav-text">Sign
                        in</a>
                </li>
                <li class="nav-item pl-2 mb-2 mb-md-0">
                    <a href="{{ url('/registration') }}" type="button"
                       class="btn btn-outline-info btn-md btn-rounded btn-navbar waves-effect waves-light  nav-text">Sign
                        up</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Page Content -->
<div class=" container-mod">


    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"
         style="width: 100%; overflow: hidden">
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
                <img src="images/logo.png" style="height: 250px; width: 250px">

                <h1 style="color: black; font-size: xx-large; font-weight: bold; ">Welcome ලෙල්ලම.lk</h1>
                <div class="divider"></div>
            </div>
        </div>
    </div>


    <div class="row" style="padding-left: 70px; padding-right: 70px">

        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
                <a href="#"><img class="card-img-top" src="images/1.jpg" alt=""></a>
                <div class="card-body">
                    <h4 class="card-title">
                        <a class="fish-name" href="#">Thalapath තලපත්</a>
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
                <a href="#"><img class="card-img-top" src="images/tuna.png" alt=""></a>
                <div class="card-body">
                    <h4 class="card-title">
                        <a class="fish-name" href="#"> බලයා Tuna</a>
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
                <a href="#"><img class="card-img-top img-card" src="images/0822.jpg" alt=""></a>
                <div class="card-body">
                    <h4 class="card-title">
                        <a class="fish-name" href="#"> ඉස්සෝ Prawns</a>
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
                <a href="#"><img class="card-img-top img-card" src="images/dallo.jpg" alt=""></a>
                <div class="card-body">
                    <h4 class="card-title">
                        <a class="fish-name" href="#">දැල්ලෝ Cuttle Fish </a>
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
                <a href="#"><img class="card-img-top" src="images/4.jpg" alt=""></a>
                <div class="card-body">
                    <h4 class="card-title">
                        <a class="fish-name" href="#">කෙලවල්ලා Kelawalla</a>
                    </h4>
                    <h5>$24.99</h5>
                    <p class="card-text"></p>
                </div>
                <div class="card-footer">
                    <small class="text-uted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
                <a href="#"><img class="card-img-top img-card" src="images/hurulla.jpg" alt=""></a>
                <div class="card-body">
                    <h4 class="card-title">
                        <a class="fish-name" href="#">හුරුල්ලා Hurulla </a>
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
                <h1 style="color: seashell; font-size: xx-large">Hot Deals</h1>
                <div class="divider"></div>
            </div>
        </div>
    </div>


    <div class="row" style="padding-left: 70px; padding-right: 70px">

        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
                <a href="#"><img class="card-img-top" src="images/1.jpg" alt=""></a>
                <div class="card-body">
                    <h4 class="card-title">
                        <a class="fish-name" href="#">Thalapath තලපත්</a>
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
                <a href="#"><img class="card-img-top" src="images/tuna.png" alt=""></a>
                <div class="card-body">
                    <h4 class="card-title">
                        <a class="fish-name" href="#"> බලයා Tuna</a>
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
                <a href="#"><img class="card-img-top img-card" src="images/0822.jpg" alt=""></a>
                <div class="card-body">
                    <h4 class="card-title">
                        <a class="fish-name" href="#"> ඉස්සෝ Prawns</a>
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
                <a href="#"><img class="card-img-top img-card" src="images/dallo.jpg" alt=""></a>
                <div class="card-body">
                    <h4 class="card-title">
                        <a class="fish-name" href="#">දැල්ලෝ Cuttle Fish </a>
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
                <a href="#"><img class="card-img-top" src="images/4.jpg" alt=""></a>
                <div class="card-body">
                    <h4 class="card-title">
                        <a class="fish-name" href="#">කෙලවල්ලා Kelawalla</a>
                    </h4>
                    <h5>$24.99</h5>
                    <p class="card-text"></p>
                </div>
                <div class="card-footer">
                    <small class="text-uted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
                <a href="#"><img class="card-img-top img-card" src="images/hurulla.jpg" alt=""></a>
                <div class="card-body">
                    <h4 class="card-title">
                        <a class="fish-name" href="#">හුරුල්ලා Hurulla </a>
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

<!-- /.row -->

<!-- /.container -->

<!-- Footer -->
<footer class="py-5 bg-dark" style="margin-top: 30px">
    <!-- /.container -->

    <section id="yt_spotlight10" class="block">
{{--        <div class="container">--}}
            <div class="row">
                <div id="bottom3" class="col-sm-3" style="padding-right: 100px; padding-left: 100px">

                    <div class="module  clearfix">
                        <h3 class="modtitle">Contact Us</h3>
                        <div class="modcontent clearfix">

                            <div class="el-map-info">
                                <div class="el-desc"><img src="/templates/sj_megashop/images/logo_white.png" alt="">
                                </div>
                                <br>
                                <div class="el-info-contact">
                                    <div class="info-address cf"><span class="info-label"><span class="icon-label"><img
                                                        src="/templates/sj_megashop/images/icon/icon_map1.png"
                                                        alt=""></span><span style="color: #ffffff;">89, Fish Super Market,<br> Peliyagoda, Sri Lanka</span></span>
                                    </div>
                                    <br>
                                    <div class="info-mobie cf"><span class="info-label" style="color: #ffffff;"><span
                                                    class="icon-label"><img
                                                        src="/templates/sj_megashop/images/icon/icon_map3.png"
                                                        alt=""></span>+94 11-2323576/+94 719 579 579</span>
                                    </div>
                                    <br>
                                    <div class="info-mail cf"><span style="color: #ffffff;"><a
                                                    href="mailto:info@freshfish.lk" class="info-label"
                                                    style="color: #ffffff;"><span class="icon-label"><img
                                                            src="/templates/sj_megashop/images/icon/icon_map2.png"
                                                            alt=""></span></a><a href="mailto:info@freshfish.lk"
                                                                                 style="color: #ffffff;">info@freshfish.lk</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div id="bottom4" class="col-sm-3"style="padding-right: 100px">

                    <div class="module  clearfix">
                        <h3 class="modtitle">Find Us</h3>
                        <div class="modcontent clearfix">
                            <!-- BEGIN: Custom advanced (www.pluginaria.com) -->
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d126731.10281374092!2d79.888413!3d6.968332!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd1e2ffe1e5e39f4d!2sCentral+Fish+Market+Complex!5e0!3m2!1sen!2sus!4v1475568437238"
                                    width="280" height="200" frameborder="0" style="border:0"
                                    allowfullscreen=""></iframe><!-- END: Custom advanced (www.pluginaria.com) -->
                        </div>
                    </div>

                </div>
                <div id="bottom5" class="col-sm-3" style="padding-left: 100px">

                    <div class="module  clearfix">
                        <h3 class="modtitle">About Us</h3>
                        <div class="modcontent clearfix">

                            <p><span style="color: #ffffff;">Fishmart.lk is the first &amp; only full fledged Online Seafood Store that sells fresh seafood online &amp; provides delivery to most parts of areas in Colombo. We have well over 8 years of experience in the fishing industry &amp; we are a supplier of seafood to fish sellers, restaurants &amp; for other occasional all over in Colombo. Now, we've opened an online store to cater to households in Colombo.</span>
                            </p>
                        </div>
                    </div>

                </div>
                <div id="bottom6" class="col-sm-3">

                    <div class="module  clearfix">
                        <h3 class="modtitle">Quick Menu</h3>
                        <div class="modcontent clearfix">

                            <ul>
                                <li><span style="color: #ffffff;"><a href="/aboutfreshfish" style="color: #ffffff;">About Us</a></span>
                                </li>
                                <li><span style="color: #ffffff;"><a href="/aboutfreshfish/how-to-order"
                                                                     style="color: #ffffff;">Services</a></span></li>
                                <li><span style="color: #ffffff;"><a href="/aboutfreshfish/delivery-area"
                                                                     style="color: #ffffff;">Sign in</a></span></li>
                                <li><span style="color: #ffffff;"><a href="/aboutfreshfish/terms-conditions"
                                                                     style="color: #ffffff;">Terms &amp; Conditions</a></span>
                                </li>
                                <li><span style="color: #ffffff;"><a href="/products"
                                                                     style="color: #ffffff;">Products</a></span></li>
                                <li><span style="color: #ffffff;"><a href="#" style="color: #ffffff;">Sign Up</a></span>
                                </li>
                                <li><span style="color: #ffffff;"><a href="/contact-us" style="color: #ffffff;">Contact Us</a></span>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
{{--        </div>--}}

    </section>

    <div class="container" style="padding-top: 10px">
        <p class="m-0 text-center text-white">Copyright &copy; FishMart</p>
    </div>

</footer>

<!-- Bootstrap core JavaScript -->
<script src="vendorHome/jquery/jquery.min.js"></script>
<script src="vendorHome/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>



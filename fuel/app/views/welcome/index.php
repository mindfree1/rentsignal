<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Basic Page Needs
    ================================================== -->
    <?php echo Asset::css(array('layout.css','map-styles.css','jquery-ui-1.8.21.custom.css', 'bootstrap.css', 'font-awesome.css', 'owl.carousel.css', 'owl.theme.css', 'style.css', 'responsive.css')); ?>
    <?php echo Asset::js(array('jquery.1.11.1.js','markerclusterer.js','jquery-ui-1-11-4.js','infobubble.js','mapgen.js', 'angular.js', 'core_func.js', 'jquery.mCustomScrollbar.js')); ?>
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="x-ua-compatible" content="IE=9" /><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rentsignal Local</title>
    <meta name="description" content="">
    <meta name="keywords" content="bootstrap theme, portfolio template, digital agency, onepage, mobile responsive, spirit8, free website, free theme, themeforces themes, themeforces wordpress themes, themeforces bootstrap theme">
    <meta name="author" content="ThemeForces.com">
    
    <!-- Favicons
    ================================================== -->
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="assets/img/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="assets/img/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="assets/img/apple-touch-icon-114x114.png">

    <!-- Bootstrap -->
    <!--<link rel="stylesheet" type="text/css"  href="assets/css/bootstrap.css">-->
    <!--<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">-->

    <!-- Slider
    ================================================== -->
    <!--<link href="css/owl.carousel.css" rel="stylesheet" media="screen">-->
    <!--<link href="css/owl.theme.css" rel="stylesheet" media="screen">-->

    <!-- Stylesheet
    ================================================== -->
    <!--<link rel="stylesheet" type="text/css"  href="css/style.css">-->
    <!--<link rel="stylesheet" type="text/css" href="css/responsive.css">-->

    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,700,300,600,800,400' rel='stylesheet' type='text/css'>

    <script type="text/javascript" src="assets/js/modernizr.custom.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div id="listContent">
    <div id="searchContent">
        <ul class="slider-content">
            <div id="controls">
            <form action="" name="control-form">
            <fieldset style="">
                <p><label for="amount">Price range:</label>
                <input type="text" id="amount"/></p>
                    <div id='map-slider'>
                        <script type="text/javascript">
                        $("#map-slider").slider({ 
                            range: true,
                            min:    0, 
                            max:    1000,
                            values: [300,700],
                            slide: function(event, ui) {
                            $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
                                }
                        });
        
                        $("#amount").val("$" + $("#map-slider").slider("values", 0) + " - $" + $("#map-slider").slider("values", 1));
                        </script>
                    </div>
                    <div id="rooms">
                        <label for="rooms">Rooms:</label>
                        <select id="rooms">
                            <option value="Any">Any</option>
                            <option value="1">1+</option>
                            <option value="2">2+</option>
                            <option value="3">3+</option>
                        </select>
                    </div>
                    <div id="bathrooms">
                        <label for="bathrooms">Bathrooms:</label>
                        <select id="bathrooms">
                            <option value="Any">Any</option>
                            <option value="1">1+</option>
                            <option value="2">2+</option>
                            <option value="3">3+</option>
                        </select>
                        <div class="starrating">
                                <ul class="stars" id="star_ratings">
                                    <li><a href="#" rel="star-1"></a></li>
                                    <li><a href="#" rel="star-2"></a></li>
                                    <li><a href="#" rel="star-3"></a></li>
                                    <li><a href="#" rel="star-4"></a></li>
                                    <li><a href="#" rel="star-5"></a></li>
                                    <li><a href="#" rel="star-6"></a></li>
                                    <li><a href="#" rel="star-7"></a></li>
                                    <li><a href="#" rel="star-8"></a></li>
                                    <li><a href="#" rel="star-9"></a></li>
                                    <li><a href="#" rel="star-10"></a></li>
                                </ul>   
                        </div>
                    </div>
                    <div id="search_listings">
                        <input type="submit" value="search" class="btnsubmit" id="submit-btn"/>
                        <script type="text/javascript">
                        $(".btnsubmit").click(function() {

                        var starMapped = get_starMappings($('.stars').attr('class'));
                        var bathrooms = $('#bathrooms option:selected').val();
                        var bedrooms = $('#rooms option:selected').val();
                        $('#slider').css('width', '50px');
                        
                        var validData = [starMapped,bathrooms,bedrooms];
                        validateSearch(validData);
                        var searchlistings = "rentmin=" + $("#map-slider").slider("values", 0) + "&rentmax=" + $("#map-slider").slider("values", 1) + "&rooms=" + bedrooms + "&bathrooms=" + bathrooms + "&ratings=" + starMapped;

                        $.ajax({
                            type: "POST",
                            url: "http://rentsignal.com/showlistings/search",
                            data: searchlistings,
                            dataType: "json",
                            success: function(data) {
                                var len = data.length;
                                createMarkers(len,data);
                                loadImages(data);
                                closeSearchPane();
                            },
                            error: function()
                            {
                                console.log('error handling');

                            }
                        });
                        return false;
                        });

                        function closeSearchPane()
                        {
                            $("#listingsPane").animate({"marginLeft": "0px", "height" : "100px", "width" : "50px"},
                            {           
                                    duration: 500,
                                    step: function() {
                                        google.maps.event.trigger(map, 'resize');
                                        $('#listContent').css('display','none');
                                        $("#controls").css('display','none');
                                    }
                            });
                        }
                        </script>
                    </div>
            </fieldset>
            </form>
            </div>
        </ul>
    </div>
    </div>
    <!-- Navigation
    ==========================================-->
    <nav id="tf-menu" class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.html">Rentsignal</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#tf-login" class="page-scroll">Login</a></li>
            <li><a href="#tf-mapsearch" class="page-scroll">Map Search</a></li>
            <li><a href="#tf-cityscope" class="page-scroll">Cityscope</a></li>
            <li><a href="#tf-team" class="page-scroll">Team</a></li>
            <li><a href="#tf-services" class="page-scroll">Services</a></li>
            <li><a href="#tf-works" class="page-scroll">Portfolio</a></li>
            <li><a href="#tf-testimonials" class="page-scroll">Testimonials</a></li>
            <li><a href="#tf-contact" class="page-scroll">Contact</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

    <!-- Home Page
    ==========================================-->
    <div id="tf-login" class="text-center">
        <div class="overlay">
            <div class="content">

                <div id="rslogoheader"></div>
                <h1 id="rentsignalwelcome">Welcome to<strong><span class="color"> Rentsignal</span></strong></h1>
                <div id="login">
                    <div id="username"><label id="usernamelabel">Username:</label><input type="text" class="logininput" id="usernameinput"></input></div>
                    <div id="password"><label id="passwordlabel">Password:</label><input type="password" class="logininput" id="passwordinput"></input></div>
                    <input type="submit" class="submitbtn"></input>
                </div>
                <h1 id="sydneyedition">Sydney<strong> Edition</strong></h1>
                <a href="#tf-mapsearch" class="fa fa-angle-down page-scroll"></a>
                <!--<p class="lead">We are a digital agency with <strong>years of experience</strong> and with <strong>extraordinary people</strong></p>-->
            </div>
        </div>
    </div>
    <div id="tf-mapsearch">
         <div class="container" style="width:100%;margin:0px;padding:0px;">
            <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBKdZ3ZnSzIRg2bdZye0ndl56zkWWPVCJw&sensor=false&libraries=places"></script>
            <div id="rentsignal_map" style="width:100%;height:1024px;float:right;z-index:1;overflow:hidden;"></div>
         </div>
    </div>
    <!-- About Us Page
    ==========================================-->
    <div id="tf-cityscope">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <!--<img src="assets/img/02.png" class="img-responsive">-->
                </div>
                <div class="col-md-6">
                    <div class="cityscope-text">
                        <div class="section-title">
                            <h4>Cityscope</h4>
                            <h2>See the neighbourhood <strong>you </strong></h2>
                            <hr>
                            <div class="clearfix"></div>
                        </div>
                        <p class="intro">
                            might just be about to move to
                        </p>
                        <ul class="cityscope-list">
                            <li>
                                <span class="fa fa-dot-circle-o"></span>
                                <strong>Browse</strong> - <em>Take a look at everything the neighbourhood has to offer based off your search and interests</em>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Team Page
    ==========================================-->
    <div id="tf-team" class="text-center">
        <div class="overlay">
            <div class="container">
                <div class="section-title center">
                    <h2>Meet <strong>our team</strong></h2>
                    <div class="line">
                        <hr>
                    </div>
                </div>

                <div id="team" class="owl-carousel owl-theme row" style="left:300px;">
                    <div class="item">
                        <div class="thumbnail">
                            <img src="assets/img/team/trent-cofounder.jpg" alt="..." class="img-circle team-img">
                            <div class="caption">
                                <h3>Trent Durfee</h3>
                                <p>CEO / Co-Founder</p>
                                <p>A passionate tech-head who just wants to help build cool things</p>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="thumbnail">
                            <img src="assets/img/team/kaylan-cofounder.jpg" alt="..." class="img-circle team-img">
                            <div class="caption">
                                <h3>Kaylan Durfee</h3>
                                <p>COO / Co-Founder</p>
                                <p>Design gun who is wicked clever at finding the right balance between design, form and functionality.</p>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    <!-- Services Section
    ==========================================-->
    <div id="tf-services" class="text-center">
        <div class="container">
            <div class="section-title center">
                <h2>Take a look at <strong>our services</strong></h2>
                <div class="line">
                    <hr>
                </div>
                <div class="clearfix"></div>
                <small><em>Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</em></small>
            </div>
            <div class="space"></div>
            <div class="row">
                <div class="col-md-3 col-sm-6 service">
                    <i class="fa fa-desktop"></i>
                    <h4><strong>Web design</strong></h4>
                    <p>The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
                </div>

                <div class="col-md-3 col-sm-6 service">
                    <i class="fa fa-mobile"></i>
                    <h4><strong>Mobile Apps</strong></h4>
                    <p>The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
                </div>

                <div class="col-md-3 col-sm-6 service">
                    <i class="fa fa-camera"></i>
                    <h4><strong>Photography</strong></h4>
                    <p>The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
                </div>

                <div class="col-md-3 col-sm-6 service">
                    <i class="fa fa-bullhorn"></i>
                    <h4><strong>Marketing</strong></h4>
                    <p>The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Clients Section
    ==========================================-->
    <div id="tf-clients" class="text-center">
        <div class="overlay">
            <div class="container">

                <div class="section-title center">
                    <h2><strong></strong></h2>
                    <!--<div class="line">
                        <hr>
                    </div>-->
                </div>
                <!--<div id="clients" class="owl-carousel owl-theme">-->
                    <div class="item">
                        <!--<img src="assets/img/client/01.png">-->
                    </div>
                    <div class="item">
                        <!--<img src="assets/img/client/02.png">-->
                    </div>
                    <div class="item">
                        <!--<img src="assets/img/client/03.png">-->
                    </div>
                    <div class="item">
                        <!--<img src="assets/img/client/04.png">-->
                    </div>
                    <div class="item">
                        <!--<img src="assets/img/client/05.png">-->
                    </div>
                    <div class="item">
                        <!--<img src="assets/img/client/06.png">-->
                    </div>
                    <div class="item">
                        <!--<img src="assets/img/client/07.png">-->
                    </div>
                <!--</div>-->

            </div>
        </div>
    </div>

    <!-- Portfolio Section
    ==========================================-->
    <div id="tf-works">
        <div class="container"> <!-- Container -->
            <div class="section-title text-center center">
                <h2>Take a look at <strong>our services</strong></h2>
                <div class="line">
                    <hr>
                </div>
                <div class="clearfix"></div>
                <small><em>Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</em></small>
            </div>
            <div class="space"></div>

            <div class="categories">
                
                <ul class="cat">
                    <li class="pull-left"><h4>Filter by Type:</h4></li>
                    <li class="pull-right">
                        <ol class="type">
                            <li><a href="#" data-filter="*" class="active">All</a></li>
                            <li><a href="#" data-filter=".web">Web Design</a></li>
                            <li><a href="#" data-filter=".photography">Photography</a></li>
                            <li><a href="#" data-filter=".app" >Mobile App</a></li>
                            <li><a href="#" data-filter=".branding" >Branding</a></li>
                        </ol>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>

            <div id="lightbox" class="row">

                <div class="col-sm-6 col-md-3 col-lg-3 branding">
                    <div class="portfolio-item">
                        <div class="hover-bg">
                            <a href="#">
                                <div class="hover-text">
                                    <h4>Logo Design</h4>
                                    <small>Branding</small>
                                    <div class="clearfix"></div>
                                    <i class="fa fa-plus"></i>
                                </div>
                                <img src="assets/img/portfolio/01.jpg" class="img-responsive" alt="...">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-3 col-lg-3 photography app">
                    <div class="portfolio-item">
                        <div class="hover-bg">
                            <a href="#">
                                <div class="hover-text">
                                    <h4>Logo Design</h4>
                                    <small>Branding</small>
                                    <div class="clearfix"></div>
                                    <i class="fa fa-plus"></i>
                                </div>
                                <img src="assets/img/portfolio/02.jpg" class="img-responsive" alt="...">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-3 col-lg-3 branding">
                    <div class="portfolio-item">
                        <div class="hover-bg">
                            <a href="#">
                                <div class="hover-text">
                                    <h4>Logo Design</h4>
                                    <small>Branding</small>
                                    <div class="clearfix"></div>
                                    <i class="fa fa-plus"></i>
                                </div>
                                <img src="assets/img/portfolio/03.jpg" class="img-responsive" alt="...">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-3 col-lg-3 branding">
                    <div class="portfolio-item">
                        <div class="hover-bg">
                            <a href="#">
                                <div class="hover-text">
                                    <h4>Logo Design</h4>
                                    <small>Branding</small>
                                    <div class="clearfix"></div>
                                    <i class="fa fa-plus"></i>
                                </div>
                                <img src="assets/img/portfolio/04.jpg" class="img-responsive" alt="...">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-3 col-lg-3 web">
                    <div class="portfolio-item">
                        <div class="hover-bg">
                            <a href="#">
                                <div class="hover-text">
                                    <h4>Logo Design</h4>
                                    <small>Branding</small>
                                    <div class="clearfix"></div>
                                    <i class="fa fa-plus"></i>
                                </div>
                                <img src="assets/img/portfolio/05.jpg" class="img-responsive" alt="...">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-3 col-lg-3 app">
                    <div class="portfolio-item">
                        <div class="hover-bg">
                            <a href="#">
                                <div class="hover-text">
                                    <h4>Logo Design</h4>
                                    <small>Branding</small>
                                    <div class="clearfix"></div>
                                    <i class="fa fa-plus"></i>
                                </div>
                                <img src="assets/img/portfolio/06.jpg" class="img-responsive" alt="...">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-3 col-lg-3 photography web">
                    <div class="portfolio-item">
                        <div class="hover-bg">
                            <a href="#">
                                <div class="hover-text">
                                    <h4>Logo Design</h4>
                                    <small>Branding</small>
                                    <div class="clearfix"></div>
                                    <i class="fa fa-plus"></i>
                                </div>
                                <img src="assets/img/portfolio/07.jpg" class="img-responsive" alt="...">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-3 col-lg-3 web">
                    <div class="portfolio-item">
                        <div class="hover-bg">
                            <a href="#">
                                <div class="hover-text">
                                    <h4>Logo Design</h4>
                                    <small>Branding</small>
                                    <div class="clearfix"></div>
                                    <i class="fa fa-plus"></i>
                                </div>
                                <img src="assets/img/portfolio/08.jpg" class="img-responsive" alt="...">
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Testimonials Section
    ==========================================-->
    <div id="tf-testimonials" class="text-center">
        <div class="overlay">
            <div class="container">
                <div class="section-title center">
                    <h2><strong>Our clients’</strong> testimonials</h2>
                    <div class="line">
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div id="testimonial" class="owl-carousel owl-theme">
                            <div class="item">
                                <h5>This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</h5>
                                <p><strong>Dean Martin</strong>, CEO Acme Inc.</p>
                            </div>

                            <div class="item">
                                <h5>This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</h5>
                                <p><strong>Dean Martin</strong>, CEO Acme Inc.</p>
                            </div>

                            <div class="item">
                                <h5>This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</h5>
                                <p><strong>Dean Martin</strong>, CEO Acme Inc.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Section
    ==========================================-->
    <div id="tf-contact" class="text-center">
        <div class="container">

            <div class="row">
                <div class="col-md-8 col-md-offset-2">

                    <div class="section-title center">
                        <h2>Feel free to <strong>contact us</strong></h2>
                        <div class="line">
                            <hr>
                        </div>
                        <div class="clearfix"></div>
                        <small><em>Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</em></small>            
                    </div>

                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Message</label>
                            <textarea class="form-control" rows="3"></textarea>
                        </div>
                        
                        <button type="submit" class="btn tf-btn btn-default">Submit</button>
                    </form>

                </div>
            </div>

        </div>
    </div>
    <!--<div id="imgcontent" class="imgcontent"></div>-->

    <nav id="footer">
        <div class="container">
            <div class="pull-left fnav">
                <p>ALL RIGHTS RESERVED. COPYRIGHT © 2014. </p>
            </div>
            <div class="pull-right fnav">
                <ul class="footer-social">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                </ul>
            </div>
        </div>
    </nav>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>-->
    <!--<script type="text/javascript" src="assets/js/jquery.1.11.1.js"></script>-->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="assets/js/bootstrap.js"></script>
    <script type="text/javascript" src="assets/js/SmoothScroll.js"></script>
    <script type="text/javascript" src="assets/js/jquery.isotope.js"></script>

    <script src="assets/js/owl.carousel.js"></script>

    <!-- Javascripts
    ================================================== -->
    <script type="text/javascript" src="assets/js/jquery.scrollspy.js"></script>
    <script type="text/javascript" src="assets/js/main.js"></script>
    <script language="javascript" type="text/javascript"> 
    
    function loadImages(data)
    {
        var locationimgs = [];
        var locations;
            for(var i=0;i<data.length;i++)
            {
                locationimgs[i] = data[i].rentals.location;
            }
            $("div.imgcontent").load("http://rentsignal.com/showlistings/returnimages/?locations=" + locationimgs);
    }

    function loadFavourites()
    {
        $("div.imgcontent").load("http://rentsignal.com/showlistings/favpopular");
    }

    $(document).ready(function() {

        load_map();
        //loadFavourites();

        $(document).on("click", "#openrentals", function(){
            $("#searchContent").css('display', 'inline');
            $("#searchContent").css('visibility', 'visible');
        });
    });
</script>
  </body>
</html>
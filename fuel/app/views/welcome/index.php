<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- Facebook JS - ToDo: may look to use the PHP lib instead..-->
      <script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '229350117264184',
      xfbml      : true,
      version    : 'v2.3'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

<!-- Google sign-in / platform library -->
  <script>
    function onSuccess(googleUser) {
      console.log('Logged in as: ' + googleUser.getBasicProfile().getName());
    }
    function onFailure(error) {
      console.log(error);
    }
    function renderButton() {
      gapi.signin2.render('my-signin2', {
        'scope': 'https://www.googleapis.com/auth/plus.login',
        'width': 200,
        'height': 50,
        'longtitle': true,
        'theme': 'dark',
        'onsuccess': onSuccess,
        'onfailure': onFailure
      });
    }
  </script>
  <script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>
    <!-- Basic Page Needs
    ================================================== -->
    <?php echo Asset::css(array('layout.css','map-styles.css','jquery-ui-1.8.21.custom.css', 'bootstrap.css', 'font-awesome.css', 'owl.carousel.css', 'owl.theme.css', 'style.css', 'responsive.css')); ?>
    <?php echo Asset::js(array('jquery.1.11.1.js','markerclusterer.js','jquery-ui-1-11-4.js','infobubble.js','mapgen.js', 'angular.js', 'core_func.js', 'jquery.mCustomScrollbar.js')); ?>
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="x-ua-compatible" content="IE=9" /><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:image" content="assets/img/Sydney-Tower-Eye-6.jpg" />
    <meta property="og:title" content="Rentsignal" />
    <meta property="og:url" content="http://www.rentsignal.com" />

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
          <div class="fb-like" data-href="http://www.rentsignal.com" data-width="50" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true" data-colorscheme="dark"></div>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#tf-login" class="page-scroll">Login</a></li>
            <li><a href="#tf-mapsearch" class="page-scroll">Map Search</a></li>
            <li><a href="#tf-cityscope" class="page-scroll">Cityscope</a></li>
            <li><a href="#tf-team" class="page-scroll">Team</a></li>
            <li><a href="#tf-blog" class="page-scroll">Blog</a></li>
            <li><a href="#tf-latestnews" class="page-scroll">Latest News</a></li>
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
                <form action="http://rentsignal.com/login/oauth/facebook" method="GET">
                <div id="login">
                    <div id="username"><label id="usernamelabel">Username:</label><input type="text" class="logininput" id="usernameinput"></input></div>
                    <div id="password"><label id="passwordlabel">Password:</label><input type="password" class="logininput" id="passwordinput"></input></div>
                    <!--<input type="submit" class="loginbtn" value="Login"></input>-->
                    <a href="http://rentsignal.com/login/oauth/facebook"><div id="fb-signin"><img src="assets/img/fb-login.jpg"/></div></a>
                    <!--<div class="fb-login-button" data-max-rows="1" data-size="xlarge" data-show-faces="false" data-auto-logout-link="false"></div>-->
                    <a href="http://rentsignal.com/login/oauth/twitter"><div id="twitter-signin"><img src="assets/img/twitter-login.png" /></div></a>
                   <div id="my-signin2" data-width="300" data-height="200" data-longtitle="true"></div>
                    <!--<input type="button" class="signupbtn" value="Signup"></input>-->
                   <!-- <div class="fb-login-button" data-max-rows="1" data-size="medium" data-show-faces="true" data-auto-logout-link="true" action="http://rentsignal.com/login/oauth/facebook" method="GET"></div>-->
                </div>
                </form>
                <h1 id="sydneyedition">Sydney<strong> Edition</strong></h1>
                <a href="#tf-mapsearch" class="fa fa-angle-down page-scroll"></a>
            </div>
        </div>
    </div>
    <div id="tf-mapsearch">
         <div class="container" style="width:100%;margin:0px;padding:0px;">
            <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBKdZ3ZnSzIRg2bdZye0ndl56zkWWPVCJw&sensor=false&libraries=places"></script>
            <div id="rentsignal_map" style="width:100%;height:1024px;float:right;z-index:1;overflow:hidden;"></div>
         </div>
    </div>

    <!-- Cityscope
    ==========================================-->
    <div id="tf-cityscope">
        <div id="cityscopeheader"></div>
        <div class="container" id="cityscopecont">
                <div class="col-md-6">
                    <div class="cityscope-text" id="cstxtpos">
                        <div class="section-title"></br></br>
                            <h2>Cityscope</h2></br>
                            <h3>Find <strong> YOUR </strong> Neighbourhood</h3>
                            <hr>
                            <div class="clearfix"></div>
                        </div>
                        <p class="intro">
                            Filter and search based off a number of interests and lifestyle choices to find a neighbourhood perfectly suited to <span class="color"><strong>YOU</strong></span>
                        </p>
                        <ul class="cityscope-list">
                            <li>
                                <span class="fa fa-dot-circle-o"></span>
                                <em>Take a look at everything neighbourhood's have to offer based off your search and interests</em>
                            </li>
                        </ul>
                    </div>
                </div>

            <div class="categories">
                
                <ul class="cat">
                    <li class="pull-left"><h4>Filter by Type:</h4></li>
                    <li class="pull-right">
                        <ol class="type">
                            <li><a href="#" data-filter="*" class="active">All</a></li>
                            <li><a href="#" data-filter=".food">Food/Restrurants</a></li>
                            <li><a href="#" data-filter=".entertainment">Entertainment</a></li>
                            <li><a href="#" data-filter=".scenery" >Scenery</a></li>
                            <li><a href="#" data-filter=".music" >Music</a></li>
                            <li><a href="#" data-filter=".activities" >Activites</a></li>
                        </ol>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>

            <div id="lightbox" class="row">

                <div class="col-sm-6 col-md-3 col-lg-3 food entertainment">
                    <div class="portfolio-item">
                        <div class="hover-bg">
                            <a href="#">
                                <div class="hover-text">
                                    <h4>Newtown</h4>
                                    <small>Mary's</small>
                                    <div class="clearfix"></div>
                                    <i class="fa fa-plus"></i>
                                    <small><em></em></small>
                                </div>
                                <img src="assets/img/cityscope/marysnewtown.jpg" class="img-responsive" alt="...">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-3 col-lg-3 food entertainment">
                    <div class="portfolio-item">
                        <div class="hover-bg">
                            <a href="#">
                                <div class="hover-text">
                                    <h4>Newtown</h4>
                                    <small>Mary's</small>
                                    <div class="clearfix"></div>
                                    <i class="fa fa-plus"></i>
                                    <small><em></em></small>
                                </div>
                                <img src="assets/img/cityscope/marys2.jpg" class="img-responsive" alt="...">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 col-lg-3 music entertainment">
                    <div class="portfolio-item">
                        <div class="hover-bg">
                            <a href="#">
                                <div class="hover-text">
                                    <h4>Sydney - Elizabeth St</h4>
                                    <small>Ramblin Rascal Tavern</small>
                                    <div class="clearfix"></div>
                                    <i class="fa fa-plus"></i>
                                    <small><em></em></small>
                                </div>
                                <img src="assets/img/cityscope/ramblinrascalsydney.jpg" class="img-responsive" alt="...">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-3 col-lg-3 scenery  music entertainment">
                    <div class="portfolio-item">
                        <div class="hover-bg">
                            <a href="#">
                                <div class="hover-text">
                                    <h4>Marrickville</h4>
                                    <small>The Henson</small>
                                    <small>
                                        <em>
                                            The Henson is a community driven hotel, supporting, supplying and serving the best of our neighbourhood. Our focus is on quality, 
                                            seasonality and sustainability. Supporting ethical and responsible practises. The Henson is a playground for everyone to enjoy
                                        </em>
                                    </small>
                                    <div class="clearfix"></div>
                                    <i class="fa fa-plus"></i>
                                </div>
                                <img src="assets/img/cityscope/hensonent.jpg" class="img-responsive" alt="...">
                            </a>
                        </div>
                    </div>
                </div>


                <div class="col-sm-6 col-md-3 col-lg-3 scenery music entertainment">
                    <div class="portfolio-item">
                        <div class="hover-bg">
                            <a href="#">
                                <div class="hover-text">
                                    <h4>Marrickville</h4>
                                    <small>The Henson</small>
                                    <small><em>
                                        The Henson is a community driven hotel, supporting, supplying and serving the best of our neighbourhood. Our focus is on quality, seasonality and sustainability. 
                                        Supporting ethical and responsible practises. The Henson is a playground for everyone to enjoy
                                    </small></em>
                                    <div class="clearfix"></div>
                                    <i class="fa fa-plus"></i>
                                </div>
                                <img src="assets/img/cityscope/hensonent2.jpg" class="img-responsive" alt="...">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-3 col-lg-3 activities entertainment">
                    <div class="portfolio-item">
                        <div class="hover-bg">
                            <a href="#">
                                <div class="hover-text">
                                    <h4>Manly</h4>
                                    <small>4 Pines Brewing</small>
                                    <small><em>
                                    At 4 Pines Brewing Company in Manly it's all about handcrafted beer. With an emphasis on quality craftsmanship, 
                                    natural ingredients and traditional time-honoured techniques (not to mention fabulous pub grub) it's no wonder that 
                                    4 Pines Brewing Company is a local favourite.
                                    </em></small>
                                    <div class="clearfix"></div>
                                    <i class="fa fa-plus"></i>
                                </div>
                                <img src="assets/img/cityscope/4pinesbreweryburgers.jpg" class="img-responsive" alt="...">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 col-lg-3 branding">
                    <div class="portfolio-item">
                        <div class="hover-bg">
                            <a href="#">
                                <div class="hover-text">
                                    <h4>Darlinghurst</h4>
                                    <small>Hinky Dinks</small>

                                    <small><em>
                                    Hinky Dinks, the recent tiki bar to hit Darlinghurst, is hoisting the flag for the most entertaining drinking experience 
                                    since LA's Trader Vic's. With kitsch décor and cocktails like the Hinky Fizz and Bourbon Milk Sundae, Hinky Dinks is 
                                    all about making your night out one to remember.
                                    </em></small>
                                    <div class="clearfix"></div>
                                    <i class="fa fa-plus"></i>
                                </div>
                                <img src="assets/img/cityscope/hinkydinks.jpg" class="img-responsive" alt="...">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-3 col-lg-3 entertainment scenery">
                    <div class="portfolio-item">
                        <div class="hover-bg">
                            <a href="#">
                                <div class="hover-text">
                                    <h4>Sydney Art</h4>
                                    <small>Activities</small>
                                    <div class="clearfix"></div>
                                    <i class="fa fa-plus"></i>
                                </div>
                                <img src="assets/img/cityscope/artentertainment1.jpg" class="img-responsive" alt="...">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-3 col-lg-3 food entertainment activities">
                    <div class="portfolio-item">
                        <div class="hover-bg">
                            <a href="#">
                                <div class="hover-text">
                                    <h4>Mosman</h4>
                                    <small>The Burger Shed</small>
                                    <small><em>
                                    At The Burger Shed in Mosman, the finest, sustainable produce to create 
                                    offerings such as a vintage cheese burger with grass-fed Angus beef, flame-grilled free-range chicken burger, and a summer fish burger of fried local fish. 
                                    Team it with truffle and parmesan fries and BBQ corn with chilli salt butter and don't look back.
                                    </em></small>
                                    <div class="clearfix"></div>
                                    <i class="fa fa-plus"></i>
                                </div>
                                <img src="assets/img/cityscope/burgershed.jpg" class="img-responsive" alt="...">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-3 col-lg-3 food entertainment">
                    <div class="portfolio-item">
                        <div class="hover-bg">
                            <a href="#">
                                <div class="hover-text">
                                    <h4>Marrickville</h4>
                                    <small>Best Burger</small>
                                    <div class="clearfix"></div>
                                    <i class="fa fa-plus"></i>
                                </div>
                                <img src="assets/img/cityscope/burgersyd.jpg" class="img-responsive" alt="...">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 col-lg-3 scenery music entertainment">
                    <div class="portfolio-item">
                        <div class="hover-bg">
                            <a href="#">
                                <div class="hover-text">
                                    <h4>Newtown</h4>
                                    <small>The Enmore</small>
                                    <div class="clearfix"></div>
                                    <i class="fa fa-plus"></i>
                                </div>
                                <img src="assets/img/cityscope/sydneymusicscene.jpg" class="img-responsive" alt="...">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-3 col-lg-3 entertainment food">
                    <div class="portfolio-item">
                        <div class="hover-bg">
                            <a href="#">
                                <div class="hover-text">
                                    <h4>Summer Hill</h4>
                                    <small>Best Burger</small>

                                    <div class="clearfix"></div>
                                    <i class="fa fa-plus"></i>
                                </div>
                                <img src="assets/img/cityscope/burgersyd3.jpg" class="img-responsive" alt="...">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-3 col-lg-3 entertainment food">
                    <div class="portfolio-item">
                        <div class="hover-bg">
                            <a href="#">
                                <div class="hover-text">
                                    <h4>Bondi</h4>
                                    <small>Amazing Burger</small>
                                    <small>
                                    <em>
                                        Nestled on a bustling Bondi Road corner, Fat Rupert's presents a breath of fresh air with its understated charm and warmth. Head chef Eli Challenger, 
                                        of Porteno fame, has created an exquisite modern-Australian, paddock-to-plate style menu of share plates. All produce is sourced locally, 
                                        changing seasonally to provide the freshest flavours. On the drinks side, you will find some incredible wines, craft beers and seriously 
                                        delicious cocktails served in jam jars.
                                    </em></small>

                                    <div class="clearfix"></div>
                                    <i class="fa fa-plus"></i>
                                </div>
                                <img src="assets/img/cityscope/fatruperts.jpg" class="img-responsive" alt="...">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 col-lg-3 entertainment music">
                    <div class="portfolio-item">
                        <div class="hover-bg">
                            <a href="#">
                                <div class="hover-text">
                                    <h4>Imperial Hotel Sydney</h4>
                                    <small>Live Music</small>
                                    <small><em>
                                    </em></small>

                                    <div class="clearfix"></div>
                                    <i class="fa fa-plus"></i>
                                </div>
                                <img src="assets/img/cityscope/imperialhotelsydneymusic.jpg" class="img-responsive" alt="...">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 col-lg-3 entertainment music">
                    <div class="portfolio-item">
                        <div class="hover-bg">
                            <a href="#">
                                <div class="hover-text">
                                    <h4>Newtown</h4>
                                    <small>Newtown Social Club Live Music</small>
                                    <small><em>
                                        Get here for the best in Live music from Newtown, showing every night there's always something for everyone's tastes.
                                    </em></small>

                                    <div class="clearfix"></div>
                                    <i class="fa fa-plus"></i>
                                </div>
                                <img src="assets/img/cityscope/socialclubnewtownmusic.jpg" class="img-responsive" alt="...">
                            </a>
                        </div>
                    </div>
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
                            <img src="assets/img/team/ceocoufounder.jpg" alt="..." class="img-circle team-img">
                            <div class="caption">
                                <h3>Trent Durfée</h3>
                                <p>CEO / Co-Founder</p>
                                <p>A passionate tech-head who just wants to help build cool things and hopefully change the world. Is that too much to ask for?</p>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="thumbnail">
                            <img src="assets/img/team/kaylan-cofounder.jpg" alt="..." class="img-circle team-img">
                            <div class="caption">
                                <h3>Kaylan Durfée</h3>
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
    <div id="tf-blog" class="text-center">
        <div class="container">
            <div class="section-title center">
                <h2>Get inspiration from our<strong> blog</strong></h2>
                <div class="line">
                    <hr>
                </div>
                <div class="clearfix"></div>
                <small><em>Whether it is to deck out your newly rented space with great stylish furniture ideas, ideas for handling your utilities or reading up on the latest events the community has provided you can find it here.</em></small>
            </div>
            <div class="space"></div>
            <div class="row">
                <div class="col-md-3 col-sm-6 blog">
                    <div class="icons"><img src="../assets/img/stylish-furniture.jpg" class="iconimg"/></div>
                    <h4><strong>Stylish Furniture ideas for those on a budget</strong></h4>
                    <p>The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
                </div>

                <div class="col-md-3 col-sm-6 blog">
                    <div class="icons"><img src="../assets/img/cityscope/sydmusic.jpg" class="iconimg"/></div>
                    <h4><strong>Music that hit your 'hood recent write-ups</strong></h4>
                    <p>The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
                </div>

                <div class="col-md-3 col-sm-6 blog">
                    <div class="icons"><img src="../assets/img/sydhistory.jpg" class="iconimg"/></div>
                    <h4><strong>The history of your area</strong></h4>
                    <p>The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
                </div>

                <div class="col-md-3 col-sm-6 blog">
                    <div class="icons"><img src="../assets/img/sydutillightbulb.jpg" class="iconimg"/></div>
                    <h4><strong>8 Tips for handling your rent and utilities in a shared living space</strong></h4>
                    <p>The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Clients Section
    ==========================================-->
    <!--<div id="tf-clients" class="text-center">
        <div class="overlay">
            <div class="container">

                <div class="section-title center">
                    <h2><strong></strong></h2>
                    <div class="line">
                        <hr>
                    </div>
                </div>
                <div id="clients" class="owl-carousel owl-theme">
                    <div class="item">
                        <!--<img src="assets/img/client/01.png">
                    </div>
                    <div class="item">
                        <!--<img src="assets/img/client/02.png">
                    </div>
                    <div class="item">
                        <!--<img src="assets/img/client/03.png">
                    </div>
                    <div class="item">
                        <!--<img src="assets/img/client/04.png">
                    </div>
                    <div class="item">
                        <!--<img src="assets/img/client/05.png">
                    </div>
                    <div class="item">
                        <!--<img src="assets/img/client/06.png">
                    </div>
                    <div class="item">
                        <!--<img src="assets/img/client/07.png">
                    </div>
                </div>

            </div>
        </div>
    </div>-->

    <!-- Latest News Section
    ==========================================-->
    <div id="tf-latestnews" class="text-center">
        <div class="overlay">
            <div class="container">
                <div class="section-title center">
                    <h2><strong>Latest News</strong> and Updates</h2>
                    <div class="line">
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div id="testimonial" class="owl-carousel owl-theme">
                            <div class="item">
                                <h5>We'll be launching both a Mobile optimized site and iOS plus Android app very soon! Watch this space for an update.</h5>
                                <p><strong>Trent Durfée</strong>, Rentsignal</p>
                            </div>

                            <div class="item">
                                <h5>We'll be revamping the design of Cityscope to be able to offer you the features you want and make it that much easier to find your best possible lifestyle and neighbourhood at ease.</h5>
                                <p><strong>Kaylan Durfée</strong>, Rentsignal</p>
                            </div>

                            <div class="item">
                                <h5>Currently in stealth mode, keeping checking back for when we officially launch. Not long now, let 2015 be an exciting year and we hope you enjoy our site.</h5>
                                <p><strong>Trent Durfée</strong>, Rentsignal.</p>
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
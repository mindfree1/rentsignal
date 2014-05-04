<?php 
use \View;
use \Response;
use \Arr;
?>
<html>
<head>
	<meta charset="utf-8">

	<?php echo Asset::css(array('layout.css','map-styles.css','jquery-ui-1.8.21.custom.css')); ?>
	<?php echo Asset::js(array('jquery-1.7.2.js','markerclusterer.js','jquery-ui-1.8.21.js')); ?>
</head>
<style media="screen" type="text/css">
    .defaultText { width: 300px; left: 500px; position: absolute; margin: auto}
    .defaultTextActive { color: #a1a1a1; font-style: italic; }

    #email{top:180px;}
    #username{top:230px;}
    #password{top:280px;}

    #signup
    {
    	padding-left: 200px;
    }

    #signupnow
    {
    	margin-top: 94px;
    	margin-left: 80px;
    	font-style: italic;
    	color: #a1a1a1;
    }

    #signupbtn
    {
    	margin-left: 520px;
    	top: 92px;
    }

    #signinbtn
    {
    	top: 340px;
    	margin-left: 100px;
    	width: 100px;
    }

    #wrapper
    {
    	width:100%;
    	left:0px;
    	top:0px;
    }

    #login_bg img
    {
    	width: 100%;
    }

    .body
    {
    	margin: none;
    }

    .fb-login-button
    {
    	position: absolute;
    	top: 342px;
    	left: 720px;
    }
</style>
<body>
		<script>
  // This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      
      testAPI();
    } else if (response.status === 'not_authorized') {
      // The person is logged into Facebook, but not your app.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
    } else {
      // The person is not logged into Facebook, so we're not sure if
      // they are logged into this app or not.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into Facebook.';
    }
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

  window.fbAsyncInit = function() {
  FB.init({
    appId      : '229355797263616',
    cookie     : true,  // enable cookies to allow the server to access 
                        // the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.0' // use version 2.0
  });

  // Now that we've initialized the JavaScript SDK, we call 
  // FB.getLoginStatus().  This function gets the state of the
  // person visiting this page and can return one of three states to
  // the callback you provide.  They can be:
  //
  // 1. Logged into your app ('connected')
  // 2. Logged into Facebook, but not your app ('not_authorized')
  // 3. Not logged into Facebook and can't tell if they are logged into
  //    your app or not.
  //
  // These three cases are handled in the callback function.

  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });

  };

  // Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
      console.log('Good to see you, ' + response.name + '.');
      document.getElementById('status').innerHTML = 'Good to see you, ' +
        response.name;

    });
  }
</script>
<!--
  Below we include the Login Button social plugin. This button uses
  the JavaScript SDK to present a graphical Login button that triggers
  the FB.login() function when clicked.
-->
<div class="fb-login-button" data-max-rows="1" data-size="large" data-show-faces="false" data-auto-logout-link="false" scope="public_profile,email" onlogin="checkLoginState();"></div>
<div id="status"></div>
	<div id="wrapper">
		<div id="signup">
			<p id="signupnow">Not a member yet? Get the benefits of being registered. It's a quick simple process that'll make your experience better here.</p>
			<input class="defaultText" id="signupbtn" title="Sign Up" type="button" />
			<input class="defaultText" id="email" title="Email" type="text" />
			<input class="defaultText" id="username" title="Username" type="text" />
			<input class="defaultText" id="password" title="Password" type="text" value="Password"/></br>
			<input class="defaultText" id="signinbtn" title="Sign in" type="Button" />
		</div>	
	</div>
	<script language="javascript">
	<!--
		$(document).ready(function()
		{
    		$(".defaultText").focus(function(srcc)
    		{
        		if ($(this).val() == $(this)[0].title)
        		{
            		$(this).removeClass("defaultTextActive");
            		if($(this)[0].title != 'Sign in')
            		{
            			if($(this)[0].title == 'Password')
            			{
            				$(this).val("");
            				$(this)[0].type = 'Password';
            			}
            			else
            			{
            				$(this).val("");
            			}
            		}
        		}
    		});
    
    		$(".defaultText").blur(function()
    		{
        		if ($(this).val() == "")
        		{
            		$(this).addClass("defaultTextActive");
            		$(this).val($(this)[0].title);
        		}
    		});
    
    		$(".defaultText").blur();        
		});
	//-->
	</script>
</body>
</html>
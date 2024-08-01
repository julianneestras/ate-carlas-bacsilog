<?php  
session_start();
ob_start();
   include 'loginOOP.php';  
   $LoginForm = new LoginForm();   
    
   if(isset($_POST['login']))
   {

      $Login = $LoginForm->Login($_POST['u_Username'],$_POST['u_Password']);  
      if($Login)
      { 

      header("refresh:0;url=test2.php"); }
       
   }  
?>
<!-- PHP CODE FOR LOGIN END -->
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ate Carla's Bacsilog | Welcome!</title>
  <link rel="icon" href="img/logo.png" type="image/x-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
	<link rel="stylesheet" href="index-splash-design.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <script type="text/javascript" src="js/bootstrap.bundle.js"></script>
  <style type="text/css">

    .input-icons i {
      position: absolute;
      margin-left: -35px;
    }
          
    .icon {
        padding-left: 0px;
        padding-top: 20px;
        min-width: 40px;
    }
          
    .a2{
      color: #1c1c1c;
    }


    .a2:hover{
      color: #F9AF41;
      cursor: pointer;

    }

  .a:link {
    color: white;
    background-color: transparent;
    text-decoration: none;
  }

  .a:visited {
    color: white;
    background-color: transparent;
    text-decoration: none;
  }

  .a:hover {
    color: #EA5252;
    background-color: transparent;
    text-decoration: none;
  }

  .a:active {
    color: lightgray;
    background-color: transparent;
    text-decoration: underline;
  }

    #overlay {
    position: fixed;
    display: none;
    width: 100%;
    height: %;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(28, 28, 28, 0.4);
    z-index: 2;
    margin: auto;
  }

  #text{
    position: absolute;
    top: 50%;
    left: 50%;
    font-size: 50px;
    color: white;
    transform: translate(-50%,-50%);
    -ms-transform: translate(-50%,-50%);
  }

  .container1 {
      background-image: url('img/loginbg1.png');
      text-align: center;
      width: 60%;
      padding: 30px;
      border: 0px solid gray;
      box-shadow: rgba(0, 0, 0, 0.1) 0px 20px 25px -5px, rgba(0, 0, 0, 0.04) 0px 10px 10px -5px;
      border-radius: 2vh;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      text-align: center;
    }

    input[type=text], input[type=password] {
      border: 1px solid #AF1D27;
      padding: 15px;
      border-radius: 50px;
      width: 100%;
      background-color: #faf9f9;
    }

    input:focus {
        outline: none;
        border-color: #AF1D27;
        box-shadow: 0 0 6px #AF1D27;
      }

    .btn-outline-dark2:hover{
    color:   white !important;
    background-color:  #0d0c0c !important;
    border-color:  transparent !important; 
  }

  </style>
</head>
<body>
<form action="<?php $_PHP_SELF ?>" method="POST">
<div class="container-fluid  py-3" style="background-color: #1c1c1c;">
  <div class="row sticky-top">
    <div class="col-xl-lg-0 col-lg-0 col-md-0 col-sm-1 d-flex align-items-center"> </div>

    <div class="col-xl-lg-8 col-lg-7 col-md-7 col-sm-7 d-flex align-items-center pb-1"> 
      <i class="fa fa-phone" style="color: #F9AF41;">
        <font class="content" style="color: #faf9f9; font-size: 12px; font-weight: 300;"> Cell  0956-889-5317 
        </font>
        </i>
        
        <i class="fa fa-envelope" style="color: #F9AF41; margin-left: 30px;">
        <font class="content" style="color: #faf9f9; font-size: 12px; font-weight: 300;"> &ensp;atecarlasbacsilog@gmail.com </font>
        </i>
    </div>


    <div class="col-xl-lg-4 col-lg-4 col-md-4 col-sm-4 d-flex align-items-center justify-content-center pe-3 pt-1">
        <div class="social__container">   
          <div class="social__item">
            <a target="_blank" href="https://www.facebook.com/atecarlasbacsilog" class="social__icon--facebook"><i class="icon--facebook"></i></a>
        </div>

        <div class="social__item">
          <a target="_blank" href="https://twitter.com/home" class="social__icon--twitter"><i class="icon--twitter"></i></a>
      </div>
      
        <div class="social__item">
          <a target="_blank" href="https://www.instagram.com/accounts/login/?next=/atecarlas_bacsi/" class="social__icon--instagram"><i class="icon--instagram"></i></a>
        </div>  
      </div>
      &emsp;
      <a onclick="on()"><button type="button" style="border-radius: 50px; background-color: #F9AF41; border: 0px solid transparent; font-weight: 600; color: #1c1c1c; padding: 4px 10px" class="title">ORDER NOW</button></a>&nbsp;
      &nbsp; <font color="white"> or </font> &nbsp; 
    <div style="color: white;   font-weight: 400;">
      <a class="a content" onclick="on()" style="text-decoration: none; cursor: pointer;"> Login </a> / <a href="regform.php" class="a content">Sign Up</a>
    </div>
    </div>
  </div>
</div>



<nav class="navbar navbar-expand-md navbar-dark p-2 sticky-top" style="background-color:  #AF1D27; box-shadow: rgba(28, 28, 28, 0.45) 0px 25px 20px -20px;">
	<div class="container-fluid px-5 ps-5">
    
<!-- Login Start -->
<form name="login" method = "post" action = "<?php $_PHP_SELF ?>">
    <div id="overlay">
      <div class="container1">
        <table border="0" cellspacing="0" cellpadding="0" align="right" width="8%"> 
          <tr>
            <td>
              <div class="" onclick="off()" style="color: dimgray; font-size: 15px; cursor: pointer;">Close(x)</div>
            </td>
          </tr>
        </table>

        <br><br>
        <div class="" style="color: black">
          <h2 style="color: #AF1D27; font-weight: bold;" class="title">Welcome Back!</h2> 
          <h5 style="color: #1c1c1c; font-size: 17.5px;" class="title">Login to your account.</h5>

         <table border="0" cellspacing="0" cellpadding="0" align="center" width="60%"> 
          <tr>
            <td>
              <p align="left">
                <font class="title" style="font-weight: 500; line-height: 2.5; color: #1c1c1c;"  <?php if (isset($_COOKIE["u_Username"])){echo $_COOKIE["u_Username"];}?>>Username </font>
                <input type="text" required placeholder="Enter your username" name="u_Username" >
              </p>

            <div class="input-icons">
              <p align="left">
                <font class="title" style="font-weight: 500; line-height: 2.5; color: #1c1c1c">Password </font>
                <input type="password" required placeholder="Enter your password" id="id_password" name="u_Password">
                <i class="far fa-eye icon" id="togglePassword" style="cursor: pointer; color: #1c1c1c;"></i>
              </p>
            </div>

              <input type="submit" name="login" value="LOG IN" style=" background-color: #1c1c1c; box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 6px -1px, rgba(0, 0, 0, 0.06) 0px 2px 4px -1px; width: 240px; height: 50px; border-radius: 50px; font-weight: 500;" class="btn btn-outline-dark2 text-white title">
            </td>
           </tr>
        </table>
        <br>
       <a href="forgotpass.php" style="text-decoration: none"><font class="content a2">Forgot password?</font><br></a>
        <font class="content" style="color: #1c1c1c;">Don't have an account? <a href = "regform.php">Register here</a></font>
        </div>
      </div>
    </div>
  </form>
<!-- Login End -->

    <a href="index.php"><img src="img/logo.png" height="46" class="ps-5"></a>
	  <a class="navbar-brand subtitle ps-2" href="#" style="color: #ffffff;">

      <div class="title" style="font-size: 11.5px;">
        ATE CARLA'S
      </div>
      <b>BACSILOG</b>
    </a>
    <!-- ---------------- -->
    

    <button class="navbar-toggler border-0"  type="button" data-bs-toggle="collapse" data-bs-target="#navbar">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse justify-content-end navfont" id="navbar">
			<ul class="navbar-nav">
				<li>
					<a class="nav-link" href="homepage.php"><font style="font-weight: 800;"> HOME </font></a>
				</li>

				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" href="fashion_page.html"> NEWS</a>
					<ul class="dropdown-menu dropdown-menu-dark" style="background-color: #902923;">
						<li><a class="dropdown-item" href="News.php" style="font-size: 14px;">PROMOS & EVENTS</a></li>
						<li><a class="dropdown-item" href="Customer-Reviews.php" style="font-size: 14px;">REVIEWS</a></li>
					</ul>
				</li>

				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" href="">ABOUT US</a>
					<ul class="dropdown-menu dropdown-menu-dark" style="background-color: #902923;">
						<li><a class="dropdown-item" href="About-Us.php" style="font-size: 14px;">OUR STORY</a></li>
						<li><a class="dropdown-item" href="Personnel.php" style="font-size: 14px;">OUR TEAM</a></li>
					</ul>
				</li>

        <li>
					<a class="nav-link" href="services and products.php">PRODUCTS</a>
				</li>
        <li>
					<a class="nav-link" href="FAQs.php">FAQ</a>
				</li>
        <li class="pe-5">
					<a class="nav-link" href="contact.php">CONTACT US</a>
				</li>
			</ul>

	  	</div>
	</div>
</nav>


<!-- Banner Slideshow -->
<div id="btnslide" class="carousel carousel-dark slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#btnslide" data-bs-slide-to="0" class="active"></button>
    <button type="button" data-bs-target="#btnslide" data-bs-slide-to="1"></button>
    <button type="button" data-bs-target="#btnslide" data-bs-slide-to="2"></button>
	<button type="button" data-bs-target="#btnslide" data-bs-slide-to="3"></button>
  </div>

  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="20000">
      <img src="img/splashbg1.png" class="d-block w-100">
      <div class="carousel-caption d-none d-md-block">
        <div class="swiper-text px-4">
          <h1 style="font-size: 16px; color:  #faf9f9; font-weight: normal; letter-spacing: 3px;" class="subtitle pt-3">CHEESEY SILOG & STEAKS</h1>
          <h1 style="color: #F9AF41;"  class="title">Complete the meal with a cheesy sauce.</h1>
          <p style="font-size: 15px; color:  #faf9f9; font-size: 14px;" class="pt-2 caption">
            The creamy and savory sauce completes the meal.
          </p>
        </div>
      </div>
    </div>
	
    <div class="carousel-item" data-bs-interval="2000">
      <img src="img/splashbg.png" class="d-block w-100">
      <div class="carousel-caption d-none d-md-block">
        <div class="swiper-text px-4">
          <h1 style="font-size: 16px; color:  #faf9f9; font-weight: normal; letter-spacing: 3px;" class="subtitle pt-3">OUR BESTSELLERS</h1>
          <h1 style="color: #faf9f9;"  class="title">Indulge with our bestsellers.</h1>
          <p style="font-size: 15px; color:  #faf9f9; font-size: 14px;" class="pt-2 caption">
            It's not a <i>-silog</i> without the <i>itlog.</i>
          </p>
        </div>
      </div>
    </div>

	<div class="carousel-item" data-bs-interval="2000">
		<img src="img/splashbg3.png" class="d-block w-100">
		<div class="carousel-caption d-none d-md-block">
			<div class="swiper-text px-4">
        <h1 style="font-size: 16px; color:  #faf9f9; font-weight: normal; letter-spacing: 3px;" class="subtitle pt-3">OUR BESTSELLERS</h1>
        <h1 style="color: #F9AF41;" class="title">Serving you the best.</h1>
        <p style="font-size: 15px; color:  #faf9f9; font-size: 14px;" class="pt-2 caption">
          The creamy and savory sauce completes the meal.
        </p>
      </div>
		  </div>
	  </div>

	  <div class="carousel-item" data-bs-interval="2000">
		<img src="img/splashbg2.png" class="d-block w-100">
		<div class="carousel-caption d-none d-md-block">
      <div class="swiper-text px-4">
        <h1 style="font-size: 16px; color:  #faf9f9; font-weight: normal; letter-spacing: 3px;" class="subtitle pt-3">BETTER FOOD CHOICES</h1>
        <h1 style="color: #F9AF41;" class="title">More food options to choose from.</h1>
        <p style="font-size: 15px; color:  #faf9f9; font-size: 14px;" class="pt-2 caption">
          It's not a -silog without the itlog!
        </p>
      </div>
		  </div>
		</div>
  </div>

  <button class="carousel-control-prev" type="button" data-bs-target="#btnslide" data-bs-slide="prev">
    <span class="carousel-control-prev-icon visually-hidden"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#btnslide" data-bs-slide="next">
    <span class="carousel-control-next-icon visually-hidden"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<div class="container-fluid xl mw-100 no-padding" style="background-color:  #faf9f9">
	<div class="row p-5">
		<div class="col-xl-0 col-lg-0 col-md-0 col-sm-0 col-xs-0">
      <table border="0" width="75%" cellpadding="10" cellspacing="0" align="center">
        <tr>
          <td>
            <br>
            <h1 class="d-flex align-items-center justify-content-center title text-center" style="font-size: 40px; color: #AF1D27;"><b>You say magic. We say Bacsilog.</b></h1>
            <p class="d-flex align-items-center text-center caption pt-4" style="font-size: 15px;">
             With the service of Ate Carla's Bacsilog, you can be assured that you will have a truly magical experience because once you taste our cuisine, your mood will instantly improve and you will forget your name due to the amazing flavor of our Bacsilog.
            </p> 
          </td>
        </tr>
      </table>
		</div>
	</div>
</div>

<div class="container-fluid xl mw-100 no-padding" style="background-color: #faf9f9">
	<div class="row px-5 pb-4">
      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-0 col-xs-0 d-flex align-items-center py-5">
          <table border="1" width="100%" cellpadding="30" cellspacing="0" align="center" style="border: 1px solid #F9AF41;">
            <tr>
              <td>          
                <h1 class="title" style=" color: #1c1c1c; font-size: 28px; font-weight: bolder; letter-spacing: normal;"><br>Our Services</h1>
                <p class="caption" style="color:   #615f5f; font-size: 12px;">Serving you with a good quality service, ensuring that you all have a wonderful time while enjoying the dishes we serve, as well as ensuring that we use high-quality ingredients and making you feel important to us.</p>
              </td>
            </tr>
          </table>
				</div>

        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-0 col-xs-0 d-flex align-items-center text-center px-5 py-2">
          <div class="row"><img src="img/cloche.png" class="img-fluid mx-auto d-block " style="width:75px; ">
              <h1 class="subtitle" style="text-transform: uppercase; color: #1c1c1c; font-size: 16px; font-weight: bolder; letter-spacing: normal;"><br>High Food Quality</h1>
              <p class="caption" style="color:   #615f5f; font-size: 12px;">Fresh and high-quality ingredients are used in our meals to ensure that you like them and visit to try them again.</p>
          </div>
      </div>
  
     <div class="col-xl-3 col-lg-3 col-md-3 col-sm-0 col-xs-0 d-flex align-items-center text-center  px-5 py-2">
          <div class="row"><img src="img/thumbs-up.png" class="img-fluid mx-auto d-block " style="width:75px;">
              <h1 class="subtitle" style="text-transform: uppercase; color: #1c1c1c; font-size: 16px; font-weight: bolder; letter-spacing: normal;"><br>Good Service</h1>
              <p class="caption" style="color:   #615f5f; font-size: 12px;">We are dedicated to serving you with all of our hearts and making you feel at ease by keeping a positive attitude.</p>
          </div>
      </div>
  
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-0 col-xs-0 d-flex align-items-center text-center px-5 py-2">
        <div class="row"><img src="img/quick.png" class="img-fluid mx-auto d-block " style="width: 75px">
            <h1 class="subtitle" style="text-transform: uppercase; color: #1c1c1c; font-size: 16px; font-weight: bolder; letter-spacing: normal;"><br>QUICK REPLIES</h1>
            <p class="caption" style="color:   #615f5f; font-size: 12px;">Our customers are our top concern, which is why we make every effort to respond quickly to any of your questions.</p>
        </div>
    </div>
	</div>
</div>

<div class="container-fluid xl mw-100 no-padding" style="background-color:  #F9AF41">
	<div class="row p-5">
		<div class="col-xl-3 col-lg-4 col-md-5 col-sm-0 col-xs-0 d-flex align-items-center ps-5">
			<div class="row">
        <h1 style="font-size: 16px; color: #1c1c1c; font-weight: bold; letter-spacing: 3px;" class="subtitle pt-3">REAL. GOOD. FOOD.</h1>
        <h1 style="color: #faf9f9; font-size: 36px;" class="title">What are you eating today?</h1>
        
      </div>
	</div>

		<div class="col-xl-9 col-lg-8 col-md-7 col-sm-0 col-xs-0 d-flex align-items-center px-2">
      <table border="0" width="90%" cellpadding="20" cellspacing="0" align="center">
        <tr>
          <td>
            <p class="caption py-4" style="color: #1c1c1c; font-size: 15px;">
              You're hungry and want to eat something scrumptious? Come to Ate Carla's Bacsilog because our cuisine is not only excellent but also affordable, especially for those who want to eat wonderful meals but do not have enough money. Explore our many items by pressing the button below so that you can now decide what you want to eat and we will be ready for you as we are delighted to offer you outstanding customer service and delicious cuisine.
            </p>

            <a href="homepage.php" class="btn btn-outline-dark title text-white" style=" background-color: #1c1c1c; box-shadow: rgba(0, 0, 0, 0.45) 0px 25px 20px -20px; width: 240px; height: 50px; border-radius: 50px;">
              <div style="margin-top: 6px; font-weight: 600; font-size: 17px; letter-spacing: 1.5px;">
                EXPLORE NOW
              </div>
            </a>
            <br>
          </td>
        </tr>
      </table>
		</div>
	</div>
</div>


<!-- Footer -->
<footer class="pb-3" style="background-color:  #1c1c1c;
">
  <!-- Section: Links  -->
  <section class="justify-content-center border-bottom p-5">
    <div class="container">
      <!-- Grid row -->
      <div class="row">
        <!-- Grid column -->
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-6 mx-auto">
          <!-- Content -->

          <div style="width: 100%;">
            <div style="float: left">
              <img src="img/logo.png" height="50">
            </div>

              <div class="title" style="font-size: 15px; font-weight: 700; letter-spacing: 2px; float: left; margin-left: 6px; color: #AF1D27;">
                ATE CARLA'S
                <br>
              <b class="subtitle" style="color: #ffffff; font-size: 20px;">BACSILOG</b>
              </div>
              <br><br>
          </div> 
          <div class="content pt-2" style="font-size: 12px; text-align: left;">
            B 415 L #21 Polaris St.,
            Ph.4, Heritage Homes Marilao, Bulacan
            <p class="pt-4">atecarlasbacsilog@gmail.com</p>
          </div>
        </div>

        <!-- Grid column -->
        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-3 col-xs-3 caption  py-3" style="text-align: left; font-size: 14px;">
          <!-- Links -->
          <h6 class="subtitle text-uppercase" style="color:  #faf9f9; font-size: 14px; text-align: left;">
            information
          </h6>
          <p>
            <a href="About-Us.php">About Us</a>
          </p>
          <p>
            <a href="services and products.php">Products</a>
          </p>
          <p>
            <a href="Personnel.php">Our Team</a>
          </p>
          <p>
            <a href="contact.php">Contact Us</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-3 col-xs-3  caption  py-3" style="text-align: left; font-size: 14px;">
          <!-- Links -->
          <h6 class=" subtitle text-uppercase" style="color:  #faf9f9; font-size: 14px; text-align: left;">
            more links
          </h6>
          <p>
            <a href="homepage.php">Home</a>
          </p>
          <p>
            <a href="FAQs.php">Support</a>
          </p>
          <p>
            <a href="FAQs.php">FAQ</a>
          </p>
        </div>

        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-3 col-xs-3  caption  py-3" style="text-align: left; font-size: 14px;">
          <!-- Links -->
          <h6 class=" subtitle text-uppercase" style="color:  #faf9f9; font-size: 14px; text-align: left;">
            NEWS
          </h6>
          <p>
            <a href="News.php">Events & Promos</a>
          </p>
          <p>
            <a href="Customer-Reviews.php">Reviews</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-5 col-xs-5 mx-auto mb-md-0 mb-0 text-white py-3" style="font-size: 14px; text-align:left;">
          <!-- Links -->
          <h6 class=" subtitle text-uppercase" style="color:  #faf9f9; font-size: 14px; text-align: left;">
            CONTACT
          </h6>
          
          <p><i class="fa fa-envelope me-2 text-white caption"></i>atecarlasbacsilog@gmail.com</p>
          <p><i class="fa fa-phone me-1 text-white caption"></i> +63 956 889 5317</p>

            <a class="social-icon" data-tooltip="Twitter" href="https://twitter.com/home">
              <i class="fa fa-twitter" aria-hidden="true"></i>
            </a>
          
            <a class="social-icon" data-tooltip="Facebook" href="https://www.facebook.com/atecarlasbacsilog">
              <i class="fa fa-facebook" aria-hidden="true"></i>
            </a>

            <a class="social-icon" data-tooltip="Instagram" href="https://www.instagram.com/accounts/login/?next=/atecarlas_bacsi/">
              <i class="fa fa-instagram" aria-hidden="true"></i>
            </a>
        
	</ul>	
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->

  <!-- Copyright -->
  <div class="p-4 footerspacing px-5">
    <p class=" pull-right caption" href="#" style="color: #c0c0c0; font-size: 12px;">Copyright 2022 © All Rights Reserved. <br>
      For educational purposes only. Not for sale.
    </p>
    <a class="pull-left subtitle pt-2" style="text-decoration: none; font-size: 14px;" href="homepage.php"> HOME </a>
    <a class=" fw-bold pull-left subtitle pt-2" style="text-decoration: none;font-size: 14px;" href="FAQs.php"> FAQ </a>
    <a class=" fw-bold pull-left subtitle pt-2" style="text-decoration: none;font-size: 14px;" href="contact.php"> CONTACT US </a>
  </div>
  <br><br>
  <!-- Copyright -->
</footer>
<!-- Footer -->
<script type="text/javascript">
  function on() {
  document.getElementById("overlay").style.display = "block";
}

function off() {
  document.getElementById("overlay").style.display = "none";
}

const togglePassword = document.querySelector('#togglePassword');
  const password = document.querySelector('#id_password');

  togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});
</script>
</form>
</body>
</html>
<?php
if (isset($_POST['login'])){
  $u_Username= $_POST['u_Username'];
  setcookie("name", "$u_Username", time()+3600, "/","", 0);

}
?>

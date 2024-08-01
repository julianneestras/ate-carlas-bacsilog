<!-- PHP CODE FOR LOGIN START -->
<?php
  
  session_start();
  
  if(isset($_POST['login']))
  { 
    include('conn.php');
    $username= $_POST['username'];
    $password= $_POST['password'];
    


    $str="SELECT * from custinfo WHERE Username='$username'
                     AND Password='$password'";
    $results=mysqli_query($conn,$str);
    
    while ($pass=mysqli_fetch_array($results, MYSQLI_ASSOC)){
      if((mysqli_num_rows($results))>0){
          echo "<center><h1><script>alert('You have successfully logged in.')</script></h1></center";
          header("refresh:0;url=userorderform.php");
      }
    } 
  if (mysqli_num_rows($results) == 0){
          $username = $_POST['username']; 
          $password = $_POST['password'];

          $condition1 ="SELECT Username from custinfo WHERE Username='$username'";
          $condition2 ="SELECT Password from custinfo WHERE Password='$password'";     

          $C1results=mysqli_query($conn,$condition1);
          $C2results=mysqli_query($conn,$condition2);

          if((mysqli_num_rows($C1results))>0 && (mysqli_num_rows($C2results))==0){  
            echo "<center><h1><script>alert('Wrong password!');</script></h1></center>";
              header("refresh:0;url=About-Us.php");
          }
          elseif((mysqli_num_rows($C2results))>0 && (mysqli_num_rows($C1results))==0){
            echo "<center><h1><script>alert('Username does not exist.');</script></h1></center>";
              header("refresh:0;url=About-Us.php");
          }
          else{
            echo "<center><h1><script>alert('Username or password is incorrect.');</script></h1></center>";
              header("refresh:0;url=About-Us.php");
          } 
        }
  }
 ?>
<!-- PHP CODE FOR LOGIN END -->
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ate Carla's Bacsilog | Our Story </title>
	<link rel="icon" href="img/logo.png" type="image/x-icon">
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script type="text/javascript" src="js/bootstrap.bundle.js"></script>
    <link href="Main.css" rel="stylesheet" type="text/css">
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
<!--start of navbar-->
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
      <a onclick="on()"><button type="button" style="border-radius: 50px; background-color: #F9AF41; border: 0px solid transparent; font-weight: 600; color: #1c1c1c; padding: 4px 10px" class="title">ORDER NOW</button></a>
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
                <font class="title" style="font-weight: 500; line-height: 2.5; color: #1c1c1c;">Username </font>
                <input type="text" required placeholder="Enter your username" name="username">
              </p>

              <div class="input-icons">
              <p align="left">
                <font class="title" style="font-weight: 500; line-height: 2.5; color: #1c1c1c">Password </font>
                <input type="password" required placeholder="Enter your password" id="id_password" name="password">
                <i class="far fa-eye icon" id="togglePassword" style="cursor: pointer; color: #1c1c1c;"></i>
              </p>
            </div>

              <input type="Submit" name="login" value="LOG IN" style=" background-color: #1c1c1c; box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 6px -1px, rgba(0, 0, 0, 0.06) 0px 2px 4px -1px; width: 240px; height: 50px; border-radius: 50px; font-weight: 500;" class="btn btn-outline-dark2 text-white title">
            </td>
           </tr>
        </table>
        <br>
        <a href="forgotpass.php" style="text-decoration: none"><font class="content a2">Forgot password?</font><br></a>
        <font class="content" style="color: #1c1c1c;">Don't have an account? <a href = "regform.php">Register here</a></font>
        </div>
      </div>
    </div>
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
					<a class="nav-link" href="homepage.php">HOME</a>
				</li>

				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" href="fashion_page.html"> NEWS</a>
					<ul class="dropdown-menu dropdown-menu-dark" style="background-color: #902923;">
						<li><a class="dropdown-item" href="News.php" style="font-size: 14px;">PROMOS & EVENTS</a></li>
						<li><a class="dropdown-item" href="Customer-Reviews.php" style="font-size: 14px;">REVIEWS</a></li>
					</ul>
				</li>

				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" href=""><b style="color: #F9AF41; font-weight: 800;"> ABOUT US</b></a>
					<ul class="dropdown-menu dropdown-menu-dark" style="background-color: #902923;">
						<li><a class="dropdown-item" href="About-Us.php" style="font-size: 14px;"><b style="color: #F9AF41; font-weight: 800;"> OUR STORY</b></a></li>
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
<!--end of navbar-->

<!--start of sec 1-->
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-4 col-sm-4 col-xs-4 content">
				<br><br><br>
				<table border="0" width="68%" cellpadding="10" cellspacing="0" align="center" class="pt-5" style="margin-top: 180px;">
					<tr>
					  <td>
						<h1 class="container-fluid subtitle" style="font-size: 20px; text-transform: uppercase; color: #615f5f;"><b>From Our Success To Yours.</b></h1>
						</div>
					  </td>
					</tr>
				  </table>
			</div>
			<div class="col-md-8 col-sm-8 col-xs-8 py-5">
				<br>
				<table border="0" width="85%" cellpadding="10" cellspacing="0" align="center">
					<tr>
					  <td>
						<div class="title" style="color:#AF1D27; font-size: 70px;"><b>About Us</b><hr width="35%"></div>
						<div class="pt-3" style="color:#1c1c1c; font-size: 15px;">
							Ate Carla's Bacsilog is well-known for offering excellent, low-cost Filipino Silog meals on the move. Ate Carla's Bacsilog is recognized for combining their food, which complements each other, especially when accompanied by the well-known fried rice and the sunny side up egg. Ate Carla's Bacsilog sells various combinations of food and desserts and different cheesy cuisines that will gratify the palates of those who try it.
						</div>
						<div class="pt-5 pb-4" style="color:#1c1c1c; font-size: 15px;">
							Ate Carla's Bacsilog has continued to provide customers with satisfactory outstanding service and the best quality meals they can give. Ate Carla's Bacsilog is your hunger's best friend, filling you up and satisfying you every way. Ate Carla's Bacsilog will continue to strive for more and not settle for less, and it looks forward to new opportunities in the future so that many people will seek out the food it provides.
						</div>
					  </td>
					</tr>
				  </table>
			</div>
		</div>
	</div>
<!--end of sec 1-->

<!--start of sec 2-->
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12 fs-1 text-center About-bg"></div>
		</div>
	</div>
<!--end of sec 2-->

<!--start of sec 3-->
	<div class="container-fluid p-4" align="right">
		<div class="row py-5">
			<div class="col-md-5 col-sm-5 col-xs-5 text-dark"><br><br>
				<div class="container-fluid title" style="font-size: 36px;"><b>Sharing our story to the world.</b><hr width="45%"></div>
			</div>
			<div class="col-md-7 col-sm-7 col-xs-7" align="center">
				<div class="img-2" align="center"></div><br>
			</div>
		</div>
	</div>
<!--end of sec 3-->

<!--start of sec 4-->
	<div class="container-fluid p-4" align="justify">
		<div class="row pb-5">
			<div class="col-md-5 col-sm-5 col-xs-">
				<center>
				<img src="img/img-1.png" class="img-fluid" style="width: 70%">
			</center>
			</div>
			<div class="col-md-7 col-sm-7 col-xs-7 ">
				<table border="0" width="85%" cellpadding="10" cellspacing="0" align="center" class="px-5">
					<tr>
					  <td>
						<div class="title" style="color:#AF1D27 ; font-size: 50px;"><b>Our Story</b></div>
							<p class="pt-4" style="color:#1c1c1c ; font-size: 15px;">
								Ate Carla's Bacsilog started on July 2020, during the Covid-19 Pandemic Era. The founders are Dan Martin Sison and her sister Fatima Carla Sison. Alongside with his cousins Patrick Alonde and Carmela Alonde, and his auntie Ivy Teodosio. It only started selling one food category, where the food business itself is made well-known, the Bacsilog. As years passed by, we began to get a lot of customers from Luzon and decided to expand our products as well as our branches in the country. 

								<br><br><br>
								With its affordable pricing, the business has survived to this day, delivering customer satisfaction, and will continue to do so for future customers of Ate Carla's Bacsilog. The story of us is not like a fairy-tale where there is only one problem, and everything will be fine; instead, Ate Carla's Bacsilog faces various types of difficulties throughout the years. However, this does not mean that the people behind the business cuisine will be discouraged; instead, Ate Carla's Bacsilog used the challenge as an inspiration to become more decisive and firm. Ate Carla's Bacsilog story will not end here, but it is just only the beginning.
							</p>
					  </td>
					</tr>
				  </table>
			</div>
		</div>
	</div>
<!--end of sec 4-->

<!--start of sec 5-->
	<div class="container-fluid bg-red p-5">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12" align="center" style="background-color: #faf9f9;">
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-6">
						<div class="container-fluid margin bg-light" align="justify"><br>
							<div class="container-fluid title" style="color: #902923; font-size: 65px;"><b>Mission</b><hr width="50%"></div>
							<div class="container-fluid" style="font-size: 20px;"><i>Our mission is to serve our customers  delicious foods with affordable price.</i></div>
						</div>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-6">
						<div class="container-fluid margin1 " align="justify"><br>
							<div class="container-fluid"  style="font-size: 20px;"><i>Our vision is to have a physical store for our customers who wants to chill and relax while eating our food. </i></div>
							<div class="container-fluid title" align="right" style="color: #902923; font-size: 65px;"><hr width="50%"><b>Vision</b></div>
						</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<!--end of sec 5-->

<!--start of sec 6-->
	<div class="container-fluid bg-yellow content">
		<div class="row">
			<div class="col-md-6 col-sm-6 col-xs-6 p-5">
				<div class="container-fluid">
					<table border="1" width="100%" cellpadding="30" cellspacing="0" align="center">
						<tr>
						  <td>
							<div class=" title" style="font-size: 40px; color: #faf9f9;">
								<b>We are committed to serve customers like you.</b>
							</div>
							<div class="pt-4" style="font-size: 15px;">With high-quality food while also ensuring that our mission and vision are met every time we serve our food.</div><br>
						  </td>
						</tr>
					  </table>
				</div>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-6" align="center">
				<div class="row p-5">
					<div class="col-md-3 col-sm-3 col-xs-3 subtitle pt-5"><br><br><br>
						<img src="https://img.icons8.com/external-others-iconmarket/64/000000/external-about-essential-others-iconmarket.png"/><br><b>ABOUT</b><br><br>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-3 subtitle pt-5"><br><br><br>
						<img src="https://img.icons8.com/ios/64/000000/open-book.png"/><br><b>HISTORY</b><br><br>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-3 subtitle pt-5"><br><br><br>
						<img src="https://img.icons8.com/external-becris-lineal-becris/64/000000/external-serve-kitchen-cooking-becris-lineal-becris.png"/><br><b>MISSION</b><br><br>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-3 subtitle pt-5"><br><br><br>
						<img src="https://img.icons8.com/external-ddara-lineal-ddara/64/000000/external-food-store-music-fest-ddara-lineal-ddara.png"/><br><b>VISION</b><br><br>
					</div>
				</div>
			</div>
		</div>
	</div>
<!--end of sec 6-->

<!--start of sec 7-->
	<div class="container-fluid content p-5">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12 img-3"><br>
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-6 px-5 pb-5">
						<div class="title fs-2">
							<b>Watch how we prepare, cook, and serve our dishes.</b>
						</div><br><br>
						<div class="px-5 bg-red text-light"><br>
							Making sure that each serving is of high it's quality and taste.<br><br>
						</div>
						<div class="sec7desc pt-4" style="font-size: 15px;"><br>
							When our food is ordered, it goes through a extreme preparation process to ensure that every serving meets the standards that we promised to meet, from preparing the food to cooking it and serving it.
						</div>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-6"><br>
						<div class="row">
							<div class="col-md-6 col-sm-6 col-xs-6">
								<iframe src="https://www.facebook.com/plugins/video.php?height=476&href=https%3A%2F%2Fwww.facebook.com%2Fatecarlasbacsilog%2Fvideos%2F136043298188293%2F&show_text=false&width=380&t=0" width="380" height="476" style="border:none;overflow:hidden" scrolling="no" frameborder="2" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share" allowFullScreen="true"></iframe>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-6">
								<iframe src="https://www.facebook.com/plugins/video.php?height=476&href=https%3A%2F%2Fwww.facebook.com%2Fatecarlasbacsilog%2Fvideos%2F207460394771494%2F&show_text=false&width=380&t=0" width="380" height="476" style="border:none;overflow:hidden" scrolling="no" frameborder="2" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share" allowFullScreen="true"></iframe>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<!--end of sec 7-->

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
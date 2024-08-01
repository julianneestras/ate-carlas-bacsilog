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
              header("refresh:0;url=homepage.php");
          }
          elseif((mysqli_num_rows($C2results))>0 && (mysqli_num_rows($C1results))==0){
            echo "<center><h1><script>alert('Username does not exist.');</script></h1></center>";
              header("refresh:0;url=homepage.php");
          }
          else{
            echo "<center><h1><script>alert('Username or password is incorrect.');</script></h1></center>";
              header("refresh:0;url=homepage.php");
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
	<title>Ate Carla's Bacsilog | Home</title>
	<link rel="icon" href="img/logo.png" type="image/x-icon">
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
	<link rel="stylesheet" href="homepage-design.css">
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
					<a class="nav-link" href="homepage.php"><b style="color: #F9AF41; font-weight: 800;"> HOME </b></a>
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
	  
<!-- Container start -->
<div class="container-fluid xl mw-100 no-padding" style="background-color:  #faf9f9">
	<div class="row pt-5">
		<div class="bg-image d-flex justify-content-center align-items-center">
			<img src="img/logo.png" class="img-fluid" width="150">  
		</div>

		<div class="d-flex justify-content-center align-items-center pt-2">
			<div class="title" style="font-size: 25px; font-weight: bold; letter-spacing: 1.5px; text-align: center;">
				ATE CARLA'S
				<div class="subtitle" style="color:  #AF1D27; text-align: center; font-size: 60px; letter-spacing: 2px;">
					<b>BACSILOG</b>
				</div>
			</div>
		</div>

		<br>
		<center>
		  <img src="img/home1.png" class="img-fluid pb-5 pt-4" style="width: 70%;"> 
		</center>
      	</div>
		  <br>
    </div>
</div>

<div class="container-fluid xl mw-100 no-padding p-5" style="background-color:  #faf9f9">
	<div class="row d-flex align-items-center text-center">
		<div class="col-xl-5 col-lg-5 col-md-0 col-sm-0 col-xs-0">
			<img src="img/home2.png" width="62%" class="img-fluid">
		</div>

		<div class="col-xl-7 col-lg-5 col-md-0 col-sm-0 col-xs-0">
			<div class="row">
					<h1 class="title" style="font-size: 50px; color: #AF1D27;"><b>Speak with the taste.</b></h1>
				</div>

				<div class="row p-5">     	
		            <div class="col mx-2 d-flex align-items-center" style="text-align: left; color: #1c1c1c; font-size: 15px;">
		            	<p class="caption">
									Ate Carla's Bacsilog is a wonderful destination to satisfy your hunger. Serving you a whole meal from breakfast to dinner, we've got you covered. We not only serve meals, but also a wide range of desserts and beverages; you name it, and we'll make it for you.
		            	</p>
					</div>
		            <div class="col mx-2 d-flex align-items-center" style="text-align: left; color: #1c1c1c; font-size: 15px;">
		            	<p>
									It is not only a delightful place to satisfy your hunger, but also a place to order so that you may share the wonderful flavor of our Bacsilog with your family and friends. But if you wish to eat at our place, we will be delighted to serve you and make it a comfortable place for you to relax and enjoy what we have prepared for you.
		            	</p>
					</div>
	        
	        	</div>
		</div>
	</div>
</div>

<div class="container-fluid xl mw-100 no-padding p-5" style="background-color:  #902923">
		<div class="row p-5">
		    <div class="col-md-4 align-items-center text-center">
				<div class="subtitle pt-5" style="color: #F9AF41; font-size: 20px; text-align: center;">
					THERE'S ALWAYS A STORY
					<p class="title pb-3" style="color: #faf9f9; font-size: 55px;">
						Know more about us.
					 </p>
					 <a href="About-Us.php" class="btn btn-outline-dark title text-white align-items-center text-center" style=" background-color: #1c1c1c; box-shadow: rgba(0, 0, 0, 0.45) 0px 25px 20px -20px; width: 200px; height: 50px; border-radius: 50px;">
						<div style="margin-top: 6px; font-weight: 600; font-size: 17px; letter-spacing: 1.5px;">
							DISCOVER MORE
						</div>
					</a>
					<br><br><br><br>
				</div>   

		     </div>

			 <div class="bg-image col-md-4 d-flex align-items-center text-center">
				<div>
					<img src="img/homeabout.png" class="img-fluid" style="width: 90%;">
				</div>
		     </div>

			 <div class="col-md-4 align-items-center text-center" style="text-align: left;">
			<table border="0" width="100%" cellpadding="20" cellspacing="0" align="center" style="border: 0px solid #c0c0c0; margin-top: 65px;">
				<tr>
					<td>
						<div class="subtitle" style="color: #c0c0c0; font-size: 35px;">
							2 years... almost
					   </div>		   
					   <div class="caption pt-2 pb-4" style="color:#faf9f9; font-size: 15px;">
								In the past two years, Ate Carla's Bacsilog has served a large number of customers. It all started with one, but today Ate Carla's Bacsilog has several branches to conveniently reach our customers from various locations and for those who wish to try what Ate Carla's Bacsilog has to offer.
								</div>
								<p class="caption pt-4" style="color:#F9AF41; font-size: 14px; font-style: italic;">
								Browse through our story for more information.
							</p>
						</div>	
					 </div>	
					</td>
				</tr>
			</table>
		</div>
	</div>
</div>

<!-- <div class="container-fluid xl mw-100 no-padding" style="background-color:  #F9AF41">
	<div class="row d-flex align-items-center text-center">
		<div class="col-xl-6 col-lg-6 col-md-6 col-sm-0 col-xs-0" style="height:400px; 
   		background-image: url(img/hometeam.png);">

	
		</div>
		<div class="col-xl-6 col-lg-6 col-md-6 col-sm-0 col-xs-0 py-3 text-white">

			<table border="1" width="80%" cellpadding="10" cellspacing="0" align="center">
				<tr>
				  <td>
						<h1 class="d-flex align-items-center justify-content-center" style="font-size: 50px; "><b>LOREM IPSUM</b></h1>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris consectetur id est et posuere. Nulla varius odio felis, eu hendrerit turpis malesuada eu. Interdum et malesuada fames ac ante ipsum primis in faucibus.<br><br>
						<a href="services and products.html" class="btn btn-outline-dark" style="border: 1px solid #9A8C71;">GO TO PAGE</a></p>
				  </td>
				</tr>
			</table>
		</div>

	</div>
</div> -->

<div id="btnslide" class="carousel carousel-dark slide" data-bs-ride="carousel">

  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="2000">
      <img src="img/homefood3.png" class="d-block w-80">
      <div class="carousel-caption d-none d-md-block">
      </div>
    </div>
	
    <div class="carousel-item" data-bs-interval="2000">
      <img src="img/homefood2.png" class="d-block w-100">
      <div class="carousel-caption d-none d-md-block">
      </div>
    </div>

	<div class="carousel-item" data-bs-interval="2000">
		<img src="img/homefood4.png" class="d-block w-100">
		<div class="carousel-caption d-none d-md-block">
		  </div>
	  </div>

	  <div class="carousel-item" data-bs-interval="2000">
		<img src="img/homefood1.png" class="d-block w-100">
		<div class="carousel-caption d-none d-md-block">
		  </div>
	  </div>

	  <div class="carousel-item" data-bs-interval="2000">
		<img src="img/homefood5.png" class="d-block w-100">
		<div class="carousel-caption d-none d-md-block">
		  </div>
	  </div>
  </div>

  <button class="carousel-control-prev" type="button" data-bs-target="#btnslide" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#btnslide" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<div class="container-fluid xl mw-100 no-padding" style="background-color:  #faf9f9">
	<div class="row">
		<div class="col-12 pt-5 ">
			<br><br>
			<table border="0" width="60%" cellpadding="10" cellspacing="0" align="center">
				<tr>
					<td>
						<div class="d-flex align-items-center justify-content-center">
							<h1 class="title" style="font-size: 50px; text-align: center;"><b>Food Section</b></h1>
						</div>
						
						<div class="d-flex align-items-center text-center pt-3">
							<p class="caption" style="font-size: 15px; color: #1c1c1c;">Looking for a great cuisine to reward yourself with? Explore our meal selection menu to get insight of what foods we can provide you that we are confident you will enjoy. Just click the button below.</p>
						</div>
				
						<br>
						<div class="d-flex align-items-center justify-content-center">
							<a href="services and products.php" class="btn btn-outline-dark2 title text-white" style=" background-color: #AF1D27; box-shadow: rgba(0, 0, 0, 0.45) 0px 25px 20px -20px; width: 240px; height: 50px; border: none;  border-radius: 50px;">
								<div style="margin-top: 6px; font-weight: 600; font-size: 17px; letter-spacing: 1.5px;">
								  GO TO PAGE
								</div>
							</a>
						</div>
						<br>
					</td>
				</tr>
			</table>
		</div>
	</div>
</div>

<div class="container-fluid xl mw-100 no-padding p-5" style="background-color:  #faf9f9">
	<div class="row pt-3">
		<div class="col-xl-4 col-lg-4 col-md-0 col-sm-0 col-xs-0">
			<img src="img/homefoodbot1.png" class="img-fluid mx-auto d-block" style="width: 85%;">
					   
					<p class="subtitle px-5" style="color: #615f5f; font-size: 14px;">
					<br>
					ATE CARLA'S CHEESY HUNGARIAN
					<h6 class="title px-5" style="text-align: left; color: #1c1c1c;">
						<b>Popular “silog” breakfasts to munch and enjoy.</b>
					</h6>
					</p>
		</div>

		<div class="col-xl-4 col-lg-4 col-md-0 col-sm-0 col-xs-0">
			<img src="img/homefoodbot2.png" class="img-fluid mx-auto d-block" style="width: 85%;">

				<p class="subtitle px-5" style="color: #615f5f; font-size: 14px;">
					<br>
					ATE CARLA'S BACSLILOG
					<h6 class="title px-5" style="text-align: left; color: #1c1c1c;">
						<b>The famous bacsilog special: creamy cheese sauce, fried egg, and bacon.</b>
					</h6>
				</p>
		</div>

	<div class="col-xl-4 col-lg-4 col-md-0 col-sm-0 col-xs-0">
			<img src="img/homefoodbot3.png" class="img-fluid mx-auto d-block" style="width: 85%;">
				<p class="subtitle px-5" style="color: #615f5f; font-size: 14px;">
					<br>
					ATE CARLA'S HALO-HALO
					<h6 class="title px-5" style="text-align: left; color: #1c1c1c;">
						<b>More tasty and affordable food options. </b>
					</h6>
				</p>
		</div>
	</div>
</div>
		

<div class="container-fluid xl mw-100 no-padding" style="background-color:   #F9AF41">
	<div class="row pt-5">
		<div class="col-xl-0 col-lg-0 col-md-0 col-sm-0 col-xs-0 pb-5 pt-3">
			<table border="0" width="60%" cellpadding="10" cellspacing="0" align="center">
				<tr>
				  <td>
					<p class=" align-items-center text-center subtitle" style="text-align: center;">
						BROWSE MORE
					</p>
					<h1 class="align-items-center justify-content-center title" style="font-size: 50px; color: #faf9f9; text-align: center;">
						Serving You Everywhere
					</h1>
					<p class="align-items-center text-center caption pt-3" style="font-size: 15px; color:#1c1c1c">
						Being up to date on the various promotions and knowing what our previous customers think about our cuisine is significant, which is why we are here to provide it to you by offering the following options below. Aside from that, we are happy to answer your questions by visiting it by clicking the button provided.
					</p>
				  </td>
				</tr>
			  </table>
		</div>
	</div>
</div>

<div class="container-fluid xl mw-100 no-padding pb-5" style="background-color: #F9AF41">
	<div class="row px-5">
		<div class="col-xl-4 col-lg-4 col-md-0 col-sm-0 col-xs-0 pb-5">
			<div class="card text-center p-5" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px; background-color: #faf9f9;">
  				<div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
					<img src="img/calendar.png" width="25%" class="img-fluid">
      				<div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
    				</a>
  				</div>

  				<div class="card-body pt-4">
    				<h5 class="TITLE" style="font-weight: 500; font-size: 20px;">Be engaged with <br>our promos.</h5>
    				<p class="caption pb-2" style="color:#615f5f; font-size: 12px;">
      				Don't miss out on our promotions in Ate Carla's Bacsilog by following our social media profiles and saving the date.
    			</p>
    			<a href="News.php" class="btn btn-outline-dark3 title text-white" style=" background-color: #1c1c1c; box-shadow: rgba(0, 0, 0, 0.45) 0px 25px 20px -20px; width: 240px; height: 50px; border: none;  border-radius: 50px;">
					<div style="margin-top: 6px; font-weight: 600; font-size: 17px; letter-spacing: 1.5px;">
					  VISIT PAGE
					</div>
				</a>
  				</div>
			</div>
		</div>

		<div class="col-xl-4 col-lg-4 col-md-0 col-sm-0 col-xs-0 pb-5">
			<div class="card text-center p-5" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px; background-color: #faf9f9;">
  				<div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
					<img src="img/satisfaction (1).png" width="25%" class="img-fluid">
      				<div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
    				</a>
  				</div>

  				<div class="card-body pt-4">
    				<h5 class="TITLE" style="font-weight: 500; font-size: 20px;">Check our customer testimonials.</h5>
    				<p class="caption pb-2" style="color:#615f5f; font-size: 12px;">
      				Check out the many reviews from our customers who have already experienced the true magic of Ate Carla's Bacsilog.
    			</p>

    			<a href="Customer-Reviews.php" class="btn btn-outline-dark3 title text-white" style=" background-color:  #1c1c1c
				; box-shadow: rgba(0, 0, 0, 0.45) 0px 25px 20px -20px; width: 240px; height: 50px; border: none;  border-radius: 50px;">
					<div style="margin-top: 6px; font-weight: 600; font-size: 17px; letter-spacing: 1.5px;">
					  SEE REVIEWS
					</div>
				</a>
  				</div>
			</div>

		</div>

		<div class="col-xl-4 col-lg-4 col-md-0 col-sm-0 col-xs-0 pb-5">
			<div class="card text-center p-5" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px; background-color: #faf9f9;">
  				<div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
					<img src="img/question.png" width="25%" class="img-fluid">
      				<div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
    				</a>
  				</div>

  				<div class="card-body pt-4">
    				<h5 class="TITLE" style="font-weight: 500; font-size: 20px;">Let us help you with your inquiries.</h5>
    				<p class="caption pb-2" style="color:#615f5f; font-size: 12px;">
      				If you have any inquiries that need to be answered, we are happy to assist you with any of your queries and give solutions.
    			</p>

    			<a href="FAQs.php" class="btn btn-outline-dark3 title text-white " style=" background-color: #1c1c1c; box-shadow: rgba(0, 0, 0, 0.45) 0px 25px 20px -20px; width: 240px; height: 50px; border: none;  border-radius: 50px;">
					<div style="margin-top: 6px; font-weight: 600; font-size: 17px; letter-spacing: 1.5px;">
					  GO TO PAGE
					</div>
				</a>
  				</div>
			</div>
		</div>	

	</div>
</div>


<div class="container-fluid xl mw-100 no-padding" style="background-color:  #faf9f9">
	<div class="row py-3">
		<div class="col-xl-0 col-lg-0 col-md-0 col-sm-0 col-xs-0">
			<div class="row m-2">
			    <div class="bg-image d-flex align-items-end flex-column p-5"
		  			style="background-image: url(img/homefoodconcerns.png); height:300px; background-size: cover;">
					<table border="0" width="55%" cellpadding="0" cellspacing="0" align="right">
						<tr>
							<td>
								<h1 class="text-end title" style="font-size: 40px; color: #faf9f9"><b>Got food concerns?</b></h1>
								<p class="text-end caption" style="color:#faf9f9; font-size: 15px;">Because we value you and are precious to us, we welcome any of your comments about any of your varied concerns and we will use them to make further improvements. For any concerns, do not hesitate to contact us and we will be with you 24/7.</p>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>

		<div class="row p-5">
				<div class="col-12 p-4">
					<table border="0" width="76%" cellpadding="10" cellspacing="0" align="center">
						<tr>
							<td>
								<div class="d-flex align-items-center justify-content-center">
									<h1 class="title" style="font-size: 50px; color: #AF1D27;"><b>Contact Us</b></h1>
								</div>
								<br>
								<div class="d-flex align-items-center text-center">
	
									<p class="caption" style="font-size: 15px; color: #1c1c1c;">You may reach us through our various social media platforms, as well as Ate Carla's Bacsilog's phone number. If you have any problems or suggestions or any additional concerns, click the button below for further details on how to contact us. </p>
								</div>
				
								<br><br>
								<div class="d-flex align-items-center justify-content-center">
									<a href="contact.php" class="btn btn-outline-dark2 title text-white" style=" background-color: #AF1D27; box-shadow: rgba(0, 0, 0, 0.45) 0px 25px 20px -20px; width: 240px; height: 50px; border: none;  border-radius: 50px;">
										<div style="margin-top: 6px; font-weight: 600; font-size: 17px; letter-spacing: 1.5px;">
											ASK FOR HELP
										</div>
									</a>
								</div>
							</td>
						</tr>
					</table>
				</div>
			</div>
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
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
              header("refresh:0;url=Customer-Reviews.php");
          }
          elseif((mysqli_num_rows($C2results))>0 && (mysqli_num_rows($C1results))==0){
            echo "<center><h1><script>alert('Username does not exist.');</script></h1></center>";
              header("refresh:0;url=Customer-Reviews.php");
          }
          else{
            echo "<center><h1><script>alert('Username or password is incorrect.');</script></h1></center>";
              header("refresh:0;url=Customer-Reviews.php");
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
	<title>Ate Carla's Bacsilog | Reviews</title>
	<link rel="icon" href="img/logo.png" type="image/x-icon">
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	 <link href="Main.css" rel="stylesheet" type="text/css">
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
					<a class="nav-link" href="homepage.php"> HOME</a>
				</li>

				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" href="fashion_page.html"><b style="color: #F9AF41; font-weight: 800;"> NEWS</b></a>
					<ul class="dropdown-menu dropdown-menu-dark" style="background-color: #902923;">
						<li><a class="dropdown-item" href="News.php" style="font-size: 14px;">PROMOS & EVENTS</a></li>
						<li><a class="dropdown-item" href="Customer-Reviews.php" style="font-size: 14px;"><b style="color: #F9AF41; font-weight: 800;">REVIEWS</b></a></li>
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
<!--end of navbar-->

<!--start of sec1-->
	<div class="container-fluid pt-5" style="background-color: #faf9f9;">
		<div class="row p-5">
			<div class="col-md-7 col-sm-7 col-xs-7">
				<div class="container-fluid">
					<table border="0" width="90%" cellpadding="10" cellspacing="0" align="left">
						<tr>
						  <td class="px-4 py-5">
							<h1 style="font-size: 16px; color:  #1c1c1c; font-weight: normal; letter-spacing: 3px;" class="subtitle" style="font-weight: 700;"><b>CHECK OUT OUR</b></h1>
							<div class=" title" style="font-size: 50px;color: #AF1D27;"><b>Feedback From Our Lovely Customers</b></div>
							<div class=" caption pt-4" style="font-size: 15px;">They say that if a business wants to succeed, it should have positive feedback from its customers, so let our customers' feedback speak for us.</div>
						  </td>
						</tr>
					  </table>
				</div>
			</div>
			<div class="col-md-5 col-sm-5 col-xs-5">
				<div class="container-fluid img-4">
					<img src="img/custrevbg.png" class="img-fluid">

				</div>
			</div>
		</div>
	</div>
<!--end of sec1-->

<!--start of sec2-->
	<div class="container-fluid py-5" style="background-color:  #faf9f9;">
		<div class="row px-5">
			<div class="col-md-3 col-sm-3 col-xs-3 pb-4">
				<div class="container bg-red py-2">
					<div class="text-light title" style="font-size: 50px; font-weight: bold;">3,431
					</div>
					<div class="subtitle pb-3" style="font-size: 13px; color: #faf9f9;">LIKES ON FACEBOOK</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-3 col-xs-3 pb-4">
				<div class="container bg-red py-2">
					<div class="text-light title" style="font-size: 50px; font-weight: bold;">505
					</div>
					<div class="subtitle pb-3" style="font-size: 13px; color: #faf9f9;">INSTAGRAM FOLLOWERS</div>
				</div>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-6">
				<div class="container bg-yellow py-2">
					<div class="row">
							<div class="col-md-4 col-sm-4 col-xs-4 title" style="color:#1c1c1c; font-size: 50px; font-weight: bold;" class="title">3,182
								<div class="subtitle pb-3" style="font-size: 13px; color: #1c1c1c;">FOOD SERVED</div>
						</div>
						<div class="col-md-8 col-sm-8 col-xs-8 subtitle text-light fs-5" align="right">
							<div class="space" style="color:#1c1c1c; margin-top: 15px;">60%</div>
								<div class="progress">
								  <div class="progress-bar progress-bar-striped progress-bar-animated bg-red" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 60%"></div>
								</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<!--end of sec2-->

<!--start of sec3-->
	<div class="container-fluid" style="background-color: #f1f1f1;">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12 pt-5">
				<div class="container-fluid subtitle pt-4" align="center" style="color: #AF1D27;">
					SOME REVIEWS OF
				</div>
				<div class="title text-center" style="color:#1c1c1c; font-size:50px;"><b>Our Customers</b></div>
			</div>
		</div>
	</div>
<!--end of sec3-->

<!--start of sec4-->
<section class="" style="background-color: #f1f1f1">
        <div class="container" align="center">
          <div class="container row" align="center">
              <div class="col-md-12 col-sm-12 col-xs-12 fontfam" align="center">
                <div id="carouselExampleIndicators" class="carousel carousel-dark slide" data-bs-ride="carousel">
				  <div class="carousel-indicators">
				    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
				    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
				    <button type="button" 
					data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
					<button type="button" 
					data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
					<button type="button" 
					data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
				  </div>

				  <div class="carousel-inner">
					<div class="carousel-item active" data-bs-interval="2000">
					  <img src="img/reviewsbgwhite.png" class="d-block w-10">
					  <div class="carousel-caption d-none d-md-block">
						<div class="swiper-text px-4" style="margin-top: -80px;">
						  <h1 style="font-size: 16px; color:  #faf9f9; font-weight: normal; letter-spacing: 3px;" class="subtitle pt-3"></h1>
						  <h1 style="color: #1c1c1c; font-weight: 600;"  class="title"> ❝ Sobrang sulit na sulit sa 65 pesos. Must try!!! ❞</h1>
						  <p style="font-size: 24px; color:  #F9AF41; font-size: 18px; font-weight: bold;" class="pt-2 caption">
							- KOBBIE BALDEMOR, Customer
						  </p>
						</div>
					  </div>
					</div>
					
				    <div class="carousel-item">
						<img src="img/reviewsbgwhite.png" class="d-block w-10">
						<div class="carousel-caption d-none d-md-block">
						  <div class="swiper-text px-4" style="margin-top: -80px;">
							<h1 style="font-size: 16px; color:  #faf9f9; font-weight: normal; letter-spacing: 3px;" class="subtitle pt-3"></h1>
							<h1 style="color: #1c1c1c; font-weight: 600;"  class="title"> ❝ Crispy and yummy sisig. Super sarap! ❞</h1>
							<p style="font-size: 24px; color:  #F9AF41; font-size: 18px; font-weight: bold;" class="pt-2 caption">
							  - ECAH QUING, Customer
							</p>
						  </div>
						</div>
					</div>
				    <div class="carousel-item">
						<img src="img/reviewsbgwhite.png" class="d-block w-10">
						<div class="carousel-caption d-none d-md-block">
						  <div class="swiper-text px-4" style="margin-top: -80px;">
							<h1 style="font-size: 16px; color:  #faf9f9; font-weight: normal; letter-spacing: 3px;" class="subtitle pt-3"></h1>
							<h1 style="color: #1c1c1c; font-weight: 600;"  class="title"> ❝ Thumbs up! May bago na kaming oorderan everyday. ❞</h1>
							<p style="font-size: 24px; color:  #F9AF41; font-size: 18px; font-weight: bold;" class="pt-2 caption">
							  - KHEL ANN, Customer
							</p>
						  </div>
						</div>
					</div>
					<div class="carousel-item">
						<img src="img/reviewsbgwhite.png" class="d-block w-10">
						<div class="carousel-caption d-none d-md-block">
						  <div class="swiper-text px-4" style="margin-top: -80px;">
							<h1 style="font-size: 16px; color:  #faf9f9; font-weight: normal; letter-spacing: 3px;" class="subtitle pt-3"></h1>
							<h1 style="color: #1c1c1c; font-weight: 600;"  class="title"> ❝ Sulit na sulit dahil sa murang presyo. Try niyo na!! ❞</h1>
							<p style="font-size: 24px; color:  #F9AF41; font-size: 18px; font-weight: bold;" class="pt-2 caption">
							  - XANDER MULLES, Customer
							</p>
						  </div>
						</div>
					</div>
					<div class="carousel-item">
						<img src="img/reviewsbgwhite.png" class="d-block w-10">
						<div class="carousel-caption d-none d-md-block">
						  <div class="swiper-text px-4" style="margin-top: -80px;">
							<h1 style="font-size: 16px; color:  #faf9f9; font-weight: normal; letter-spacing: 3px;" class="subtitle pt-3"></h1>
							<h1 style="color: #1c1c1c; font-weight: 600;"  class="title"> ❝ Apaka sarap!!! Malinis pa at bagong luto. ❞</h1>
							<p style="font-size: 24px; color:  #F9AF41; font-size: 18px; font-weight: bold;" class="pt-2 caption">
							  - SAN MAYOR GAZA, Customer
							</p>
						  </div>
						</div>
					</div>

				  </div>
				  </div><br><br>
				</div>
          </div>
        </div>
</section>
<!--end of sec4-->

<!--start of sec5-->
<section>
	<div class="container-fluid content pt-4" align="center" style="background-color: #f1f1f1;">
		<div class="row">
			<div class="col-md-4 col-sm-4 col-xs-4">
				<div class="container-fluid"><br>
					<div class="card" style="width: 21rem;">
			      <div class="card-body p-5" style="background-color: #F9AF41;"  align="left">
			      	<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-quote" viewBox="0 0 16 16" >
							  <path d="M12 12a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1h-1.388c0-.351.021-.703.062-1.054.062-.372.166-.703.31-.992.145-.29.331-.517.559-.683.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992 4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 9 7.558V11a1 1 0 0 0 1 1h2Zm-6 0a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1H4.612c0-.351.021-.703.062-1.054.062-.372.166-.703.31-.992.145-.29.331-.517.559-.683.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992 4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 3 7.558V11a1 1 0 0 0 1 1h2Z">
							</svg>
			        <div class="card-text" style="font-size: 15px;">Sobrang sulit na sulit sa 65 pesos. 👌 Must try!!!</div>
			      </div>
			    </div>
				</div>
				<div class="row">
					<div class="col-md-4 col-sm-4 col-xs-4 text-light" align="right"><br>
						<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16" style="color: #615f5f">
						  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
						  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
						</svg>
					</div>
					<div class="col-md-8 col-sm-8 col-xs-8" style="width: 15rem; color: #1c1c1c;" align="justify">
						<br><b>Kobbie Baldemor</b>
						<p style="color: #615f5f;">Customer</p>
					</div>
				</div><br>
			</div>
			<div class="col-md-4 col-sm-4 col-xs-4">
				<div class="container-fluid"><br>
					<div class="card" style="width: 21rem;">
			      <div class="card-body p-5" style="background-color: #AF1D27;"  align="left">
			      	<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-quote" viewBox="0 0 16 16" style="color: #faf9f9;">
							  <path d="M12 12a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1h-1.388c0-.351.021-.703.062-1.054.062-.372.166-.703.31-.992.145-.29.331-.517.559-.683.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992 4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 9 7.558V11a1 1 0 0 0 1 1h2Zm-6 0a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1H4.612c0-.351.021-.703.062-1.054.062-.372.166-.703.31-.992.145-.29.331-.517.559-.683.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992 4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 3 7.558V11a1 1 0 0 0 1 1h2Z"/>
							</svg>
			        <div class="card-text"style="font-size: 15px; color: #faf9f9;">Crispy and yummy sisig. 😘😘😘 Super sarap!</div>
			      </div>
			    </div>
				</div>
				<div class="row text-light">
					<div class="col-md-4 col-sm-4 col-xs-4" align="right"><br>
						<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16" style="color: #615f5f">
						  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
						  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
						</svg>
					</div>
					<div class="col-md-8 col-sm-8 col-xs-8" style="width: 15rem; color: #1c1c1c;" align="justify">
						<br><b>Ecah Quing</b>
						<p style="color: #615f5f;">Customer</p>
					</div>
				</div><br>
			</div>
			<div class="col-md-4 col-sm-4 col-xs-4" style="background-color: #f1f1f1;">
				<div class="container subtitle pt-5" style="width: 20rem; font-size: 14px;">
					<B>MORE CUSTOMER REVIEWS</B>
				</div>
				<p class="title" style="font-size: 50px; color: #AF1D27;">
					<b>Best Food Reviews</b>
				</p>
			</div>
</section>
<!--end of sec5-->

<!--start of sec6-->
<section>
	<div class="container-fluid">
		<div class="row pb-5" align="center" style="background-color:#f1f1f1 ;">
			<div class="col-md-4 col-sm-4 col-xs-4" style="background-color: #f1f1f1;">
				<div class="container-fluid"><br>
					<div class="card" style="width: 21rem;">
			      <div class="card-body bg-red p-5"  align="left">
			      	<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-quote" viewBox="0 0 16 16" style="color: #faf9f9;">
							  <path d="M12 12a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1h-1.388c0-.351.021-.703.062-1.054.062-.372.166-.703.31-.992.145-.29.331-.517.559-.683.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992 4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 9 7.558V11a1 1 0 0 0 1 1h2Zm-6 0a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1H4.612c0-.351.021-.703.062-1.054.062-.372.166-.703.31-.992.145-.29.331-.517.559-.683.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992 4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 3 7.558V11a1 1 0 0 0 1 1h2Z"/>
							</svg>
			        <div class="card-text"style="font-size: 15px; color: #faf9f9;">Sulit na sulit dahil sa murang presyo at sa sobrang sarap. 💯 Try niyo na!!</div>
			      </div>
			    </div>
				</div>
				<div class="row text-light">
					<div class="col-md-4 col-sm-4 col-xs-4" align="right"><br>
						<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16" style="color: #615f5f">
						  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
						  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
						</svg>
					</div>
					<div class="col-md-8 col-sm-8 col-xs-8" style="width: 15rem; color: #1c1c1c;" align="justify">
						<br><b>Xander Mulles</b>
						<p style="color: #615f5f;">Customer</p>
					</div>
				</div><br>
			</div>
			<div class="col-md-4 col-sm-4 col-xs-4" style="background-color: #f1f1f1;">
				<div class="container-fluid"><br>
					<div class="card" style="width: 21rem;">
			      <div class="card-body bg-yellow p-5"  align="left">
			      	<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-quote" viewBox="0 0 16 16" style="color: #1c1c1c">
							  <path d="M12 12a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1h-1.388c0-.351.021-.703.062-1.054.062-.372.166-.703.31-.992.145-.29.331-.517.559-.683.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992 4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 9 7.558V11a1 1 0 0 0 1 1h2Zm-6 0a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1H4.612c0-.351.021-.703.062-1.054.062-.372.166-.703.31-.992.145-.29.331-.517.559-.683.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992 4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 3 7.558V11a1 1 0 0 0 1 1h2Z"/>
							</svg>
			        <div class="card-text" style="font-size: 15px; color: #1c1c1c;">Apaka sarap!!!! Malinis pa at bagong luto. 🙂 ❤️❤️❤️❤️</div>
			      </div>
			    </div>
				</div>
				<div class="row text-light">
					<div class="col-md-4 col-sm-4 col-xs-4" align="right"><br>
						<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16" style="color: #615f5f">
						  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
						  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
						</svg>
					</div>
					<div class="col-md-8 col-sm-8 col-xs-8" style="width: 15rem; color: #1c1c1c;" align="justify">
						<br><b>San Mayor Gaza</b>
						<p style="color: #615f5f;">Customer</p>
					</div>
				</div><br>
			</div>
			<div class="col-md-4 col-sm-4 col-xs-4" style="background-color: #f1f1f1;">
				<div class="container-fluid"><br>
					<div class="card" style="width: 21rem;">
			      <div class="card-body bg-red p-5" align="left">
			      	<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-quote" viewBox="0 0 16 16" 
					  style="color:  #faf9f9">
							  <path d="M12 12a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1h-1.388c0-.351.021-.703.062-1.054.062-.372.166-.703.31-.992.145-.29.331-.517.559-.683.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992 4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 9 7.558V11a1 1 0 0 0 1 1h2Zm-6 0a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1H4.612c0-.351.021-.703.062-1.054.062-.372.166-.703.31-.992.145-.29.331-.517.559-.683.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992 4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 3 7.558V11a1 1 0 0 0 1 1h2Z"/>
							</svg>
			        <div class="card-text" style="font-size: 15px; color: #faf9f9;">Thumbs up! Masarap sya parehas. May bago na kami everyday oorderan. 😊</div>
			      </div>
			    </div>
				</div>
				<div class="row text-light">
					<div class="col-md-4 col-sm-4 col-xs-4" align="right"><br>
						<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16" style="color: #615f5f">
						  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
						  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
						</svg>
					</div>
					<div class="col-md-8 col-sm-8 col-xs-8" style="width: 15rem; color: #1c1c1c;" align="justify">
						<br><b>Khel Ann</b>
						<p style="color: #615f5f;">Customer</p>
					</div>
				</div><br>
			</div>
		</div>
	</div>
</section>
<!--end of sec6-->

<!--start of sec7-->
<div class="container-fluid xl mw-100 no-padding" style="background-color:    #c0c0c0">
	<div class="row">
		<div class="col-xl-0 col-lg-0 col-md-0 col-sm-0 col-xs-0 py-5 px-5">
		  <table width="80%" cellpadding="54" cellspacing="0" border="1" align="center" style="border: 1px solid #1c1c1c;">
			<tr>
			  <td>
				<div class="secondesc px-5" style="color: #1c1c1c; text-align: center;">
					We believe we have provided our customers with the best customer experience possible at this price point. 😉
				</div>
			</td>
		  </tr>
		  </table>
			</div>
		</div>
	</div>
</div>
<!--end of sec7-->

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
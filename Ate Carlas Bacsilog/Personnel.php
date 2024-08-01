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
              header("refresh:0;url=Personnel.php");
          }
          elseif((mysqli_num_rows($C2results))>0 && (mysqli_num_rows($C1results))==0){
            echo "<center><h1><script>alert('Username does not exist.');</script></h1></center>";
              header("refresh:0;url=Personnel.php");
          }
          else{
            echo "<center><h1><script>alert('Username or password is incorrect.');</script></h1></center>";
              header("refresh:0;url=Personnel.php");
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
	<title>Ate Carla's Bacsilog | Our Team</title>
	<link rel="icon" href="img/logo.png" type="image/x-icon">
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
	<link rel="stylesheet" href="Personnel-page-design.css">
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
						<li><a class="dropdown-item" href="About-Us.php" style="font-size: 14px;">OUR STORY</a></li>
						<li><a class="dropdown-item" href="Personnel.php" style="font-size: 14px;"><b style="color: #F9AF41; font-weight: 800;"> OUR TEAM</b></a></li>
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

<!---HEADER-->
<div class="container-fluid xl mw-100 no-padding" style="background-color: #F1F1F1">
	<div class="row d-flex align-items-center text-center">
		<div class="bgcol5-1 ">
			<div class="contactheadertitle pt-5 px-5">
				<table width="80%" cellpadding="" cellspacing="" align="center" style="font-size: 70pxs; margin-top: 120px;">
					<tr>
						<Td>
							<b style="color:#1c1c1c;">Our Team</b>
						</Td>
					</tr>
			</table>
			</div>
		</div>
	</div>
</div>

<!---First container-->
<div class="container-fluid xl mw-100 no-padding" style="background-color:   #902923">
	<div class="row d-flex align-items-center text-center py-5">
		<div class="col-xl-5 col-lg-6 col-md-6 col-sm-0 col-xs-0 py-3 px-5">
			<div class="firstdesc p-5" style="color:  #faf9f9;">
				Meet the team behind Ate Carla's Bacsilog's success. We can't deny that every business success is the result of a great team working together to achieve the objective and sustain the restaurant's or firm's vision and mission.
			</div>
		</div>
		<div class="col-xl-7 col-lg-6 col-md-6 col-sm-0 col-xs-0 text-white py-3">
            <div class="firstdesc2 px-5 pb-2" style="color:  #F9AF41;">
				<b>A failure occurs in every business, but Ate Carla's does not use it as an excuse to cease working; instead, it is used to become more successful.</b>
			</div>
		</div>
	</div>
</div>

<!---Second container-->
<div class="container-fluid xl mw-100 no-padding" style="background-color:  #faf9f9">
	<div class="row d-flex align-items-center text-center py-5">
		<div class="col-xl-6 col-lg-6 col-md-6 col-sm-0 col-xs-0 p-5" style="background-color:#faf9f9;">
			<div class="row px-4">
				<img src="img/owner.jpeg" class="img-fluid mx-auto d-block " style="width:60%; margin-top: 0px; border-radius: 50%;">
			</div>
	</div>

		<div class="col-xl-6 col-lg-6 col-md-6 col-sm-0 col-xs-0 px-5">
			<table border="1" width="100%" cellpadding="40" cellspacing="0" align="center">
				<tr>
				  <td>
					<div class="ownersubtitle">
						BUSINESS OWNER
					</div>
					<div class="ownertitle pb-2">
						Dan Martin Sison
					</div>
					<div class="ownerdesc px-1 pt-2">
					He is the man, the myth, and the legend behind the founding of Ate Carla's Bacsilog. He established the Ate Carla's Bacsilog, and he is still striving for more success by opening other branches in other locations so that more people can taste their original family food recipes.
				</div>
				  </td>
				</tr>
			  </table>
		</div>

	</div>
</div>

<!---Third container-->
<div class="container-fluid xl mw-100 no-padding pt-5" style="background-color:  #F1F1F1">
	<div class="row pt-">
		<div class="col-xl-0 col-lg-0 col-md-0 col-sm-0 col-xs-0 text-white">
			<div class="teamtitle pt-4">
				Meet the team.
			</div>
		</div>
	</div>
</div>

<!---Last container left side card-->
<!---Last container left side card-->
<div class="container-fluid xl mw-100 no-padding" style="background-color:  #F1F1F1">
	<div class="row text-center">
		<div class="col-xl-4 col-lg-0 col-md-0 col-sm-0 col-xs-0 pb-5">
			<div class="card mx-auto pb-5" style="width: 20rem; margin-top: 70px; background-image: url(img/08.png);">
				<div class="card-body center pt-5 pb-2">
					<div class="phrasesubtitle ps-3"> TEAM MOTTO </div>
					<div class="phrasetitle px-3 pt-4">
						❝ A way to one's heart is through food that's why we work hard to deliever the best foods that someone could possibly eat. ❞</div>
				</div>
			</div>
		</div>

<!---Last container Right side card label-->
		<div class="col-xl-8 col-lg-0 col-md-0 col-sm-0 col-xs-0 " style="background-color:  #F1F1F1">
			<!---label row-->
            <div class="row d-flex align-items-center text-center ">
				<div class="col-xl-0 col-lg-0 col-md-0 col-sm-0 col-xs-0 text-black py-0 pb-2">
					<table width="100%" cellspacing="0" cellpadding="30" border="0">
						<tr>
							<td>
					<div class="teamdesc px-4">You can't call it success until you have a team that works together to achieve greater success and provide the greatest possible service to the consumer.</div>
							</td>
						</tr>
					
				</table>
				</div>
			</div>

			<!---First row First three cards-->
			<div class="row d-flex align-items-center text-center px-5">
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-0 col-xs-0 text-white ">
					<div class="card mb-5" style="max-width: 400px;">
						  <div class="col-md-12">
							<div class="card-body p-4">
								<br>
							<div class="workerssubtitle">HEAD CHEF</div>
							  <div class= "workerstitle pt-1">Ivy Teodosio</div>
							<div class="workerdesc pt-3">Ms. Ivy Teodosio, the brains behind all of the best combinations for the sunny side up egg and fried rice, always ensures that we deliver the best of the best food quality.<br><br></div>
							</div>
						  </div>
						</div>
					  </div>
					  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-0 col-xs-0 text-white">
						<div class="card mb-5" style="max-width: 400px;">
							  <div class="col-md-12">
								<div class="card-body p-4">
									<br>
									<div class="workerssubtitle">DELIVERY RIDER</div>
									  <div class="workerstitle pt-1">Patrick Alonde</div>
									<div class="workerdesc pt-3">He is the reason why your order is ready to receive right at your door step by delivering it to you and serving you with high-quality meals.<br><br><br></div>
									</div>
							  </div>
							</div>
						  </div>
						  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-0 col-xs-0 text-white ">
							<div class="card mb-5" style="max-width: 400px;">
								<div class="card-body p-4">
									<br>
									<div class="workerssubtitle">FINANCE</div>
									  <div class="workerstitle pt-1">Carmela Alonde</div>
									<div class="workerdesc pt-3">Ate Carla's Bacsilog might not have been as successful if it hadn't been for Ms. Carmela Alonde's excellent financial management skills.</div>
									</div>
									<br><br>
								</div>
							  </div>
				</div>

				<!---Second row Second three cards-->
				<div class="row d-flex align-items-center text-center px-5 pb-4">
					<div class="col-xl-4 col-lg-4 col-md-4 col-sm-0 col-xs-0 text-white ">
						<div class="card mb-5" style="max-width: 400px;">
							  <div class="col-md-12">
								<div class="card-body p-4">
									<br>
									<div class="workerssubtitle">SOCIAL MEDIA MANAGER</div>
									  <div class="workerstitle pt-1">Theresa Mendoza</div>
									<div class="workerdesc pt-3">She is in charge of Ate Carla's Bacsilog's social media accounts in order to promote and communicate with all of the customers regarding their various inquiries.</div>
									</div>
							  </div>
							</div>
						  </div>
						  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-0 col-xs-0 text-white ">
							<div class="card mb-5" style="max-width: 400px;">
								  <div class="col-md-12">
									<div class="card-body p-4">
										<br>
										<div class="workerssubtitle">HOST/CASHIER</div>
										  <div class="workerstitle pt-1">Adrian Dillon</div>
										<div class="workerdesc pt-3">He is the first impression of Ate Carla's Bacsilog to everyone who enters the vicinity, and he is also the one who takes the customer's order.</div>
										</div>
										<br><br>
								  </div>
								</div>
							  </div>
							  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-0 col-xs-0 text-white ">
								<div class="card mb-5" style="max-width: 400px;">
									  <div class="col-md-12">
										<div class="card-body p-4">
											<br>
											<div class="workerssubtitle">BUSSER/SERVER</div>
											  <div class="workerstitle pt-1">Ronald Norton</div>
											<div class="workerdesc pt-3">He is in charge of making sure the table where the customer will eat is clean, as well as serving the food to all of the gorgeous customers that are eating there.</div>
											</div>
											<br><br>
									  </div>
									</div>
								  </div>
					</div>
			</div>
	
		</div>
	</div>

</div>

<!--FOOOOTEEEERRRRRR-->
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
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
              header("refresh:0;url=services and products.php");
          }
          elseif((mysqli_num_rows($C2results))>0 && (mysqli_num_rows($C1results))==0){
            echo "<center><h1><script>alert('Username does not exist.');</script></h1></center>";
              header("refresh:0;url=services and products.php");
          }
          else{
            echo "<center><h1><script>alert('Username or password is incorrect.');</script></h1></center>";
              header("refresh:0;url=services and products.php");
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
	<title>Ate Carla's Bacsilog | Menu & Products</title>
	<link rel="icon" href="img/logo.png" type="image/x-icon">
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
	<link rel="stylesheet" href="products-design.css">
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
					<a class="nav-link" href="homepage.php">HOME </b></a>
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
					<a class="nav-link" href="services and products.php"><b style="color: #F9AF41; font-weight: 800;"> PRODUCTS</b></a>
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

<div class="container-fluid xl mw-100 no-padding" style="background-color: #F1F1F1">
	<div class="row d-flex align-items-center text-center">
		<div class="bgcol5-1 ">
			<h1 class="title pt-3" style="margin-top: 80px; font-size: 86px; color:  #faf9f9;"><b>A TASTE OF HOME</b></h1>
			<p style="color:#F9AF41; font-size: 30px;" class="subtitle">
				WHAT CAN WE GET YOU?
			</p>
		</div>
	</div>
</div>

<div class="container-fluid xl mw-100 no-padding px-5" style="background-color: #faf9f9">
	<div class="row d-flex align-items-center text-center py-5">
		<div class="col-xl-3 col-lg-3 col-md-6 col-sm-0 col-xs-0">
			<div class="img-container">
				<a href="#SILOGS"><img src="img/food1.png" class="img-fluid mx-auto d-block"></a>

				<div class="centered caption"style="font-size: 15px; color:#F1F1F1;">
					<br>
					<div class="title" style="color:#faf9f9; font-size: 34px;">
						<b>SILOGS</b>
					</div>
				</div>
			</div>
			
		</div>

		<div class="col-xl-3 col-lg-3 col-md-6 col-sm-0 col-xs-0">
			<div class="img-container">
			<a href="#SANDWICHES"><img src="img/food2.png" class="img-fluid mx-auto d-block"></a>

				<div class="centered caption"style="font-size: 15px; color:#F1F1F1;">
					<br>
					<div class="title" style="color:#faf9f9; font-size: 34px;">
						<b>SANDWICHES</b>
					</div>
				</div>
			</div>
		</div>

		<div class="col-xl-3 col-lg-3 col-md-6 col-sm-0 col-xs-0">
			<div class="img-container">
				<a href="#MUNCHEESE"><img src="img/food3.png" class="img-fluid mx-auto d-block"></a>

				<div class="centered caption"style="font-size: 15px; color:#F1F1F1;">
					<br>
					<div class="title" style="color:#faf9f9; font-size: 34px;">
						<b>MUNCHEESE</b>
					</div>
				</div>
			</div>
		</div>

		<div class="col-xl-3 col-lg-3 col-md-6 col-sm-0 col-xs-0">
			<div class="img-container">
				<a href="#DESSERTS"><img src="img/food4.png" class="img-fluid mx-auto d-block"></a>

				<div class="centered caption"style="font-size: 15px; color:#F1F1F1;">
					<br>
					<div class="title" style="color:#faf9f9; font-size: 34px;">
						<b>DESSERTS</b>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid xl mw-100 no-padding px-5" style="background-color:  #faf9f9">
	<div class="row px-5">

		<div class="col-xl-4 col-lg-4 col-md-4 col-sm-0 col-xs-0 d-flex align-items-center text-center px-5 py-5">
				<div class="row">
					<img src="img/fork.png" class="img-fluid mx-auto d-block " style="width:22%">
						<h1 class="subtitle" style="font-size: 18px;"><br>YOUR HUNGER PARTNER</h1>
						<p class="caption" style="font-size: 14px;">Once you're hungry, we're here to help. If you are hungry, Ate Carla's can certainly fulfill and satisfy your desires.</p>
				</div>
		</div>

		
		<div class="col-xl-4 col-lg-4 col-md-4 col-sm-0 col-xs-0 d-flex align-items-center text-center px-5 py-5">
			<div class="row">
				<img src="img/tray.png" class="img-fluid mx-auto d-block " style="width:22%">
					<h1 class="subtitle" style="font-size: 18px;"><br>FLAVOURS FOR ROYALTY</h1>
					<p class="caption" style="font-size: 14px;">
						Different flavors from the many foods we provide will undoubtedly make you want to come back for more.
					</p>
			</div>
		</div>

		
		<div class="col-xl-4 col-lg-4 col-md-4 col-sm-0 col-xs-0 d-flex align-items-center text-center px-5 py-5">
			<div class="row">
				<img src="img/fast-food.png" class="img-fluid mx-auto d-block " style="width:22%">
					<h1 class="subtitle" style="font-size: 18px;"><br>DELIVERING HAPPINESS</h1>
					<p class="caption" style="font-size: 14px;">We are not only here to serve you tasty and high-quality cuisine, but also to make you satisfied with our service.</p>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid xl mw-100 no-padding" style="background-color: #faf9f9">
	<div class="row p-4">
		<div class="col-xl-4 col-lg-4 col-md-4 col-sm-0 col-xs-0 bgcol5-2">
			
		</div>
		
		<div class="col-xl-4 col-lg-4 col-md-4 col-sm-0 col-xs-0 bgcol5-3 ">
		
		</div>

		<div class="col-xl-4 col-lg-4 col-md-4 col-sm-0 col-xs-0 bgcol5-4">
			
		</div>
	</div>
</div>

<div class="container-fluid xl mw-100 no-padding p-5" style="background-color: #faf9f9">
	<div class="row d-flex align-items-center justify-content-center">
		<div class="col-xl-7 col-lg-7 col-md-0 col-sm-0">
				<div class="row">	
		            <div class="col mx-2 d-flex align-items-center text-center">
		            	<div class="row px-5" id="SILOGS">
							<img src="img/section1food2.png" class="img-fluid mx-auto d-block" style="width: 100%;">
						</div>
		        	</div>
					
 				</div>
		</div>
	
		<div class="col-xl-5 col-lg-5 col-md-0 col-sm-0 mx-auto">
			<br><br><br>
			<table border="0" width="95%" cellpadding="10" cellspacing="0" align="center">
				<tr>
					<td>
						<h1 class="title" style="font-size: 50px; color:#AF1D27;">
							<b>Cheesy Silogs & Steaks</b>
						</h1>
		  				<p class="caption mt-auto pt-2" style="color:  #1c1c1c;  font-size: 15px;">
						  Cheesy Silog with a range of ingredients that complement each other. Fresh bacon, a sunny side up egg, fried rice, and, of course, we wouldn't call it cheesy without adding cheese on top to spice up the flavor.
						</p>
					</td>
				</tr>
			</table>
		</div>

		
	</div>
</div>

<div class="container-fluid xl mw-100 no-padding px-5" style="background-color: #faf9f9">
	<div class="row d-flex align-items-center px-5">
		<div class="col-xl-4 col-lg-4 col-md-4 col-sm-0 col-xs-0 py-5">
			<h5 class="subtitle" style="font-size: 16px; color: #b0b0b0;">
				<b>CHEESY SILOG & STEAKS</b>
			</h5>
			<h1 class="title" style="font-size: 30px; color: #1c1c1c;">
				<b>Tonkatsilog</b>
			</h1>
			<img src="img/section1food3.png" class="img-fluid mx-auto d-block pt-5 pb-3">
			<div class="row">
				
			<p class="caption mt-auto pt-2" style="color:  #1c1c1c;  font-size: 15px;">
			Tonkatsu is great on its own, but it's much better when served with a sunny side up egg and fried rice. 
			</p>

			<p class="caption mt-auto pt-2 px-4" style="color:  #AF1D27;  font-size: 18px; text-align: end; font-weight: 600;">
				₱85
			</p>
			

		</div>
		</div>

		<div class="col-xl-4 col-lg-4 col-md-4 col-sm-0 col-xs-0 py-5">
			<h5 class="subtitle" style="font-size: 16px; color: #b0b0b0;">
				<b>CHEESY SILOG & STEAKS</b>
			</h5>
			<h1 class="title" style="font-size: 30px; color: #1c1c1c;">
				<b>Burger Steak</b>
			</h1>
			<img src="img/section1food4.png" class="img-fluid mx-auto d-block pt-5 pb-3">
			<p class="caption mt-auto pt-2" style="color:  #1c1c1c;  font-size: 15px;">
				Fried rice and sunny side up eggs are a winning combo, especially when paired with a flavorful burger steak.
			  </p>

			  <p class="caption mt-auto pt-2 px-2" style="color:  #AF1D27;  font-size: 18px; text-align: end; font-weight: 600;">
				₱165
			</p>
			  
		</div>

		<div class="col-xl-4 col-lg-4 col-md-4 col-sm-0 col-xs-0 py-5">
			<h5 class="subtitle" style="font-size: 16px; color: #b0b0b0;">
				<b>CHEESY SILOG & STEAKS</b>
			</h5>
			<h1 class="title" style="font-size: 30px; color: #1c1c1c;">
				<b>Hungsilog</b>
			</h1>
			<img src="img/section1food5.png" class="img-fluid mx-auto d-block pt-5 pb-3">
			<p class="caption mt-auto pt-2" style="color:  #1c1c1c;  font-size: 15px;">
				Hungarian served with a sunny side-up and fried rice for extra flavor, but it's not complete without bacon.
			  </p>
			  <p class="caption mt-auto pt-2 px-2" style="color:  #AF1D27;  font-size: 18px; text-align: end; font-weight: 600;">
				₱105
			</p>
			
			</div>
		</div>
	</div>
</div>

<div class="container-fluid xl mw-100 no-padding" style="background-color:  #615f5f">
	<div class="row d-flex align-items-center text-center">
		<div class="col-xl-6 col-lg-6 col-md-6 col-sm-0 col-xs-0 py-5 text-white"><br><br>
			<table border="2" width="86%" cellpadding="30" cellspacing="0" align="center" style="border: 2px solid #F9AF41
			;">
				<tr>
				  <td>
					<h1 class="title" style="font-size: 50px; color:#F9AF41;">
						<b>Sandwiches</b>
					</h1>
					  <p class="caption mt-auto pt-2" style="color:  white;  font-size: 15px;">
					 Ate Carla's not only serves meals with a sunny side up egg and fried rice, but we also offer a variety of sandwich combinations to please even the pickiest of eaters. The sandwiches have a lot of flavor because of the ingredients we combined in one sandwich that match together well.
					</p>
				  </td>
				</tr>
			  </table>
			  <br><br>
		</div>

		<div class="col-xl-6 col-lg-6 col-md-6 col-sm-0 col-xs-0 bgcol5-5" id="SANDWICHES">
	
		</div>

	</div>
</div>

<div class="container-fluid xl mw-100 no-padding" style="background-color:  #F9AF41">
	<div class="row pt-5">
		<div class="col-xl-0 col-lg-0 col-md-0 col-sm-0 col-xs-0 pt-5">
			<table border="0" width="65%" cellpadding="10" cellspacing="0" align="center">
				<tr>
				  <td>
					<h1 class="d-flex align-items-center justify-content-center subtitle text-center" style="font-size: 30px; color: #faf9f9; ">
						<b>MORE SANDWICHES VARIETY</b>
					</h1>
					<p class="d-flex align-items-center text-center caption pt-4"  style="color:  #1c1c1c;  font-size: 15px;">
						When it comes down to it, sandwiches are often associated with comfort food. Consider the various types of sandwiches available, which are not only visually appealing but also delicious due to the excellent group of items chosen. 
					</p>
				  </td>
				</tr>
			  </table>
		</div>
	</div>
</div>

<div class="container-fluid xl mw-100 no-padding" style="background-color:  #F9AF41">
	<div class="row pb-5 pt-3">
		<div class="col-xl-0 col-lg-0 col-md-0 col-sm-0 col-xs-0 d-flex align-items-center justify-content-center">
			
			<img src="img/section2bg2.png" style="height:700px" class="img-fluid pt-3">
		</div>
	</div>
</div>

<div class="container-fluid xl mw-100 no-padding" style="background-color:  #F9AF41">
	<div class="row pb-3 py-3 d-flex align-items-center justify-content-center">
		<div class="col-xl-6 col-lg-6 col-md-0 col-sm-0 col-xs-0 pb-5 d-flex align-items-center justify-content-center">
			<div class="card mb-3 border border-0" style="max-width: 540px;">
				<div class="row g-0">
				  <div class="col-md-5">
					<div class="card-body p-5">
						<h5 class="subtitle" style="font-size: 14px; color: #b0b0b0;">
							<b>SANDWICHES</b>
						</h5>
						<h1 class="title" style="font-size: 22px; color: #1c1c1c;">
							<b>Cheesy Angus Beef Burger</b>
						</h1>
						<p class="caption mt-auto pt-2" style="color:  #1c1c1c;  font-size: 15px;">
							Juicy Angus beef burger with cheese for added flavor and other ingredients that complement your palate.
						  </p>

						  <p class="caption mt-auto pt-2" style="color:  #AF1D27;  font-size: 18px; text-align: end; font-weight: 600;">
							₱95
						</p>
					  </div>
				
				  </div>
				  <div class="col-md-7">
					<img src="img/section2food2.png" class="img-fluid" class="img-fluid" style="height: 100%; width: 120%;">
				  </div>
				</div>
			  </div>
		</div>

		<div class="col-xl-6 col-lg-6 col-md-0 col-sm-0 col-xs-0 pb-5 d-flex align-items-center justify-content-center">
			<div class="card mb-3 border border-0" style="max-width: 540px;">
			<div class="row g-0">
				<div class="col-md-5">
				<div class="card-body p-5">
					<h5 class="subtitle" style="font-size: 14px; color: #b0b0b0;">
						<b>SANDWICHES</b>
					</h5>
					<h1 class="title" style="font-size: 22px; color: #1c1c1c;">
						<b>Cheesy Hungarian Sandwich</b>
					</h1>
					<p class="caption mt-auto pt-2" style="color:  #1c1c1c;  font-size: 15px;">
						 A Hungarian Sandwhich is not complete without the cheesy flavor to round out the flavor of the sandwhich.
						</p>

						<p class="caption mt-auto pt-2" style="color:  #AF1D27;  font-size: 18px; text-align: end; font-weight: 600;">
							₱85
						</p>
					</div>
			
				</div>
				<div class="col-md-7">
				<img src="img/section2food1.png" class="img-fluid" class="img-fluid" style="height: 100%; width: 120%;">
				</div>
				</div>
			</div>
		</div>
	</div>
	<br><br>
</div>
<div id="DESSERTS"></div>

<div class="container-fluid xl mw-100 no-padding pt-4" style="background-color:   #faf9f9">
	<div class="row pb-5 py-5 text-white">
		<div class="col-xl-0 col-lg-0 col-md-0 col-sm-0 col-xs-0">
			<table border="0" width="60%" cellpadding="10" cellspacing="0" align="center">
				<tr>
				  <td>
					<h1 class="d-flex align-items-center justify-content-center title text-center" style="font-size: 50px; color: #AF1D27; ">
						<b>Desserts</b>
					</h1>
					<p class="d-flex align-items-center text-center caption pt-3"  style="color:  #1c1c1c;  font-size: 15px;">
						After a heavy meal, Ate Carla's Bacsilog genuinely believes that a dessert is required to complete the meal- that features everything from appetizers to the main dish.
					</p>

					<p class="caption mt-auto pt-2 px-2" style="color:  #AF1D27;  font-size: 18px; text-align: center; font-weight: 600;">
						₱95
				  </td>
				</tr>
			  </table>
		</div>
	</div>
</div>

<div class="container-fluid xl mw-100 no-padding pb-5 px-5" style="background-color:   #faf9f9">
	<div class="row d-flex align-items-center justify-content-center">
		<div class="col-xl-4 col-lg-4 col-md-0 col-sm-0 col-xs-0 pb-5 pt-3">
			<div class="row">
		            <div class="col mx-2 align-items-center caption text-end">
						<img src="img/chocolate.png" class="img-fluid mx-auto d-block px-4 py-3" style="width: 30%; float: right; ">
						<h5 class="subtitle" style="color: #1c1c1c;">
							TOBLERONE BARS</h5>
		            	<p class="caption ps-4 py-3" style="font-size: 12.5px; ">
							Toblerone bars, for a richer and melting chocolate flavor in your mouth.
		            	</p>

		            </div>

		            <!-- <div class="col mx-2 d-flex align-items-center caption" style="text-align: left;">
		            	<img src="img/chocolate.png" class="img-fluid mx-auto d-block " style="width: 40%;">
		            </div> -->
	        </div>
	        <br>
	        <div class="row">
		            <div class="col mx-2 align-items-center caption text-end">
						<img src="img/marshmallows.png" class="img-fluid mx-auto d-block px-4 py-3" style="width: 30%; float: right; ">
						<h5 class="subtitle" style="color: #1c1c1c;">
							MARSHMALLOWS</h5>
		            	<p class="caption ps-4 py-3" style="font-size: 12.5px;">
							
							While eating, marshmallows provide softness and a delicious taste.
							
		            	</p>
		            </div>

		            <!-- <div class="col mx-2 d-flex align-items-center caption" style="text-align: left;">
		            	<img src="img/sample1.png" class="img-fluid mx-auto d-block " style="width:150px;height: 140px;">
		            </div> -->
	        </div>
		        	
		            
		</div>

		<div class="col-xl-3 col-lg-3 col-md-0 col-sm-0 col-xs-0 pb-5 py-5">
			<img src="img/section3food1.png" class="img-fluid mx-auto d-block" >
		</div>

		<div class="col-xl-4 col-lg-4 col-md-0 col-sm-0 col-xs-0 pb-5 pt-3">
			<div class="row">
		           <!-- <div class="col mx-2 d-flex align-items-center caption" style="text-align: end;">
		            	<img src="img/sample1.png" class="img-fluid mx-auto d-block " style="width:150px;height: 140px;">
		            </div> -->
		            
		            <div class="col mx-2 align-items-center caption" style="text-align: left;">
						<img src="img/choco-balls.png" class="img-fluid mx-auto d-block px-4 py-3" style="width: 30%; float: left;">

						<h5 class="subtitle" style="color: #1c1c1c;">
							CHOCO-BALLS
						</h5>

						<p class="caption pe-4 py-3" style="font-size: 12.5px;">
							Choco balls, like the toblerone bars, will undoubtedly add a richer chocolate flavor.
		            	</p>
		            </div>
	        </div>
	        <br>
	        <div class="row">

	        		<!-- <div class="col mx-2 d-flex align-items-center caption" style="text-align: left;">
		            	<img src="img/sample1.png" class="img-fluid mx-auto d-block " style="width:150px;height: 140px;">
		            </div> -->

		            <div class="col mx-2 align-items-center caption" style="text-align: left;">
						<img src="img/ice-cream.png" class="img-fluid mx-auto d-block px-4 py-3" style="width: 30%; float: left;">

						<h5 class="subtitle" style="color: #1c1c1c;">
							MINI WAFFLE CONE
						</h5>

						<p class="caption pe-4 py-3" style="font-size: 12.5px;">
							Mini waffle cones are used for aesthetic reasons as well as to give extra flavor to your sweet treat.
		            	</p>
		            </div>		            
	        </div>
		</div>
	</div>
</div>

<div class="container-fluid xl mw-100 no-padding py-5" style="background-color:  #AF1D27">
	<div class="row d-flex align-items-center justify-content-center py-4" id="MUNCHEESE">
		<div class="col-xl-4 col-lg-4 col-md-0 col-sm-0 col-xs-0 px-5">
			<div class="row">
		            <div class="col mx-2 d-flex align-items-center text-center px-4">
		            	<div class="row"><img src="img/section4food1.png" class="img-fluid mx-auto d-block " style="width:100%;">
							<p class="subtitle pt-4" style="color: #F9AF41;">
								<br>
								CHEESY BACON FRIES
							</p>

							<div class="caption" style="color: #faf9f9; font-size: 15px;">
								Are you sick of eating only fries? Don't worry, Ate Carla has you covered with our very own cheesy bacon fries, which are fries with bacon and a cheesy flavor on top to make it more appealing to your taste and give a party in your mouth.
							</div>

							<p class="caption mt-auto pt-2 px-3" style="color:  #F9AF41;  font-size: 18px; text-align: end; font-weight: 600;">
								₱75
							</p>
						</div>
		        	</div>
		        </div>
	        </div>	        		            
		

		<div class="col-xl-4 col-lg-4 col-md-6 col-sm-0 col-xs-0 p-4">

			<img src="img/section4bg.png" class="img-fluid mx-auto d-block" >
		</div>

		<div class="col-xl-4 col-lg-4 col-md-3 col-sm-0 col-xs-0 px-5">
		          <div class="row">
		            <div class="col mx-2 d-flex align-items-center text-center px-4">
		            	<div class="row">
		            		<p class="title" style="color: #faf9f9; font-size: 50px;">
							<br>
								<b>Muncheese Favorites</b>
							</p>
		        
		            		<img src="img/section4food2.png" class="img-fluid mx-auto d-block" style="width:100%;">
						</div>
		        	</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid xl mw-100 no-padding pt-5 px-5" style="background-color: #faf9f9">
	<div class="row justify-content-center align-items-center pt-5">
		<div class="row px-5">
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-0 col-xs-0 d-flex align-items-center text-left" style="background-image: url(img/test2.png);">
				<div class="row">
					<table border="0" cellpadding="51" cellspacing="0" align="left">
						<tr>
							<td>
								<p class="subtitle" style="color:#faf9f9; font-size: 18px;"><br>BACON x TONKATSU</p>
								<p class="caption" style="color: #faf9f9;font-size: 15px;">Tonkatsu with bacon on one platter and, of course, iconic fried rice with sunny side up egg to round off your meal. </p>

								<p class="caption mt-auto pt-2 px-3" style="color:   #faf9f9;  font-size: 18px; text-align: end; font-weight: 600;">
									₱140
								</p>
							</td>
						</tr>
					</table>
				</div>
			</div>

		<div class="col-xl-4 col-lg-4 col-md-4 col-sm-0 col-xs-0 d-flex align-items-center text-left" style="background-color: #e2e0e0">
			<div class="row">
				<table border="0" cellpadding="51" cellspacing="0" align="center">
					<tr>
						<td >
							<p class="subtitle" style="color:#1c1c1c
							; font-size: 18px;"><br>TONKATSU x HUNGARIAN</p>
								<p class="caption" style="color: #1c1c1c
								;font-size: 15px;">Hungarian can also be coupled with tonkatsu for a more diverse taste experience on one plate, but don't forget about the fried rice and sunny side up egg combo.
							</p>

							<p class="caption mt-auto pt-2 px-3" style="color:   #1c1c1c;  font-size: 18px; text-align: end; font-weight: 600;">
								₱165
							</p>
						</td>
					</tr>
				</table>
			</div>
		</div>

		<div class="col-xl-4 col-lg-4 col-md-4 col-sm-0 col-xs-0 d-flex align-items-center text-center" style="background-image: url(img/section5food1.png); height: 55vh;">
			<div class="row">
				<table border="0" cellpadding="51" cellspacing="0" align="center">
					<tr>
						<td>
							<!-- <img src="img/twice3.jpg" class="img-fluid mx-auto d-block" style="width: 100%;"> -->
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>
</div>
	



<div class="container-fluid xl mw-100 no-padding pb-5 px-5" style="background-color: #faf9f9">
	<div class="row justify-content-center align-items-center pb-5">
		<div class="row px-5">
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-0 col-xs-0 d-flex align-items-center text-center"style="background-color: #e2e0e0;">
				<div class="row">
					<table border="0" cellpadding="51" cellspacing="0" align="left">
						<tr>
							<td>
								<p class="title" style="color:#1c1c1c
								; font-size: 66px;"><b>Dobol <font color="#615f5f">Trobol</font></b>
							</td>
						</tr>
					</table>
				</div>
			</div>

		<div class="col-xl-4 col-lg-4 col-md-4 col-sm-0 col-xs-0 d-flex align-items-center text-center" style="background-image: url(img/section5food2.png); height: 55vh;">
			<div class="row">
				<table border="0" cellpadding="51" cellspacing="0" align="center">
					<tr>
						<td>
							<p class="text-black"><br></p>
							<p class="text-black"></p>
						</td>
					</tr>
				</table>
			</div>
		</div>

		<div class="col-xl-4 col-lg-4 col-md-4 col-sm-0 col-xs-0 d-flex align-items-center text-left" style="background-image: url(img/test.png);">
			<div class="row">
				<table border="0" cellpadding="51" cellspacing="0" align="center">
					<tr>
						<td>
							<p class="subtitle" style="color:#faf9f9; font-size: 18px;"><br>CRÉMA DE LECHE</p>
								<p class="caption" style="color: #faf9f9;font-size: 15px;">Another dessert that will make even the sweetest person shy once they have our CRÉMA DE LECHE, which is sweet but also has the capacity to make you finish it all the way to the last drop.
							</p>

							<p class="caption mt-auto pt-2 px-3" style="color:   #faf9f9;  font-size: 18px; text-align: end; font-weight: 600;">
								₱80
							</p>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>
</div>


<div class="container-fluid xl mw-100 no-padding" style="background-color:  #615f5f">
	<div class="row pb-5 py-5 text-white">
		<div class="col-xl-0 col-lg-0 col-md-0 col-sm-0 col-xs-0">
			
	 <table border="" width="80%" cellpadding="50" cellspacing="0" align="center" style="border: 2px solid #F9AF41;">
		<tr>
		  <td>
			  <br>
			<p class="d-flex align-items-center text-center caption" style="color: #faf9f9; font-size: 15px;">
				Different combinations of food that work well together are a great experience for you to try, which is why we are here to present you with the experience and to partner it with a variety of appetizer and dessert options to complete your one-seat meal.
			</p>
		</div>
		  </td>
		</tr>
	  </table>
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
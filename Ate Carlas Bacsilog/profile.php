<?php
      include("conn.php");
      $error_email ='';
      $error_Fname_length ='';
      $error_Lname_length ='';
      $error_Fname_num ='';
      $error_Lname_num ='';
      if(isset($_POST['save']))
{


              $u_Username = $_POST['u_Username'];
              $fname = $_POST['fname'];
              $lname = $_POST['lname'];
              $email = $_POST['email'];
              $phoneno = $_POST['num'];
              $address = $_POST['address'];

              $Lname = preg_match('@[0-9]@', $lname);
              $Fname = preg_match('@[0-9]@', $fname);


    $str="SELECT Email from custinfo WHERE Email='$email'";
        $results=mysqli_query($conn,$str);

  
    if((mysqli_num_rows($results))>0) 
    {
              $error_email =  '<label class="text-danger">Email is already registered!! Failed to update profile</label>';
                
    }
    else if(strlen($fname)<2)
    {
     $error_Fname_length = '<label class="text-danger">First Name must be at least 2 characters in length. Failed to update profile</label>';
    }
    else if(strlen($lname)<2)
    {
     $error_Lname_length = '<label class="text-danger">Last Name must be at least 2 characters in length. Failed to update profile</label>';
   }
    elseif($Fname)
    {
       $error_Fname_num = '<label class="text-danger">First Name must not contain any number</label>';
    }
    elseif($Lname)
    {
       $error_Lname_num = '<label class="text-danger">Last Name must not contain any number</label>';
    }
    else
    {

      $query = "UPDATE custinfo SET First_Name='$fname', Last_Name='$lname', Email='$email', PhoneNum='$phoneno' , Address='$address' 
      WHERE Username='$u_Username'";
      $query_run = mysqli_query($conn, $query);

      if ($query_run) 
      {
          echo "<center><h3><script>alert('Profile Updated!');</script></h3></center>";
        header('refresh:0;url=profile.php?q=1');
      }
      else
      {
        echo "<center><h3><script>alert('Profile not Updated!');</script></h3></center>";
        header('refresh:0;url=profile.php?q=1');
      }

      
    }

}
?>
<?php
include("conn.php");
      
      if(isset($_POST['received']))
{
    include("conn.php");


              $status = "Received";
              $OID = $_POST['orderid'];

    $query = "UPDATE orders SET status='$status' WHERE OrderID='$OID'";  
    $query_run = mysqli_query($conn, $query);

}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ate Carla's Bacsilog | Profile</title>
	<link rel="icon" href="img/logo.png" type="image/x-icon">
	<link rel="stylesheet" href="checkout-design.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <script type="text/javascript" src="js/bootstrap.bundle.js"></script>
   <style type="text/css">

    table {
      table-collapse:  collapse;

    }
  .box {
    position: relative;
    text-align: center;
    color: white;
  }

  .centered {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
  }

    label {
      font-weight: 600;
      color: #1c1c1c;
      margin-top: 8px;
      line-height: 2;
    }

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

  hr{
  	border-top: 6px double ;
  	color: #AF1D27;
  	width: 70%;
  	margin-left: auto;
  	margin-right: auto;
  }

  .top1{
    width: 63%;
    margin-left: auto;
    margin-right: auto;
    font-size: 12px;
    color: #AF1D27;
  }

  .top{
  	width: 45%;
  	margin-left: auto;
  	margin-right: auto;
  	font-size: 15px;
  }

  .info{
    text-align: center;
  	color: #000000;
  	font-size: 18px;
  	width: 30%;
  	margin-left: 70%;
  	margin-right: 22%;
  }

  .info1{
    text-align: center;
    color: #000000;
    font-size: 18px;
    width: 12%;
    margin-left: 10%;
    margin-right: 90%;
  }

  .a:hover {
    color: #EA5252;
    background-color: transparent;
    text-decoration: none;
  }
  .a3:hover {
    color: #EA5252;
    background-color: transparent;
    text-decoration: none;
  }
  .a3:link {
    color: black;
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
      text-align: justify;
      font-size: 80%;
      overflow-x: hidden;
    }

    input[type=submit],  input[type=button] {
          background-color: #AF1D27;
          border: none;
          color: #fff;
          padding: 15px 30px;
          text-decoration: none;
          margin: 4px 2px;
          cursor: pointer;
          font-size: 14px;
          width: 48%;
          font-weight: 500;
          box-shadow: box-shadow: 0 0 6px #1c1c1c;

      }

    input[type=text], input[type=password], select, input[type=date] {
      border: 1px solid #AF1D27;
      padding: 15px;
      border-radius: 50px;
      width: 100%;
       background-color: #faf9f9;
    }

    .input2[type=text], .input2[type=password], select, .input2[type=date], .input2[type=email], .input2[type=tel], .input2[type=number]   {
      border: 1px solid #AF1D27;
      padding: 8px;
      border-radius: 2vh;
      width: 100%;
      background-color:  #f9f9f9;
    }

    input:focus {
        outline: none;
        border-color: #AF1D27;
        box-shadow: 0 0 6px #AF1D27;
      }


    .input2:focus {
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
<form name="" action="" method="">
<nav class="navbar navbar-expand-md" style="background-color: #1c1c1c; height: 68px;" >
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <form method="POST"> 
          <a href="index.php" class="a content" onclick="return confirm('Are you sure want to logout?');" style="line-height: 50px; padding-left: 50px; background-color: #1c1c1c;"><i class="fa-solid fa-right-from-bracket"></i>&ensp;Logout </a>    
          <a href="profile.php" class="a content text-white" style="line-height: 50px;">&ensp;<i class="fa fa-user" aria-hidden="true"></i>&ensp;Profile </a> 
           </form>

        </li>
<!--         <li class="nav-item">
          <a class="nav-link" href="checkout.php"><i class="fas fa-money-check-alt mr-2"></i>Checkout</a>
        </li> -->
       <!--  <li class="nav-item" style="margin-left: 1070px;">
          <button type="submit" name="submit" style="margin-top: 5px; border: 0px solid;"><a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"  style='color: #615f5f'></i> <span id="cart-item" class="badge badge-danger"></span></a></button>
        </li> -->
      </ul>
    </div>
  </nav>
  <!-- Navbar end -->
	  
<nav class="navbar navbar-expand-md navbar-dark p-2 sticky-top" style="background-color:  #AF1D27; box-shadow: rgba(28, 28, 28, 0.45) 0px 25px 20px -20px;">
	<div class="container-fluid px-5 ps-5">

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

<!-- Login Start -->
<form method = "post" action = "<?php $_PHP_SELF ?>">
  <? $u_Username=$_COOKIE['name'];?>
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
          <h3 style="color: #AF1D27; font-weight: bold;margin-left: 50px;" class="title">Personal Information</h3> 
          <!--<h5 style="color: #1c1c1c; font-size: 17.5px;" class="title">Login to your account.</h5>-->
          <div class="row justify-content-center">  
            <div class="col-sm-5 form-group">
                <label for="name-f">First Name</label>
                <input type="text" class="form-control input2" name="fname" id="name-f" placeholder="Enter your first name *" required>
                <input type="hidden" class="form-control input2" name="u_Username" id="name-f" placeholder="Enter your first name *" required <?php echo "value='".$_COOKIE['name']."'"; ?>>
            </div>
            <div class="col-sm-5 justify-content-center form-group">
                <label for="name-l">Last Name</label>
                <input type="text" class="form-control input2" name="lname" id="name-l" placeholder="Enter your last name *" required>
            </div>
            <div class="col-sm-5 form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control input2" name="email" id="email" placeholder="Enter your email address *" required>
            </div>

            <div class="col-sm-5 form-group">
                <label for="phone">Phone Number</label>
                <input type="tel" class="form-control input2" name="num" id="address" placeholder="Enter your number [1234-567-8901] *" required pattern="[0-9]{4}-[0-9]{3}-[0-9]{4}">
           </div>
          </div>
        <br>
          <!--<h5 style="color: #1c1c1c; font-size: 17.5px;" class="title">Login to your account.</h5>-->
          <div class="row justify-content-center">  
                    <div class="col-sm-10 form-group">
                          <label for="name-f">Address</label>
                          <input type="text" class="form-control input2" name="address" id="address" placeholder="Locality/House/Street no. *" required>
                      </div>
                     
          </div>
        <br>
        <center><input type="submit" name="save" value="SAVE" style=" background-color: #1c1c1c; box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 6px -1px, rgba(0, 0, 0, 0.06) 0px 2px 4px -1px; width: 20%; height: 50px; border-radius: 50px; font-weight: 500;" class="btn btn-outline-dark2 text-white title"></center>
        </table>
        </div>
      </div>
    </div>
  </form>
<!-- Login End -->

<!-- Start of Profile -->
<div class="text-center">
<br><br><br>
<h2 class="title" style="color: #000000; text-align: center;"><strong>My Account</strong></h2>
</div>
<br>
<h5 class="title" style="color: #000000; text-align: center;"><?php echo $error_email ; ?></h5>
<h5 class="title" style="color: #000000; text-align: center;"><?php echo $error_Fname_length ; ?></h5>
<h5 class="title" style="color: #000000; text-align: center;"><?php echo $error_Lname_length ; ?></h5>
<h5 class="title" style="color: #000000; text-align: center;"><?php echo $error_Fname_num ; ?></h5>
<h5 class="title" style="color: #000000; text-align: center;"><?php echo $error_Lname_num ; ?></h5>
<div class="col-xl-lg-8 col-lg-8 col-md-8 col-sm-8 col-xs-8 d-flex align-items-center justify-content-center pe-2 pt-1">
<h3 class="title info">Profile</h3>
<a class="a3 info a content" onclick="on()" style="text-decoration: none; cursor: pointer;">Edit&nbsp;Profile</a>

</div>
<hr>
<!-- Personal Information -->
<?php
$userid=$_COOKIE['name'];
$q=mysqli_query($conn,"SELECT * FROM custinfo WHERE Username='$userid'" )or die('Error223');
if(mysqli_num_rows($q) > 0)
while($row=mysqli_fetch_array($q) )
                    {
                      ?>
<div class="top1">
  <h4>Account Information</h4>
</div><br>
<div class="top">
  <h5 class="title" style="font-size: 18px">Full Name</h5>
</div>
<div class="top text-secondary">
  <?php echo $row["First_Name"]; ?> <?php echo $row["Last_Name"]; ?>
</div>
<br>
<div class="top">
  <h5 class="title" style="font-size: 18px">Email</h5>
</div>
<div class="top text-secondary">
  <?php echo $row["Email"]; ?>
</div>
<br>
<div class="top">
  <h5 class="title" style="font-size: 18px">Contact Number</h5>
</div>
<div class="top text-secondary">
  <?php echo $row["PhoneNum"]; ?>
</div>
<br>
<div class="top">
	<h5 class="title" style="font-size: 18px">Address</h5>
</div>
<div class="top text-secondary">
	<?php echo $row["Address"]; ?>
</div>
<!-- <br>
<div class="top">
	<h5 class="title">Province</h5>
</div>
<div class="top text-secondary">
	Province
</div>
<br>
<div class="top">
	<h5 class="title">City</h5>
</div>
<div class="top text-secondary">
	City
</div>
<br>
<div class="top">
	<h5 class="title">Barangay</h5>
</div>
<div class="top text-secondary">
	Barangay
</div> -->
<br>

<?php
  }
                                        
?>
<?php
include('conn.php');

$userid=$_COOKIE['name'];

$q=mysqli_query($conn,"SELECT * FROM orders WHERE Username='$userid'" )or die('Error223');
echo  '<div>

            <table border="0" width="60%" cellpadding="10" cellspacing="0" align="center">
             <tr style="color:#3C848C; background-color:#A2D1D7; font-weight: 600; font-family: "Montserrat", sans-serif;" height=60; table-layout: fixed">
                <tr style="background-color: #AF1D27; color: white; font-weight: 500; text-align: center; font-size: 20px">
                <td colspan=4>PURCHASE HISTORY</td></tr>

               
                <td style="color:#615f5f; background-color:#f5e4e5; font-weight: 700; font-family: "Montserrat", sans-serif;" height=60; table-layout: fixed"><center><i class="fa-solid fa-calendar-day"></i>&ensp;DATE OF ORDER</center></td>
                <td style="color:#615f5f; background-color:#f5e4e5; font-weight: 700; font-family: "Montserrat", sans-serif;" height=60; table-layout: fixed"><center><i class="fa-solid fa-location-crosshairs"></i>&ensp;ACTION</center></td>
                
              

             </tr>';
                    while($row=mysqli_fetch_array($q) )
                    {
                        $orderid=$row['OrderID'];
                        $Name=$row['products'];
                        $Age=$row['DelDate'];
                        $Order=$row['amount_paid'];
                        

                 
                        echo '<tr style="background-color:#F7F6FB ; color: #252422; box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px; font-family: Readiness;">
                        <td><center>'.$Age.'</center></td>';
                        
                        echo "<td><center><a href='received.php?OrderID=".$row["OrderID"]."'>View My Order</a></center></td>";
                    }
                    

                    echo '</table>

                     
                    </div></div>';

?><br>

<center><a href="test2.php"><input type="submit" name="orderagain" value="ORDER AGAIN" style="width: 24%; background-color:  #F9AF41; color: #1c1c1c; font-weight: bold"></a></center>

<br><br>
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
            <a href="About-Us.html">About Us</a>
          </p>
          <p>
            <a href="services and products.html">Products</a>
          </p>
          <p>
            <a href="Personnel.html">Our Team</a>
          </p>
          <p>
            <a href="contact.html">Contact Us</a>
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
            <a href="homepage.html">Home</a>
          </p>
          <p>
            <a href="FAQs.html">Support</a>
          </p>
          <p>
            <a href="FAQs.html">FAQ</a>
          </p>
        </div>

        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-3 col-xs-3  caption  py-3" style="text-align: left; font-size: 14px;">
          <!-- Links -->
          <h6 class=" subtitle text-uppercase" style="color:  #faf9f9; font-size: 14px; text-align: left;">
            NEWS
          </h6>
          <p>
            <a href="News.html">Events & Promos</a>
          </p>
          <p>
            <a href="Customer-Reviews.html">Reviews</a>
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

            <a class="social-icon" data-tooltip="Twitter" href="https://twitter.com/">
              <i class="fa fa-twitter" aria-hidden="true"></i>
            </a>
          
            <a class="social-icon" data-tooltip="Facebook" href="https://www.facebook.com/atecarlasbacsilog/">
              <i class="fa fa-facebook" aria-hidden="true"></i>
            </a>

            <a class="social-icon" data-tooltip="Instagram" href="https://www.instagram.com/atecarlas_bacsi/?hl=en">
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
    <a class="pull-left subtitle pt-2" style="text-decoration: none; font-size: 14px;" href="homepage.html"> HOME </a>
    <a class=" fw-bold pull-left subtitle pt-2" style="text-decoration: none;font-size: 14px;" href="FAQs.html"> FAQ </a>
    <a class=" fw-bold pull-left subtitle pt-2" style="text-decoration: none;font-size: 14px;" href="contact.html"> CONTACT US </a>
    <br><br>
  </div>
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

</script>
</body>
</html>
<?php  
include 'regformphpcode.php';

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ate Carla's Bacsilog | Register</title>
  <link rel="icon" href="img/logo.png" type="image/x-icon">
  <link rel="stylesheet" href="index-splash-design.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <script type="text/javascript" src="js/bootstrap.bundle.js"></script>
   <style type="text/css">

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
<form name="login" method = "post" action = "<?php $_PHP_SELF ?>">
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


<!-- Start of Registration Form -->
<form name="reg" method = "post" action = "<?php $_PHP_SELF ?>">
<form name="regform" method = "post" action = "<?php $_PHP_SELF ?>">

<div class="container-fluid xl mw-100 no-padding" style="background-color: white">
  <div class="row px-5 pb-4">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-0 col-xs-0 align-items-center py-5">
          <h2 class="title" style=" color: #1c1c1c; font-weight: bolder; letter-spacing: normal; text-align: center;">CREATE AN ACCOUNT</h2><br>
          <table border="1" width="90%" cellpadding="30" cellspacing="0" align="center" style="border: 2px solid #F9AF41;">
            <tr>
              <td width="35%">
                <div class="box">
                  <img src="img/regbg.png" width="95%">   
                    <div class="centered">
                     <h1 class="title" style=" color:  #1c1c1c; font-size: 28px; font-weight: bolder; letter-spacing: normal;"><br>We like to know you <font color="#F9AF41">more!</font></h1>
                      <p class="caption" style="color: #1c1c1c; font-size: 12px;">By registering, you agree to give your full personal and contact information. The data you enter will be collected and processed for specified, explicit and legitimate purposes. If you wish to proceed registering, please fill all the required fields. </p>
                  </div>
                </div>
              </td>

              <td>
              <div class="container">
                  <div class="row jumbotron" style="margin-top: -250px">
                      <h2 class="title" style="color: #AF1D27; font-size: 17px;">Personal Information</h2>
                      <hr>

                       <div class="col-sm-6 form-group">
                          <label for="name-f">First Name</label>
                          <input type="text" class="form-control input2" name="u_Fname" id="name-f" placeholder="Enter your first name *" required 
                          value="<?php if(isset($_POST['u_Fname'])){echo $_POST['u_Fname'];} ?>">
                          <?php echo $error_Fname_length; ?> <?php echo $error_Fname_num; ?>
                      </div>
                      <div class="col-sm-6 form-group">
                          <label for="name-l">Last Name</label>
                          <input type="text" class="form-control input2" name="u_Lname" id="name-l" placeholder="Enter your last name *" required
                          value="<?php if(isset($_POST['u_Lname'])){echo $_POST['u_Lname'];} ?>">
                          <?php echo $error_Lname_length; ?> <?php echo $error_Lname_num; ?>
                      </div>
                      <div class="col-sm-6 form-group">
                          <label for="sex">Gender</label>
                          <select id="Gender" name="Gender">
                            <option value="none" selected disabled hidden>Select Gender</option>
                          <option value="Male" <?php if(isset($_POST['Gender']) && $_POST['Gender'] == "Male") echo 'selected="selected"';?>>Male</option>
                          <option value="Female" <?php if(isset($_POST['Gender']) && $_POST['Gender'] == "Female") echo 'selected="selected"';?>>Female</option>
                      </select>
                      </div>
                      <div class="col-sm-4 form-group">
                          <label for="Date">Date Of Birth</label>
                           <input name = "u_Birthday" type = "text" 
                            id = "date" required placeholder="Birthdate *" onfocus="(this.type='date')" class="input2" onblur="getAge();" max="2004-06-30" min="1923-01-01" value="<?php if(isset($_POST['u_Birthday'])){echo $_POST['u_Birthday'];} ?>">
                      </div>
                      <div class="col-sm-2 form-group">
                          <label for="age">Age</label>
                          <input type="number" class="form-control  input2" name="u_Age" id="u_Age"  maxlength="2" placeholder="Age *" required readonly
                          value="<?php if(isset($_POST['u_Age'])){echo $_POST['u_Age'];} ?>">
                          <br><br>
                      </div>


                      <h2 class="title" style="color: #AF1D27; font-size: 17px;">Contact Details</h2>
                      <hr>
                       <div class="col-sm-6 form-group">
                          <label for="address-1">Home Address</label>
                          <input type="text" class="form-control input2" name="u_Address" id="address" placeholder="Locality/House/Street no. *" required
                          value="<?php if(isset($_POST['u_Address'])){echo $_POST['u_Address'];} ?>">
                      </div>
                      <div class="col-sm-6 form-group">
                          <label for="phone">Phone Number</label>
                          <input type="tel" class="form-control input2" name="u_Phonenum" id="phonenum" placeholder="Enter your number [1234-567-8901]" required pattern="[0-9]{4}-[0-9]{3}-[0-9]{4}"
                          value="<?php if(isset($_POST['u_Phonenum'])){echo $_POST['u_Phonenum'];} ?>">
                      </div>
                      <div class="col-sm-9 form-group">
                          <label for="email">Email</label>
                          <input type="email" class="form-control input2" name="u_Email" id="email" placeholder="Enter your email address *" required
                          value="<?php if(isset($_POST['u_Email'])){echo $_POST['u_Email'];} ?>">
                      </div>
                      <div class="col-sm-3 form-group">
                          <label for=""></label>
                          <input type="submit" class="form-control input2 text-white" name="verify" id="verify" value="Verify" style="width: 100%; padding: 12px; box-shadow: none; background-color: #1c1c1c;">
                      </div>
                      <div class="col-sm-3 form-group">
                          <label for="code">Enter Code</label>
                          <input type="text" class="form-control input2" name="u_Code" id="code" placeholder="Enter code" style="text-align: center" value="<?php if(isset($_POST['u_Code'])){echo $_POST['u_Code'];} ?>">
                          <?php echo $error_otp; ?>
                          <br><br>
                      </div>
                    </form>
                     

                      <h2 class="title" style="color: #AF1D27; font-size: 17px;">Other Details</h2>
                      <hr>

                      <div class="col-sm-12 form-group">
                          <label for="tel">Username</label>
                          <input type="tel" name="u_Username" class="form-control input2" id="tel" placeholder="Enter a username (This will be your login username) *" value="<?php if(isset($_POST['u_Username'])){echo $_POST['u_Username'];} ?>">
                          <?php echo $error_username_length ; ?>  <?php echo $error_username; ?>
                      </div>
                      <div class="col-sm-6 form-group">
                        <div class="input-icons">
                          <label for="pass">Password</label>
                          <input type="password" name="u_Password" class="input2" id="password-field" placeholder="Enter your password *">
                           <i  id="pass-status" class="fa fa-eye" style="cursor: pointer; color: #1c1c1c; margin-top: 13px " onClick="viewPassword()" aria-hidden="true"></i> <?php echo $error_pass; ?>  <?php echo $error_password; ?>
                        </div>
                      </div>
                      <div class="col-sm-6 form-group">
                        <div class="input-icons">
                          <label for="pass2">Confirm Password</label>
                          <input type="password" name="cnfpassword" class="input2" id="password-field" placeholder="Re-enter your password *">
                          <?php echo $error_cfpass; ?>
                        </div>
                      </div>

                      <div class="col-sm-12 form-group mb-0">
                        <br>
                        <input class="title" type="submit" name="submit" value="CREATE ACCOUNT" style="box-shadow: none">
                        <a href="index.php"><input class="title" type="button" value="CANCEL" style="background-color: transparent; border: 1px solid #1c1c1c; color: #1c1c1c;"></a>
                      </div>
                      
                  </div>
                  </form>
                </div>
              </td>
            </tr>
          </table>
        </div>
    </div>
</div>
<!-- End of Registration Form -->

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

  function viewPassword()
{
  var passwordInput = document.getElementById('password-field');
  var passStatus = document.getElementById('pass-status');
 
  if (passwordInput.type == 'password'){
    passwordInput.type='text';
    passStatus.className='fa fa-eye-slash';
    
  }
  else{
    passwordInput.type='password';
    passStatus.className='fa fa-eye';
  }
}

  function getAge(){
    var u_Birthday = document.getElementById('date').value;
    u_Birthday = new Date(u_Birthday);
    var today = new Date();
    var u_Age = Math.floor((today-u_Birthday) / (365.25 * 24 * 60 * 60 * 1000));
    document.getElementById('u_Age').value=u_Age;
}
</script>
</form>
</body>
</html>
<?php
if (isset($_POST['login'])){
  $_SESSION['u_Username']=$_POST['u_Username'];
  setcookie("name", "$u_Username", time()+3600, "/","", 0);

}
?>

<?php
if (isset($_POST['login'])){
  $u_Username= $_POST['u_Username'];
  setcookie("name", "$u_Username", time()+3600, "/","", 0);

}
?>
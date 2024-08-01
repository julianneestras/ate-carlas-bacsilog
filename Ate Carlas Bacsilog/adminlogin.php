
<?php  
session_start();
ob_start();

   //include 'adminloginOOP.php'; 
    include 'adminloginvalidation.php';
    
   /*$LoginForm = new LoginForm();   


   if(isset($_POST['login']))
   {


      $Login = $LoginForm->Login($_POST['A_Username'],$_POST['A_Password']);  
      if($Login)
      { 
       echo "<center><h3><script>alert('Welcome! You have successfully logged in.');</script></h3></center>";
      header("refresh:0;url=admindashboard.php"); 
      }
      else
      {  

      }  
   }*/  
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Ate Carla's Bacsilog | Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="img/logo.png" type="image/x-icon">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="index-splash-design.css">
    <script type="text/javascript" src="js/bootstrap.bundle.js"></script>
    <style type="text/css">
      @import url('http://fonts.cdnfonts.com/css/amiko');
      @import url('http://fonts.cdnfonts.com/css/poppins');
      @import url('http://fonts.cdnfonts.com/css/readiness');
      @import url('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');

      body {
        overflow-x: hidden;

      }

      @import url(https://fonts.googleapis.com/css?family=Roboto:300);

      .icon {
    padding: 13.5px;
    background:  #1c1c1c;
    color: white;
    min-width: 50px;
    text-align: center;
}

.input-field {
  width: 100%;
  padding: 10px;
  outline: none;
}

    .input-icons i {
      position: absolute;
      margin-left: 0px;
    }

.login-page {
  width: 550px;
  padding: 4% 0 0;
  margin: auto;
}
.form {
  position: relative;
  z-index: 1;
  background: #FFFFFF;
  max-width: 550px;
  margin: 0 auto 35px;
  padding: 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.form input {
  font-family: "Readiness", sans-serif;
  outline: 1px solid lightgray;
  background: #f2f2f2;
  width: 80%;
  border: 0;
  margin: 0 0 15px;
  padding: 11px;
  box-sizing: border-box;
  font-size: 14px;
}
    .btn-outline-dark2:hover{
    color:   white !important;
    background-color:  #7d221d !important;
    border-color:  transparent !important; 
  }

.form .message {
  margin: 15px 0 0;
  color: #b3b3b3;
  font-size: 12px;
}
.form .message a {
  color: #4CAF50;
  text-decoration: none;
}

footer {
  background-color: #1c1c1c;
  padding: 30px;
  text-align: center;
  color: white;
}


.error {
  background-color: #F2DEDE;
  color: #A94442;
  padding: 10px;
  width: 95%;
  border-radius: 5px;
}
    </style>
</head>
<body>
<form action="<?php $_PHP_SELF ?>" method="POST">
<nav class="navbar navbar-expand-sm navbar-light px-5" style="height: 70px; background-color:  #AF1D27;
box-shadow: rgba(28, 28, 28, 0.45) 0px 25px 20px -20px;">
    <div class="container-fluid">

      <a href="index.php"><img src="img/logo.png" height="46" class="ps-5"></a>
    <a class="navbar-brand subtitle ps-2" href="#" style="color: #ffffff;">

      <div class="title" style="font-size: 11.5px;">
        ATE CARLA'S
      </div>
      <b>BACSILOG</b>
    </a>
    <a class="navbar-brand" style="font-weight: bolder; color: whitesmoke;margin-left: 10px; border: 2px solid white; padding: 10px; border-radius: 5vh; font-size: 14px;">ADMIN</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
      <ul class="navbar-nav ">
      <li class="nav-item">
        <a class="nav-link active content" aria-current="page" href="index.php" style="color:#faf9f9; font-size: 14px; "><img src="img/visit.png" height="16" width="16"> Visit Website</a>
      </li>    
      </ul>     
    </div>
    </div>
  </nav>

 <div class="container-fluid xl mw-100 no-padding" style="background-image: url(img/aloginbg1.png);">
  <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-0 col-xs-0 d-flex align-items-center">
        <table border="1" width="90%" cellpadding="30" cellspacing="0" align="center" style="border: 0px solid  #faf9f9;">
          <tr>
            <td>
              <div class="login-page">
                <div class="form">
                  <img src="img/door-key.png" height="100" width="100"><br><br>
                    <h2 style="color: #AF1D27; font-weight: bold;" class="title">Admin Login</h2> 
                    <h5 style="color: #1c1c1c; font-size: 17.5px;" class="title">Login to your account.</h5> <br>
                      <form class="login-form" action="" method="">
                      <div class="input-container">
                      <!--   <p class="error"> o $login_error; ?></p> -->
                        <i class="fa fa-envelope icon"></i>
                        <input class="input-field content text-black" type="text" placeholder="Username" name="A_Username">
                      </div>

                      <div class="input-container">
                          <i class="fa fa-key icon"></i>
                          <input class="input-field content text-black" type="password" placeholder="Password" name="A_Password" id="id_password">
                        <div class="input-icons">
                           <i class="far fa-eye icon" id="togglePassword" style="cursor: pointer; color: #1c1c1c; background: transparent; margin-top: -60px; margin-left: 160px;"></i>
                          </div>
                      </div>
                     <a href="admindashboard.php#dashboard"><input type="submit" name="login" value="LOG IN" style=" background-color: #902923; box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 6px -1px, rgba(0, 0, 0, 0.06) 0px 2px 4px -1px; width: 240px; height: 50px; font-weight: bold;" class="btn btn-outline-dark2 text-white title"></a>
                  </form>
                </div>
              </div>
            </td>
          </tr>
        </table>
      </div>
  </div>
</div>
    <footer>
      <p><hr></p>
    </footer>
    <script type="text/javascript">
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
  $_SESSION['A_Username']=$_POST['A_Username'];



}
?>

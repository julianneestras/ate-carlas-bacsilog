<?php

session_start();
include 'conn.php';
if (isset($_POST['submit'])) {
  $Province = $_POST['Province'];
    $City = $_POST['City'];
    $Barangay = $_POST['Barangay'];

    $u_Username = $_POST['u_Username'];
    $_SESSION['u_Username']=$_POST['u_Username'];
   header("location: cart.php");
//header("refresh:0;url=cart.php");
}

    
      
        



?>
<?php
if (isset($_POST['submit'])){
  $u_Username= $_POST['u_Username'];
  $Province = $_POST['Province'];
    $City = $_POST['City'];
    $Barangay = $_POST['Barangay'];

  setcookie("Province", "$Province", time()+3600, "/","", 0);
  setcookie("City", "$City", time()+3600, "/","", 0);
  setcookie("Barangay", "$Barangay", time()+3600, "/","", 0);

}
?>

<?php
    $qtyvalidation = isset($_POST['qty']) ? $_POST['qty'] : '';

    if($qtyvalidation == 0) {

        $qtyerror = 'Quantity cannot be 0.';

    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Order Food Favorites</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
</head>

<body>
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
      border: 2px solid #AF1D27;
      padding: 15px;
      border-radius: 50px;
      width: 100%;
    }

    input:focus {
        outline: none;
        border-color: #AF1D27;
        box-shadow: 0 0 6px #AF1D27;
      }
/* check to see if we deliver in your area part */      
  .btn-outline-dark2:hover{
    color:   white !important;
    background-color:  #0d0c0c !important;
    border-color:  transparent !important; 
  }
  .rounded {
    border-radius: 2rem!important;
  }
  .border{
    border: 2.5px solid #ffc107!important;
    box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 5px 10px;
  }

  select {
  position: relative;
  display: flex;
  justify-content: center;
  align-items: center;
  width: 15em;
  height: 3em;
  border-radius: 25px;
  overflow: hidden;
  background-color: #faf9f9;
  box-shadow: rgba(0, 0, 0, 0.18) 0px 5px 10px;
  border: 1.5px solid #ffc107!important;
  cursor: pointer;
  border: none;
  outline: none;
  font-family: EndzoneSlab Normal, arial;
  font-size: 16px;
  line-height: 24px;
  padding-left: 10px;
  letter-spacing: 1px;
  font-weight: bold;
  background-image: url("data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20256%20448%22%20enable-background%3D%22new%200%200%20256%20448%22%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E.arrow%7Bfill%3A%23424242%3B%7D%3C%2Fstyle%3E%3Cpath%20class%3D%22arrow%22%20d%3D%22M255.9%20168c0-4.2-1.6-7.9-4.8-11.2-3.2-3.2-6.9-4.8-11.2-4.8H16c-4.2%200-7.9%201.6-11.2%204.8S0%20163.8%200%20168c0%204.4%201.6%208.2%204.8%2011.4l112%20112c3.1%203.1%206.8%204.6%2011.2%204.6%204.4%200%208.2-1.5%2011.4-4.6l112-112c3-3.2%204.5-7%204.5-11.4z%22%2F%3E%3C%2Fsvg%3E%0A");
  background-position: right 10px center;
  background-repeat: no-repeat;
  background-size: auto 50%;
  // disable default appearance
  outline: none;
  -moz-appearance: none;
  -webkit-appearance: none;
  appearance: none;
}
.select::-ms-expand{
  display: none;
}
.select_barangay {
  position: relative;
  display: flex;
  justify-content: center;
  align-items: center;
  width: 20em;
  height: 3em;
  border-radius: 25px;
  overflow: hidden;
  background-color: #faf9f9;
  box-shadow: rgba(0, 0, 0, 0.18) 0px 5px 10px;
  border: 1.5px solid #ffc107!important;
  cursor: pointer;
  border: none;
  outline: none;
  font-family: EndzoneSlab Normal, arial;
  font-size: 16px;
  line-height: 24px;
  padding-left: 10px;
  letter-spacing: 1px;
  font-weight: bold;
  background-image: url("data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20256%20448%22%20enable-background%3D%22new%200%200%20256%20448%22%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E.arrow%7Bfill%3A%23424242%3B%7D%3C%2Fstyle%3E%3Cpath%20class%3D%22arrow%22%20d%3D%22M255.9%20168c0-4.2-1.6-7.9-4.8-11.2-3.2-3.2-6.9-4.8-11.2-4.8H16c-4.2%200-7.9%201.6-11.2%204.8S0%20163.8%200%20168c0%204.4%201.6%208.2%204.8%2011.4l112%20112c3.1%203.1%206.8%204.6%2011.2%204.6%204.4%200%208.2-1.5%2011.4-4.6l112-112c3-3.2%204.5-7%204.5-11.4z%22%2F%3E%3C%2Fsvg%3E%0A");
  background-position: right 10px center;
  background-repeat: no-repeat;
  background-size: auto 50%;
  // disable default appearance
  outline: none;
  -moz-appearance: none;
  -webkit-appearance: none;
  appearance: none;
}
.select_barangay::-ms-expand{
  display: none;
}
/* End of check to see if we deliver in your area part */

  .parent {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    grid-template-rows: repeat(2, 1fr);
    grid-column-gap: 0px;
    grid-row-gap: 0px;

    }
    .div1 { 
      grid-area: 1 / 1 / 3 / 5; 
      margin-right: 30px;
      margin-top: 10px;
      padding: 20PX;
      box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
      }
  .div2 { 
      grid-area: 1 / 3 / 2 / 4; ; 
      margin-left: 20px;
      margin-top: 10px;
    }
  /* NAVIGATION FOR FOOD CATEGORY */
  .nav .nav-item .nav-link{
    color:  black;
    font-family: 'Poppins', sans-serif;
    font-size: 16px;
    font-weight: 500;
  }
  .nav-pills .nav-link.active, .nav-pills .show >.nav-link{
    background-color: #F9AF41;
    border-radius: 2rem!important;
    font-family: 'Poppins', sans-serif;
    font-weight: 700;
  }
  table {
      border: transparent;
      border-collapse:collapse;
      padding:32px;
  }
  table td {
      text-align:center;
      padding:3px;
      background: #ffffff;
      color: #313030;
      border: transparent;
  }

  .button-add2cart {
    appearance: none;
    backface-visibility: hidden;
    background-color: #27ae60;
    border-radius: 8px;
    border-style: none;
    box-shadow: rgba(39, 174, 96, .15) 0 4px 9px;
    box-sizing: border-box;
    color: #fff;
    cursor: pointer;
    display: inline-block;
    font-family: Inter,-apple-system,system-ui,"Segoe UI",Helvetica,Arial,sans-serif;
    font-size: 16px;
    font-weight: 600;
    letter-spacing: normal;
    line-height: 1.5;
    outline: none;
    overflow: hidden;
    padding: 13px 20px;
    position: relative;
    text-align: center;
    text-decoration: none;
    transform: translate3d(0, 0, 0);
    transition: all .3s;
    user-select: none;
    -webkit-user-select: none;
    touch-action: manipulation;
    vertical-align: top;
    white-space: nowrap;
  }
.card{
  display: inline-block;
  margin: 5px;
}
  .button-add2cart:hover {
    background-color: #1e8449;
    opacity: 1;
    transform: translateY(0);
    transition-duration: .35s;
  }

  .button-add2cart:active {
    transform: translateY(2px);
    transition-duration: .35s;
  }

  .button-add2cart:hover {
    box-shadow: rgba(39, 174, 96, .2) 0 6px 12px;
  }
    .button-checkout {
    appearance: none;
    backface-visibility: hidden;
    background-color: #27ae60;
    border-radius: 8px;
    border-style: none;
    box-shadow: rgba(39, 174, 96, .15) 0 4px 9px;
    box-sizing: border-box;
    color: #fff;
    cursor: pointer;
    display: inline-block;
    font-family: Inter,-apple-system,system-ui,"Segoe UI",Helvetica,Arial,sans-serif;
    font-size: 16px;
    font-weight: 600;
    letter-spacing: normal;
    line-height: 1.5;
    outline: none;
    overflow: hidden;
    padding: 13px 20px;
    position: relative;
    text-align: center;
    text-decoration: none;
    transform: translate3d(0, 0, 0);
    transition: all .3s;
    user-select: none;
    -webkit-user-select: none;
    touch-action: manipulation;
    vertical-align: top;
    white-space: nowrap;
    width: 100%;
  }

  .button-checkout:hover {
    background-color: #1e8449;
    opacity: 1;
    transform: translateY(0);
    transition-duration: .35s;
  }

  .button-checkout:active {
    transform: translateY(2px);
    transition-duration: .35s;
  }

  .button-checkout:hover {
    box-shadow: rgba(39, 174, 96, .2) 0 6px 12px;
  }
  .cart-container{
    box-shadow: rgba(0, 0, 0, 0.1) 0px 20px 25px -5px, rgba(0, 0, 0, 0.04) 0px 10px 10px -5px;
    padding: 20px;
  }


@-webkit-keyframes popup{
  0%{ transform: scale(0); }
  100% { transform: scale(1);}
}
@keyframes popup{
  0%{ transform: scale(0); }
  100% { transform: scale(1);}
}

  </style>
</head>
<!-- NAVIGATION BAR -->
<body>
  <!-- Navbar start -->
  <form action="<?php $_PHP_SELF ?>" method="POST"> 
  <nav class="navbar navbar-expand-md sticky-top" style="background-color: #1c1c1c; height: 68px;">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a href="index.php" class="a content text-white" style="line-height: 50px; padding-left: 50px;"><i class="fa fa-sign-out"></i>&ensp;Logout </a>
          <a href="profile.php" class="a content text-white" style="line-height: 50px;">&ensp;<i class="fa fa-user" aria-hidden="true"></i>&ensp;Profile </a>
        </li>
<!--         <li class="nav-item">
          <a class="nav-link" href="checkout.php"><i class="fas fa-money-check-alt mr-2"></i>Checkout</a>
        </li> -->
        <li class="nav-item" style="margin-left: 1230px;">
          <button type="submit" name="submit" style="margin-top: 5px; border: 0px solid;"><a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"  style='color: #615f5f'></i><span id="cart-item" class="badge badge-danger"></span></a></button>
        </li>
      </ul>
    </div>
  </nav>
  <!-- Navbar end -->

<nav class="navbar navbar-expand-md navbar-dark p-2" style="background-color:  #AF1D27; box-shadow: rgba(28, 28, 28, 0.45) 0px 25px 20px -20px;">
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
<form action="<?php $_PHP_SELF ?>" method="POST">
 <input type="text" name="u_Username" <?php echo "value='".$_COOKIE['name']."'"; ?> hidden>

 
<!-- <div class="container-lg">
  <br><br>
   <div class="container-md rounded" style="border: 3px solid #F9AF41; box-shadow: rgba(33, 35, 38, 0.1) 0px 10px 10px -10px; width: 95%; padding: 0px 50px" >
    <br><br>
      <h1 Class="d-flex align-items-center justify-content-center subtitle text-center" style="font-size: 34px; color:  #1c1c1c; font-family: EndzoneSlab Normal, arial;"><b>CHECK TO SEE IF WE DELIVER IN YOUR AREA</h1></b>
      <br>  
           
      <div class="d-flex justify-content-center align-items-center">
        <select name="Province" id="province" style="font-size: 15px; font-weight: 600; letter-spacing: normal;" class="title">
          <option value="" selected="selected" name="province">Select a province</option>
        </select> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <select name="City" id="city" disabled style="font-size: 15px; letter-spacing: normal; font-family: Poppins; font-weight: 600"> 
          <option value="" selected="selected" name="city">Select City</option>
        </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <select class="Barangay" name="Barangay" id="barangay" disabled style="font-size: 15px; letter-spacing: normal; font-family: Poppins; font-weight: 600">
          <option value="" selected="selected">Select Barangay</option>
        </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       <br><br> 
      </div><br> 
    </form>
      
      <p class="d-flex align-items-center justify-content-center content text-center"  style="color:  #1c1c1c;  font-size: 17px; font-weight: 400">Can't find your location? You might want to call 0956-889-5317.
      </p>
      <br>
   </div> -->
   <br><br>
   <div class="container-md" style="margin-bottom: 100px;"><br>
    <h1 Class="d-flex align-items-center justify-content-center subtitle text-center" style="font-size: 34px; color: #292929; font-family: EndzoneSlab Normal, arial;"><b>FOOD FAVORITES</h1></b>
      <br>
   <div class="parent">
    <div class="div1" style="background-image: url(img/fud.png);"> 
      <!-- NAVIGATION FOR FOOD CATEGORY -->
      <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pills-SILOGS-tab" data-bs-toggle="pill" data-bs-target="#pills-SILOGS" type="button" role="tab" aria-controls="pills-SILOGS" aria-selected="true" name="Silog"><i class="fas fa-bacon"></i>&nbsp;SILOGS</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-SANDWICHES-tab" data-bs-toggle="pill" data-bs-target="#pills-SANDWICHES" type="button" role="tab" aria-controls="pills-SANDWICHES" aria-selected="false" name="Sandwiches"><i class="fas fa-hamburger"></i>&nbsp;SANDWICHES</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-MUNCHEESE-tab" data-bs-toggle="pill" data-bs-target="#pills-MUNCHEESE" type="button" role="tab" aria-controls="pills-MUNCHEESE" aria-selected="false" name="Muncheese"><i class="fas fa-cloud-meatball"></i>&nbsp;MUNCHEESE</button>
        </li>
      <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-DESSERTS-tab" data-bs-toggle="pill" data-bs-target="#pills-DESSERTS" type="button" role="tab" aria-controls="pills-DESSERTS" aria-selected="false" name="Desserts"><i class="fas fa-ice-cream"></i>&nbsp;DESSERTS</button>
      </li>
      </ul>

    
      <!-- END OF NAVIGATION FOR FOOD CATEGORY -->
      <!-- CONTENT FOR FOOD CATEGORY -->

      <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-SILOGS" role="tabpanel" aria-labelledby="pills-SILOGS-tab" name="Silog">

  <!-- Displaying Products Start -->
  <!-- Silogs -->
  <div class="container">
    <div id="message"></div>
    <div class="row mt-2 pb-3">
      <?php
        include 'conn.php';
        $stmt = $conn->prepare('SELECT * FROM silog');
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()):
      ?>

      <div class="col-sm-6 col-md-4 col-lg-3 mb-2">
        <div class="card-deck">
          <div class="card p-2 mb-2" style="border: 1px solid lightgray; box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 6px -1px, rgba(0, 0, 0, 0.06) 0px 2px 4px -1px; border-radius: 2vh">
             <?php echo '<img src="data:image;base64,'.base64_encode( $row['FoodImg'] ).'" class="card-img-top" height="250" /><br />';?>
            <!--<img src="<?= $row['FoodImg'] ?>" class="card-img-top" height="250">-->
            <div class="card-body p-1">
              <h4 class="card-title text-center title" style="color:  #1c1c1c; font-size: 18px; padding-top: 8px"><?= $row['Food'] ?></h4>
              <h5 class="card-text text-center"style="color:  dimgray; font-size: 16px; padding-bottom: 8px" >&#8369;&nbsp;&nbsp;<?= number_format($row['Price'],2) ?></h5>

            </div>
            <div class="card-footer p-1">
              <form action="" class="form-submit">
                <div class="row p-2">
                  <div class="col-md-6 py-1 pl-4">
                    <b>Quantity: </b>
                  </div>
                  <div class="col-md-6">
                    <input type="number" min="1" class="form-control pqty" value="<?= $row['product_qty'] ?>" onclick="toast('<?php echo $qtyerror; ?>')" min="0" oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null" name="qty">
                  </div>
                </div>
                <input type="hidden" class="pid" value="<?= $row['Food_ID'] ?>">
                <input type="hidden" class="pname" value="<?= $row['Food'] ?>">
                <input type="hidden" class="pprice" value="<?= $row['Price'] ?>">
              
               
                 <button class="btn btn-info btn-block addItemBtn title"style="background-color: #AF1D27; color: white; border: 0px solid; border-radius: 0px; font-weight: 500; font-size: 14.5px"><i class="fa fa-plus"></i>&ensp;Add to Basket</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <?php endwhile; ?>
    </div>
  </div>
</div>
  <div class="tab-pane fade" id="pills-SANDWICHES" role="tabpanel" aria-labelledby="pills-SANDWICHES-tab" name="Sandwiches">
  <div class="container">
    <div id="message"></div>
    <div class="row mt-2 pb-3">
      <?php
        include 'conn.php';
        $stmt = $conn->prepare('SELECT * FROM sandwiches');
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()):
      ?>
      
      <div class="col-sm-6 col-md-4 col-lg-3 mb-2">
        <div class="card-deck">
          <div class="card p-2 border-secondary mb-2">
             <?php echo '<img src="data:image;base64,'.base64_encode( $row['FoodImg'] ).'" class="card-img-top" height="250" /><br />';?>            

             <!--<img src=" class="card-img-top" height="250">-->
            <div class="card-body p-1">
              <h4 class="card-title text-center"style="color:  #1c1c1c; font-size: 18px; padding-top: 8px"><?= $row['Food'] ?></h4>
              <h5 class="card-text text-center" style="color:  dimgray; font-size: 16px; padding-bottom: 8px" >&#8369;&nbsp;&nbsp;<?= number_format($row['Price'],2) ?></h5>

            </div>
            <div class="card-footer p-1">
              <form action="" class="form-submit">
                <div class="row p-2">
                  <div class="col-md-6 py-1 pl-4">
                    <b>Quantity: </b>
                  </div>
                  <div class="col-md-6">
                    <input type="number" min="1" class="form-control pqty" value="<?= $row['product_qty'] ?>" onclick="toast('<?php echo $qtyerror; ?>')" min="0" oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null" name="qty">
                  </div>
                </div>
                <input type="hidden" class="pid" value="<?= $row['Food_ID'] ?>">
                <input type="hidden" class="pname" value="<?= $row['Food'] ?>">
                <input type="hidden" class="pprice" value="<?= $row['Price'] ?>">
              
                
               <button class="btn btn-info btn-block addItemBtn title"style="background-color: #AF1D27; color: white; border: 0px solid; border-radius: 0px; font-weight: 500; font-size: 14.5px"><i class="fa fa-plus"></i>&ensp;Add to Basket</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <?php endwhile; ?>
    </div>
  </div>
</div>
<div class="tab-pane fade " id="pills-MUNCHEESE" role="tabpanel" aria-labelledby="pills-MUNCHEESE-tab">

  <div class="container">
    <div id="message"></div>
    <div class="row mt-2 pb-3">
      <?php
        include 'conn.php';
        $stmt = $conn->prepare('SELECT * FROM muncheese');
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()):
      ?>
      
      <div class="col-sm-6 col-md-4 col-lg-3 mb-2">
        <div class="card-deck">
          <div class="card p-2 border-secondary mb-2">
             <?php echo '<img src="data:image;base64,'.base64_encode( $row['FoodImg'] ).'" class="card-img-top" height="250" /><br />';?>            

             <!--<img src=" class="card-img-top" height="250">-->
            <div class="card-body p-1">
              <h4 class="card-title text-center" style="color:  #1c1c1c; font-size: 18px; padding-top: 8px"><?= $row['Food'] ?></h4>
              <h5 class="card-text text-center" style="color:  dimgray; font-size: 16px; padding-bottom: 8px" >&#8369;&nbsp;&nbsp;<?= number_format($row['Price'],2) ?></h5>

            </div>
            <div class="card-footer p-1">
              <form action="" class="form-submit">
                <div class="row p-2">
                  <div class="col-md-6 py-1 pl-4">
                    <b>Quantity: </b>
                  </div>
                  <div class="col-md-6">
                    <input type="number" class="form-control pqty" value="<?= $row['product_qty'] ?>" onclick="toast('<?php echo $qtyerror; ?>')" min="0" oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null" name="qty">
                  </div>
                </div>
                <input type="hidden" class="pid" value="<?= $row['Food_ID'] ?>">
                <input type="hidden" class="pname" value="<?= $row['Food'] ?>">
                <input type="hidden" class="pprice" value="<?= $row['Price'] ?>">
              
                
               <button class="btn btn-info btn-block addItemBtn title"style="background-color: #AF1D27; color: white; border: 0px solid; border-radius: 0px; font-weight: 500; font-size: 14.5px"><i class="fa fa-plus"></i>&ensp;Add to Basket</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <?php endwhile; ?>
    </div>
  </div>
</div>
 <div class="tab-pane fade" id="pills-DESSERTS" role="tabpanel" aria-labelledby="pills-DESSERTS-tab" name="Desserts">

  <div class="container">
    <div id="message"></div>
    <div class="row mt-2 pb-3">
      <?php
        include 'conn.php';
        $stmt = $conn->prepare('SELECT * FROM desserts');
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()):
      ?>
      
      <div class="col-sm-6 col-md-4 col-lg-3 mb-2">
        <div class="card-deck">
          <div class="card p-2 border-secondary mb-2">
             <?php echo '<img src="data:image;base64,'.base64_encode( $row['FoodImg'] ).'" class="card-img-top" height="250" /><br />';?>            

             <!--<img src=" class="card-img-top" height="250">-->
            <div class="card-body p-1">
              <h4 class="card-title text-center" style="color:  #1c1c1c; font-size: 18px; padding-top: 8px"><?= $row['Food'] ?></h4>
              <h5 class="card-text text-center" style="color:  dimgray; font-size: 16px; padding-bottom: 8px" >&#8369;&nbsp;&nbsp;<?= number_format($row['Price'],2) ?></h5>

            </div>
            <div class="card-footer p-1">
              <form action="" class="form-submit">
                <div class="row p-2">
                  <div class="col-md-6 py-1 pl-4">
                    <b>Quantity: </b>
                  </div>
                  <div class="col-md-6">
                    <input type="number" class="form-control pqty" value="<?= $row['product_qty'] ?>" onclick="toast('<?php echo $qtyerror; ?>')" min="0" oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null" name="qty">
                  </div>
                </div>
                <input type="hidden" class="pid" value="<?= $row['Food_ID'] ?>">
                <input type="hidden" class="pname" value="<?= $row['Food'] ?>">
                <input type="hidden" class="pprice" value="<?= $row['Price'] ?>">
              
                
               <button class="btn btn-info btn-block addItemBtn title"style="background-color: #AF1D27; color: white; border: 0px solid; border-radius: 0px; font-weight: 500; font-size: 14.5px"><i class="fa fa-plus"></i>&ensp;Add to Basket</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <?php endwhile; ?>
    </div>

  </div>

</div>
  <!-- Displaying Products End -->

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

  <script type="text/javascript">
  $(document).ready(function() {

    // Send product details in the server
    $(".addItemBtn").click(function(e) {
      e.preventDefault();
      var $form = $(this).closest(".form-submit");
      var pid = $form.find(".pid").val();
      var pname = $form.find(".pname").val();
      var pprice = $form.find(".pprice").val();
      var pimage = $form.find(".pimage").val();
      var pcode = $form.find(".pcode").val();

      var pqty = $form.find(".pqty").val();

      $.ajax({
        url: 'action.php',
        method: 'post',
        data: {
          pid: pid,
          pname: pname,
          pprice: pprice,
          pqty: pqty,
          pimage: pimage,
          pcode: pcode
        },
        success: function(response) {
          $("#message").html(response);
          window.scrollTo(0, 0);
          load_cart_item_number();
        }
      });
    });

    // Load total no.of items added in the cart and display in the navbar
    load_cart_item_number();

    function load_cart_item_number() {
      $.ajax({
        url: 'action.php',
        method: 'get',
        data: {
          cartItem: "cart_item"
        },
        success: function(response) {
          $("#cart-item").html(response);
        }
      });
    }
  });
  </script>

  <script type="text/javascript">
  //FOR THE CHECKING OF DELIVERY AVAILABILITY 
var Address_Object = {
  "Bulacan": { //dito yung province
    "Marilao City": ["Loma De Gato"], //city tas sa loob nun yung barangay    
  },
  "Metro Manila": {
    "Quezon City": ["North Olympus Subd."],
    "Caloocan City": ["Miramonte Heights Subdivision"]
  }
}
window.onload = function() {
  var provinceSel = document.getElementById("province");
  var citySel = document.getElementById("city");
  var barangaySel = document.getElementById("barangay");
  for (var x in Address_Object) {
    provinceSel.options[provinceSel.options.length] = new Option(x, x);
  }
  provinceSel.onchange = function() {
    //empty Chapters- and Topics- dropdowns
    citySel.disabled = false;
    barangaySel.length = 1;
    citySel.length = 1;
    //display correct values
    for (var y in Address_Object[this.value]) {
      citySel.options[citySel.options.length] = new Option(y, y);
    }
  }
  citySel.onchange = function() {
    //empty Chapters dropdown
    barangaySel.disabled = false;
    barangaySel.length = 1;
    //display correct values
    var z = Address_Object[provinceSel.value][this.value];
    for (var i = 0; i < z.length; i++) {
      barangaySel.options[barangaySel.options.length] = new Option(z[i], z[i]);
    }
  }
}
</script>
<!-- JAVASCRIPT -->
  <script type="text/javascript">
  //FOR THE CHECKING OF DELIVERY AVAILABILITY 
var Address_Object = {
  "Bulacan": { //dito yung province
    "Marilao City": ["Loma De Gato"], //city tas sa loob nun yung barangay    
  },
  "Metro Manila": {
    "Quezon City": ["North Olympus Subd."],
    "Caloocan City": ["Miramonte Heights Subdivision"]
  }
}
window.onload = function() {
  var provinceSel = document.getElementById("province");
  var citySel = document.getElementById("city");
  var barangaySel = document.getElementById("barangay");
  for (var x in Address_Object) {
    provinceSel.options[provinceSel.options.length] = new Option(x, x);
  }
  provinceSel.onchange = function() {
    //empty Chapters- and Topics- dropdowns
    citySel.disabled = false;
    barangaySel.length = 1;
    citySel.length = 1;
    //display correct values
    for (var y in Address_Object[this.value]) {
      citySel.options[citySel.options.length] = new Option(y, y);
    }
  }
  citySel.onchange = function() {
    //empty Chapters dropdown
    barangaySel.disabled = false;
    barangaySel.length = 1;
    //display correct values
    var z = Address_Object[provinceSel.value][this.value];
    for (var i = 0; i < z.length; i++) {
      barangaySel.options[barangaySel.options.length] = new Option(z[i], z[i]);
    }
  }
}

function toast(msg){
  
    this.backgroundColor = 'rgba(32, 32, 32, 0.9)';
    this.textColor = '#DDD';
    this.toastTime = 0;
  
    if(_("toast_div") && _("toast_div").style.display != "none"){
        clearTimeout(toastTime);
    }
    if(!(_("toast_div"))){
        var div = document.createElement("div");
        div.setAttribute("id", "toast_div");
        div.style.minWidth = "5em";
        div.style.backgroundColor = this.backgroundColor;
        div.style.borderRadius = "3px";
        div.style.position = "fixed";
        div.style.bottom = "10%";
        div.style.right = "3%";
        div.style.padding = "1em";
        div.style.zIndex= "99";
        div.style.webkitAnimation= "popup 0.2s ease-in-out";
        div.style.animation= "popup 0.2s ease-in-out";
        var p = document.createElement("p");
        p.setAttribute("id", "toast_p");
        p.style.color = this.textColor;
        p.style.width = "100%";
        p.style.margin = "0%";
        p.style.display = "inline";
      p.style.fontFamily = "Arial";
        div.style.boxShadow = "0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22)";
        var text = document.createTextNode(msg);
        p.appendChild(text);
        div.appendChild(p);
        document.body.appendChild(div);
        div.style.transition = "all 0.2s ease-in";
    }else{
        if(_("toast_div").style.display != "none"){
            _("toast_div").style.display = "none";
        }
        _("toast_p").innerHTML = msg;
    }
    _("toast_div").style.display = "block";
    this.toastTime = setTimeout(function(){
        _("toast_div").style.display = "none";
    }, 5000);
  
  
    function _(key){
      return document.getElementById(key);
    }
}

var htmlStr = "<?php echo $qtyerror; ?>";

// call function
toast(htmlStr);
</script>
</body>

</html>
<?php
if (isset($_POST['Province'])) 
    {
            $Province= $_POST['Province'];
            }
            ?>
         
<?php 
    if (isset($_POST['City'])) {
            $City= $_POST['City'];
            }
      ?>
      <?php   
 
    if (isset($_POST['Barangay'])) {
            $Barangay = $_POST['Barangay'];
            }


?>
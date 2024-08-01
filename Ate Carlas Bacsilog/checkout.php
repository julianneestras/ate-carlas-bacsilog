
<?php
include 'conn.php';
session_start();


	$grand_total = 0;
	$allItems = '';
	$items = [];

	$sql = "SELECT CONCAT(product_name, '(',qty,')') AS ItemQty, total_price FROM cart";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$result = $stmt->get_result();
	while ($row = $result->fetch_assoc()) {
	  $grand_total += $row['total_price'];
	  $items[] = $row['ItemQty'];
	}
  

	$allItems = implode(',', $items);
?>




<?php

  if (isset($_POST['logout'])) 
{
  session_destroy();


   unset($_POST['action']);

  unset($_GET['cartItem']);


  header("refresh:0;url=index.php");
}
?>




<?php
if(isset($_POST['placeorder'])) 
{

    $_SESSION['orderID']=$_POST['orderID'];

    $u_Username = $_POST['u_Username'];
    $fname = $_POST['fname'];
    $status = $_POST['status'];
    $orderID = $_POST['orderID'];
    $custID = $_POST['custID'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $products = $_POST['products'];
    $grand_total = $_POST['grand_total'];
    $address = $_POST['address'];
    $pmode = $_POST['pmode'];
    $ins = $_POST['ins'];
    $deldate = $_POST['deldate'];
    $deltime = $_POST['deltime'];

    $data = '';

    $stmt = $conn->prepare('INSERT INTO orders (OrderID,CustID, Username,fname,lname,email,phone,address,pmode,products,amount_paid,Instructions,DelDate,DelTime,status)VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
    $stmt->bind_param('sssssssssssssss',$orderID,$custID,$u_Username,$fname,$lname,$email,$phone,$address,$pmode,$products,$grand_total,$ins,$deldate,$deltime,$status);
    $stmt->execute();
    $stmt2 = $conn->prepare('DELETE FROM cart');
    $stmt2->execute();

        $orderID = $_POST['orderID'];
$u_Username = $_POST['u_Username'];
$custID = $_POST['custID'];
$fname = $_POST['fname'];
$lname = $_POST['lname']; 
$products = $_POST['products']; 
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$deldate = $_POST['deldate'];
$deltime = $_POST['deltime'];
$pmode = $_POST['pmode'];
$amount = $_POST['grand_total'];
$inst = $_POST['ins'];

$to="acarlasbacsilog@gmail.com";
$link="<a href='http://localhost/ecomver3/adminlogin.php'>Login Now</a>";

$from = $_POST['email'];  
$fromName = $_POST['email'];
 
$subject = "Order Placed"; 
$subject2 = "Someone placed an order"; 
 
$toadmin = ' 
    <html> 
    <head> 
    </head> 
    <body> 
        <h1>Someone placed an order!</h1> 
        <p>Good day, admin!<br><br>

        You have just received an order from '.$fname.' '.$lname.' with Customer No.: <b>'.$custID.'</b> .
        Process it now by logging into your account faster by clicking '.$link.'. <br><br>

        Ate Carla`s Bacsilog Team
        </p>

    </body> 
    </html>'; 

$tocustomer = ' 
   <html> 
    <head> 
     <link rel="icon" href="img/logo.png" type="image/x-icon">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
      <link rel="stylesheet" href="index-splash-design.css">
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <script type="text/javascript" src="js/bootstrap.bundle.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
      <style>
      @import url("http://fonts.cdnfonts.com/css/amiko");
        @import url("http://fonts.cdnfonts.com/css/poppins");
        @import url("http://fonts.cdnfonts.com/css/readiness");
      </style>
    </head> 
    <body> 
    <center>
           <table width="90%" cellpadding="30" cellspacing="0" border="0" style="background-color: #F9FAFB">
            <tr>
                <td>
            <center>
            <table cellspacing="0" cellpadding="40" style="border: 0px solid; width: 70%; background-color: white">
            <tr>
            <h1>Thanks for ordering</h1> 
            <p>
            <h3>
              Good day, '.$fname .' </h3><br>

              <h4>Thanks for ordering from us! This email is to imform you that your order(s):</h4>
            </p>
            <tr> 
                <td colspan=3 style="font-family: Arial; font-size: 22px; font-weight: bold">
                    ORDER SUMMARY 
                    <p style="font-weight: bold; font-size: 16px">ORDER NUMBER: '.$OID.' </p>

                    <font style="font-size: 14px; color: dimgray; margin-left: 50px">
                        Customer ID: '.$CID.' <br> 
                    </font>
                     <font style="font-size: 14px; color: dimgray; margin-left: 50px">
                        Customer Name: '.$fname.' '.$lname.' <br>
                    </font>
                    <font style="font-size: 14px; color: dimgray; margin-left: 50px">
                        Customer Address: '.$address.' <br>
                    </font>
                    <font style="font-size: 14px; color: dimgray; margin-left: 50px">
                        Customer Contact Number: '.$phone .' <br>
                    </font>

                    <hr>

                     <font style="font-size: 14px; color: dimgray; margin-left: 50px">
                        Order(s) and Quantity: '.$prodName.' <br>
                     </font>
                    <font style="font-size: 14px; color: dimgray; margin-left: 50px">
                        Total Amount: '.$amount.' <br>
                    </font>
                     <font style="font-size: 14px; color: dimgray; margin-left: 50px">
                        Mode of Payment: '.$pmode.' <br>
                    </font>
                     <font style="font-size: 14px; color: dimgray; margin-left: 50px">
                        Delivery Instructions: '.$inst .' <br>
                    </font>
                    <font style="font-size: 14px; color: dimgray; margin-left: 50px">
                        Date of Delivery: '.$deldate.' <br>
                    </font>
                     <font style="font-size: 14px; color: dimgray; margin-left: 50px">
                        Time of Delivery: '.$deltime.'
                    </font>
                </td>
            </tr> 

             The following has been received by our team. For your order status, please wait patiently as we process it and we will get back to you soon. 
            
        </table> 
        </center>

        <br><br>
             If you have any questions regarding your order, please email our customer service team at <a href = "mailto:acarlasbacsilog@gmail.com">acarlasbacsilog@gmail.com.</a> <br>
              Ate Carla`s Bacsilog Team
        
                </td>
            </tr>
           </table>
    </center>
    </body> 
    </html>'; 



// Set content-type header for sending HTML email 
$headers = "MIME-Version: 1.0" . "\r\n"; 
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
$headers2 = "MIME-Version: 1.0" . "\r\n"; 
$headers2 .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
 
// Additional headers 
$headers .= 'From: '.$fromName.'<'.$fromName.'>' . "\r\n"; 
$headers2 .= 'From: '.$to.'<'.$fromName.'>' . "\r\n"; 
 
// Send email
mail($from, $subject2, $tocustomer, $headers2);
if(mail($to, $subject, $toadmin, $headers)){ 
    
    header("location: summary.php");
}else{ 
   echo 'Email sending failed.'; 
}
  

}
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="author" content="Sahil Kumar">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Checkout Details</title>
  <link rel="icon" href="img/logo.png" type="image/x-icon">
  <link rel="stylesheet" href="summarypage-design.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <script type="text/javascript" src="js/bootstrap.bundle.js"></script>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css' />
</head>
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

    .total{
      text-align: right;
      border-spacing: 0;
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
  width: 80%;
  margin-left: auto;
  margin-right: auto;
  }

  .top{
    width: 70%;
    margin-left: auto;
    margin-right: auto;
  }
  .info{
    color: #AF1D27;
    font-size: 18px;
    width: 100%;
    margin-left: 0%;
    margin-right: 90%;
  }

    .info2{
    color: #1c1c1c;
    font-size: 14px;
    width: 100%;
    margin-left: 0%;
    margin-right: 90%;
    font-weight: 400;
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

    select {
      padding: 10px 15px;
      border-radius: 1vh;
      color:  dimgray;
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

/*    input[type=text], input[type=email], select, input[type=tel], textarea, input[type=date]{
      border: 1px solid #AF1D27;
      padding: 15px;
      border-radius: 50px;
      width: 100%;
       background-color: #faf9f9;
    }

    .input2[type=text], .input2[type=password], select, .input2[type=date], .input2[type=email], .input2[type=tel], .input2[type=number], textarea   {
      border: 1px solid #AF1D27;
      padding: 8px;
      border-radius: 2vh;
      width: 100%;
      background-color:  #f9f9f9;
    }*/

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
  .btn{
    display: inline-block;
  }

  </style>


<body>
 <nav class="navbar navbar-expand-md" style="background-color: #1c1c1c; height: 68px;" >
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <form method="POST"> 
          <a href="action.php?logout=all" class="a content" onclick="return confirm('Are you sure want to logout your cart?');" style="line-height: 50px; padding-left: 50px; background-color: #1c1c1c;"><i class="fa-solid fa-right-from-bracket"></i>&ensp;Logout </a>    
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

<!-- Container -->
<br><br>
  <div class="container" style="border: 0px solid  #F9AF41;">
    <div class="row justify-content-center">
      <div class="col-lg-9 px-4 pb-4" id="order" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;">
         <h4 class="text-left m-0 title" style="font-weight: bold; font-size: 30px; padding: 30px 0px">Order Summary</h4>
        <div class="jumbotron p-3 mb-2 text-center" style="background-color:#edd3ad">
            <table class="table text-center" style="width:80%;margin-left:auto;margin-right:auto; border: 2px solid white" >
            <tr>
          <th width="50%" colspan="2" style="background-color: #edcd9f">Product Name (Quantity)</th>
        </tr>

          <tr>
          <td colspan="2"><?= $allItems; ?> </td>
        </tr>

        <tr>
          <td><b>Delivery Charge : </b> Free</td>
          <td><b>Total Amount Payable : </b><?= number_format($grand_total,2) ?></td>
        </tr>
         
          <br>
        </div>
        <form method="POST" action = "<?php $_PHP_SELF ?>">
        <form action="" method="post" id="placeOrder">
            
          <input type="hidden" name="products" value="<?= $allItems; ?>">
          <input type="hidden" name="grand_total" value="<?= $grand_total; ?>">
        </table>
      </div>

  <!-- Input Fields -->
  <?php
include 'conn.php';
$u_Username = $_SESSION['u_Username'];
$userid=$_COOKIE['name'];
$q=mysqli_query($conn,"SELECT * FROM custinfo WHERE Username='$userid'" )or die('Error223');
if(mysqli_num_rows($q) > 0)
while($row=mysqli_fetch_array($q) )
                    {
                      ?>
          <div class="row jumbotron" style="background-color: transparent;">
          <div class="form-group col-sm-8">
            <!-- Extra Grid Row -->
          </div>
          <div class="form-group col-sm-4">
            <?php

             function Orderid($l=6)
             {
             return substr(str_shuffle("0123456789"), 0, $l);
            }
              ?>
            <input type="text" name="orderID" class="form-control" placeholder="Order ID" required readonly value ="<?php echo Orderid(); ?>">
            <input type="hidden" name="u_Username" class="form-control" placeholder="Order ID" required readonly value ="<?php echo "$userid"; ?>">
            <input type="hidden" name="custID" class="form-control" placeholder="Enter Name" required readonly value="<?php echo $row["CustID"]; ?>">
             <input type="hidden" name="status" class="form-control" placeholder="Order ID" required readonly value ="Pending">
          </div>
            <h3 class="title info">Account Information</h3><hr>
          <div class="form-group col-sm-6">
            <h3 class="title info2">First Name</h3>
            <input type="text" name="fname" class="form-control" placeholder="Enter Name" required readonly value="<?php echo $row["First_Name"]; ?>">
          </div>
          <div class="form-group col-sm-6">
            <h3 class="title info2">Last Name</h3>
            <input type="text" name="lname" class="form-control" placeholder="Enter Name" required readonly value="<?php echo $row["Last_Name"]; ?>">
          </div>
          <div class="form-group col-sm-6">
            <h3 class="title info2">Email</h3>
            <input type="email" name="email" class="form-control" placeholder="Enter E-Mail" required readonly value="<?php echo $row["Email"]; ?>">
          </div>
          <div class="form-group col-sm-6">
            <h3 class="title info2">Contact Number</h3>
            <input type="tel" name="phone" class="form-control" placeholder="Enter Phone" required readonly value="<?php echo $row["PhoneNum"]; ?>">
          </div>
          <br><br><br><br>
          <h3 class="title info">Delivery Information</h3><hr>
          <div class="form-group">
            <h3 class="title info2">Home Address</h3>
           <input type="text" name="address" class="form-control" placeholder="Enter complete address" required readonly value="<?php echo $row["Address"]; ?>">
          </div>

           <div class="form-group col-sm-12">

          </div>
          <!--<div class="form-group col-sm-4">
            <h3 class="title info2">Province</h3>
           <select name="Province" id="province" style="font-size: 15px; font-weight: 600; letter-spacing: normal; width: 100%" class="title">
          <option selected="selected" name="province">Select a province</option>
        </select> 
          
          </div>
          <div class="form-group col-sm-4">
            <h3 class="title info2">City</h3>
            <select name="City" id="city" disabled style="font-size: 15px; letter-spacing: normal; font-family: Poppins; font-weight: 600; width: 100%"> 
          <option  selected="selected" name="city">Select City</option>
        </select>
          </div>
          <div class="form-group col-sm-4">
            <h3 class="title info2">Barangay</h3>
            <select class="Barangay" name="Barangay" id="barangay" disabled style="font-size: 15px; letter-spacing: normal; font-family: Poppins; font-weight: 600; width: 100%">
          <option selected="selected">Select Barangay</option>
        </select> 

          </div>-->
          <div class="form-group col-md-12">
            <h3 class="title info2">Delivery Instructions</h3>
           <textarea name="ins" rows="5" cols="9" class="form-control" placeholder="Delivery Instructions"></textarea>
          </div>
          <div class="form-group col-md-6">
            <h3 class="title info2">Delivery Date</h3>
           <input type="date" id="set_bdate" name="deldate" class="form-control" required>
          </div>
          <div class="form-group col-md-6">
            <h3 class="title info2">Delivery Time</h3>
           <input type="time" name="deltime" class="form-control" onchange="onTimeChange()" id="timeInput" required>
          </div>
          <br><br><br><br>
          <h3 class="title info">Select Payment Mode</h3><hr>
          <div class="form-group">
            <select name="pmode" class="form-control">
              <option value="" selected disabled>-Select Payment Mode-</option>
              <option value="cod">Cash On Delivery</option>
              <option value="netbanking">Net Banking</option>
              <option value="cards">Debit/Credit Card</option>
            </select>
          </div>
          <?php
  }
                                        
?>
          <div class="form-group col-sm-12">
          <button name="back" class="btn" style="font-size: 14px; font-weight: bold; width: 49%; background-color: transparent; border: 1px solid dimgray; color: dimgray; padding: 15px 30px;" onclick="history.go(-1);">BACK TO CART</button>
            <input type="submit" name="placeorder" value="PLACE ORDER" class="btn btn-danger btn-block" style="font-size: 14px; font-weight: bold; width: 49%">
          </div>
        </div>
      </form>
          <!-- Input Fields -->
        </form>
      </div>
    </div>
  </div>
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

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

  <script type="text/javascript">
  $(document).ready(function() {

    // Sending Form data to the server
    $("#placeOrder").submit(function(e) {
      e.preventDefault();
      $.ajax({
        url: 'action.php',
        method: 'post',
        data: $('form').serialize() + "&action=order",
        success: function(response) {
          $("#order").html(response);
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

 //Disable previous dates 
    var currentDt = new Date();
    var dd = String(currentDt.getDate()).padStart(2, '0');
    var mm = String(currentDt.getMonth() + 1).padStart(2, '0');
    var yyyy = currentDt.getFullYear();

    currentDt = yyyy + '-' + mm + '-' + dd;
    $('#set_bdate').attr('min',currentDt);
</script>
<script type="text/javascript">
  var inputEle = document.getElementById('timeInput');


function onTimeChange() {
  var timeSplit = inputEle.value.split(':'),
    hours,
    minutes,
    meridian;
  hours = timeSplit[0];
  minutes = timeSplit[1];
  if (hours > 12) {
    meridian = 'PM';
    hours -= 12;
  } else if (hours < 12) {
    meridian = 'AM';
    if (hours == 0) {
      hours = 12;
    }
  } else {
    meridian = 'PM';
  }
  }
</script>
</body>

</html>
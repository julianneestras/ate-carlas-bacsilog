<?php
session_start(); 

if(isset($_POST["submit"]))
{

    $Province = $_POST['Province'];
    $City = $_POST['City'];
    $Barangay = $_POST['Barangay'];
   $u_Username =  $_POST['u_Username'];

    $orderid =  $_POST['orderid'];

    $prodname = $_POST['prodname'];
    $prodqty = $_POST['prodqty'];
    $prodprice = $_POST['prodprice'];
    //$prodno = $_POST['prodno'];
    $prodtotal = $_POST['prod_total'];
    $sub_total = $_POST['sub_total'];
    $order_total = $_POST['order_total'];


    $_SESSION['orderid']=$_POST['orderid'];
    $_SESSION['prodno']=$_POST['prodno'];
    $_SESSION['custid']=$_POST['cus'];
    $_SESSION['u_Username']=$_POST['u_Username'];
   
    

    $custid = $_POST['custid'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $address = $_POST['address'];
    $deldate = $_POST['deldate'];
    $deltime = $_POST['deltime'];
    $email = $_POST['email'];
    $num = $_POST['phonenum'];
    $delfee = 50;

    header("location: UserSummary.php");
    


include 'conn.php';

//$query = "UPDATE ordersummary SET CustID='$custid', Order_ID='$orderid',Total='$prodtotal',SubTotal='$sub_total',DeliveryFee='$delfee',OrderTotal='$order_total',Fname='$fname',Lname='$lname',Address='$address',Province='$Province',City='$City',Barangay='$Barangay',DelDate='$deldate',DelTime='$deltime',Email='$email',Phone='$num' WHERE Username='$u_Username'";

$stmt = $conn->prepare('INSERT INTO ordersummary (Order_ID,SubTotal,DeliveryFee,OrderTotal,Fname,Lname,Address)VALUES(?,?,?,?,?,?)');
$stmt->bind_param('ssssss',$orderid,$sub_total,$delfee,$order_total,$lname,$address);
$stmt->execute();












//$sql = "INSERT INTO ordersummary (Order_ID,Total,SubTotal,DeliveryFee,OrderTotal,Fname,Lname,Address,Province,City,Barangay,DelDate,DelTime,Email,Phone,Username) VALUES 
                                 //('$orderid','$prodtotal', '$sub_total', '$delfee','$order_total','$fname' ,'$lname', '$address','$Province',
                                //'$City', '$Barangay','$deldate', '$deltime','$email', '$num', '$u_Username')";
if(mysqli_query($conn, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $query. " . mysqli_error($conn);
}
if(mysqli_query($conn, $query)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $query. " . mysqli_error($conn);
}


  
  /*session_destroy();
  unset($_SESSION['shopping_cart']);
  unset($_SESSION['add_to_cart']);
  unset($_SESSION['id']);

  unset($_GET['shopping_cart']);
  unset($_GET['id']);
  unset($_GET['add_to_cart']);*/
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ate Carla's Bacsilog | Checkout</title>
  <link rel="icon" href="img/logo.png" type="image/x-icon">
  <link rel="stylesheet" href="checkout-design.css">
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
    width: 83%;
    margin-left: auto;
    margin-right: auto;
  }

  .top{
    width: 80%;
    margin-left: auto;
    margin-right: auto;
    font-size: 15px;
  }

  .info{
    color: #AF1D27;
    font-size: 22px;
    width: 21%;
    margin-left: 10%;
    margin-right: 90%;
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
<form name="checkout" method = "post" action = "<?php $_PHP_SELF ?>">
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
     &nbsp;
    <div style="color: white;   font-weight: 400;">
      <a href="profile.php" class="a content" style="text-decoration: none; cursor: pointer;"> Profile </a> &nbsp; <a href="index.php" class="a content" style="text-decoration: none; cursor: pointer;">Logout</a>
    </div>
    </div>
  </div>
</div>
    
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
<!-- Start of Checkout -->
<?php

   //$prodno=$_SESSION['prodno'];
  


?>
<div class="text-center">
<br><br>
<h3 class="title" style="color: #AF1D27; width:14%;margin-left:8%;margin-right:92%;"><strong>Checkout</strong></h3>
<!-- Table of Checkout same with the Summary -->
 <table class="table table-hover text-center border" style="width:80%;margin-left:auto;margin-right:auto;" >
  <thead class="table-light title">
    <tr>
            <th width="50%">Item Name</th>
            <th width="10%">Quantity</th>
            <th width="20%">Price</th>
            <th width="20%">Total</th>
            
          </tr>
          <?php
          if(!empty($_SESSION["shopping_cart"]))
          {
            $total = 0;
            foreach($_SESSION["shopping_cart"] as $keys => $values)
            {
          ?>
          <tr >
            <td><input type="textbox" size="10" name="prodname" value="<?php echo $values["item_name"]; ?>" ></td>
            <td><input type="textbox" size="2" name="prodqty" value="<?php echo $values["item_quantity"]; ?>" ></td>
            <td><input type="textbox" size="6" name="prodprice" value="₱ <?php echo $values["item_price"]; ?>" ></td>
            <td><input type="textbox" size="6" name="prod_total" value="₱ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?>" ></td>
            
          </tr>
          <?php
              $total = $total + ($values["item_quantity"] * $values["item_price"]);
            }
          ?>
          <tr>
            <td colspan="3" align="right"><b>Sub Total</b></td>
            <td>₱ <?php echo number_format($total, 2); ?></td>
            <input type="hidden" size="6" name="sub_total" value="₱<?php echo number_format($total, 2); ?>" ></td>
          </tr>
          <tr>
            <td colspan="3" align="right"><b>Delivery Fee</b></td>
            <td>₱50</td>
            <?php

            $delfee = 50;
              $deltotal = $total + $delfee;
            }
          ?>
          </tr>
          <td colspan="3" align="right"><b>Order Total</b></td>
            <td>₱ <?php echo number_format($deltotal,2); ?></td>
            <input type="hidden" size="6" name="order_total" value="₱<?php echo number_format($deltotal,2); ?>" ></td>
          </tr>

          
  </tfoot>
  
</table>
</div>
<br>



<!-- Delivery Information -->
<?php

include("conn.php");
//$Province=$_SESSION['Province'];
$u_Username=$_SESSION['u_Username'];
$prodno=$_SESSION['prodno'];
$Province=$_GET['Province'];
$City=$_GET['City'];
$Barangay=$_GET['Barangay'];
$userid=$_COOKIE['name'];
$q=mysqli_query($conn,"SELECT * FROM custinfo WHERE Username='$userid'" )or die('Error223');
if(mysqli_num_rows($q) > 0)
while($row=mysqli_fetch_array($q) )
                    {
                      ?>


<h3 class="title info">Delivery Information</h3>
<h5 class="title top"><strong>ALL FIELDS ARE REQUIRED</strong></h5>
<div class="row justify-content-center">  

 
            <div class="col-sm-5 form-group">
                <label for="name-f">First Name</label>
                <input type="text" class="form-control input2" name="fname" id="name-f" placeholder="Enter your first name *" required value="<?php echo $row["First_Name"]; ?>"/>
                <input type="hidden" class="form-control input2" name="custid"  placeholder="Enter your first name *" required value="<?php echo $row["CustID"]; ?>"/>
                <input type="text" class="form-control input2" name="u_Username"  placeholder="Enter your first name *" required value="<?php echo @$u_Username;?>"/>
                 <input type="text" class="form-control input2" name="prodno"  placeholder="Enter your first name *" required value="<?php echo @$prodno;?>"/>

            </div>
            <div class="col-sm-5 justify-content-center form-group">
                <label for="name-l">Last Name</label>
                <input type="text" class="form-control input2" name="lname" id="name-l" placeholder="Enter your last name *"  required value="<?php echo $row["Last_Name"]; ?>"/>
               <!-- <input type="hidden" class="form-control input2" name="prodno"  placeholder="Enter your last name *"  required value="<?php echo @$prodno;?>"/>-->
            </div>

                      <div class="col-sm-5 form-group">
                          <label for="name-f">Block, Street, Subdivision</label>
                          <input type="text" class="form-control input2" name="address" id="address" placeholder="Locality/House/Street no. *" required value="<?php echo $row["Address"]; ?>"/>
                      </div>
                     <div class="col-sm-5 form-group">
                          <label for="province">Province</label>
                          <select id="province" name="Province">
                            <option selected="selected" value="" ><?php echo @$Province;?></option>
                          <!-- <option value="value" disabled>Select a province *</option> -->
                          <option value="Metro Manila"<?php if(isset($_POST['Province']) && $_POST['Province'] == "Metro Manila") echo 'selected="selected"';?>>Metro Manila</option>
                           <option value="Bulacan"<?php if(isset($_POST['Province']) && $_POST['Province'] == "Bulacan") echo 'selected="selected"';?>>Bulacan</option>
                         <!--  <option value="value1" disabled>Metro Manila</option>
                          <option value="value2" disabled>Bulacan</option> -->
                      </select>
                      </div>
                     <div class="col-sm-5 form-group">
                          <label for="city">City</label>
                          <select id="city" name="City">
                            <option selected="selected" value="" selected><?php echo @$City;?></option>
                          <!-- <option value="value">Select a city *</option> -->
                          <option value="Quezon City [Metro manila]"<?php if(isset($_POST['City']) && $_POST['City'] == "Quezon City [Metro manila]") echo 'selected="selected"';?>>Quezon City [Metro manila]</option>
                           <option value="Caloocan City [Metro manila]"<?php if(isset($_POST['City']) && $_POST['City'] == "Caloocan City [Metro manila]") echo 'selected="selected"';?>>Caloocan City [Metro manila]</option>
                           <option value="Marilao City [Bulacan]"<?php if(isset($_POST['City']) && $_POST['City'] == "Marilao City [Bulacan]") echo 'selected="selected"';?>>Marilao City [Bulacan]</option>

                          <!-- <option value="value1" disabled>Quezon City [Metro manila]</option>
                          <option value="value2" disabled>Caloocan City [Metro manila]</option>
                          <option value="value3" disabled>Marilao City [Bulacan]</option> -->
                      </select>
                      </div>
                     <div class="col-sm-5 form-group">
                          <label for="barangay">Barangay</label>
                          <select id="barangay" name="Barangay">
                            <option selected="selected" value="" selected><?php echo @$Barangay;?></option>
                          <!--<option value="value">Select a Barangay *</option>  -->
                          <option value="North Olympus Subd [Quezon City]"<?php if(isset($_POST['Barangay']) && $_POST['Barangay'] == "North Olympus Subd [Quezon City]") echo 'selected="selected"';?>>North Olympus Subd [Quezon City]</option>
                           <option value="Miramonte Heights Subdivision [Caloocan City]"<?php if(isset($_POST['Barangay']) && $_POST['Barangay'] == "Miramonte Heights Subdivision [Caloocan City]") echo 'selected="selected"';?>>Miramonte Heights Subdivision [Caloocan City]</option>
                           <option value="Loma De Gato [Marilao City]"<?php if(isset($_POST['Barangay']) && $_POST['Barangay'] == "Loma De Gato [Marilao City]") echo 'selected="selected"';?>>Loma De Gato [Marilao City]</option>
                           
                          <!-- <option value="value1" disabled>North Olympus Subd [Quezon City]</option>
                          <option value="value2" disabled>Miramonte Heights Subdivision [Caloocan City]</option>
                          <option value="value3" disabled>Loma De Gato [Marilao City]</option> -->
                      </select>
                      </div>
                      
                      
</div>
<br>
<hr>
<div class="row justify-content-center">  
                       <div class="col-sm-3 form-group">
                          <label for="Date">Delivery Date</label>
                           <input name = "deldate" type = "text" 
                            id = "date" required placeholder="Pick a delivery date *" onfocus="(this.type='date')" class="form-control input2" onblur="getDate();" max="2022-07-28" min="2022-07-13">
                      </div>

                       <div class="col-sm-2 form-group">
                          <label for="Date">Delivery Time</label>
                           <input name = "deltime" type = "text" id = "time" required placeholder="Pick a delivery time *" onfocus="(this.type='time')" class="form-control input2">
                      </div>

                      <div class="col-sm-5 form-group">
                          <label for="email">Email</label>
                          <input type="text" class="form-control input2" name="email" id="email" placeholder="Enter your email address *" required value="<?php echo $row["Email"]; ?>">
                      </div>

                      <div class="col-sm-5 form-group">
                          <label for="phone">Phone Number</label>
                          <input type="tel" class="form-control input2" name="phonenum" id="address" placeholder="Enter your number [1234-567-8901] *"  pattern="[0-9]{4}-[0-9]{3}-[0-9]{4}" required value="<?php echo $row["PhoneNum"]; ?>"/>
                      </div>

</div>
<hr>
<?php
                                            }
                                        
                                        ?>
                                         <?php
          function gen_uid($l=8){
          return substr(str_shuffle("0123456789"), 0, $l);
          }
          ?>
          <input type="hidden" name="orderid" readonly value ="<?php echo gen_uid(); ?>">

             




<div class=" btn col-sm-12 d-flex align-items-center justify-content-center">
                  <button type="submit" name="submit" class="btn btn-outline-dark2 title text-white" style=" background-color: #AF1D27; box-shadow: rgba(0, 0, 0, 0.45) 0px 25px 20px -20px; width: 180px; height: 50px; border: none;  border-radius: 50px;">
                    <div style="margin-top: 6px; font-weight: 600; font-size: 17px; letter-spacing: 1.5px;">
                      Continue
                    </div>
                  </button>
                  &nbsp;
                  <a href="" class="btn btn-outline-dark2 title text-white" style=" background-color: #474747; box-shadow: rgba(0, 0, 0, 0.45) 0px 25px 20px -20px; width: 180px; height: 50px; border: none;  border-radius: 50px;">
                    <div style="margin-top: 6px; font-weight: 600; font-size: 17px; letter-spacing: 1.5px;">
                      Go Back
                    </div>
                  </a>
                </div><br>
              </form>
<!-- End of Checkout -->
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
</body>
</html>
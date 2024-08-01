
<?php

session_start();

if (isset($_POST['checkout'])) 
{
    $Province = $_POST['Province'];
    $City = $_POST['City'];
    $Barangay = $_POST['Barangay'];
      $_SESSION['Province'] = $Province;
    //$_SESSION['Province']=$_GET['Province'];
    $_SESSION['City']=$_POST['City'];
    $_SESSION['Barangay']=$_POST['Barangay'];
   header("location: checkout.php");
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
<!--   <meta name="author" content="Sahil Kumar">
  <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Food Order Summary</title>
  <link rel="stylesheet" href="products-design.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <script type="text/javascript" src="js/bootstrap.bundle.js"></script>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css' />
  <style type="text/css">
    
    a {
      color: white;

    }

    a:hover {
      color: white;
      text-decoration: none;
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
  


<body>
  <nav class="navbar navbar-expand-md" style="background-color: #1c1c1c; height: 68px;">
    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Navbar links -->
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
          <button type="submit" name="submit" style="margin-top: 5px; border: 0px solid;"><a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"  style='color: #615f5f'></i> <span id="cart-item" class="badge badge-danger"></span></a></button>
        </li>
      </ul>
    </div>
  </nav>

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
<!-- <?php 
$Province=$_GET['Province'];
$City=$_GET['City'];
$Barangay=$_GET['Barangay'];
?>
<input type="text" name="Province" value="<?php echo @$Province;?>">                         
<input type="text" name="City" value="<?php echo @$City;?>">
<input type="text" name="Barangay" value="<?php echo @$Barangay;?>"> -->

<br><br>
  <div class="container"  style="background-color: #FEFEFE; box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div style="display:<?php if (isset($_SESSION['showAlert'])) {
  echo $_SESSION['showAlert'];
} else {
  echo 'none';
} unset($_SESSION['showAlert']); ?>" class="alert alert-success alert-dismissible mt-3">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong><?php if (isset($_SESSION['message'])) {
  echo $_SESSION['message'];
} unset($_SESSION['showAlert']); ?></strong>
        </div>
        <div class="table-responsive mt-2">
          <table class="table text-center" style="border-collapse: collapse; font-size: 14px">
            <thead>
              <tr>
                <td colspan="7" style="border: 0px solid transparent;">
                  <h4 class="text-left m-0 title" style="font-weight: bold; font-size: 30px; padding: 30px">My Cart</h4>
                </td>
              </tr>
              <tr style="border-bottom: 0px solid; font-size: 15px; color: dimgray; text-align: left; background-color: #F2F3F5; " class="title">
                <th style="padding: 30px; border: 0px solid transparent; text-align: center;">ID</th>
                <th style="padding: 30px; border: 0px solid transparent;">PRODUCT</th>
                <th style="padding: 30px; border: 0px solid transparent;">PRICE</th>
                <th style="padding: 30px; border: 0px solid transparent;">QUANTITY</th>
                <th style="padding: 30px; border: 0px solid transparent;">TOTAL PRICE</th>
                <th style="padding: 30px; border: 0px solid transparent;">
                <center><a href="action.php?clear=all" class="badge-danger badge p-1" onclick="return confirm('Are you sure want to clear your cart?');" style="background-color:  #AF1D27; padding: 2px 4px"><i class="fas fa-trash"></i>&nbsp;&nbsp;Clear Cart</a></center>
                </th>
              </tr>
            </thead>
            <tbody>
              <?php
                require 'conn.php';
                $stmt = $conn->prepare('SELECT * FROM cart');
                $stmt->execute();
                $result = $stmt->get_result();
                $grand_total = 0;
                while ($row = $result->fetch_assoc()):
              ?>
              <tr>
                <td style="padding: 36px"><?= $row['product_code'] ?></td>
                <input type="hidden" class="pid" value="<?= $row['product_code'] ?>">
                
                <td style="text-align: left; padding: 36px"><?= $row['product_name'] ?></td>
                <td style="padding: 36px">
                  <i class="fa-solid fa-peso-sign"></i>&nbsp;&nbsp;<?= number_format($row['product_price'],2); ?>
                </td>
                <input type="hidden" class="pprice" value="<?= $row['product_price'] ?>">
                <td style="padding: 36px">
                  <input type="number" class="form-control itemQty" value="<?= $row['qty'] ?>" style="width:75px;" onclick="toast('<?php echo $qtyerror; ?>')" min="0" oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null" name="qty">
                </td>
                <td style="text-align: left; padding: 36px"><i class="fa-solid fa-peso-sign"></i>&nbsp;&nbsp;<?= number_format($row['total_price'],2); ?></td>
                <td style="padding: 36px">
                  <a href="action.php?remove=<?= $row['product_code'] ?>" class="text-danger lead" onclick="return confirm('Are you sure want to remove this item?');" style="font-size: 17px; font-weight: 400;"><i class="fa-solid fa-xmark"></i></a>
                </td>
              </tr>
              <?php $grand_total += $row['total_price']; ?>
              <?php endwhile; ?>
              <tr>
                <td colspan="2" style="padding: 36px">
                  <a href="test2.php" class="btn" style="background-color:#F9AF41; color: #1c1c1c; padding: 8px 20px; font-weight: 500; font-size: 15px"><i class="fa-solid fa-angle-left"></i>&nbsp;Back to Menu</a>
                </td>
                <td colspan="2" style="padding: 36px"><b style="color: dimgray">Total Amount:</b></td>
                <td style="color:  #AF1D27; text-align: left; padding: 36px"><b><i class="fa-solid fa-peso-sign"></i>&nbsp;&nbsp;<?= number_format($grand_total,2); ?></b></td>
                <td style="padding: 36px">
                  <a href="checkout.php"><button type="submit" name ="checkout" class="btn text-white <?= ($grand_total > 0) ? '' : 'disabled'; ?>" style="background-color: #6E6E6DFF; border: 0px solid; font-weight: 500; font-size: 15px; padding: 8px 20px"><i class="fa-solid fa-credit-card" style="font-size: 13px"></i>&ensp;CHECKOUT</a></button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

    </div>
  </div>
  <br><br><br>
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
</form>
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

    // Change the item quantity
    $(".itemQty").on('change', function() {
      var $el = $(this).closest('tr');

      var pid = $el.find(".pid").val();
      var pprice = $el.find(".pprice").val();
      var qty = $el.find(".itemQty").val();
      location.reload(true);
      $.ajax({
        url: 'action.php',
        method: 'post',
        cache: false,
        data: {
          qty: qty,
          pid: pid,
          pprice: pprice
        },
        success: function(response) {
          console.log(response);
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
</body>

</html>
<?php

if(isset($_POST["checkout"]))
{



}
?>








<?php 
/* code by webdevtrick ( https://webdevtrick.com ) */
session_start();
$connect = mysqli_connect("localhost", "root", "", "ecombacsilog");

if(isset($_POST["add_to_cart"]))
{
  if(isset($_SESSION["shopping_cart"]))
  {
    $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
    if(!in_array($_GET["id"], $item_array_id))
    {
      $count = count($_SESSION["shopping_cart"]);
      $item_array = array(
        'item_id'     =>  $_GET["id"],
        'item_name'     =>  $_POST["hidden_name"],
        'item_price'    =>  $_POST["hidden_price"],
        'item_quantity'   =>  $_POST["quantity"]
      );
      $_SESSION["shopping_cart"][$count] = $item_array;
    }
    else
    {
      echo '<script>alert("Item Already Added")</script>';
    }
  }
  else
  {
    $item_array = array(
      'item_id'     =>  $_GET["id"],
      'item_name'     =>  $_POST["hidden_name"],
      'item_price'    =>  $_POST["hidden_price"],
      'item_quantity'   =>  $_POST["quantity"]
    );
    $_SESSION["shopping_cart"][0] = $item_array;
  }
}

if(isset($_GET["action"]))
{
  if($_GET["action"] == "delete")
  {
    foreach($_SESSION["shopping_cart"] as $keys => $values)
    {
      if($values["item_id"] == $_GET["id"])
      {
        unset($_SESSION["shopping_cart"][$keys]);
        echo '<script>alert("Item Removed")</script>';
        echo '<script>window.location="test1.php"</script>';
      }
    }
  }
}

?>
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
      grid-area: 1 / 1 / 3 / 3;; 
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
    font-family: EndzoneSlab Normal, arial;
    font-size: 16px;
  }
  .nav-pills .nav-link.active, .nav-pills .show >.nav-link{
    background-color: #ffc107;
    border-radius: 2rem!important;
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
  </style>
</head>
<!-- NAVIGATION BAR -->
<body>
  <form name="" action="" method="">
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
      <div style="color: white;   font-weight: 400;">
      <a class="a content" href="index.php" style="text-decoration: none; cursor: pointer;"> Profile </a> &nbsp;  <a href="regform.php" class="a content">Logout</a>
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
  <!-- START OF THE CHECK OF AREA DELIVERY -->
  <input type="text" <?php echo "value='".$_COOKIE["name"]."'"; ?> >
<div class="container-lg">
  <br>
   <div class="container-md border border-warning rounded" >
    <br><br>
      <h1 Class="d-flex align-items-center justify-content-center subtitle text-center" style="font-size: 40px; color: #292929; font-family: EndzoneSlab Normal, arial;"><b>CHECK TO SEE IF WE DELIVER IN YOUR AREA</h1></b>
      <br>        
      <div class="d-flex justify-content-center align-items-center">
        <select name="Province" id="province">
          <option value="" selected="selected">Select a province</option>
        </select> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <select name="City" id="city" disabled> 
          <option value="" selected="selected">Select City</option>
        </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <select class="Barangay" name="chapter" id="barangay" disabled>
          <option value="" selected="selected">Select Barangay</option>
        </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       <br><br> 
      </div><br> 
      <p class="d-flex align-items-center justify-content-center subtitle text-center"  style="color:  #1c1c1c;  font-size: 25px; font-family: EndzoneSlab Normal, arial;">Can't find your location? You might want to call 0956-889-5317.
      </p>
      <br>
   </div>
   <br><br>
   <div class="container-md" style="margin-bottom: 50px;"><br>
    <h1 Class="d-flex align-items-center justify-content-center subtitle text-center" style="font-size: 40px; color: #292929; font-family: EndzoneSlab Normal, arial;"><b>FOOD PRODUCTS</h1></b>
      <br>
   <div class="parent">
    <div class="div1"> 
      <!-- NAVIGATION FOR FOOD CATEGORY -->
      <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pills-SILOGS-tab" data-bs-toggle="pill" data-bs-target="#pills-SILOGS" type="button" role="tab" aria-controls="pills-SILOGS" aria-selected="true" name="Silog">SILOGS</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-SANDWHICHES-tab" data-bs-toggle="pill" data-bs-target="#pills-SANDWHICHES" type="button" role="tab" aria-controls="pills-SANDWHICHES" aria-selected="false" name="Sandwiches">SANDWHICHES</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-MUNCHEESE-tab" data-bs-toggle="pill" data-bs-target="#pills-MUNCHEESE" type="button" role="tab" aria-controls="pills-MUNCHEESE" aria-selected="false" name="Muncheese">MUNCHEESE</button>
        </li>
      <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-DESSERTS-tab" data-bs-toggle="pill" data-bs-target="#pills-DESSERTS" type="button" role="tab" aria-controls="pills-DESSERTS" aria-selected="false" name="Desserts">DESSERTS</button>
      </li>
      </ul>
    </form>
      <!-- END OF NAVIGATION FOR FOOD CATEGORY -->
      <!-- CONTENT FOR FOOD CATEGORY -->

      <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-SILOGS" role="tabpanel" aria-labelledby="pills-SILOGS-tab" name="Silog">
           <?php
           
        $query = "SELECT * FROM Silog";
       $result = mysqli_query($connect, $query);
        if(mysqli_num_rows($result) > 0)
        {
          while($row = mysqli_fetch_array($result))
        {
                  $Food_ID=$row['Food_ID'];           
                echo '
                    <form method="post" action="test1.php?action=add&id='.$Food_ID.'">
                         <div class="card product" style="width: 15rem; box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;" style="display: inline-block;">
                            <img src="data:image;base64,'.base64_encode( $row['FoodImg'] ).'" class="img-responsive" /><br />';
                            ?>
                            <div class="card-body">
                                
                                <h5 class="card-title"><?php echo $row["Food"]; ?></h4>

                                <p class="card-text price">₱<?php echo $row["Price"]; ?></p>

                                <input type="text" name="quantity" value="1" class="form-control" />

                               <input type="hidden" name="hidden_name" value="<?php echo $row["Food"]; ?>" />

                               <input type="hidden" name="hidden_price" value="<?php echo $row["Price"]; ?>" />

                                <button class="button-add2cart" name="add_to_cart" role="button" type="submit">Add to Cart</button>
                           </div>
        </form>
      </div>
      <?php
          }
        }
      ?>

          </div>
          <div class="tab-pane fade" id="pills-SANDWHICHES" role="tabpanel" aria-labelledby="pills-SANDWHICHES-tab" name="Sandwiches">
             <?php
           
        $query = "SELECT * FROM Sandwhiches";
       $result = mysqli_query($connect, $query);
        if(mysqli_num_rows($result) > 0)
        {
          while($row = mysqli_fetch_array($result))
        {
                  $Food_ID=$row['Food_ID'];           
                echo '
                    <form method="post" action="test1.php?action=add&id='.$Food_ID.'">
                         <div class="card product" style="width: 15rem; box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;" style="display: inline-block;">
                            <img src="data:image;base64,'.base64_encode( $row['FoodImg'] ).'" class="img-responsive" /><br />';
                            ?>
                            <div class="card-body">
                                
                                <h5 class="card-title"><?php echo $row["Food"]; ?></h4>

                                <p class="card-text price">₱<?php echo $row["Price"]; ?></p>

                                <input type="text" name="quantity" value="1" class="form-control" />

                               <input type="hidden" name="hidden_name" value="<?php echo $row["Food"]; ?>" />

                               <input type="hidden" name="hidden_price" value="<?php echo $row["Price"]; ?>" />

                                <button class="button-add2cart" name="add_to_cart" role="button" type="submit">Add to Cart</button>
                           </div>
        </form>
      </div>
      <?php
          }
        }
      ?>
          </div>
          <div class="tab-pane fade " id="pills-MUNCHEESE" role="tabpanel" aria-labelledby="pills-MUNCHEESE-tab">
               <?php
           
        $query = "SELECT * FROM Muncheese";
       $result = mysqli_query($connect, $query);
        if(mysqli_num_rows($result) > 0)
        {
          while($row = mysqli_fetch_array($result))
        {
                  $Food_ID=$row['Food_ID'];           
                echo '
                    <form method="post" action="test1.php?action=add&id='.$Food_ID.'">
                         <div class="card product" style="width: 15rem; box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;" style="display: inline-block;">
                            <img src="data:image;base64,'.base64_encode( $row['FoodImg'] ).'" class="img-responsive" /><br />';
                            ?>
                            <div class="card-body">
                                
                                <h5 class="card-title"><?php echo $row["Food"]; ?></h4>

                                <p class="card-text price">₱<?php echo $row["Price"]; ?></p>

                                <input type="text" name="quantity" value="1" class="form-control" />

                               <input type="hidden" name="hidden_name" value="<?php echo $row["Food"]; ?>" />

                               <input type="hidden" name="hidden_price" value="<?php echo $row["Price"]; ?>" />

                                <button class="button-add2cart" name="add_to_cart" role="button" type="submit">Add to Cart</button>
                           </div>
        </form>
      </div>
      <?php
          }
        }
      ?>
          </div>
          <div class="tab-pane fade" id="pills-DESSERTS" role="tabpanel" aria-labelledby="pills-DESSERTS-tab" name="Desserts">
             <?php
           
        $query = "SELECT * FROM Desserts";
       $result = mysqli_query($connect, $query);
        if(mysqli_num_rows($result) > 0)
        {
          while($row = mysqli_fetch_array($result))
        {
                  $Food_ID=$row['Food_ID'];           
                echo '
                    <form method="post" action="test1.php?action=add&id='.$Food_ID.'">
                         <div class="card product" style="width: 15rem; box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;" style="display: inline-block;">
                            <img src="data:image;base64,'.base64_encode( $row['FoodImg'] ).'" class="img-responsive" /><br />';
                            ?>
                            <div class="card-body">
                                
                                <h5 class="card-title"><?php echo $row["Food"]; ?></h4>

                                <p class="card-text price">₱<?php echo $row["Price"]; ?></p>

                                <input type="text" name="quantity" value="1" class="form-control" />

                               <input type="hidden" name="hidden_name" value="<?php echo $row["Food"]; ?>" />

                               <input type="hidden" name="hidden_price" value="<?php echo $row["Price"]; ?>" />

                                <button class="button-add2cart" name="add_to_cart" role="button" type="submit">Add to Cart</button>
                           </div>
        </form>
      </div>
      <?php
          }
        }
      ?>
          </div>
      </div>
    </div>
      <!-- END OF CONTENT FOR FOOD CATEGORY -->
      
    <div class="div2"> 
      <div class="cart-container">
        <h4>Your Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i></span></h4>
          <hr>
          <table>
            <table class="table table-bordered">
          <tr>
            <th width="40%">Item Name</th>
            <th width="10%">Quantity</th>
            <th width="20%">Price</th>
            <th width="15%">Total</th>
            <th width="5%">Action</th>
          </tr>
          <?php
          if(!empty($_SESSION["shopping_cart"]))
          {
            $total = 0;
            foreach($_SESSION["shopping_cart"] as $keys => $values)
            {
          ?>
          <tr>
            <td><?php echo $values["item_name"]; ?></td>
            <td><?php echo $values["item_quantity"]; ?></td>
            <td>₱ <?php echo $values["item_price"]; ?></td>
            <td>₱ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
            <td><a href="test1.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
          </tr>
          <?php
              $total = $total + ($values["item_quantity"] * $values["item_price"]);
            }
          }
          ?>
          
            
        </table>
        <hr>
        <h4>TOTAL AMOUNT: </h4>
        <p>₱ <?php echo number_format($total, 2); ?></p>
      <button class="button-checkout">Check Out</button>
    </div>
   </div>
</div>
</div>
</div>
 <!-- END OF CONTENT FOR FOOD CATEGORY -->


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
</script>
<!-- JAVASCRIPT -->
</form>
</body>
</html>
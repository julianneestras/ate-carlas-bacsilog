
<?php
error_reporting(0);
session_start();


         if(isset($_POST['addproduct'])) {

            include("conn.php");
            
            if(! $conn ) {
              
               die('Could not connect: ' . mysqli_error($conn));
            }  
               $Prodid = $_POST['Prodid'];
               $Prodcategory = $_POST['ProdCategory'];       
               $Prodname = ucwords($_POST['Prodname']);
               $Prodprice = $_POST['Prodprice'];
               $Prodqty = $_POST['Prodqty'];

               $Prodimage = $_FILES['image']['name'];
               $type = $_FILES['image']['type'];
               $data = addslashes(file_get_contents($_FILES['image']['tmp_name']));
              

              /* $type = $_FILES['image']['type'];
               $data = addslashes(file_get_contents($_FILES['image']['tmp_name']));*/
          
            
           

            if (empty($Prodid) || empty($Prodcategory) || empty($Prodname) ||empty($Prodprice) || empty($Prodqty)) {
                
                $fieldsempty = 'Please do not leave empty fields.';
            
            }else if (strlen($Prodname) < 3){
                
                $prodnameerror = 'Product name must not be less than 3 characters.';

            }else if(preg_match('/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/', $Prodname)){
              
                $prodnameerror2 = 'Invalid product name.';

            }else if ($Prodprice == 0){

                $priceerror = 'Price cannot be 0.';

            }else if ($Prodprice < 0){

                $priceerror2 = 'Price cannot be negative.'; 

            }else if ($Prodqty < 0){

                $qtyerror = 'Quantity cannot be negative.'; 

            }else if (empty($data)) {
                    
              $fileerror = 'No file selected.';

            }else {
               $productins = "INSERT INTO $Prodcategory "."(Food_ID, Category, Quantity, Food, Price, FoodImg) " . "VALUES('$Prodid','$Prodcategory','$Prodqty','$Prodname','$Prodprice','$data ')";

            $retval = mysqli_query( $conn,$productins );
            
            
              
              echo "<center><h3><script>alert('Product added.');</script></h3></center>";
              header("refresh:0;url=admindashboard.php#products");
              mysqli_close($conn);
            
        if(isset($_POST['submit']))
      { 
        include("conn.php");
        $P_ID=$_SESSION['P_ID'];
      }
            
    }
  }


?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  <link rel="icon" href="img/logo.png" type="image/x-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <link rel="stylesheet" href="index-splash-design.css">
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <script type="text/javascript" src="js/bootstrap.bundle.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <style type="text/css">


    body {
  background-color:  #FAF9F9;
  overflow-x: hidden;

}

  label {
    font-weight: 300;
    color: #615f5f;
    margin-top: 8px;
    line-height: 2;
    font-size: 13.6px;
  }

.content2 {
  font-family: Arial;
}
.clearfix:after {
  content: "";
  display: block;
  height: 0;
  width: 0;
  clear: both;
}


.admin-panel {
  width: 100%;

}
/*slidebar侧边栏*/
.slidebar {
  width: 20%;
  min-height: 1980px;
  float: left;
  border-right: 2px solid #902923;
  background-color: #AF1D27;

}
.slidebar .logo {
  height: 145px;
  border-bottom: 1px solid transparent;
}
.slidebar ul {
  padding: 0;
  margin: 0;
}
.slidebar li {
  list-style-type: none;
  margin: 0;
  position: relative;

}
.slidebar li:before {
  content: "";
  font-family: 'icomoon';
  speak: none;
  font-weight: normal;
  font-variant: normal;
  text-transform: none;
  position: absolute;
  display: block;
  line-height: 40px;
  right: 20px;
  -webkit-font-smoothing: antialiased;
}

.slidebar ul a {
  color: white;
  text-decoration: none;
  border-bottom: 1px solid #AF1D27;
  display: block;
  text-indent: 20px;
  text-transform: capitalize;
  padding: 14px;

}
.slidebar li:hover a {
  background-color: #faf9f9;
  box-shadow: 1px 0 0 rgb(255,255,255),inset 5px 0 0 -1px rgb(234,83,63);
  color: #AF1D27;
}
/*main*/
.main {
  float: left;
  width: 80%;
  height: 690px;
  background-color: #faf9f9;
}
.main .topbar {
  border-bottom: 1px solid rgb(235,235,235);
  margin: 0;
  padding: 0;
}
/*topbar顶部按钮栏*/
.topbar li {
  float: right;
  list-style: none;
  z-index: 70;
  position: relative;
}
.topbar li:first-child {float: left;}
.topbar a {
  display: block;
  line-height: 50px;
  width: 50px;
  text-align: center;
  text-decoration: none;
  color: rgb(102,102,102);
  border-left: 1px solid rgb(235,235,235);
}
.topbar a:hover {
  background-color: rgb(247,247,247);
}
.topbar li:first-child a {
  border: none;
  border-right: 1px solid rgb(235,235,235);
}
/*mainContent*/
.mainContent h4 {
  line-height: 1;
  font-size: 18px;
  margin: 1.3em 0 1em;
  margin-left: 17px;
}
 
.mainContent>div {
  position: absolute;
  opacity: 0;
  -webkit-transition:opacity 200ms linear;
  -moz-transition:opacity 200ms linear;
  -ms-transition:opacity 200ms linear;
  transition:opacity 200ms linear;
}

.mainContent>div:target {
  opacity: 1;

}
.mainContent h2 {
  margin:1em 30px;
  color: rgb(234,83,63);
  font-size: 20px;
}
.mainContent h2:before {
  font-family: 'icomoon';
  content: attr(data-icon);
  font-weight: normal;
  font-variant: normal;
  text-transform: none;
  line-height: 1;
  margin-right: 10px;
  -webkit-font-smoothing: antialiased;
}

 
#dashboard>div {
  margin-left:  20px;
  float: left;
  border-radius: 5px;
  min-width: 100%;
  height: 262px;
  z-index: 60;
  position: relative;

}

#orders>div {
  margin-left:  20px;
  float: left;
  border-radius: 5px;
  min-width: 100%;
  height: 262px;
  z-index: 50;
  position: relative;

}

#products>div {
  margin-left:  20px;
  float: left;
  border-radius: 5px;
  min-width: 100%;
  height: 262px;
  z-index: 40;
  position: relative;

}

#customers>div {
  margin-left:  20px;
  float: left;
  border-radius: 5px;
  min-width: 100%;
  height: 262px;
  z-index: 30;
  position: relative;

}

#admin>div {
  margin-left:  20px;
  float: left;
  border-radius: 5px;
  min-width: 100%;
  height: 262px;
  z-index: 20;
  position: relative;

}

#profile>div {
  margin-left:  20px;
  float: left;
  border-radius: 5px;
  min-width: 100%;
  height: 262px;
  z-index: 10;
  position: relative;

}

/*logo*/
.logo a {
  display: inline-block;
  position: relative;
  left: 50%;
  top: 50%;
  margin: -45px 0 0 -45px;
  border: 1px solid #AF1D27;
  border-radius: 50%;
}

.dropdown-content {
  display: none;
  position: relative;
  background-color: #bf2a34;
  color: white;
  min-width: 100%;
  overflow: auto;
/*  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);*/
  z-index: 1;
  cursor: pointer;
}

.dropdown-content a {
  color: black;
  padding: 0px 0px;
  text-decoration: none;
  display: block;
}

.dropdown a:hover {background-color: #ddd;}

.show {display: block; margin-left: 0;}


.dropdown-content2 {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 150px;
    font-size: 14px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content2 a {
  float: none;
  color: black;
  padding: 2px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content2 a:hover {
  background-color: #ddd;
  width: 100%;
}

.dropdown2:hover .dropdown-content2 {
  display: block;
}

.hide {
  display: none;
}
    
.myDIV:hover + .hide {
  display: block;
  color: white;
  font-size: 11.5px;
  padding: 6px 11px;
  background: rgba(0,0,0,0.7);
  border-radius: 5vh;
  box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;
  position: absolute;
  z-index: 100;
  margin-left: -13px;
}

.conbox {

  background-color: white;    
  text-align: left;
  padding: 30px 20px;
  border-radius: 5px;
  box-shadow: rgba(33, 35, 38, 0.1) 0px 10px 10px -10px;
}

.button1 {
  background-color: lightgrey;
  width: 30%;
  padding: 30px 10px;
  display: inline-block;
  border: 0px solid transparent;
  text-decoration: none;
  vertical-align: top;
  text-align: left;
  color: whitesmoke;
  box-shadow: rgba(33, 35, 38, 0.1) 0px 10px 10px -10px;
  font-weight: normal;

}

.feedback {
  background-color: #FCFAE6;
  border: 1px solid #E4D232;
  font-size: 12px;
  color: dimgray;
  padding: 10px 20px;

}

.feedback2 {
  background-color: #4CAF50;
  border: 1px solid #228C27;
  font-size: 12px;
  color: dimgray;
  padding: 10px 20px;

}

    input[type=submit],  input[type=button] {
          background-color: #828282;
          border: none;
          color: #fff;
          padding: 15px 30px;
          text-decoration: none;
          margin: 4px 2px;
          cursor: pointer;
          font-size: 14px;
          width: 25%;
          font-weight: 500;
          box-shadow: box-shadow: 0 0 6px #1c1c1c;
          float: right;

      }

input[type=text], input[type=password], select, input[type=number], input[type=date], input[type=tel] {
  border-radius: 1vh; 
  border: 1px solid lightgray; 
  padding: 8px; 
  font-size: 14px;
  width: 100%;
  background-color:  #f9f9f9;
}

  .input2[type=text], .input2[type=password], select, .input2[type=date], .input2[type=email], .input2[type=tel], .input2[type=number]   {
      padding: 8px;
      border-radius: 1vh;
      width: 100%;
      background-color:  #f9f9f9;
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

    .validationlabel2 {
    color: #B3302E;
    width: 100%;
/*    border-bottom: 2px solid  #C95752;*/
    font-size: 13px;
    margin-top: 3px;
   }
</style>
</head>
<body>
  <form action="<?php $_PHP_SELF ?>" method="POST" name="overall" enctype="multipart/form-data" >
 <div class="container-fluid xl mw-100 no-padding" style="background-image: url(img/aloginbg1.png);">
  <div class="row">
     <nav class="navbar navbar-expand-sm navbar-light px-5" style="height: 70px; background-color:  #AF1D27;
box-shadow: rgba(28, 28, 28, 0.45) 0px 25px 20px -20px;">
    <div class="container-fluid">

      <a href="index.php"><img src="img/logo.png" height="46" class="ps-5"></a>
    <a class="navbar-brand" style="font-weight: bolder; color: whitesmoke;margin-left: 10px; border: 2px solid white; padding: 10px; border-radius: 5vh; font-size: 14px;">ADMIN PANEL</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
      <ul class="navbar-nav ">
      <li class="nav-item">
        <a class="nav-link active content" aria-current="page" href="admindashboard.php#profile" style="color:#faf9f9; font-size: 15px; ">Profile <i class='fas fa-user-circle' style="font-size: 18px"></i></a>
      </li>    
      </ul>     
    </div>
    </div>
  </nav>
</div>
</div>

<!-- Sidebar Panel -->
<div class="admin-panel clearfix title">
  <div class="slidebar">
    <div class="logo">
      <br><br>
      <center>
        <img src="img/adminn1.png" height="90" width="90">
      </center>
    </div>
    <br>
    <ul>
      <li><a href="#dashboard" id="targeted">
        <i class="fa fa-dashboard"></i>&ensp;dashboard </a></li>
      <li><a href="#orders"><i class="fa-solid fa-clipboard-list"></i>&ensp;Orders</a></li>
      <li><a href="#products"><i class="fa-solid fa-box"></i>&ensp;Products</a></li>
      <div class="dropdown">
    <li><a onclick="myFunction()" class="dropbtn" style="cursor: pointer;"><i class="fa-regular fa-user"></i>&ensp;Users 
      <i class="fa-solid fa-caret-down" style="margin-left: 85px;"></i></a></li>
  <div id="myDropdown" class="dropdown-content">
    <li><a href="#customers">&emsp;&emsp;&ensp; > Customers</a></li>
    <li><a href="#admin">&emsp;&emsp;&ensp; > Admin</a></li>
    </div>
    <li><a href="#profile"><i class="fa-regular fa-address-card"></i>&ensp;Profile</a></li>
  </div>
      <li><a href="adminlogin.php" onclick="return confirm('Are you sure want to logout?');" ><i class="fa-solid fa-right-from-bracket"></i>&ensp;Logout</a></li>
    </ul>
  </div>
<!-- Sidebar Panel -->

<!-- Topbar -->
  <div class="main title">
    <ul class="topbar clearfix">     
      <li>
        <div class="myDIV"><a href="#dashboard"><i class="fa fa-dashboard" style="color: dimgray"></i></div></a>
        <div class="hide">Dashboard</div>
      </li>

      <li>
        <div class="myDIV"><a href="adminlogin.php" onclick="return confirm('Are you sure want to logout?');" ><i class="fa-solid fa-right-from-bracket"></i></div></a>
        <div class="hide">Logout</div>
      </li>

      <li>
        <div class="myDIV"><a href="#orders"><i class="fa-solid fa-check-to-slot" style="color: dimgray"></i></div></a>
        <div class="hide">Manage&nbsp;Orders</div>
      <li>
        <div class="dropdown2">
          <div class="myDIV"><a onclick="myFunction2()"><i class="fa-solid fa-pen-to-square" style="color: dimgray;"></i></div></a>
          <div class="hide">Edit</div>
          <div class="dropdown-content2">
          <a href="adminproducts.php">Products</a>
          <a href="adminusers.php">Users</a>
          <a href="adminadmin.php">Admin</a>

        </div>
      </li>
      <li>
        <div class="dropdown2">
          <div class="myDIV"><a onclick="myFunction2()"><i class="fa-solid fa-circle-plus" style="color: dimgray;"></i></div></a>
          <div class="hide">Add</div>
          <div class="dropdown-content2">
          <a href="#products">Products</a>
          <a href="addadminadmin.php">Admin</a>
        </div>
      </li>

      <?php
        $A_Username=$_SESSION['A_Username'];
         
      ?>
      
      <a style="width: 20%;">Hello,  <?php echo "$A_Username";?>!</a>
      <?php ?>
    </ul>
<!-- Topbar -->

<!-- Dashboard -->
      <div class="row title">
      <div class="mainContent clearfix">
      <div id="dashboard" class="col-md-9">
        <h2 class="header"><span class="icon"></span>Dashboard</h2>
        <div class="row">
          <table border="0" width="100%" cellpadding="10" cellspacing="0" align="center">
            <tr>
              <td colspan="2">
                <div class="conbox">
                  <font style="font-weight: 300; font-size: 24px; color: #615f5f;">Welcome to Your Dashboard</font><br><br>
                  <p style="color:#c0c0c0; font-size: 15px" class="content2">
                    ➤ <font color="#615f5f">&nbsp;Start the day by processing orders or managing your products  now.</font><br>
                    ➤ <font color="#615f5f">&nbsp;Check your orders from time to time to avoid cancellation of orders from your customers.</font><br>

                    <center class="title">
                    <a href="#orders"><button class="button1" style="background-image: url(img/pink1.png);">
                      Process Orders <br><br><br><br><br>
                    </button></a>
                    <a href="#products"><button class="button1" style="background-image: url(img/yellow1.png);">
                      Check Product<br><br><br><br><br> </button></a>
                    <a href="#customers"><button class="button1" style="background-image: url(img/blue1.png);">
                      Manage Customers
                      <br><br><br><br><br>
                    </button></a>
                  </center>
                  </p>
                </div>
              </td>
            </tr>
            <!-- Dummy Posts -->
            <tr>
              <td width="50%">
                <div class="conbox">
                   <font style="font-weight: 300; font-size: 24px; color: #615f5f;">Posts</font><br><br>
                    <p style="color:#c0c0c0; font-size: 15px" class="content2">
                    ➤ <font color="#38a85c"><b>&nbsp;2478</b></font><font color="#615f5f"> Published Posts</font><br>
                    ➤<font color="#38a85c"><b>&ensp;353</b></font><font color="#615f5f"> Comments (Customer Reviews)</font><br>
                    ➤<font color="#38a85c"><b>&ensp;0</b></font><font color="#615f5f"> Pending</font><br>
                    ➤<font color="#615f5f">&ensp;Most popular post:</font><font color="#38a85c"><b> Your go-to breakfast. </b></font><br><br>
                   </p>
                </div>
              </td>
              <!-- Feedback Notification -->
              <td width="50%">
                <div class="conbox">
                  <font style="font-weight: 300; font-size: 24px; color: #615f5f;">Feedback</font><br><br>

                  <p class="feedback content2">
                    <i class="fa-solid fa-circle-info" style="font-size: 12px; color: #E4D232"></i>&emsp;Some of your orders have not been processed yet. Process it <a href="#orders" style="color: dodgerblue;">now</a> before it gets too late. 
                  </p>

                  <p class="feedback2 content2" style="color: #faf9f9;">
                    <i class="fa-solid fa-thumbs-up" style="font-size: 12px; color: #faf9f9;"></i>&emsp;Hooray! One of your customer give you a positive feedback!
                  </p>
                </div>
              </td>
            </tr>
            <td colspan="2">
                <div class="conbox">
            <!-- Customer Table -->
            <?php
            include("conn.php");
            $q1="SELECT * FROM orders ORDER BY DelDate " or die('Error223');
            $result = mysqli_query($conn, $q1);
            echo'
            <font style="font-weight: 300; font-size: 24px; color: #615f5f;">Customers Order Table</font><br><br>
            <table border="0" width="100%" cellpadding="10" cellspacing="0" align="center" style=" border: 0px solid; border-collapse: collapse;">
                    <tr style="font-size: 13px; color: dimgrey;  border-bottom: 1px solid #c0c0c0;">
                      <td>ORDER ID</td>
                      <td>CUSTOMER FIRST NAME</td>
                      <td>CUSTOMER LAST NAME</td>
                      <td>ORDER(s)</td>
                      <td>DATE ORDERED</td>
                      <td>DELIVERY DATE</td>
                      <td>STATUS</td>
                    </tr>
                    <tr>';
                    while($row=mysqli_fetch_array($result) )
                    {
                      $OrderID=$row['OrderID'];
                      $fname=$row['fname'];
                      $lname=$row['lname'];
                      $order=$row['products'];
                      $dateorder=$row['orderdate'];
                      $date=$row['DelDate'];
                      $status=$row['status'];
                      
                      //$Status=$row['Status'];

                      echo'
                      <tr style="font-size: 15px; color: #615f5f; " class="content2">
                      <td>'. $OrderID.'</td>
                      <td>'.$fname.'</td>
                      <td>'. $lname.'</td>
                      <td>'.$order.'</td>
                      <td>'.$dateorder.'</td>
                      <td>'.$date.'</td>
                      <td>'.$status.'</td>
                      
                    </tr>';
                  }
                  echo '</table>';
              ?>
            </div>
          </td>
      </tr>
      </table>
  </div>
</div>
<!-- Dashboard -->

<!-- Orders -->
       <div id="orders" class="col-md-9">
         <h2 class="header"><span class="icon"></span>Manage Orders</h2>
        <div class="row mx-4">
            <table border="0" width="100%" cellpadding="10" cellspacing="0" align="center">
            <tr>
              <td colspan="2">
                <div class="conbox content2">
                  <font style="font-weight: 300; font-size: 24px; color: #615f5f;">Orders Table</font>
                  <font style="font-size: 14px; color: #615f5f">&nbsp;Manage Orders</font><br><br>
                  <!-- Search Bar -->

                  <input type="text" id="searchresult" placeholder="🔍︎ Search..." name="searchbar" value=""style="border-radius: 1vh; border: 1px solid lightgray; padding: 6px 15px; font-size: 14px; width: 40%; float: left;" >
                  <input type="submit" value="🔍︎ Search" name="searchsubmit" class="title" style="width: 10%; padding: 6px 10px; float: left; margin-left: 10px; font-size: 12px; border-radius: 1vh">
                  <!-- Search Bar -->

                  <a href="adminorders.php"><button type="button" style="background-color:#828282; border: 0px solid; font-size: 12px; padding: 8px 10px; color: white; border-radius: 1vh; float: right; margin-left: 5px"><i class="fa-solid fa-truck-fast"></i>&emsp;Process Orders</button></a>
                    <br><br>
                    <center class="title">

                      <!-- Display Table Design -->
                       <?php

                  if (isset($_POST['searchsubmit'])) {
                    $search = trim($_POST['searchbar']);
                    $search = mysqli_real_escape_string($conn, $search);
                    $searchquery = "SELECT * FROM orders WHERE OrderID LIKE '%$search%' OR Status LIKE '%$search%'";
                    $search_query = mysqli_query($conn, $searchquery);
                    if (!$search_query) {
                      die("Query Failed" . mysqli_error($conn));
                    }
                    $count = mysqli_num_rows($search_query);
                    if ($count == 0) {
                      echo 'NO RESULTS
                       <input type="submit" value="🡰 Back to Records" name="backorders" class="title" style="width: 10%; padding: 6px 10px; float: right; margin-left: 10px; border-radius: 1vh; background-color: transparent; color:  #3498DB; font-size: 14.5px; font-weight: 600; margin-top: 10px; width: 17%">';
                    } else {
                      echo'
                      <table border="0" width="100%" cellpadding="7" cellspacing="0" align="center" style=" border: 0px solid; border-collapse: collapse;">
                    <tr style="font-size: 13px; color: dimgrey;  border-bottom: 2px solid #E6E8EB; background-color: #F7F7F7;">
                       <td><i class="fa-solid fa-list-ol" style="font-size: 12px; color: #cccaca;"></i></i>&emsp;ORDER ID</td>
                      <td><i class="fa-solid fa-id-badge" style="font-size: 12px; color: #cccaca;"></i></i>&emsp;CUSTOMER ID</td>
                      <td><i class="fa-solid fa-user" style="font-size: 12px; color: #cccaca;"></i>&emsp;FIRST NAME</td>
                      <td> <style="font-size: 12px; color: #cccaca;"></i>&emsp;LAST NAME</td>
                      <td><i class="fa-solid fa-cheese" style="font-size: 12px; color: #cccaca;"></i>&emsp;ORDER(s)</td>
                      <td><i class="fa-solid fa-calendar-check" style="font-size: 12px; color: #cccaca;"></i>&emsp;DATE ORDERED</td>
                      <td><i class="fa-solid fa-calendar-days" style="font-size: 12px; color: #cccaca;"></i>&emsp;DELIVERY DATE</td>
                      <td><i class="fa-solid fa-paper-plane" style="font-size: 12px; color: #cccaca;"></i>&emsp;STATUS</td>
                      <td style="text-align: center"><i class="fa-solid fa-location-crosshairs" style="font-size: 12px; color: #cccaca;"></i>&emsp;ACTION</td>
                    </tr>';
                      ?>
                      
                    <?php
                     while($row=mysqli_fetch_array($search_query) )
                    {

                     $OrderID=$row['OrderID'];
                      $CustID=$row['CustID'];
                      $fname=$row['fname'];
                      $lname=$row['lname'];
                      $order=$row['products'];
                      $dateorder=$row['orderdate'];
                      $date=$row['DelDate'];
                      $status=$row['status'];
                      echo'
                     <tr style="font-size: 13px; color: #615f5f; border-bottom: 1px solid #F3F3F3; " class="content2">
                      <td>'.$OrderID.'</td>
                      <td>'.$CustID.'</td>
                      <td>'.$fname.'</td>
                      <td>'. $lname.'</td>
                      <td>'.$order.'</td>
                      <td>'.$dateorder.'</td>
                      <td>'.$date.'</td>
                      <td>'.$status.'</td>';
                      echo "<td><center><a href='adminordersperpage.php?OrderID=".$row["OrderID"]."'>View</a></center></td>";

                   echo' </tr>';
                    ?>
                    <?php
                  }
                  echo'</table>
                  <input type="submit" value="🡰 Back to Records" name="backorders" class="title" style="width: 10%; padding: 6px 10px; float: right; margin-left: 10px; border-radius: 1vh; background-color: transparent; color:  #3498DB; font-size: 14.5px; font-weight: 600; margin-top: 10px; width: 17%">';
                }
              }else{
                 include("conn.php");
                        $q1="SELECT * FROM orders ORDER BY DelDate " or die('Error223');
                        $result = mysqli_query($conn, $q1);
                        echo'
                      <table border="0" width="100%" cellpadding="10" cellspacing="0" align="center" style=" border: 0px solid; border-collapse: collapse; margin-top: 10px">
                    <tr style="font-size: 13px; color: dimgrey;  border-bottom: 2px solid #E6E8EB; background-color: #F7F7F7;">
                      <td><i class="fa-solid fa-list-ol" style="font-size: 12px; color: #cccaca;"></i></i>&emsp;ORDER ID</td>
                      <td width=80><i class="fa-solid fa-id-badge" style="font-size: 12px; color: #cccaca;"></i></i>&emsp;CUSTOMER ID</td>
                      <td width=20><i class="fa-solid fa-cheese" style="font-size: 12px; color: #cccaca;"></i>&emsp;ORDER(S)</td>
                      <td style="text-align: center"><i class="fa-solid fa-calendar-check" style="font-size: 12px; color: #cccaca;"></i>&emsp;DATE ORDERED</td>
                      <td style="text-align: center"><i class="fa-solid fa-calendar-days" style="font-size: 12px; color: #cccaca;"></i>&emsp;DELIVERY DATE</td>
                      <td style="text-align: center"><i class="fa-solid fa-paper-plane" style="font-size: 12px; color: #cccaca;"></i>&emsp;STATUS</td>
                      <td style="text-align: center"><i class="fa-solid fa-location-crosshairs" style="font-size: 12px; color: #cccaca;"></i>&emsp;ACTION</td>
                    </tr>';

                     while($row=mysqli_fetch_array($result) )
                    {
                      $OrderID=$row['OrderID'];
                      $CustID=$row['CustID'];
                      $order=$row['products'];
                      $dateorder=$row['orderdate'];
                      $date=$row['DelDate'];
                      $status=$row['status'];
                      echo'
                     <tr style="font-size: 13px; color: #615f5f; border-bottom: 1px solid #F3F3F3; " class="content2">
                      <td>'.$OrderID.'</td>
                      <td>'.$CustID.'</td>
                      <td>'.$order.'</td>
                      <td style="text-align: center">'.$dateorder.'</td>
                      <td style="text-align: center">'.$date.'</td>
                      <td style="text-align: center">'.$status.'</td>';
                      echo "<td><center><a href='adminordersperpage.php?OrderID=".$row["OrderID"]."'>View</a></center></td>";
                    echo'</tr>';
                  }
                  echo '</table><br><br>';
                  }
                  ?>

                    <Br>

                    </center>
                  </p>
                </div>
              </td>
            </tr>
          </table>
        </center>
      </div>
    </div>
<!-- End Orders -->

<!-- Products -->
       <div id="products" class="col-md-9" style="z-index: 4;">
         <h2 class="header"><span class="icon"></span>Manage Products</h2>
        <div class="row mx-4">
           
            <table border="0" width="100%" cellpadding="10" cellspacing="0" align="center">
            <tr>
              <td colspan="2">
                <div class="conbox content2">
                  <!-- Add Products -->
                  <font style="font-weight: 300; font-size: 24px; color: #615f5f;">Product Inventory</font>
                  <font style="font-size: 14px; color: #615f5f">Add Product</font>
                    <br><br>

                      <?php if(isset($fieldsempty)) { ?>
                      <p class="validationlabel2"> <?php echo $fieldsempty; ?></p>
                      <?php } ?>

                      <?php if(isset($prodnameerror)) { ?>
                      <p class="validationlabel2"> <?php echo $prodnameerror; ?></p>
                      <?php } ?>

                      <?php if(isset($prodnameerror2)) { ?>
                      <p class="validationlabel2"> <?php echo $prodnameerror2; ?></p>
                      <?php } ?>

                      <?php if(isset($fileerror)) { ?>
                      <p class="validationlabel2"> <?php echo $fileerror; ?></p>
                      <?php } ?>

                      <?php if(isset($priceerror)) { ?>
                      <p class="validationlabel2"> <?php echo $priceerror; ?></p>
                      <?php } ?>

                      <?php if(isset($priceerror2)) { ?>
                      <p class="validationlabel2"> <?php echo $priceerror2; ?></p>
                      <?php } ?>


                      <?php if(isset($qtyerror)) { ?>
                      <p class="validationlabel2"> <?php echo $qtyerror; ?></p>
                      <?php } ?>

                    <div class="title">
                        <table border="0" width="100%" cellpadding="10" cellspacing="0" align="center" style=" border: 0px solid;">
                          <td width="15%">
                            <?php

                              function Prodid($l=8)
                              {
                              return substr(str_shuffle("0123456789"), 0, $l);
                              }
                            ?>

                            <h5 style="font-size: 14px; font-weight: 400">Product ID</h5>
                            <input type="text" placeholder="Product ID" name="Prodid" style="border-radius: 1vh; border: 1px solid lightgray; padding: 6px 15px; font-size: 12px; width: 100%; background-color: #EEEEEE; color: #808080" value ="<?php echo Prodid(); ?>">
                          </td>
                          </td>
                          <td>
                            <h5 style="font-size: 14px; font-weight: 400">Product Name</h5>
                          <input type="text" placeholder="Product Name" name="Prodname" style="border-radius: 1vh; border: 1px solid lightgray; padding: 6px 15px; font-size: 12px; width: 100%" value="<?php if(isset($_POST['Prodname'])){echo $_POST['Prodname'];} ?>">
                          </td>
                           <td>
                            <h5 style="font-size: 14px; font-weight: 400">Category</h5>
                            <select name="ProdCategory" id="cars" style="border-radius: 1vh; border: 1px solid lightgray; padding: 6px 15px; font-size: 12px; width: 100%;">
                             <!--  <option value="selectcategory" hidden style="color: gray;">Select Category</option> -->
                              <option value="Muncheese" <?php echo (isset($_POST['ProdCategory']) && $_POST['ProdCategory'] === 'Muncheese') ? 'selected' : ''; ?>>Muncheese</option>
                              <option value="Silog" <?php echo (isset($_POST['ProdCategory']) && $_POST['ProdCategory'] === 'Silog') ? 'selected' : ''; ?>>Silog</option>
                              <option value="Desserts" <?php echo (isset($_POST['ProdCategory']) && $_POST['ProdCategory'] === 'Desserts') ? 'selected' : ''; ?>>Desserts</option>
                              <option value="Sandwiches" <?php echo (isset($_POST['ProdCategory']) && $_POST['ProdCategory'] === 'Sandwiches') ? 'selected' : ''; ?>>Sandwiches</option>
                            </select>
                          </td>
                          <td width="10%">
                            <h5 style="font-size: 14px; font-weight: 400">Price</h5>
                             <input type="number" placeholder="Price" name="Prodprice" style="border-radius: 1vh; border: 1px solid lightgray; padding: 6px 15px; font-size: 12px;" value="<?php echo $_POST['Prodprice'] ?? ''; ?>">
                          </td>
                          <td width="10%">
                            <h5 style="font-size: 14px; font-weight: 400">Qty</h5>
                             <input type="number" placeholder="Qty" name="Prodqty" style="border-radius: 1vh; border: 1px solid lightgray; padding: 6px 15px; font-size: 12px;" value="<?php echo $_POST['Prodqty'] ?? ''; ?>">
                          </td>
                          <!-- File Upload Products -->
                          <td class="content2" width="20%">
                              <input type="file" id="myFile" name="image" style="font-size: 12px;">
                              <input type="submit" value="Add Product" class="title" name="addproduct" style="font-size: 12px; float: right; background-color:#F8F8FA; border: 0px solid; font-size: 12px; padding: 5px 10px; color: #1c1c1c; border-radius: 1vh; width: 50%;">
                          </td>
                        </tr>
                         <td>
                    <!-- Products Table -->
                    <tr>
                      <!-- Display Table Design -->
                    <table border="0" width="100%" cellpadding="10" cellspacing="0" align="center" style=" border: 0px solid; border-collapse: collapse; margin-top: -5px;">
                    <hr style="margin-top: 0px">

                      <font style="font-size: 14px; color: #615f5f" class="content2">Products Table</font> <br><br>
                      <!-- Search Bar -->

                    <input type="text" id="searchresult" placeholder="🔍︎ Search..." name="searchbarprod" style="border-radius: 1vh; border: 1px solid lightgray; padding: 6px 15px; font-size: 14px; width: 40%; float: left;" >
                  <input type="submit" value="🔍︎ Search" name="searchsubmitproducts" class="title" style="width: 10%; padding: 6px 10px; float: left; margin-left: 10px; font-size: 12px; border-radius: 1vh">
                    <!-- Search Bar -->
                    <a href="adminproducts.php"><button type="button" style="background-color:#828282; border: 0px solid; font-size: 12px; padding: 8px 10px; color: white; border-radius: 1vh; float: right;"><i class="fa-solid fa-plus"></i>&emsp;Manage All Products</button></a>

                    <!-- Display Table Design AND SEARCH SA ORDERS START-->
                   <?php
                  if (isset($_POST['searchsubmitproducts'])) {
                    $search = trim($_POST['searchbarprod']);
                    $search = mysqli_real_escape_string($conn, $search);
                    //$searchquery = "SELECT * FROM silog WHERE Food_ID LIKE '%$search%' OR Food LIKE '%$search%'";
                    $searchquery = "(SELECT * FROM silog WHERE Food_ID LIKE '%" . 
                     $search . "%' OR Food LIKE '%" . $search ."%' OR Category LIKE '%" . $search ."%') 
                     UNION
                     (SELECT * FROM muncheese WHERE Food_ID LIKE '%" . 
                     $search . "%' OR Food LIKE '%" . $search ."%' OR Category LIKE '%" . $search ."%') 
                     UNION
                     (SELECT * FROM desserts WHERE Food_ID LIKE '%" . 
                     $search. "%' OR Food LIKE '%" . $search ."%' OR Category LIKE '%" . $search ."%')
                     UNION
                     (SELECT * FROM sandwiches WHERE Food_ID LIKE '%" . 
                     $search. "%' OR Food LIKE '%" . $search ."%' OR Category LIKE '%" . $search ."%')";

                    $search_query = mysqli_query($conn, $searchquery);
                    if (!$search_query) {
                      die("Query Failed" . mysqli_error($conn));
                    }
                    $count = mysqli_num_rows($search_query);
                    if ($count == 0) {
                      echo 'NO RESULTS
                       <input type="submit" value="🡰 Back to Records" name="backorders" class="title" style="width: 10%; padding: 6px 10px; float: right; margin-left: 10px; border-radius: 1vh; background-color: transparent; color:  #3498DB; font-size: 14.5px; font-weight: 600; margin-top: 10px; width: 17%">';
                    } else {
                      echo'
                      <table border="0" width="100%" cellpadding="10" cellspacing="0" align="center" style=" border: 0px solid; border-collapse: collapse; margin-top: 65px ">
                      <tr style="font-size: 13px; color: dimgrey;  border-bottom: 2px solid #E6E8EB; background-color: #F7F7F7;">
                      <td><i class="fa-solid fa-list-ol" style="font-size: 12px; color: #cccaca;"></i></i>&emsp;FOOD ID</td>
                      <td><i class="fa-solid fa-list-ol" style="font-size: 12px; color: #cccaca;"></i></i>&emsp;CATEGORY</td>
                      <td><i class="fa-solid fa-bowl-food" style="font-size: 12px; color: #cccaca;"></i>&emsp;PRODUCT NAME</td>
                      <td style="text-align: center"><i class="fa-solid fa-question" style="font-size: 12px; color: #cccaca;"></i>&emsp;QUANTITY</td>
                      <td style="text-align: center"><i class="fa-solid fa-calendar-days" style="font-size: 12px; color: #cccaca;"></i>&emsp;PRICE</td>
                      <td style="text-align: center"><i class="fa-solid fa-location-crosshairs" style="font-size: 12px; color: #cccaca;"></i>&emsp;ACTION</td>
                      </tr>';
                      ?>
                      
                    <?php
                     while($row=mysqli_fetch_array($search_query) )
                    {

                      $Food_ID=$row['Food_ID'];
                      $Category=$row['Category'];
                      $Food=$row['Food'];
                      $Qty=$row['Quantity'];
                      $Price=$row['Price'];
                    echo '

                     <tr style="font-size: 13px; color: #615f5f; border-bottom: 1px solid #F3F3F3;" class="content2">
                      <td>'.$Food_ID.'</td>
                      <td>'.$Category.'</td>
                      <td>'.$Food.'</td>
                      <td style="text-align: center">'.$Qty.'</td>
                      <td style="text-align: center">'.$Price.'</td>';
                      echo "<td><center><a href='adminproductsperpage.php?Food_ID=".$row["Food_ID"]."'>View</a></center></td>";
                    echo '</tr>';
                    ?>
                    <?php
                  }
                  echo'</table>
                  <input type="submit" value="🡰 Back to Records" name="backorders" class="title" style="width: 10%; padding: 6px 10px; float: right; margin-left: 10px; border-radius: 1vh; background-color: transparent; color:  #3498DB; font-size: 14.5px; font-weight: 600; margin-top: 10px; width: 17%">';
                }
              }else{
                 include("conn.php");
  
                        $q1="(SELECT * FROM silog)
                        UNION
                        (SELECT * FROM muncheese)
                        UNION
                        (SELECT * FROM desserts)
                        UNION
                        (SELECT * FROM sandwiches) ORDER BY Price LIMIT 10 ";




                        $result = mysqli_query($conn, $q1);
                        echo'
                     <table border="0" width="100%" cellpadding="10" cellspacing="0" align="center" style=" border: 0px solid; border-collapse: collapse; margin-top: 65px ">
                     <tr style="font-size: 13px; color: dimgrey;  border-bottom: 2px solid #E6E8EB; background-color: #F7F7F7;">
                      <td><i class="fa-solid fa-list-ol" style="font-size: 12px; color: #cccaca;"></i></i>&emsp;FOOD ID</td>
                      <td><i class="fa-solid fa-list-ol" style="font-size: 12px; color: #cccaca;"></i></i>&emsp;CATEGORY</td>
                      <td><i class="fa-solid fa-bowl-food" style="font-size: 12px; color: #cccaca;"></i>&emsp;PRODUCT NAME</td>
                      <td style="text-align: center"><i class="fa-solid fa-question" style="font-size: 12px; color: #cccaca;"></i>&emsp;QUANTITY</td>
                      <td style="text-align: center"> <i class="fa-solid fa-calendar-days" style="font-size: 12px; color: #cccaca;"></i>&emsp;PRICE</td>
                      <td  style="text-align: center"><i class="fa-solid fa-location-crosshairs" style="font-size: 12px; color: #cccaca;"></i>&emsp;ACTION</td>
                      </tr>';
                     while($row=mysqli_fetch_array($result) )
                    {
                      $FoodID=$row['Food_ID'];
                      $Category=$row['Category'];
                      $Food=$row['Food'];
                      $Qty=$row['Quantity'];
                      $Price=$row['Price'];
                      echo'
                    <tr style="font-size: 13px; color: #615f5f; border-bottom: 1px solid #F3F3F3;" class="content2">
                      <td>'.$FoodID.'</td>
                      <td>'.$Category.'</td>
                      <td>'.$Food.'</td>
                      <td style="text-align: center">'.$Qty.'</td>
                      <td style="text-align: center">'.$Price.'</td>';
                      echo "<td><center><a href='adminproductsperpage.php?Food_ID=".$row["Food_ID"]."'>View</a></center></td>";
                    echo '</tr>';

                  }
                  echo '</table><br><br>';
                  }
                  ?>
                    </div>
                  </p>
                </div>
              </td>
            </tr>
          </table>
      </div>
    </div>
<!-- End Products -->

<!-- User: Customer -->
       <div id="customers" class="col-md-9">
         <h2 class="header"><span class="icon"></span>Customers</h2>
        <div class="row mx-4">
            <table border="0" width="100%" cellpadding="10" cellspacing="0" align="center">
            <tr>
              <td colspan="2">
                <div class="conbox content2">
                  <font style="font-weight: 300; font-size: 24px; color: #615f5f;">Users Table</font>
                  <font style="font-size: 14px; color: #615f5f">&nbsp;Manage Customer Profile</font><br><br>
                  <!-- Search Bar -->
                  <input type="text" id="searchresult" placeholder="🔍︎ Search..." name="searchbarcust" value=""style="border-radius: 1vh; border: 1px solid lightgray; padding: 6px 15px; font-size: 14px; width: 40%; float: left;" >
                  <input type="submit" value="🔍︎ Search" name="searchsubmitcust" class="title" style="width: 10%; padding: 6px 10px; float: left; margin-left: 10px; font-size: 12px; border-radius: 1vh">
                  <!-- Search Bar -->

                    <a href="adminusers.php"><button type="button" style="background-color:#828282; border: 0px solid; font-size: 12px; padding: 8px 10px; color: white; border-radius: 1vh; float: right; margin-left: 5px"><i class="fa-solid fa-user"></i>&emsp;Manage All Customers</button></a>

                    <br><br>
                    <center class="title">
                                         <!-- Display Table Design AND SEARCH SA ORDERS START-->
                   <?php
                  if (isset($_POST['searchsubmitcust'])) {
                    $search = trim($_POST['searchbarcust']);
                    $search = mysqli_real_escape_string($conn, $search);
                    $searchquery = "SELECT * FROM custinfo WHERE CustID LIKE '%$search%' OR Email LIKE '%$search%'";
                    $search_query = mysqli_query($conn, $searchquery);
                    if (!$search_query) {
                      die("Query Failed" . mysqli_error($conn));
                    }
                    $count = mysqli_num_rows($search_query);
                    if ($count == 0) {
                      echo 'NO RESULTS
                       <input type="submit" value="🡰 Back to Records" name="backorders" class="title" style="width: 10%; padding: 6px 10px; float: right; margin-left: 10px; border-radius: 1vh; background-color: transparent; color:  #3498DB; font-size: 14.5px; font-weight: 600; margin-top: 10px; width: 17%">';
                    } else {
                      echo'
                      <table border="0" width="100%" cellpadding="3" cellspacing="0" align="center" style=" border: 0px solid; border-collapse: collapse; margin-top: 0px;">
                      <tr style="font-size: 13px; color: dimgrey;  border-bottom: 2px solid #E6E8EB; background-color: #F7F7F7;">
                      <td><i class="fa-solid fa-list-ol" style="font-size: 12px; color: #cccaca;"></i></i>&emsp;CUSTOMER ID</td>
                      <td><i class="fa-solid fa-user" style="font-size: 12px; color: #cccaca;"></i>&emsp;FIRST NAME</td>
                      <td> <style="font-size: 12px; color: #cccaca;"></i>&emsp;LAST NAME</td>
                      <td><i class="fa-solid fa-question" style="font-size: 12px; color: #cccaca;"></i>&emsp;GENDER</td>
                      <td><i class="fa-solid fa-birthday-cake" style="font-size: 12px; color: #cccaca;"></i>&emsp;BIRTHDAY</td>
                      <td><i class="fa-solid fa-calendar-plus" style="font-size: 12px; color: #cccaca;"></i>&emsp;AGE</td>
                      <td><i class="fa-solid fa-phone" style="font-size: 12px; color: #cccaca;"></i>&emsp;PHONE NO</td>
                      <td><i class="fa-solid fa-home" style="font-size: 12px; color: #cccaca;"></i>&emsp;ADDRESS</td>
                      <td><i class="fa-solid fa-envelope" style="font-size: 12px; color: #cccaca;"></i>&emsp;EMAIL</td>
                    </tr>';
                      ?>
                      
                    <?php
                     while($row=mysqli_fetch_array($search_query) )
                    {

                      $CustID=$row['CustID'];
                      $Cfname=$row['First_Name'];
                      $Clname=$row['Last_Name'];
                      $Gender=$row['Gender'];
                      $Cbday=$row['DOB'];

                      $Cage=$row['Age'];
                      $Cphoneno=$row['PhoneNum'];
                      $Cadd=$row['Address'];
                      $Cemail=$row['Email'];
                    echo '

                     <tr style="font-size: 13px; color: #615f5f; border-bottom: 1px solid #F3F3F3;" class="content2">
                      <td>'.$CustID.'</td>
                      <td>'.$Cfname.'</td>
                      <td>'.$Clname.'</td>
                      <td>'.$Gender.'</td>
                      <td>'.$Cbday.'</td>
                      <td>'.$Cage.'</td>
                      <td>'.$Cphoneno.'</td>
                      <td>'.$Cadd.'</td>
                      <td>'.$Cemail.'</td>
                    </tr>';
                    ?>
                    <?php
                  }
                  echo'</table>
                  <input type="submit" value="🡰 Back to Records" name="backorders" class="title" style="width: 10%; padding: 6px 10px; float: right; margin-left: 10px; border-radius: 1vh; background-color: transparent; color:  #3498DB; font-size: 14.5px; font-weight: 600; margin-top: 10px; width: 17%">';
                }
              }else{
                 include("conn.php");
                        $q1="SELECT * FROM custinfo ORDER BY CustID " or die('Error223');
                        $result = mysqli_query($conn, $q1);
                        echo'
                     <table border="0" width="100%" cellpadding="10" cellspacing="0" align="center" style=" border: 0px solid; border-collapse: collapse; margin-top: 10px;">
                      <tr style="font-size: 13px; color: dimgrey;  border-bottom: 2px solid #E6E8EB; background-color: #F7F7F7;">
                      <td><i class="fa-solid fa-list-ol" style="font-size: 12px; color: #cccaca;"></i></i>&emsp;CUSTOMER ID</td>
                      <td><i class="fa-solid fa-user" style="font-size: 12px; color: #cccaca;"></i></i>&emsp;FIRST NAME</td>
                      <td><style="font-size: 12px; color: #cccaca;">&emsp;LAST NAME</td>
                      <td><i class="fa-solid fa-question" style="font-size: 12px; color: #cccaca;"></i>&emsp;GENDER</td>
                      <td><i class="fa-solid fa-calendar-days" style="font-size: 12px; color: #cccaca;"></i>&emsp;EMAIL</td>
                      </tr>';
                     while($row=mysqli_fetch_array($result) )
                    {
                      $CustID=$row['CustID'];
                      $Cfname=$row['First_Name'];
                      $Clname=$row['Last_Name'];
                      $Gender=$row['Gender'];
                      $Cemail=$row['Email'];
                      echo'
                    <tr style="font-size: 13px; color: #615f5f; border-bottom: 1px solid #F3F3F3;" class="content2">
                      <td>'.$CustID.'</td>
                      <td>'.$Cfname.'</td>
                      <td>'.$Clname.'</td>
                      <td>'.$Gender.'</td>
                      <td>'.$Cemail.'</td>
                    </tr>';
                  }
                  echo '</table><br><br>';
                  }
                  ?>
                    </center>
                  </p>
                </div>
              </td>
            </tr>
          </table>
        </center>
      </div>
    </div>
<!-- End of Customers -->


<!-- User: Admin -->
        <div id="admin" class="col-md-9">
         <h2 class="header"><span class="icon"></span>Administrator</h2>
        <div class="row mx-4">
            <table border="0" width="100%" cellpadding="10" cellspacing="0" align="center">
            <tr>
              <td colspan="2">
                <div class="conbox content2">
                  <font style="font-weight: 300; font-size: 24px; color: #615f5f;">Users Table</font>
                  <font style="font-size: 14px; color: #615f5f">&nbsp;Manage Admin Profile</font><br><br>

                  <input type="text" id="searchresult" placeholder="🔍︎ Search..." name="searchbaradmin" value=""style="border-radius: 1vh; border: 1px solid lightgray; padding: 6px 15px; font-size: 14px; width: 40%; float: left;" >
                  <input type="submit" value="🔍︎ Search" name="searchsubmitadmin" class="title" style="width: 10%; padding: 6px 10px; float: left; margin-left: 10px; font-size: 12px; border-radius: 1vh">
                  <!-- Search Bar -->

                    <a href="addadminadmin.php"><button type="button" style="background-color:#F8F8FA; border: 0px solid; font-size: 12px; padding: 8px 10px; color: #1c1c1c; border-radius: 1vh; float: right; margin-left: 5px"><i class="fa-solid fa-plus"></i>&emsp;Add Admin</button></a>

                   <a href="adminadmin.php"><button type="button" style="background-color:#828282; border: 0px solid; font-size: 12px; padding: 8px 10px; color: white; border-radius: 1vh; float: right; margin-left: 5px"><i class="fa-solid fa-gear"></i>&emsp;Manage Admins</button></a>

                    <br><br>
                    <center class="title">
                     <!-- Display Table Design AND SEARCH SA ORDERS START-->
                   <?php
                  if (isset($_POST['searchsubmitadmin'])) {
                    $search = trim($_POST['searchbaradmin']);
                    $search = mysqli_real_escape_string($conn, $search);
                    $searchquery = "SELECT * FROM admintable WHERE Admin_ID LIKE '%$search%' OR Email LIKE '%$search%'";
                    $search_query = mysqli_query($conn, $searchquery);
                    if (!$search_query) {
                      die("Query Failed" . mysqli_error($conn));
                    }
                    $count = mysqli_num_rows($search_query);
                    if ($count == 0) {
                      echo 'NO RESULTS
                       <input type="submit" value="🡰 Back to Records" name="backorders" class="title" style="width: 10%; padding: 6px 10px; float: right; margin-left: 10px; border-radius: 1vh; background-color: transparent; color:  #3498DB; font-size: 14.5px; font-weight: 600; margin-top: 10px; width: 17%">';
                    } else {
                      echo'
                      <table border="0" width="100%" cellpadding="3" cellspacing="0" align="center" style=" border: 0px solid; border-collapse: collapse; margin-top: 10px">
                      <tr style="font-size: 13px; color: dimgrey;  border-bottom: 2px solid #E6E8EB; background-color: #F7F7F7;">
                      <td><i class="fa-solid fa-list-ol" style="font-size: 12px; color: #cccaca;"></i></i>&emsp;ADMIN ID</td>
                      <td><i class="fa-solid fa-user" style="font-size: 12px; color: #cccaca;"></i>&emsp;FIRST NAME</td>
                      <td> <style="font-size: 12px; color: #cccaca;"></i>&emsp;LAST NAME</td>
                      <td><i class="fa-solid fa-question" style="font-size: 12px; color: #cccaca;"></i>&emsp;GENDER</td>
                      <td><i class="fa-solid fa-birthday-cake" style="font-size: 12px; color: #cccaca;"></i>&emsp;BIRTHDAY</td>
                      <td><i class="fa-solid fa-calendar-plus" style="font-size: 12px; color: #cccaca;"></i>&emsp;AGE</td>
                      <td><i class="fa-solid fa-phone" style="font-size: 12px; color: #cccaca;"></i>&emsp;PHONE NO</td>
                      <td><i class="fa-solid fa-envelope" style="font-size: 12px; color: #cccaca;"></i>&emsp;EMAIL</td>
                    </tr>';
                      ?>
                      
                    <?php
                     while($row=mysqli_fetch_array($search_query) )
                    {

                      $AdminID=$row['Admin_ID'];
                      $Afname=$row['First_Name'];
                      $Alname=$row['Last_Name'];
                      $Gender=$row['Gender'];
                      $Abday=$row['DOB'];
                      $Aage=$row['Age'];
                      $Aphone=$row['Phone_no'];
                      $Aemail=$row['Email'];
                    echo '

                     <tr style="font-size: 13px; color: #615f5f; border-bottom: 1px solid #F3F3F3;" class="content2">
                      <td>'.$AdminID.'</td>
                      <td>'.$Afname.'</td>
                      <td>'.$Alname.'</td>
                      <td>'.$Gender.'</td>
                      <td>'.$Abday.'</td>
                      <td>'.$Aage.'</td>
                      <td>'.$Aphone.'</td>
                      <td>'.$Aemail.'</td>
                    </tr>';
                    ?>
                    <?php
                  }
                  echo'</table>
                  <input type="submit" value="🡰 Back to Records" name="backorders" class="title" style="width: 10%; padding: 6px 10px; float: right; margin-left: 10px; border-radius: 1vh; background-color: transparent; color:  #3498DB; font-size: 14.5px; font-weight: 600; margin-top: 10px; width: 17%">';
                }
              }else{
                 include("conn.php");
                        $q1="SELECT * FROM admintable ORDER BY Admin_ID " or die('Error223');
                        $result = mysqli_query($conn, $q1);
                        echo'
                     <table border="0" width="100%" cellpadding="10" cellspacing="0" align="center" style=" border: 0px solid; border-collapse: collapse; margin-top: 10px ">
                      <tr style="font-size: 13px; color: dimgrey;  border-bottom: 2px solid #E6E8EB; background-color: #F7F7F7;">
                      <td><i class="fa-solid fa-list-ol" style="font-size: 12px; color: #cccaca;"></i></i>&emsp;ADMIN ID</td>
                      <td><i class="fa-solid fa-list-ol" style="font-size: 12px; color: #cccaca;"></i></i>&emsp;FIRST NAME</td>
                      <td><i class="fa-solid fa-user" style="font-size: 12px; color: #cccaca;"></i>&emsp;LAST NAME</td>
                      <td><i class="fa-solid fa-question" style="font-size: 12px; color: #cccaca;"></i>&emsp;GENDER</td>
                      <td><i class="fa-solid fa-calendar-days" style="font-size: 12px; color: #cccaca;"></i>&emsp;EMAIL</td>
                      </tr>';
                     while($row=mysqli_fetch_array($result) )
                    {
                      $AdminID=$row['Admin_ID'];
                      $Afname=$row['First_Name'];
                      $Alname=$row['Last_Name'];
                      $Gender=$row['Gender'];
                      $Aemail=$row['Email'];
                      echo'
                    <tr style="font-size: 13px; color: #615f5f; border-bottom: 1px solid #F3F3F3;" class="content2">
                      <td>'.$AdminID.'</td>
                      <td>'.$Afname.'</td>
                      <td>'.$Alname.'</td>
                      <td>'.$Gender.'</td>
                      <td>'.$Aemail.'</td>
                    </tr>';
                  }
                  echo '</table><br><br>';
                  }
                  ?>
                  <!-- Display Table Design AND SEARCH SA ORDERS END-->
                    </center>
                  </p>
                </div>
              </td>
            </tr>
          </table>
        </center>
      </div>
    </div>
    <!-- End of Admin -->
    
   <!-- Admin Profile -->
      <div id="profile" class="col-md-9">
         <h2 class="header"><span class="icon"></span>Profile</h2>
        <div class="row mx-5">
            <table border="0" width="100%" cellpadding="10" cellspacing="0" align="center">
            <tr>
              <td>
                <div class="row jumbotron">
                <div class="conbox content2">
                  <font style="font-weight: 300; font-size: 24px; color: #615f5f;">Admin Profile</font>
                  <font style="font-size: 14px; color: #615f5f">&nbsp;Your Profile</font><br><br>
                   <div class="row jumbotron">
                    <!-- Input Fields -->
                    <?php
                    include ('conn.php');
                    
                          $A_Username=$_SESSION['A_Username'];

         
                        $q=mysqli_query($conn,"SELECT * FROM admintable WHERE Username='$A_Username'" )or die('Error223');
                        while ($row = mysqli_fetch_assoc($q))
                        {
                        ?>
                       <div class="col-sm-6 form-group">
                          <label for="name-f">First Name</label>
                          <input type="text" class="form-control input2" name="fname" id="name-f" value="<?= $row['First_Name']; ?>" placeholder="First Name" readonly ondblclick="onDoubleClick(this)" onblur="lostFocus(this)">
                      </div>
                      <div class="col-sm-6 form-group">
                          <label for="name-l">Last Name</label>
                          <input type="text" class="form-control input2" name="lname" id="name-l" value="<?= $row['Last_Name']; ?>"placeholder="Last Name" readonly ondblclick="onDoubleClick(this)" onblur="lostFocus(this)">
                      </div>
                      <div class="col-sm-6 form-group">
                          <label for="name-l">Gender</label>
                          <input type="text" class="form-control input2" name="lname" id="name-l" value="<?= $row['Gender']; ?>" placeholder="Gender">
                      </select>
                      </div>
                      <div class="col-sm-4 form-group">
                          <label for="Date">Date Of Birth</label>
                           <input name = "u_Birthday" type = "text" 
                            id = "date"  onfocus="(this.type='date')" class="input2" onblur="getAge();" max="2004-06-30" min="1923-01-01" value="<?= $row['DOB']; ?>" placeholder="Birthdate">
                      </div>
                      <div class="col-sm-2 form-group">
                          <label for="age">Age</label>
                          <input type="number" class="form-control  input2" name="u_Age" id="u_Age"  maxlength="2"  readonly value="<?= $row['Age']; ?>" placeholder="Age">
                          <br><br>
                      </div>
                      <div class="col-sm-6 form-group">
                          <label for="phone">Phone Number</label>
                          <input type="tel" class="form-control input2" name="phonenum" id="phonenum"  value="<?= $row['Phone_no']; ?>" placeholder="Phone number" readonly ondblclick="onDoubleClick(this)" onblur="lostFocus(this)">
                      </div>
                      <div class="col-sm-6 form-group">
                          <label for="email">Email</label>
                          <input type="email" class="form-control input2" name="email" id="email" value="<?= $row['Email']; ?>" placeholder="Email">
                      </div>
                    
                      <div class="col-sm-6 form-group">
                          <label for="tel">Username</label>
                          <input type="tel" name="phone" class="form-control input2" id="tel" value="<?= $row['Username']; ?>" placeholder="Username" readonly ondblclick="onDoubleClick(this)" onblur="lostFocus(this)">
                      </div>
                      <div class="col-sm-6 form-group">
                        <div class="input-icons">
                          <label for="pass">Password</label>
                          <input type="password" name="password" class="input2" id="password-field" value="<?= $row['Password']; ?>" placeholder="Password" readonly ondblclick="onDoubleClick(this)" onblur="lostFocus(this)">
                           <i  id="pass-status" class="fa fa-eye" style="cursor: pointer; color: #1c1c1c; margin-top: 13px " onClick="viewPassword()" aria-hidden="true"></i>
                        </div>
                      </div>
                      <div class="col-sm-12 form-group mb-0">
                        <br>
                         <a href="admindashboard.php#dashboard"><input class="title" type="button" value="CANCEL" style="background-color: transparent; border: 1px solid #c0c0c0; color: #615f5f;"></a>
                        <input class="title" type="submit" value="SAVE" style="box-shadow: none">
                      </div>          
                  </div>
                </div>
              </td>
            </tr>
          </table>
          <?php
        
      }
          ?>
          
        </center>
      </div>
    </div>
     </div>
   </div>

   <!-- End of Admin Profile -->
  </div>
   </div>
</div>

<!-- Javascript -->
<script>
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}

function myFunction2() {
  document.getElementById("myDropdown2").classList.toggle("show2");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn2')) {
    var dropdowns = document.getElementsByClassName("dropdown-content2");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show2')) {
        openDropdown.classList.remove('show2');
      }
    }
  }
}

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
function onDoubleClick(elem) {
  console.log('toggling readonly property');
  var element = $(elem);
  element.prop('readonly', !element.prop('readonly')); // toggle
}

function lostFocus(elem) {
  console.log('lostFocust');
  var element = $(elem);
  element.prop('readonly', true);
}
</script>
<!-- Javascript -->
</form>
</body>
</html>
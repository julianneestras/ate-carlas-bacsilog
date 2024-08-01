<?php
include("conn.php");
      
      if(isset($_POST['yes']))
{
    include("conn.php");


              $status = "Received";
              $OID = $_POST['OID'];

    $query = "UPDATE orders SET status='$status' WHERE OrderID='$OID'";  
    $query_run = mysqli_query($conn, $query);

}
?>

<?php
include("conn.php");
if(isset($_POST['yes'])) 
{


$OID = $_POST['OID'];
$amount = $_POST['amount'];
$prodName = $_POST['prod'];
$inst = $_POST['inst'];
$address = $_POST['address'];
$delDate = $_POST['delDate'];
$delTime = $_POST['delTime'];
$number = $_POST['number'];
$MOP = $_POST['MOP'];


//$Email = $_POST['Email'];
$to="acarlasbacsilog@gmail.com";

//$from = $_POST['Email'];  
$fromName = "acarlasbacsilog@gmail.com";

 
$subject = 'Order '.$OID.' Completed! '; 
 
$body = ' 
    <html> 
    <head> 
    </head> 
    <body> 
        <h1>Order Received</h1>
        <p>
            This is to inform you that the order was received by the customer and has been marked completed. 
        </p>

        <br>
        
    </body> 
    </html>'; 
 
// Set content-type header for sending HTML email 
$headers = "MIME-Version: 1.0" . "\r\n"; 
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
 
// Additional headers 
$headers .= 'From: '.$fromName.'<'.$fromName.'>' . "\r\n"; 
 
// Send email 
if(mail($to, $subject, $body, $headers)){ 
     echo "<center><h3><script>alert('The Order ID". $OID." has been completed.');</script></h3></center>";
}else{ 
   echo "<center><h3><script>alert(''Order Status failed to Send');</script></h3></center>";
}
}
?>

<?php
      
      if(isset($_POST['no']))
{
    include("conn.php");


              $status = "Not Received";
              $OID = $_POST['OID'];

    $query = "UPDATE orders SET status='$status' WHERE OrderID='$OID'"; 
    

    
    $query_run = mysqli_query($conn, $query);
}
?>




<?php
if(isset($_POST['no'])) 
{
$OID = $_POST['OID'];
$amount = $_POST['amount'];
$prodName = $_POST['prod'];
$inst = $_POST['inst'];
$address = $_POST['address'];
$delDate = $_POST['delDate'];
$delTime = $_POST['delTime'];
$number = $_POST['number'];
$MOP = $_POST['MOP'];


//$Email = $_POST['Email'];
$to="sonchaaaeee@gmail.com";

//$from = $_POST['Email'];  
$fromName = "acarlasbacsilog@gmail.com";
 
$subject = 'Order '.$OID.' Not Completed'; 
 

$body = '<html> 
    <head> 
    </head> 
    <body> 
        <h1>Order Not Received</h1>
        <p>
            We are really sorry to hear that you have not received your order/s. We will do everything we can to resolve this matter as quickly as possible and to make sure it does not affect your future orders with us.  <br><br>

        If you have any questions regarding your order, please email our customer service team at <a href = "mailto:acarlasbacsilog@gmail.com">acarlasbacsilog@gmail.com.</a> <br>

        Ate Carla`s Bacsilog Team
        </p>

        <br>
        
    </body> 
    </html>';
 
// Set content-type header for sending HTML email 
$headers = "MIME-Version: 1.0" . "\r\n"; 
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
 
// Additional headers 
$headers .= 'From: '.$fromName.'<'.$fromName.'>' . "\r\n"; 
 
// Send email 
if(mail($to, $subject, $body, $headers)){ 
     echo "<center><h3><script>alert('The Order ID". $OID." is not received.');</script></h3></center>";
}else{ 
   echo "<center><h3><script>alert(''Order Status failed to Send');</script></h3></center>";
}
}
?>





<?php 

 include 'conn.php';

  if(isset($_POST['update']))
  {
      $id = mysqli_real_escape_string($con, $_POST['OrderID']);

      $cid = mysqli_real_escape_string($con, $_POST['CustID']);
      $type = mysqli_real_escape_string($con, $_POST['Type']);
      $doo = mysqli_real_escape_string($con, $_POST['Date']);
      $status = mysqli_real_escape_string($con, $_POST['Status']);

      $query = "UPDATE ordertable SET CustID='$cid', Type='$type', Date_of_Order='$doo', Status='$status' WHERE id='$OrderID'";
      $query_run = mysqli_query($con, $query);

      if($query_run)
      {
          $_SESSION['message'] = "Account Updated Successfully";
          header("Location: adminusers.php");
          exit(0);
      }
      else
      {
          $_SESSION['message'] = "Account Not Updated";
          header("Location: adminusers.php");
          exit(0);
      }

  }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>My Order History</title>
	<link rel="icon" href="img/logo.png" type="image/x-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	<link rel="stylesheet" href="index-splash-design.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <script type="text/javascript" src="js/bootstrap.bundle.js"></script>
  <style type="text/css">
  	 body {
      background-color:  #FAF9F9;
      overflow-x: hidden;

    }

 #leftbox {
      float:left; 
      background: #AF1D27;
      width:18%;
      height: 1120px;
      margin: auto;
  }

  .centered {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
  }

   #middlebox{
      float:left; 
      background:#faf9f9;
      width:82%;
      height: auto;
      margin: auto;
  }

table {
  border: 0px solid dimgray;
  border-radius: 2vh;
  background-color: #faf9f9;
}

  label {
    font-weight: 400;
    color: #615f5f;
    margin-top: 8px;
    line-height: 2;
    font-size: 13.6px;
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

  .container {
        text-align: left;
        background-color: white;
        width: 90%;
        padding: 30px;
        border: 1px solid transparent;

      }

    .topnav {
     overflow: hidden;
     background-color: #3C848C;
   }

   .topnav a {
     float: left;
     color: #EFFCFA;
     text-align: center;
     padding: 20px 50px;
     text-decoration: none;
     font-size: 17px;
   }

   .topnav a:hover {
     background-color: #ddd;
     color: black;
   }

   .topnav a.active {
     background-color: #DC3F4D;
     color: white;
   }
  </style>
</head>
<body>
  <form method="POST" action = "<?php $_PHP_SELF ?>">
    <div id = "leftbox">
      <center>
        <i class="fa-solid fa-ellipsis-vertical" style="font-size: 70px; color: #faf9f9; margin-top: 250px;"></i><br>
        <a href="profile.php"><i class="fa-solid fa-circle-arrow-left" style="color: #faf9f9; font-size: 45px; margin-top: 500px"></i></a>      
      </center>
    </div> 
  <div id = "middlebox">
	 <table border="0" width="50%" cellpadding="60" cellspacing="0" align="center">
	 	<tr>
	 		<td>
	 			<div class="row jumbotron">
                <div class="conbox content2" style="width: 990px">
                  <font style="font-weight: 300; font-size: 30px; color: #615f5f;">Order History</font>
                   <div class="row jumbotron">
                    <hr>
                    <?php 
                        if (isset($_GET['OrderID'])) 
                    {
                        $OrderID = $_GET['OrderID'];
                        $sql = "SELECT * FROM orders WHERE OrderID='$OrderID'";
                        $result = mysqli_query($conn,$sql);
                        while($row=mysqli_fetch_assoc($result))
                      {
                         echo'&nbsp;&nbsp;<input type="hidden" name="prod" readonly size="24" value= "'.$row['products'] . '">';

                ?>
                     <div class="col-sm-12 form-group">
                          <label for="name-f">Order ID</label>
                          <input type="text" class="form-control input2" name="OID" id="OID" value="<?=$row['OrderID']; ?>" required readonly>
                      </div>
                      

                       <div class="col-sm-6 form-group">
                          <label for="name-l">Order(s)</label>
                          <textarea rows="6" cols="80" class="form-control input2" name="prodName" id="prodName" readonly placeholder="<?=$row['products']; ?>" readonly></textarea><br><br>
            
                      </div>

                      <div class="col-sm-2 form-group">
                          <label for="age">Total Order Amount</label>
                          <input type="text" class="form-control input2" name="amount" id="status" value="₱<?=$row['amount_paid']; ?>" required readonly>
                          
                          <br>
                      </div>
          
                      <div class="col-sm-12 form-group">
                          <label for="phone">Delivery Instructions</label>
                          <input type="text" class="form-control input2" name="inst" id="inst" required style="height: 150px" value="<?=$row['Instructions']; ?>" required readonly>
                      </div>
                      <div class="col-sm-12 form-group">
                          <label for="email">Delivery Address</label>
                          <input type="text" class="form-control input2" name="address" id="province" required value="<?=$row['address']; ?>" readonly>
                      </div>
                    
                      
                      <div class="col-sm-3 form-group">
                          <label for="pass">Delivery Date</label>
                          <input type="text" class="input2" id="delDate" name="delDate" required value="<?=$row['DelDate']; ?>" readonly>
                      </div>
                      <div class="col-sm-3 form-group">
                          <label for="pass">Delivery Time</label>
                          <input type="text" class="input2" id="delTime" name="delTime" required value="<?=$row['DelTime']; ?>" readonly>
                      </div>
                      <div class="col-sm-6 form-group">
                          <label for="pass">Email Address</label>
                          <input type="text" class="input2" id="email" name="email" required value="<?=$row['email']; ?>" readonly>
                      </div>
                      <div class="col-sm-6 form-group">
                          <label for="pass">Phone Number</label>
                          <input type="tel" class="input2" id="number" name="number" required value="<?=$row['phone']; ?>" readonly>
                      </div>
                       <div class="col-sm-6 form-group">
                          <label for="pass">Mode of Payment</label>
                          <input type="text" class="input2" id="MOP" name="MOP" required value="<?=$row['pmode']; ?>" readonly>
                      </div>
                      <div class="col-sm-6"> </div>
                      <div class="col-sm-6"> 
                        <br><br>
                          <p class="title" style="color: dimgray; font-weight: 500; font-size: 15px"><i class="fa-solid fa-bell"></i>&ensp;I have received my order(s):</p>
                      </div>
                      <div class="col-sm-12 form-group mb-0">
                         <a href=""><input class="title" type="submit" name="no" value="X NO" style="background-color: #D77976; border: 0px solid #1c1c1c; color: #834A48;"></a>
                        <input class="title" type="submit" name="yes" value="✔ YES" style="box-shadow: none; background-color: #91C48A; color: #506D4C">
                      </div>  
                      <?php
                    }

              }
            ?>
            </p>         
                  </div>
                </div>
              </form>
	 		</td>	
	 	</tr>
	 </table>
  </div>
</body>
</html>
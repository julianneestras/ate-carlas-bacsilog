<?php
 include("conn.php");
      
      if(isset($_POST['submit']))
{
    include("conn.php");


              $ProdID = $_POST['Food_ID'];
              $ProdName = $_POST['Food'];
              $Category = $_POST['Category'];
              $Qty = $_POST['Quantity'];
              $Price = $_POST['Price'];


    if(empty($ProdID) || empty($ProdName ) || empty($Category) ||empty($Qty) || empty($Price)){
      $fieldsempty = 'Please do not leave empty fields.';

    }else if (strlen($ProdName) < 3){
                
          $prodnameerror = 'Product name must not be less than 3 characters.';

    }else if(preg_match('/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/', $ProdName)){

           $prodnameerror2 = 'Invalid product name.';

    }else if ($Price == 0){

          $priceerror = 'Price cannot be 0.';

    }else if ($Price < 0){

          $priceerror2 = 'Price cannot be negative.'; 

    }else if ($Qty < 0){

          $qtyerror = 'Quantity cannot be negative.'; 

    }else{

      $query = "UPDATE $Category SET Food='$ProdName', Category='$Category', Quantity='$Qty', Price='$Price' WHERE Food_ID='$ProdID'";

    $query_run = mysqli_query($conn, $query);

    if(! $query_run){

        die('Could not enter data: ' . mysqli_error($conn));

    }

        echo "<center><h3><script>alert('Product Updated!');</script></h3></center>";
        header('refresh:0;url=admindashboard.php#products');

    }
  }
?>

<?php
      if(isset($_POST['submitdelete']))
{
      include("conn.php");

      $Food_ID = $_POST['Food_ID'];
      $Category = $_POST['Category'];

      $querydelete = "DELETE FROM $Category WHERE Food_ID='$Food_ID'";
      $query_run = mysqli_query($conn, $querydelete);
      if($query_run)
    {
        echo "<center><h3><script>alert('Product Deleted!');</script></h3></center>";
       header('refresh:0;url=admindashboard.php#products');
    }
    else
    {
        echo "<center><h3><script>alert('Product did not Delete!');</script></h3></center>";
    }
}
?>

   

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Manage Orders</title>
  <link rel="icon" href="img/logo.png" type="image/x-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <link rel="stylesheet" href="index-splash-design.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <script type="text/javascript" src="js/bootstrap.bundle.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
  <style type="text/css">
     body {
      background-color:  #FAF9F9;
      overflow-x: hidden;

    }

 #leftbox {
      float:left; 
      background: #AF1D27;
      width:18%;
      height: 900px;
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
    font-weight: 300;
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
          float: left;

      }

input[type=text], input[type=password], select, input[type=number], input[type=date], input[type=tel], input[type=email] {
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
<!--   < 
    if(isset($_POST['update']))
  {
      $id = mysqli_real_escape_string($con, $_POST['Food_ID']);

      $categ = mysqli_real_escape_string($con, $_POST['Category']);
      $food = mysqli_real_escape_string($con, $_POST['Food']);
      $qty = mysqli_real_escape_string($con, $_POST['Quantity']);
      $price = mysqli_real_escape_string($con, $_POST['Price']);
      //$img = mysqli_real_escape_string($con, $_POST['FoodImg']);

      $query = "UPDATE desserts, muncheese, sandwiches, silog SET Category='$categ', Food='$food', Quantity='$qty', Price='$price' WHERE id='$Food_ID'";
      $query_run = mysqli_query($con, $query);
}
  
?> -->
<form method = "post" action = "<?php $_PHP_SELF ?>">
    <div id = "leftbox">
      <center>
        <i class="fa-solid fa-ellipsis-vertical" style="font-size: 70px; color: #faf9f9; margin-top: 250px;"></i><br>
        <a href="admindashboard.php#products"><i class="fa-solid fa-circle-arrow-left" style="color: #faf9f9; font-size: 45px; margin-top: 200px"></i></a>      
      </center>
    </div> 
  <div id = "middlebox">
   <table border="0" width="50%" cellpadding="60" cellspacing="0" align="center">
    <tr>
      <td>
        <div class="row jumbotron">
                <div class="conbox content2" style="width: 990px">
                  <font style="font-weight: 300; font-size: 24px; color: #615f5f;">Products</font>
                  <font style="font-size: 14px; color: #615f5f">&nbsp;Manage Products</font><br><br>
                   <div class="row jumbotron">
                    <hr>
                    <?php 
                        if (isset($_GET['Food_ID'])) 
                    {
                        $Food_ID = $_GET['Food_ID'];
                    
                      $query = "SELECT * FROM silog WHERE Food_ID='$Food_ID'";
                      $result = mysqli_query($conn,$query);
                      while($row=mysqli_fetch_assoc($result))
                      {
                ?>
                    <div class="col-sm-3 form-group">
                          <label for="name-f">Product ID</label>
                          <input type="text" class="form-control input2" name="Food_ID" id="prodID" value="<?= $row['Food_ID']; ?>" required placeholder="Product ID" readonly>
                      </div>
                      <div class="col-sm-7 form-group">
                        <!-- Empty Grid -->
                      </div>
                       <div class="col-sm-6 form-group">
                          <label for="name-f">Product Name</label>
                          <input type="text" class="form-control input2" name="Food" id="prodName" value="<?= $row['Food']; ?>" required placeholder="Product Name" readonly>
                      </div>
                      <div class="col-sm-6 form-group">
                          <label for="name-l">Category</label>
                          <input type="text" class="form-control input2" name="Category" id="category" value="<?= $row['Category']; ?>" placeholder="Category" readonly>
                      </div>
                      <div class="col-sm-3 form-group">
                          <label for="qty">Quantity</label>
                           <input name = "Quantity" type = "text" 
                            id = "qty" value="<?= $row['Quantity']; ?>" required placeholder="Quantity">
                      </div>
                      <div class="col-sm-3 form-group">
                          <label for="price">Price</label>
                          <input type="text" class="form-control  input2" name="Price" id="price" value="<?= $row['Price']; ?>" required placeholder="Price">
                      </div>
                      <?php 
                  }
                }
                
            ?> 

            <?php 
                        if (isset($_GET['Food_ID'])) 
                    {
                        $Food_ID = $_GET['Food_ID'];
                    
                      $query = "SELECT * FROM desserts WHERE Food_ID='$Food_ID'";
                      $result = mysqli_query($conn,$query);
                      while($row=mysqli_fetch_assoc($result))
                      {
                ?>
                    <div class="col-sm-3 form-group">
                          <label for="name-f">Product ID</label>
                          <input type="text" class="form-control input2" name="Food_ID" id="prodID" value="<?= $row['Food_ID']; ?>" required>
                      </div>
                      <div class="col-sm-7 form-group">
                        <!-- Empty Grid -->
                      </div>
                       <div class="col-sm-6 form-group">
                          <label for="name-f">Product Name</label>
                          <input type="text" class="form-control input2" name="Food" id="prodName" value="<?= $row['Food']; ?>" required readonly ondblclick="onDoubleClick(this)" onblur="lostFocus(this)">
                      </div>
                      <div class="col-sm-6 form-group">
                          <label for="name-l">Category</label>
                          <input type="text" class="form-control input2" name="Category" id="category" value="<?= $row['Category']; ?>">
                      </div>
                      <div class="col-sm-3 form-group">
                          <label for="qty">Quantity</label>
                           <input name = "Quantity" type = "text" 
                            id = "qty" value="<?= $row['Quantity']; ?>" required readonly ondblclick="onDoubleClick(this)" onblur="lostFocus(this)">
                      </div>
                      <div class="col-sm-3 form-group">
                          <label for="price">Price</label>
                          <input type="text" class="form-control  input2" name="Price" id="price" value="<?= $row['Price']; ?>" required readonly ondblclick="onDoubleClick(this)" onblur="lostFocus(this)">
                      </div>
                      <?php 
                  }
                }
                
            ?> 

             <?php 
                        if (isset($_GET['Food_ID'])) 
                    {
                        $Food_ID = $_GET['Food_ID'];
                    
                      $query = "SELECT * FROM muncheese WHERE Food_ID='$Food_ID'";
                      $result = mysqli_query($conn,$query);
                      while($row=mysqli_fetch_assoc($result))
                      {
                ?>
                    <div class="col-sm-3 form-group">
                          <label for="name-f">Product ID</label>
                          <input type="text" class="form-control input2" name="Food_ID" id="prodID" value="<?= $row['Food_ID']; ?>" required>
                      </div>
                      <div class="col-sm-7 form-group">
                        <!-- Empty Grid -->
                      </div>
                       <div class="col-sm-6 form-group">
                          <label for="name-f">Product Name</label>
                          <input type="text" class="form-control input2" name="Food" id="prodName" value="<?= $row['Food']; ?>" required readonly ondblclick="onDoubleClick(this)" onblur="lostFocus(this)">
                      </div>
                      <div class="col-sm-6 form-group">
                          <label for="name-l">Category</label>
                          <input type="text" class="form-control input2" name="Category" id="category" value="<?= $row['Category']; ?>">
                      </div>
                      <div class="col-sm-3 form-group">
                          <label for="qty">Quantity</label>
                           <input name = "Quantity" type = "text" 
                            id = "qty" value="<?= $row['Quantity']; ?>" required readonly ondblclick="onDoubleClick(this)" onblur="lostFocus(this)">
                      </div>
                      <div class="col-sm-3 form-group">
                          <label for="price">Price</label>
                          <input type="text" class="form-control  input2" name="Price" id="price" value="<?= $row['Price']; ?>" required readonly ondblclick="onDoubleClick(this)" onblur="lostFocus(this)">
                      </div>
                      <?php 
                  }
                }
                
            ?>

             <?php 
                        if (isset($_GET['Food_ID'])) 
                    {
                        $Food_ID = $_GET['Food_ID'];
                    
                      $query = "SELECT * FROM sandwiches WHERE Food_ID='$Food_ID'";
                      $result = mysqli_query($conn,$query);
                      while($row=mysqli_fetch_assoc($result))
                      {
                ?>
                    <div class="col-sm-3 form-group">
                          <label for="name-f">Product ID</label>
                          <input type="text" class="form-control input2" name="Food_ID" id="prodID" value="<?= $row['Food_ID']; ?>" required>
                      </div>
                      <div class="col-sm-7 form-group">
                        <!-- Empty Grid -->
                      </div>
                       <div class="col-sm-6 form-group">
                          <label for="name-f">Product Name</label>
                          <input type="text" class="form-control input2" name="Food" id="prodName" value="<?= $row['Food']; ?>" required readonly ondblclick="onDoubleClick(this)" onblur="lostFocus(this)">
                      </div>
                      <div class="col-sm-6 form-group">
                          <label for="name-l">Category</label>
                          <input type="text" class="form-control input2" name="Category" id="category" value="<?= $row['Category']; ?>">
                      </div>
                      <div class="col-sm-3 form-group">
                          <label for="qty">Quantity</label>
                           <input name = "Quantity" type = "text" 
                            id = "qty" value="<?= $row['Quantity']; ?>" required readonly ondblclick="onDoubleClick(this)" onblur="lostFocus(this)">
                      </div>
                      <div class="col-sm-3 form-group">
                          <label for="price">Price</label>
                          <input type="text" class="form-control  input2" name="Price" id="price" value="<?= $row['Price']; ?>" required readonly ondblclick="onDoubleClick(this)" onblur="lostFocus(this)">
                      </div>
                      <?php 
                  }
                }
                
            ?>

            </p>
                      <div class="col-sm-12 form-group mb-0">
                        <br><br>
                         <input class="title" type="submit" name="submit" value="SAVE" style="box-shadow: none">

                         <a href="admindashboard.php#products"><input class="title" type="button" value="CANCEL" style="background-color: transparent; border: 1px solid #c0c0c0; color: #615f5f;"></a>

                         <input class="title" type="submit" name="submitdelete" value=" X DELETE" style="box-shadow: none; float: right; background-color:#EC5656">
                      </div>          
                  </div>
                </div>
      </td> 
    </tr>
   </table>
  </div>
  <script type="text/javascript">
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
</form>
</body>
</html>
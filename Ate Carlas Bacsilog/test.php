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
				'item_id'			=>	$_GET["id"],
				'item_name'			=>	$_POST["hidden_name"],
				'item_price'		=>	$_POST["hidden_price"],
				'item_quantity'		=>	$_POST["quantity"]
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
			'item_id'			=>	$_GET["id"],
			'item_name'			=>	$_POST["hidden_name"],
			'item_price'		=>	$_POST["hidden_price"],
			'item_quantity'		=>	$_POST["quantity"]
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
				echo '<script>window.location="test.php"</script>';
			}
		}
	}
}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Shopping Cart In PHP and MySql | Webdevtrick.com</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
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
		<!-- Container start -->
  <!-- START OF THE CHECK OF AREA DELIVERY -->
  <form action="<?php $_PHP_SELF ?>" method="POST">
  <input type="text" name="u_Username" <?php echo "value='".$_COOKIE["name"]."'"; ?> >

 
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
        <select class="Barangay" name="Barangay" id="barangay" disabled>
          <option value="" selected="selected">Select Barangay</option>
        </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       <br><br> 
      </div><br> 
    </form>
      
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

    
      <!-- END OF NAVIGATION FOR FOOD CATEGORY -->
      <!-- CONTENT FOR FOOD CATEGORY -->

      <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-SILOGS" role="tabpanel" aria-labelledby="pills-SILOGS-tab" name="Silog">
			

			<?php
				$query = "SELECT * FROM Desserts ORDER BY Food_ID ASC";
				$result = mysqli_query($connect, $query);
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_array($result))
		 {
		 	$Food_ID=$row['Food_ID'];

		 echo '<div class="col-md-4">
		 <form method="post" action="test.php?action=add&id='.$Food_ID.'">
		 <div style="border:3px solid #5cb85c; background-color:whitesmoke; border-radius:5px; padding:16px;" align="center">
		 <img src="data:image;base64,'.base64_encode( $row['FoodImg'] ).'" class="img-responsive" /><br />';
		 ?>
						<h4 class="text-info"><?php echo $row["Food"]; ?></h4>

						<h4 class="text-danger">$ <?php echo $row["Price"]; ?></h4>

						<input type="text" name="quantity" value="1" class="form-control" />

						<input type="hidden" name="hidden_name" value="<?php echo $row["Food"]; ?>" />

						<input type="hidden" name="hidden_price" value="<?php echo $row["Price"]; ?>" />

						<input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />

					</div>
				</form>
			</div>
			<?php
					}
				}
			?>
			<div style="clear:both"></div>
			<br />
			<h3>Order Details</h3>
			<div class="table-responsive">
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
						<td>$ <?php echo $values["item_price"]; ?></td>
						<td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
						<td><a href="test.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
					</tr>
					<?php
							$total = $total + ($values["item_quantity"] * $values["item_price"]);
						}
					?>
					<tr>
						<td colspan="3" align="right">Total</td>
						<td align="right">$ <?php echo number_format($total, 2); ?></td>
						<td></td>
					</tr>
					<?php
					}
					?>
						
				</table>
			</div>
		</div>
	</div>
	<br />
	</body>
</html>


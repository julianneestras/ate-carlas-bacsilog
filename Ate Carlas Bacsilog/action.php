<?php
	session_start();
	require 'conn.php';

	// Add products into the cart table
	if (isset($_POST['pid'])) {
	  $pid = $_POST['pid'];
	  $pname = $_POST['pname'];
	  $pprice = $_POST['pprice'];
	  $pqty = $_POST['pqty'];
	  $total_price = $pprice * $pqty;

	  $stmt = $conn->prepare('SELECT Food_ID FROM Silog WHERE Food_ID=?');
	  $stmt->bind_param('s',$pid );
	  $stmt->execute();
	  $res = $stmt->get_result();
	  $r = $res->fetch_assoc();
	  $code = $r['pid '] ?? '';

	  if (!$code) {
	    $query = $conn->prepare('INSERT INTO cart (product_name,product_price,qty,total_price,product_code) VALUES (?,?,?,?,?)');
	    $query->bind_param('sssss',$pname,$pprice,$pqty,$total_price,$pid);
	    $query->execute();

	    echo '<div class="alert alert-success alert-dismissible mt-2">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  <strong>Item added to your cart!</strong>
						</div>';
	  } else {
	    echo '<div class="alert alert-danger alert-dismissible mt-2">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  <strong>Item already added to your cart!</strong>
						</div>';
	  }
	}

	

	// Get no.of items available in the cart table
	if (isset($_GET['cartItem']) && isset($_GET['cartItem']) == 'cart_item') {
	  $stmt = $conn->prepare('SELECT * FROM cart');
	  $stmt->execute();
	  $stmt->store_result();
	  $rows = $stmt->num_rows;

	  echo $rows;
	}

	// Remove single items from cart
	if (isset($_GET['remove'])) {
	  $product_code = $_GET['remove'];

	  $stmt = $conn->prepare('DELETE FROM cart WHERE product_code=?');
	  $stmt->bind_param('i',$product_code);
	  $stmt->execute();

	  $_SESSION['showAlert'] = 'block';
	  $_SESSION['message'] = 'Item removed from the cart!';
	  header('location:cart.php');
	}

	// Remove all items at once from cart
	if (isset($_GET['clear'])) {
	  $stmt = $conn->prepare('DELETE FROM cart');
	  $stmt->execute();
	  $_SESSION['showAlert'] = 'block';
	  $_SESSION['message'] = 'All Item removed from the cart!';
	  header('location:cart.php');
	}

	if (isset($_GET['logout'])) {
	  $stmt = $conn->prepare('DELETE FROM cart');
	  $stmt->execute();
	  header('location:index.php');
	}

	// Set total price of the product in the cart table
	if (isset($_POST['qty'])) {
	  $qty = $_POST['qty'];
	  $pid = $_POST['pid'];
	  $pprice = $_POST['pprice'];

	  $tprice = $qty * $pprice;

	  $stmt = $conn->prepare('UPDATE cart SET qty=?, total_price=? WHERE product_code=?');
	  $stmt->bind_param('isi',$qty,$tprice,$pid);
	  $stmt->execute();
	}

	// Checkout and save customer info in the orders table
	if (isset($_POST['action']) && isset($_POST['action']) == 'order') {
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
	  $data .= '<br><div class="" style="font-size: 14px;">
					<h1 class="display-4 mt-2" style="font-family: Poppins, sans-serif; font-weight: 700; font-size: 35px; text-align: center">Thank You!</h1>
					<h2 class="text-success" style="font-family: Poppins, sans-serif; font-size: 24px; text-align: center;">Order placed successfully!</h2><br>
					<table width="80%" cellpadding="0" cellspascing="0" border="1" align="center" style="border: 1px solid #c0c0c0;text-align: center;">
									<tr >
								    <th><h4 class=" text-light p-2" style="font-size: 18px; width: 100%; background-color: #AF1D27">Food purchased (Quantity)</th>
								    </tr>
								    <tr >
									<td><h4 style="font-size: 14px; color: dimgray">' . $products . '<br></h4></td>
									</tr>
									</table><br>

						<table width="80%" cellpadding="0" cellspascing="0" border="1" align="center" style="border: 1px solid #c0c0c0">
							<tr>
								<td>
									<h4 style="font-size: 14px; color: dimgray">First Name : ' . $fname . '</h4>
									<h4 style="font-size: 14px; color: dimgray">Last Name : ' . $lname . '</h4>
									<h4 style="font-size: 14px; color: dimgray">Your Phone : ' . $address . '</h4>
									<h4 style="font-size: 14px; color: dimgray">Your E-mail : ' . $email . '</h4>
									<h4 style="font-size: 14px; color: dimgray">Your Phone : ' . $phone . '</h4>
									<h4 style="font-size: 14px; color: dimgray">Total Amount Paid : ' . number_format($grand_total,2) . '</h4>
									<h4 style="font-size: 14px; color: dimgray">Payment Mode : ' . $pmode . '</h4>
									<h4 style="font-size: 14px; color: dimgray">Delivery Instructions : ' . $ins . '</h4>
									<h4 style="font-size: 14px; color: dimgray">Delivery Date : ' . $deldate . '</h4>
									<h4 style="font-size: 14px; color: dimgray">Delivery Time : ' . $deltime . '</h4>
								</td>
							</tr>
						</table>
			  </div>';
	  echo $data;
	}

	  
?>
<?php
      
      if(isset($_POST['update_account']))
{
    include("conn.php");

              $CustID = $_POST['CustID'];
              $CustFName = $_POST['fname'];
              $CustLName = $_POST['lname'];
              $CustGender = $_POST['CustGender'];
              $CustDOB = $_POST['CustBirthday']; 
              $CustAGE = $_POST['CustAge'];
              $CustPhonenum = $_POST['Custphonenum'];
              $Custemail = $_POST['Custemail'];
              $CustAddress = $_POST['Custaddress'];
              $CustUser = $_POST['Custuser'];
              $Custpassword = $_POST['Custpassword'];
              $emailvalidation = '/^\\S+@\\S+\\.\\S+$/';

              $uppercase = preg_match('@[A-Z]@', $Custpassword);
              $lowercase = preg_match('@[a-z]@', $Custpassword);
              $number    = preg_match('@[0-9]@', $Custpassword);
              $specialchars = preg_match('@[^\w]@', $Custpassword);



    if(empty($CustID) || empty($CustFName) || empty($CustLName) ||empty($CustGender) || empty($CustDOB) || empty($CustAGE) || empty($CustPhonenum) || empty($Custemail) || empty($CustAddress) || empty($CustUser) || empty($Custpassword)){
      $fieldsempty = 'Please do not leave empty fields.';

    }else if (strlen($CustFName) < 2){
                
          $prodnameerror = 'First Name must not be less than 2 characters.';

    }else if (strlen($CustLName) < 2){
                
          $prod2nameerror = 'Last Name must not be less than 2 characters.';

    }else if (strlen($CustUser) < 2){
                
          $usernameerror = 'Username must not be less than 2 characters.';

    }else if(preg_match('/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/', $CustFName,$CustLName)){
              
          $prodnameerror2 = 'Invalid Name Please make sure that no special characters are involved.';

    }else if ($CustAGE < 0){

          $Ageerror = 'Age cannot be negative.';

    }else if ($CustAGE < 17){

          $Ageerror2 = 'Minors cannot register.'; 

    }elseif((!$uppercase) || (!$lowercase) || (!$number) || (!$specialchars) || (strlen($Custpassword) < 8)){

          $error_pass = 'Password must has at least 8 characters that include at least 1 lowercase character, 1 uppercase character, 1 number, and 1 special character in (!@#$%^&*)';

    }else{

    $query = "UPDATE custinfo SET First_Name='$CustFName', Last_Name='$CustLName', Gender='$CustGender', DOB='$CustDOB' ,AGE='$CustAGE',Phonenum='$CustPhonenum',Address='$CustAddress',Email='$Custemail',Username='$CustUser',Password='$Custpassword' WHERE CustID='$CustID'";
    

    
    $query_run = mysqli_query($conn, $query);

    if(! $query_run){

        die('Could not enter data: ' . mysqli_error($conn));
      }

        echo "<center><h3><script>alert('User Updated!');</script></h3></center>";
        header('refresh:0;url=adminusers.php?q=1#dashboard?q=1');

    }
  }
    include("conn.php");
  if(isset($_GET['page']))
    {
        $page = $_GET['page'];
    }
    else
    {
        $page = 1;
    }

    $num_per_page = 01;
    $start_from = ($page-1)*01;

    
    
    $query = "SELECT * FROM custinfo limit $start_from,$num_per_page";
    $result = mysqli_query($conn,$query);
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
      height: 920px;
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

input[type=text], input[type=password], select, input[type=number], input[type=date], input[type=tel] , input[type=email]{
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
  <form action="<?php $_PHP_SELF ?>" method="POST" name="updateusers">
    <div id = "leftbox">
      <center>
        <i class="fa-solid fa-ellipsis-vertical" style="font-size: 70px; color: #faf9f9; margin-top: 250px;"></i><br>
        <a href="admindashboard.php#customers"><i class="fa-solid fa-circle-arrow-left" style="color: #faf9f9; font-size: 45px; margin-top: 290px"></i></a>      
      </center>
    </div> 
  <div id = "middlebox">
   <table border="0" width="50%" cellpadding="60" cellspacing="0" align="center">
    <tr>
      <td>
        <div class="row jumbotron">
                <div class="conbox content2" style="width: 990px">
                  <font style="font-weight: 300; font-size: 24px; color: #615f5f;">Customer Profile</font>
                  <font style="font-size: 14px; color: #615f5f">&nbsp;Registered Customer Profile</font><br><br>
                   <div class="row jumbotron">
                    <hr>
                     <form action="<?php $_PHP_SELF ?>" method="POST">
                      <?php 
                    while($row=mysqli_fetch_assoc($result))
                    {
                ?>
                     <div class="col-sm-3 form-group">
                          <label for="name-f">Customer ID</label>
                          <input type="text" class="form-control input2" name="CustID" id="name-f" value="<?=$row['CustID']; ?>" required placeholder="Customer ID" readonly>
                      </div>
                      <div class="col-sm-7 form-group">
                        <!-- Empty Grid -->
                      </div>
                      <div class="col-sm-6 form-group">
                          <label for="name-f">First Name</label>
                          <input type="text" class="form-control input2" name="fname" id="name-f" value="<?= $row['First_Name']; ?>" required placeholder="First Name" readonly>
                      </div>
                      <div class="col-sm-6 form-group">
                          <label for="name-l">Last Name</label>
                          <input type="text" class="form-control input2" name="lname" id="name-l" value="<?= $row['Last_Name']; ?>" required placeholder="Last Name" readonly>
                      </div>
                      <div class="col-sm-6 form-group">
                          <label for="sex">Gender</label>
                          <input type="text" id="sex" name="CustGender" value="<?= $row['Gender']; ?>" placeholder="Gender" readonly></input>
                      </div>
                      <div class="col-sm-4 form-group">
                          <label for="Date">Date Of Birth</label>
                           <input name = "CustBirthday" type = "text" 
                            id = "date" value="<?= $row['DOB']; ?>" required onfocus="(this.type='date')" class="input2" onblur="getAge();" max="2004-06-30" min="1923-01-01" placeholder="Birthdate" readonly>
                      </div>
                      <div class="col-sm-2 form-group">
                          <label for="age">Age</label>
                          <input type="number" class="form-control  input2" name="CustAge" id="u_Age"  maxlength="2" value="<?= $row['Age']; ?>" required readonly placeholder="Age" readonly>
                      </div>
                       <div class="col-sm-6 form-group">
                          <label for="address-1">Home Address</label>
                          <input type="text" class="form-control input2" name="Custaddress" id="address" value="<?= $row['Address']; ?>" required placeholder="Home Address" readonly ondblclick="onDoubleClick(this)" onblur="lostFocus(this)">
                      </div>
                      <div class="col-sm-6 form-group">
                          <label for="phone">Phone Number</label>
                          <input type="tel" class="form-control input2" name="Custphonenum" id="phonenum" value="<?= $row['PhoneNum']; ?>" required pattern="[0-9]{4}-[0-9]{3}-[0-9]{4}" placeholder="1234-567-8901" readonly ondblclick="onDoubleClick(this)" onblur="lostFocus(this)">
                      </div>
                      <div class="col-sm-7 form-group">
                          <label for="email">Email</label>
                          <input type="email" class="form-control input2" name="Custemail" id="email" value="<?= $row['Email']; ?>" required placeholder="Email">
                      </div>
                      <div class="col-sm-5 form-group">
                          <label for="tel">Username</label>
                          <input type="tel" name="Custuser" class="form-control input2" id="username" value="<?= $row['Username']; ?>" required placeholder="Username" readonly>
                      </div>
                      <div class="col-sm-5 form-group">
                        <div class="input-icons">
                          <label for="pass">Password</label>
                          <input type="password" name="Custpassword" class="input2" id="password" value="<?= $row['Password']; ?>" required placeholder="Password" readonly>
                           <i  id="pass-status" class="fa fa-eye" style="cursor: pointer; color: #1c1c1c; margin-top: 13px " onClick="viewPassword()" aria-hidden="true"></i>
                        </div>
                      </div> 
            <?php
                  
              }
            ?> 
            <p align="center"><br>
                <?php 
        
                $pr_query = "SELECT * FROM custinfo";
                $pr_result = mysqli_query($conn,$pr_query);
                $total_record = mysqli_num_rows($pr_result);
                
                $total_page = ceil($total_record/$num_per_page);

                if($page>1)
                {
                    echo "<a href='adminusers.php?page=".($page-1)."' class='btn btn-danger' style='background: #8f8f8f; border-radius: 5vh; border: 0px solid; font-weight: bold'><i class='fa-solid fa-angle-left'></i></a>";

                }

                
                for($i=1;$i<$total_page;$i++)
                {
                    echo "<a href='adminusers.php?page=".$i."' class='btn btn-primary' style='color: #8f8f8f; font-size: 14.5px; font-family: Poppins; font-weight: bold; background-color: transparent; border: 0px solid; margin: 5px;'>$i</a>";
                }

                if($i>$page)
                {
                    echo "<a href='adminusers.php?page=".($page+1)."' class='btn btn-danger' style='background: #8f8f8f; border-radius: 5vh; border: 0px solid; font-weight: bold;'><i class='fa-solid fa-angle-right'></i></a>";
                }
        
        ?>
            </p>

                      <?php if(isset($fieldsempty)) { ?>
                      <p class="validationlabel2"> <?php echo $fieldsempty; ?></p>
                      <?php } ?>

                      <?php if(isset($prodnameerror)) { ?>
                      <p class="validationlabel2"> <?php echo $prodnameerror; ?></p>
                      <?php } ?>

                      <?php if(isset($prod2nameerror)) { ?>
                      <p class="validationlabel2"> <?php echo $prod2nameerror; ?></p>
                      <?php } ?>

                      <?php if(isset($prodnameerror2)) { ?>
                      <p class="validationlabel2"> <?php echo $prodnameerror2; ?></p>
                      <?php } ?>

                      <?php if(isset($Ageerror)) { ?>
                      <p class="validationlabel2"> <?php echo $Ageerror; ?></p>
                      <?php } ?>

                      <?php if(isset($Ageerror2)) { ?>
                      <p class="validationlabel2"> <?php echo $Ageerror2; ?></p>
                      <?php } ?>

                      <?php if(isset($error_pass)) { ?>
                      <p class="validationlabel2"> <?php echo $error_pass; ?></p>
                      <?php } ?>

                      <?php if(isset($usernameerror)) { ?>
                      <p class="validationlabel2"> <?php echo $usernameerror; ?></p>
                      <?php } ?>

                  </div>
                  <div class="col-sm-12 form-group mb-0">
                <br><br>
                <input class="title" name="update_account" type="submit" value="SAVE" style="box-shadow: none">

                <a href="admindashboard.php#customers"><input class="title" type="button" value="CANCEL" style="background-color: transparent; border: 1px solid #c0c0c0; color: #615f5f;"></a>

                <input class="title" type="submit" value=" X DELETE" style="box-shadow: none; float: right; background-color:#EC5656">
            </div>
                </div>
      </td> 
    </tr>
   </table>
  </div>
  <script type="text/javascript">
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
</form>
</body>
</html>
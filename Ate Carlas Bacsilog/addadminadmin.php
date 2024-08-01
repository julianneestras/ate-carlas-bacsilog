<?php
session_start();
         if(isset($_POST['register'])) {

            include("conn.php");
            
            if(! $conn ) {
               die('Could not connect: ' . mysqli_error($conn));
            }         
               $AFirstname = ucwords($_POST['A_Fname']);
               $ALastname = ucwords($_POST['A_Lname']);
               $AGender = ucwords($_POST['A_Gender']);
               $ADOB = $_POST['A_Birthday'];
               $AGE=$_POST['A_Age'];
               $APhonenum=$_POST['A_phonenum'];
               $AEmail=$_POST['A_email'];
               $AUsername = $_POST['A_Username'];
               $APassword= $_POST['A_Password']; 

                $str="SELECT Email from admintable WHERE Email='$AEmail'";
                $results=mysqli_query($conn,$str);

               $str1="SELECT Username from admintable WHERE Username='$AUsername'";
               $results1=mysqli_query($conn,$str1);

               if((mysqli_num_rows($results))>0) 
                {
            echo "<center><h3><script>alert('Sorry. This email is already registered !!');</script></h3></center>";
            
                      }
               else if((mysqli_num_rows($results1))>0) 
            {
            echo "<center><h3><script>alert('Sorry. This username is already registered !!');</script></h3></center>";
            
          }

          

            else if (empty($AFirstname) || empty($ALastname) || empty($AGender) ||empty($APhonenum) || empty($AEmail) || empty($AUsername) || empty($APassword)) {
                
                $fieldsempty = 'Please do not leave empty fields.';

            
            }else if (strlen($APassword) < 8){
                
                $passworderror = 'Password must not be less than 8 characters.';

            }else if (!preg_match('/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/', $APassword)) {
              
                $passworderror2 = 'Password must have at least 1 special character.';

            }else if (strlen($AFirstname) < 2){

                $fnameerror = 'First Name is too short.';

            }else if (strlen($ALastname) < 2){

                $lnameerror = 'Last Name is too short.';

            }else if (strlen($AUsername) < 6){

                $unameerror = 'Username is too short (minimum of 6 characters).';

            }else if (preg_match('~[0-9]+~', $AFirstname)) {
              
                $fnamenumerror = 'First Name must not contain numeric characters.';

            }else if (preg_match('~[0-9]+~', $ALastname)) {
              
                $lnamenumerror = 'Last Name must not contain numeric characters.';

            }
            else if (preg_match('/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/', $AFirstname)) {
              
                $fnamenumerror2 = 'First Name must not contain symbols or special characters.';

            }else if (preg_match('/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/', $ALastname)) {
              
                $lnamenumerror2 = 'Last Name must not contain symbols or special characters.';

            }else if (($AGender != 'Male') && ($AGender != 'Female') || ($AGender == 'selectgender')) {
              
                $gendererror = 'Please select your gender.';

            }else if (!filter_var($AEmail, FILTER_VALIDATE_EMAIL)) {

                $emailErr = "Invalid email format. Please include an '@' in the email address.";

            }else if(!preg_match('/^[0-9]{4}-[0-9]{3}-[0-9]{4}$/', $APhonenum)) {
      
                $phoneerror = 'Please match the requested format.';

            }else if(empty($ADOB) || empty($AGE)) {
      
                $bdateerror = 'Please choose your birthdate.';

            }else {

               
            $sql = "insert into admintable ". "(First_Name, Last_Name, Gender, DOB, Age, Phone_no, Email, Username, Password) ". "VALUES('$AFirstname', '$ALastname', '$AGender',  '$ADOB', '$AGE', '$APhonenum', '$AEmail','$AUsername','$APassword')";

            $retval = mysqli_query( $conn,$sql );

            
            if(! $retval ) {
               die('Could not enter data: ' . mysqli_error($conn));
             }
           
                  echo "<center><h3><script>alert('Admin added.');</script></h3></center>";
                  header('refresh:0;url=addadminadmin.php?q=1');
                  mysqli_close($conn);
            }
            
         }else {

         }

      if(isset($_POST['submit']))
  { 
    include("conn.php");
    $P_ID=$_SESSION['P_ID'];
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
  <style type="text/css">
     body {
      background-color:  #FAF9F9;
      overflow-x: hidden;

    }

 #leftbox {
      float:left; 
      background: #AF1D27;
      width:18%;
      height: 800px;
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
          float: right;

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

   .validationlabel {
    color: white;
    background-color: #F57C77;
    padding: 8px;
    width: 100%;
/*    border-bottom: 2px solid  #C95752;*/
    font-size: 13px;
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
  <form action="<?php $_PHP_SELF ?>" method="POST">
    <div id = "leftbox">
      <center>
        <i class="fa-solid fa-ellipsis-vertical" style="font-size: 70px; color: #faf9f9; margin-top: 250px;"></i><br>
        <a href="admindashboard.php#admin"><i class="fa-solid fa-circle-arrow-left" style="color: #faf9f9; font-size: 45px; margin-top: 270px"></i></a>      
      </center>
    </div> 
  <div id = "middlebox">
   <table border="0" width="50%" cellpadding="60" cellspacing="0" align="center">
    <tr>
      <td>
        <div class="row jumbotron">
                <div class="conbox content2" style="width: 990px">
                  <font style="font-weight: 300; font-size: 24px; color: #615f5f;">Admin Profile</font>
                  <font style="font-size: 14px; color: #615f5f">&nbsp;Add a New Admin</font><br><br>
                   <div class="row jumbotron">
                    <hr>
                     <div class="col-sm-3 form-group">
                    <?php 

                        include("conn.php");
                       
                        $dbcon = mysqli_select_db($conn, 'ecombacsilog');
                        $result = mysqli_query($conn, "SHOW TABLE STATUS LIKE 'admintable'");
                        $data =  mysqli_fetch_assoc($result);
                        $next_increment = $data['Auto_increment'];

                        echo '<label for="name-f">Admin ID</label>
                          <input type="text" class="form-control input2" name="AdminID" id="name-f" value="' .$next_increment .'" placeholder="Enter ID" readonly style="background-color: #EEEEEE; color: #808080">';
                    ?>
                      </div>
                      <div class="col-sm-7 form-group">
                        <!-- Empty Grid -->
                      </div>
                       <div class="col-sm-6 form-group">
                          <label for="name-f">First Name</label>
                          <input type="text" class="form-control input2" name="A_Fname" id="name-f" value="<?php echo $_POST['A_Fname'] ?? ''; ?>" placeholder="Enter First Name">
                          <?php if(isset($fnameerror)) { ?>
                          <p class="validationlabel2"> <?php echo $fnameerror; ?></p>
                          <?php } ?>
                          <?php if(isset($fnamenumerror)) { ?>
                          <p class="validationlabel2"> <?php echo $fnamenumerror; ?></p>
                          <?php } ?>
                          <?php if(isset($fnamenumerror2)) { ?>
                          <p class="validationlabel2"> <?php echo $fnamenumerror2; ?></p>
                          <?php } ?>
                      </div>
                      <div class="col-sm-6 form-group">
                          <label for="name-l">Last Name</label>
                          <input type="text" class="form-control input2" name="A_Lname" id="name-l" value="<?php echo $_POST['A_Lname'] ?? ''; ?>" placeholder="Enter Last Name">
                          <?php if(isset($lnameerror)) { ?>
                          <p class="validationlabel2"> <?php echo $lnameerror; ?></p>
                          <?php } ?>
                          <?php if(isset($lnamenumerror)) { ?>
                          <p class="validationlabel2"> <?php echo $lnamenumerror; ?></p>
                          <?php } ?>
                          <?php if(isset($lnamenumerror2)) { ?>
                          <p class="validationlabel2"> <?php echo $lnamenumerror2; ?></p>
                          <?php } ?>
                      </div>
                      <div class="col-sm-6 form-group">
                          <label for="sex">Gender</label>
                       <select name="A_Gender" id="">
                            <option value="selectgender" hidden>Select Gender</option>
                            <option value="Male" <?php echo (isset($_POST['A_Gender']) && $_POST['A_Gender'] === 'Male') ? 'selected' : ''; ?>>Male</option>
                            <option value="Female" <?php echo (isset($_POST['A_Gender']) && $_POST['A_Gender'] === 'Female') ? 'selected' : ''; ?>>Female</option>
                        </select>
                          <?php if(isset($gendererror)) { ?>
                          <p class="validationlabel2"> <?php echo $gendererror; ?></p>
                          <?php } ?>
                      </div>
                      <div class="col-sm-4 form-group">
                          <label for="Date">Date Of Birth</label>
                           <input name = "A_Birthday" type = "text" 
                            id = "date" onfocus="(this.type='date')" class="input2" onblur="getAge();" max="2004-06-30" min="1923-01-01" value="<?php echo $_POST['A_Birthday'] ?? ''; ?>" placeholder="Birthdate">
                          <?php if(isset($bdateerror)) { ?>
                          <p class="validationlabel2"> <?php echo $bdateerror; ?></p>
                          <?php } ?>
                      </div>
                      <div class="col-sm-2 form-group">
                          <label for="age">Age</label>
                          <input type="number" class="form-control  input2" name="A_Age" id="u_Age"  maxlength="2" required readonly value="<?php echo $_POST['A_Age'] ?? ''; ?>" placeholder="Age">
                          <br><br>
                      </div>
                      <div class="col-sm-6 form-group">
                          <label for="phone">Phone Number</label>
                          <input type="text" class="form-control input2" name="A_phonenum" id="phonenum" value="<?php echo $_POST['A_phonenum'] ?? ''; ?>" placeholder="1234-567-8901">
                           <?php if(isset($phoneerror)) { ?>
                          <p class="validationlabel2"> <?php echo $phoneerror; ?></p>
                          <?php } ?>
                      </div>
                      <div class="col-sm-6 form-group">
                          <label for="email">Email</label>
                          <input type="text" class="form-control input2" name="A_email" id="email" value="<?php echo $_POST['A_email'] ?? ''; ?>" placeholder="Enter your email"> 
                          <?php if(isset($emailErr)) { ?>
                          <p class="validationlabel2"> <?php echo $emailErr; ?> </p>
                          <?php } ?>
                      </div>
                    
                      <div class="col-sm-6 form-group">
                          <label for="tel">Username</label>
                          <input type="text" name="A_Username" class="form-control input2" id="tel" value="<?php echo $_POST['A_Username'] ?? ''; ?>" placeholder="Enter your username">
                          <?php if(isset($unameerror)) { ?>
                          <p class="validationlabel2"> <?php echo $unameerror; ?> </p>
                          <?php } ?>
                      </div>
                      <div class="col-sm-6 form-group">
                        <div class="input-icons">
                          <label for="pass">Password</label>
                          <input type="password" name="A_Password" class="input2" id="id_password" placeholder="Enter your password" value="<?php echo $_POST['A_Password'] ?? ''; ?>">
                           <i id="togglePassword" class="fa fa-eye" style="cursor: pointer; color: #1c1c1c; margin-top: 13px " onClick="viewPassword()" aria-hidden="true"></i>
                          <?php if(isset($passworderror)) { ?>
                          <p class="validationlabel2"> <?php echo $passworderror; ?> </p>
                          <?php } ?>
                          <?php if(isset($passworderror2)) { ?>
                          <p class="validationlabel2"> <?php echo $passworderror2; ?> </p>
                          <?php } ?>
                        </div>
                      </div>
                      <div class="col-sm-6 form-group mb-0">
                        <br>
                      <?php if(isset($fieldsempty)) { ?>
                          <p class="validationlabel"> <?php echo $fieldsempty; ?> </p>
                        <?php } ?>
                      </div>
                      <div class="col-sm-6 form-group mb-0">
                        <br><br>
                         <input class="title" type="submit" value="ADD" style="box-shadow: none" name="register">

                         <a href="admindashboard.php#admin"><input class="title" type="button" value="CANCEL" style="background-color: transparent; border: 1px solid #c0c0c0; color: #615f5f;"></a>
                      </div>          
                  </div>
                </div>
      </td> 
    </tr>
   </table>
  </div>
</form>
  <script type="text/javascript">

function getAge(){
    var u_Birthday = document.getElementById('date').value;
    u_Birthday = new Date(u_Birthday);
    var today = new Date();
    var u_Age = Math.floor((today-u_Birthday) / (365.25 * 24 * 60 * 60 * 1000));
    document.getElementById('u_Age').value=u_Age;
}
const togglePassword = document.querySelector('#togglePassword');
  const password = document.querySelector('#id_password');

  togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});

</script>
</body>
</html>
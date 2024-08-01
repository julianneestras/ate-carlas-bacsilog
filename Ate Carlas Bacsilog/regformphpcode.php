<?php  

   include 'loginOOP.php';  
   $LoginForm = new LoginForm();   
    
   if(isset($_POST['login']))
   {

      $Login = $LoginForm->Login($_POST['u_Username'],$_POST['u_Password']);  
      if($Login)
      { 
       echo "<center><h3><script>alert('Welcome! You have successfully logged in.');</script></h3></center>";
      header("refresh:0;url=testinglogin.php"); 
      } 
   }  
?>

<?php  
   include 'regformOOP.php';  
   $RegFormCarla = new RegFormCarla ();
   $error_Fname_length = '';
    $error_Lname_length ='';

    $error_Fname_num = '';
    $error_Lname_num= '';

    $error_username_length = '';
    $error_pass = '';
    $error_pass_num = '';

    $error_username = '';
    $error_password = '';
    $error_cfpass = '';
    $error_otp ='';

    $select_err = "";


   if(isset($_POST['submit']))
   {    

        $otp = $_SESSION['otp'];
        $email = $_POST['u_Email'];
        $otp_code = $_POST['u_Code'];
        


    $fname = $_POST['u_Fname'];
    $lname = $_POST['u_Lname'];
    $username = $_POST['u_Username'];
    $pass = $_POST['u_Password'];

    $Lname = preg_match('@[0-9]@', $lname);
    $Fname = preg_match('@[0-9]@', $fname);
    $user = preg_match('@[0-9]@', $username);
    $uppercase = preg_match('@[A-Z]@', $pass);
    $lowercase = preg_match('@[a-z]@', $pass);
    $number    = preg_match('@[0-9]@', $pass);
    $specialchars = preg_match('@[^\w]@', $pass);

    if ($otp != $otp_code)
    {
        $error_otp = '<label class="text-danger">Enter Correct OTP Code</label>';
    }
    elseif(strlen($fname)<2)
    {
     $error_Fname_length = '<label class="text-danger">First Name must be at least 2 characters in length</label>';
    }
    elseif(strlen($lname)<2)
    {
     $error_Lname_length = '<label class="text-danger">Last Name must be at least 2 characters in length</label>';
    }
    elseif($Fname)
    {
       $error_Fname_num = '<label class="text-danger">First Name must not contain any number</label>';
    }
    elseif($Lname)
    {
       $error_Lname_num = '<label class="text-danger">Last Name must not contain any number</label>';
    }
    elseif((!$uppercase) || (!$lowercase) || (!$number) || (!$specialchars) || (strlen($pass) < 8))
    {
      $error_pass = '<label class="text-danger">Password must has at least 8 characters that include at least 1 lowercase character, 1 uppercase character, 1 number, and 1 special character in (!@#$%^&*)</label>';
    }        
    elseif(($otp == $otp_code)||(strlen($fname)>2||(strlen($lname)>2||($Fname)||($Lname)||($uppercase) || ($lowercase) || ($number) || ($specialchars) || (strlen($pass) > 8)||
    (!empty($u_Username))||(!empty($u_Password))||(!empty($u_cnfpassword)))))

    {  
        $registration = $RegFormCarla ->registration($_POST['u_Fname'],$_POST['u_Lname']
        ,$_POST['Gender'],$_POST['u_Birthday'],$_POST['u_Age'],$_POST['u_Address']
        ,$_POST['u_Phonenum'],$_POST['u_Email'],$_POST['u_Code'],$_POST['u_Username']
        ,$_POST['u_Password']); 
            if($registration)
            {
                 echo "<center><h3><script>alert('Registration Successful !!');</script></h3></center>";  
                 header('refresh:0;url=index.php?q=1'); 
            }
            else
            {
                echo "<center><h3><script>alert('Registration Unsuccessful!');</script></h3></center>";  
            }
        }
    elseif (empty($u_Username))
    {
      $error_username = '<label class="text-danger">Please input username.</label>';
    }
    elseif (empty($u_Password))
    {
      $error_password = '<label class="text-danger">Please input password.</label>';
    }
    elseif(empty($cnfpassword))
    {
      $error_cfpass = '<label class="text-danger">Please confirm password.</label>';
    }   
    }


?>


    <!-- /*$fname = $_POST['u_Fname'];
    $lname = $_POST['u_Lname'];
    $username = $_POST['u_Username'];
    $pass = $_POST['u_Password'];

    $Lname = preg_match('@[0-9]@', $lname);
    $Fname = preg_match('@[0-9]@', $fname);
    $user = preg_match('@[0-9]@', $username);
    $uppercase = preg_match('@[A-Z]@', $pass);
    $lowercase = preg_match('@[a-z]@', $pass);
    $number    = preg_match('@[0-9]@', $pass);
    $specialchars = preg_match('@[^\w]@', $pass);
  


    if(strlen($fname)<2)
    {
     $error_Fname_length = '<label class="text-danger">First Name must be at least 2 characters in length</label>';
    }
    if(strlen($lname)<2)
    {
     $error_Lname_length = '<label class="text-danger">Last Name must be at least 2 characters in length</label>';
    }
    if($Fname)
    {
       $error_Fname_num = '<label class="text-danger">First Name must not contain any number</label>';
    }
    if($Lname)
    {
       $error_Lname_num = '<label class="text-danger">Last Name must not contain any number</label>';
    }
    if((!$uppercase) || (!$lowercase) || (!$number) || (!$specialchars) || (strlen($pass) < 8))
    {
      $error_pass = '<label class="text-danger">Password must has at least 8 characters that include at least 1 lowercase character, 1 uppercase character, 1 number, and 1 special character in (!@#$%^&*)</label>';
    }
    if(strlen($user)<3)
    {
      $error_username_length = '<label class="text-danger">Username must be at least 3 characters.</label>';
    }
    if (empty($u_Username))
    {
      $error_username = '<label class="text-danger">Please input username.</label>';
    }
    if (empty($u_Password))
    {
      $error_password = '<label class="text-danger">Please input password.</label>';
    }
    if (empty($cnfpassword))
    {
      $error_cfpass = '<label class="text-danger">Please confirm password.</label>';
    }
*/ -->
    


<?php
include 'conn.php';
if(isset($_POST['verify'])) 
{

    $u_Email = $_POST['u_Email'];

        $str="SELECT Email from custinfo WHERE Email='$u_Email'";
        $results=mysqli_query($conn,$str);

    
   


     $fname = $_POST['u_Fname'];
    $lname = $_POST['u_Lname'];
    $Gender = $_POST['Gender'];
     $Lname = preg_match('@[0-9]@', $lname);
    $Fname = preg_match('@[0-9]@', $fname);



    //$to="shnvrla@gmail.com";
$to = $_POST['u_Email'];
$otp = rand(100000,999999);



$_SESSION['otp'] = $otp;
$name = $_POST['u_Fname'];
$from = "acarlasbacsilog@gmail.com"; 
$fromName = "acarlasbacsilog@gmail.com";
$email = $_POST['u_Email'];
 
$subject = "OTP Verification Code for" . $name; 
 
$body = ' 
    <html> 
    <head> 
    </head> 
    <body> 
        <h1>Your OTP Verification Code</h1> 
        <p>Hi!, '.$name.'! <br><br>

        Here is the confirmation code for your registration form: <br><br>

        Your Verification Code is: '.$otp.' <br><br>

        All you have to do is copy the confirmation code and paste it to the form to complete the email verification process.

        <br>
        Ate Carla`s Bacsilog
        </p>

    
        
    </body> 
    </html>'; 

// Set content-type header for sending HTML email 
$headers = "MIME-Version: 1.0" . "\r\n"; 
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 

 
// Additional headers 
$headers .= 'From: '.$fromName.'<'.$fromName.'>' . "\r\n"; 

 
    if((mysqli_num_rows($results))>0) 
    {
      echo "<center><h3><script>alert('Sorry. This email is already registered !!');</script></h3></center>";
            
    }
    elseif(strlen($fname)<2)
    {
     $error_Fname_length = '<label class="text-danger">First Name must be at least 2 characters in length</label>';
    }
    elseif(strlen($lname)<2)
    {
     $error_Lname_length = '<label class="text-danger">Last Name must be at least 2 characters in length</label>';
    }
    elseif($Fname)
    {
       $error_Fname_num = '<label class="text-danger">First Name must not contain any number</label>';
    }
    elseif($Lname)
    {
       $error_Lname_num = '<label class="text-danger">Last Name must not contain any number</label>';
    }
    else
    {
        if(mail($to, $subject, $body, $headers))
        { 
            echo "<center><h3><label class='text-danger'>Email Sent</label></h3></center>";
        }
    }

   
}
?>

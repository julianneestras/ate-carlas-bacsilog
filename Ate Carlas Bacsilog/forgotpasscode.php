<!-- PHP CODE FOR LOGIN START -->
<?php  
session_start();
ob_start();
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
      else
      {  
         echo "Login Failed!";  
      }  
   }  
?>

<?php
if(isset($_POST['sendlinkpass']))
{
  include 'conn.php';
    $email = $_POST['emailforgotpass'];

    $search="SELECT Email,Password from custinfo where (email='$email')";
    $result=mysqli_query($conn,$search) or die ('Error in sql');
    $rowcount=mysqli_num_rows($result);
    if ($rowcount==0){
        echo "<center><h3><script>alert('No Existing Email!!');</script></h3></center>";
      }
    else
    {
        while($row=mysqli_fetch_array($result))
        {     
          $email=$row['Email'];
          $pass=$row['Password'];
        }
    
    $link="<a href='http://localhost/Ecom/resetpass.php?key=".$email."&reset=".$pass."'>Click To Reset password</a>";
    $to = $_POST['emailforgotpass'];
    $from = $_POST['emailforgotpass'];  
    $fromName = $_POST['emailforgotpass']; 
    $email = $_POST['emailforgotpass'];
 
$subject = "Forgot Password " . $email; 
 
$body = ' 
    <html> 
    <head> 
    </head> 
    <body> 
        <h1>Your Reset Password Link</h1> 
        <p>Hello, '.$email.'! <br><br>

        Your Reset Password Link: '.$link.' <br><br>

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

 
// Send email
if(mail($to, $subject, $body, $headers))
{ 
     echo "<center><h3><label class='text-danger'>Email Sent</label></h3></center>";
}else{ 
   echo "<center><h3><script>alert('Register Failed, Invalid Email');</script></h3></center>";
}
}
}
?>

<!-- PHP CODE FOR LOGIN END -->
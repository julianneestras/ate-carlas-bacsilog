<?php
  
  class LoginForm
  {
    public function Login($u_Username, $u_Password)
    {
        include('conn.php');

       $u_Username= $_POST['u_Username'];
    $u_Password= $_POST['u_Password'];
    


    $str="SELECT * from custinfo WHERE Username='$u_Username'
                     AND Password='$u_Password'";
    $results=mysqli_query($conn,$str);
    
    while ($pass=mysqli_fetch_array($results, MYSQLI_ASSOC)){
      if((mysqli_num_rows($results))>0){
           echo "<center><h3><script>alert('Welcome! You have successfully logged in.');</script></h3></center>";
      header("refresh:0;url=test2.php"); 
          
      }
    } 
  if (mysqli_num_rows($results) == 0){
          $u_Username = $_POST['u_Username']; 
          $u_Password = $_POST['u_Password'];

          $condition1 ="SELECT Username from custinfo WHERE Username='$u_Username'";
          $condition2 ="SELECT Password from custinfo WHERE Password='$u_Password'";     

          $C1results=mysqli_query($conn,$condition1);
          $C2results=mysqli_query($conn,$condition2);

          if((mysqli_num_rows($C1results))>0 && (mysqli_num_rows($C2results))==0){  
            echo "<center><h1><script>alert('Wrong password!');</script></h1></center>";
              header("refresh:0;url=index.php");
          }
          elseif((mysqli_num_rows($C2results))>0 && (mysqli_num_rows($C1results))==0){
            echo "<center><h1><script>alert('Username does not exist.');</script></h1></center>";
              header("refresh:0;url=index.php");
          }
          else{
            echo "<center><h1><script>alert('Username or password is incorrect.');</script></h1></center>";
              header("refresh:0;url=index.php");
          } 
        }
      }
  }
?>


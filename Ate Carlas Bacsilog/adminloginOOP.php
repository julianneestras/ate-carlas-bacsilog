
<?php
  
  class LoginForm
  {
    public function Login($A_Username, $A_Password)
    {
        include('conn.php');

       $A_Username= $_POST['A_Username'];
    $A_Password= $_POST['A_Password'];

    


    $str="SELECT * from custinfo WHERE Username='$A_Username'
                     AND Password='$A_Password'";
    $results=mysqli_query($conn,$str);
    
    while ($pass=mysqli_fetch_array($results, MYSQLI_ASSOC)){
      if((mysqli_num_rows($results))>0){
          echo "<center><h1><script>alert('You have successfully logged in.')</script></h1></center";
          header("refresh:0;url=userorderform.php");
      }
    } 
  if (mysqli_num_rows($results) == 0){
          $u_Username = $_POST['A_Username']; 
          $u_Password = $_POST['A_Password'];

          $condition1 ="SELECT Username from custinfo WHERE Username='$A_Username'";
          $condition2 ="SELECT Password from custinfo WHERE Password='$A_Password'";     

          $C1results=mysqli_query($conn,$condition1);
          $C2results=mysqli_query($conn,$condition2);

          if((mysqli_num_rows($C1results))>0 && (mysqli_num_rows($C2results))==0){  
            echo "<center><h1><script>alert('Wrong password!');</script></h1></center>";
              header("refresh:0;url=index.php");
          }
          elseif((mysqli_num_rows($C2results))>0 && (mysqli_num_rows($C1results))==0){
            $login_error = 'Username does not exist.';
              header("refresh:0;url=index.php");
          }
          else{
            echo "<center><h1><script>alert('Username or password is incorrect.');</script></h1></center>";
              header("refresh:0;url=admin.php");
          } 
        }
      }
  }
?>


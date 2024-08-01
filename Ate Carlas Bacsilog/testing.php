 
 <style type="text/css">
    @import url('http://fonts.cdnfonts.com/css/codec-pro');
    @import url('http://fonts.cdnfonts.com/css/gogh');

    body{
      overflow-x: hidden;
    }

    .subtitle{
      font-family: 'Codec Pro', sans-serif;
      color: #CCC5B9;
      font-size: 20px;
    }

    .title{
      font-family: 'Gogh', sans-serif;
    }

 .btn-outline-dark:hover{
    color:   #403D39 !important;
    background-color:  #FFFCF2 !important;
    border-color: 0px transparent !important; 
}

  nav {
    height: 94px;
  }
  </style>
<body style="background-image: url(images/summarybg.png);">


<h1><center style="margin-top: 75px; font-family: 'Gogh', sans-serif; color: white; font-size: 50px;">MESSAGE HISTORY</center></h1>

    <center><?php  
    date_default_timezone_set('Asia/Manila');
    echo '<p class="time subtitle">As of '.date("m-d-Y").' ('.date("g:i a").')</p>';
    ?></center>
<center>
<?php
session_start();
include('conn.php');


$q1="SELECT ProdName,ProdNo FROM ordersummary ORDER BY Order_ID" or die('Error223');
$result = mysqli_query($conn, $q1); 
echo  '<div>
                <p> ORDERS </p>
            <table border="0" width="85%" cellpadding="10" cellspacing="0" align="center" style=" font-family: Gogh, sans-serif;">
             <tr style="color:#3C848C; background-color:#A2D1D7; font-weight: 600; font-family: "Montserrat", sans-serif;" height=60; table-layout: fixed">
                <td width=90><center>OrderID</center></td>
                <td width=><center>CustID</center></td>
                <td width="30%"><center>ProdName</center></td>
                
              

             </tr>';
                    while($row=mysqli_fetch_array($result) )
                    {
                        
                        $Name=$row['ProdNo'];
                        $Age=$row['ProdName'];
                        

                 
                        echo '<tr style="background-color: white; color: #252422; box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px; font-family: Roboto;">
                        
                        <td><center>'.$Name.'</center></td>
                        <td><center>'.$Age.'</center></td>
                        ';
                       
                        echo '<td><center> 
                        


                        ';
                    }
                    

                    echo '</table>

                     
                    </div></div>';

?>
<br>

<input type="submit" onclick="confirmLeave()" name="logout" value='LOGOUT' class="title" style="background-color: #468FAF; box-shadow: rgba(0, 0, 0, 0.45) 0px 25px 20px -20px; height: 55px; border-radius: 50px; border: 0px solid transparent; font-size: 16px; width: 26%;  margin-left: -45px; color: whitesmoke;">



<script>

function confirmLeave() {
if(!confirm("Are you sure you want to log out?")) return;
window.open('index.php',"_self");
}
</script>


	
</body>
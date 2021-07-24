<?php
session_start();
error_reporting(E_ALL^E_NOTICE);
$host="localhost";
$dbUsername="root";
$dbPassword="";
$dbname="phpmyadmin";

$con=new mysqli($host,$dbUsername,$dbPassword,$dbname);
if($con->connect_error){
	die('connect error:'.$con->connect_error);
}

$_SESSION['users']=array();
$c_pwd=$_POST['c_pwd'];
$hash=password_hash($c_pwd,PASSWORD_DEFAULT);
$c_id=$_POST['c_id'];

$_SESSION['users']['username']=$c_id;
$lastorderid="select order_id 
from order_details 
order by order_id desc
 limit 1";
 
 $result1=mysqli_query($con,$lastorderid);
 
 $row1=mysqli_fetch_array($result1,MYSQLI_ASSOC);

 $order_id=current($row1);
 
if($order_id>=1)
{
    $order_id++;
}
else{
    $order_id=1;
}
$_SESSION['users']['orderid']=$order_id;


$lastrefno="select ref_no
	from payment_details
	order by ref_no desc
	 limit 1";

     $result2=mysqli_query($con,$lastrefno);
     $row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
     $ref_no=current($row2);
     if($ref_no>=1){
     $ref_no++;
     }
     else{
         $ref_no=1;
     }
     $_SESSION['users']['refno']=$ref_no;
    

//to prevent from sql injection
$c_id=stripcslashes($c_id);
$c_pwd=stripcslashes($c_pwd);
$c_id=mysqli_real_escape_string($con,$c_id);
$c_pwd=mysqli_real_escape_string($con,$c_pwd);


/*$sql="select customer_login.c_id, customer_details.c_pwd
from customer_login join customer_details on
customer_login.c_phno=customer_details.c_phno
where customer_login.cid=$c_id and customer_details.c_pwd=$pwd";
*/

    $sql="select * from Customer_details
    where c_id='{$c_id}'and c_pwd='{$c_pwd}'";
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count=mysqli_num_rows($result);
    
    if($count==1){
        header('location:index.html');
       echo '<br>';
      echo'<script> alert("Login Successful!")</script>';
        
        
    
    }
    else{
       
        header('location:final login.html');
      
    }



?> 

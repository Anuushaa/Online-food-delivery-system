<?php
session_start();
error_reporting(E_ALL^E_NOTICE);
header('location:restaurant3.html');
$f_id=$_POST['f_id'];
$c_id=$_SESSION['users']['username'];
$order_id=$_SESSION['users']['orderid'];
$r_id=3;
$cost1=$_POST['cost'];
$_SESSION['users']['cost1']=$cost1;
$temp=$_SESSION['users']['cost'];
$_SESSION['users']['cost']=$cost1+$temp;
$qty=$_POST['qty'];
$total=$_POST['cost'];
$host="localhost";
	$dbUsername="root";
	$dbPassword="";
	$dbname="phpmyadmin";
	$con=new mysqli($host,$dbUsername,$dbPassword,$dbname);

	if(isset($_POST['Submit'])){
	

if($con->connect_error){
	die('connect error:'.$con->connect_error);
}
 
 if($c_id !=''&&$f_id !=''&&$order_id !=''){
    $query1 ="insert into order_details(order_id,c_id,f_id,quantity,total) values ('$order_id','$c_id','$f_id','$qty','$total')";
    $con->query($query1);
   
    //echo "succesfully registered";
    header('location:restaurant3.html');
}
else{
echo "<p>Insertion Failed <br/> Some Fields are Blank....!!</p>";
}
 }
$con->close();

	
		/*	$INSERT="INSERT INTO order_details(order_id,c_id,f_id)values (?,?,?)";
			$stmt=$con->prepare($INSERT);
			$stmt->bind_param("iss",$order_id,$c_id,$f_id);
			$stmt->execute();
			header('location:restaurant1.html');
			$stmt->close();
			$conn->close();
		*/

 

?>
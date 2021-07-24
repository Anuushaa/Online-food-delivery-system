<?php
session_start();
error_reporting(E_ALL^E_NOTICE);


$f_id=$_POST['18'];
$c_id=$_SESSION['users']['username'];
$order_id=$_SESSION['users']['orderid'];

$host="localhost";
	$dbUsername="root";
	$dbPassword="";
	$dbname="phpmyadmin";
	$con=new mysqli($host,$dbUsername,$dbPassword,$dbname);
	
if($con->connect_error){
	die('connect error:'.$con->connect_error);
}
 
 else{
	
	
		$INSERT="INSERT INTO order_details(order_id,c_id,f_id)values (?,?,?)";
		
			$stmt=$con->prepare($INSERT);
			$stmt->bind_param("iss",$order_id,$c_id,$f_id);
			$stmt->execute();
			header('location:restaurant1.html');
		
	 
 }	
		
?>
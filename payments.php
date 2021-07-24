<?php
session_start();
error_reporting(E_ALL^E_NOTICE);
header('location: rating.html');
$order_id=$_SESSION['users']['orderid'];
$type=$_POST['Submit'];
$cost=$_SESSION['users']['cost'];
$ref_no=$_SESSION['users']['refno'];

$host="localhost";
	$dbUsername="root";
	$dbPassword="";
	$dbname="phpmyadmin";
	$con=new mysqli($host,$dbUsername,$dbPassword,$dbname);

	
	if(isset($_POST['Submit'])){
	
	

if($con->connect_error){
	die('connect error:'.$con->connect_error);
}

if($type != ''){ 
    $query1 ="insert into payment_details(ref_no,order_id,type,total_price) values ('$ref_no','$order_id','$type','$cost')";
	$con->query($query1);
	echo "yayy";
	$SESSION['users']['cost']=0;
	//$_SESSION['users']['refno']++;
	header('location: rating.html');
}
else{
    echo "<p>Insertion Failed</p>";
    }
	}
$con->close();
?>
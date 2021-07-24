<?php
session_start();
error_reporting(E_ALL^E_NOTICE);
header('location:restaurant1.html');
$f_id=$_POST['f_id'];

$c_id=$_SESSION['users']['username'];
$order_id=$_SESSION['users']['orderid'];


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
    $query ="insert into order_details(order_id,c_id,f_id) values ('$order_id','$c_id','$f_id')";
    $con->query($query);
    echo "succesfully registered";
    header('location:restaurant1.html');
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
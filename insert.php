<?php
$c_id=$_POST['c_id'];
$c_pwd=$_POST['c_pwd'];
$c_name=$_POST['c_name'];
$c_phno=$_POST['c_phno'];
$c_address=$_POST['c_address'];
if(!empty($c_id)||!empty($c_pwd)||!empty($c_name)||!empty($c_phno)||!empty($c_address)){
	$host="localhost";
	$dbUsername="root";
	$dbPassword="";
	$dbname="phpmyadmin";
	$conn=new mysqli($host,$dbUsername,$dbPassword,$dbname);
	if(mysqli_connect_error()){
		die('connect error('.mysqli_connect_error().')'.mysqli_connect_error());
	}
	else{
		$SELECT="SELECT c_phno from order_details where c_phno =? Limit 1";
		$INSERT="INSERT INTO order_details(c_name,c_phno,c_pwd,c_address)values (?,?,?,?)";
		$stmt=$conn->prepare($SELECT);
		$stmt->bind_param("s",c_phno);
		$stmt->execute();
		$stmt->bind_result($c_phno);
		$stmt->store_result();
		$rnum=$stmt->num_rows;
		if($rnum==0){
			$stmt->close();
			$stmt=$conn->prepare($INSERT);
			$stmt->bind_param("ssss",$c_name,$c_phno,$c_pwd,$c_address);
			$stmt->execute();
			echo("new record inserted successfully");
			
		}
		else{
			echo"phone number already registered";
		}
		$stmt->close();
		$conn->close();
	}
}
else{
	echo"All field are required";
	die();
}
?>
















<?php
$c_pwd=$_POST['c_pwd'];
$c_name=$_POST['c_name'];
$c_phno=$_POST['c_phno'];
$c_address=$_POST['c_address'];

	$host="localhost";
	$dbUsername="root";
	$dbPassword="";
	$dbname="phpmyadmin";
	$conn=new mysqli($host,$dbUsername,$dbPassword,$dbname);
	if($conn->connect_error){
		die('connect error:'.$conn->connect_error);
	}
	else{
        echo 'connected';
        $INSERT="INSERT INTO customer_details(c_pwd,c_name,c_phno,c_address)values (?,?,?,?)";
		$stmt=$conn->prepare("INSERT INTO customer_details(c_pwd,c_name,c_phno,c_address)values (?,?,?,?)");
		$stmt->bind_param("ssss",$c_pwd,$c_name,$c_phno,$c_address);
		$stmt->execute();
		echo("new record inserted successfully");
		$stmt->close();
		$conn->close();
	}
?>


$hash=password_hash($c_pwd,PASSWORD_DEFAULT);










login.php

<?php
$c_pwd=$_POST['c_pwd'];
//$hash=password_hash($c_pwd,PASSWORD_DEFAULT);
$c_id=$_POST['c_id'];

$host='localhost';
$user='root';
$password='';
$db_name='phpmyadmin';

$con=new mysqli($host,$dbUsername,$dbPassword,$dbname);
	if($con->connect_error){
		die('connect error:'.$con->connect_error);
    }
    echo'connected';
//to prevent from sql injection
/*$c_id=stripcslashes($c_id);
$c_pwd=stripcslashes($c_pwd);
$c_id=mysqli_real_escape_string($con,$c_id);
$c_pwd=mysqli_real_escape_string($con,$c_pwd);

$sql="select customer_login.c_id,
customer_details.c_pwd
from customer_login
inner join customer_details on
customer_login.c_phno=customer_details.c_phno";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$count=mysqli_num_rows($result);

if($count==1){
    include 'orders.html';
    echo 'yay';
}
else{
    echo'Login failed. Invalid username or password';
   // include 'final login.html';
}

*/

?>
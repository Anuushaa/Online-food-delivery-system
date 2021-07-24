<?php
$c_pwd=$_POST['c_pwd'];
$c_id=$_POST['c_id'];
$c_name=$_POST['name'];
$c_phno=$_POST['phno'];
$c_address=$_POST['addr'];

	$host="localhost";
	$dbUsername="root";
	$dbPassword="";
	$dbname="phpmyadmin";
	$conn=new mysqli($host,$dbUsername,$dbPassword,$dbname);
	if(isset($_POST['submit'])){
	if($conn->connect_error){
		die('connect error:'.$conn->connect_error);
	}
	$s1="select * from customer_details where c_id='$c_id'";
	$result1=mysqli_query($conn,$s1);
	$number1=mysqli_num_rows($result1);
	if($number1==1)
	{
		echo'<script> alert("Username already taken. Choose someother username")</script>';
		include "final login.html";
		return false;
  
	}
	$s2="select * from customer_details where c_phno='$c_phno'";
	$result2=mysqli_query($conn,$s2);
	$number2=mysqli_num_rows($result2);
	if($number2==1)
	{
		echo'<script> alert("Phone number already registered.")</script>';
		
		include "final login.html";
		die();
	}
	if($c_pwd !="" && $c_name!="" && $c_id!="" && $c_address !="")
	{
        $reg="INSERT INTO customer_details(c_id,c_pwd,c_name,c_phno,c_address)values ('$c_id','$c_pwd','$c_name','$c_phno','$c_address')";
		$conn->query($reg);
		if(mysqli_errno($conn)){
			$error = mysqli_error($conn);
			echo"<script> alert('$error')</script>";
			
		}
		
		include 'final login.html';
	}
	else{
		echo "<p>Insertion Failed <br/> Some Fields are Blank....!!</p>";
		}
}
		$conn->close();
	
?>
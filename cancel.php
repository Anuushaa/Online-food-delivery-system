<?php
session_start();
error_reporting(E_ALL^E_NOTICE);
$host="localhost";
$dbUsername="root";
$dbPassword="";
$dbname="phpmyadmin";
$con=new mysqli($host,$dbUsername,$dbPassword,$dbname);

$o_id=$_SESSION['users']['orderid'];
                    try {
                            
                                // execute the stored procedure
                            $sql = "CALL `CANCELLATION`($o_id);";
                            $retval = mysqli_query($con,$sql);
                            //$_SESSION['users']['cost']=0;
                            echo'<script> alert("Order cancelled!!")</script><p>&#128533</p>';
                           header('location:login.html');
                              //echo "cancelled";
                        }
                    catch (conException $e) {
                    
                        die("Error occurred:" . $e->getMessage());
                    }
                   
  $con->close();

?>

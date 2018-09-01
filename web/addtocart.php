<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
// Start the session
session_start();
include 'config.php';
$track_id=$_POST['track_id'];
$cid=$_SESSION['customer_id'];
$price=$_POST['amount'];
$sql="select amount from cart where customer_id=$cid and track_id=$track_id";
//echo $track_id." ".$cid." ".$price;
$res=$mysqli->query($sql);
if($res->num_rows==0){
	$sql="insert into cart(customer_id,track_id,amount) values (?,?,?)";
	$stmt=$mysqli->prepare($sql);
	$stmt->bind_param("iii",$cid,$track_id,$price);
	$stmt->execute();
	header("location: cart.php");
}
?>	

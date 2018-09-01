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
$type=$_GET['type'];
$track_id=$_GET['track_id'];
$cid=$_SESSION['customer_id'];
$sql="select amount from cart where customer_id=$cid and track_id=$track_id";
$res=$mysqli->query($sql);
$res=$res->fetch_assoc();
$q=$res['amount'];
if($type==1){
	if($q==1){
		header("location: delete.php?track_id=$track_id&cid=$cid");		
	}
	else{
		$q-=1;
		$sql="update cart set amount=$q where customer_id=$cid and track_id=$track_id";
		$mysqli->query($sql);
		header("location: cart.php");
	}
}
else{
	$q+=1;
	$sql="update cart set amount=$q where customer_id=$cid and track_id=$track_id";
	$mysqli->query($sql);
	header("location: cart.php");	
}
?>	

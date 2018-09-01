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
$track_id=$_GET['track_id'];
$cid=$_SESSION['customer_id'];
echo $track_id;
$sql="delete from cart where customer_id=$cid and track_id=$track_id";
if($track_id==-1){
	$sql="delete from cart where customer_id=$cid";
}
$mysqli->query($sql);
header("location: cart.php");
?>	

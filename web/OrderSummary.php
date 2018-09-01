<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
// Start the session
session_start();
$GLOBALS['currpage']='Order Summary';
include 'config.php';
if(!isset($_SESSION['loggedin'])){
	header("location: index.php");
} 
?>
<!DOCTYPE.php>
<html>
<!-- head -->
<?php include 'head.php'; ?>
<!-- //head -->	
<body>
<!-- header -->
<?php include 'header.php'; ?> 
<!-- //header -->
<!-- products-breadcrumb -->
	<div class="products-breadcrumb">
		<div class="container">
			<ul>
				<li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Home</a><span>|</span></li>
				<li>Order Summary</li>
			</ul>
		</div>
	</div>
<!-- //products-breadcrumb -->
<!-- banner -->
	<div align="center">
		<h1>Order Summary</h1>
		
		<table border="2", width="30%">
			<thead>
				<tr>
					<th> Track </th>
					<th> Original Price </th>
					<th> Discount </th>
					<th> Subtotal </th>
				</tr>
			</thead>
		<tbody>
		<?php
			$total=0;
			$cid = $_SESSION['customer_id'];
			$sql="Select * from cart where customer_id=$cid";
			$res=$mysqli->query($sql);
			if($res->num_rows==0){
				echo '<tr><td colspan="10">Cart is empty!</td></tr>';
			} else {
				while($row = $res->fetch_assoc()){
					$track_id=$row['track_id'];
					$amount=$row['amount'];
					$q1="select * from track where track_id=$track_id";
					$tr=$mysqli->query($q1);
					$arr=$tr->fetch_assoc();
					$amount=$row['amount'];
					$discount=(($mysqli->query("select count_discount($amount)"))->fetch_array())[0];
					$newprice=$amount-$discount;			
					$tp=$newprice;
					$total+=$tp;
					$name=$arr['name'];
					echo "<br>";
					echo "<tr><td>{$name}</td> <td>Rs {$amount}</td><td>Rs {$discount}</td> 
							<td> {$newprice} </td></tr>
					";
				}
			}
		
		?>
		</tbody>
		</table>

		<?php
		echo "Grand Total : Rs. " .$total ; 
		echo "</br>";
		$tp = $_SESSION["customer_id"] ;
		?>
		<form name='form' method='post' action="placeorder.php">
		<input type="submit" name="submit" value="Place Order">
		</form><div>
<!-- Bootstrap Core JavaScript -->
<?php include 'corejscript.php'; ?>
 <!-- //Bootstrap Core JavaScript -->
 <!-- Mini Cart -->
<?php include 'minicart.php'; ?>
 <!-- //Mini Cart -->

</body>
</html>
<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
// Start the session
session_start();
$GLOBALS['currpage']='Layout';
include 'config.php';
?>
<!DOCTYPE.php>
<html>

<style>
table{
	width: 70%;
	border-collapse: collapse;
	margin: 0 auto;
} 
table 
	td {
		
		padding: 15px;
		border-bottom: 1px solid #ddd;
	}
table 
	th {
		
		height: 50px;
		padding: 15px;
		border-bottom: 1px solid #ddd;	
	}
tr:hover{background-color:#f5f5f5;}
tr:nth-child(even) {background-color: #f2f2f2}
input{
	resize: horizontal;
	width: 200px;
}
input:active{
	width: auto;
}
input:focus{
	min-width: 200px;
}
</style>
<!-- head -->
<?php include 'head.php'; ?>
<!-- //head -->	
<body>
<!-- header -->
<?php include 'header.php'; ?> 
<!-- //header -->
	<div align="center">
		<h1>Purchase History for customer :</h1>
		<h2><?php echo $_SESSION["username"]; ?></h2><br>
		
		<table border="2", width="60%">
			<thead>
				<tr>
					<th> Track </th>
					<th> Price </th>
					<th> Date of Purchase </th>
				</tr>
			</thead>
		<tbody>
		<?php
			$cid = $_SESSION['customer_id'];
			$sql="Select * from places where customer_id=$cid";
			$res=$mysqli->query($sql);	
			if($res->num_rows==0){
				echo '<tr><td colspan="10">No previous purchases!</td></tr>';
			} else {
					while($row = $res->fetch_assoc()){
						$track_id = $row['track_id'];
						$order_id=$row['order_id'];
						$query="select name from track where track_id=$track_id";
						$name=(($mysqli->query($query))->fetch_array())[0];
						$t1=(($mysqli->query("select paid_price,date from orders where order_id=$order_id and track_id=$track_id"))->fetch_array());
						$price=$t1[0];
						$date=$t1[1];
						echo "<tr><td>{$name}</td>   <td>{$price}</td>
								<td>{$date}</td></tr>
						";
					}
			}
		?>	
		</tbody>
		</table><br>
		<a href="index.php"><button>Continue Shopping</button></div></a><br>
<!-- Bootstrap Core JavaScript -->
<?php include 'corejscript.php'; ?>
 <!-- //Bootstrap Core JavaScript -->
 <!-- Mini Cart -->
<?php include 'minicart.php'; ?>
 <!-- //Mini Cart -->

</body>
</html>
<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
// Start the session
session_start();
$GLOBALS['currpage']='Artist Description';
include 'config.php';
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
				<li>Artist Description</li>
			</ul>
		</div>
	</div>
<!-- //products-breadcrumb -->
<!-- banner -->
<?php include 'leftsticky.php'; ?>
<!-- content -->
	<div align="center">
		<h1>Artist Details</h1>
			<?php
				$artist_id=$_GET['artist_id'];
				$query = "select * from artist where artist_id=$artist_id";
				$res=$mysqli->query($query);
				while($arr=$res->fetch_assoc()){ 
				//echo $arr['name'];
				$cnt=$arr['artist_id'] % 250;
				$cnt+=1;
				echo'<div class="col-md-3 top_brand_left">
					<div class="hover14 column">
						<div class="agile_top_brand_left_grid">
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block">
										<div class="snipcart-thumb">
											<a href="artistdesc.php?artist_id='.$arr['artist_id'].'">
												<img height="200px" width="200px" src="artist_images/'.$cnt.'.jpg"/>
											</a>
											<h4>'.$arr['first_name'].' '.$arr['last_name'].'</h4>

										</div>
										<div class="snipcart-details">
											<form action="addtocart.php" method="post">
												<fieldset>
													<input type="hidden" name="cmd" value="_cart" />
													<input type="hidden" name="add" value="1" />
													<input type="hidden" name="artist_id" value='.$arr['artist_id'].' />
												</fieldset>
											</form>
										</div>
									</div>
								</figure>
							</div>
						</div>
						</div>
						</div>';
						
				} ?>	
				<br>	
		<table border="2", width="30%">
			<thead>
				<tr>
					<th> Name </th>
					<th> Gender </th>
					<th> Age </th>
					<th> Hometown </th>
				</tr>
			</thead>
		<tbody>
		<?php
			$total=0;
			$cid = $_SESSION['customer_id'];
			$artist_id=$_GET['artist_id'];
			$arr=($mysqli->query("select * from artist where artist_id=$artist_id"))->fetch_assoc();
			$name=$arr['first_name']." ".$arr['last_name'];
			$hometown=$arr['home_city'];
					echo "<br>";
					echo "<tr><td>{$name}</td> <td>{$arr['gender']}</td>
							<td> {$arr['age']} </td><td>{$hometown}</td></tr>
					";
		
		?>
		</tbody>
		</table>
		<table border="2", width="30%">
			<thead>
				<tr>
					<th> S.no </th>
					<th> Track</th>
				</tr>
			</thead>
		<tbody>
		<?php
			$cnt=1;
			$cid = $_SESSION['customer_id'];
			$artist_id=$_GET['artist_id'];
			$res=$mysqli->query("select * from makes where artist_id=$artist_id");
			while($arr=$res->fetch_assoc()){
				$track_id=$arr['track_id'];
				$t1=($mysqli->query("select * from track where track_id=$track_id"))->fetch_assoc();
					echo "<br>";
					echo "<tr><td>{$cnt}</td> <td><a href='trackdesc.php?track_id=$track_id'>{$t1['name']}</a></td></tr>
					";
					$cnt+=1;
			}
		
		?>
		</tbody>
		</table>		
	</div>
<!-- //content -->
<?php include 'bannerend.php'; ?>
<!-- //banner -->
<!-- footer -->
 <?php include 'footer.php'; ?>
<!-- //footer -->
<!-- Bootstrap Core JavaScript -->
<?php include 'corejscript.php'; ?>
 <!-- //Bootstrap Core JavaScript -->
 <!-- Mini Cart -->
<?php include 'minicart.php'; ?>
 <!-- //Mini Cart -->

</body>
</html>
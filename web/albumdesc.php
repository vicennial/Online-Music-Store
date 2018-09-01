<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
// Start the session
session_start();
$GLOBALS['currpage']='Album Description';
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
				<li>Album Description</li>
			</ul>
		</div>
	</div>
<!-- //products-breadcrumb -->
<!-- banner -->
<?php include 'leftsticky.php'; ?>
<!-- content -->
	<div align="center">
		<h1>Album Details</h1>
			<?php
				$album_id=$_GET['album_id'];
				$query = "select * from album where album_id=$album_id";
				$res=$mysqli->query($query);
				while($arr=$res->fetch_assoc()){ 
				//echo $arr['name'];
				$cnt=$arr['album_id']%60;
				$cnt+=1;
				echo'<div class="col-md-3 top_brand_left">
					<div class="hover14 column">
						<div class="agile_top_brand_left_grid">
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block">
										<div class="snipcart-thumb">
											<a href="albumdesc.php?album_id='.$arr['album_id'].'">
												<img height="200px" width="200px" src="album_images/'.$cnt.'.jpg"/>
											</a>
											<h4>'.$arr['name'].'</h4>
										</div>
										<div class="snipcart-details">
											<form action="addtocart.php" method="post">
												<fieldset>
													<input type="hidden" name="cmd" value="_cart" />
													<input type="hidden" name="add" value="1" />
													<input type="hidden" name="album_id" value='.$arr['album_id'].' />
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
					<th> Number of Songs </th>
					<th> Release Date </th>
				</tr>
			</thead>
		<tbody>
		<?php
			$total=0;
			$album_id=$_GET['album_id'];
			$arr=($mysqli->query("select * from album where album_id=$album_id"))->fetch_assoc();
			$name=$arr['name'];
					echo "<br>";
					echo "<tr><td>{$name}</td> <td>{$arr['number_of_songs']}</td>
							<td> {$arr['release_date']} </td></tr>
					";
		
		?>
		</tbody>
		</table>
		<table border="2", width="50%">
			<thead>
				<tr>
					<th> S.no </th>
					<th> Track</th>
				</tr>
			</thead>
		<tbody>
		<?php
			$cnt=1;
			$album_id=$_GET['album_id'];
			$res=$mysqli->query("select * from compose where album_id=$album_id");
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
<!-- 		<table border="2", width="30%">
			<thead>
				<tr>
					<th> S.no </th>
					<th> Track</th>
				</tr>
			</thead>
		<tbody>
		<?php
			echo "<tr><td>a</td><td>b</td></tr>";
			$cnt=1;
			$cid = $_SESSION['customer_id'];
			$album_id=$_GET['album_id'];
			$res=$mysqli->query("select * from compose where album_id=$album_id");
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
		</table>	 -->	
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
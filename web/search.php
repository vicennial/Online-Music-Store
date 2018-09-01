<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
// Start the session
session_start();
$GLOBALS['currpage']='Search Results';
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
				<li>Search Results</li>
			</ul>
		</div>
	</div>
<!-- //products-breadcrumb -->
<!-- banner -->
<?php include 'leftsticky.php'; ?>
<!-- content -->
			<?php
				if(isset($_POST['searchstr']))
				$search = $_POST['searchstr'];
				else if(isset($_GET['searchstr']))
				$search=$_GET['searchstr'];
				else
				$search="";
				if($search!='')
				echo "<h2>Showing results for '". $search . "'</h2>";
				else
				echo "<h2>Showing all tracks!</h2>";

				$query = "select * from track where name like '%$search%' limit 1000";
				$res=$mysqli->query($query);
				$t='name';
				$cnt=0;
				while($arr=$res->fetch_assoc()){ 
				$cnt=$arr['track_id']%125;
				$cnt+=1;
				$price=$arr['price'];
				$discount=(($mysqli->query("select count_discount($price)"))->fetch_array())[0];
				$newprice=$price-$discount;
				//echo $arr['name'];
				echo'<div class="col-md-3 top_brand_left">
					<div class="hover14 column">
						<div class="agile_top_brand_left_grid">
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block">
										<div class="snipcart-thumb">
											<a href="trackdesc.php?track_id='.$arr['track_id'].'">
												<img height="200px" width="200px" src="track_images/'.$cnt.'.jpg"/>
											</a>
											<p style="width: 190px">'.$arr['name'].'</p>
											<h4>Rs'.$newprice.'<span>'.$price.'</span></h4>
										</div>
										<div class="snipcart-details">
											<form action="addtocart.php" method="post">
												<fieldset>
													<input type="hidden" name="cmd" value="_cart" />
													<input type="hidden" name="add" value="1" />
													<input type="hidden" name="track_id" value='.$arr['track_id'].' />
													<input type="hidden" name="amount" value='.$arr['price'].' />
													<input type="hidden" name="discount_amount" value="1.00" />
													<input type="hidden" name="currency_code" value="USD" />
													<input type="hidden" name="return" value=" " />
													<input type="hidden" name="cancel_return" value=" " />
													<input type="submit" name="submit" value="Add to cart" class="button" />
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
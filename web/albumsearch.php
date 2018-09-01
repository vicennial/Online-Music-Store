<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
// Start the session
session_start();
$GLOBALS['currpage']='Album Search Results';
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
				<li>Album Search Results</li>
			</ul>
		</div>
	</div>
<!-- //products-breadcrumb -->
<!-- banner -->
<?php include 'leftsticky.php'; ?>
<!-- content -->
		<div class="w3l_search">
			<form action="albumsearch.php" method="post">
				<input type="text" name="searchstr" value="Search for a album..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search for a album...';}" required="">
				<input type="submit" value=" ">
			</form>
		</div>
		<br> <br>
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
				echo "<h2>Showing all albums!</h2>";

				$query = "select * from album where name like '%$search%'";
				$res=$mysqli->query($query);
				$cnt=0;
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
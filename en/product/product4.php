<?php include $_SERVER["DOCUMENT_ROOT"] . "/en/_inc/head.php"; ?>
<?php include $_SERVER["DOCUMENT_ROOT"] . "/pro_inc/include_default.php"; ?>
<div id="wrap">
	<?php include $_SERVER["DOCUMENT_ROOT"] . "/en/_inc/header.php"; ?>
	<main>
		<div class="menu-title menu2">
			<div class="menu-title__inner">
				<div class="title">
					<h1 class="tit">Products</h1>
					<span class="sub">Global No.1 Paint EUCNC</span>
				</div>
				<div class="sub-menu">
					<ul class="submenu_list">
						<li><a href="./product1.php">Eco-friendly energy<br>saving heat paint</a></li>
						<li><a href="./product2.php">Eco-friendly flame<br>retardancy paint</a></li>
						<li><a href="./product3.php">Non-flammable paint</a></li>
						<li class="active"><a href="./product4.php">Railway<br>heat-proof paint</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="product4__inner">
				<h2 class="product_tit">Railway heat-proof paint</h2>
				<div class="product4__content">
					<section>
						<ul class="common-product_list">
							<li>10℃ reduction in internal track temperature</li>
							<li>Summer heat blocking and excellent heat dissipation effect</li>
							<li>POC in progress with Daejeon Transportation Corporation</li>
						</ul>
						<div class="mobile_area mobile_show">
							<div class="img_box">
								<div class="box">
									<img src="/_img/product/product4_03.png" alt="">
								</div>
							</div>
							<h4 class="md-tit">Large difference in operation speed in units of 5°C</h4>
							<ul class="track_list">
								<li><span>Track Temp 64°C over</span><b>Shut down</b></li>
								<li><span>Track Temp 60°C~63°C</span>Under 70km</li>
								<li><span>Track Temp 55°C~59°C </span>Under 230km</li>
							</ul>
						</div>
						<div class="img_box">
							<div class="box">
								<span>Rail Buckling</span>
								<img src="/_img/product/product4_01.png" alt="">
							</div>
							<div class="box">
								<span>Heat Dissipation Work</span>
								<img src="/_img/product/product4_02.png" alt="">
							</div>
						</div>
					</section>
					<section>
						<h4 class="md-tit">Large difference in operation speed in units of 5°C</h4>
						<ul class="track_list">
							<li><span>Track Temp 64°C over</span><b>Shut down</b></li>
							<li><span>Track Temp 60°C~63°C</span>Under 70km</li>
							<li><span>Track Temp 55°C~59°C </span>Under 230km</li>
						</ul>
						<div class="img_box">
							<div class="box">
								<img src="/_img/product/product4_03.png" alt="">
							</div>
						</div>
					</section>
				</div>
				<div class="product-img__list">
					<?
					$query = " SELECT * FROM item_promt_info WHERE `type` = '4' ORDER BY `priority` ASC ";
					$result = mysqli_query($gconnet, $query);
					for($i = 0, $iMax = $result->num_rows; $i < $iMax; $i ++){
						$row = $result->fetch_assoc();
						?>
						<img src="<?=$_P_DIR_WEB_FILE . "item_promt/{$row['eng_img_chg']}"?>" alt="">
					<? } ?>
					<!-- <img src="/_img/reference/reward-dtl1.png" alt="">
					<img src="/_img/reference/reward-dtl1.png" alt="">
					<img src="/_img/reference/reward-dtl1.png" alt=""> -->
				</div>
			</div>
		</div>
	</main>
	<?php include $_SERVER["DOCUMENT_ROOT"] . "/en/_inc/footer.php"; ?>
</div>
</body>
</html>
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
						<li class="active"><a href="./product3.php">Non-flammable paint</a></li>
						<li><a href="./product4.php">Railway<br>heat-proof paint</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="product3__inner">
				<h2 class="product_tit">Non-flammable paint</h2>
				<div class="product3__content">
					<section>
						<ul class="common-product_list">
							<li>Heat resistant up to 1800℃</li>
							<li>A special market with high added value that is difficult for major companies to entry</li>
							<li>Russian nanotechnology material center technology introduction in progress</li>
						</ul>
						<div class="mobile_area mobile_show">
							<h4 class="md-tit">Heat resistance</h4>
							<div class="img_box">
								<div class="box">
									<img src="/_img/product/product3_03_en.png" alt="">
								</div>
							</div>
						</div>
						<div class="img_box">
							<div class="box">
								<span>Electric Transmission System</span>
								<img src="/_img/product/product3_01.png" alt="">
							</div>
							<div class="box">
								<span>Chemical Tank</span>
								<img src="/_img/product/product3_02.png" alt="">
							</div>
						</div>
					</section>
					<section>
						<h4 class="md-tit">Heat resistance</h4>
						<div class="img_box">
							<div class="box">
								<img src="/_img/product/product3_03_en.png" alt="">
							</div>
						</div>
					</section>
				</div>
				<div class="product-img__list">
					<?
					$query = " SELECT * FROM item_promt_info WHERE `type` = '3' ORDER BY `priority` ASC ";
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
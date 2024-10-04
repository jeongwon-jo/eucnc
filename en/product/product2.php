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
						<li class="active"><a href="./product2.php">Eco-friendly flame<br>retardancy paint</a></li>
						<li><a href="./product3.php">Non-flammable paint</a></li>
						<li><a href="./product4.php">Railway<br>heat-proof paint</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="product2__inner">
				<h2 class="product_tit">Eco-friendly flame retardancy paint</h2>
				<div class="product2__content">
					<section>
						<ul class="common-product_list">
							<li>The largest drawing area in Korea of ​​7.5 m2/L<br>(secured type approval from the Korea Fire Industry and Technology Institute)
							</li>
							<li>Possible to produce secondary processed products<br>(plywood squared beam flame retardant coating)
							</li>
							<li>Applicable to 62 exhibition and cultural facilities in Korea, including KINTEX, COEX, and BEXCO</li>
						</ul>
						<div class="mobile_area mobile_show">
							<h4 class="md-tit">Coating area</h4>
							<p>[2020.Aug, KFI, TYPE APPROVAL]</p>
							<div class="img_box">
								<div class="box">
									<img src="/_img/product/product2_03_en.png" alt="">
								</div>
							</div>
						</div>
						<div class="img_box">
							<div class="box">
								<span>Test</span>
								<img src="/_img/product/product2_01.png" alt="">
							</div>
							<div class="box">
								<span>Painting</span>
								<img src="/_img/product/product2_02.png" alt="">
							</div>
						</div>
					</section>
					<section>
						<h4 class="md-tit">Coating area</h4>
						<p>[2020.Aug, KFI, TYPE APPROVAL]</p>
						<div class="img_box">
							<div class="box">
								<img src="/_img/product/product2_03_en.png" alt="">
							</div>
						</div>
					</section>
				</div>
				<div class="product-img__list">
					<?
					$query = " SELECT * FROM item_promt_info WHERE `type` = '2' ORDER BY `priority` ASC ";
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
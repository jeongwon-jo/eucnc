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
						<li class="active"><a href="./product1.php">Eco-friendly energy<br>saving heat paint</a></li>
						<li><a href="./product2.php">Eco-friendly flame<br>retardancy paint</a></li>
						<li><a href="./product3.php">Non-flammable paint</a></li>
						<li><a href="./product4.php">Railway<br>heat-proof paint</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="product1__inner">
				<div class="product1__top">
					<section>
						<h2 class="product_tit">Eco-friendly energy<br>saving heat paint</h2>
						<ul class="common-product_list">
							<li>8~13℃ reduction in room temperature when EUCNC paint is applied</li>
							<li>It can be applied with only 1-2 top coats without the need for a primer</li>
							<li>If you adjust the heating and cooling 1℃, the energy saving rate is about 7%</li>
							<li>Reducing electric energy consumption by applying it to general buildings<br>or factory buildings (annual average of 25-30%)
							</li>
						</ul>
					</section>
					<section>
						<div class="thum">
							<img src="/_img/product/product1_05_en.png" alt="">
						</div>
					</section>
				</div>
				<div class="product1__bottom">
					<div class="box">
						<span>Before</span>
						<div class="img_list">
							<div class="thum">
								<img src="/_img/product/product1_01.png" alt="">
							</div>
							<div class="thum">
								<img src="/_img/product/product1_02.png" alt="">
							</div>
						</div>
						<small>High surface temperature by sunlight before apply paint temperature rises rapidly</small>
					</div>
					<div class="box">
						<span>After</span>
						<div class="img_list">
							<div class="thum">
								<img src="/_img/product/product1_03.png" alt="">
							</div>
							<div class="thum">
								<img src="/_img/product/product1_04.png" alt="">
							</div>
						</div>
						<small>Low surface temperature due to Heat shieding effect after apply paint<br>
							(less than 8~13℃ other paints) energy saving 30~50%</small>
					</div>
				</div>
				<div class="product-img__list">
					<?
					$query = " SELECT * FROM item_promt_info WHERE `type` = '1' ORDER BY `priority` ASC ";
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
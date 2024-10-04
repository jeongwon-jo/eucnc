<?php include $_SERVER["DOCUMENT_ROOT"] . "/kr/_inc/head.php"; ?>
<?php include $_SERVER["DOCUMENT_ROOT"] . "/pro_inc/include_default.php"; ?>
<div id="wrap">
	<?php include $_SERVER["DOCUMENT_ROOT"] . "/kr/_inc/header.php"; ?>
	<main>
		<div class="menu-title menu2">
			<div class="menu-title__inner">
				<div class="title">
					<h1 class="tit">제품소개</h1>
					<span class="sub">Global No.1 Paint EUCNC</span>
				</div>
				<ul class="breadcrumb">
					<li class="home"></li>
					<li>제품소개</li>
					<li>친환경 방염도료</li>
				</ul>
				<div class="sub-menu">
					<ul class="submenu_list">
						<li><a href="./product1.php">친환경 에너지절감<br>단차열도료</a></li>
						<li class="active"><a href="./product2.php">친환경 방염도료</a></li>
						<li><a href="./product3.php">불연도료</a></li>
						<li><a href="./product4.php">철도 방열도료</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="product2__inner">
				<h2 class="product_tit">친환경 방염도료</h2>
				<div class="product2__content">
					<section>
						<ul class="common-product_list">
							<li>7.5 m2/L의 국내 최고의 도표 면적(한국소방산업기술원의 형식승인 확보)</li>
							<li>2차 가공제품(합판 각재 선방염 코팅) 생산 가능</li>
							<li>킨텍스, 코엑스, 벡스코 등 국내 62개 전시문화시설에 적용가능</li>
						</ul>
						<div class="mobile_area mobile_show">
							<h4 class="md-tit">도포면적</h4>
							<p>[2020.08.한국소방산업기술원 형식승인]</p>
							<div class="img_box">
								<div class="box">
									<img src="/_img/product/product2_03.png" alt="">
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
						<h4 class="md-tit">도포면적</h4>
						<p>[2020.08.한국소방산업기술원 형식승인]</p>
						<div class="img_box">
							<div class="box">
								<img src="/_img/product/product2_03.png" alt="">
							</div>
						</div>
					</section>
					<div class="product-img__list">
						<?
						$query = " SELECT * FROM item_promt_info WHERE `type` = '2' ORDER BY `priority` ASC ";
						$result = mysqli_query($gconnet, $query);
						for($i = 0, $iMax = $result->num_rows; $i < $iMax; $i ++){
							$row = $result->fetch_assoc();
							?>
							<img src="<?=$_P_DIR_WEB_FILE . "item_promt/{$row['kor_img_chg']}"?>" alt="">
						<? } ?>
						<!-- <img src="/_img/reference/reward-dtl1.png" alt="">
						<img src="/_img/reference/reward-dtl1.png" alt="">
						<img src="/_img/reference/reward-dtl1.png" alt=""> -->
					</div>
				</div>
			</div>
		</div>
	</main>
	<?php include $_SERVER["DOCUMENT_ROOT"] . "/kr/_inc/footer.php"; ?>
</div>
</body>
</html>
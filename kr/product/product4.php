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
					<li>철도 방열도료</li>
				</ul>
				<div class="sub-menu">
					<ul class="submenu_list">
						<li><a href="./product1.php">친환경 에너지절감<br>단차열도료</a></li>
						<li><a href="./product2.php">친환경 방염도료</a></li>
						<li><a href="./product3.php">불연도료</a></li>
						<li class="active"><a href="./product4.php">철도 방열도료</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="product4__inner">
				<h2 class="product_tit">철도 방열도료</h2>
				<div class="product4__content">
					<section>
						<ul class="common-product_list">
							<li>10℃ 의 선로 내부 온도 저감효과</li>
							<li>여름철 열차단 및 탁월한 방열효과</li>
							<li>대전교통공사와 POC 진행중</li>
						</ul>
						<div class="mobile_area mobile_show">
							<div class="img_box">
								<div class="box">
									<img src="/_img/product/product4_03.png" alt="">
								</div>
							</div>
							<h4 class="md-tit">5도 단위로 운행 속도에 큰 차이 발생</h4>
							<ul class="track_list">
								<li><span>선로 온도 64°C 이상</span><b>운행 정지</b></li>
								<li><span>선로 온도 60°C ~ 63°C</span>70km 이하 운행</li>
								<li><span>선로 온도 55°C ~ 59°C </span>230km 이하 운행</li>
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
						<h4 class="md-tit">5도 단위로 운행 속도에 큰 차이 발생</h4>
						<ul class="track_list">
							<li><span>선로 온도 64°C 이상</span><b>운행 정지</b></li>
							<li><span>선로 온도 60°C ~ 63°C</span>70km 이하 운행</li>
							<li><span>선로 온도 55°C ~ 59°C </span>230km 이하 운행</li>
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
						<img src="<?=$_P_DIR_WEB_FILE . "item_promt/{$row['kor_img_chg']}"?>" alt="">
					<? } ?>
					<!-- <img src="/_img/reference/reward-dtl1.png" alt="">
					<img src="/_img/reference/reward-dtl1.png" alt="">
					<img src="/_img/reference/reward-dtl1.png" alt=""> -->
				</div>
			</div>
		</div>
	</main>
	<?php include $_SERVER["DOCUMENT_ROOT"] . "/kr/_inc/footer.php"; ?>
</div>
</body>
</html>
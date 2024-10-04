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
					<li>불연도료</li>
				</ul>
				<div class="sub-menu">
					<ul class="submenu_list">
						<li><a href="./product1.php">친환경 에너지절감<br>단차열도료</a></li>
						<li><a href="./product2.php">친환경 방염도료</a></li>
						<li class="active"><a href="./product3.php">불연도료</a></li>
						<li><a href="./product4.php">철도 방열도료</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="product3__inner">
				<h2 class="product_tit">불연도료</h2>
				<div class="product3__content">
					<section>
						<ul class="common-product_list">
							<li>1800℃까지 열에 견딤</li>
							<li>대기업이 진입하기 애매한 부가가치 높은 특수 시장</li>
							<li>러시아 나노기술소재센터 기술 도입 진행중</li>
						</ul>
						<div class="mobile_area mobile_show">
							<h4 class="md-tit">내열성능</h4>
							<div class="img_box">
								<div class="box">
									<img src="/_img/product/product3_03.png" alt="">
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
						<h4 class="md-tit">내열성능</h4>
						<div class="img_box">
							<div class="box">
								<img src="/_img/product/product3_03.png" alt="">
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
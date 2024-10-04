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
					<li class="long">친환경 에너지절감 단차열도료</li>
				</ul>
				<div class="sub-menu">
					<ul class="submenu_list">
						<li class="active"><a href="./product1.php">친환경 에너지절감<br>단차열도료</a></li>
						<li><a href="./product2.php">친환경 방염도료</a></li>
						<li><a href="./product3.php">불연도료</a></li>
						<li><a href="./product4.php">철도 방열도료</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="product1__inner">
				<div class="product1__top">
					<section>
						<h2 class="product_tit">친환경 에너지절감<br>단차열도료</h2>
						<ul class="common-product_list">
							<li>당사 도료 적용시 8~13℃ 실내온도 감소</li>
							<li>프라이머 필요없이 상도 1~2회만으로 적용가능</li>
							<li>냉난방 1℃ 조정할경우 에너지 절감률은 약 7%</li>
							<li>일반건축물 또는 공장 건축물에 적용하여 전기 에너지 사용량 절감</li>
						</ul>
					</section>
					<section>
						<div class="thum">
							<img src="/_img/product/product1_05.png" alt="">
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
						<small>일사광선에 의한 높은 표면 온도</small>
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
						<small>차열 및 단열 효과로 실내 외 온도 차 8~13℃ 차이 (에너지 절감 30~50%)</small>
					</div>
				</div>
				<div class="product-img__list">
					<?
					$query = " SELECT * FROM item_promt_info WHERE `type` = '1' ORDER BY `priority` ASC ";
					$result = mysqli_query($gconnet, $query);
					for($i = 0, $iMax = $result->num_rows; $i < $iMax; $i ++){
						$row = $result->fetch_assoc();
						?>
						<img src="<?=$_P_DIR_WEB_FILE . "item_promt/{$row['kor_img_chg']}"?>" alt="">
					<? } ?>
					<!-- <img src=$_P_DIR_FILE . "download/{$file_row['file_chg']}" alt="">
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
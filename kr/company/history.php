<?php

include $_SERVER["DOCUMENT_ROOT"] . "/pro_inc/include_default.php"; // 공통함수 인클루드
include $_SERVER["DOCUMENT_ROOT"] . "/kr/_inc/head.php";

?>
<div id="wrap">
	<?php include $_SERVER["DOCUMENT_ROOT"] . "/kr/_inc/header.php"; ?>
	<main>
		<div class="menu-title menu1">
			<div class="menu-title__inner">
				<div class="title">
					<h1 class="tit">회사소개</h1>
					<span class="sub">Global No.1 Paint EUCNC</span>
				</div>
				<ul class="breadcrumb">
					<li class="home"></li>
					<li>회사소개</li>
					<li>사업연혁</li>
				</ul>
				<div class="sub-menu">
					<ul class="submenu_list">
						<li><a href="./greetings.php">인사말</a></li>
						<li><a href="./organization.php">조직도</a></li>
						<li class="active"><a href="./history.php">사업연혁</a></li>
						<li><a href="./esg.php">ESG 경영</a></li>
						<li><a href="./facility.php">시설소개</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="history__inner">
				<h2 class="cmpny_title">사업연혁</h2>
				<p>
					우수한 기술이 기업 가치를 좌우한다는 생각으로 세계 최고 수준에 기술력을 연구개발을 하고자 멈추지 않는 열정으로<br>
					글로벌 시장을 향해 도전하는 이유씨엔씨의 희망찬 미래를 함께 지켜봐 주시기 바랍니다.
				</p>
				<div class="history_list">
					<?
					$query = " SELECT * FROM company_timeline_list ORDER BY `priority` ASC ";
					$result = mysqli_query($gconnet, $query);
					for($i = 0, $iMax = $result->num_rows; $i < $iMax; $i ++){
//						continue;
						$row = $result->fetch_assoc();

						$tagMapper = ['history_item'];
						if($i % 2 == 1){
							$tagMapper[] = "reverse";
						}

						$sub_query = " SELECT * FROM company_timeline_info WHERE `timeline_idx` = '{$row['idx']}' AND `content_kor` != '' ORDER BY `month` DESC ";
						$sub_result = mysqli_query($gconnet, $sub_query);
						if(!$sub_result->num_rows){
							continue;
						}

						?>
						<div class="<?=implode(' ', $tagMapper)?>">
							<div class="history_item__inner">
								<?php if ($i % 2 != 1) { ?>
									<div class="thum">
										<img src="/upload_file/timeline/<?=$row['file_chg']?>">
									</div>
									<span class="bar"></span>
									<div class="desc">
										<h3><?=$row['year']?></h3>
										<ul class="course">
											<?
											for($j = 0, $jMax = $sub_result->num_rows; $j < $jMax; $j ++){
												$sub_row = $sub_result->fetch_assoc();
											?>
												<li><span><?=fnzero($sub_row['month'])?>월</span><p><?=$sub_row['content_kor']?></p></li>
											<? } ?>
										</ul>
									</div>
								<?php } else { ?>
									<div class="desc">
										<h3><?=$row['year']?></h3>
										<ul class="course">
											<?
											for($j = 0, $jMax = $sub_result->num_rows; $j < $jMax; $j ++){
												$sub_row = $sub_result->fetch_assoc();
											?>
												<li><span><?=fnzero($sub_row['month'])?>월</span><p><?=$sub_row['content_kor']?></p></li>
											<? } ?>
										</ul>
									</div>
									<span class="bar"></span>
									<div class="thum">
										<img src="/upload_file/timeline/<?=$row['file_chg']?>">
									</div>
								<?php } ?>
							</div>
						</div>
					<? } ?>

					<!--
					<div class="history_item current">
						<div class="history_item__inner">
							<div class="thum">
								<img src="/_img/company/history_2023.png" alt="2023연혁">
							</div>
							<span class="bar"></span>
							<div class="desc">
								<h3>2023</h3>
								<ul class="course">
									<li><span>07월</span>
										<p>인도네시아 법인설립</p></li>
									<li><span>06월</span>
										<p>파리 [VIVA TECH 2023] 참가</p></li>
									<li><span>04월</span>
										<p>소재 부품 장비 스타트업 100 선정<br>과학기술정보통신부 장관 표창</p></li>
									<li><span>03월</span>
										<p>Bridge A 투자유치 성공</p></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="history_item reverse">
						<div class="history_item__inner">
							<div class="desc">
								<h3>2022</h3>
								<ul class="course">
									<li><span>11월</span>
										<p>친환경 기술진흥 및 녹색소비 환경부장관 표창</p></li>
									<li><span>09월</span>
										<p>혁신제품 지정 인증<br>녹색기술 인증</p></li>
									<li><span>08월</span>
										<p>스마트건설 창업 아이디어 공모전 최우수상</p></li>
									<li><span>05월</span>
										<p>이노비즈 확인서 확보<br>항만공사 POC 선정</p></li>
									<li><span>03월</span>
										<p>환경표지 인증서 (단차열 수성 상도) 확보</p></li>
									<li><span>01월</span>
										<p>한-러 혁신 플랫폼 구축사업 협약</p></li>
								</ul>
							</div>
							<span class="bar"></span>
							<div class="thum">
								<img src="/_img/company/history_2022.png" alt="2023연혁">
							</div>
						</div>
					</div>
					<div class="history_item">
						<div class="history_item__inner">
							<div class="thum">
								<img src="/_img/company/history_2021.png" alt="2023연혁">
							</div>
							<span class="bar"></span>
							<div class="desc">
								<h3>2021</h3>
								<ul class="course">
									<li><span>12월</span>
										<p>한국서부 발전 POC 선정</p></li>
									<li><span>11월</span>
										<p>기술혁신기업으로 중소벤처기업부 장관표창</p></li>
									<li><span>09월</span>
										<p>환경창업대전 환경창업스타트기업 부문 장려상<br> 러시아 현지 법인 설립 (상트페테르부르크)</p></li>
									<li><span>07월</span>
										<p>PCT 출원 1건, 국내 특허등록 2건</p></li>
									<li><span>06월</span>
										<p>TIPA 해외원천기술상용화 기술개발사업 협약<br>공장이전(화학제품제조 공장등록)</p></li>
									<li><span>05월</span>
										<p>인천 도시공사 성과공유업체 선정</p></li>
									<li><span>01월</span>
										<p>한-러 기술협력 플랫폼 구축사업 협약 <br/> Seed B 투자유치 성공</p></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="history_item reverse">
						<div class="history_item__inner">
							<div class="desc">
								<h3>2020</h3>
								<ul class="course">
									<li><span>11월</span>
										<p>인천광역시장 표창장<br>인천 창업활성화 유공포상(인천시장상)</p></li>
									<li><span>08월</span>
										<p>방염도료 형식승인서(L당 75㎡인증)확보</p></li>
									<li><span>07월</span>
										<p>TIPA 창업성장기술개발사업 협약<br>Seed A 투자 유치 성공</p></li>
									<li><span>02월</span>
										<p>한국생산기술연구원 파트너 기업지정</p></li>
								</ul>
							</div>
							<span class="bar"></span>
							<div class="thum">
								<img src="/_img/company/history_2020.png" alt="2023연혁">
							</div>
						</div>
					</div>
					<div class="history_item">
						<div class="history_item__inner">
							<div class="thum">
								<img src="/_img/company/history_2019.png" alt="2023연혁">
							</div>
							<span class="bar"></span>
							<div class="desc">
								<h3>2019</h3>
								<ul class="course">
									<li><span>10월</span>
										<p>벤처기업 인증</p></li>
									<li><span>09월</span>
										<p>기업부설연구소 인증</p></li>
									<li><span>06월</span>
										<p>초기창업패키지 협약</p></li>
									<li><span>02월</span>
										<p>이유씨엔씨 설립(환경산업연구단지)</p></li>
								</ul>
							</div>
						</div>
					</div>
					-->
				</div>
			</div>
		</div>
	</main>
	<?php include $_SERVER["DOCUMENT_ROOT"] . "/kr/_inc/footer.php"; ?>
</div>
<script>
    $(function () {
        let screenWidth = window.innerWidth;
        let rHeight;
        if (screenWidth < 768) {
            rHeight = 200
        } else {
            rHeight = 700
        }

        $(window).on('scroll', function () {
						if (checkVisible($('.history_item:nth-child(1)'))) {
                $('.history_item:nth-child(1)').addClass('current')
            }
						
            if (checkVisible($('.history_item:nth-child(2)'))) {
                $('.history_item:nth-child(2)').addClass('current')
            }
		
            if (checkVisible($('.history_item:nth-child(3)'))) {
                $('.history_item:nth-child(3)').addClass('current')
            }
		
            if (checkVisible($('.history_item:nth-child(4)'))) {
                $('.history_item:nth-child(4)').addClass('current')
            }
		
            if (checkVisible($('.history_item:nth-child(5)'))) {
                $('.history_item:nth-child(5)').addClass('current')
            }
        });

        function checkVisible(elm, eval) {
            eval = eval || "object visible";
            var viewportHeight = $(window).height(),
                scrolltop = $(window).scrollTop(),
                y = $(elm).offset().top + rHeight,
                elementHeight = $(elm).height();

            if (eval == "object visible") return ((y < (viewportHeight + scrolltop)) && (y > (scrolltop - elementHeight)));
            if (eval == "above") return ((y < (viewportHeight + scrolltop)));
        }
    })
</script>
</body>
</html>
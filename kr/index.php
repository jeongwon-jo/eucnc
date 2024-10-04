<?php include $_SERVER["DOCUMENT_ROOT"]."/pro_inc/include_default.php"; // 공통함수 인클루드 ?>
<?php include $_SERVER["DOCUMENT_ROOT"] . "/kr/_inc/head.php"; ?>
<div id="wrap" class="homepage">
	<?php include $_SERVER["DOCUMENT_ROOT"] . "/kr/_inc/header.php"; ?>
	<div id="fullpage">
		<div class="section section_1">
			<div class="swiper section1_swiper">
				<div class="swiper-wrapper">
					<?
					$query = " SELECT * FROM image_slide_info ORDER BY `idx` ASC ";
					$result = mysqli_query($gconnet, $query);
					for($i = 0, $iMax = $result->num_rows; $i < $iMax; $i ++){
						$row = mysqli_fetch_array($result);
						?>
						<div class="swiper-slide">
							<div class="bg">
								<div class="img">
									<span style="background: url(<?=$_P_DIR_WEB_FILE . "image_slide/" . $row['file_chg']?>) no-repeat center center / cover;"></span>
								</div>
							</div>
							<div class="sec1__title">
								<p><?=$row['kor_txt_1']?></p>
								<h1><?=$row['kor_txt_2_1']?><br><?=$row['kor_txt_2_2']?></h1>
							</div>
						</div>
					<? } ?>
				</div>
				<div class="swiper-button-next"></div>
				<div class="swiper-button-prev"></div>
				<div class="swiper-pagination"></div>
			</div>
			<div class="scroll_down">
				<span class="mouse"></span>
				<p>Scroll Down</p>
			</div>
		</div>
		<div class="section section_2">
			<div class="mainpage_flex">
				<div class="title">
					<h3>EUCNC의 강점</h3>
					<ul>
						<li>친환경 수성 특수페인트</li>
						<li>간편한 시공을 통한 경제성 확보</li>
						<li>에너지 절약 및 탄소 저감 선도</li>
					</ul>
				</div>
				<div class="content">
					<h1>환경과 미래 가치를 선도하는<br>ESG 페인트 기업 이유씨엔씨</h1>
					<div class="sec2_grid">
						<div class="sec2_item">
							<div class="title">
								<h3>친환경</h3>
								<p>에너지 절약 탄소중립</p>
							</div>
							<div class="icon"></div>
						</div>
						<div class="sec2_item"></div>
						<div class="sec2_item">
							<div class="title">
								<h3>기술 접목성</h3>
								<p>불연 / 방열기능 추가 가능</p>
							</div>
						</div>
						<div class="sec2_item"></div>
						<div class="sec2_item">
							<div class="title">
								<h3>비용절감</h3>
								<p>1~2회의 간단한<br> 과정으로 시공 시간 단축</p>
							</div>
							<div class="icon"></div>
						</div>
						<div class="sec2_item"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="section section_3">
			<div class="mainpage_flex">
				<div class="title">
					<h3>EUCNC 제품소개</h3>
					<ul class="product_list">
						<li data-tab="idx_1" class="active">친환경 에너지<br>절감 단차열도료</li>
						<li data-tab="idx_2">친환경 방염도료</li>
						<li data-tab="idx_3">불연도료</li>
						<li data-tab="idx_4">철도방열도료</li>
					</ul>
				</div>
				<div class="content">
					<div class="product__inner">
						<div id="idx_1" class="product_item on">
							<div class="product-item__inner">
								<div class="product_thum">
									<img src="/_img/product_thum01.png" alt="">
									<span>
                      친환경 R&D 기술 기반<br>
                      친환경 담수화 도료 도입
                    </span>
								</div>
								<div class="product_title">
									<a href="./product/product1.php" class="mo-btn-txt_more">더 보러가기</a>
									<div class="title">
										<h3>친환경 에너지절감<br>단차열도료</h3>
										<ul>
											<li>· 당사 도료 적용시 8~13℃ 실내온도 감소</li>
											<li>· 프라이머 필요없이 상도 1~2회만으로 적용가능</li>
											<li>· 냉난방 1ºC 조정할경우 에너지 절감률은 약 7%</li>
											<li>· 일반건축물 또는 공장 건축물에 적용하여 전기 에너지 사용량 절감</li>
										</ul>
									</div>
									<div class="paint">
										<a href="./product/product1.php" class="btn-txt_more">더 보러가기</a>
										<div class="paint_thum">
											<img src="/_img/product_paint01.png" alt="페인트 이미지">
										</div>
									</div>
								</div>
							</div>
						</div>
						<div id="idx_2" class="product_item">
							<div class="product-item__inner">
								<div class="product_thum">
									<img src="/_img/product_thum02.png" alt="">
									<span>
                      친환경 R&D 기술 기반<br>
                      친환경 담수화 도료 도입
                    </span>
								</div>
								<div class="product_title">
									<a href="./product/product2.php" class="mo-btn-txt_more">더 보러가기</a>
									<div class="title">
										<h3 class="product2">친환경 방염도료</h3>
										<ul>
											<li>· 7.5 m2/L의 국내 최고의 도표 면적<br>(한국소방산업기술원의 형식승인 확보)</li>
											<li>· 2차 가공제품(합판 각재 선방염 코팅) 생산 가능</li>
											<li>· 냉난방 1 조정할경우 에너지 절감률은 약 7%</li>
											<li>· 킨텍스, 코엑스, 벡스코 등 국내 62개 전시문화시설에 적용가능</li>
										</ul>
									</div>
									<div class="paint">
										<a href="./product/product2.php" class="btn-txt_more">더 보러가기</a>
										<div class="paint_thum">
											<img src="/_img/product_paint02.png" alt="페인트 이미지">
										</div>
									</div>
								</div>
							</div>
						</div>
						<div id="idx_3" class="product_item">
							<div class="product-item__inner">
								<div class="product_thum">
									<img src="/_img/product_thum03.png" alt="">
									<span>
                      친환경 R&D 기술 기반<br>
                      친환경 담수화 도료 도입
                    </span>
								</div>
								<div class="product_title">
									<a href="./product/product3.php" class="mo-btn-txt_more">더 보러가기</a>
									<div class="title">
										<h3 class="product3">불연도료</h3>
										<ul>
											<li>· 1800℃까지 열에 견딤</li>
											<li>· 대기업이 진입하기 애매한 부가가치 높은 특수 시장</li>
											<li>· 러시아 나노기술소재센터 기술 도입 진행중</li>
										</ul>
									</div>
									<div class="paint">
										<a href="./product/product3.php" class="btn-txt_more">더 보러가기</a>
										<div class="paint_thum">
											<img src="/_img/product_paint03.png" alt="페인트 이미지">
										</div>
									</div>
								</div>
							</div>
						</div>
						<div id="idx_4" class="product_item">
							<div class="product-item__inner">
								<div class="product_thum">
									<img src="/_img/product_thum04.png" alt="">
									<span>
                      친환경 R&D 기술 기반<br>
                      친환경 담수화 도료 도입
                    </span>
								</div>
								<div class="product_title">
									<a href="./product/product4.php" class="mo-btn-txt_more">더 보러가기</a>
									<div class="title">
										<h3 class="product4">철도방열도료</h3>
										<ul>
											<li>· 5~7 ℃의 온도 저감효과</li>
											<li>· 철도레일 국내 1,512km, 글로벌 29,792km에 적용 가능</li>
											<li>· 동양대학교 철도학과와 제안 협업 진행중</li>
										</ul>
									</div>
									<div class="paint">
										<a href="./product/product4.php" class="btn-txt_more">더 보러가기</a>
										<div class="paint_thum">
											<img src="/_img/product_paint04.png" alt="페인트 이미지">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="section section_4">
			<div class="section4__inner">
				<h3 class="tit">특허 및 인증</h3>
				<div class="patent__info">
					<div class="info">
						<h2>환경부 추천 혁신제품으로<br>인정받은 EU-201</h2>
						<p>
							EUCNC의 단차열 통합 페인트 EU-201은 단열 또는 차열 한가지<br>
							기능만 보유한 기존제품과는 달리, 단열, 차열 기능이 하나로 통합된 친환경 특수페인트로<br>
							공인 시험기관의 탄소저감 시험 성적서 획득 및 환경부 추천 혁신제품으로 인정받았습니다.
						</p>
					</div>
					<div class="patent_img">
						<a href="/kr/reference/patent.php" class="btn-txt_more">더 보러가기</a>
						<div class="img_area">
							<?
							$patent_query = " SELECT * FROM patent_info ORDER BY `idx` DESC LIMIT 2 ";
							$patent_result = mysqli_query($gconnet, $patent_query);
							for($i = 0, $iMax = $patent_result->num_rows; $i < $iMax; $i ++){
								$patent_row = $patent_result->fetch_array();
								?>
								<div class="thum">
									<img src="<?=$_P_DIR_WEB_FILE . "patent/" . $patent_row['file_chg']?>" alt="">
								</div>
							<? } ?>
						</div>
					</div>
				</div>
				<div class="logo__content pc_show">
					<a href="/kr/reference/certification.php" class="btn-txt_more">더 보러가기</a>
					<div class="logo_list">
						<div class="logo_item">
							<img src="/_img/logo01.png" alt="로고">
						</div>
						<div class="logo_item">
							<img src="/_img/logo02.png" alt="로고">
						</div>
						<div class="logo_item">
							<img src="/_img/logo03.png" alt="로고">
						</div>
						<div class="logo_item">
							<img src="/_img/logo04.png" alt="로고">
						</div>
						<div class="logo_item">
							<img src="/_img/logo05.png" alt="로고">
						</div>
						<div class="logo_item">
							<img src="/_img/logo06.png" alt="로고">
						</div>
						<div class="logo_item">
							<img src="/_img/logo07.png" alt="로고">
						</div>
						<div class="logo_item">
							<img src="/_img/logo08.png" alt="로고">
						</div>
					</div>
				</div>
				<!-- 모바일용 슬라이더 -->
				<div class="logo__slider mobile_show">
					<div class="swiper-wrapper">
						<div class="swiper-slide">
							<div class="logo_item">
								<img src="/_img/logo01.png" alt="로고">
							</div>
						</div>
						<div class="swiper-slide">
							<div class="logo_item">
								<img src="/_img/logo02.png" alt="로고">
							</div>
						</div>
						<div class="swiper-slide">
							<div class="logo_item">
								<img src="/_img/logo03.png" alt="로고">
							</div>
						</div>
						<div class="swiper-slide">
							<div class="logo_item">
								<img src="/_img/logo04.png" alt="로고">
							</div>
						</div>
						<div class="swiper-slide">
							<div class="logo_item">
								<img src="/_img/logo05.png" alt="로고">
							</div>
						</div>
						<div class="swiper-slide">
							<div class="logo_item">
								<img src="/_img/logo06.png" alt="로고">
							</div>
						</div>
						<div class="swiper-slide">
							<div class="logo_item">
								<img src="/_img/logo07.png" alt="로고">
							</div>
						</div>
						<div class="swiper-slide">
							<div class="logo_item">
								<img src="/_img/logo08.png" alt="로고">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="section section_5">
			<div class="section5__inner">
				<h3 class="tit">EUCNC 소식</h3>
				<p>
					우수한 기술이 기업 가치를 좌우한다는 생각으로 세계 최고 수준에 기술력을 연구개발 하고자 멈추지 않는 열정으로<br>
					글로벌 시장을 향해 도전하는 이유씨엔씨의 희망찬 미래를 함께 지켜봐 주시기 바랍니다.
				</p>
				<div class="section5__content">
					<section class="reward__info">
						<div class="title">
							<span>수상내역</span>
							<a href="/kr/reference/reward.php" class="btn-txt_more">더 보러가기</a>
						</div>
						<div class="contents">
							<div class="card_list2">
								<?
								$fnThum = function(int $i): string{
									if($i % 3 === 0){
										return "/_img/r3.png";
									}
									if($i % 2 === 0){
										return "/_img/r2.png";
									}
									return "/_img/r1.png";
								};

								$award_query = " SELECT * FROM awards_info ORDER BY `priority` ASC LIMIT 3 ";
								$award_result = mysqli_query($gconnet, $award_query);
								for($i = 0, $iMax = $award_result->num_rows; $i < $iMax; $i ++){
									$award_row = $award_result->fetch_assoc();
									?>

									<div class="card_item2" style="cursor: pointer" onclick="location.href = './reference/reward.php'">
										<div class="thum">
											<img src="<?=$_P_DIR_WEB_FILE?>awards/<?=$award_row['file_chg']?>" alt="임시 썸네일">
										</div>
										<div class="desc">
											<h3 class="tit"><?=$award_row['kor']?></h3>
										</div>
									</div>

								<? } ?>
							</div>
						</div>
					</section>
					<section class="news__info">
						<div class="title">
							<span>기사 자료</span>
							<a href="/kr/reference/news.php" class="btn-txt_more">더 보러가기</a>
						</div>
						<div class="contents">
							<div class="news_table">
								<table>
									<caption>기사자료 테이블</caption>
									<colgroup>
										<col style="width: 80%">
										<col style="width: 20%">
									</colgroup>
									<tbody>
									<?
									$news_query = " SELECT * FROM news_info ORDER BY `idx` DESC LIMIT 7 ";
									$news_result = mysqli_query($gconnet, $news_query);
									for($i = 0, $iMax = $news_result->num_rows; $i < $iMax; $i ++){
										$news_row = $news_result->fetch_array();
										?>
										<tr>
											<td>
												<a href="./reference/news_dtl.php?idx=<?=$news_row['idx']?>" class="ellipsis-line-1"><?=$news_row['subject']?></a>
											</td>
											<td><span class="date"><?=date('Y.m.d', strtotime($news_row['wdate']))?></span></td>
										</tr>
									<? } ?>
									</tbody>
								</table>
							</div>
						</div>
					</section>
				</div>
			</div>
		</div>
		<div class="section section_footer fp-auto-height">
			<?php include $_SERVER["DOCUMENT_ROOT"] . "/kr/_inc/footer.php"; ?>
		</div>
	</div>
</div>
<script>
    $(function () {
        tl = TweenMax;

        tl.staggerFromTo($(".section1_swiper .swiper-slide .bg .img span"), 1.8, {scale: 1.1}, {
            scale: 1,
            ease: Power1.easeInOut
        });


        var swiper = new Swiper(".section1_swiper", {
            slidesPerView: 1,
            effect: 'fade',
						speed:500,
            loop: true,
            fadeEffect: {
							crossFade: true,
						},
            autoplay: {
                delay: 3800,
                disableOnInteraction: false,
            },
            mousewheel: false,
            watchSlidesVisibility: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            on: {
                transitionStart: function () {
                    tl.staggerFromTo($(".section1_swiper .swiper-slide-active .sec1__title p"), 0.8, {
                        opacity: 0,
                        x: '-50px'
                    }, {opacity: 1, x: '0%', delay: 0.4, ease: Power1.easeInOut});
                    tl.staggerFromTo($(".section1_swiper .swiper-slide-active .sec1__title h1"), 0.8, {
                        opacity: 0,
                        x: '50px'
                    }, {opacity: 1, x: '0%', delay: 0.4, ease: Power1.easeInOut});
                },
                transitionEnd: function () {
                },
            },
        });

        $("ul.product_list li").click(function () {
            var activeTab = $(this).attr("data-tab");
            $("ul.product_list li").removeClass("active");
            $(".product_item").removeClass("on");
            $(this).addClass("active");
            $("#" + activeTab).addClass("on");

            $('.product-item__inner').removeClass('animate')
            $(`#${activeTab} .product-item__inner`).addClass('animate')
        });

        // Mobile Logo Slider
        const logoSwiper = new Swiper('.logo__slider', {
            loop: false,
            slidesPerView: 2.5,
            spaceBetween: 8,
        });
    })
</script>
</body>
</html>
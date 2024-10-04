<?php include $_SERVER["DOCUMENT_ROOT"]."/pro_inc/include_default.php"; // 공통함수 인클루드 ?>
<?php include $_SERVER["DOCUMENT_ROOT"] . "/en/_inc/head.php"; ?>
<div id="wrap" class="homepage">
	<?php include $_SERVER["DOCUMENT_ROOT"] . "/en/_inc/header.php"; ?>
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
								<p><?=$row['eng_txt_1']?></p>
								<h1><?=$row['eng_txt_2_1']?><br><?=$row['eng_txt_2_2']?></h1>
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
					<h3>EUCNC Advantage</h3>
					<ul>
						<li>Saving Earth</li>
						<li>Saving Money</li>
						<li>Technology Development</li>
					</ul>
				</div>
				<div class="content">
					<h1>EUCNC leading the<br>environment and future value</h1>
					<div class="sec2_grid">
						<div class="sec2_item">
							<div class="title">
								<h3>Saving Earth</h3>
								<p>Simple Process 1~2 steps<br>Less working time</p>
							</div>
							<div class="icon"></div>
						</div>
						<div class="sec2_item"></div>
						<div class="sec2_item">
							<div class="title">
								<h3>Technology Development</h3>
								<p>Easy to add functions<br>
									Next target for fire extinguishing<br>
									& Non-flammable Paints</p>
							</div>
						</div>
						<div class="sec2_item"></div>
						<div class="sec2_item">
							<div class="title">
								<h3>Saving Money</h3>
								<p>Saving Fossil Energy Carbon Neutrality</p>
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
					<h3>EUCNC Product 2023</h3>
					<ul class="product_list">
						<li data-tab="idx_1" class="active">Eco-friendly enery saving heat paint</li>
						<li data-tab="idx_2">Eco-friendly flame retardancy paint</li>
						<li data-tab="idx_3">Non-flammable paint</li>
						<li data-tab="idx_4">Railway heat-proof paint</li>
					</ul>
				</div>
				<div class="content">
					<div class="product__inner">
						<div id="idx_1" class="product_item on">
							<div class="product-item__inner">
								<div class="product_thum">
									<img src="/_img/product_thum01.png" alt="">
									<span>
                      Introducing eco-friendly<br>
                      desalination paint based<br>
                      on eco-friendly R&D technology.
                    </span>
								</div>
								<div class="product_title">
									<a href="./product/product1.php" class="mo-btn-txt_more">Learn more</a>
									<div class="title">
										<h3>Eco-friendly enery<br>saving heat paint</h3>
										<ul>
											<li>8~13℃ reduction in room temperature when EUCNC paint is applied</li>
											<li>It can be applied with only 1-2 top coats without the need for a primer</li>
											<li>If you adjust the heating and cooling 1ºC, the energy saving rate is about 7%</li>
											<li>Reducing electric energy consumption by applying it to general<br>
												buildings or factory buildings
											</li>
										</ul>
									</div>
									<div class="paint">
										<a href="./product/product1.php" class="btn-txt_more">Learn more</a>
										<div class="paint_thum">
											<img src="/_img/product_paint01.png" alt="Paint Image">
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
                      Introducing eco-friendly<br>
                      desalination paint based<br>
                      on eco-friendly R&D technology.
                    </span>
								</div>
								<div class="product_title">
									<a href="./product/product2.php" class="mo-btn-txt_more">Learn more</a>
									<div class="title">
										<h3 class="product2">Eco-friendly flame retardancy paint</h3>
										<ul>
											<li>The largest drawing area in Korea of ​​7.5 m2/L (secured type approval
												from the Korea Fire Industry and Technology Institute)
											</li>
											<li>Possible to produce secondary processed products (plywood squared
												beam flame retardant coating)
											</li>
											<li>Applicable to 62 exhibition and cultural facilities in Korea, including
												KINTEX, COEX, and BEXCO
											</li>
										</ul>
									</div>
									<div class="paint">
										<a href="./product/product2.php" class="btn-txt_more">Learn more</a>
										<div class="paint_thum">
											<img src="/_img/product_paint02.png" alt="Paint Image">
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
                      Introducing eco-friendly<br>
                      desalination paint based<br>
                      on eco-friendly R&D technology.
                    </span>
								</div>
								<div class="product_title">
									<a href="./product/product3.php" class="mo-btn-txt_more">Learn more</a>
									<div class="title">
										<h3 class="product3">Non-flammable paint</h3>
										<ul>
											<li>Heat resistant up to 1800℃</li>
											<li>A special market with high added value that is difficult for major
												companies to entry
											</li>
											<li>Russian nanotechnology material center technology introduction
												in progress
											</li>
										</ul>
									</div>
									<div class="paint">
										<a href="./product/product3.php" class="btn-txt_more">Learn more</a>
										<div class="paint_thum">
											<img src="/_img/product_paint03.png" alt="Paint Image">
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
                      Introducing eco-friendly<br>
                      desalination paint based<br>
                      on eco-friendly R&D technology.
                    </span>
								</div>
								<div class="product_title">
									<a href="./product/product4.php" class="mo-btn-txt_more">Learn more</a>
									<div class="title">
										<h3 class="product4">Railway heat-<br>proof paint</h3>
										<ul>
											<li>5~7 ℃ temperature reduction effect</li>
											<li>Applicable to 1,512km of domestic rail and 29,792km of global rail</li>
											<li>Proposal collaboration in progress with Dongyang University
												Railway Department
											</li>
										</ul>
									</div>
									<div class="paint">
										<a href="./product/product4.php" class="btn-txt_more">Learn more</a>
										<div class="paint_thum">
											<img src="/_img/product_paint04.png" alt="Paint Image">
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
				<h3 class="tit">Patent & Certificate</h3>
				<div class="patent__info">
					<div class="info">
						<h2>Certified paint EU-201</h2>
						<p>
							Unlike existing products that have either heat insulation or heat shield function,<br>
							EUCNC's EU-201 paint has merged heat insulation & shield technology,<br>
							which acquired carbon reduction test report from an authorized testing<br>
							institute and was recognized as an innovative product recommended<br>
							by the Ministry of Environment.
						</p>
					</div>
					<div class="patent_img">
						<a href="/en/reference/patent.php" class="btn-txt_more">Learn more</a>
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
					<a href="/en/reference/certification.php" class="btn-txt_more">Learn more</a>
					<div class="logo_list">
						<div class="logo_item">
							<img src="/_img/logo01_en.png" alt="Logo">
						</div>
						<div class="logo_item">
							<img src="/_img/logo02_en.png" alt="Logo">
						</div>
						<div class="logo_item">
							<img src="/_img/logo03_en.png" alt="Logo">
						</div>
						<div class="logo_item">
							<img src="/_img/logo04_en.png" alt="Logo">
						</div>
						<div class="logo_item">
							<img src="/_img/logo05_en.png" alt="Logo">
						</div>
						<div class="logo_item">
							<img src="/_img/logo06_en.png" alt="Logo">
						</div>
						<div class="logo_item">
							<img src="/_img/logo07_en.png" alt="Logo">
						</div>
						<div class="logo_item">
							<img src="/_img/logo08_en.png" alt="Logo">
						</div>
					</div>
				</div>
				<!-- 모바일용 슬라이더 -->
				<div class="logo__slider mobile_show">
					<div class="swiper-wrapper">
						<div class="swiper-slide">
							<div class="logo_item">
								<img src="/_img/logo01_en.png" alt="Logo">
							</div>
						</div>
						<div class="swiper-slide">
							<div class="logo_item">
								<img src="/_img/logo02_en.png" alt="Logo">
							</div>
						</div>
						<div class="swiper-slide">
							<div class="logo_item">
								<img src="/_img/logo03_en.png" alt="Logo">
							</div>
						</div>
						<div class="swiper-slide">
							<div class="logo_item">
								<img src="/_img/logo04_en.png" alt="Logo">
							</div>
						</div>
						<div class="swiper-slide">
							<div class="logo_item">
								<img src="/_img/logo05_en.png" alt="Logo">
							</div>
						</div>
						<div class="swiper-slide">
							<div class="logo_item">
								<img src="/_img/logo06_en.png" alt="Logo">
							</div>
						</div>
						<div class="swiper-slide">
							<div class="logo_item">
								<img src="/_img/logo07_en.png" alt="Logo">
							</div>
						</div>
						<div class="swiper-slide">
							<div class="logo_item">
								<img src="/_img/logo08_en.png" alt="Logo">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="section section_footer fp-auto-height">
			<?php include $_SERVER["DOCUMENT_ROOT"] . "/en/_inc/footer.php"; ?>
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
            centeredSlides: true,
            effect: 'fade',
            loop: true,
            fadeEffect: {
                crossFade: false,
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
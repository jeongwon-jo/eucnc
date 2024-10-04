<?php

include $_SERVER["DOCUMENT_ROOT"] . "/pro_inc/include_default.php"; // 공통함수 인클루드
include $_SERVER["DOCUMENT_ROOT"] . "/en/_inc/head.php";
?>
<div id="wrap">
	<?php include $_SERVER["DOCUMENT_ROOT"] . "/en/_inc/header.php"; ?>
	<main>
		<div class="menu-title menu1">
			<div class="menu-title__inner">
				<div class="title">
					<h1 class="tit">Company</h1>
					<span class="sub">Global No.1 Paint EUCNC</span>
				</div>
				<div class="sub-menu">
					<ul class="submenu_list">
						<li><a href="./greetings.php">Greetings</a></li>
						<li><a href="./organization.php">Organization<br>chart</a></li>
						<li class="active"><a href="./history.php">Business history</a></li>
						<li><a href="./esg.php">ESG Management</a></li>
						<li><a href="./facility.php">Facility</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="history__inner">
				<h2 class="cmpny_title">Business history</h2>
				<p>
					Based on excellent eco-friendly technology, we will grow into a sustainable eco-friendly<br>
					company in the future as well as its current value.
				</p>
				<div class="history_list">
					<?
					$query = " SELECT * FROM company_timeline_list ORDER BY `priority` ASC ";
					$result = mysqli_query($gconnet, $query);
					for($i = 0, $iMax = $result->num_rows; $i < $iMax; $i++){
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

						$months = [
							'January',
							'February',
							'March',
							'April',
							'May',
							'June',
							'July',
							'August',
							'September',
							'October',
							'November',
							'December',
						];

						?>
						<div class="<?=implode(' ', $tagMapper)?>">
							<div class="history_item__inner">
								<?php if ($i % 2 != 1) { ?>
								<div class="thum">
									<img src="/upload_file/timeline/<?= $row['file_chg'] ?>">
								</div>
								<span class="bar"></span>
								<div class="desc">
									<h3><?= $row['year'] ?></h3>
									<ul class="course">
										<?
										for ($j = 0, $jMax = $sub_result->num_rows; $j < $jMax; $j++) {
											$sub_row = $sub_result->fetch_assoc();
											?>
											<li><span><?= substr($months[intval($sub_row['month']) - 1], 0, 3) ?>.</span><p><?= $sub_row['content_eng'] ?></p></li>
										<? } ?>
									</ul>
								</div>
								<?php } else { ?>
									<div class="desc">
										<h3><?= $row['year'] ?></h3>
										<ul class="course">
											<?
											for ($j = 0, $jMax = $sub_result->num_rows; $j < $jMax; $j++) {
												$sub_row = $sub_result->fetch_assoc();
												?>
												<li><span><?= substr($months[intval($sub_row['month']) - 1], 0, 3) ?>.</span><p><?= $sub_row['content_eng'] ?></p></li>
											<? } ?>
										</ul>
									</div>
									<span class="bar"></span>
									<div class="thum">
										<img src="/upload_file/timeline/<?= $row['file_chg'] ?>">
									</div>
								<?php } ?>
							</div>
						</div>
					<? } ?>

					<!--
					<div class="history_item current">
						<div class="history_item__inner">
							<div class="thum">
								<img src="/_img/company/history_2023.png" alt="2023History">
							</div>
							<span class="bar"></span>
							<div class="desc">
								<h3>2023</h3>
								<ul class="course">
									<li><span>Jul.</span>
										<p>Established a corporation in Indonesia</p></li>
									<li><span>Jun.</span>
										<p>Participated in Paris [VIVA TECH 2023]</p></li>
									<li><span>Apr.</span>
										<p>Selected as 100 material parts equipment startups<br> Commendation from the Minister of Science and ICT
										</p></li>
									<li><span>Mar.</span>
										<p>Bridge A investment success</p></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="history_item reverse">
						<div class="history_item__inner">
							<div class="desc">
								<h3>2022</h3>
								<ul class="course">
									<li><span>Nov.</span>
										<p>Commendation from the Minister<br> of Environment for eco-friendly technology<br> promotion and green consumption
										</p></li>
									<li><span>Sep.</span>
										<p>Innovative Product Certification<br> Green Technology Certification</p></li>
									<li><span>Aug.</span>
										<p>Smart Construction Entrepreneurship<br> Idea Contest Grand Prize</p></li>
									<li><span>May.</span>
										<p>Securing Innobiz confirmation<br> POC with Incheon Port Authority </p></li>
									<li><span>Mar.</span>
										<p>Acquisition of Eco-Label Certificate</p></li>
									<li><span>Jan.</span>
										<p>Korea-Russia Innovation Platform<br> Establishment Agreement</p></li>
								</ul>
							</div>
							<span class="bar"></span>
							<div class="thum">
								<img src="/_img/company/history_2022.png" alt="2022History">
							</div>
						</div>
					</div>
					<div class="history_item">
						<div class="history_item__inner">
							<div class="thum">
								<img src="/_img/company/history_2021.png" alt="2021History">
							</div>
							<span class="bar"></span>
							<div class="desc">
								<h3>2021</h3>
								<ul class="course">
									<li><span>Dec.</span>
										<p>POC with Korea Western Power </p></li>
									<li><span>Nov.</span>
										<p>Received a commendation from the Minister<br> of Small and Medium Venture Business as<br> a technologically innovative company
										</p></li>
									<li><span>Sep.</span>
										<p>Encouragement Award in Environmental Startup<br> Startup Division at Environmental Startup<br> Competition<br> Established a local corporation in Russia<br>(St. Petersburg)
										</p></li>
									<li><span>Jul.</span>
										<p>1 PCT application, 2 domestic patent registrations</p></li>
									<li><span>Jun.</span>
										<p>TIPA overseas source technology commercialization<br> technology development business agreement<br> Relocation of factory (registration of factory<br> for manufacturing chemical products)
										</p></li>
									<li><span>May.</span>
										<p>Selected as a performance sharing company<br> for Incheon Metropolitan City Corporation
										</p></li>
									<li><span>Jan.</span>
										<p>Korea-Russia Technical Cooperation Platform<br> Establishment Agreement<br
													class="pc_show"> Seed B investment success</p></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="history_item reverse">
						<div class="history_item__inner">
							<div class="desc">
								<h3>2020</h3>
								<ul class="course">
									<li><span>Nov.</span>
										<p>Award Certificate from the Mayor<br> of Incheon Incheon Start-up Vitalization Award
										</p></li>
									<li><span>Aug.</span>
										<p>Acquisition of flame retardant paint type<br> approval (certified for 75㎡ per L)
										</p></li>
									<li><span>Jul.</span>
										<p>TIPA Startup Growth Technology<br> Development Project Agreement<br
													class="pc_show"> Seed A investment success</p></li>
									<li><span>Feb.</span>
										<p>Korea Institute of Industrial Technology -<br>Designated as a partner company
										</p></li>
								</ul>
							</div>
							<span class="bar"></span>
							<div class="thum">
								<img src="/_img/company/history_2020.png" alt="2020History">
							</div>
						</div>
					</div>
					<div class="history_item">
						<div class="history_item__inner">
							<div class="thum">
								<img src="/_img/company/history_2019.png" alt="2019History">
							</div>
							<span class="bar"></span>
							<div class="desc">
								<h3>2019</h3>
								<ul class="course">
									<li><span>Oct.</span>
										<p>Certification on venture company in 2019</p></li>
									<li><span>Sep.</span>
										<p>Corporate Affiliated Research Institute Certification</p></li>
									<li><span>Jun.</span>
										<p>Initial Start-Up Package Agreement</p></li>
									<li><span>Feb.</span>
										<p>Establish EUCNC in 2019</p></li>
								</ul>
							</div>
						</div>
					</div>
					-->
				</div>
			</div>
		</div>
	</main>
	<?php include $_SERVER["DOCUMENT_ROOT"] . "/en/_inc/footer.php"; ?>
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
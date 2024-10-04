<?php

include $_SERVER["DOCUMENT_ROOT"] . "/pro_inc/include_default.php"; // 공통함수 인클루드
include $_SERVER["DOCUMENT_ROOT"] . "/en/_inc/head.php";

$query_cnt = " SELECT `idx` FROM awards_info ";
$result_cnt = mysqli_query($gconnet, $query_cnt);
$total_cnt = $result_cnt->num_rows;

?>

<script defer>
    let currentPage = 1;
    let currentCount = 0;

    function ajax_patent(lang, pageNo, pageScale) {
        $.ajax({
            url: "/ajax/ajax_reward_prepare.php",
            dataType: "json",
            type: "POST",
            data: {
                lang: lang,
                pageNo: pageNo,
                pageScale: pageScale,
                currentCount: currentCount
            },
            success: function (res) {
                let container = document.getElementsByClassName('reward')[0];

                for (let i = 0, iMax = res.dataMap.length; i < iMax; i++) {
                    let row = res.dataMap[i];

                    container.innerHTML += `
                    	<button class="card_item2" onclick="open_patent_modal('${row.image}', '${row.subject}')">
						<div class="thum"><img src="${row.image}" alt="임시 썸네일"></div>
						<div class="desc"><h3 class="tit">${row.subject}</h3></div>
                    `
                }

                currentPage = pageNo;
                currentCount = res.currentCount;
                document.getElementById(`current_cnt`).innerText = currentCount;

                if (parseInt('<?=$total_cnt?>') <= currentCount) {
                    document.getElementsByClassName('btn_more')[0].style.display = 'none';
                }

            }
        })
    }

    function open_patent_modal(image, text){
        openModal('modal_show-reward')
        document.querySelector('.modal__contents .title').innerHTML = text;
        document.getElementById('modal_img').src = image;
    }

    ajax_patent('eng', 1, 9)
</script>

<div id="wrap">
	<?php include $_SERVER["DOCUMENT_ROOT"] . "/en/_inc/header.php"; ?>
	<main>
		<div class="menu-title menu3">
			<div class="menu-title__inner">
				<div class="title">
					<h1 class="tit">EUCNC News</h1>
					<span class="sub">Global No.1 Paint EUCNC</span>
				</div>
				<div class="sub-menu">
					<ul class="submenu_list">
						<li><a href="./patent.php">Patent</a></li>
						<li><a href="./certification.php">Certification</a></li>
						<li class="active"><a href="./reward.php">Awards</a></li>
						<li><a href="./construction.php">Works</a></li>
						<li><a href="./events.php">Events</a></li>
						<li><a href="./downloads.php">Download</a></li>
						<li><a href="./media.php">Media</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="container reference">
			<div class="reward__inner">
				<div class="cm_title">
					<h3 class="title">Awards</h3>
				</div>
				<div class="reward__contents">
					<? if($total_cnt > 0){ ?>
						<div class="reward-card__list">
							<div class="card_list2 reward">
							</div>
							<div class="btn-area center mt90">
								<!-- TODO : 더보기 개발 추가 필요 -->
								<button type="button" class="btn_more" onclick="ajax_patent('eng', currentPage+1, 9)"><b>More (<span
												id="current_cnt">0</span>/<?=$total_cnt?>)</b></button>
							</div>
						</div>
					<? }else{ ?>
						<div class="no-data__contents no-search">
							<div class="thum">
								<img src="/_img/common/logo_nodata.png" alt="">
							</div>
							<p>There are currently no posts registered.</p>
						</div>
					<? } ?>
				</div>
			</div>
		</div>
	</main>
	<div id="modal_show-reward" class="modal modal_show_reward">
		<div class="modal__inner">
			<div class="close-modal">
				<button type="button" class="btn_close-modal" onclick="closeModal('modal_show-reward')"></button>
			</div>
			<div class="modal__contents">
				<div class="thumbnail_cnts">
					<img id="modal_img" src="/_img/item_thumb2.png" alt="임시 썸네일">
				</div>
				<h3 class="title">2023 한국발명진흥회 통합 투자유치
					설명회 우수상 2023 한국발명진흥회 
					통합 투자유치 설명회 우수상</h3>
			</div>
		</div>
	</div>
	<?php include $_SERVER["DOCUMENT_ROOT"] . "/en/_inc/footer.php"; ?>
</div>
</body>
</html>
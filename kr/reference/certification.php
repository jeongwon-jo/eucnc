<?php

include $_SERVER["DOCUMENT_ROOT"] . "/pro_inc/include_default.php"; // 공통함수 인클루드
include $_SERVER["DOCUMENT_ROOT"] . "/kr/_inc/head.php";

$query_cnt = " SELECT `idx` FROM certification_info ";
$result_cnt = mysqli_query($gconnet, $query_cnt);
$total_cnt = $result_cnt->num_rows;

?>

<script defer>
    let currentPage = 1;
    let currentCount = 0;

    function ajax_patent(lang, pageNo, pageScale) {
        $.ajax({
            url: "/ajax/ajax_certification_prepare.php",
            dataType: "json",
            type: "POST",
            data: {
                lang: lang,
                pageNo: pageNo,
                pageScale: pageScale,
                currentCount: currentCount
            },
            success: function (res) {
                let container = document.getElementsByClassName('doc__list')[0];

                for (let i = 0, iMax = res.dataMap.length; i < iMax; i++) {
                    let row = res.dataMap[i];

                    container.innerHTML += `
                    <div class="doc_item">
						<div class="thum">
							<img src="${row.image}" alt="썸네일">
						</div>
						<div class="desc">
							<h3 class="tit">${row.subject[0]}</h3>
							<h3 class="tit">${row.subject[1]}</h3>
							<p>${row.desc.join('<br>')}</p>
						</div>
					</div>
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

    function open_patent_modal(image){
        openModal('modal_show-doc')
        document.getElementById('modal_img').src = image;
    }

    ajax_patent('kor', 1, 9)
</script>

<div id="wrap">
	<?php include $_SERVER["DOCUMENT_ROOT"] . "/kr/_inc/header.php"; ?>
	<main>
		<div class="menu-title menu3">
			<div class="menu-title__inner">
				<div class="title">
					<h1 class="tit">기업소식</h1>
					<span class="sub">Global No.1 Paint EUCNC</span>
				</div>
				<ul class="breadcrumb reference">
					<li class="home"></li>
					<li>기업소식</li>
					<li>인증서</li>
				</ul>
				<div class="sub-menu">
					<ul class="submenu_list">
						<li><a href="./patent.php">특허</a></li>
						<li class="active"><a href="./certification.php">인증서</a></li>
						<li><a href="./reward.php">수상내역</a></li>
						<li><a href="./construction.php">시공사례</a></li>
						<li><a href="./events.php">기업행사</a></li>
						<li><a href="./downloads.php">다운로드</a></li>
						<li><a href="./news.php">기사 자료</a></li>
						<li><a href="./media.php">미디어 자료</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="container reference">
			<div class="reference__inner">
				<div class="cm_title">
					<h3 class="title">인증서</h3>
				</div>
				<div class="cert__contents">
					<div class="doc__list"></div>
					<div class="btn-area center mt90">
						<button type="button" class="btn_more" onclick="ajax_patent('kor', currentPage+1, 9)"><b>더보기 (<span
										id="current_cnt">0</span>/<?=$total_cnt?>)</b></button>
					</div>
				</div>
			</div>
		</div>
	</main>
	<div id="modal_show-doc" class="modal modal_show_doc">
		<div class="modal__inner">
			<div class="close-modal">
				<button type="button" class="btn_close-modal" onclick="closeModal('modal_show-doc')"></button>
			</div>
			<div class="modal__contents">
				<div class="thumbnail_cnts">
					<img id="modal_img" src="/_img/item_thumb2.png" alt="임시 썸네일">
				</div>
			</div>
		</div>
	</div>
	<?php include $_SERVER["DOCUMENT_ROOT"] . "/kr/_inc/footer.php"; ?>
</div>
</body>
</html>
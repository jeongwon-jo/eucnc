<?php

include $_SERVER["DOCUMENT_ROOT"] . "/pro_inc/include_default.php"; // 공통함수 인클루드
include $_SERVER["DOCUMENT_ROOT"] . "/kr/_inc/head.php";

$keyword_type = trim(sqlfilter($_REQUEST['keyword_type']));
$keyword = trim(sqlfilter($_REQUEST['keyword']));
$pageNo = trim(sqlfilter($_REQUEST['pageNo']));
$pageScale = trim(sqlfilter($_REQUEST['pageScale']));
if(!$pageNo){
	$pageNo = 1;
}

if(!$pageScale){
	$pageScale = 3;
}

$total_param = "pageScale=$pageScale&keyword_type=$keyword_type&keyword=$keyword";

$StarRowNum = (($pageNo-1) * $pageScale);
$EndRowNum = $pageScale;

$query = " SELECT * FROM media_info ORDER BY `priority` ASC LIMIT $StarRowNum,$EndRowNum ";
$result = mysqli_query($gconnet, $query);

$query_cnt = " SELECT idx FROM media_info ";
$result_cnt = mysqli_query($gconnet, $query_cnt);
$num = $result_cnt->num_rows;

$iTotalSubCnt = $num;
$totalpage	= ($iTotalSubCnt - 1)/$pageScale  + 1;

?>
<script>
	function open_media_modal(link){
        openModal('modal_show-movie')
		document.getElementById('video_frame').src = link;
	}
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
					<li>미디어 자료</li>
				</ul>
				<div class="sub-menu">
					<ul class="submenu_list">
						<li><a href="./patent.php">특허</a></li>
						<li><a href="./certification.php">인증서</a></li>
						<li><a href="./reward.php">수상내역</a></li>
						<li><a href="./construction.php">시공사례</a></li>
						<li><a href="./events.php">기업행사</a></li>
						<li><a href="./downloads.php">다운로드</a></li>
						<li><a href="./news.php">기사 자료</a></li>
						<li class="active"><a href="./media.php">미디어 자료</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="container reference">
			<div class="media__inner">
				<div class="cm_title">
					<h3 class="title">미디어 자료</h3>
				</div>
				<div class="media__contents">
					<div class="card_list">
						<?
						for($i = 0, $iMax = $result->num_rows; $i < $iMax; $i ++){
							$row = $result->fetch_array();
							$video_id = explode('/', $row['link'])[count(explode('/', $row['link'])) - 1];
							?>
							<div class="card_item video">
								<div class="thum" onclick="open_media_modal('<?=$row['link']?>')">
									<img src="https://img.youtube.com/vi/<?=$video_id?>/maxresdefault.jpg" alt="임시 썸네일">
								</div>
								<div class="desc">
									<h3 class="tit"><?=$row['kor_subject_1']?><br><?=$row['kor_subject_2']?></h3>
									<span class="date"><?=date('Y. m. d', strtotime($row['wdate']))?></span>
								</div>
							</div>
						<? } ?>
					</div>
					<ul class="pagination">
						<? include $_SERVER["DOCUMENT_ROOT"] . "/pro_inc/front_paging.php"; ?>
					</ul>
				</div>
			</div>
		</div>
	</main>
	<?php include $_SERVER["DOCUMENT_ROOT"] . "/kr/_inc/footer.php"; ?>
</div>
<div id="modal_show-movie" class="modal modal_show_movie">
	<div class="modal__inner">
		<div class="close-modal">
			<button type="button" class="btn_close-modal" onclick="closeModal('modal_show-movie')"></button>
		</div>
		<div class="modal__contents">
			<div class="iframe_cnts">
				<iframe id="video_frame" width="560" height="315"
						title="YouTube video player" frameborder="0"
						allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
						allowfullscreen></iframe>
			</div>
		</div>
	</div>
</div>
</body>
</html>
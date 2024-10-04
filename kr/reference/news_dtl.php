<?php

include $_SERVER["DOCUMENT_ROOT"] . "/pro_inc/include_default.php"; // 공통함수 인클루드
include $_SERVER["DOCUMENT_ROOT"] . "/kr/_inc/head.php";

$keyword_type = trim(sqlfilter($_REQUEST['keyword_type']));
$keyword = trim(sqlfilter($_REQUEST['keyword']));
$pageNo = trim(sqlfilter($_REQUEST['pageNo']));
$pageScale = trim(sqlfilter($_REQUEST['pageScale']));
$idx = trim(sqlfilter($_REQUEST['idx']));
if(!$idx){
	error_back("접근할 수 없는 페이지입니다.");
	exit;
}

$total_param = "pageScale=$pageScale&keyword_type=$keyword_type&keyword=$keyword&pageNo=$pageNo";

$query = "SELECT * FROM news_info WHERE `idx` = '$idx'";
$result = mysqli_query($gconnet, $query);
$row = mysqli_fetch_array($result);

$next_query = "SELECT * FROM news_info WHERE `idx` > '$idx' LIMIT 1";
$next_result = mysqli_query($gconnet, $next_query);

$prev_query = "SELECT * FROM news_info WHERE `idx` < '$idx' ORDER BY `idx` DESC LIMIT 1";
$prev_result = mysqli_query($gconnet, $prev_query);

?>
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
					<li>기사 자료</li>
				</ul>
				<div class="sub-menu">
					<ul class="submenu_list">
						<li><a href="./patent.php">특허</a></li>
						<li><a href="./certification.php">인증서</a></li>
						<li><a href="./reward.php">수상내역</a></li>
						<li><a href="./construction.php">시공사례</a></li>
						<li><a href="./events.php">기업행사</a></li>
						<li><a href="./downloads.php">다운로드</a></li>
						<li class="active"><a href="./news.php">기사 자료</a></li>
						<li><a href="./media.php">미디어 자료</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="container reference">
			<div class="news-dtl__inner">
				<div class="cm_title">
					<h3 class="title">기사 자료</h3>
				</div>
				<div class="news-dtl__contents">
					<div class="dtl_container">
						<div class="title">
							<div class="title_area">
								<b>제목</b>
								<?=$row['subject']?>
							</div>
							<ul class="reg-info">
								<li><b>작성일</b><?=date('Y.m.d', strtotime($row['wdate']))?></li>
							</ul>
						</div>
						<div class="cnts">
							<div class="contents">
								<p><?=$row['content']?></p>
							</div>
						</div>
					</div>
					<div class="btn-area center mt32">
						<?
						if($prev_result->num_rows > 0){
							$prev_row = $prev_result->fetch_array();
							?>
							<a href="./news_dtl.php?idx=<?=$prev_row['idx']?>&<?=$total_param?>" class="btn btn-md gray">이전</a>
						<? } ?>
						<a href="./news.php?<?=$total_param?>" class="btn btn-md white">목록</a>
						<?
						if($next_result->num_rows > 0){
							$next_row = $next_result->fetch_array();
							?>
							<a href="./news_dtl.php?idx=<?=$next_row['idx']?>&<?=$total_param?>" class="btn btn-md pink">다음</a>
						<? } ?>
					</div>
				</div>
			</div>
		</div>
	</main>
	<?php include $_SERVER["DOCUMENT_ROOT"] . "/kr/_inc/footer.php"; ?>
</div>
</body>
</html>
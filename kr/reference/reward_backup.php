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

$where = " 1 = 1 ";
if($keyword){
	switch($keyword_type){
		case "subject":
			$where .= " AND `subject` LIKE '%$keyword%' ";
			break;
		case "content":
			$where .= " AND `content` LIKE '%$keyword%' ";
			break;
		default:
			$where .= " AND ( `subject` LIKE '%$keyword%' OR `content` LIKE '%$keyword%' ) ";
			break;
	}
}

$StarRowNum = (($pageNo-1) * $pageScale);
$EndRowNum = $pageScale;

$query_cnt = " SELECT idx FROM awards_info WHERE $where ";
$result_cnt = mysqli_query($gconnet, $query_cnt);
$num = $result_cnt->num_rows;

$iTotalSubCnt = $num;
$totalpage	= ($iTotalSubCnt - 1)/$pageScale  + 1;

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
					<li>수상내역</li>
				</ul>
				<div class="sub-menu">
					<ul class="submenu_list">
						<li><a href="./patent.php">특허</a></li>
						<li><a href="./certification.php">인증서</a></li>
						<li class="active"><a href="./reward.php">수상내역</a></li>
						<li><a href="./construction.php">시공사례</a></li>
						<li><a href="./news.php">기사 자료</a></li>
						<li><a href="./media.php">미디어 자료</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="reward__inner">
				<div class="cm_title">
					<h3 class="title">수상내역</h3>
				</div>
				<div class="reward__contents">
					<form action="<?=basename($_SERVER["PHP_SELF"])?>" method="post" class="search_form">
						<fieldset>
							<legend>온라인 문의 목록 검색 폼</legend>
							<div class="search__inner">
								<div class="search_input">
									<select id="select" name="keyword_type" class="custom-select select-primary w140">
										<option value="" selected>전체</option>
										<option value="subject" <? if($keyword_type === "subject"){ echo 'selected'; } ?>>제목</option>
										<option value="content" <? if($keyword_type === "content"){ echo 'selected'; } ?>>내용</option>
									</select>
									<input type="text" name="keyword" value="<?=$keyword?>" placeholder="검색어를 입력해 주세요.">
									<button type="submit" class="btn btn-md gray">검색</button>
								</div>
							</div>
						</fieldset>
					</form>
					<!-- 검색결과 없을 때 -->
					<!-- <div class="no-data__contents no-search">
						<div class="thum">
							<img src="/_img/common/logo_nodata.png" alt="">
						</div>
						<p>현재 등록되어있는 게시물이 없습니다.</p>
					</div> -->
					<? if($num > 0){ ?>
						<div class="reward-card__list pc_show">
							<div class="card_list reward">
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

								$query = " SELECT * FROM awards_info WHERE $where ORDER BY `idx` DESC LIMIT $StarRowNum,$EndRowNum ";
								$result = mysqli_query($gconnet, $query);
								for($i = 0, $iMax = $result->num_rows; $i < $iMax; $i ++){
									$row = $result->fetch_array();
									?>
									<a href="./reward_dtl.php?idx=<?=$row['idx']?>&<?=$total_param?>" class="card_item">
										<div class="thum">
											<img src="<?=$fnThum($i)?>" alt="임시 썸네일">
										</div>
										<div class="desc">
											<h3 class="tit"><?=$row['subject']?></h3>
											<span class="date"><?=date('Y. m. d', strtotime($row['wdate']))?></span>
										</div>
									</a>
								<? } ?>
							</div>
							<ul class="pagination">
								<? include $_SERVER["DOCUMENT_ROOT"] . "/pro_inc/front_paging.php"; ?>
							</ul>
						</div>
						<div class="reward-table__list mobile_show">
							<div class="primary-table">
								<table>
									<colgroup>
										<col style="width: auto">
										<col style="width: 25%">
									</colgroup>
									<thead>
									<tr>
										<th>제목</th>
										<th>작성일</th>
									</tr>
									</thead>
									<tbody>
									<?
									$query = " SELECT * FROM awards_info WHERE $where ORDER BY `idx` DESC LIMIT $StarRowNum,$EndRowNum ";
									$result = mysqli_query($gconnet, $query);
									for($i = 0, $iMax = $result->num_rows; $i < $iMax; $i ++){
										$row = $result->fetch_array();
										?>
										<tr>
											<td class="tal">
												<a href="./reward_dtl.php?idx=<?=$row['idx']?>&<?=$total_param?>" class="ellipsis-line-1">
													<span><?=$row['subject']?></span>
												</a>
											</td>
											<td><?=date('y.m.d', strtotime($row['wdate']))?></td>
										</tr>
									<? } ?>
									</tbody>
								</table>
							</div>
							<ul class="pagination">
								<? include $_SERVER["DOCUMENT_ROOT"] . "/pro_inc/front_paging.php"; ?>
							</ul>
						</div>
					<? }else{ ?>
						<div class="no-data__contents no-search">
							<div class="thum">
								<img src="/_img/common/logo_nodata.png" alt="">
							</div>
							<p>현재 등록되어있는 게시물이 없습니다.</p>
						</div>
					<? } ?>
				</div>
			</div>
		</div>
	</main>
	<?php include $_SERVER["DOCUMENT_ROOT"] . "/kr/_inc/footer.php"; ?>
</div>
</body>
</html>
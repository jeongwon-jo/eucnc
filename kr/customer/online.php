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
	$pageScale = 10;
}

$total_param = "pageScale=$pageScale&keyword_type=$keyword_type&keyword=$keyword";

$where = " 1 = 1 ";
if($keyword){
	switch($keyword_type){
		case "subject":
			$where .= " AND `subject` LIKE '%$keyword%' ";
			break;
		case "writer":
			$where .= " AND `writer` LIKE '%$keyword%' ";
			break;
		default:
			$where .= " AND ( `subject` LIKE '%$keyword%' OR `writer` LIKE '%$keyword%' ) ";
			break;
	}
}

$StarRowNum = (($pageNo-1) * $pageScale);
$EndRowNum = $pageScale;

$query = " SELECT * FROM inquiry_info WHERE $where ORDER BY `idx` DESC LIMIT $StarRowNum,$EndRowNum ";
$result = mysqli_query($gconnet, $query);

$query_cnt = " SELECT idx FROM inquiry_info WHERE $where ";
$result_cnt = mysqli_query($gconnet, $query_cnt);
$num = $result_cnt->num_rows;

$iTotalSubCnt = $num;
$totalpage	= ($iTotalSubCnt - 1)/$pageScale  + 1;

?>
<script>
    function syncChangePageScale(value) {
        const url = new URL(location.href);
        url.searchParams.set('pageScale', value)
        location.href = url.href;
    }
</script>

<div id="wrap">
	<?php include $_SERVER["DOCUMENT_ROOT"] . "/kr/_inc/header.php"; ?>
	<main>
		<div class="menu-title menu4">
			<div class="menu-title__inner">
				<div class="title">
					<h1 class="tit">고객센터</h1> 
					<span class="sub">Global No.1 Paint EUCNC</span>
				</div>
				<ul class="breadcrumb">
					<li class="home"></li>
					<li>고객센터</li>
					<li>온라인 문의</li>
				</ul>
				<div class="sub-menu">
					<ul class="submenu_list">
						<li class="active"><a href="./online.php">온라인 문의</a></li>
						<li><a href="./map.php">오시는 길</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="container customer_cont">
			<div class="online__inner">
				<div class="cm_title">
					<h3 class="title">온라인 문의</h3>
					<p>궁금하신 사항이 있으실 경우 언제든지<br> 문의주시면 신속히 확인해서 답변 드리겠습니다.</p>
				</div>
				<!-- 데이터 없을때 -->
				<!-- <div class="no-data__contents">
					<div class="thum">
						<img src="/_img/common/logo_nodata.png" alt="">
					</div>
					<p>현재 등록되어있는 게시물이 없습니다.</p>
				</div> -->
				<div class="online__contents">
					<form action="<?=basename($_SERVER["PHP_SELF"])?>" method="post" class="search_form" name="search_frm">
						<fieldset>
							<legend>온라인 문의 목록 검색 폼</legend>
							<div class="search__inner">
								<span class="total-cnt">전체 (<b><?=$num?></b>건)</span>
								<div class="search_input">
									<select id="select" class="custom-select select-primary w140">
										<option selected>전체</option>
										<option value="subject" <? if($keyword_type === 'subject'){ echo 'selected'; } ?>>제목</option>
										<option value="writer" <? if($keyword_type === 'writer'){ echo 'selected'; } ?>>작성자</option>
									</select>
									<input type="text" name="keyword" placeholder="검색어를 입력해 주세요.">
									<button type="button" onclick="search_frm.submit()" class="btn btn-md gray">검색</button>
								</div>
								<select id="select" class="custom-select select-primary select-num w160" onchange="syncChangePageScale(this.value)">
									<option value="10" <? if($pageScale == 10){ echo 'selected'; } ?>>10개씩 보기</option>
									<option value="20" <? if($pageScale == 20){ echo 'selected'; } ?>>20개씩 보기</option>
									<option value="30" <? if($pageScale == 30){ echo 'selected'; } ?>>30개씩 보기</option>
								</select>
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
						<div class="primary-table online">
							<table>
								<colgroup>
									<col style="width: 15%">
									<col style="width: auto">
									<col style="width: 10%">
									<col style="width: 12%">
									<col style="width: 12%">
								</colgroup>
								<thead>
								<tr>
									<th>번호</th>
									<th>제목</th>
									<th>답변상태</th>
									<th>작성자</th>
									<th>작성일</th>
								</tr>
								</thead>
								<tbody>
								<?
								for($i = 0, $iMax = $result->num_rows; $i < $iMax; $i ++){
									$row = mysqli_fetch_array($result);
									$listnum = $iTotalSubCnt - (($pageNo - 1) * $pageScale) - $i;
									?>
									<tr>
										<td><?=$listnum?></td>
										<td class="tit">
											<a href="./online_checkpw.php?idx=<?=$row['idx']?>&<?=$total_param?>" class="table_title lock">
												<span><?=$row['subject']?></span>
											</a>
											<span class="mobile-date"><?=date('Y.m.d', strtotime($row['wdate']))?></span>
										</td>
										<td><span class="badge <?=$row['state'] == 1 ? 'complete' : 'wait'?>"><?=$row['state'] == 1 ? '답변완료' : '답변대기'?></span></td>
										<td><span class="nm"><?=$row['writer']?></span></td>
										<td><?=date('Y.m.d', strtotime($row['wdate']))?></td>
									</tr>
								<? } ?>
								</tbody>
							</table>
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
					<a href="./online_reg.php" class="btn btn-md pink btn_write">글쓰기</a>
				</div>
			</div>
		</div>
	</main>
	<?php include $_SERVER["DOCUMENT_ROOT"] . "/kr/_inc/footer.php"; ?>
</div>
</body>
</html>
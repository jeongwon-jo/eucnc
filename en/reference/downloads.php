<?php

include $_SERVER["DOCUMENT_ROOT"] . "/pro_inc/include_default.php"; // 공통함수 인클루드
include $_SERVER["DOCUMENT_ROOT"] . "/en/_inc/head.php";

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

$StarRowNum = (($pageNo-1) * $pageScale);
$EndRowNum = $pageScale;

$where = " 1 = 1 ";
if($keyword){
	if($keyword_type){
		switch($keyword_type){
			case "subject": $where .= " AND `eng_subject` LIKE '%$keyword%' "; break;
			case "content": $where .= " AND `eng_content` LIKE '%$keyword%' "; break;
		}
	}else{
		$where .= "
			AND (
				`eng_subject` LIKE '%$keyword%' OR
				`eng_content` LIKE '%$keyword%'
			)
		";
	}
}

$query = " SELECT * FROM download_info WHERE $where ORDER BY `priority` ASC LIMIT $StarRowNum,$EndRowNum ";
$result = mysqli_query($gconnet, $query);

$query_cnt = " SELECT idx FROM download_info WHERE $where ";
$result_cnt = mysqli_query($gconnet, $query_cnt);
$num = $result_cnt->num_rows;

$iTotalSubCnt = $num;
$totalpage	= ($iTotalSubCnt - 1)/$pageScale  + 1;

?>

<div id="wrap">
	<?php include $_SERVER["DOCUMENT_ROOT"] . "/en/_inc/header.php"; ?>
	<main>

		<script>
            function syncChangePageScale(size){
                const url = new URL(location.href)
                url.searchParams.set("pageScale", size)
                location.href = url.href
            }
		</script>

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
						<li><a href="./reward.php">Awards</a></li>
						<li><a href="./construction.php">Works</a></li>
						<li><a href="./events.php">Events</a></li>
						<li class="active"><a href="./downloads.php">Download</a></li>
						<li><a href="./media.php">Media</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="container reference">
			<div class="downloads__inner">
				<div class="cm_title">
					<h3 class="title">Download</h3>
				</div>

				<div class="downloads__contents">
					<form method="post" class="search_form" name="search_frm">
						<input type="hidden" name="pageNo" value="<?=$pageNo?>">
						<input type="hidden" name="pageScale" value="<?=$pageScale?>">
						<fieldset>
							<legend>Download Search Form</legend>
							<div class="search__inner">
								<span class="total-cnt">Total (<b><?=$iTotalSubCnt?></b>)</span>
								<div class="search_input">
									<select id="select" name="keyword_type" class="custom-select select-primary w140">
										<option selected>All</option>
										<option value="subject" <? if($keyword_type === "subject"){ echo 'selected'; } ?>>Title</option>
										<option value="content" <? if($keyword_type === "content"){ echo 'selected'; } ?>>Content</option>
									</select>

									<input type="text" name="keyword" placeholder="Please enter your keyword." value="<?=$keyword?>">
									<button type="button" onclick="search_frm.submit()" class="btn btn-md gray">Search</button>
								</div>
								<select id="select" name="pageScale" class="custom-select select-primary select-num w160" onchange="syncChangePageScale(this.value)">
									<option value="10" <? if($pageScale == 10){ echo 'selected'; } ?>>10 articles</option>
									<option value="20" <? if($pageScale == 20){ echo 'selected'; } ?>>20 articles</option>
									<option value="30" <? if($pageScale == 30){ echo 'selected'; } ?>>30 articles</option>
								</select>
							</div>
						</fieldset>
					</form>

					<? if($iTotalSubCnt > 0){ ?>
						<div class="primary-table downloads">
							<table>
								<colgroup>
									<col style="width: 15%">
									<col style="width: auto">
									<col style="width: 15%">
									<col style="width: 15%">
								</colgroup>
								<thead>
								<tr>
									<th>No</th>
									<th>Title</th>
									<th>Posted by</th>
									<th>Date</th>
								</tr>
								</thead>
								<tbody>
								<?
								for($i = 0, $iMax = $result->num_rows; $i < $iMax; $i ++){
									$row = $result->fetch_assoc();
									$listnum	= $iTotalSubCnt - (( $pageNo - 1 ) * $pageScale ) - $i;

									$upload_file_cnt_query = " SELECT idx FROM download_file_info WHERE `download_idx` = '{$row['idx']}' ";
									$upload_file_cnt_result = mysqli_query($gconnet, $upload_file_cnt_query);
									$upload_file_cnt = $upload_file_cnt_result->num_rows;

									?>
									<tr>
										<td><?=$listnum?></td>
										<td class="tit tal">
											<a href="./downloads_dtl.php?<?=$total_param?>&idx=<?=$row['idx']?>" class="table_title <? if($upload_file_cnt){ echo 'file'; } ?>">
												<span><?=$row['eng_subject']?></span>
											</a>
											<span class="mobile-date"><?=date('Y.m.d', strtotime($row['wdate']))?></span>
										</td>
										<td>EUCNC</td>
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
							<p>There are no posts registered.</p>
						</div>
					<? } ?>

				</div>
			</div>
		</div>
	</main>
	<?php include $_SERVER["DOCUMENT_ROOT"] . "/en/_inc/footer.php"; ?>
</div>
</body>
</html>
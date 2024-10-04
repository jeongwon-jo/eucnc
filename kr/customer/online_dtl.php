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

$total_param = "pageScale=$pageScale&keyword_type=$keyword_type&keyword=$keyword&idx=$idx";

$query = " SELECT * FROM inquiry_info WHERE `idx` = '$idx' ";
$result = mysqli_query($gconnet, $query);
$row = mysqli_fetch_array($result);

?>
<form action="./online_remove_action.php" name="remove_frm" method="post" target="_fra_admin">
	<input type="hidden" name="idx" value="<?=$idx?>">
</form>

<script>
	function go_delete(){
        if(confirm("문의를 삭제하시겠습니까?")){
            remove_frm.submit()
		}
	}

    function go_modify(){
        location.href = "./online_reg_modify.php?idx=<?=$idx?>"
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
			<div class="online-dtl__inner">
				<div class="cm_title">
					<h3 class="title">온라인 문의</h3>
					<p>궁금하신 사항이 있으실 경우 언제든지<br> 문의주시면 신속히 확인해서 답변 드리겠습니다.</p>
				</div>
				<div class="online-dtl__contents">
					<div class="dtl_container">
						<div class="title">
							<div class="title_area">
								<b>제목</b>
								<span class="tit"><?=$row['subject']?></span><span class="badge <?=$row['state'] == 1 ? 'complete' : 'wait'?>"><?=$row['state'] == 1 ? '답변완료' : '답변대기'?></span>
							</div>
							<ul class="reg-info">
								<li><b>작성자</b><?=$row['writer']?></li>
								<li><b>작성일</b><?=date('Y.m.d')?></li>
							</ul>
						</div>
						<div class="cnts">
							<b>문의 내용</b>
							<div class="contents"><?=nl2br($row['content'])?></div>
							<div class="upload_filelist mt10">
								<?
								$fnSize = function($filePath) {
									$sizeInBytes = filesize($filePath);
									$units = ['B', 'KB', 'MB', 'GB', 'TB'];

									$index = 0;
									while ($sizeInBytes >= 1024 && $index < count($units) - 1) {
										$sizeInBytes /= 1024;
										$index++;
									}
									return sprintf("%.1f %s", $sizeInBytes, $units[$index]);
								};

								$file_query = " SELECT * FROM inquiry_file_info WHERE `inquiry_idx` = '$idx' ORDER BY `idx` ASC ";
								$file_result = mysqli_query($gconnet, $file_query);
								for($i = 0, $iMax = $file_result->num_rows; $i < $iMax; $i ++){
									$file_row = $file_result->fetch_array();
									?>
									<div class="file">
										<div class="file-info">
											<b>첨부된 파일</b>
											<a href="/pro_inc/download_file.php?nm=<?=$file_row['file_chg']?>&on=<?=$file_row['file_org']?>"><?=$file_row['file_org']?></a>
											<span class="size"><?=$fnSize($_P_DIR_FILE . $file_row['file_chg'])?></span>
										</div>
										<a href="/pro_inc/download_file.php?nm=<?=$file_row['file_chg']?>&on=<?=$file_row['file_org']?>" class="btn_download"></a>
									</div>
								<? } ?>
							</div>
						</div>
					</div>
					<? if($row['state'] == 1){ ?>
						<!-- 답변 영역 -->
						<div class="answer_container">
							<div class="answer__inner">
								<span class="name">이유씨엔씨 관리자</span>
								<div class="contents"><?=$row['answer']?></div>
							</div>
						</div>
						<!-- 답변 영역 -->
					<? } ?>
					<div class="btn-area between mt32">
						<a href="./online.php" class="btn btn-md white">목록</a>
						<div>
							<button type="button" onclick="go_delete()" class="btn btn-md gray">삭제</button>
							<a href="javascript:go_modify();" class="btn btn-md pink">수정</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
	<?php include $_SERVER["DOCUMENT_ROOT"] . "/kr/_inc/footer.php"; ?>
</div>
</body>
</html>
<?php

include $_SERVER["DOCUMENT_ROOT"] . "/pro_inc/include_default.php"; // 공통함수 인클루드
include $_SERVER["DOCUMENT_ROOT"] . "/en/_inc/head.php";

$keyword_type = trim(sqlfilter($_REQUEST['keyword_type']));
$keyword = trim(sqlfilter($_REQUEST['keyword']));
$pageNo = trim(sqlfilter($_REQUEST['pageNo']));
$pageScale = trim(sqlfilter($_REQUEST['pageScale']));
$idx = trim(sqlfilter($_REQUEST['idx']));

$total_param = "pageScale=$pageScale&keyword_type=$keyword_type&keyword=$keyword";

if(!$idx){
	no_error_go("./downloads.php?$total_param");
	exit;
}

$query = " SELECT * FROM download_info WHERE `idx` = '$idx' ";
$result = mysqli_query($gconnet, $query);
$row = $result->fetch_assoc();

?>

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
			<div class="downloads-dtl__inner">
				<div class="cm_title">
					<h3 class="title">Download</h3>
				</div>
				<div class="online-dtl__contents">
					<div class="dtl_container">
						<div class="title">
							<div class="title_area">
								<b>Title</b>
								<span class="tit"><?=$row['eng_subject']?></span>
							</div>
							<ul class="reg-info">
								<!-- <li><b>작성자</b><?=$row['writer']?></li> -->
								<li><b>Date</b><?=date('Y.m.d', strtotime($row['wdate']))?></li>
							</ul>
						</div>
						<div class="cnts">
							<div class="contents"><?=nl2br($row['eng_content'])?></div>
							<div class="upload_filelist mt10">
								<?
								$fnFilesize = function(int $bytes, int $decimals = 2): string{
									$size = array('B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
									$factor = floor((strlen($bytes) - 1) / 3);
									return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$size[$factor];
								};

								$file_query = " SELECT * FROM download_file_info WHERE `download_idx` = '$idx' ORDER BY `idx` ASC ";
								$file_result = mysqli_query($gconnet, $file_query);
								for($i = 0, $iMax = $file_result->num_rows; $i < $iMax; $i ++){
									$file_row = $file_result->fetch_assoc();

									$filepath = $_P_DIR_FILE . "download/{$file_row['file_chg']}";
									$filesize = filesize($filepath);

									$download_path = $_P_DIR_WEB_FILE . "download/{$file_row['file_chg']}"

									?>
									<div class="file">
										<div class="file-info">
											<b>Attached</b>
											<a href="javascript:;"><?=$file_row['file_org']?></a>
											<span class="size"><?=$fnFilesize($filesize)?></span>
										</div>
										<a href="<?=$download_path?>" download class="btn_download"></a>
									</div>
								<? } ?>
								<div class="download_all">
									<button type="button" class="btn_download" onclick="download_all()"><span>Download all</span></button>
								</div>
							</div>
						</div>
					</div>
					<div class="btn-area center mt32">
						<?
						$prev_query = " SELECT idx FROM download_info WHERE `idx` < $idx ORDER BY `idx` DESC LIMIT 1 ";
						$prev_result = mysqli_query($gconnet, $prev_query);
						if($prev_result->num_rows){
							$prev_idx = $prev_result->fetch_assoc()['idx'];
							?>
							<a href="./downloads_dtl.php?<?=$total_param?>&idx=<?=$prev_idx?>" class="btn btn-md gray">Prev</a>
						<? } ?>
						<a href="./downloads.php?<?=$total_param?>" class="btn btn-md white">List</a>
						<?
						$next_query = " SELECT idx FROM download_info WHERE `idx` > $idx ORDER BY `idx` ASC LIMIT 1 ";
						$next_result = mysqli_query($gconnet, $prev_query);
						if($next_result->num_rows){
							$next_idx = $next_result->fetch_assoc()['idx'];
							?>
							<a href="./downloads_dtl.php?<?=$total_param?>&idx=<?=$next_idx?>" class="btn btn-md pink">Next</a>
						<? } ?>
					</div>

					<script>
                        function download_all(){
                            document.querySelectorAll('.btn_download.file').forEach((element) => element.click())
                        }
					</script>
				</div>
			</div>
		</div>
	</main>
	<?php include $_SERVER["DOCUMENT_ROOT"] . "/en/_inc/footer.php"; ?>
</div>
</body>
</html>
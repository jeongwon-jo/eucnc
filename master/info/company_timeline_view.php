<?php

include $_SERVER["DOCUMENT_ROOT"] . "/pro_inc/include_default.php"; // 공통함수 인클루드
include $_SERVER["DOCUMENT_ROOT"] . "/pro_inc/include_htmlheader_admin.php"; // 관리자페이지 헤더
include $_SERVER["DOCUMENT_ROOT"] . "/master/include/check_login.php"; // 관리자 로그인여부 확인

$bmenu = trim(sqlfilter($_REQUEST['bmenu']));
$smenu = trim(sqlfilter($_REQUEST['smenu']));
$pageNo = trim(sqlfilter($_REQUEST['pageNo']));
$pageScale = trim(sqlfilter($_REQUEST['pageScale']));
$idx = trim(sqlfilter($_REQUEST['idx']));
if(!$idx){
	error_back("접근 불가능한 페이지입니다.");
	exit;
}

$total_param = "bmenu=$bmenu&smenu=$smenu&pageScale=$pageScale&pageNo=$pageNo";

$query = " SELECT * FROM company_timeline_list WHERE `idx` = '$idx' ";
$result = mysqli_query($gconnet, $query);
$row = $result->fetch_assoc();

//$board_width = 800;
//$board_height = 800;

?>
<body>
	<div id="wrap" class="skin_type01">
		<? include $_SERVER["DOCUMENT_ROOT"] . "/master/include/admin_top.php"; // 상단메뉴?>
		<div class="sub_wrap">
			<? include $_SERVER["DOCUMENT_ROOT"] . "/master/include/info_left.php"; // 좌측메뉴?>
			<!-- content 시작 -->
			<div class="container clearfix">
				<div class="content">
					<div class="navi">
						<ul class="clearfix">
							<li>HOME</li>
							<li>회사소개 관리</li>
							<li>사업연혁 관리</li>
						</ul>
					</div>
					<div class="list_tit">
						<h3><?=$row['year']?> 사업연혁 관리</h3>
					</div>

					<div class="write">
						<?
						$sub_query = " SELECT * FROM company_timeline_info WHERE `timeline_idx` = '{$row['idx']}' ORDER BY `month` DESC ";
						$sub_result = mysqli_query($gconnet, $sub_query);

						for($i = 0, $iMax = $sub_result->num_rows; $i < $iMax; $i++){
							$sub_row = $sub_result->fetch_assoc();
							?>

							<form name="v<?=$i?>_frm" method="post" action="./company_timeline_view_action.php" target="_fra_admin">
								<input type="hidden" name="total_param" value="<?=$total_param?>">
								<input type="hidden" name="idx" value="<?=$sub_row['idx']?>">

								<p class="tit"><?=$sub_row['month']?>월 <a href="javascript:v<?=$i?>_frm.submit()" class="btn_green">수정하기</a></p>

								<table>
									<colgroup>
										<col style="width:15%">
										<col style="width:35%">
										<col style="width:15%">
										<col style="width:35%">
									</colgroup>

									<tr>
										<th scope="row">한글</th>
										<td colspan="3">
											<input type="text" name="content_kor" style="width:100%" value="<?=$sub_row['content_kor']?>">
										</td>
									</tr>

									<tr>
										<th scope="row">영문</th>
										<td colspan="3">
											<input type="text" name="content_eng" style="width:100%" value="<?=$sub_row['content_eng']?>">
										</td>
									</tr>
								</table>
							</form>

						<? } ?>

					</div>
					<!-- content 종료 -->
				</div>
			</div>

			<? include $_SERVER["DOCUMENT_ROOT"] . "/pro_inc/include_bottom_admin_tail.php"; ?>
</body>
</html>

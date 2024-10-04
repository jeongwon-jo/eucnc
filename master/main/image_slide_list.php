<?php

include $_SERVER["DOCUMENT_ROOT"] . "/pro_inc/include_default.php"; // 공통함수 인클루드
include $_SERVER["DOCUMENT_ROOT"] . "/pro_inc/include_htmlheader_admin.php"; // 관리자페이지 헤더
include $_SERVER["DOCUMENT_ROOT"] . "/master/include/check_login.php"; // 관리자 로그인여부 확인

$bmenu = trim(sqlfilter($_REQUEST['bmenu']));
$smenu = trim(sqlfilter($_REQUEST['smenu']));

$total_param = "bmenu=$bmenu&smenu=$smenu";

$query = " SELECT * FROM image_slide_info ORDER BY `idx` ASC ";
$result = mysqli_query($gconnet, $query);

$board_width = 800;
$board_height = 800;

?>
<body>
	<div id="wrap" class="skin_type01">
		<? include $_SERVER["DOCUMENT_ROOT"] . "/master/include/admin_top.php"; // 상단메뉴?>
		<div class="sub_wrap">
			<? include $_SERVER["DOCUMENT_ROOT"] . "/master/include/main_left.php"; // 좌측메뉴?>
			<!-- content 시작 -->
			<div class="container clearfix">
				<div class="content">
					<div class="navi">
						<ul class="clearfix">
							<li>HOME</li>
							<li>메인페이지 관리</li>
							<li>이미지 슬라이드</li>
						</ul>
					</div>
					<div class="list_tit">
						<h3>이미지 슬라이드</h3>
					</div>

					<form action="./image_slide_write_action.php" method="post" enctype="multipart/form-data" name="frm" target="_fra_admin" id="frm">
						<input type="hidden" name="total_param" value="<?=$total_param?>">

						<div class="write">
							<?
							for($i = 0, $iMax = $result->num_rows; $i < $iMax; $i++){
								$row = $result->fetch_array();
								$idx = $row['idx'];
								?>

								<p class="tit"><?=($i + 1) . " 이미지 슬라이드 등록"?></p>

								<table>
									<colgroup>
										<col style="width:15%">
										<col style="width:35%">
										<col style="width:15%">
										<col style="width:35%">
									</colgroup>

									<tr>
										<th scope="row">이미지</th>
										<td colspan="3">
											<input type="file" style="width: 20%" accept="image/*" name="<?=$idx?>/file">&nbsp;(현재: <?=$row['file_org']?>)
										</td>
									</tr>

									<tr>
										<th scope="row">한글텍스트1</th>
										<td colspan="3">
											<input type="text" style="width: 60%" name="<?=$idx?>/kor_txt_1" value="<?=$row['kor_txt_1']?>" maxlength="25">
										</td>
									</tr>

									<tr>
										<th scope="row">한글텍스트2</th>
										<td colspan="3">
											<input type="text" style="width: 60%" name="<?=$idx?>/kor_txt_2_1" value="<?=$row['kor_txt_2_1']?>" maxlength="25"><br>
											<input type="text" style="width: 60%" name="<?=$idx?>/kor_txt_2_2" value="<?=$row['kor_txt_2_2']?>" maxlength="25">
										</td>
									</tr>

									<tr>
										<th scope="row">영문텍스트1</th>
										<td colspan="3">
											<input type="text" style="width: 60%" name="<?=$idx?>/eng_txt_1" value="<?=$row['eng_txt_1']?>" maxlength="25">
										</td>
									</tr>

									<tr>
										<th scope="row">영문텍스트2</th>
										<td colspan="3">
											<input type="text" style="width: 60%" name="<?=$idx?>/eng_txt_2_1" value="<?=$row['eng_txt_2_1']?>" maxlength="40"><br>
											<input type="text" style="width: 60%" name="<?=$idx?>/eng_txt_2_2" value="<?=$row['eng_txt_2_2']?>" maxlength="40">
										</td>
									</tr>

								</table>

							<? } ?>
							<div class="write_btn align_r">
								<a href="javascript:frm.submit();" class="btn_green">저장</a>
							</div>
						</div>
					</form>
					<!-- content 종료 -->
				</div>
			</div>

			<? include $_SERVER["DOCUMENT_ROOT"] . "/pro_inc/include_bottom_admin_tail.php"; ?>
</body>
</html>

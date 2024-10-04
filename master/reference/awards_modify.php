<?php

include $_SERVER["DOCUMENT_ROOT"]."/pro_inc/include_default.php"; // 공통함수 인클루드
include $_SERVER["DOCUMENT_ROOT"]."/pro_inc/include_htmlheader_admin.php"; // 관리자페이지 헤더
include $_SERVER["DOCUMENT_ROOT"]."/master/include/check_login.php"; // 관리자 로그인여부 확인

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

$query = " SELECT * FROM awards_info WHERE `idx` = '$idx' ";
$result = mysqli_query($gconnet, $query);
$row = mysqli_fetch_array($result);

?>
<script>
    function go_list(){
        location.href = "./awards_list.php?<?=$total_param?>"
    }
</script>
<body>
	<div id="wrap" class="skin_type01">
		<? include $_SERVER["DOCUMENT_ROOT"]."/master/include/admin_top.php"; // 상단메뉴?>
		<div class="sub_wrap">
			<? include $_SERVER["DOCUMENT_ROOT"]."/master/include/reference_left.php"; // 좌측메뉴?>
			<!-- content 시작 -->
			<div class="container clearfix">
				<div class="content">
					<div class="navi">
						<ul class="clearfix">
							<li>HOME</li>
							<li>기업소식 관리</li>
							<li>수상내역</li>
						</ul>
					</div>
					<div class="list_tit">
						<h3>수상내역 수정</h3>
					</div>
					<form action="./awards_modify_action.php" method="post" enctype="multipart/form-data" name="frm" target="_fra_admin" id="frm">
						<input type="hidden" name="total_param" value="<?=$total_param?>">
						<input type="hidden" name="idx" value="<?=$idx?>">
						<div class="write">
							<table>
								<colgroup>
									<col style="width:15%">
									<col style="width:35%">
									<col style="width:15%">
									<col style="width:35%">
								</colgroup>

								<tr>
									<th scope="row">설명(국문)</th>
									<td colspan="3">
										<input type="text" style="width:100%;" name="kor" required="true" message="설명(국문)" value="<?=$row['kor']?>">
									</td>
								</tr>

								<tr>
									<th scope="row">설명(영문)</th>
									<td colspan="3">
										<input type="text" style="width:100%;" name="eng" required="true" message="설명(영문)" value="<?=$row['eng']?>">
									</td>
								</tr>

								<tr>
									<th scope="row">이미지</th>
									<td colspan="3">
										<input type="file" name="file" accept="image/*">
										<br>
										(현재 등록한 파일: <?=$row['file_org']?>)
									</td>
								</tr>

							</table>

							<ul class="list_tab" style="height:20px;"></ul>

							<div class="write_btn align_r">
								<a href="javascript:frm.submit();" class="btn_blue">수정</a>
								<a href="javascript:go_list();" class="btn_gray">취소</a>
							</div>

						</div>
					</form>
					<!-- content 종료 -->
				</div>
			</div>

			<? include $_SERVER["DOCUMENT_ROOT"] . "/pro_inc/include_bottom_admin_tail.php"; ?>
</body>
</html>

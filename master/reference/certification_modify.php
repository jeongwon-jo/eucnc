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

$query = " SELECT * FROM certification_info WHERE `idx` = '$idx' ";
$result = mysqli_query($gconnet, $query);
$row = mysqli_fetch_array($result);

?>
<script>
    function go_list(){
        location.href = "./certification_list.php?<?=$total_param?>"
    }

    function go_submit() {
        const check = chkFrm('frm');
        if (check) {
            frm.submit();
        } else {
            false;
        }
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
							<li>인증서</li>
						</ul>
					</div>
					<div class="list_tit">
						<h3>인증서 수정</h3>
					</div>
					<form action="./certification_modify_action.php" method="post" enctype="multipart/form-data" name="frm" target="_fra_admin" id="frm">
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
									<th scope="row">제목(한글)</th>
									<td colspan="3">
										<input type="text" style="width:100%;" name="kor_subject_1" value="<?=$row['kor_subject_1']?>" required="yes" message="제목(한글)"><br>
										<input type="text" style="width:100%;" name="kor_subject_2" value="<?=$row['kor_subject_2']?>">
									</td>
								</tr>

								<tr>
									<th scope="row">제목(영문)</th>
									<td colspan="3">
										<input type="text" style="width:100%;" name="eng_subject_1" value="<?=$row['eng_subject_1']?>" required="yes" message="제목(영문)"><br>
										<input type="text" style="width:100%;" name="eng_subject_2" value="<?=$row['eng_subject_2']?>">
									</td>
								</tr>

								<tr>
									<th scope="row">설명(국문)</th>
									<td colspan="3">
										<input type="text" style="width:100%;" name="kor_desc_1" value="<?=$row['kor_desc_1']?>" message="설명(국문)"><br>
										<input type="text" style="width:100%;" name="kor_desc_2" value="<?=$row['kor_desc_2']?>">
									</td>
								</tr>

								<tr>
									<th scope="row">설명(영문)</th>
									<td colspan="3">
										<input type="text" style="width:100%;" name="eng_desc_1" value="<?=$row['eng_desc_1']?>" message="설명(영문)"><br>
										<input type="text" style="width:100%;" name="eng_desc_2" value="<?=$row['eng_desc_2']?>">
									</td>
								</tr>

								<tr>
									<th scope="row">이미지</th>
									<td colspan="3">
										<input type="file" style="width:20%;" name="file" message="이미지"><br>
										<font color="red">⁕ 변경할 경우에만 첨부해주세요.</font>
									</td>
								</tr>

							</table>

							<ul class="list_tab" style="height:20px;"></ul>

							<div class="write_btn align_r">
								<a href="javascript:go_submit();" class="btn_blue">수정</a>
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

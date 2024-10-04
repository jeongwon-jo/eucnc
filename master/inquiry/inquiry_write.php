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

$query = " SELECT * FROM inquiry_info WHERE `idx` = '$idx' ";
$result = mysqli_query($gconnet, $query);
$row = mysqli_fetch_array($result);

//$board_width = 800;
//$board_height = 800;

?>
<script>
    function go_list(){
        location.href = "./inquiry_list.php?<?=$total_param?>"
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
							<li>고객센터 관리</li>
							<li>온라인 문의</li>
						</ul>
					</div>
					<div class="list_tit">
						<h3>문의 답변</h3>
					</div>
					<form action="./inquiry_write_action.php" method="post" enctype="multipart/form-data" name="frm" target="_fra_admin" id="frm">
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
									<th scope="row">제목</th>
									<td colspan="3">
										<input type="text" style="width:100%;" name="subject" value="<?=$row['subject']?>" required="yes" message="제목"><br>
									</td>
								</tr>

								<tr>
									<th scope="row">작성자</th>
									<td colspan="3">
										<input type="text" style="width:100%;" name="writer" value="<?=$row['writer']?>" required="yes" message="작성자"><br>
									</td>
								</tr>

								<tr>
									<th scope="row">내용</th>
									<td colspan="3">
										<textarea style="width:100%;height:100%;" name="content" id="editor1"><?=$row['content']?></textarea>
									</td>
								</tr>

								<tr>
									<th scope="row">답변</th>
									<td colspan="3">
										<textarea style="width:100%;height:100%;" name="answer" id="editor2"></textarea>
									</td>
								</tr>

								<tr>
									<th scope="row">파일</th>
									<td colspan="3">
										<input type="file" style="width:20%;" name="file" message="파일"><br>
									</td>
								</tr>

							</table>

							<ul class="list_tab" style="height:20px;"></ul>

							<div class="write_btn align_r">
								<a href="javascript:go_submit();" class="btn_blue">등록</a>
								<a href="javascript:go_list();" class="btn_gray">취소</a>
							</div>

						</div>
					</form>
					<!-- content 종료 -->
				</div>
			</div>

			<script type="text/javascript" src="/smarteditor2/js/HuskyEZCreator.js" charset="utf-8"></script>
			<script type="text/javascript">
                const oEditors = [];
                nhn.husky.EZCreator.createInIFrame({
                    oAppRef: oEditors,
                    elPlaceHolder: "editor1",
                    sSkinURI: "/smarteditor2/SmartEditor2Skin.html",
                    htParams: {
                        bUseToolbar: true,
                        fOnBeforeUnload: function () {}
                    },
                    fOnAppLoad: function () {},
                    fCreator: "createSEditor2"
                });
                nhn.husky.EZCreator.createInIFrame({
                    oAppRef: oEditors,
                    elPlaceHolder: "editor2",
                    sSkinURI: "/smarteditor2/SmartEditor2Skin.html",
                    htParams: {
                        bUseToolbar: true,
                        fOnBeforeUnload: function () {}
                    },
                    fOnAppLoad: function () {},
                    fCreator: "createSEditor2"
                });

                function go_submit() {
                    const check = chkFrm('frm');
                    if (check) {
                        oEditors.getById["editor1"].exec("UPDATE_CONTENTS_FIELD", []);
                        oEditors.getById["editor2"].exec("UPDATE_CONTENTS_FIELD", []);
                        frm.submit();
                    } else {
                        false;
                    }
                }
			</script>
			<? include $_SERVER["DOCUMENT_ROOT"] . "/pro_inc/include_bottom_admin_tail.php"; ?>
</body>
</html>

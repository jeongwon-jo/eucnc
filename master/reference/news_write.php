<?php

include $_SERVER["DOCUMENT_ROOT"]."/pro_inc/include_default.php"; // 공통함수 인클루드
include $_SERVER["DOCUMENT_ROOT"]."/pro_inc/include_htmlheader_admin.php"; // 관리자페이지 헤더
include $_SERVER["DOCUMENT_ROOT"]."/master/include/check_login.php"; // 관리자 로그인여부 확인

$bmenu = trim(sqlfilter($_REQUEST['bmenu']));
$smenu = trim(sqlfilter($_REQUEST['smenu']));
$pageNo = trim(sqlfilter($_REQUEST['pageNo']));
$pageScale = trim(sqlfilter($_REQUEST['pageScale']));

$total_param = "bmenu=$bmenu&smenu=$smenu&pageScale=$pageScale&pageNo=$pageNo";

//$board_width = 800;
//$board_height = 800;

?>
<script>
    function go_list(){
        location.href = "./news_list.php?<?=$total_param?>"
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
							<li>기사 자료</li>
						</ul>
					</div>
					<div class="list_tit">
						<h3>기사 자료 등록</h3>
					</div>
					<form action="./news_write_action.php" method="post" enctype="multipart/form-data" name="frm" target="_fra_admin" id="frm">
						<input type="hidden" name="total_param" value="<?=$total_param?>">
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
										<input type="text" style="width:100%;" name="subject" required="true" message="제목">
									</td>
								</tr>

								<tr>
									<th scope="row">내용</th>
									<td colspan="3">
										<textarea style="width:100%;height:100%;" name="content" id="editor"></textarea>
									</td>
								</tr>

								<tr>
									<th scope="row">파일</th>
									<td colspan="3">
										<input type="file" style="width:100%;" name="file" required="true" message="파일">
									</td>
								</tr>

							</table>

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
                    elPlaceHolder: "editor",
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
                        oEditors.getById["editor"].exec("UPDATE_CONTENTS_FIELD", []);
                        frm.submit();
                    } else {
                        false;
                    }
                }
			</script>
			<? include $_SERVER["DOCUMENT_ROOT"] . "/pro_inc/include_bottom_admin_tail.php"; ?>
</body>
</html>

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

$query = " SELECT * FROM download_info WHERE `idx` = '$idx' ";
$result = mysqli_query($gconnet, $query);
$row = $result->fetch_assoc();

//$board_width = 800;
//$board_height = 800;

?>
<script>
    function go_list(){
        location.href = "./download_list.php?<?=$total_param?>"
    }

    let check = 0;
    function syncCheckboxSelectAll(){
        const idxDOC = document.getElementsByName("idx[]");
        let booleanCheck;

        check = check ? 0 : 1;
        booleanCheck = check;
        for (let i = 0; i < idxDOC.length; i ++) {
            idxDOC[i].checked = booleanCheck;
        }
    }

    function getSelectedCheckboxIds(){
        let checkIdsMap = {}
        const chk = document.getElementsByName("idx[]");
        for (let i = 0; i < chk.length; i++) {
            if(chk[i].checked){
                checkIdsMap[i] = chk[i].value
            }
        }
        return checkIdsMap;
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
							<li>다운로드</li>
						</ul>
					</div>
					<div class="list_tit">
						<h3>다운로드 게시글 수정</h3>
					</div>
					<form action="./download_modify_action.php" method="post" enctype="multipart/form-data" name="frm" target="_fra_admin" id="frm">
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
									<th scope="row">제목(국문)</th>
									<td colspan="3">
										<input type="text" style="width:100%;" name="kor_subject" value="<?=$row['kor_subject']?>">
									</td>
								</tr>

								<tr>
									<th scope="row">제목(영문)</th>
									<td colspan="3">
										<input type="text" style="width:100%;" name="eng_subject" value="<?=$row['eng_subject']?>">
									</td>
								</tr>

								<tr>
									<th scope="row">내용(국문)</th>
									<td colspan="3">
										<textarea name="kor_content" id="editor1"><?=nl2br($row['kor_content'])?></textarea>
									</td>
								</tr>

								<tr>
									<th scope="row">내용(영문)</th>
									<td colspan="3">
										<textarea name="eng_content" id="editor2"><?=nl2br($row['eng_content'])?></textarea>
									</td>
								</tr>

								<tr>
									<th scope="row">이미지</th>
									<td colspan="3">
										<input type="file" name="file[]" id="file_uploader" multiple>
										<div id="upload_files">
											현재 업로드된 파일(0): 없음
										</div>
										<font color="red">※ 파일 업로드시 기존 파일들은 모두 삭제됩니다.</font>
									</td>
								</tr>

							</table>

							<div class="write_btn align_r">
								<a href="javascript:go_submit();" class="btn_blue">수정</a>
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

                file_uploader.addEventListener('change', function (event){
                    let files = event.target.files
                    if(files.length !== 0){
                        // let axis = Math.min(files.length, 3)
                        let axis = files.length
                        let textFormat = `현재 업로드된 파일(${axis}): `
                        let warning_state = false
                        for (let i = 0; i < axis; i ++) {
                            let file = files[i]
                            if(i > 2){
                                if(!warning_state){
                                    warning_state = true
                                }
                                textFormat += `<font color="red">${file.name}</font>`
                            }else{
                                textFormat += `${file.name}`
                            }

                            if(i !== (axis - 1)){
                                textFormat += ', '
                            }
                        }
                        if(warning_state){
                            textFormat += '<br><font color="#cd5c5c">※ 파일은 최대 3개 까지만 업로드 가능합니다!</font>'
                        }
                        upload_files.innerHTML = textFormat
                    }else{
                        upload_files.innerHTML = '현재 업로드된 파일(0): 없음'
                    }
                })
			</script>
			<? include $_SERVER["DOCUMENT_ROOT"] . "/pro_inc/include_bottom_admin_tail.php"; ?>
</body>
</html>

<?php

include $_SERVER["DOCUMENT_ROOT"]."/pro_inc/include_default.php"; // 공통함수 인클루드
include $_SERVER["DOCUMENT_ROOT"]."/pro_inc/include_htmlheader_admin.php"; // 관리자페이지 헤더
include $_SERVER["DOCUMENT_ROOT"]."/master/include/check_login.php"; // 관리자 로그인여부 확인

$total_param = trim(sqlfilter($_REQUEST['total_param']));
$idx = trim(sqlfilter($_REQUEST['idx']));
$subject = trim(sqlfilter($_REQUEST['subject']));
$writer = trim(sqlfilter($_REQUEST['writer']));
$content = trim(sqlfilter($_REQUEST['content']));
$answer = trim(sqlfilter($_REQUEST['answer']));

$query = " UPDATE inquiry_info SET ";
if(isset($_FILES['file']) && $_FILES['file']['size'] > 0){
	$bbs_code = "inquiry";
	$_P_DIR_FILE = $_P_DIR_FILE.$bbs_code."/";
	$_P_DIR_WEB_FILE = $_P_DIR_WEB_FILE.$bbs_code."/";

	$file_org = $_FILES['file']['name'];
	$file_chg = uploadFile($_FILES, 'file', $_FILES['file'],$_P_DIR_FILE );

	$query .= " `file_org_q` = '$file_org', ";
	$query .= " `file_chg_q` = '$file_chg', ";
}

$query .= " `subject` = '$subject', ";
$query .= " `content` = '$content', ";
$query .= " `answer` = '$answer', ";
$query .= " `writer` = '$writer', ";
$query .= " `state` = '1' ";
$query .= " WHERE `idx` = '$idx' ";
$result = mysqli_query($gconnet, $query);
if($result){
	error_frame_go("온라인 문의 답변을 정상적으로 등록했습니다.", "./inquiry_list.php?$total_param");
}else{
	error_frame("온라인 문의 답변 등록 작업 도중에 알 수 없는 오류가 발생했습니다.");
}
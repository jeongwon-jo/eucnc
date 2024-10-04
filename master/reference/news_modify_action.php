<?php

include $_SERVER["DOCUMENT_ROOT"]."/pro_inc/include_default.php"; // 공통함수 인클루드
include $_SERVER["DOCUMENT_ROOT"]."/pro_inc/include_htmlheader_admin.php"; // 관리자페이지 헤더
include $_SERVER["DOCUMENT_ROOT"]."/master/include/check_login.php"; // 관리자 로그인여부 확인

$total_param = trim(sqlfilter($_REQUEST['total_param']));
$idx = trim(sqlfilter($_REQUEST['idx']));
$subject = trim(sqlfilter($_REQUEST['subject']));
$content = trim(sqlfilter($_REQUEST['content']));

$query = " UPDATE news_info SET ";
$query .= " `subject` = '$subject', ";
$query .= " `content` = '$content', ";
if(isset($_FILES['file']) && $_FILES['file']['size'] > 0){
	$bbs_code = "news";
	$_P_DIR_FILE = $_P_DIR_FILE.$bbs_code."/";
	$_P_DIR_WEB_FILE = $_P_DIR_WEB_FILE.$bbs_code."/";

	$file_org = $_FILES['file']['name'];
	$file_chg = uploadFile($_FILES, 'file', $_FILES['file'], $_P_DIR_FILE);

	$query .= " `file_org` = '$file_org', ";
	$query .= " `file_chg` = '$file_chg', ";
}
$query .= " `wdate` = NOW() ";
$query .= " WHERE `idx` = '$idx' ";
$result = mysqli_query($gconnet, $query);
if($result){
	error_frame_go("기사 자료 데이터 수정 작업을 정상적으로 완료했습니다.", "./news_list.php?$total_param");
}else{
	error_frame("기사 자료 데이터 수정 작업 도중에 알 수 없는 오류가 발생했습니다.");
}
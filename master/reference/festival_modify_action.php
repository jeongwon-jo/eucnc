<?php

include $_SERVER["DOCUMENT_ROOT"]."/pro_inc/include_default.php"; // 공통함수 인클루드
include $_SERVER["DOCUMENT_ROOT"]."/pro_inc/include_htmlheader_admin.php"; // 관리자페이지 헤더
include $_SERVER["DOCUMENT_ROOT"]."/master/include/check_login.php"; // 관리자 로그인여부 확인

$total_param = trim(sqlfilter($_REQUEST['total_param']));
$idx = trim(sqlfilter($_REQUEST['idx']));
$kor_subject = trim(sqlfilter($_REQUEST['kor_subject']));
$eng_subject = trim(sqlfilter($_REQUEST['eng_subject']));
$kor_content = trim(sqlfilter($_REQUEST['kor_content']));
$eng_content = trim(sqlfilter($_REQUEST['eng_content']));

if(!$kor_subject){
	error_frame("제목(국문)을 작성해주세요.");
	exit;
}

if(!$eng_subject){
	error_frame("제목(영문)을 작성해주세요.");
	exit;
}

if(!$kor_content){
	error_frame("내용(국문)을 작성해주세요.");
	exit;
}

if(!$eng_content){
	error_frame("내용(영문)을 작성해주세요.");
	exit;
}

$bbs_code = "festival";
$_P_DIR_FILE = $_P_DIR_FILE.$bbs_code."/";
$_P_DIR_WEB_FILE = $_P_DIR_WEB_FILE.$bbs_code."/";

$file_org = $_FILES['file']['name'];
$file_chg = uploadFile($_FILES, 'file', $_FILES['file'], $_P_DIR_FILE);

$next_priority_query = " SELECT MAX(priority) + 1 AS priority FROM festival_info ";
$next_priority_result = mysqli_query($gconnet, $next_priority_query);
$priority = $next_priority_result->fetch_assoc()['priority'];

$query = " UPDATE festival_info SET ";
if(isset($_FILES['file']) && $_FILES['file']['size'] > 0){
	$query .= " `file_org` = '$file_org', ";
	$query .= " `file_chg` = '$file_chg', ";
}
$query .= " `kor_subject` = '$kor_subject', ";
$query .= " `eng_subject` = '$eng_subject', ";
$query .= " `kor_content` = '$kor_content', ";
$query .= " `eng_content` = '$eng_content' ";
$query .= " WHERE `idx` = '$idx' ";
$result = mysqli_query($gconnet, $query);

if($result){
	error_frame_go("기업행사 데이터 수정 작업을 정상적으로 완료했습니다.", "./festival_list.php?$total_param");
}else{
	error_frame("기업행사 데이터 수정 작업 도중에 알 수 없는 오류가 발생했습니다.");
}
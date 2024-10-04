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
	error_frame("제목(한글)을 작성해주세요.");
	exit;
}

if(!$eng_subject){
	error_frame("제목(영문)을 작성해주세요.");
	exit;
}

if(!$kor_content){
	error_frame("내용(한글)을 작성해주세요.");
	exit;
}

if(!$eng_content){
	error_frame("내용(영문)을 작성해주세요.");
	exit;
}

$pressedQueries = [];

$query = " UPDATE download_info SET ";
$query .= " `kor_subject` = '$kor_subject', ";
$query .= " `eng_subject` = '$eng_subject', ";
$query .= " `kor_content` = '$kor_content', ";
$query .= " `eng_content` = '$eng_content' ";
$query .= " WHERE `idx` = '$idx' ";
$pressedQueries[] = $query;

$file_cnt = count($_FILES['file']['name']);
if($_FILES['file']['size'][0] && $file_cnt > 0){
	$pressedQueries[] = " DELETE FROM download_file_info WHERE `download_idx` = '$idx' ";

	$bbs_code = "download";
	$_P_DIR_FILE = $_P_DIR_FILE.$bbs_code."/";
	$_P_DIR_WEB_FILE = $_P_DIR_WEB_FILE.$bbs_code."/";

	for($i = 0, $iMax = min(3, $file_cnt); $i < $iMax; $i ++){
		$file_org = $_FILES['file']['name'][$i];
		$file_chg = uploadMultiFile('file', $_P_DIR_FILE, $i);

		$query = " INSERT INTO download_file_info SET ";
		$query .= " `download_idx` = '$idx', ";
		$query .= " `file_org` = '$file_org', ";
		$query .= " `file_chg` = '$file_chg' ";

		$pressedQueries[] = $query;
	}
}

$result = mysqli_multi_query($gconnet, implode('; ', $pressedQueries));
if($result){
	error_frame_go("다운로드 게시글 수정 작업이 정상적으로 완료되었습니다.", "./download_list.php?$total_param");
}else{
	error_frame("다운로드 게시글 수정 작업 도중에 알 수 없는 오류가 발생했습니다.");
}
<?php

include $_SERVER["DOCUMENT_ROOT"]."/pro_inc/include_default.php"; // 공통함수 인클루드
include $_SERVER["DOCUMENT_ROOT"]."/pro_inc/include_htmlheader_admin.php"; // 관리자페이지 헤더
include $_SERVER["DOCUMENT_ROOT"]."/master/include/check_login.php"; // 관리자 로그인여부 확인

$total_param = trim(sqlfilter($_REQUEST['total_param']));
$type = trim(sqlfilter($_REQUEST['type']));

if(!isset($_FILES['kor_file']) || $_FILES['kor_file']['size'] <= 0){
	error_frame("국문 페이지 이미지를 업로드 해주세요.");
	exit;
}

if(!isset($_FILES['eng_file']) || $_FILES['eng_file']['size'] <= 0){
	error_frame("영문 페이지 이미지를 업로드 해주세요.");
	exit;
}

$bbs_code = "item_promt";
$_P_DIR_FILE = $_P_DIR_FILE.$bbs_code."/";
$_P_DIR_WEB_FILE = $_P_DIR_WEB_FILE.$bbs_code."/";

$kor_file_org = $_FILES['kor_file']['name'];
$kor_file_chg = uploadFile($_FILES, 'kor_file', $_FILES['kor_file'], $_P_DIR_FILE);

$eng_file_org = $_FILES['eng_file']['name'];
$eng_file_chg = uploadFile($_FILES, 'eng_file', $_FILES['eng_file'], $_P_DIR_FILE);

$next_priority_query = " SELECT COALESCE(MAX(priority), 0) + 1 AS priority FROM item_promt_info WHERE `type` = '$type' ";
$next_priority_result = mysqli_query($gconnet, $next_priority_query);
$priority = $next_priority_result->fetch_assoc()['priority'];

$query = " INSERT INTO item_promt_info SET ";
$query .= " `type` = '$type', ";
$query .= " `kor_img_org` = '$kor_file_org', ";
$query .= " `kor_img_chg` = '$kor_file_chg', ";
$query .= " `eng_img_org` = '$eng_file_org', ";
$query .= " `eng_img_chg` = '$eng_file_chg', ";
$query .= " `priority` = '1', ";
$query .= " `wdate` = NOW() ";
$result = mysqli_query($gconnet, $query);
if($result){
	$idx = $gconnet->insert_id;

	$pressedQueries = [];
	$query = " SELECT * FROM item_promt_info WHERE `idx` != '$idx' AND `type` = '$type' ORDER BY `priority` DESC ";
	$result = mysqli_query($gconnet, $query);
	for($i = 0, $iMax = $result->num_rows; $i < $iMax; $i ++){
		$row = $result->fetch_assoc();
		$rematch_priority = $row['priority'] + 1;

		$pressedQueries[] = " UPDATE item_promt_info SET `priority` = '$rematch_priority' WHERE `idx` = '" . $row['idx'] . "' ";
	}
	if(count($pressedQueries) > 0){
		$result = mysqli_multi_query($gconnet, implode('; ', $pressedQueries));
	}

	error_frame_reload("제품소개 데이터 등록 작업이 정상적으로 완료되었습니다.");
}else{
	error_frame("제품소개 데이터 등록 작업 도중에 알 수 없는 오류가 발생했습니다.");
}
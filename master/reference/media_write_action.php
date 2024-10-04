<?php

include $_SERVER["DOCUMENT_ROOT"]."/pro_inc/include_default.php"; // 공통함수 인클루드
include $_SERVER["DOCUMENT_ROOT"]."/pro_inc/include_htmlheader_admin.php"; // 관리자페이지 헤더
include $_SERVER["DOCUMENT_ROOT"]."/master/include/check_login.php"; // 관리자 로그인여부 확인

$total_param = trim(sqlfilter($_REQUEST['total_param']));
$wdate = trim(sqlfilter($_REQUEST['wdate']));
$kor_subject_1 = trim(sqlfilter($_REQUEST['kor_subject_1']));
$kor_subject_2 = trim(sqlfilter($_REQUEST['kor_subject_2']));
$eng_subject_1 = trim(sqlfilter($_REQUEST['eng_subject_1']));
$eng_subject_2 = trim(sqlfilter($_REQUEST['eng_subject_2']));
$link = trim(sqlfilter($_REQUEST['link']));

$next_priority_query = " SELECT MAX(priority) + 1 AS priority FROM media_info ";
$next_priority_result = mysqli_query($gconnet, $next_priority_query);
$priority = $next_priority_result->fetch_assoc()['priority'];

$query = " INSERT INTO media_info SET ";
$query .= " `kor_subject_1` = '$kor_subject_1', ";
$query .= " `kor_subject_2` = '$kor_subject_2', ";
$query .= " `eng_subject_1` = '$eng_subject_1', ";
$query .= " `eng_subject_2` = '$eng_subject_2', ";
$query .= " `link` = '$link', ";
$query .= " `priority` = '1', ";
$query .= " `wdate` = '$wdate' ";
$result = mysqli_query($gconnet, $query);
if($result){
	$idx = $gconnet->insert_id;

	$pressedQueries = [];
	//rematched priority dataList
	$query = " SELECT * FROM media_info WHERE `idx` != '$idx' ORDER BY `priority` ASC ";
	$result = mysqli_query($gconnet, $query);
	for($i = 0, $iMax = $result->num_rows; $i < $iMax; $i ++){
		$row = $result->fetch_assoc();
		$rematch_priority = $row['priority'] + 1;

		$pressedQueries[] = " UPDATE media_info SET `priority` = '$rematch_priority' WHERE `idx` = '{$row['idx']}' ";
	}
	if(count($pressedQueries) > 0){
		$result = mysqli_multi_query($gconnet, implode('; ', $pressedQueries));
	}

	error_frame_go("미디어 자료 데이터 등록 작업을 정상적으로 완료했습니다.", "./media_list.php?$total_param");
}else{
	error_frame("미디어 자료 데이터 등록 작업 도중에 알 수 없는 오류가 발생했습니다.");
}
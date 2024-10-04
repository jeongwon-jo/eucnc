<?php

include $_SERVER["DOCUMENT_ROOT"]."/pro_inc/include_default.php"; // 공통함수 인클루드
include $_SERVER["DOCUMENT_ROOT"]."/pro_inc/include_htmlheader_admin.php"; // 관리자페이지 헤더
include $_SERVER["DOCUMENT_ROOT"]."/master/include/check_login.php"; // 관리자 로그인여부 확인

$total_param = trim(sqlfilter($_REQUEST['total_param']));
$idx = trim(sqlfilter($_REQUEST['idx']));
$wdate = trim(sqlfilter($_REQUEST['wdate']));
$kor_subject_1 = trim(sqlfilter($_REQUEST['kor_subject_1']));
$kor_subject_2 = trim(sqlfilter($_REQUEST['kor_subject_2']));
$eng_subject_1 = trim(sqlfilter($_REQUEST['eng_subject_1']));
$eng_subject_2 = trim(sqlfilter($_REQUEST['eng_subject_2']));
$link = trim(sqlfilter($_REQUEST['link']));

$query = " UPDATE media_info SET ";
$query .= " `kor_subject_1` = '$kor_subject_1', ";
$query .= " `kor_subject_2` = '$kor_subject_2', ";
$query .= " `eng_subject_1` = '$eng_subject_1', ";
$query .= " `eng_subject_2` = '$eng_subject_2', ";
$query .= " `link` = '$link', ";
$query .= " `wdate` = '$wdate' ";
$query .= " WHERE `idx` = '$idx' ";
$result = mysqli_query($gconnet, $query);
if($result){
	error_frame_go("미디어 자료 데이터 수정 작업을 정상적으로 완료했습니다.", "./media_list.php?$total_param");
}else{
	error_frame("미디어 자료 데이터 수정 작업 도중에 알 수 없는 오류가 발생했습니다.");
}
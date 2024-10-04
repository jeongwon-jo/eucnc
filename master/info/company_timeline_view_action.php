<?php

include $_SERVER["DOCUMENT_ROOT"]."/pro_inc/include_default.php"; // 공통함수 인클루드

$total_param = trim(sqlfilter($_REQUEST['total_param']));
$idx = trim(sqlfilter($_REQUEST['idx']));
$content_kor = trim(sqlfilter($_REQUEST['content_kor']));
$content_eng = trim(sqlfilter($_REQUEST['content_eng']));

$query = " UPDATE company_timeline_info SET ";
$query .= " `content_kor` = '$content_kor', ";
$query .= " `content_eng` = '$content_eng' ";
$query .= " WHERE `idx` = '$idx' ";
$result = mysqli_query($gconnet, $query);

if($result){
	error_frame_reload("사업연혁 정보 수정 작업이 정상적으로 완료되었습니다.");
}else{
	error_frame("사업연혁 정보 수정 작업 도중에 알 수 없는 오류가 발생했습니다.");
}
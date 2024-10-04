<?php

include $_SERVER["DOCUMENT_ROOT"] . "/pro_inc/include_default.php"; // 공통함수 인클루드

$idx = trim(sqlfilter($_REQUEST['idx']));

$query = " DELETE FROM inquiry_info WHERE `idx` = '$idx' ";
$result = mysqli_query($gconnet, $query);
if($result){
	error_frame_go("문의를 삭제했습니다.", "./online.php");
}else{
	error_frame("문의 삭제 작업 도중에 알 수 없는 오류가 발생했습니다.");
}
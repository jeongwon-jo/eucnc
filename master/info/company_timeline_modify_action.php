<?php

include $_SERVER["DOCUMENT_ROOT"]."/pro_inc/include_default.php"; // 공통함수 인클루드

$total_param = trim(sqlfilter($_REQUEST['total_param']));
$idx = trim(sqlfilter($_REQUEST['idx']));

if(!isset($_FILES['file']) || $_FILES['file']['size'] <= 0){
	error_frame("이미지 파일을 업로드해주세요.");
	exit;
}

$bbs_code = "timeline";
$_P_DIR_FILE = $_P_DIR_FILE.$bbs_code."/";
$_P_DIR_WEB_FILE = $_P_DIR_WEB_FILE.$bbs_code."/";

$file_org = $_FILES['file']['name'];
$file_chg = uploadFile($_FILES, 'file', $_FILES['file'],$_P_DIR_FILE );

$query = " UPDATE company_timeline_list SET ";
$query .= " `file_org` = '$file_org', ";
$query .= " `file_chg` = '$file_chg' ";
$query .= " WHERE `idx` = '$idx' ";
$result = mysqli_query($gconnet, $query);

if($result){
	error_frame_reload("이미지 교체 작업이 정상적으로 완료되었습니다.");
}else{
	error_frame("이미지 교체 작업 도중에 알 수 없는 오류가 발생했습니다.");
}
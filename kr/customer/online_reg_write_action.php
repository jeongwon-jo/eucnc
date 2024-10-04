<?php

include $_SERVER["DOCUMENT_ROOT"] . "/pro_inc/include_default.php"; // 공통함수 인클루드

$subject = trim(sqlfilter($_REQUEST['subject']));
$writer = trim(sqlfilter($_REQUEST['writer']));
$password = trim(sqlfilter($_REQUEST['password']));
$content = trim(sqlfilter($_REQUEST['content']));

if(strlen($subject) == 0 || strlen($writer) == 0 || strlen($password) == 0 || strlen($content) == 0){
	error_frame("빈 칸을 모두 작성해주세요.");
	exit;
}

$query = " INSERT INTO inquiry_info SET ";
$query .= " `subject` = '$subject', ";
$query .= " `content` = '$content', ";
$query .= " `writer` = '$writer', ";
$query .= " `password` = '$password', ";
$query .= " `wdate` = NOW() ";
$result = mysqli_query($gconnet, $query);

$inquiry_idx = $gconnet->insert_id;

//파일 업로드
$filePressedQueries = [];
for($i = 0; $i < count($_FILES['file']['name']); $i ++){
	if($_FILES['file']['error'][$i] !== 0){
		continue;
	}
	$file_org = $_FILES['file']['name'][$i];
	$file_chg = uploadMultiFile('file', $_P_DIR_FILE, $i);
	$query = " INSERT INTO inquiry_file_info SET ";
	$query .= " `inquiry_idx` = '$inquiry_idx', ";
	$query .= " `file_org` = '$file_org', ";
	$query .= " `file_chg` = '$file_chg' ";
	$filePressedQueries[] = $query;
}

if(count($filePressedQueries) !== 0){
	$result = mysqli_multi_query($gconnet, implode('; ', $filePressedQueries));
}
if($result){
	error_frame_go("문의 등록이 정상적으로 완료되었습니다.", "./online.php");
}else{
	error_frame("문의 등록 도중에 알 수 없는 오류가 발생했습니다.");
}
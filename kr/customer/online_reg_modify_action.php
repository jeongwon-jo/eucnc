<?php

include $_SERVER["DOCUMENT_ROOT"] . "/pro_inc/include_default.php"; // 공통함수 인클루드

$idx = trim(sqlfilter($_REQUEST['idx']));
$subject = trim(sqlfilter($_REQUEST['subject']));
$writer = trim(sqlfilter($_REQUEST['writer']));
$content = trim(sqlfilter($_REQUEST['content']));

$query = " INSERT INTO inquiry_info SET ";
$query .= " `subject` = '$subject', ";
$query .= " `content` = '$content', ";
$query .= " `writer` = '$writer' ";
$query .= " WHERE `idx` = '$idx' ";
$result = mysqli_query($gconnet, $query);

//파일 업로드
$filePressedQueries = [];
for($i = 0; $i < count($_FILES['file']['name']); $i ++){
	if($_FILES['file']['error'][$i] !== 0){
		continue;
	}
	$file_org = $_FILES['file']['name'][$i];
	$file_chg = uploadMultiFile('file', $_P_DIR_FILE, $i);

	$query = " INSERT INTO inquiry_file_info SET ";
	$query .= " `inquiry_idx` = '$idx', ";
	$query .= " `file_org` = '$file_org', ";
	$query .= " `file_chg` = '$file_chg' ";
	$filePressedQueries[] = $query;
}

if(count($filePressedQueries) > 0){
	//old file remove
	$file_query = " SELECT file_org FROM inquiry_file_info WHERE `inquiry_idx` = '$idx' ";
	$file_result = mysqli_query($gconnet, $file_query);
	for($i = 0, $iMax = mysqli_num_rows($file_result); $i < $iMax; $i ++){
		$row = mysqli_fetch_array($file_result);
		unlink($_P_DIR_FILE . $row['file_org']);
	}
	$file_query = " DELETE FROM inquiry_file_info WHERE `inquiry_idx` = '$idx' ";
	$file_result = mysqli_query($gconnet, $file_query);

	$result = mysqli_multi_query($gconnet, implode('; ', $filePressedQueries));
}

error_frame_go("문의 수정 작업이 정상적으로 완료되었습니다.", "./online_dtl.php?idx=$idx");
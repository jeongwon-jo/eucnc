<?php

include $_SERVER["DOCUMENT_ROOT"]."/pro_inc/include_default.php"; // 공통함수 인클루드

$total_param = trim(sqlfilter($_REQUEST['total_param']));
$year = trim(sqlfilter($_REQUEST['year']));

if(!isset($_FILES['file']) || $_FILES['file']['size'] <= 0){
	error_frame("이미지 파일을 업로드해주세요.");
	exit;
}

$valid_query = " SELECT idx FROM company_timeline_list WHERE `year` = '$year' ";
$valid_result = mysqli_query($gconnet, $valid_query);
if($valid_result->num_rows){
	error_frame("이미 추가된 년도 입니다.");
	exit;
}

$bbs_code = "timeline";
$_P_DIR_FILE = $_P_DIR_FILE.$bbs_code."/";
$_P_DIR_WEB_FILE = $_P_DIR_WEB_FILE.$bbs_code."/";

$file_org = $_FILES['file']['name'];
$file_chg = uploadFile($_FILES, 'file', $_FILES['file'],$_P_DIR_FILE );

$query = " INSERT INTO company_timeline_list SET ";
$query .= " `year` = '$year', ";
$query .= " `file_org` = '$file_org', ";
$query .= " `file_chg` = '$file_chg', ";
$query .= " `priority` = '1', ";
$query .= " `wdate` = NOW() ";
$result = mysqli_query($gconnet, $query);

if($result){
	$timeline_idx = $gconnet->insert_id;

	$pressedQueries = [];

	//rematched priority dataList
	$query = " SELECT * FROM company_timeline_list WHERE `priority` != '1' ORDER BY `priority` ASC ";
	$result = mysqli_query($gconnet, $query);
	for($i = 0, $iMax = $result->num_rows; $i < $iMax; $i ++){
		$row = $result->fetch_assoc();
		$rematch_priority = $row['priority'] + 1;

		$pressedQueries[] = " UPDATE company_timeline_list SET `priority` = '$rematch_priority' WHERE `idx` = '{$row['idx']}' ";
	}

	for($month = 1; $month <= 12; $month ++){
		$query = " INSERT INTO company_timeline_info SET ";
		$query .= " `timeline_idx` = '$timeline_idx', ";
		$query .= " `month` = '$month', ";
		$query .= " `wdate` = NOW() ";

		$pressedQueries[] = $query;
	}
	$result = mysqli_multi_query($gconnet, implode('; ', $pressedQueries));

	error_frame_reload("사업연혁 데이터를 추가했습니다.");
}else{
	error_frame("사업연혁 데이터 등록 작업 도중에 알 수 없는 오류가 발생했습니다.");
}
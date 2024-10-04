<?php

include $_SERVER["DOCUMENT_ROOT"]."/pro_inc/include_default.php"; // 공통함수 인클루드
include $_SERVER["DOCUMENT_ROOT"]."/pro_inc/include_htmlheader_admin.php"; // 관리자페이지 헤더
include $_SERVER["DOCUMENT_ROOT"]."/master/include/check_login.php"; // 관리자 로그인여부 확인

$total_param = trim(sqlfilter($_REQUEST['total_param']));
$subject = trim(sqlfilter($_REQUEST['subject']));
$content = trim(sqlfilter($_REQUEST['content']));

//if(!isset($_FILES['file']) || $_FILES['file']['size'] <= 0){
//	error_frame("파일을 불러올 수 없습니다.");
//	exit;
//}

$bbs_code = "news";
$_P_DIR_FILE = $_P_DIR_FILE.$bbs_code."/";
$_P_DIR_WEB_FILE = $_P_DIR_WEB_FILE.$bbs_code."/";

$file_org = $_FILES['file']['name'];
$file_chg = uploadFile($_FILES, 'file', $_FILES['file'],$_P_DIR_FILE );

$next_priority_query = " SELECT MAX(priority) + 1 AS priority FROM news_info ";
$next_priority_result = mysqli_query($gconnet, $next_priority_query);
$priority = $next_priority_result->fetch_assoc()['priority'];

$query = " INSERT INTO news_info SET ";
$query .= " `subject` = '$subject', ";
$query .= " `content` = '$content', ";
$query .= " `file_org` = '$file_org', ";
$query .= " `file_chg` = '$file_chg', ";
$query .= " `priority` = '1', ";
$query .= " `wdate` = NOW() ";
$result = mysqli_query($gconnet, $query);
if($result){
	$idx = $gconnet->insert_id;

	$pressedQueries = [];
	//rematched priority dataList
	$query = " SELECT * FROM news_info WHERE `idx` != '$idx' ORDER BY `priority` ASC ";
	$result = mysqli_query($gconnet, $query);
	for($i = 0, $iMax = $result->num_rows; $i < $iMax; $i ++){
		$row = $result->fetch_assoc();
		$rematch_priority = $row['priority'] + 1;

		$pressedQueries[] = " UPDATE news_info SET `priority` = '$rematch_priority' WHERE `idx` = '{$row['idx']}' ";
	}
	if(count($pressedQueries) > 0){
		$result = mysqli_multi_query($gconnet, implode('; ', $pressedQueries));
	}

	error_frame_go("기사 자료 데이터 등록 작업을 정상적으로 완료했습니다.", "./news_list.php?$total_param");
}else{
	error_frame("기사 자료 데이터 등록 작업 도중에 알 수 없는 오류가 발생했습니다.");
}
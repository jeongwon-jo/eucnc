<?php

include $_SERVER["DOCUMENT_ROOT"]."/pro_inc/include_default.php"; // 공통함수 인클루드

$lang = trim(sqlfilter($_REQUEST['lang']));
$pageNo = trim(sqlfilter($_REQUEST['pageNo']));
$pageScale = trim(sqlfilter($_REQUEST['pageScale']));
$currentCount = trim(sqlfilter($_REQUEST['currentCount']));
if(!$lang){
	$lang = 'kor';
}

if(!$pageNo){
	$pageNo = 1;
}

if(!$pageScale){
	$pageScale = 6;
}

$StartRowNum = (($pageNo - 1) * $pageScale);
$EndRowNum = $pageScale;

$query = "SELECT * FROM patent_info ORDER BY `priority` ASC LIMIT $StartRowNum, $EndRowNum";
$result = mysqli_query($gconnet, $query);

$arr = [
	"currentCount" => $currentCount,
	"dataMap" => []
];
for($i = 0, $iMax = $result->num_rows; $i < $iMax; $i ++){
	$row = $result->fetch_array();
	$arr["dataMap"][] = [
		'idx' => $row['idx'],
		'image' => $_P_DIR_WEB_FILE . "patent/" . $row['file_chg'],
		'subject' => [$row["{$lang}_subject_1"], $row["{$lang}_subject_2"]],
		'desc' => [$row["{$lang}_desc_1"], $row["{$lang}_desc_2"]],
		'number' => $row['number']
	];
	$arr["currentCount"] ++;
}

echo json_encode($arr, JSON_UNESCAPED_UNICODE);
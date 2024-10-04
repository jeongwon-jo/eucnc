<?php

include $_SERVER["DOCUMENT_ROOT"] . "/pro_inc/include_default.php"; // 공통함수 인클루드

$tb_name = trim(sqlfilter($_REQUEST['tb_name']));
$target_idx = trim(sqlfilter($_REQUEST['target_idx']));
$method_type = trim(sqlfilter($_REQUEST['method_type']));

$query = " SELECT `priority` FROM $tb_name WHERE `idx` = '$target_idx' LIMIT 1 ";
$result = mysqli_query($gconnet, $query);
if(!$result->num_rows){
	error_frame("카테고리 데이터를 찾을 수 없습니다. " . sqlfilter($query));
	exit;
}
$priority = $result->fetch_assoc()['priority'];

$orderParams = " `idx` != '$target_idx' ";
switch(strtolower($method_type)){
	case "up": $orderParams .= " AND `priority` < '$priority' ORDER BY `priority` DESC LIMIT 1 "; break;
	case "down": $orderParams .= " AND `priority` > '$priority' ORDER BY `priority` ASC LIMIT 1 "; break;
}

$query = " SELECT `idx`, `priority` FROM $tb_name WHERE $orderParams ";
$result = mysqli_query($gconnet, $query);
if(!$result->num_rows){
	error_frame("해당 카테고리는 우선순위를 교체할 수 없습니다.");
	exit;
}
$row = $result->fetch_assoc();

$result = mysqli_multi_query($gconnet, implode('; ', [
	" UPDATE $tb_name SET `priority` = '$priority' WHERE `idx` = '{$row['idx']}' ",
	" UPDATE $tb_name SET `priority` = '{$row['priority']}' WHERE `idx` = '$target_idx' "
]));
if($result){
	error_frame_reload("우선순위 변경 작업이 정상적으로 완료되었습니다.");
}else{
	error_frame("우선순위 변경 작업 도중에 알 수 없는 오류가 발생했습니다.");
}
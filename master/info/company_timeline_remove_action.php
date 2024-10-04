<?php

include $_SERVER["DOCUMENT_ROOT"]."/pro_inc/include_default.php"; // 공통함수 인클루드

$total_param = trim(sqlfilter($_REQUEST['total_param']));
$idxList = trim(sqlfilter($_REQUEST['idx']));

$idx_map = array_filter(explode(',', $idxList));

$shift = array_shift($idx_map);
$where = " idx = '$shift' ";
foreach($idx_map as $idx){
	$where .= " OR idx = '$idx' ";
}

$query = " DELETE FROM company_timeline_list WHERE $where ";
$result = mysqli_query($gconnet, $query);
if($result){
	error_frame_reload("선택하신 사업연혁 데이터를 모두 삭제했습니다.");
}else{
	error_frame("사업연혁 데이터 삭제 도중에 알 수 없는 오류가 발생했습니다.");
}
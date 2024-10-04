<?php

include $_SERVER["DOCUMENT_ROOT"]."/pro_inc/include_default.php"; // 공통함수 인클루드
include $_SERVER["DOCUMENT_ROOT"]."/pro_inc/include_htmlheader_admin.php"; // 관리자페이지 헤더
include $_SERVER["DOCUMENT_ROOT"]."/master/include/check_login.php"; // 관리자 로그인여부 확인

$ingredients = [];
foreach($_REQUEST as $key => $value){
	$split = explode('/', $key);
	if(count($split) != 2){
		continue;
	}

	$value = sqlfilter($value);

	[$idx, $column] = explode('/', $key);
	if(!isset($ingredients[$idx])){
		$ingredients[$idx] = [];
	}

	$ingredients[$idx][] = " `$column` = '$value' ";
}

$bbs_code = "image_slide";
$_P_DIR_FILE = $_P_DIR_FILE.$bbs_code."/";

$pressedQueries = [];
foreach(array_keys($ingredients) as $idx){
	if($_FILES[$key = "$idx/file"]["size"] > 0){
		$file_org = $_FILES[$key]["name"];
		$file_chg = uploadFile($_FILES, $key, $_FILES[$key], $_P_DIR_FILE);

		$ingredients[$idx][] = " `file_org` = '$file_org' ";
		$ingredients[$idx][] = " `file_chg` = '$file_chg' ";
	}

	$pressedQueries[] = " UPDATE image_slide_info SET " . implode(", ", $ingredients[$idx]) . " WHERE `idx` = '$idx' ";
}

$result = mysqli_multi_query($gconnet, implode(";", $pressedQueries));
if($result){
	error_frame_reload("이미지 슬라이드 수정 작업을 정상적으로 완료했습니다.");
}else{
	error_frame("이미지 슬라이드 수정 작업 도중에 알 수 없는 오류가 발생했습니다.");
}

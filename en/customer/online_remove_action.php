<?php

include $_SERVER["DOCUMENT_ROOT"] . "/pro_inc/include_default.php"; // 공통함수 인클루드

$idx = trim(sqlfilter($_REQUEST['idx']));

$query = " DELETE FROM inquiry_info WHERE `idx` = '$idx' ";
$result = mysqli_query($gconnet, $query);
if($result){
	error_frame_go("Delete Success", "./online.php");
}else{
	error_frame("Delete Failed");
}
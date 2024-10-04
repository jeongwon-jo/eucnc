<?php

include $_SERVER["DOCUMENT_ROOT"] . "/pro_inc/include_default.php"; // 공통함수 인클루드

$total_param = trim(sqlfilter($_REQUEST['total_param']));
$idx = trim(sqlfilter($_REQUEST['idx']));
$password = trim(sqlfilter($_REQUEST['password']));

$query = " SELECT * FROM inquiry_info WHERE `idx` = '$idx' ";
$result = mysqli_query($gconnet, $query);
$row = mysqli_fetch_array($result);

if($row['password'] !== $password){
	error_frame("No");
	exit;
}

frame_go("./online_dtl.php?$total_param");
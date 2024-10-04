<?php

include $_SERVER["DOCUMENT_ROOT"]."/pro_inc/include_default.php"; // 공통함수 인클루드
include $_SERVER["DOCUMENT_ROOT"]."/pro_inc/include_htmlheader_admin.php"; // 관리자페이지 헤더
include $_SERVER["DOCUMENT_ROOT"]."/master/include/check_login.php"; // 관리자 로그인여부 확인

$idx = trim(sqlfilter($_REQUEST['idx']));
$user_pwd = trim(sqlfilter($_REQUEST['user_pwd']));
$user_name = trim(sqlfilter($_REQUEST['user_name']));

$user_pwd = password_hash($user_pwd, PASSWORD_DEFAULT);

$query = " UPDATE member_info SET ";
$query .= " user_name = '$user_name', ";
$query .= " user_pwd = '$user_pwd' ";
$query .= " WHERE idx = '$idx' ";
$result = mysqli_query($gconnet, $query);
if($result){
	$_SESSION[$_SESSION_ADMIN_PREFIX . 'name'] = $user_name;
	$_SESSION[$_SESSION_ADMIN_PREFIX . 'password'] = $user_pwd;

	?>
	<script  type="text/javascript">
        alert("관리자 정보를 성공적으로 수정했습니다.");
        parent.window.history.back();
	</script>
<? }else{
	error_frame("관리자 정보수정 도중에 알 수 없는 오류가 발생했습니다.");
}
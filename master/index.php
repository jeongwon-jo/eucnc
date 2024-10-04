<? include $_SERVER["DOCUMENT_ROOT"]."/pro_inc/include_default.php"; // 공통함수 인클루드 ?>
<script type="text/javascript">
	<? if($_SESSION[$_SESSION_ADMIN_PREFIX . 'idx']){?>
		location.href="./site/link_session_list.php?bmenu=1&smenu=1";
	<?}else{?>
		location.href="./login/login.php";
	<?}?>
</script>

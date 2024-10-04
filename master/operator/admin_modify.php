<?php

include $_SERVER["DOCUMENT_ROOT"]."/pro_inc/include_default.php"; // 공통함수 인클루드
include $_SERVER["DOCUMENT_ROOT"]."/pro_inc/include_htmlheader_admin.php"; // 관리자페이지 헤더
include $_SERVER["DOCUMENT_ROOT"]."/master/include/check_login.php"; // 관리자 로그인여부 확인

$idx = $_SESSION[$_SESSION_ADMIN_PREFIX . 'idx'];

$query = " SELECT * FROM member_info WHERE idx='$idx' LIMIT 1 ";
$result = mysqli_query($gconnet, $query);
$row = mysqli_fetch_array($result);

?>
<script type="text/javascript">
    function go_submit() {
        var check = chkFrm('frm');
        if(check) {
            frm.submit();
        } else {
            return;
        }
    }

</script>
<body>
	<div id="wrap" class="skin_type01">
		<? include $_SERVER["DOCUMENT_ROOT"]."/master/include/admin_top.php"; // 상단메뉴?>
		<div class="sub_wrap">
			<? include $_SERVER["DOCUMENT_ROOT"]."/master/include/operator_left.php"; // 좌측메뉴?>
			<!-- content 시작 -->
			<div class="container clearfix">
				<div class="content">
					<a href="javascript:location.reload();" class="btn_refresh">새로고침</a>
					<div class="navi">
						<ul class="clearfix">
							<li>HOME</li>
							<li>사이트 관리</li>
							<li>최고관리자 정보수정</li>
						</ul>
					</div>
					<div class="list_tit">
						<h3>최고관리자 정보수정</h3>
					</div>
					<div class="write">

						<form name="frm" action="admin_modify_action.php" target="_fra_admin" method="post">
							<input type="hidden" name="idx" value="<?=$idx?>">
							<table>
								<colgroup>
									<col style="width:15%">
									<col style="width:35%">
									<col style="width:15%">
									<col style="width:35%">
								</colgroup>
								<tr>
									<th scope="row">* 아이디</th>
									<td colspan="3">
										<input type="text" style="width:70%" value="<?=$row['user_id']?>" disabled>
									</td>
								</tr>

								<tr>
									<th>* 비밀번호</th>
									<td colspan="3">
										<input type="password" style="width:70%" name="user_pwd" required="yes" message="비밀번호">
									</td>
								</tr>

								<tr>
									<th>* 이름</th>
									<td colspan="3">
										<input type="text" style="width:70%" name="user_name" required="yes" message="이름" value="<?=$row['user_name']?>">
									</td>
								</tr>

							</table>
						</form>
						<div class="write_btn align_r">
							<a href="javascript:window.history.back();" class="btn_blue">취소</a>
							<a href="javascript:go_submit();" class="btn_green">수정하기</a>
						</div>
					</div>
				</div>
			</div>
			<!-- content 종료 -->
		</div>
	</div>
	<? include $_SERVER["DOCUMENT_ROOT"]."/pro_inc/include_bottom_admin_tail.php"; ?>
</body>
</html>
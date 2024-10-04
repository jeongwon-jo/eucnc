<?php

include $_SERVER["DOCUMENT_ROOT"] . "/pro_inc/include_default.php"; // 공통함수 인클루드
include $_SERVER["DOCUMENT_ROOT"] . "/kr/_inc/head.php";

$keyword_type = trim(sqlfilter($_REQUEST['keyword_type']));
$keyword = trim(sqlfilter($_REQUEST['keyword']));
$pageNo = trim(sqlfilter($_REQUEST['pageNo']));
$pageScale = trim(sqlfilter($_REQUEST['pageScale']));
$idx = trim(sqlfilter($_REQUEST['idx']));
if(!$idx){
	error_back("접근할 수 없는 페이지입니다.");
	exit;
}

$total_param = "pageScale=$pageScale&keyword_type=$keyword_type&keyword=$keyword&idx=$idx";

$query = " SELECT * FROM inquiry_info WHERE `idx` = '$idx' ";
$result = mysqli_query($gconnet, $query);
$row = mysqli_fetch_array($result);

//$board_width = 800;
//$board_height = 800;

?>
<div id="wrap">
	<?php include $_SERVER["DOCUMENT_ROOT"] . "/kr/_inc/header.php"; ?>
	<main>
		<div class="menu-title menu4">
			<div class="menu-title__inner">
				<div class="title">
					<h1 class="tit">고객센터</h1>
					<span class="sub">Global No.1 Paint EUCNC</span>
				</div>
				<ul class="breadcrumb">
					<li class="home"></li>
					<li>고객센터</li>
					<li>온라인 문의</li>
				</ul>
				<div class="sub-menu">
					<ul class="submenu_list">
						<li class="active"><a href="./online.php">온라인 문의</a></li>
						<li><a href="./map.php">오시는 길</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="container customer_cont">
			<div class="online-pw__inner">
				<div class="cm_title">
					<h3 class="title">온라인 문의</h3>
					<p>궁금하신 사항이 있으실 경우 언제든지<br> 문의주시면 신속히 확인해서 답변 드리겠습니다.</p>
				</div>
				<div class="online-pw__contents">
					<form action="./online_checkpw_write_action.php" method="post" class="check-pwd_form" target="_fra_admin">
						<input type="hidden" name="total_param" value="<?=$total_param?>">
						<input type="hidden" name="idx" value="<?=$idx?>">
						<fieldset>
							<legend>비밀번호 검사 폼</legend>
							<div class="check-pwd__inner">
								<span>작성 시 입력한 비밀번호를 입력해 주세요.</span>
								<div class="input_wrap">
									<!-- 효율성 검사 input에 invalid 클래스 추가 -->
									<div class="input">
										<input type="password" name="password" placeholder="비밀번호를 입력해 주세요.">
										<!-- <span class="err-txt">비밀번호가 올바르지 않습니다.</span> -->
									</div>
								</div>
								<button type="submit" class="btn btn-md gray">확인</button>
							</div>
						</fieldset>
					</form>
					<div class="btn-area right mt32">
						<a href="./online.php?<?=$total_param?>" class="btn btn-md white">목록</a>
					</div>
				</div>
			</div>
		</div>
	</main>
	<?php include $_SERVER["DOCUMENT_ROOT"] . "/kr/_inc/footer.php"; ?>
</div>
<? include $_SERVER["DOCUMENT_ROOT"]."/pro_inc/include_bottom_admin_tail.php"; ?>
</body>
</html>
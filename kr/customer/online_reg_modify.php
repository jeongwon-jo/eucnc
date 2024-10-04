<?php

include $_SERVER["DOCUMENT_ROOT"] . "/pro_inc/include_default.php"; // 공통함수 인클루드
include $_SERVER["DOCUMENT_ROOT"] . "/kr/_inc/head.php";

$idx = trim(sqlfilter($_REQUEST['idx']));

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
			<div class="online-reg__inner">
				<div class="cm_title">
					<h3 class="title">온라인 문의</h3>
					<p>궁금하신 사항이 있으실 경우 언제든지<br> 문의주시면 신속히 확인해서 답변 드리겠습니다.</p>
				</div>
				<div class="online-reg__contents">
					<form action="./online_reg_modify_action.php" method="post" class="register_form" name="frm" target="_fra_admin" enctype="multipart/form-data">
						<input type="hidden" name="idx" value="<?=$idx?>">
						<fieldset>
							<legend>온라인 문의 등록 폼</legend>
							<div class="register_table">
								<ul class="row">
									<li class="tit">제목</li>
									<li class="desc">
										<input type="text" name="subject" placeholder="제목을 입력해 주세요." value="<?=$row['subject']?>" class="w100p">
										<!-- <span class="err-txt">제목을 입력해 주세요.</span> -->
									</li>
								</ul>
								<ul class="row flex-row">
									<ul class="row-item">
										<li class="tit">작성자</li>
										<li class="desc">
											<input type="text" name="writer" placeholder="작성자명을 입력해 주세요." value="<?=$row['writer']?>" class="w100p">
											<!-- <span class="err-txt">작성자명을 입력해 주세요.</span> -->
										</li>
									</ul>
								</ul>
								<ul class="row">
									<li class="tit">문의 내용</li>
									<li class="desc">
										<textarea name="content" placeholder="문의 내용을 입력해 주세요." class="w100p"><?=$row['content']?></textarea>
										<!-- <span class="err-txt">문의 내용을 입력해 주세요.</span> -->
									</li>
								</ul>
								<ul class="row file">
									<li class="tit">파일 첨부</li>
									<li class="desc">
										<div class="upload_file">
											<label for="file2">파일 선택</label>
											<input type="file" id="file2" name="file[]" multiple>
											<div class="select_filelist"></div>
										</div>
										<div class="file_txt">
											<span>* 파일 첨부시 기존 파일들은 삭제됩니다.</span>
											<span>* 첨부파일은 최대 5개까지 등록 가능합니다.</span>
											<span>* 첨부파일은 5MB 이하의 파일만 가능합니다.</span>
										</div>
									</li>
								</ul>
							</div>
						</fieldset>
					</form>
					<div class="btn-area right mt44">
						<a href="./online.php" class="btn btn-md gray">목록</a>
						<button type="button" onclick="frm.submit()" class="btn btn-md pink">수정</button>
					</div>
				</div>
			</div>
		</div>
	</main>
	<?php include $_SERVER["DOCUMENT_ROOT"] . "/kr/_inc/footer.php"; ?>
</div>
<script>
    $("#file").on("change", function () {
        if (window.FileReader) {
            var filename = $(this)[0].files[0].name;
        } else {
            var filename = $(this).val().split('/').pop().split('\\').pop();
        }
        let inputTag = `<span class="upload_name">${filename}<button type="button" class="btn_delete-file"></button></span>`
        $('.select_filelist').append(inputTag)

        $('.btn_delete-file').click(function () {
            $(this).parents('.upload_name').remove()
        })
    });

    $(document).ready(function (){
        window.addEventListener('change', function (){
            let fileInput = document.getElementById('file2');
            if(fileInput !== null){
                reallocateFileSection(fileInput)
            }
        })
    })

    function reallocateFileSection(fileInput){
        const filesArray = Array.from(fileInput.files);
        $('.select_filelist').html('')
        filesArray.forEach((file) => {
            let inputTag = `<span class="upload_name">${file.name}<button type="button" class="btn_delete-file" onclick="remove_file('${file.lastModified}')"></button></span>`
            $('.select_filelist').append(inputTag)
        });
    }

    function remove_file(lastModified){
        let fileInput = document.getElementById('file2');
        const dataTransfer = new DataTransfer();

        Array.from(fileInput.files)
            .filter(file => file.lastModified != lastModified)
            .forEach(file => {
                dataTransfer.items.add(file);
            })

        fileInput.files = dataTransfer.files;
        reallocateFileSection(fileInput)
    }
</script>
<? include $_SERVER["DOCUMENT_ROOT"]."/pro_inc/include_bottom_admin_tail.php"; ?>
</body>
</html>
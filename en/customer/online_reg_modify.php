<?php

include $_SERVER["DOCUMENT_ROOT"] . "/pro_inc/include_default.php"; // 공통함수 인클루드
include $_SERVER["DOCUMENT_ROOT"] . "/en/_inc/head.php";

$idx = trim(sqlfilter($_REQUEST['idx']));

$query = " SELECT * FROM inquiry_info WHERE `idx` = '$idx' ";
$result = mysqli_query($gconnet, $query);
$row = mysqli_fetch_array($result);

//$board_width = 800;
//$board_height = 800;

?>
<div id="wrap">
	<?php include $_SERVER["DOCUMENT_ROOT"] . "/en/_inc/header.php"; ?>
	<main>
		<div class="menu-title menu4">
			<div class="menu-title__inner">
				<div class="title">
					<h1 class="tit">Customer</h1>
					<span class="sub">Global No.1 Paint EUCNC</span>
				</div>
				<div class="sub-menu">
					<ul class="submenu_list">
						<li class="active"><a href="./online.php">Contact</a></li>
						<li><a href="./map.php">Address</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="container customer_cont">
			<div class="online-reg__inner">
				<div class="cm_title">
					<h3 class="title">Contact</h3>
					<p>Should you have any questions,<br class="mobile_show"> please feel free to contact me anytime.
					</p>
				</div>
				<div class="online-reg__contents">
					<form action="./online_reg_modify_action.php" method="post" class="register_form" name="frm" target="_fra_admin" enctype="multipart/form-data">
						<input type="hidden" name="idx" value="<?=$idx?>">
						<fieldset>
							<legend>Contact Register Form</legend>
							<div class="register_table">
								<ul class="row">
									<li class="tit">Title</li>
									<li class="desc">
										<input type="text" name="subject" value="<?=$row['subject']?>" placeholder="Please enter your title" class="w100p">
										<!-- <span class="err-txt">Please enter your title</span> -->
									</li>
								</ul>
								<ul class="row flex-row">
									<ul class="row-item">
										<li class="tit">Posted by</li>
										<li class="desc">
											<input type="text" name="writer" value="<?=$row['writer']?>" placeholder="Please enter your name" class="w100p">
											<!-- <span class="err-txt">Please enter your name</span> -->
										</li>
									</ul>
								</ul>
								<ul class="row">
									<li class="tit">Contents</li>
									<li class="desc">
										<textarea name="content" placeholder="Please enter your question" class="w100p"><?=$row['content']?></textarea>
										<!-- <span class="err-txt">Please enter your question</span> -->
									</li>
								</ul>
								<ul class="row file">
									<li class="tit">Upload Files</li>
									<li class="desc">
										<div class="upload_file">
											<label for="file2">Select</label>
											<input type="file" id="file2" name="file[]" multiple>
											<div class="select_filelist"></div>
										</div>
										<div class="file_txt">
											<span>* Up to 5 attachment files can be uploaded.</span>
											<span>* Attachment can only be 5MB or smaller.</span>
										</div>
									</li>
								</ul>
							</div>
						</fieldset>
					</form>
					<div class="btn-area right mt44">
						<a href="./online.php" class="btn btn-md gray">Cancel</a>
						<button type="button" onclick="frm.submit()" class="btn btn-md pink">Register</button>
					</div>
				</div>
			</div>
		</div>
	</main>
	<?php include $_SERVER["DOCUMENT_ROOT"] . "/en/_inc/footer.php"; ?>
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
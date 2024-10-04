<?php

include $_SERVER["DOCUMENT_ROOT"]."/pro_inc/include_default.php"; // 공통함수 인클루드
include $_SERVER["DOCUMENT_ROOT"]."/pro_inc/include_htmlheader_admin.php"; // 관리자페이지 헤더
include $_SERVER["DOCUMENT_ROOT"]."/master/include/check_login.php"; // 관리자 로그인여부 확인

$pageNo = trim(sqlfilter($_REQUEST['pageNo']));
$pageScale = trim(sqlfilter($_REQUEST['pageScale']));
$keyword = trim(sqlfilter($_REQUEST['keyword']));
$keyword_type = trim(sqlfilter($_REQUEST['keyword_type']));
if(!$pageNo){
	$pageNo = 1;
}

if(!$pageScale){
	$pageScale = 10;
}

$total_param = "bmenu=$bmenu&smenu=$smenu&pageScale=$pageScale&keyword=$keyword&keyword_type=$keyword_type";

$StarRowNum = (($pageNo-1) * $pageScale);
$EndRowNum = $pageScale;

$where = " 1 = 1 ";
if($keyword){
	if($keyword_type){
		switch($keyword_type){
			case "subject": $where .= " AND `subject` LIKE '%$keyword%' "; break;
			case "content": $where .= " AND `content` LIKE '%$keyword%' "; break;
		}
	}else{
		$where .= " AND (`subject` LIKE '%$keyword%' OR `content` LIKE '%$keyword%') ";
	}
}

$query = " SELECT * FROM news_info WHERE $where ORDER BY `priority` ASC LIMIT $StarRowNum,$EndRowNum ";
$result = mysqli_query($gconnet, $query);

$query_cnt = " SELECT idx FROM news_info WHERE $where ";
$result_cnt = mysqli_query($gconnet, $query_cnt);
$num = $result_cnt->num_rows;

$iTotalSubCnt = $num;
$totalpage	= ($iTotalSubCnt - 1)/$pageScale  + 1;

//$board_width = 800;
//$board_height = 800;

?>
<script>
    function syncChangePageScale(value){
        const url = new URL(location.href);
        url.searchParams.set('pageScale', value)
        location.href = url.href;
    }

    let check = 0;
    function syncCheckboxSelectAll(){
        const idxDOC = document.getElementsByName("idx[]");
        let booleanCheck;

        check = check ? 0 : 1;
        booleanCheck = check;
        for (let i = 0; i < idxDOC.length; i ++) {
            idxDOC[i].checked = booleanCheck;
        }
    }

    function getSelectedCheckboxIds(){
        let checkIdsMap = {}
        const chk = document.getElementsByName("idx[]");
        for (let i = 0; i < chk.length; i++) {
            if(chk[i].checked){
                checkIdsMap[i] = chk[i].value
            }
        }
        return checkIdsMap;
    }

    function go_write(){
        location.href = "./news_write.php?<?=$total_param?>"
    }

    function go_modify(idx) {
        location.href = "./news_modify.php?<?=$total_param?>&idx=" + idx
    }

    function go_remove(){
        const links = getSelectedCheckboxIds();
        if(Object.keys(links).length === 0){
            alert("삭제할 기사자료 데이터를 선택해주세요.")
            return
        }

        if(confirm("삭제하시겠습니까?")) {

            let idx = '';
            Object.keys(links).forEach((value) => {
                idx += `${links[value]},`
            })

            remove_frm.idx.value = idx;
            remove_frm.submit()
        }
    }

    function go_update(idx, type){
        priority_frm.target_idx.value = idx;
        priority_frm.method_type.value = type;
        priority_frm.submit();
    }
</script>
<body>
	<form action="./news_remove_action.php" target="_fra_admin" name="remove_frm" method="post">
		<input type="hidden" name="idx">
	</form>

	<form name="priority_frm" action="./global_table_priority_update_action.php" target="_fra_admin">
		<input type="hidden" id="target_idx" name="target_idx">
		<input type="hidden" id="method_type" name="method_type">
		<input type="hidden" id="tb_name" name="tb_name" value="news_info">
	</form>

	<div id="wrap" class="skin_type01">
		<? include $_SERVER["DOCUMENT_ROOT"]."/master/include/admin_top.php"; // 상단메뉴?>
		<div class="sub_wrap">
			<? include $_SERVER["DOCUMENT_ROOT"]."/master/include/reference_left.php"; // 좌측메뉴?>
			<!-- content 시작 -->
			<div class="container clearfix">
				<div class="content">
					<!-- 네비게이션 시작 -->
					<a href="javascript:location.reload();" class="btn_refresh">새로고침</a>
					<div class="navi">
						<ul class="clearfix">
							<li>HOME</li>
							<li>기업소식 관리</li>
							<li>기사 자료</li>
						</ul>
					</div>
					<div class="list_tit">
						<h3>기사 자료</h3>
						<button class="btn_add" onclick="go_write()" style="width:15%;"><span>등록</span></button>
					</div>
					<!-- 네비게이션 종료 -->
					<div class="list">
						<!-- 검색창 시작 -->
						<table class="search">
							<caption>검색</caption>
							<colgroup>
								<col style="width:14%;">
								<col style="width:20%;">
								<col style="width:13%;">
								<col style="width:20%;">
								<col style="width:13%;">
								<col style="width:20%;">
							</colgroup>

							<form name="search_frm" method="post" action="<?=basename($_SERVER['PHP_SELF'])?>">
								<input type="hidden" name="bmenu" value="<?=$bmenu?>">
								<input type="hidden" name="smenu" value="<?=$smenu?>">
								<input type="hidden" name="pageScale" value="<?=$pageScale?>">
								<tr>
									<th scope="row">검색어</th>
									<td colspan="2">
										<select name="keyword_type">
											<option value="" selected>전체</option>
											<option value="subject" <? if($keyword_type === 'subject'){ echo 'selected'; } ?> >제목</option>
											<option value="content" <? if($keyword_type === 'content'){ echo 'selected'; } ?> >내용</option>
										</select>
									</td>
									<th scope="row">키워드</th>
									<td colspan="2">
										<input type="text" name="keyword" style="width:80%;" value="<?=$keyword?>">
										<a href="javascript:search_frm.submit();" class="btn_green">검색</a>
									</td>
								</tr>
							</form>
						</table>

						<ul class="list_tab" style="height:20px;"></ul>

						<div class="search_wrap">
							<div class="result">
								<p class="txt">등록한 기사 자료 목록 (<span><?=$num?></span>건)</p>
								<div class="btn_wrap">
									<select name="pageScale" onchange="syncChangePageScale(this.value)">
										<option value="10" <? if($pageScale == 10){ echo 'selected'; } ?>>10개씩 보기</option>
										<option value="30" <? if($pageScale == 30){ echo 'selected'; } ?>>30개씩 보기</option>
										<option value="50" <? if($pageScale == 50){ echo 'selected'; } ?>>50개씩 보기</option>
										<option value="100" <? if($pageScale == 100){ echo 'selected'; } ?>>100개씩 보기</option>
									</select>
								</div>
							</div>

							<div style="height: 20px"></div>

							<table class="search_list">
								<caption>검색결과</caption>
								<colgroup>
									<col style="width:10%;">
									<col style="width:10%;">
									<col style="width:10%;">
									<col style="width:50%;">
									<col style="width:10%;">
									<col style="width:10%;">
								</colgroup>
								<thead>
								<tr>
									<th scope="col"><input type="checkbox" id="" name="checkNum" onclick="syncCheckboxSelectAll()"></th>
									<th scope="col">No.</th>
									<th scope="col">등록일</th>
									<th scope="col">제목</th>
									<th scope="col">순서변경</th>
									<th scope="col"></th>
								</tr>
								</thead>
								<tbody>
								<? if($num === 0){ ?>
									<tr>
										<td colspan="10" height="40">등록된 데이터가 없습니다.</strong></td>
									</tr>
								<? } ?>

								<?
								for($i = 0, $iMax = mysqli_num_rows($result); $i < $iMax; $i ++){
									$row = mysqli_fetch_array($result);
									$listnum	= $iTotalSubCnt - (( $pageNo - 1 ) * $pageScale ) - $i;
									?>
									<tr>
										<td><input type="checkbox" name="idx[]" id="idx[]" value="<?=$row[0]?>" required="yes" message="메뉴"/></td>
										<td><?=$listnum?></td>
										<td><?=date("Y.m.d", strtotime($row['wdate']))?></td>
										<td><?=$row['subject']?></td>
										<td>
											<?
											if($iTotalSubCnt > 1){
												if($i === 0){ ?>
													<a href="javascript:;" onclick="go_update('<?=$row[0]?>', 'down')">▼</a>
												<? }elseif($i === $iTotalSubCnt-1){ ?>
													<a href="javascript:;" onclick="go_update('<?=$row[0]?>', 'up')">▲</a>
												<? }else{ ?>
													<a href="javascript:;" onclick="go_update('<?=$row[0]?>', 'down')">▼</a>
													<a href="javascript:;" onclick="go_update('<?=$row[0]?>', 'up')">▲</a>
												<? } ?>
											<? } ?>
										</td>
										<td><a href="javascript:go_modify('<?=$row['idx']?>');" class="btn_gray">수정</a></td>
									</tr>
								<? } ?>
								</tbody>
							</table>

							<ul class="list_tab" style="height:20px;"></ul>

							<div class="write_btn align_r">
								<a href="javascript:go_remove();" class="btn_red">삭제</a>
							</div>

							<div class="pagination mt0">
								<?include $_SERVER["DOCUMENT_ROOT"]."/pro_inc/paging.php";?>
							</div>

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
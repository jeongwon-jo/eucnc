<?
if($num >= 1){ // DB 추출갯수가 하나라도 있을때 시작 
	
	$page_list_size = $pageScale; // 한 페이지당 출력할 갯수  
	$page_size = 6; // 1 ~ 10 페이지까지 화면에 뿌려준다.
	$total_row = $num; // 게시물의 총 갯수
	$c_page = $pageNo; // 현재 페이지

	$total_page =  ceil($total_row / $page_list_size);		//전체  개수
	$page_per = ceil($c_page/$page_size);	

	$start_page_prev = $c_page%$page_size;
	if($start_page_prev == 1){
		$start_page = $c_page;	//시작  값
	} else {
		$start_page = ceil($c_page / $page_size);	
		$start_plus_num = ($page_per -1)*($page_size-1);
		$start_page = $start_page+$start_plus_num;	//시작  값
	}
	
	$end_page = $start_page + $page_size - 1;	// 끝  값

	// 전체  초기화
	if ($total_page < $end_page){
		$end_page = $total_page;
	}
	
			###처음 버튼
				if ($c_page > $page_size) {
					//맨앞
					echo '<a href="'.basename($_SERVER["PHP_SELF"]).'?pageNo=&'.$total_param.'"><img src="../img/sub/first.png" alt=""></a>&nbsp;';
					//이전
					$prev_list = $start_page - $page_size;
					if($prev_list == 0){
						$prev_list = "";
					}
					echo '<a href="'.basename($_SERVER["PHP_SELF"]).'?pageNo='.$prev_list.'&'.$total_param.'"><img src="../img/sub/left.png" alt=""></a>&nbsp;';
				} else {
					echo '<a href="javascript:;"><img src="../img/sub/first.png" alt=""></a>&nbsp;';
					echo '<a href="javascript:;"><img src="../img/sub/left.png" alt=""></a>&nbsp;';
				}
			
			###페이지 출력
				for ($i=$start_page;$i <= $end_page;$i++){

					$page = $i;

					if($page == 0){
						$page = 1;
					}
								
					if($c_page != $page){ // 현재페이지 아님 
						//echo '<div class="WH24 TC AZURE ML8" onclick=location.href="'.basename($_SERVER["PHP_SELF"]).'?pageNo='.$page.'&'.$total_param.'"; style="cursor:pointer;">'.$i.'</div>';
						
						echo '<a href="'.basename($_SERVER["PHP_SELF"]).'?pageNo='.$page.'&'.$total_param.'">'.$i.'</a>';

					}else{ // 현재페이지 
						//echo '<div class="WH24 TC OVAL ML8" onclick=location.href="'.basename($_SERVER["PHP_SELF"]).'?pageNo='.$c_page.'&'.$total_param.'"; style="cursor:pointer;">'.$i.'</div>';
						echo '<a class="active" href="'.basename($_SERVER["PHP_SELF"]).'?pageNo='.$c_page.'&'.$total_param.'">'.$i.'</a>';
					}
				}

			###다음버튼
				if($total_page > $end_page){
					$next_list = $end_page + 1;
					// 다음 
					echo '<a href="'.basename($_SERVER["PHP_SELF"]).'?pageNo='.$next_list.'&'.$total_param.'"><img src="../img/sub/next.png" alt=""></a>';
					// 맨끝 
					$last_page = $total_page;
					echo '<a href="'.basename($_SERVER["PHP_SELF"]).'?pageNo='.$last_page.'&'.$total_param.'"><img src="../img/sub/last.png" alt=""></a>';
				} else {
					echo '&nbsp;<a href="javascript:;"><img src="../img/sub/next.png" alt=""></a>';
					echo '&nbsp;<a href="javascript:;"><img src="../img/sub/last.png" alt=""></a>';
				}

} // DB 추출갯수가 하나라도 있을때 종료 
?>

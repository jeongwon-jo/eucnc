<?
if($num >= 1){
	$page_list_size = $pageScale; // 한 페이지당 출력할 갯수
	$page_size = 10; // 1 ~ 10 페이지까지 화면에 뿌려준다.
	$total_row = $num; // 게시물의 총 갯수
	$c_page = $pageNo; // 현재 페이지
	$total_page =  ceil($total_row / $page_list_size);
	$page_per = ceil($c_page/$page_size);
	$start_page_prev = $c_page%$page_size;
	if($start_page_prev == 1){
		$start_page = $c_page;	//시작  값
	} else {
		$start_page = ceil($c_page / $page_size);
		$start_plus_num = ($page_per -1)*($page_size-1);
		$start_page = $start_page+$start_plus_num;
	}

	$end_page = $start_page + $page_size - 1;
	if ($total_page < $end_page){
		$end_page = $total_page;
	}

	if ($c_page > $page_size) {
		$prev_list = $start_page - $page_size;
		if($prev_list == 0){
			$prev_list = "";
		}
		echo '<li class="btn_prev"><a href="'.$_SERVER["PHP_SELF"].'?pageNo='.$prev_list.'&'.$total_param.'">이전 페이지</a></li>';
	}

	for ($i=$start_page;$i <= $end_page;$i++){
		$page = $i;
		if($page == 0){
			$page = 1;
		}

		if($c_page != $page){
			echo '<li class="page"><a href="'.$_SERVER["PHP_SELF"].'?pageNo='.$page.'&'.$total_param.'">'.$i.'</a></li>';
		}else{
			echo '<li class="page active"><a href="'.$_SERVER["PHP_SELF"].'?pageNo='.$page.'&'.$total_param.'">'.$i.'</a></li>';
		}
	}

	if($total_page > $end_page){
		$next_list = $end_page + 1;
		echo '<li class="btn_next"><a href="'.$_SERVER["PHP_SELF"].'?pageNo='.$next_list.'&'.$total_param.'" class="next">다음 페이지</a></li>';
		$last_page = $total_page;
	}

} // DB 추출갯수가 하나라도 있을때 종료
?>
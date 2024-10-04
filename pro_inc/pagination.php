<div class="pagination">
<? //2022-0927 deep
if($num >= 1){ // DB 추출갯수가 하나라도 있을때 시작 
	
	$page_list_size = $pageScale; // 한 페이지당 출력할 갯수  
	$page_size = 5; // 1 ~ 10 페이지까지 화면에 뿌려준다.
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
			//맨 앞
			//echo '<a href="'.$_SERVER["PHP_SELF"].'?pageNo=&'.$total_param.'" class="prev">처음으로</a>';
			//이전
			$prev_list = $start_page - $page_size;
			if($prev_list == 0){
				$prev_list = "";
			}
			echo '<a href="'.$_SERVER["PHP_SELF"].'?pageNo='.$prev_list.'&'.$total_param.'"><img src="../img/prev.svg" alt="이전 페이지"></a>';
		}
	###페이지 출력
		for ($i=$start_page;$i <= $end_page;$i++){
			$page = $i;

			if($page == 0){
				$page = 1;
			}
			
			if($c_page != $page){
				echo '<a href="'.$_SERVER["PHP_SELF"].'?pageNo='.$page.'&'.$total_param.'" class="">'.$i.'</a>';
			}else{
				echo '<a href="'.$_SERVER["PHP_SELF"].'?pageNo='.$page.'&'.$total_param.'" class="active">'.$i.'</a>';
			}

		}
	###다음버튼
		if($total_page > $end_page){
			//다음
			$next_list = $end_page + 1;
			echo '<a href="'.$_SERVER["PHP_SELF"].'?pageNo='.$next_list.'&'.$total_param.'"><img src="../img/next.svg" alt="다음 페이지"></a>';
			// 맨 마지막
			$last_page = $total_page;
			//echo '<a href="'.$_SERVER["PHP_SELF"].'?pageNo='.$last_page.'&'.$total_param.'"><img src="../img/next2.svg" alt="마지막으로"></a>';
		}
} // DB 추출갯수가 하나라도 있을때 종료 
?>
</div>

<style>
	.pagination {
    text-align: center;
		margin-top: 20px;
    position: relative;
    top: 12px;
}

.pagetop0 .pagination{
	top:0 !important;
}
</style>
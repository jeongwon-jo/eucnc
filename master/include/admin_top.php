<header id="header">
	<div class="header_top">
		<div class="inner relative">
			<h1>ADMINISTRATOR</h1>
			<div class="user_name" <? if($_SESSION[$_SESSION_ADMIN_PREFIX . 'type'] == 'AD'){ ?> style="cursor: pointer;" onclick="location.href = '/master/operator/admin_modify.php?smenu=1'" <? } ?>>
				<span class="ico"></span>
				<p class="txt"><?=$_SESSION[$_SESSION_ADMIN_PREFIX . 'name']?>님</p>
				<span class="info">관리자</span>
			</div>
			<ul class="btn_wrap clearfix">
				<li class="homepage"><a href="/" target="_blank">HOMEPAGE</a></li>
				<li class="logout"><a href="../login/logout.php">LOG-OUT</a></li>
			</ul>
		</div>
	</div>
	<nav id="gnb">
		<ul class="clearfix">
			<li <? if($bmenu == 1){ ?>class="on"<? } ?>>
				<a href="../main/image_slide_list.php?bmenu=1&smenu=1">메인페이지 관리</a>
			</li>

			<li <? if($bmenu == 2){ ?>class="on" <? } ?>>
				<a href="../reference/patent_list.php?bmenu=2&smenu=1">기업소식 관리</a>
			</li>

			<li <? if($bmenu == 3){ ?>class="on" <? } ?>>
				<a href="../inquiry/inquiry_list.php?bmenu=3&smenu=1">고객센터 관리</a>
			</li>

			<li <? if($bmenu == 4){ ?>class="on" <? } ?>>
				<a href="../info/company_info_list.php?bmenu=4&smenu=1">회사소개 관리</a>
			</li>

			<li <? if($bmenu == 5){ ?>class="on" <? } ?>>
				<a href="../item/item_promt_list.php?bmenu=5&smenu=1&type=1">제품소개 관리</a>
			</li>
		</ul>
	</nav>
</header>
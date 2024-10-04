$(function () {	
	/* Nice Select */
	$(".custom-select").niceSelect();

	/* Header */
	$('ul.gnb>li').mouseover(function () {
		$(this).children('ul.snb').stop().slideDown()
	}).mouseout(function () {
		$(this).children("ul.snb").stop().slideUp();
	})

	/* Second Header */
	$(".sec-header__list>li").click(function () {
		$("ul.sec-header_snb").not($(this).children("ul.sec-header_snb")).slideUp();
		$(this).children("ul.sec-header_snb").stop().slideToggle();
		$("ul.sec-header__list>li").not($(this)).removeClass("active");
		$(this).toggleClass('active')
	})

	/* Gnb active */
	const activePage = window.location.pathname;
	const gnbItemLinks = document.querySelectorAll("ul.gnb>li");
	const snbLinks = document.querySelectorAll("ul.snb>li>a");

	/* 1depth */
	const arr = activePage.split("/");
	for (let i = 0; i < gnbItemLinks.length; i++) {
		if (arr[2] === gnbItemLinks[i].dataset['1depth']) {
			gnbItemLinks[i].classList.add('active')
		}
	}

	/* 2depth */
	for (let i = 0; i < snbLinks.length; i++) {
		if (snbLinks[i].href.includes(arr[3])) {
			snbLinks[i].classList.add("active");
		}
	}

	/* Main Fullpage */
	$("#fullpage").fullpage({
		autoScrolling: true,
		scrollHorizontally: true,
		slidesNavigation: true,
		controlArrows: false,
		navigation: true,
		responsiveWidth: 768,
		navigationPosition: "right",
		navigationTooltips: [
			"Main",
			"Advantage",
			"Product",
			"Patent & Cert"
		],
		showActiveTooltip: true,

		afterLoad: function (anchorLink, index) {
			$("header ,#fp-nav").fadeIn(300);

			// index : 1
			if (index == 1) {
				$("header").addClass("home");
			} else {
				$("header").removeClass("home");
			}

			// index : 2
			if (index == 2) {
				$(".section_2 .mainpage_flex .content").addClass("animate");
			}

			// index : 3
			if (index == 3) {
				$(".section_3 .product-item__inner").addClass("animate");
				$("#fp-nav").addClass("pink");
			} else {
				$("#fp-nav").removeClass("pink");
			}

			// index : 4
			if (index == 4) {
				$(".section4__inner").addClass("animate");
				$("#fp-nav").addClass("black");
			} else {
				$("#fp-nav").removeClass("black");
			}

			if (index == 1) {
				$("#fp-nav").addClass("sec1");
			} else {
				$("#fp-nav").removeClass("sec1");
			}
		},

		onLeave: function (anchorLink, destination, direction, index) {
			$("header ,#fp-nav").stop(true).hide();
		},
	});
})

function openModal(id) {
	$('#' + id).show()
}

function closeModal(id) {
	$('#' + id).hide()
}

function closeAllModal() {
	$('.modal').hide()
}

function clickMenu() {
	$('.second-header').fadeIn()
}

function closeHeaderMenu() {
	$(".second-header").fadeOut();
}

	const modalOuter = document.querySelector(".modal");
	window.onclick = function (event) {
		if (event.target == modalOuter) {
			event.target.style.display = "none";
			document.body.style.overflow = "visible";
		}
	};
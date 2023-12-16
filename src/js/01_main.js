function preloader() {
	let counter = 0;
	let starAnim = setInterval(function () {
		if (counter < 100) {
			counter++;
			$(".preloader span").html(counter + "%");
		} else {
			clearInterval(starAnim);
		}
	}, 1);
	$(window).on("load", function () {
		
		clearInterval(starAnim);
		counter = 100;
		$(".preloader span").html(counter + "%");
		$(".preloader").addClass("hide");
		
	});
}
preloader();

jQuery(document).ready(function ($) {

	function catalogMenu () {
		// toggle menu
		$(".catalog-btn").on("click", function () {
			$(this).toggleClass("active");
			$(".catalog-menu").toggleClass("active");
			$("body").toggleClass("overflow");
			
			if ($(window).width() > 992 ) { 
				$(".catalog-menu-wrapper").css("margin-top", $('.header-nav').offset().top);
			} else {
				$(".catalog-menu-wrapper").css("margin-top", $('.main').offset().top);
			}
		});

		// toggle categories
		function initCatalog() {

			$('.catalog-menu-categories-nav__item').eq(0).addClass('active');

			$('.catalog-menu-categories-list').eq(0).addClass('active');

			$('.catalog-menu-body').eq(0).addClass('active');

			$('.catalog-menu-categories-list__item').eq(0).addClass('active');

			$('.catalog-menu-category-item-nav__item').eq(0).addClass('active');

			$('.catalog-menu-category-item-list').eq(0).addClass('active');

			$('.catalog-menu-category-item').eq(0).addClass('active');

		};
		initCatalog();


		$('.catalog-menu-categories-nav__item').on('click', function() {

			const index = $(this).data('index');

			$('.catalog-menu .active').removeClass('active');

			$(this).addClass('active');

			const activeList = $('.catalog-menu-categories-list').eq(index);

			const activeBody = $('.catalog-menu-body').eq(index);

			$('.catalog-menu-categories-list').removeClass('active');

			$('.catalog-menu-body').removeClass('active');

			activeList.addClass('active');

			activeBody.addClass('active');
			
			// reset active cat 
			$('.catalog-menu-categories-list__item').removeClass('active');

			$('.catalog-menu-categories-list.active .catalog-menu-categories-list__item').eq(0).addClass('active');

			// show active category first body
			$('.catalog-menu-body.active .catalog-menu-category-item').eq(0).addClass('active');

			$('.catalog-menu-body.active .catalog-menu-category-item.active .catalog-menu-category-item-nav__item').eq(0).addClass('active');
			$('.catalog-menu-body.active .catalog-menu-category-item.active .catalog-menu-category-item-list').eq(0).addClass('active');

		});

		$('.catalog-menu-categories-list__item').on('click', function() {

			const index = $(this).data('index');

			$('.catalog-menu-category-item').removeClass('active');
			$('.catalog-menu-categories-list__item').removeClass('active');

			$(this).addClass('active');


			$('.catalog-menu-body.active .catalog-menu-category-item').eq(index).addClass('active');

			$('.catalog-menu-category-item.active .catalog-menu-category-item-nav__item').eq(0).addClass('active');

			$('.catalog-menu-category-item.active .catalog-menu-category-item-list').eq(0).addClass('active');

		});
	
		$('.catalog-menu-category-item-nav__item').on('click', function() {
			const index = $(this).data('index');

			$('.catalog-menu-category-item-nav__item').removeClass('active');

			$(this).addClass('active');

			$('.catalog-menu-category-item-list').removeClass('active');

			$(' .catalog-menu-body.active .catalog-menu-category-item.active .catalog-menu-category-item-list').eq(index).addClass('active');
			
		});
	};
	catalogMenu()

	$(document).on("scroll", function () {
		var y = $(this).scrollTop();
		if (y > 300) {
			$(".to-top").addClass("active");
		} else if (y > 200) {
			$(".to-top").removeClass("active");
		}
	});

	console.log();

	// droplist
	$(".dropdown-item__title").on("click", function () {
		$(this).parent().toggleClass("active");
		$(this).next().slideToggle(300);
	});

	$(".order-dropdown__top").on("click", function () {
		$(this).parent().toggleClass("active");
		$(this).next().slideToggle(300);
	});

	const prevButton = `<button class="next"><svg width="11" height="18" viewBox="0 0 11 18" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M0.208615 16.0958C0.093014 15.979 0.0929116 15.7909 0.208385 15.674L6.59076 9.21079C6.70615 9.09395 6.70615 8.90605 6.59076 8.78921L0.208385 2.32602C0.0929122 2.20909 0.0930144 2.02101 0.208615 1.9042L1.87989 0.215461C1.99729 0.0968293 2.18895 0.0968296 2.30635 0.215462L10.7912 8.78897C10.9068 8.90587 10.9068 9.09413 10.7912 9.21103L2.30635 17.7845C2.18894 17.9032 1.99729 17.9032 1.87988 17.7845L0.208615 16.0958Z" fill="black"/>
</svg>

</button>`;
	const nextButton = `<button class="prev"><svg width="11" height="18" viewBox="0 0 11 18" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M10.7914 16.0958C10.907 15.979 10.9071 15.7909 10.7916 15.674L4.40924 9.21079C4.29385 9.09395 4.29385 8.90605 4.40924 8.78921L10.7916 2.32602C10.9071 2.20909 10.907 2.02101 10.7914 1.9042L9.12011 0.215461C9.00271 0.0968293 8.81105 0.0968296 8.69365 0.215462L0.208843 8.78897C0.0931531 8.90587 0.0931532 9.09413 0.208843 9.21103L8.69365 17.7845C8.81106 17.9032 9.00271 17.9032 9.12012 17.7845L10.7914 16.0958Z" fill="black"/>
</svg>

</button>`;

	// hero slider
	$(".hero-slider").slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		dots: true,
		arrows: true,
		fade: true,
		infinite: true,
		autoplay: true,
		autoplaySpeed: 3000,
		speed: 1500,
		nextArrow: prevButton,
		prevArrow: nextButton,
	});
	$(".reviews-slider").slick({
		slidesToShow: 2,
		slidesToScroll: 1,
		dots: false,
		arrows: true,
		fade: false,
		infinite: false,
		autoplay: false,
		autoplaySpeed: 3000,
		speed: 1500,
		nextArrow: prevButton,
		prevArrow: nextButton,
		responsive: [
			{
				breakpoint: 992,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
				},
			},
		],
	});
	$(".about-objects-slider").slick({
		slidesToShow: 2,
		slidesToScroll: 1,
		variableWidth: true,
		dots: false,
		arrows: true,
		fade: false,
		infinite: true,
		autoplay: false,
		autoplaySpeed: 3000,
		speed: 1500,
		nextArrow: prevButton,
		prevArrow: nextButton,
		responsive: [
			{
				breakpoint: 992,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
					variableWidth: false,
				},
			},
		],
	});
	$(".single-news-slider").slick({
		slidesToShow: 2,
		slidesToScroll: 1,
		variableWidth: true,
		dots: false,
		arrows: true,
		fade: false,
		infinite: true,
		autoplay: false,
		autoplaySpeed: 3000,
		speed: 1500,
		nextArrow: prevButton,
		prevArrow: nextButton,
		responsive: [
			{
				breakpoint: 992,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
					variableWidth: false,
				},
			},
		],
	});
	$(".related-products-slider").slick({
		slidesToShow: 4,
		slidesToScroll: 1,

		dots: false,
		arrows: true,
		fade: false,
		infinite: true,
		autoplay: false,
		autoplaySpeed: 3000,
		speed: 1500,
		nextArrow: prevButton,
		prevArrow: nextButton,
		responsive: [
			{
				breakpoint: 992,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
					variableWidth: false,
				},
			},
		],
	});
	$(".single-product-slider").slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
		fade: true,
		asNavFor: ".single-product-slider-nav",
		draggable: false,
	});
	$(".single-product-slider-nav").slick({
		slidesToShow: 5,
		slidesToScroll: 1,
		asNavFor: ".single-product-slider",
		dots: false,
		centerMode: false,
		focusOnSelect: true,
		vertical: true,
		responsive: [
			{
				breakpoint: 992,
				settings: {
					slidesToShow: 4,
					slidesToScroll: 1,
					vertical: false,
				},
			},
		],
	});

	function anchorScroll() {
		$(".anchor").on("click", function (e) {
			e.preventDefault();
			var id = $(this).attr("href");
			$("html, body").animate(
				{
					scrollTop: $(id).offset().top,
				},
				"smooth"
			);
		});
	}
	anchorScroll();

	$(".about-nav__item a").eq(0).addClass("active");
	$(".about-nav__item a").on("click", function () {
		$(".about-nav__item a").removeClass("active");
		$(this).addClass("active");
	});

	$(".catalog-sidebar-list__item a .arrow").on("click", function () {
		$(this).parent().toggleClass("active");
		$(this).parent().next().slideToggle();
	});

	$(".sort-btn").on("click", function () {
		$(".catalog-filter-list").toggle(400);
	});

	// copy to clipboard
	function copyToClipboard(element) {
		var $temp = $("<input>");
		$("body").append($temp);
		$temp.val($(element).text()).select();
		document.execCommand("copy");
		$temp.remove();
	}

	$(".copy").on("click", function () {
		copyToClipboard($(this).prev("span"));
		Swal.fire({
			position: "bottom-end",
			icon: "",
			text: "Скопировано в буфер обмена",
			showConfirmButton: false,
			timer: 1000,
		});
	});

	$(".about-product-block__btn").on("click", function (e) {
		e.preventDefault();
		var text = $(this).text();

		$(this).prev().slideToggle(300);
		$(this).toggleClass("active");

		if ($(this).hasClass("active")) {
			$(this).text(text.replace("Развернуть", "Свернуть"));
		} else {
			$(this).text(text.replace("Свернуть", "Развернуть"));
		}
	});

	// Input mask
	$("input[type=tel]").inputmask("+7(999)-999-99-99");

	function AOSAnimation() {
		$(".section-title").attr("data-aos", "fade-right");
		$(".small-title").attr("data-aos", "fade-right");
		$(".contacts").attr("data-aos", "zoom-in");
		$(".about__image").attr("data-aos", "fade-left");
		$(".products-item").attr("data-aos", "zoom-in");
		$(".news-item").attr("data-aos", "zoom-in");
		$(".page-top").attr("data-aos", "zoom-in");
		$(".about-sertificates-wrapper").attr("data-aos", "zoom-in");
		$(".catalog-sidebar").attr("data-aos", "fade-right");
	
		$(".hero").attr("data-aos", "zoom-in");


		setTimeout(function () {
			AOS.init({
				once: true,
			});
		}, 200);
	}
	AOSAnimation();

	// таблица размеров
	if ($("#size_table").length) {
		// && getParameterByName('sdem')
		// isTest = true;
		// var test = isTest ? "&no_table=1" : "";
		// $.ajax({
		// 	url: "?ajx=1&ajax_table=1&jx=1&sdem=1" + test,
		// 	data: {},
		// 	dataType: "html",
		// 	type: "get",
		// 	success: function (res) {
		// 		$(".table-preloader").remove();
		// 		var table = $("#size_table", $(res)).html();
		// 		$("#size_table").append(table);
		// 		if (getParameterByName("old") != 1) {
		// 			deleteEmptyColumns();
		// 			$(".size-main-row").scroll(function () {
		// 				$(".pr-popup").fadeOut("fast").removeClass("opened");
		// 			});
		// 		}

		$(".size-main-row .pr:not(.nav)").mouseenter(function (event) {
			var elemIndex = $(this).index() - 1;

			$(".first-line .sz:not(.empty)").eq(elemIndex).addClass("js-hover");
			$(".last-line .sz:not(.empty)").eq(elemIndex).addClass("js-hover");
			$(".size-main-row .white-row.clearfix")
				.find("[data-id]:nth-child(" + (elemIndex + 2) + ")")
				.addClass("js-hovered");

			$(this).closest(".white-row").addClass("active");
		});

		$(".size-main-row .pr:not(.nav)").mouseleave(function (event) {
			$(".white-row").removeClass("active");
			$(".sz, .pr").removeClass("js-hover");
			$(".size-main-row .white-row.clearfix").find("[data-id]").removeClass("js-hovered");
		});
		// }, //success
		// });
	}


	$('.show-password').on('click', function() {
		$(this).toggleClass('active');
		if ( $(this).prev().attr('type') =='password' ){
			$(this).prev().attr('type', 'text')
		} else {
			$(this).prev().attr('type', 'password')

		}
	});
});

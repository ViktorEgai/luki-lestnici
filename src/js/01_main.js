jQuery(document).ready(function ($) {
	// $(".header-menu-btn").on("click", function () {
	// 	$(this).toggleClass("active");
	// 	$(".header-mobile-menu").toggleClass("active");
	// });
	// $(".header-mobile-menu__close").on("click", function () {
	// 	// $(this).toggleClass("active");
	// 	$(".header-mobile-menu").toggleClass("active");
	// });

	


	$(document).on('scroll', function() {
		var y = $(this).scrollTop();
		if (y > 300) {
			$('.to-top').addClass('active');
		} else if (y > 200) {
			$('.to-top').removeClass('active');
		}
	});

	$('.to-top').on('click', function(e) {
		e.preventDefault();
		document.body.scrollTop = 0; // For Safari
		document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
	});

	// droplist
	$(".dropdown-item__title").on("click", function () {
		$(this).parent().toggleClass("active");
		$(this).next().slideToggle(300);
	});

	const prevButton =  `<button class="next"><svg width="11" height="18" viewBox="0 0 11 18" fill="none" xmlns="http://www.w3.org/2000/svg">
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
			responsive: [ {
				breakpoint: 992,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
				}
			}]
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
			responsive: [ {
				breakpoint: 992,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
					variableWidth: false,

				}
			}]
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

	$('.about-nav__item a').eq(0).addClass('active')
	$('.about-nav__item a').on('click', function() {
		$('.about-nav__item a').removeClass('active')
		$(this).addClass('active');
	});


	$('.catalog-sidebar-list__item a .arrow').on('click', function() {
		$(this).parent().toggleClass('active');
		$(this).parent().next().slideToggle();
	})



	$('.sort-btn').on('click', function() {
		$('.catalog-filter-list').toggle(400)
	})













	// Input mask
	$("input[type=tel]").inputmask("+7(999)-999-99-99");

	function AOSAnimation() {
		$(".section-title").attr("data-aos", "fade-right");
		$(".card").attr("data-aos", "zoom-in");
		if ($(window).width() > 992  )  {
			$(".decor-item").attr("data-aos", "zoom-in-up");
		$(".decor-item").attr("data-aos-duration", "1200");
		}
		
		

		setTimeout(function () {
			AOS.init({
				once: true,
			});
		}, 200);
	}
	AOSAnimation();
});

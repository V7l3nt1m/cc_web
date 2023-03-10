'use strict';

document.addEventListener('DOMContentLoaded', function () {
	/* =====================================================
		PROGRESS CIRCLE
	===================================================== */
	if (document.querySelector('#pCircle')) {
		var bar = new ProgressBar.Circle(pCircle, {
			color: '#aaa',
			strokeWidth: 2,
			trailWidth: 2,
			easing: 'easeInOut',
			duration: 1400,
			text: {
				autoStyleContainer: false,
			},
			from: { color: '#aaa', width: 2 },
			to: { color: '#ac887e', width: 2 },
			step: function (state, circle) {
				circle.path.setAttribute('stroke', state.color);
				circle.path.setAttribute('stroke-width', state.width);
				var value = Math.round(circle.value() * 100);
			},
		});
		bar.animate(0.8);
	}

	/* =====================================================
		COUNTDOWN INITIALIZATION
	===================================================== */
	var counters = document.querySelectorAll('.counter');
	for (let i = 0; i < counters.length; i++) {
		console.log(counters[i].dataset.counter);
		initializeClock(counters[i].dataset.counter, counters[i].dataset.date);
	}

	/* =====================================================
		HERO SLIDER
	===================================================== */
	var heroSlider = new Swiper('.hero-slider', {
		slidesPerView: 1,
		spaceBetween: 0,
		loop: true,
		effect: 'fade',
		autoplay: {
			delay: 4000,
		},
		pagination: {
			el: '.swiper-pagination',
			type: 'bullets',
			clickable: true,
		},
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
	});

	/* =====================================================
		SCROLL TOP BUTTON [SHOW & HIDE & CLICKING]
	===================================================== */
	const scrollTopBtn = document.querySelector('.scroll-top');
	if (scrollTopBtn) {
		scrollTopBtn.addEventListener('click', function (e) {
			e.preventDefault();
			window.scrollTo(0, 0);
		});

		window.addEventListener('scroll', function () {
			if (window.pageYOffset >= 1000) {
				scrollTopBtn.classList.add('visible');
			} else {
				scrollTopBtn.classList.remove('visible');
			}
		});
	}

	/* =====================================================
		SWITCH NAVBAR VARIANT ON MOBILE & DESKTOP
	===================================================== */
	var navbar = document.querySelector('.navbar');
	function switchNavbar() {
		if (window.outerWidth > 976) {
			navbar.classList.add('navbar-dark');
			navbar.classList.remove('navbar-light');
		} else {
			navbar.classList.add('navbar-light');
			navbar.classList.remove('navbar-dark');
		}
	}
	window.addEventListener('load', switchNavbar);
	window.addEventListener('resize', switchNavbar);

	/* =========================================
		HUMBERGUR MENU ACTIVATE
	========================================= */
	document.querySelector('.navbar-toggler').addEventListener('click', function () {
		document.querySelector('.navbar-toggler').classList.toggle('active');
	});

	/* =====================================================
		BOOTSTRAP SCROLLSPY
	===================================================== */
	var scrollSpy = new bootstrap.ScrollSpy(document.body, {
		target: '#navbar',
	});

	/* =====================================================
		CLOSE NAVBAR COLLAPSE ON NAVLINK CLICK
	===================================================== */
	document.querySelectorAll('.nav-link').forEach((el) => {
		el.addEventListener('click', function () {
			document.querySelector('.navbar-collapse').classList.remove('show');
			document.querySelector('.navbar-toggler').classList.remove('active');
		});
	});
});

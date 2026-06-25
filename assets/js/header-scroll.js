(function () {
	'use strict';

	var header = document.querySelector('.aiv-site-header');

	if (!header || window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
		return;
	}

	var lastScrollY = window.scrollY;
	var ticking = false;
	var threshold = 12;

	function updateHeader() {
		var currentScrollY = window.scrollY;
		var isScrollingDown = currentScrollY > lastScrollY + threshold;
		var isScrollingUp = currentScrollY < lastScrollY - threshold;
		var hasHeaderFocus = header.contains(document.activeElement);

		document.body.classList.toggle('has-scrolled', currentScrollY > 24);

		if (currentScrollY <= 120 || hasHeaderFocus) {
			document.body.classList.remove('is-header-hidden');
		} else if (isScrollingDown) {
			document.body.classList.add('is-header-hidden');
		} else if (isScrollingUp) {
			document.body.classList.remove('is-header-hidden');
		}

		if (isScrollingDown || isScrollingUp) {
			lastScrollY = currentScrollY;
		}

		ticking = false;
	}

	window.addEventListener(
		'scroll',
		function () {
			if (!ticking) {
				window.requestAnimationFrame(updateHeader);
				ticking = true;
			}
		},
		{ passive: true }
	);

	header.addEventListener('focusin', function () {
		document.body.classList.remove('is-header-hidden');
	});

	updateHeader();
})();

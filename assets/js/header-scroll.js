(function () {
	'use strict';

	var header = document.querySelector('.aiv-site-header');

	if (!header) {
		return;
	}

	var menuToggle = header.querySelector('.aiv-site-header__menu-toggle');
	var menu = header.querySelector('.aiv-site-header__nav');
	var desktop = window.matchMedia('(min-width: 64em)');

	function setMenuOpen(isOpen) {
		if (!menuToggle || !menu) {
			return;
		}

		header.classList.toggle('is-menu-open', isOpen);
		menuToggle.setAttribute('aria-expanded', String(isOpen));
		menuToggle.setAttribute('aria-label', isOpen ? 'Закрыть меню' : 'Открыть меню');
	}

	if (menuToggle && menu) {
		menuToggle.addEventListener('click', function () {
			setMenuOpen(!header.classList.contains('is-menu-open'));
		});

		menu.addEventListener('click', function (event) {
			if (event.target.closest('a')) {
				setMenuOpen(false);
			}
		});

		document.addEventListener('click', function (event) {
			if (!header.contains(event.target)) {
				setMenuOpen(false);
			}
		});

		document.addEventListener('keydown', function (event) {
			if (event.key === 'Escape' && header.classList.contains('is-menu-open')) {
				setMenuOpen(false);
				menuToggle.focus();
			}
		});

		if (desktop.addEventListener) {
			desktop.addEventListener('change', function (event) {
				if (event.matches) {
					setMenuOpen(false);
				}
			});
		}
	}

	if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
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

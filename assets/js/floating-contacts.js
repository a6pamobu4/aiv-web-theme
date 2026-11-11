(function () {
	'use strict';

	var contacts = document.querySelector('.aiv-floating-contacts');

	if (!contacts) {
		return;
	}

	var mobile = window.matchMedia('(max-width: 47.98em)');
	var frame = 0;

	function updateVisibility() {
		contacts.classList.toggle('is-visible', !mobile.matches || window.scrollY >= 320);
		frame = 0;
	}

	function onScroll() {
		if (!frame) {
			frame = window.requestAnimationFrame(updateVisibility);
		}
	}

	function updateMode() {
		window.removeEventListener('scroll', onScroll);

		if (mobile.matches) {
			window.addEventListener('scroll', onScroll, { passive: true });
		}

		updateVisibility();
	}

	mobile.addEventListener('change', updateMode);
	updateMode();
})();

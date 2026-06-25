(function () {
	'use strict';

	var items = document.querySelectorAll('[data-scroll-text-item]');

	if (!items.length || window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
		items.forEach(function (item) {
			item.classList.add('is-active');
		});
		return;
	}

	if (!('IntersectionObserver' in window)) {
		items.forEach(function (item) {
			item.classList.add('is-active');
		});
		return;
	}

	var observer = new IntersectionObserver(
		function (entries) {
			entries.forEach(function (entry) {
				if (entry.isIntersecting) {
					entry.target.classList.add('is-active');
				}
			});
		},
		{
			root: null,
			rootMargin: '-35% 0px -35% 0px',
			threshold: 0.2,
		}
	);

	items.forEach(function (item, index) {
		if (index === 0) {
			item.classList.add('is-active');
		}

		observer.observe(item);
	});
})();

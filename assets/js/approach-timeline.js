(function () {
	'use strict';

	var sections = Array.prototype.slice.call(document.querySelectorAll('[data-approach-timeline]'));
	var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
	var desktop = window.matchMedia('(min-width: 64em)');
	var ticking = false;
	var observers = [];

	if (!sections.length) {
		return;
	}

	function clamp(value, min, max) {
		return Math.min(Math.max(value, min), max);
	}

	function setActive(section, activeIndex, progress) {
		var items = Array.prototype.slice.call(section.querySelectorAll('[data-approach-item]'));
		var backgroundNumber = section.querySelector('[data-approach-background-number]');

		section.style.setProperty('--approach-progress', String(progress));

		items.forEach(function (item, index) {
			var isActive = index === activeIndex;

			item.classList.toggle('is-active', isActive);
			item.classList.toggle('is-before', index < activeIndex);

			if (isActive && backgroundNumber) {
				backgroundNumber.textContent = item.getAttribute('data-approach-number') || '';
			}
		});
	}

	function resetStaticState(section) {
		var items = Array.prototype.slice.call(section.querySelectorAll('[data-approach-item]'));

		section.style.setProperty('--approach-progress', '1');
		items.forEach(function (item) {
			item.classList.remove('is-active', 'is-before');
		});
	}

	function updateSection(section) {
		if (!desktop.matches || reduceMotion.matches) {
			return;
		}

		var items = section.querySelectorAll('[data-approach-item]');
		var rect = section.getBoundingClientRect();
		var scrollDistance = Math.max(rect.height - window.innerHeight, 1);
		var progress = clamp(-rect.top / scrollDistance, 0, 1);
		var activeIndex = Math.min(items.length - 1, Math.floor(progress * items.length));

		setActive(section, activeIndex, progress);
	}

	function update() {
		sections.forEach(updateSection);
		ticking = false;
	}

	function requestUpdate() {
		if (ticking) {
			return;
		}

		ticking = true;
		window.requestAnimationFrame(update);
	}

	function setupMobileReveal() {
		observers.forEach(function (observer) {
			observer.disconnect();
		});
		observers = [];

		if (reduceMotion.matches) {
			sections.forEach(function (section) {
				resetStaticState(section);
				section.querySelectorAll('[data-approach-item]').forEach(function (item) {
					item.classList.add('is-visible');
				});
			});
			return;
		}

		if (desktop.matches) {
			return;
		}

		sections.forEach(function (section) {
			var items = Array.prototype.slice.call(section.querySelectorAll('[data-approach-item]'));

			resetStaticState(section);

			if (!('IntersectionObserver' in window)) {
				items.forEach(function (item) {
					item.classList.add('is-visible');
				});
				return;
			}

			var observer = new IntersectionObserver(
				function (entries) {
					entries.forEach(function (entry) {
						if (entry.isIntersecting) {
							entry.target.classList.add('is-visible');
						}
					});
				},
				{ rootMargin: '0px 0px -18% 0px', threshold: 0.2 }
			);

			items.forEach(function (item) {
				observer.observe(item);
			});
			observers.push(observer);
		});
	}

	setupMobileReveal();
	update();

	window.addEventListener('scroll', requestUpdate, { passive: true });
	window.addEventListener('resize', function () {
		setupMobileReveal();
		requestUpdate();
	});

	if (desktop.addEventListener) {
		desktop.addEventListener('change', function () {
			setupMobileReveal();
			requestUpdate();
		});
		reduceMotion.addEventListener('change', function () {
			setupMobileReveal();
			requestUpdate();
		});
	}

	window.addEventListener('pagehide', function () {
		observers.forEach(function (observer) {
			observer.disconnect();
		});
	});
})();

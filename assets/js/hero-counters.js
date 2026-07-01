(function () {
	'use strict';

	var counters = Array.prototype.slice.call(document.querySelectorAll('[data-counter-value]'));
	var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

	if (!counters.length) {
		return;
	}

	function setCounter(counter, value) {
		var suffix = counter.getAttribute('data-counter-suffix') || '';

		counter.textContent = String(value) + suffix;
	}

	function animateCounter(counter) {
		var target = Number(counter.getAttribute('data-counter-value'));
		var duration = 1100;
		var startTime = 0;

		if (!Number.isFinite(target)) {
			return;
		}

		function tick(timestamp) {
			if (!startTime) {
				startTime = timestamp;
			}

			var progress = Math.min((timestamp - startTime) / duration, 1);
			var eased = 1 - Math.pow(1 - progress, 3);

			setCounter(counter, Math.round(target * eased));

			if (progress < 1) {
				window.requestAnimationFrame(tick);
			}
		}

		setCounter(counter, 0);
		window.requestAnimationFrame(tick);
	}

	function runCounters() {
		counters.forEach(animateCounter);
	}

	if (reduceMotion) {
		return;
	}

	if ('IntersectionObserver' in window) {
		new IntersectionObserver(
			function (entries, observer) {
				if (!entries.some(function (entry) {
					return entry.isIntersecting;
				})) {
					return;
				}

				runCounters();
				observer.disconnect();
			},
			{ threshold: 0.35 }
		).observe(counters[0].closest('.aiv-home-hero__proof') || counters[0]);

		return;
	}

	runCounters();
})();

(function () {
	'use strict';

	var groups = Array.prototype.slice.call(document.querySelectorAll('[data-typewriter-words]'));
	var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
	var typeSpeed = 70;
	var deleteSpeed = 35;
	var pauseDelay = 1200;
	var timers = [];
	var resizeFrame = 0;

	if (!groups.length) {
		return;
	}

	function updateLineOffset(group, target) {
		var reserve = group.querySelector('.aiv-typewriter__reserve');
		var line = group.closest('.aiv-home-hero__title-line');

		if (!reserve || !line) {
			return;
		}

		var unusedWidth = Math.max(reserve.getBoundingClientRect().width - target.getBoundingClientRect().width, 0);

		line.style.setProperty('--typewriter-line-offset', unusedWidth / 2 + 'px');
	}

	function setText(group, value) {
		var target = group.querySelector('[data-typewriter-text]');

		if (!target) {
			return;
		}

		target.textContent = value;
		updateLineOffset(group, target);
	}

	function getWords(group) {
		return (group.getAttribute('data-typewriter-words') || '')
			.split(',')
			.map(function (word) {
				return word.trim();
			})
			.filter(Boolean);
	}

	function schedule(callback, delay) {
		var timer = window.setTimeout(callback, delay);

		timers.push(timer);
		return timer;
	}

	function animateGroup(group, words) {
		var wordIndex = 0;
		var charIndex = words[0].length;
		var deleting = true;

		function tick() {
			var word = words[wordIndex];

			if (deleting) {
				charIndex -= 1;
				setText(group, word.slice(0, Math.max(charIndex, 0)));

				if (charIndex <= 0) {
					deleting = false;
					wordIndex = (wordIndex + 1) % words.length;
					schedule(tick, typeSpeed);
					return;
				}

				schedule(tick, deleteSpeed);
				return;
			}

			word = words[wordIndex];
			charIndex += 1;
			setText(group, word.slice(0, charIndex));

			if (charIndex >= word.length) {
				deleting = true;
				schedule(tick, pauseDelay);
				return;
			}

			schedule(tick, typeSpeed);
		}

		schedule(tick, pauseDelay);
	}

	groups.forEach(function (group) {
		var words = getWords(group);

		if (!words.length) {
			return;
		}

		setText(group, words[0]);

		if (!reduceMotion && words.length > 1) {
			animateGroup(group, words);
		}
	});

	window.addEventListener('resize', function () {
		window.cancelAnimationFrame(resizeFrame);
		resizeFrame = window.requestAnimationFrame(function () {
			groups.forEach(function (group) {
				var target = group.querySelector('[data-typewriter-text]');

				if (target) {
					updateLineOffset(group, target);
				}
			});
		});
	});

	window.addEventListener('pagehide', function () {
		window.cancelAnimationFrame(resizeFrame);
		timers.forEach(function (timer) {
			window.clearTimeout(timer);
		});
	});
})();

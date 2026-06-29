(function () {
	'use strict';

	var groups = Array.prototype.slice.call(document.querySelectorAll('[data-typewriter-words]'));
	var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
	var typeSpeed = 70;
	var deleteSpeed = 35;
	var pauseDelay = 1200;
	var timers = [];

	if (!groups.length) {
		return;
	}

	function setText(group, value) {
		var target = group.querySelector('[data-typewriter-text]');

		if (!target) {
			return;
		}

		target.textContent = value;
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

	window.addEventListener('pagehide', function () {
		timers.forEach(function (timer) {
			window.clearTimeout(timer);
		});
	});
})();

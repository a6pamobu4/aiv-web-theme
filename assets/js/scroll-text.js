(function () {
	'use strict';

	var items = Array.prototype.slice.call(document.querySelectorAll('[data-scroll-text-item]'));
	var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
	var ticking = false;

	if (!items.length) {
		return;
	}

	function clamp(value, min, max) {
		return Math.min(Math.max(value, min), max);
	}

	function prepareItem(item) {
		var words = item.textContent.trim().split(/\s+/).filter(Boolean);

		item.textContent = '';
		item.classList.add('is-prepared');

		words.forEach(function (word, index) {
			var wordElement = document.createElement('span');

			wordElement.className = 'aiv-scroll-text__word';
			wordElement.dataset.word = word;
			wordElement.style.setProperty('--reveal-progress', reduceMotion ? '1' : '0');
			wordElement.style.setProperty('--reveal-y', reduceMotion ? '0em' : '0.14em');
			wordElement.textContent = word;
			item.appendChild(wordElement);

			if (index < words.length - 1) {
				item.appendChild(document.createTextNode(' '));
			}
		});
	}

	function updateItem(item) {
		var rect = item.getBoundingClientRect();
		var viewportHeight = window.innerHeight || document.documentElement.clientHeight;
		var start = viewportHeight * 0.86;
		var end = viewportHeight * 0.24;
		var progress = clamp((start - rect.top) / (start - end), 0, 1);
		var words = item.querySelectorAll('.aiv-scroll-text__word');
		var count = Math.max(words.length, 1);

		words.forEach(function (word, index) {
			var wordStart = index / (count + 5);
			var wordProgress = clamp((progress - wordStart) / 0.22, 0, 1);
			var wordOffset = ((1 - wordProgress) * 0.14).toFixed(3);

			word.style.setProperty('--reveal-progress', wordProgress.toFixed(3));
			word.style.setProperty('--reveal-y', wordOffset + 'em');
		});
	}

	function update() {
		ticking = false;
		items.forEach(updateItem);
	}

	function requestUpdate() {
		if (ticking) {
			return;
		}

		ticking = true;
		window.requestAnimationFrame(update);
	}

	items.forEach(prepareItem);

	if (reduceMotion) {
		return;
	}

	update();
	window.addEventListener('scroll', requestUpdate, { passive: true });
	window.addEventListener('resize', requestUpdate, { passive: true });
})();

(function () {
	'use strict';

	var stack = document.querySelector('[data-process-stack]');
	var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

	if (!stack || reduceMotion) {
		return;
	}

	var cards = Array.prototype.slice.call(stack.querySelectorAll('.aiv-process-card'));
	var frame = 0;

	if (cards.length < 2) {
		return;
	}

	function clamp(value, min, max) {
		return Math.min(Math.max(value, min), max);
	}

	function updateCards() {
		var activeIndex = 0;

		frame = 0;

		cards.forEach(function (card, index) {
			var nextCard = cards[index + 1];
			var progress = 0;
			var cardRect = card.getBoundingClientRect();

			if (nextCard) {
				var nextRect = nextCard.getBoundingClientRect();
				var distance = Math.max(cardRect.height * 0.45, 240);

				progress = clamp((cardRect.top + distance - nextRect.top) / distance, 0, 1);

				if (nextRect.top <= cardRect.bottom) {
					activeIndex = index + 1;
				}
			}

			card.style.setProperty('--process-card-scale', String(1 - progress * 0.055));
			card.style.setProperty('--process-card-opacity', String(1 - progress * 0.28));
			card.style.setProperty('--process-card-translate', progress * -18 + 'px');
		});

		cards.forEach(function (card, index) {
			card.classList.toggle('is-active', index === activeIndex);
		});
	}

	function requestUpdate() {
		if (frame) {
			return;
		}

		frame = window.requestAnimationFrame(updateCards);
	}

	updateCards();
	window.addEventListener('scroll', requestUpdate, { passive: true });
	window.addEventListener('resize', requestUpdate, { passive: true });
})();

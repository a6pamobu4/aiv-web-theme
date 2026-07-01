(function () {
	'use strict';

	var target = document.querySelector('[data-hero-canvas]');

	if (!target) {
		return;
	}

	var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
	var effect = null;

	function canRun() {
		return !reduceMotion.matches && window.VANTA && window.VANTA.WAVES && window.THREE;
	}

	function destroyEffect() {
		if (effect && typeof effect.destroy === 'function') {
			effect.destroy();
		}

		effect = null;
	}

	function initEffect() {
		if (effect || !canRun()) {
			return;
		}

		effect = window.VANTA.WAVES({
			THREE: window.THREE,
			el: target,
			mouseControls: true,
			touchControls: true,
			gyroControls: false,
			minHeight: 200,
			minWidth: 200,
			scale: 1,
			scaleMobile: 1,
			color: 0x28320f,
			shininess: 42,
			waveHeight: 26,
			waveSpeed: 0.25,
			zoom: 0.72,
		});
	}

	if (reduceMotion.matches) {
		return;
	}

	initEffect();

	if (typeof reduceMotion.addEventListener === 'function') {
		reduceMotion.addEventListener('change', function () {
			if (reduceMotion.matches) {
				destroyEffect();
			} else {
				initEffect();
			}
		});
	}

	window.addEventListener('pagehide', destroyEffect);
})();

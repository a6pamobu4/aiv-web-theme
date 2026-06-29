(function () {
	'use strict';

	var canvas = document.querySelector('[data-hero-canvas]');
	var prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

	if (!canvas) {
		return;
	}

	var context = canvas.getContext('2d');

	if (!context) {
		return;
	}

	var dpr = Math.min(window.devicePixelRatio || 1, 1.5);
	var width = 0;
	var height = 0;
	var waves = [];
	var frameId = 0;
	var isVisible = true;

	function createWaves() {
		waves = [
			{ y: 0.22, speed: 0.00018, amplitude: 18, alpha: 0.13 },
			{ y: 0.48, speed: -0.00012, amplitude: 26, alpha: 0.1 },
			{ y: 0.7, speed: 0.0001, amplitude: 22, alpha: 0.08 },
		];
	}

	function resize() {
		var rect = canvas.getBoundingClientRect();

		stop();
		width = Math.max(1, Math.floor(rect.width));
		height = Math.max(1, Math.floor(rect.height));
		canvas.width = Math.floor(width * dpr);
		canvas.height = Math.floor(height * dpr);
		context.setTransform(dpr, 0, 0, dpr, 0, 0);
		createWaves();
		draw(0);
		start();
	}

	function draw(timestamp) {
		context.clearRect(0, 0, width, height);

		waves.forEach(function (wave, waveIndex) {
			var baseY = height * wave.y;
			var phase = prefersReducedMotion ? 0 : timestamp * wave.speed + waveIndex;

			context.beginPath();
			context.strokeStyle = 'rgba(37, 99, 235, ' + wave.alpha + ')';
			context.lineWidth = 1;

			for (var x = 0; x <= width; x += 28) {
				var y = baseY + Math.sin(x * 0.008 + phase) * wave.amplitude;

				if (x === 0) {
					context.moveTo(x, y);
				} else {
					context.lineTo(x, y);
				}
			}

			context.stroke();
		});

		context.fillStyle = 'rgba(37, 99, 235, 0.08)';

		for (var index = 0; index < 18; index += 1) {
			var xPos = (width * ((index * 37) % 100)) / 100;
			var yPos = height * (0.18 + ((index * 19) % 64) / 100);
			var drift = prefersReducedMotion ? 0 : Math.sin(timestamp * 0.00025 + index) * 8;

			context.beginPath();
			context.arc(xPos + drift, yPos, 1.4, 0, Math.PI * 2);
			context.fill();
		}

		if (!prefersReducedMotion && isVisible) {
			frameId = window.requestAnimationFrame(draw);
		}
	}

	function start() {
		if (!frameId && !prefersReducedMotion && isVisible) {
			frameId = window.requestAnimationFrame(draw);
		}
	}

	function stop() {
		if (frameId) {
			window.cancelAnimationFrame(frameId);
			frameId = 0;
		}
	}

	if ('IntersectionObserver' in window) {
		new IntersectionObserver(
			function (entries) {
				isVisible = entries.some(function (entry) {
					return entry.isIntersecting;
				});

				if (isVisible) {
					start();
				} else {
					stop();
				}
			},
			{ threshold: 0.05 }
		).observe(canvas);
	}

	window.addEventListener('resize', resize, { passive: true });
	resize();
})();

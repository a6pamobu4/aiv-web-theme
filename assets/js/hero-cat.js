(function () {
	'use strict';

	var hero = document.querySelector('.aiv-home-hero');
	var cat = document.querySelector('[data-hero-cat]');
	var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
	var coarsePointer = window.matchMedia('(pointer: coarse)').matches;
	var frame = 0;
	var active = true;
	var homeMode = true;
	var crouchDistance = 112;
	var current = { x: -90, y: 0 };
	var target = { x: -90, y: 0 };
	var lastTarget = { x: -90, y: 0 };

	if (!hero || !cat) {
		return;
	}

	function getHomeTarget() {
		var button = hero.querySelector('.hero-actions .shine-btn');
		var heroRect;
		var buttonRect;

		if (!button) {
			return {
				x: 42,
				y: hero.offsetHeight * 0.58
			};
		}

		heroRect = hero.getBoundingClientRect();
		buttonRect = button.getBoundingClientRect();

		return {
			x: buttonRect.left - heroRect.left + buttonRect.width * 0.5 - 72,
			y: buttonRect.top - heroRect.top - 96
		};
	}

	function setCatPosition() {
		cat.style.transform = 'translate3d(' + current.x.toFixed(2) + 'px,' + current.y.toFixed(2) + 'px,0)';
	}

	function setTarget(nextTarget) {
		var facing = nextTarget.x < lastTarget.x ? -1 : 1;

		target = nextTarget;
		lastTarget = nextTarget;
		cat.style.setProperty('--hero-cat-facing', String(facing));

		if (!frame && active && !reduceMotion) {
			frame = window.requestAnimationFrame(tick);
		}
	}

	function sendHome() {
		homeMode = true;
		cat.classList.remove('is-sitting', 'is-crouching');
		cat.classList.add('is-running');
		setTarget(getHomeTarget());
	}

	function tick() {
		var dx = target.x - current.x;
		var dy = target.y - current.y;
		var distance = Math.hypot(dx, dy);
		var ease = homeMode ? 0.025 : 0.03;
		var maxStep = homeMode ? 3.2 : 4.2;
		var step = Math.min(distance * ease, maxStep);
		var isNearCursor = !homeMode && distance < crouchDistance;

		if (distance > 0) {
			current.x += (dx / distance) * step;
			current.y += (dy / distance) * step;
		}
		setCatPosition();

		cat.classList.toggle('is-crouching', isNearCursor);
		cat.classList.toggle('is-running', distance > crouchDistance && !homeMode);

		if (homeMode && distance > 1.2) {
			cat.classList.add('is-running');
		}

		if (distance > 0.6 && active) {
			frame = window.requestAnimationFrame(tick);
			return;
		}

		current.x = target.x;
		current.y = target.y;
		setCatPosition();
		frame = 0;
		cat.classList.remove('is-running', 'is-crouching');

		if (homeMode) {
			cat.classList.add('is-sitting');
		}
	}

	function handlePointerMove(event) {
		var heroRect;

		if (reduceMotion || coarsePointer) {
			return;
		}

		heroRect = hero.getBoundingClientRect();
		homeMode = false;
		cat.classList.remove('is-sitting');
		cat.classList.add('is-running');
		setTarget({
			x: event.clientX - heroRect.left - 86,
			y: event.clientY - heroRect.top - 80
		});
	}

	function init() {
		var homeTarget = getHomeTarget();

		target = homeTarget;
		lastTarget = homeTarget;

		if (reduceMotion || coarsePointer) {
			current = homeTarget;
			cat.classList.add('is-sitting');
			setCatPosition();
			return;
		}

		current = {
			x: -110,
			y: homeTarget.y
		};
		setCatPosition();

		window.requestAnimationFrame(function () {
			cat.classList.add('is-running');
			setTarget(homeTarget);
		});
	}

	if ('IntersectionObserver' in window) {
		new IntersectionObserver(
			function (entries) {
				active = entries.some(function (entry) {
					return entry.isIntersecting;
				});

				if (active && !frame && !reduceMotion) {
					frame = window.requestAnimationFrame(tick);
				}
			},
			{ threshold: 0.05 }
		).observe(hero);
	}

	hero.addEventListener('pointermove', handlePointerMove);
	hero.addEventListener('pointerleave', sendHome);
	window.addEventListener('resize', sendHome);
	window.addEventListener('pagehide', function () {
		active = false;

		if (frame) {
			window.cancelAnimationFrame(frame);
		}
	});

	init();
})();

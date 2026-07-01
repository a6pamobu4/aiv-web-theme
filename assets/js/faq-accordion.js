(function () {
	'use strict';

	var items = Array.prototype.slice.call(document.querySelectorAll('[data-faq-item]'));
	var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

	if (!items.length || reduceMotion) {
		return;
	}

	function setContentHeight(content, height) {
		content.style.height = height;
	}

	function openItem(item, content) {
		item.open = true;
		setContentHeight(content, '0px');

		window.requestAnimationFrame(function () {
			content.style.transition = 'height 320ms cubic-bezier(0.16, 1, 0.3, 1)';
			setContentHeight(content, content.scrollHeight + 'px');
		});
	}

	function closeItem(item, content) {
		setContentHeight(content, content.scrollHeight + 'px');

		window.requestAnimationFrame(function () {
			content.style.transition = 'height 260ms cubic-bezier(0.16, 1, 0.3, 1)';
			setContentHeight(content, '0px');
		});

		content.addEventListener(
			'transitionend',
			function () {
				item.open = false;
			},
			{ once: true }
		);
	}

	function closeOtherItems(currentItem) {
		items.forEach(function (item) {
			var content = item.querySelector('.aiv-faq-item__content');

			if (item === currentItem || !item.open || !content) {
				return;
			}

			closeItem(item, content);
		});
	}

	items.forEach(function (item) {
		var summary = item.querySelector('summary');
		var content = item.querySelector('.aiv-faq-item__content');

		if (!summary || !content) {
			return;
		}

		if (!item.open) {
			setContentHeight(content, '0px');
		}

		content.addEventListener('transitionend', function () {
			if (item.open) {
				setContentHeight(content, 'auto');
			}
		});

		summary.addEventListener('click', function (event) {
			event.preventDefault();

			if (item.open) {
				closeItem(item, content);
			} else {
				closeOtherItems(item);
				openItem(item, content);
			}
		});
	});
})();

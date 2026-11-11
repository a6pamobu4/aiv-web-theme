(function () {
	'use strict';

	var catalog = document.querySelector('.aiv-solutions-catalog');

	if (!catalog) {
		return;
	}

	var links = Array.from(catalog.querySelectorAll('.aiv-solutions-filters [data-aiv-filter]'));
	var cards = Array.from(catalog.querySelectorAll('.aiv-solution-card[data-aiv-categories]'));
	var control = catalog.querySelector('.aiv-solutions-mobile-filter');
	var toggle = catalog.querySelector('.aiv-solutions-filter-toggle');
	var menu = catalog.querySelector('.aiv-solutions-filter-options');
	var value = catalog.querySelector('#aiv-solutions-category-value');
	var empty = catalog.querySelector('.aiv-solutions-empty');
	var status = catalog.querySelector('.aiv-solutions-status');

	if (!links.length || !control || !toggle || !menu || !value || !empty || !status) {
		return;
	}

	var options = Array.from(menu.querySelectorAll('[role="option"]'));
	var activeIndex = 0;
	var typed = '';
	var typedAt = 0;

	function closeMenu() {
		menu.hidden = true;
		toggle.setAttribute('aria-expanded', 'false');
		toggle.removeAttribute('aria-activedescendant');
		typed = '';
	}

	function highlight(index) {
		activeIndex = Math.max(0, Math.min(index, options.length - 1));
		options.forEach(function (option, optionIndex) {
			option.classList.toggle('is-focused', optionIndex === activeIndex);
		});
		toggle.setAttribute('aria-activedescendant', options[activeIndex].id);
		options[activeIndex].scrollIntoView({ block: 'nearest' });
	}

	function openMenu() {
		var bounds = toggle.getBoundingClientRect();
		var below = window.innerHeight - bounds.bottom;
		var above = control.getBoundingClientRect().top;
		var opensUp = below < 240 && above > below;
		control.classList.toggle('opens-up', opensUp);
		control.style.setProperty('--aiv-dropdown-height', Math.max(120, (opensUp ? above : below) - 20) + 'px');
		menu.hidden = false;
		toggle.setAttribute('aria-expanded', 'true');
		highlight(options.findIndex(function (option) {
			return option.getAttribute('aria-selected') === 'true';
		}));
	}

	function applyFilter(url, pushHistory, announce) {
		var destination = new URL(url, window.location.href);
		var category = destination.searchParams.get('solution_category');
		var selectedLink = links.find(function (link) {
			return new URL(link.href).searchParams.get('solution_category') === category;
		}) || links[0];
		var categoryId = selectedLink.dataset.aivFilter;
		var count = 0;

		cards.forEach(function (card) {
			card.hidden = Boolean(categoryId) && !card.dataset.aivCategories.split(' ').includes(categoryId);
			if (!card.hidden) {
				count += 1;
			}
		});
		links.forEach(function (link) {
			if (link === selectedLink) {
				link.setAttribute('aria-current', 'page');
			} else {
				link.removeAttribute('aria-current');
			}
		});
		options.forEach(function (option) {
			var selected = option.dataset.aivFilter === categoryId;
			option.setAttribute('aria-selected', String(selected));
			if (selected) {
				value.textContent = option.textContent.trim();
			}
		});
		empty.hidden = count > 0;
		closeMenu();

		if (pushHistory && destination.href !== window.location.href) {
			window.history.pushState(null, '', destination.href);
		}
		if (announce) {
			status.textContent = status.dataset.foundLabel + ': ' + count;
		}
	}

	function choose(index) {
		var link = links.find(function (item) {
			return item.dataset.aivFilter === options[index].dataset.aivFilter;
		});
		applyFilter(link.href, true, true);
		toggle.focus({ preventScroll: true });
	}

	catalog.addEventListener('click', function (event) {
		var link = event.target.closest('.aiv-solutions-filters a');
		if (link && event.button === 0 && !event.ctrlKey && !event.metaKey && !event.shiftKey && !event.altKey) {
			event.preventDefault();
			applyFilter(link.href, true, true);
		}
	});
	toggle.addEventListener('click', function () {
		if (menu.hidden) {
			openMenu();
		} else {
			closeMenu();
		}
	});
	menu.addEventListener('click', function (event) {
		var option = event.target.closest('[role="option"]');
		if (option) {
			choose(options.indexOf(option));
		}
	});
	toggle.addEventListener('keydown', function (event) {
		var key = event.key;
		if (key === 'Escape' || key === 'Tab') {
			closeMenu();
			return;
		}
		if (key === 'ArrowDown' || key === 'ArrowUp' || key === 'Home' || key === 'End') {
			event.preventDefault();
			var wasClosed = menu.hidden;
			if (wasClosed) {
				openMenu();
			}
			if (key === 'Home') {
				highlight(0);
			} else if (key === 'End') {
				highlight(options.length - 1);
			} else if (!wasClosed) {
				highlight(activeIndex + (key === 'ArrowDown' ? 1 : -1));
			}
			return;
		}
		if (key === 'Enter' || key === ' ') {
			event.preventDefault();
			if (menu.hidden) {
				openMenu();
			} else {
				choose(activeIndex);
			}
			return;
		}
		if (key.length === 1 && !event.ctrlKey && !event.metaKey && !event.altKey) {
			event.preventDefault();
			if (menu.hidden) {
				openMenu();
			}
			typed = Date.now() - typedAt > 700 ? key : typed + key;
			typedAt = Date.now();
			var match = options.findIndex(function (option) {
				return option.textContent.trim().toLocaleLowerCase().startsWith(typed.toLocaleLowerCase());
			});
			if (match >= 0) {
				highlight(match);
			}
		}
	});
	document.addEventListener('click', function (event) {
		if (!control.contains(event.target)) {
			closeMenu();
		}
	});
	window.matchMedia('(max-width: 47.98em)').addEventListener('change', closeMenu);
	window.addEventListener('popstate', function () {
		applyFilter(window.location.href, false, true);
	});
	applyFilter(window.location.href, false, false);
	catalog.classList.add('is-enhanced');
})();

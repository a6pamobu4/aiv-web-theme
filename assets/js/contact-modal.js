(function () {
	'use strict';

	var modal = document.querySelector('[data-aiv-contact-modal]');

	if (!modal) {
		return;
	}

	var dialog = modal.querySelector('[role="dialog"]');
	var mount = modal.querySelector('[data-aiv-contact-modal-mount]');
	var successMessage = modal.querySelector('[data-aiv-contact-modal-success]');
	var closeButtons = modal.querySelectorAll('[data-aiv-contact-modal-close]');
	var triggers = document.querySelectorAll('[data-aiv-contact-modal-open]');
	var activeTrigger = null;
	var movedForm = null;
	var formParent = null;
	var formNextSibling = null;
	var closeTimer = 0;
	var lockedScrollY = 0;
	var successTimer = 0;

	if (!dialog || !mount || !successMessage || !triggers.length) {
		return;
	}

	function mountExistingForm() {
		var pageForms;
		var index;

		if (mount.querySelector('.aiv-home-contact__form')) {
			return;
		}

		pageForms = document.querySelectorAll('.aiv-home-contact__form');

		for (index = 0; index < pageForms.length; index += 1) {
			if (!modal.contains(pageForms[index])) {
				movedForm = pageForms[index];
				break;
			}
		}

		if (!movedForm) {
			return;
		}

		formParent = movedForm.parentNode;
		formNextSibling = movedForm.nextSibling;
		mount.appendChild(movedForm);
	}

	function restoreExistingForm() {
		if (!movedForm || !formParent) {
			return;
		}

		formParent.insertBefore(movedForm, formNextSibling);
		movedForm = null;
		formParent = null;
		formNextSibling = null;
	}

	function openModal(trigger) {
		window.clearTimeout(closeTimer);
		window.clearTimeout(successTimer);
		activeTrigger = trigger;
		mountExistingForm();
		modal.hidden = false;

		if (!document.documentElement.classList.contains('aiv-contact-modal-open')) {
			lockedScrollY = window.scrollY;
			document.documentElement.classList.add('aiv-contact-modal-open');
			document.body.classList.add('aiv-contact-modal-open');
			document.body.style.setProperty('--aiv-scroll-lock-offset', '-' + lockedScrollY + 'px');
		}

		window.requestAnimationFrame(function () {
			modal.classList.add('is-open');
			var closeButton = modal.querySelector('.aiv-contact-modal__close');

			if (closeButton) {
				closeButton.focus();
			}
		});
	}

	function finishClose() {
		var status = modal.querySelector('[data-aiv-contact-status]');

		modal.hidden = true;
		document.documentElement.classList.remove('aiv-contact-modal-open');
		document.body.classList.remove('aiv-contact-modal-open');
		document.body.style.removeProperty('--aiv-scroll-lock-offset');
		window.scrollTo({
			behavior: 'instant',
			left: 0,
			top: lockedScrollY
		});
		modal.classList.remove('is-success');
		successMessage.textContent = '';

		if (status) {
			status.textContent = '';
			status.classList.remove('aiv-contact-status-error');
		}

		restoreExistingForm();

		if (activeTrigger) {
			activeTrigger.focus();
		}

		activeTrigger = null;
	}

	function closeModal() {
		window.clearTimeout(successTimer);
		modal.classList.remove('is-open');
		closeTimer = window.setTimeout(finishClose, 220);
	}

	function showSuccess(message) {
		if (!message || modal.classList.contains('is-success')) {
			return;
		}

		successMessage.textContent = message;
		modal.classList.add('is-success');
		successTimer = window.setTimeout(closeModal, 3000);
	}

	function trapFocus(event) {
		var focusable = dialog.querySelectorAll('a[href], button:not([disabled]), input:not([disabled]):not([type="hidden"]), select:not([disabled]), textarea:not([disabled]), [tabindex]:not([tabindex="-1"])');

		if (!focusable.length) {
			return;
		}

		var first = focusable[0];
		var last = focusable[focusable.length - 1];

		if (event.shiftKey && document.activeElement === first) {
			event.preventDefault();
			last.focus();
		} else if (!event.shiftKey && document.activeElement === last) {
			event.preventDefault();
			first.focus();
		}
	}

	triggers.forEach(function (trigger) {
		trigger.addEventListener('click', function (event) {
			event.preventDefault();
			openModal(trigger);
		});
	});

	closeButtons.forEach(function (button) {
		button.addEventListener('click', closeModal);
	});

	document.addEventListener('keydown', function (event) {
		if (modal.hidden) {
			return;
		}

		if (event.key === 'Escape') {
			closeModal();
		} else if (event.key === 'Tab') {
			trapFocus(event);
		}
	});

	new MutationObserver(function () {
		var status = modal.querySelector('[data-aiv-contact-status]');
		var message;

		if (!status || status.classList.contains('aiv-contact-status-error')) {
			return;
		}

		message = status.textContent.trim();

		if (message) {
			showSuccess(message);
		}
	}).observe(mount, {
		attributes: true,
		attributeFilter: ['class'],
		characterData: true,
		childList: true,
		subtree: true
	});
})();

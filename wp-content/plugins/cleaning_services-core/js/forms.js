(function ($) {

	"use strict";

	var $document = $(document),
		$window = $(window),
		forms = {
		contactForm: $('#contactForm'),
		orderForm: $('#orderForm'),
		questionForm: $('#questionForm')
	};

	$document.ready(function () {

		// order form



		// datepicker
		if ($('.datetimepicker').length) {
			$('.datetimepicker').datetimepicker({
				format: 'DD/MM/YYYY',
				icons: {
					time: 'icon icon-clock',
					date: 'icon icon-calendar',
					up: 'icon icon-arrow_up',
					down: 'icon icon-arrow_down',
					previous: 'icon icon-arrow-left',
					next: 'icon icon-arrow-right',
					today: 'icon icon-today',
					clear: 'icon icon-trash',
					close: 'icon icon-cancel-music'
				}
			});
		}
		if ($('.timepicker').length) {
			$('.timepicker').datetimepicker({
				format: 'LT',
				icons: {
					time: 'icon icon-clock',
					up: 'icon icon-arrow_up',
					down: 'icon icon-arrow_down',
					previous: 'icon icon-arrow-left',
					next: 'icon icon-arrow-right'
				}
			});
		}
	});
})(jQuery);
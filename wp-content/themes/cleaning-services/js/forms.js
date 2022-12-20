(function($) {

	"use strict";
	var rangArSf = 0;
	var rangBtr = 0;
	var rangBer = 0;
	var rangLr = 0;
	var selecO1 = 0;
	var toggleO1 = 0;
	var checkARea = 0;
	var scolumns = {};


	var $document = $(document),
		$window = $(window),
		forms = {
			contactForm: $('#contactForm'),
			orderForm: $('#orderForm'),
			questionForm: $('#questionForm'),
			calculateForm: $('#calculateForm'),
			dflex: $('.d-flex')
		};

	$document.ready(function() {

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

		// calculate form

		if (forms.calculateForm.length) {
			if (forms.dflex.length) {
				$('#calc_submit').prop('disabled', true);
			}
			$(forms.calculateForm).get(0).reset();
			var rsliderobject = $('.rslider');
			$.each(rsliderobject, function(key, valueObj) {
				var rstep = $(rsliderobject[key]).data('step');
				var rmin = $(rsliderobject[key]).data('min');
				var rmax = $(rsliderobject[key]).data('max');
				var rprice = $(rsliderobject[key]).data('price');
				var rsrart = $(rsliderobject[key]).data('start');
				$(rsliderobject[key]).next('.slidernumber').val(rsrart);
				scolumns[key] = rsrart * rprice;
				warpup()
				noUiSlider.create(rsliderobject[key], {
					start: [rsrart],
					step: rstep,
					connect: [true, false],
					tooltips: [wNumb({
						decimals: 0
					})],
					range: {
						'min': [rmin],
						'max': [rmax]
					}
				});
				rsliderobject[key].noUiSlider.on('update', function(values, handle) {

					$(rsliderobject[key]).next('.slidernumber').val(Math.round(values[handle]));
					var fprice = (values * rprice);
					scolumns[key] = fprice;
					warpup()
				});
			});
			$(forms.calculateForm).submit(function(e) {
				e.preventDefault()
				$(forms.calculateForm).ajaxSubmit({
					type: "POST",
					url: cleaning_services_ajax_object.ajax_url,
					data: { action: 'send_mail_with_cl_service_data' },
					success: function success(data) {
						$('.successform').fadeIn();
						$(forms.calculateForm).get(0).reset();
						$('.final-price .price').text('0.00')
						$('.button-group-pills .btn-checkbox').removeClass('active');
						if (forms.dflex.length) {
							$('#calc_submit').prop('disabled', true);
						}
						var obj = JSON.parse(data);
						$('.send-after-success-massage').html(obj.result);
						setTimeout(function() {
							$(".send-after-success-massage").fadeOut();
							console.log(567)
						}, 5000);





					},
					error: function error() {}
				});
			})

		}

		if ($("#term_checkbox").length) {
			$("#term_checkbox").change(function() {

				if ($(this).is(":checked")) {

					$('#calc_submit').prop('disabled', false);
				} else {

					$('#calc_submit').prop('disabled', true);
				}

			})
		}



		$(".calc_selectbox").change(function() {
			let selectboxprice = 0;
			$('.calc_selectbox').each(function() {
				let price = parseFloat($(this).children("option:selected").data('price'))

				if (!isNaN(price)) {
					selectboxprice += price
				}
			})
			selecO1 = selectboxprice;

			warpup()
		});
		$('.calc_checkbox label input').change(function() {
			let checkboxAreaOne = 0;
			$('.calc_checkbox label input:checked').each(function() {
				let price = parseFloat($(this).data('price'))
				if (!isNaN(price)) {
					checkboxAreaOne += price
				}
			})

			checkARea = checkboxAreaOne;
			warpup();
		});
		$('.button-group-pills label input').change(function() {
			let checkboxAreaOne = 0;
			$('.button-group-pills label input:checked').each(function() {
				let price = parseFloat($(this).data('price'))
				if (!isNaN(price)) {
					checkboxAreaOne += price
				}
			})

			toggleO1 = checkboxAreaOne;
			warpup();
		});

		function warpup() {
			var totalMe = (sum(scolumns) + selecO1 + toggleO1 + checkARea)
			$('.final-price .price').html(totalMe);
			$('input.value_price').val(totalMe);
		}

		function sum(obj) {
			var sum = 0;
			for (var el in obj) {
				if (obj.hasOwnProperty(el)) {
					sum += parseFloat(obj[el]);
				}
			}
			return sum;
		}

	});

})(jQuery);
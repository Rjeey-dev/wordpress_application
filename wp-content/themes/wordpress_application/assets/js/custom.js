;(function(factory) {
	'use strict';
	if ( typeof define === 'function' && define.amd ) {
		define(['jquery'], factory);
	} else if ( typeof exports !== 'undefined' ) {
		module.exports = factory(require('jquery'));
	} else {
		factory(jQuery);
	}
}(function($) {
	'use strict';

	if ( $(".js-send-form").length ) {
		$(".js-send-form").submit(function(el) {
			var $this = $(this);
			el.preventDefault();

			if ( $('#'+$this.attr('id')).valid() == false ) {
				return false;
			}

			$this.find('.js-submit-form-button').attr('disabled', true);

			var fd = new FormData();
			fd.append('post', $this.serialize());
			fd.append('action', 'form-send');
			fd.append('nonce', ajaxData.protect);

			var jqXHR = $.ajax({
				xhr: function() {
					var xhrobj = $.ajaxSettings.xhr();
					return xhrobj;
				},
				url: ajaxData.url,
				type: "POST",
				contentType:false,
				processData: false,
				cache: false,
				data: fd,
				success: function(data) {
					if ( data.status == false ) {
						var errorMessage = 'При отправке формы возникла ошибка!';
						if ( typeof data.errCode != 'undefined' ) {
							errorMessage = errorMessage+' Номер ошибки: '+data.errCode+'.';
						}
						$this.find('.js-submit-form-button').attr('disabled', false);
						alert(errorMessage);
						return;
					}

					$this.find('div, button').addClass('blur');
					$this.append('<div class="success-message">'+data.message+'</div>');

					if ( typeof dataLayer != 'undefined' ) {
						dataLayer.push({'event': 'action-form-send'});
					}
				},
				error: function(data){
					$this.find('.js-submit-form-button').attr('disabled', false);
					alert('При отправке формы возникла ошибка!');
				},
			});

			return false;
		});
	}
}));

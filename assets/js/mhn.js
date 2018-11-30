//jQuery( function( $ ) {
jQuery( document ).ready(function() {
	base.accessibility.init();
	base.accessibility.textMinus();
	base.accessibility.textDefault();
	base.accessibility.textPlus();
	base.accessibility.highContrast();
	base.modal.executar('#open-image-modal','#image-modal','show');
	base.modal.executar('#close-image-modal','#image-modal','hide');
	base.searchBox.manipular();
	
	
	jQuery('#mhn-search').submit(function(e) {
		e.preventDefault();
		var val = jQuery('#search-box__search').val();
		if (val) {
			window.location.href = mhn.search_target_url + '?search=' + val;
		}
		return;
	});

	$('#image-modal .modal--super-zoom').bind("contextmenu",function(e) {
		return false;
	});
	
});

var base = {
	modal: {
		executar: function(botao,modal,acao) {
			jQuery(botao).on('click',function() {
				jQuery(modal).modal(acao);

				return false;
			});
		}
	},

	searchBox: {
		manipular: function() {
			var _form = jQuery('.search-box');

			_form
				.find('button[type=submit]')
				.on('click',function() {
					// Se o form está fechado, o clique abre o formulário
					if (!_form.hasClass('active')) {
						_form.addClass('active');
						_form.find('input[type=text]').attr('placeholder', 'Explore o acervo MHN');
						return false;
					} else {
						// Se o campo estiver vazio, o clique no botão fecha o form novamente
						var campo = _form.find('input[type=text]').val();
						if (campo == '') {
							_form.removeClass('active');
							_form.find('input[type=text]').removeAttr('placeholder');

							return false;
						}
					}
			});

			jQuery('#search-box__search').on('focus',function() {
				_form.addClass('active');
			});
		}
	},

	accessibility: {
		init: function() {
			accessibilityCounter = 0;
		},

		textMinus: function() {
			jQuery('.button-text-minus').on('click',function() {
				if (accessibilityCounter > -3) {
					var _html = jQuery('html'),
						fonte = _html.css('font-size'),
						tamanho = fonte.split('px');

					_html.css('font-size', (parseInt(tamanho[0]) - 2));
					accessibilityCounter--;
				}
			});
		},

		textDefault: function() {
			jQuery('.button-text-default').on('click',function() {
				jQuery('html').css('font-size','1rem');
				accessibilityCounter = 0;
			});
		},

		textPlus: function() {
			jQuery('.button-text-plus').on('click',function() {
				if (accessibilityCounter < 3) {
					var _html = jQuery('html'),
						fonte = _html.css('font-size'),
						tamanho = fonte.split('px');

					_html.css('font-size', (parseInt(tamanho[0]) + 3));
					accessibilityCounter++;
				}
			});
		},

		highContrast: function() {
			jQuery('.button-high-contrast').on('click',function() {
				jQuery('body').toggleClass('contraste');
			});
		}
	}
}
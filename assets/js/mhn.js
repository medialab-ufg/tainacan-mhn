//jQuery( function( $ ) {
jQuery( document ).ready(function() {
	executarModal('#open-image-modal','#image-modal','show');
	executarModal('#close-image-modal','#image-modal','hide');
});

function executarModal(botao,modal,acao) {
	jQuery(botao).on('click',function() {
		jQuery(modal).modal(acao);

		return false;
	});
}
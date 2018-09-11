<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> data-theme="mhn-theme-page">
    <!-- MENU DE ACESSIBILIDADE -->
    <ul class="accessibility-shortcuts accessibility-shortcuts--hidden" role="menubar">
        <li role="menuitem"><a href="#content" accesskey="c"><span>c</span> Ir para o conteúdo</a></li>
        <li role="menuitem"><a href="#menu-menu-1" accesskey="m"><span>m</span> Ir para o menu</a></li>
        <li role="menuitem"><a href="#search-box__search" accesskey="b"><span>b</span>Ir para a busca</a></li>
        <li role="menuitem"><a href="#footer" accesskey="r"><span>r</span>Ir para o rodapé</a></li>
    </ul>

    <!-- BARRA DO GOVERNO -->
    <div id="barra-brasil" style="background:#7F7F7F; height: 20px; padding:0 0 0 10px;display:block;"> 
        <ul id="menu-barra-temp" style="list-style:none;">
            <li style="display:inline; float:left;padding-right:10px; margin-right:10px; border-right:1px solid #EDEDED"><a href="http://brasil.gov.br" style="font-family:sans,sans-serif; text-decoration:none; color:white;">Portal do Governo Brasileiro</a></li> 
            <li><a style="font-family:sans,sans-serif; text-decoration:none; color:white;" href="http://epwg.governoeletronico.gov.br/barra/atualize.html">Atualize sua Barra de Governo</a></li>
        </ul>
    </div>

    <div class="accessibility-bar">
        <div class="accessibility-bar__container">
            <ul class="accessibility-shortcuts" role="menubar">
                <li role="menuitem"><a href="#content" accesskey="c"><span>c</span> Ir para o conteúdo</a></li>
                <li role="menuitem"><a href="#menu-menu-1" accesskey="m"><span>m</span> Ir para o menu</a></li>
                <li role="menuitem"><a href="#search-box__search" accesskey="b"><span>b</span>Ir para a busca</a></li>
                <li role="menuitem"><a href="#footer" accesskey="r"><span>r</span>Ir para o rodapé</a></li>
            </ul>

            <ul class="accessibility-options" role="menubar">
                <li role="menuitem">
                    <span>Fonte</span>
                    <button type="button" class="button-text-minus" accesskey="5">A-</button>
                    <button type="button" class="button-text-default" accesskey="6">A</button>
                    <button type="button" class="button-text-plus" accesskey="7">A+</button>
                </li>
                <li role="menuitem">
                    <span>Contraste</span>
                    <button type="button" class="button-high-contrast" accesskey="8">Alto Contraste</button>
                </li>
            </ul>
        </div>
    </div>
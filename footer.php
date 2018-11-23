<?php if(!is_404()) : ?>
    <footer id="footer" class="container-fluid p-4 p-sm-5 mt-5 tainacan-footer" style="padding-bottom: 0 !important;">
        <?php if ( is_active_sidebar( 'tainacan-sidebar-footer' ) ) { ?>
            <div class="row">
                <div class="col-12 col-lg">
                    <ul class="p-4 d-lg-flex justify-content-md-center mb-md-0">
                        <?php dynamic_sidebar('tainacan-sidebar-footer'); ?>
                    </ul>
                </div>
            </div>
        <?php } ?>
        <hr class="bg-scooter"/>
        <div class="row p-4 tainacan-footer-info">
            <div class="col text-white font-weight-normal">
                <p class="tainacan-footer-info--blog">
                    <?php 
                        echo bloginfo('title');
                    if(!wp_is_mobile()) : echo '<br>';?>
                <?php
                    else :
                        echo '</p><p>';
                    endif;
                    if ( get_option('blogaddress') ) {
                        echo get_option('blogaddress', ''); 
                    }
                ?>
                </p>
                <p class="tainacan-footer-info--blog">
                    <?php 
                        if( get_option('blogemail') ) {
                            printf(__('E-mail: %s', 'tainacan-interface'), get_option('blogemail', ''));
                        }
                        if(get_option('blogemail') && get_option('blogphone')) {
                            if(wp_is_mobile()) :
                                echo '<br>';
                            else :
                                echo ' - ';
                            endif;
                        }
                        if( get_option('blogphone') ) {
                            printf(__('Telephone: %s', 'tainacan-interface'), get_option('blogphone', ''));
                        }
                    ?>
                </p>
            </div>
            <div class="col-auto pr-0 pr-md-3 d-none d-md-block align-self-md-top">
                    <img src="<?php if(get_theme_mod( 'footer_logo' )) { echo get_theme_mod( 'footer_logo' ); }else{ echo get_template_directory_uri() ?>/assets/images/logo-footer.svg<?php }?>" class="tainacan-footer-info--logo" alt="">
            </div>
            <div class="col-12 tainacan-powered">
                <span>
                    <?php 
                        if ( true == get_theme_mod( 'display_powered', false ) ) {
                            printf(__('Proudly powered by %1$s and %2$s', 'tainacan-interface'), '<a href="https://wordpress.org/">Wordpress</a>', '<a href="http://tainacan.org/">Tainacan</a>'); 
                        }
                    ?>
                </span>
            </div>
        </div>

        <div class="row p-4 tainacan-mhn-footer--barra-logos text-white text-center">
            <div class="col-12 col-sm mb-3 mb-md-0"><img src="<?php echo get_stylesheet_directory_uri();?>/assets/img/aanh.png" alt=""></div>
            <div class="col-12 col-sm mb-3 mb-md-0"><img src="<?php echo get_stylesheet_directory_uri();?>/assets/img/mhn.png" alt=""></div>
            <div class="col-12 col-sm mb-3 mb-md-0"><img src="<?php echo get_stylesheet_directory_uri();?>/assets/img/sbm.png" alt=""></div>
            <div class="col-12 col-sm mb-3 mb-md-0"><img src="<?php echo get_stylesheet_directory_uri();?>/assets/img/ibram.png" alt=""></div>
            <div class="col-12 col-sm mb-3 mb-md-0"><img src="<?php echo get_stylesheet_directory_uri();?>/assets/img/logo-ministeriodacultura.png" alt=""></div>
            <div class="col-12 col-sm"><img src="<?php echo get_stylesheet_directory_uri();?>/assets/img/nome-governo-federal.png" class="not-width" alt=""></div>
        </div>

    </footer>
<?php endif; ?>
<?php wp_footer(); ?>

<!-- SCRIPT REFERENTE À BARRA DO GOVERNO NO TOPO DO SITE -->
<script defer="defer" src="//barra.brasil.gov.br/barra.js" type="text/javascript"></script>

</body>

</html>
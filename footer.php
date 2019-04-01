<?php if(!is_404()) : ?>
    <footer id="footer" class="container-fluid p-4 p-sm-5 mt-5 tainacan-footer" style="padding-bottom: 0 !important;">
        <?php if ( is_active_sidebar( 'tainacan-sidebar-footer' ) ) { ?>
            <div class="row">
                <div class="col-12 col-lg">
                    <ul class="p-4 d-lg-flex justify-content-md-between mb-md-0">
                        <?php dynamic_sidebar('tainacan-sidebar-footer'); ?>
                    </ul>
                </div>
            </div>
        <?php } ?>
        <hr class="bg-scooter" style="background-color: #c34250 !important;"/>
        <div class="row p-4 tainacan-mhn-footer--barra-logos text-white text-center">
            <div class="col-12 col-sm mb-3 mb-md-0"><img src="<?php echo get_template_directory_uri() ?>/assets/images/logo-footer.svg" alt=""></div>
            <div class="col-12 col-sm mb-3 mb-md-0"><img src="<?php echo get_stylesheet_directory_uri();?>/assets/img/aanh.png" alt=""></div>
            <div class="col-12 col-sm mb-3 mb-md-0"><img src="<?php echo get_stylesheet_directory_uri();?>/assets/img/lgo/mhn.png" alt=""></div>
            <div class="col-12 col-sm mb-3 mb-md-0"><img src="<?php echo get_stylesheet_directory_uri();?>/assets/img/sbm.png" alt=""></div>
            <div class="col-12 col-sm mb-3 mb-md-0"><img src="<?php echo get_stylesheet_directory_uri();?>/assets/img/ibram.png" alt=""></div>
            <div class="col-12 col-sm mb-3 mb-md-0"><img src="<?php echo get_stylesheet_directory_uri();?>/assets/img/logo-ministeriodacultura.png" alt=""></div>
            <div class="col-12 col-sm mb-3 mb-md-0"><img src="<?php echo get_stylesheet_directory_uri();?>/assets/img/nome-governo-federal.png" alt=""></div>
        </div>

    </footer>
<?php endif; ?>
<?php wp_footer(); ?>

<!-- SCRIPT REFERENTE À BARRA DO GOVERNO NO TOPO DO SITE -->
<script defer="defer" src="//barra.brasil.gov.br/barra.js" type="text/javascript"></script>

</body>

</html>
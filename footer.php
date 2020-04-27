<?php if(!is_404()) : ?>
    <footer id="footer">
        <div class="container-fluid p-4 p-sm-5 mt-5 tainacan-footer" style="padding-bottom: 0 !important;">
            <?php if ( is_active_sidebar( 'tainacan-sidebar-footer' ) ) { ?>
                <div class="row">
                    <div class="col-12 col-lg">
                        <ul class="p-4 d-lg-flex justify-content-md-between mb-md-0">
                            <?php dynamic_sidebar('tainacan-sidebar-footer'); ?>
                        </ul>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="container-fluid p-4 p-sm-5 logos-footer">
            <div class="row p-4 tainacan-mhn-footer--barra-logos text-white text-center">
                <div class="col-12 col-sm mb-5 mb-md-0"><img src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/tainacan.png" alt="Marca do Tainacan"></div>
                <div class="col-12 col-sm mb-3 mb-md-0"><img src="<?php echo get_stylesheet_directory_uri();?>/assets/img/aanh.png" alt="Marca da AANH"></div>
                <div class="col-12 col-sm mb-3 mb-md-0"><img src="<?php echo get_stylesheet_directory_uri();?>/assets/img/lgo/mhn.png" alt="Marca do Museu Histórico Nacional"></div>
                <div class="col-12 col-sm mb-3 mb-md-0"><img src="<?php echo get_stylesheet_directory_uri();?>/assets/img/sbm.png" alt="Marca do Sistema Brasileiro de Museus"></div>
                <div class="col-12 col-sm mb-3 mb-md-0"><img src="<?php echo get_stylesheet_directory_uri();?>/assets/img/ibram.png" alt="Marca do Instituto Brasileiro de Museus"></div>
                <div class="col-12 col-sm mb-3 mb-md-0"><img src="<?php echo get_stylesheet_directory_uri();?>/assets/img/logo-ministerioturismo.png" alt="Marca do Ministério do Turismo"></div>
                <div class="col-12 col-sm mb-3 mb-md-0"><img src="<?php echo get_stylesheet_directory_uri();?>/assets/img/nome-governo-federal.png" alt="Marca do Governo Federal"></div>
            </div>
        </div> 
    </footer>
<?php endif; ?>
<?php wp_footer(); ?>

<!-- SCRIPT REFERENTE À BARRA DO GOVERNO NO TOPO DO SITE -->
<script defer="defer" src="//barra.brasil.gov.br/barra.js" type="text/javascript"></script>

</body>

</html>
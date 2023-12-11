<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package practicallawlite
 */

?>
</div><!-- #content -->
<!-- Footer -->
<div class="footer">
	<div class="container">
		<div class="row">
			<?php
				if( is_active_sidebar('footer') ){
					dynamic_sidebar('footer');
				}
			?>
		</div><!-- #row -->
	</div><!-- #container -->
	<div class="tiny-footer">
        <div class="container">
            <div class="row ">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center ">
                    <?php
                        esc_html_e('Copyright &#64; All Rights Reserved 2020 | Template Design & Development by', 'practicallawlite');
                    ?>
                        <a href="#" target="_blank" class="copyrightlink"><?php esc_html_e('Practicallawlite.', 'practicallawlite'); ?></a>
                </div>
            </div>
            <!-- /. tiny-footer -->
        </div>
    </div>
</div><!-- #Footer -->
</div><!-- #page -->
<?php wp_footer(); ?>
<a href="javascript:" id="return-to-top"><i class="fa fa-angle-up"></i></a>
</body>
</html>
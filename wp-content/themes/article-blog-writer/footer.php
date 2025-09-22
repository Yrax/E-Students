<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Article Blog Writer
 */
?>

<footer id="colophon" class="site-footer border-top">
    <div class="container">
    	<div class="footer-column">
	      	<div class="row">
		        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
		          	<?php if (is_active_sidebar('article-blog-writer-footer1')) : ?>
                        <?php dynamic_sidebar('article-blog-writer-footer1'); ?>
                    <?php else : ?>
                        <aside id="search" class="widget" role="complementary" aria-label="<?php esc_attr_e( 'firstsidebar', 'article-blog-writer' ); ?>">
                            <h5 class="widget-title"><?php esc_html_e( 'About Us', 'article-blog-writer' ); ?></h5>
                            <div class="textwidget">
                            	<p><?php esc_html_e( 'Nam malesuada nulla nisi, ut faucibus magna congue nec. Ut libero tortor, tempus at auctor in, molestie at nisi. In enim ligula, consequat eu feugiat a.', 'article-blog-writer' ); ?></p>
                            </div>
                        </aside>
                    <?php endif; ?>
		        </div>
		        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
		            <?php if (is_active_sidebar('article-blog-writer-footer2')) : ?>
                        <?php dynamic_sidebar('article-blog-writer-footer2'); ?>
                    <?php else : ?>
                        <aside id="pages" class="widget">
                            <h5 class="widget-title"><?php esc_html_e( 'Useful Links', 'article-blog-writer' ); ?></h5>
                            <ul class="mt-4">
                            	<li><?php esc_html_e( 'Home', 'article-blog-writer' ); ?></li>
                            	<li><?php esc_html_e( 'Tournaments', 'article-blog-writer' ); ?></li>
                            	<li><?php esc_html_e( 'Reviews', 'article-blog-writer' ); ?></li>
                            	<li><?php esc_html_e( 'About Us', 'article-blog-writer' ); ?></li>
                            </ul>
                        </aside>
                    <?php endif; ?>
		        </div>
		        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
		            <?php if (is_active_sidebar('article-blog-writer-footer3')) : ?>
                        <?php dynamic_sidebar('article-blog-writer-footer3'); ?>
                    <?php else : ?>
                        <aside id="pages" class="widget">
                            <h5 class="widget-title"><?php esc_html_e( 'Information', 'article-blog-writer' ); ?></h5>
                            <ul class="mt-4">
                            	<li><?php esc_html_e( 'FAQ', 'article-blog-writer' ); ?></li>
                            	<li><?php esc_html_e( 'Site Maps', 'article-blog-writer' ); ?></li>
                            	<li><?php esc_html_e( 'Privacy Policy', 'article-blog-writer' ); ?></li>
                            	<li><?php esc_html_e( 'Contact Us', 'article-blog-writer' ); ?></li>
                            </ul>
                        </aside>
                    <?php endif; ?>
		        </div>
		        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
		            <?php if (is_active_sidebar('article-blog-writer-footer4')) : ?>
                        <?php dynamic_sidebar('article-blog-writer-footer4'); ?>
                    <?php else : ?>
                        <aside id="pages" class="widget">
                            <h5 class="widget-title"><?php esc_html_e( 'Get In Touch', 'article-blog-writer' ); ?></h5>
                            <ul class="mt-4">
                            	<li><?php esc_html_e( 'Via Carlo Montù 78', 'article-blog-writer' ); ?><br><?php esc_html_e( '22021 Bellagio CO, Italy', 'article-blog-writer' ); ?></li>
                            	<li><?php esc_html_e( '+11 6254 7855', 'article-blog-writer' ); ?></li>
                            	<li><?php esc_html_e( 'support@example.com', 'article-blog-writer' ); ?></li>
                            </ul>
                        </aside>
                    <?php endif; ?>
		        </div>
	      	</div>
		</div>
    	<?php if (get_theme_mod('article_blog_writer_show_hide_copyright', true)) {?>
	        <div class="site-info">
	            <div class="footer-menu-left text-center">
	            	<?php  if( ! get_theme_mod('article_blog_writer_footer_text_setting') ){ ?>
					    <a target="_blank" href="<?php echo esc_url('https://wordpress.org/'); ?>">
							<?php
							/* translators: %s: CMS name, i.e. WordPress. */
							printf( esc_html__( 'Proudly powered by %s', 'article-blog-writer' ), 'WordPress' );
							?>
					    </a>
					    <span class="sep mr-1"> | </span>

					    <span>
					    	
			              		<?php
				                /* translators: 1: Theme name,  */
				                printf( esc_html__( ' %1$s ', 'article-blog-writer' ),'Blog Writer WordPress Theme' );
				              	?>
				          	<?php
				              /* translators: 1: Theme author. */
				              printf( esc_html__( 'by %1$s.', 'article-blog-writer' ),'TheMagnifico'  );
				            ?>

	        			</span>
					<?php }?>
					<?php echo esc_html(get_theme_mod('article_blog_writer_footer_text_setting')); ?>
	            </div>
	        </div>
		<?php } ?>
	    <?php if(get_theme_mod('article_blog_writer_scroll_hide',true)){ ?>
	    	<a id="button"><?php esc_html_e('TOP','article-blog-writer'); ?></a>
	    <?php } ?>
    </div>
</footer>
</div>

<?php wp_footer(); ?>

</body>
</html>
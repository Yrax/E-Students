<?php
/**
 * Displays Top header
 *
 * @package Article Blog Writer
 */
?>
<?php if(get_theme_mod('article_blog_writer_subscribe_btn_text') != '' || get_theme_mod('article_blog_writer_subscribe_text') != '' || get_theme_mod('article_blog_writer_subscribe_link_text') != '' || get_theme_mod('article_blog_writer_facebook_url') != '' || get_theme_mod('article_blog_writer_twitter_url') != '' || get_theme_mod('article_blog_writer_youtube_url') != '' || get_theme_mod('article_blog_writer_intagram_url') != ''){?>
	<div class="top-header py-2">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-8 align-self-center">
					<div class="subscribe-text text-md-start text-center">
						<?php if(get_theme_mod('article_blog_writer_subscribe_btn_text') != '' || get_theme_mod('article_blog_writer_subscribe_text') != '' || get_theme_mod('article_blog_writer_subscribe_link_text') != ''){?>
							<p class="mb-0">
								<?php if(get_theme_mod('article_blog_writer_subscribe_btn_text') != '' || get_theme_mod('article_blog_writer_subscribe_btn_url') != ''){?>
									<a href="<?php echo esc_url(get_theme_mod('article_blog_writer_subscribe_btn_url')); ?>" class="subs-btn me-2"><?php echo esc_html(get_theme_mod('article_blog_writer_subscribe_btn_text')); ?></a>
								<?php }?>
								 <?php echo esc_html(get_theme_mod('article_blog_writer_subscribe_text')); ?> <a href="<?php echo esc_url(get_theme_mod('article_blog_writer_subscribe_link_url')); ?>" target="_blank"><?php echo esc_html(get_theme_mod('article_blog_writer_subscribe_link_text')); ?></a></p>
						<?php }?>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 align-self-center">
					<div class="social-icons text-md-end text-center">
	                    <?php if(get_theme_mod('article_blog_writer_facebook_url') != ''){ ?>
	                        <a href="<?php echo esc_url(get_theme_mod('article_blog_writer_facebook_url','')); ?>"><i class="<?php echo esc_attr( get_theme_mod('article_blog_writer_facebook_icon') ); ?>"></i></a>
	                    <?php }?>
	                    <?php if(get_theme_mod('article_blog_writer_twitter_url') != ''){ ?>
	                        <a href="<?php echo esc_url(get_theme_mod('article_blog_writer_twitter_url','')); ?>"><i class="<?php echo esc_attr( get_theme_mod('article_blog_writer_twitter_icon') ); ?>"></i></a>
	                    <?php }?>
	                    <?php if(get_theme_mod('article_blog_writer_intagram_url') != ''){ ?>
	                        <a href="<?php echo esc_url(get_theme_mod('article_blog_writer_intagram_url','')); ?>"><i class="<?php echo esc_attr( get_theme_mod('article_blog_writer_intagram_icon') ); ?>"></i></a>
	                    <?php }?>
	                    <?php if(get_theme_mod('article_blog_writer_youtube_url') != ''){ ?>
	                        <a href="<?php echo esc_url(get_theme_mod('article_blog_writer_youtube_url','')); ?>"><i class="<?php echo esc_attr( get_theme_mod('article_blog_writer_youtube_icon') ); ?>"></i></a>
	                    <?php }?>
	                </div>
				</div>
			</div>
		</div>
	</div>
<?php }?>
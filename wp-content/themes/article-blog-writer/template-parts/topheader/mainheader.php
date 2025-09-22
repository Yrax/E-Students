<?php
/**
 * Displays main header
 *
 * @package Article Blog Writer
 */
?>

<div class="main-header text-center text-md-start">
    <div class="container">
        <div class="row nav-box">
            <div class="col-xl-3 col-lg-3 col-md-4 logo-box align-self-center">
                <div class="navbar-brand ">
                    <?php if ( has_custom_logo() ) : ?>
                        <div class="site-logo"><?php the_custom_logo(); ?></div>
                    <?php endif; ?>
                    <?php $article_blog_writer_blog_info = get_bloginfo( 'name' ); ?>
                        <?php if ( ! empty( $article_blog_writer_blog_info ) ) : ?>
                            <?php if ( is_front_page() && is_home() ) : ?>
                                <?php if( get_theme_mod('article_blog_writer_logo_title_text',true) != ''){ ?>
                                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                                <?php } ?>
                            <?php else : ?>
                                <?php if( get_theme_mod('article_blog_writer_logo_title_text',true) != ''){ ?>
                                    <p class="site-title "><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                                <?php } ?>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php
                            $article_blog_writer_description = get_bloginfo( 'description', 'display' );
                            if ( $article_blog_writer_description || is_customize_preview() ) :
                        ?>
                        <?php if( get_theme_mod('article_blog_writer_theme_description',false) != ''){ ?>
                            <p class="site-description pb-2"><?php echo esc_html($article_blog_writer_description); ?></p>
                        <?php } ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-xl-9 col-lg-9 col-md-8 align-self-center header-box">
                <?php get_template_part('template-parts/navigation/nav'); ?>
                 <button class="toggle-btn" id="toggleButton"><i class="far fa-moon"></i></button>
            </div>
        </div>
    </div>
</div>

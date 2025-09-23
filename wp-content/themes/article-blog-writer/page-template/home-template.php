<?php
/**
 * Template Name: Home Template
 */

get_header(); ?>

<main id="skip-content">
  <?php if (get_theme_mod('article_blog_writer_banner_section_setting', false) != '') { ?>
    <section id="top-banner">
      <div class="banner-img-content">
        <?php if(get_theme_mod('article_blog_writer_banner_image') != ''){ ?>
          <img src="<?php echo esc_url(get_theme_mod('article_blog_writer_banner_image')); ?>" class="banner-img" alt="" />
        <?php } else{?>
          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/banner-img.png" class="banner-img" alt="" />
        <?php } ?>
        <div class="banner-content">
          <?php if(get_theme_mod('article_blog_writer_banner_heading') != ''){ ?>
            <h2><?php echo esc_html(get_theme_mod('article_blog_writer_banner_heading')); ?></h2>
          <?php }?>
          <?php if(get_theme_mod('article_blog_writer_banner_content') != ''){ ?>
            <p><?php echo esc_html(get_theme_mod('article_blog_writer_banner_content')); ?></p>
          <?php }?>
          <div class="search-form-main clearfix">
            <form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
              <input type="hidden" name="post_type" value="<?php echo esc_attr( get_search_query() ); ?>"> <!-- Set post type to product for WooCommerce products -->
              <label>
                <input type="search" class="search-field form-control" placeholder="<?php esc_attr_e('Search article', 'article-blog-writer'); ?>" value="<?php echo get_search_query(); ?>" name="s">
              </label>
              <input type="submit" class="search-submit btn btn-primary" value="<?php echo esc_attr_x( 'Search', 'submit button', 'article-blog-writer' ); ?>">
            </form>
          </div>
          <div class="popular-tag mt-3">
            <?php
            $latest_tags = get_tags(array(
              'orderby' => 'id',         // Order by tag ID
              'order'   => 'DESC',       // Most recent first
              'number'  => 10            // Limit to 10 tags
            ));

            if ($latest_tags) { ?>
              <ul class="latest-tags">
                <li class="tag-head"><?php echo esc_html('Popular Tags: ', 'article-blog-writer'); ?></li>
                <?php foreach ($latest_tags as $tag) {
                  $tag_link = get_tag_link($tag->term_id);
                  echo '<li><a href="' . esc_url($tag_link) . '">' . esc_html($tag->name) . '</a></li>';
                }?>
              </ul>
            <?php } ?>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="banner-post">
          <div class="owl-carousel">
            <?php
              $article_blog_writer_banner_category = get_theme_mod('article_blog_writer_banner_category','');
              if($article_blog_writer_banner_category){
                $article_blog_writer_page_query5 = new WP_Query(array( 'category_name' => esc_html($article_blog_writer_banner_category,'article-blog-writer')));
                $i=1;
                while( $article_blog_writer_page_query5->have_posts() ) : $article_blog_writer_page_query5->the_post(); ?>
                  <div class="post-box">
                    <div class="row">
                      <div class="col-lg-6 col-md-6 pe-md-0">
                        <div class="post-content">
                          <div class="post-cat mb-2">
                            <?php
                            $categories = get_the_category();
                            if ( ! empty( $categories ) ) {
                              foreach ( $categories as $category ) {
                                echo '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" >';
                                echo esc_html( $category->name );
                                echo '</a> ';
                              }
                            }
                            ?>
                          </div>
                          <h4 class="mb-2"><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), 8, '...'); ?></a></h4>
                          <div class="meta-info-box mt-2">
                            <span class="entry-author"><?php echo get_avatar(get_the_author_meta('ID'), 64); ?><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?></a></span>
                            <span class="ms-2"><?php echo esc_html(get_the_date()); ?></span>
                        </div>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 ps-md-0">
                        <?php if(has_post_thumbnail()){ ?>
                          <div class="post-img">
                            <?php the_post_thumbnail(); ?>
                          </div>
                        <?php } else{?>
                          <div class="post-img">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/post-img.png" alt="" />
                          </div>
                        <?php } ?>
                      </div>
                    </div>
                  </div>
                <?php $i++; endwhile;
              wp_reset_postdata();
            } ?>
          </div>
        </div>
      </div>
    </section>
  <?php }?>

  <?php if (get_theme_mod('article_blog_writer_chooseus_section_setting', false) != '') { ?>
    <section id="chooseus-section" class="py-5">
      <div class="container">
        <?php if(get_theme_mod('article_blog_writer_chooseus_heading') != ''){ ?>
          <h3 class="main-heading mb-5"><?php echo esc_html(get_theme_mod('article_blog_writer_chooseus_heading')); ?></h3>
        <?php }?>
        <div class="row">
          <?php
            $article_blog_writer_chooseus_category = get_theme_mod('article_blog_writer_chooseus_category','');
            if($article_blog_writer_chooseus_category){
              $article_blog_writer_page_query5 = new WP_Query(array( 'category_name' => esc_html($article_blog_writer_chooseus_category,'article-blog-writer'), 'posts_per_page' => esc_attr(get_theme_mod('article_blog_writer_chooseus_number',4))));
              $i=1;
              while( $article_blog_writer_page_query5->have_posts() ) : $article_blog_writer_page_query5->the_post(); ?>
                <div class="col-lg-3 col-md-6">
                  <div class="chooseus-box">
                    <?php if(get_theme_mod('article_blog_writer_chooseus_icon'.$i) != ''){ ?>
                      <div class="chooseus-icon">
                        <i class="<?php echo esc_html(get_theme_mod('article_blog_writer_chooseus_icon'.$i)); ?>"></i>
                      </div>
                    <?php }?>
                    <div class="chooseus-content">
                      <h4 class="mb-3"><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), 5, '...'); ?></a></h4>
                      <p><?php echo wp_trim_words( get_the_content(), 15 ); ?></p>
                    </div>
                  </div>
                </div>
              <?php $i++; endwhile;
            wp_reset_postdata();
          } ?>
        </div>
      </div>
    </section>
  <?php }?>
  <section id="page-content">
    <div class="container">
      <div class="py-5">
        <?php
          if ( have_posts() ) :
            while ( have_posts() ) : the_post();
              the_content();
            endwhile;
          endif;
        ?>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>
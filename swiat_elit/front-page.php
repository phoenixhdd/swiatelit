<?php
/*
* Template Name: Front Page
*/

get_header(); ?>

<main class="container px-0">
        <div class="new">
            <h2 class="title">
                <?php echo get_post_meta($post->ID, 'w_numerze', true); ?>
            </h2>
            <div class="content">
                <div class="new_main">
                    <!-- <div class="picture" style="background: url(<?php echo get_template_directory_uri(); ?>/img/<?php echo get_post_meta($post->ID, 'glowna_pozycja', true); ?>) no-repeat;"> -->
                    <div class="picture">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/<?php echo get_post_meta($post->ID, 'glowna_pozycja', true); ?>" alt="<?php echo get_post_meta($post->ID, 'glowna_pozycja', true); ?>">
                    </div>
                    <div class="search-bar">
                        <form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
                            <label>
                                <span class="screen-reader-text">Wyszukiwanie...</span>
                                <input type="search" class="search-field"
                                    placeholder="Wyszukiwanie..."
                                    value="" name="s"
                                    title="Wyszukiwanie..." />
                            </label>
                            <input type="submit" class="search-submit"
                                value="" />
                        </form>
                    </div>
                </div>
                <div class="new_latest">
                    <div class="pictures" style="background: url(<?php echo get_template_directory_uri(); ?>/img/<?php echo get_post_meta($post->ID, 'position1', true); ?>) no-repeat;">
                        <div class="overlay">
                            <a href="<?php echo get_post_meta($post->ID, 'position1_link', true); ?>">
                                <?php echo get_post_meta($post->ID, 'position1_text', true); ?>
                            </a>
                        </div>
                    </div>
                    <div class="pictures" style="background: url(<?php echo get_template_directory_uri(); ?>/img/<?php echo get_post_meta($post->ID, 'position2', true); ?>) no-repeat;">
                        <div class="overlay">
                            <a href="<?php echo get_post_meta($post->ID, 'position2link', true); ?>">
                                <?php echo get_post_meta($post->ID, 'position2_text', true); ?>
                            </a>
                        </div>
                    </div>
                    <div class="pictures" style="background: url(<?php echo get_template_directory_uri(); ?>/img/<?php echo get_post_meta($post->ID, 'position3', true); ?>) no-repeat;">
                        <div class="overlay">
                            <a href="<?php echo get_post_meta($post->ID, 'position3_link', true); ?>">
                                <?php echo get_post_meta($post->ID, 'position3_text', true); ?>
                            </a>
                        </div>
                    </div>
                    <div class="pictures" style="background: url(<?php echo get_template_directory_uri(); ?>/img/<?php echo get_post_meta($post->ID, 'position4', true); ?>) no-repeat;">
                        <div class="overlay">
                            <a href="<?php echo get_post_meta($post->ID, 'position4_link', true); ?>">
                                <?php echo get_post_meta($post->ID, 'position4_text', true); ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="break">
            <nav>
                <?php
                    wp_nav_menu(array(
                        'menu' => 'Top Menu'
                    ));
                ?>
            </nav>

            <div class="more">
                <a href="#" class="btn-more">Zobacz więcej</a>
            </div>
        </div>

        <section class="news">
            <div class="aktualnosci">
                <?php echo do_shortcode('[rev_slider alias="nowosci-slider"]'); ?>
                    <!-- [image-carousel category="slider-1-front"] -->
                <div class="articles">
                    <h2 class="title">
                        <?php echo get_post_meta($post->ID, 'aktualnosci_title', true); ?>
                    </h2>

                    <?php
                       // the query
                       $the_query = new WP_Query( array(
                           'category_name' => 'aktualnosci',
                           'posts_per_page' => 3,
                       ));
                    ?>

                    <?php if ( $the_query->have_posts() ) : ?>
                        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                            <div class="news_block">
                                <div class="news_pic">
                                    <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
                                    <div class="news_picture"  style="background: url('<?php echo $thumb['0'];?>') no-repeat;  background-position: center; background-size: cover;">
                                </div>
                                </div>
                                <div class="news_text">
                                    <h3><?php the_title(); ?></h3>
                                    <p><?php swiat_excerpt('swiat_index'); ?></p>
                                    <h4><?php the_date(); ?></h4>

                                    <a href="<?php echo get_permalink( $post->ID ); ?>" class="more"><img src="<?php echo get_template_directory_uri(); ?>/img/strzalka_prawa.png" alt="" /></a>
                                </div>
                            </div>

                      <?php endwhile; ?>
                      <?php wp_reset_postdata(); ?>

                    <?php else : ?>
                      <p><?php __('No News'); ?></p>
                    <?php endif; ?>

                    <a href="<?php echo get_post_meta($post->ID, 'aktualnosc_wiecej_link', true); ?>" class="btn btn-more btn-r">
                        Zobacz więcej
                    </a>
                </div>
            </div>

            <div class="right-side">
                <div class="reklama">
                    <a href="<?php echo get_post_meta($post->ID, 'reklama_nowosci', true); ?>">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/<?php echo get_post_meta($post->ID, 'reklama_nowosci_img', true); ?>" alt="<?php echo get_post_meta($post->ID, 'reklama_nowosci_alt', true); ?>" />
                    </a>
                </div>

                <div class="two-side">
                    <div class="nowosci">
                        <h2 class="title">
                            <?php echo get_post_meta($post->ID, 'nowosci_title', true); ?>
                        </h2>

                        <?php
                           // the query
                           $the_query = new WP_Query( array(
                             'category_name' => 'nowosci',
                              'posts_per_page' => 3,
                           ));
                        ?>

                        <div class="nowosci-content">
                            <?php if ( $the_query->have_posts() ) : ?>
                                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                                    <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
                                    <div class="nowosci-item" style="background: url('<?php echo $thumb['0'];?>') no-repeat;  background-position: center;">

                                        <div class="overlay">
                                            <a href="<?php echo get_permalink( $post->ID ); ?>">
                                                <?php the_title(); ?>
                                            </a>
                                        </div>
                                    </div>

                              <?php endwhile; ?>
                              <?php wp_reset_postdata(); ?>

                            <?php else : ?>
                              <p><?php __('No News'); ?></p>
                            <?php endif; ?>
                        </div>

                        <a href="<?php echo get_post_meta($post->ID, 'nowosci_wiecej_link', true); ?>" class="btn btn-more">
                            Zobacz więcej
                        </a>
                    </div>

                    <div class="reklamy">
                        <div class="reklamy-item">
                            <a href="<?php echo get_post_meta($post->ID, 'reklama_1_link', true); ?>">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/<?php echo get_post_meta($post->ID, 'reklama_1_img', true); ?>" alt="<?php echo get_post_meta($post->ID, 'reklama_1_alt', true); ?>" />
                            </a>
                        </div>
                        <div class="reklamy-item">
                            <a href="<?php echo get_post_meta($post->ID, 'reklama_2_link', true); ?>">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/<?php echo get_post_meta($post->ID, 'reklama_2_img', true); ?>" alt="<?php echo get_post_meta($post->ID, 'reklama_1_alt', true); ?>" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="big-slider">
            <?php echo do_shortcode('[rev_slider alias="slider-footer"]'); ?>
            <!-- <div class="slider-item" style="background: url(img/slider-image.jpg) no-repeat;">
                <div class="overlay">
                    <h3>POLITYKA TO CZĘŚĆ MOJEGO ŻYCIA</h3>
                    <p>Rządzenie to zawsze duże wyzwanie. Polacy zaufali nam dwukrotnie, bo widzieli, że dzięki wspólnemu wysiłkowi potrafimy zmieniać nasz kraj na lepsze. W kampanii wyborczej będziemy przekonywali, że warto nam ponownie zaufać.</p>
                    <a href="#" class="more">Czytaj dalej</a>
                </div>
            </div> -->
        </section>
    </main>

<?php get_footer(); ?>

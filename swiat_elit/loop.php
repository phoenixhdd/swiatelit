<?php if (have_posts()): while (have_posts()) : the_post(); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
        <div class="post-img">
            <div class="post_image" style="background: url('<?php echo $thumb['0'];?>') no-repeat; background-position: center; background-size: cover;"></div>
        </div>

        <div class="post_content">
            <h2>
    			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a> <?php edit_post_link(); ?>
    		</h2>

            <?php swiat_excerpt('swiat_post_list'); ?>

            <a href="<?php echo get_permalink( $post->ID ); ?>" class="more">Czytaj dalej</a>
        </div>
	</article>

<?php endwhile; ?>
<?php else: ?>

	<article>
		<h2>Brak postów do wyświetlenia</h2>
	</article>

<?php endif; ?>

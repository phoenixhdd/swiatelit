<?php get_header(); ?>

	<div class="container px-0">
		<div class="post-container">
			<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	    		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="post-header">
						<h1>
		    				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
		    			</h1>
						<?php the_breadcrumb(); ?>
					</div>
					<div class="post-content">
						<div class="post-text">
							<?php if ( has_post_thumbnail()) : ?>
			    				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
			    					<?php the_post_thumbnail(); ?>
			    				</a>
			    			<?php endif; ?>

							<?php the_content(); ?>
							<?php edit_post_link(); ?>
						</div>
		    			<?php get_sidebar(); ?>
					</div>
	    		</article>
	    	<?php endwhile; ?>
	    	<?php else: ?>
	    		<article>
	    			<h1>Brak wyników do wyświetlenia</h1>
	    		</article>

				<?php get_sidebar(); ?>
	    	<?php endif; ?>

		</div>

		<div class="see">
			<h2 class="title">
				Zobacz też
			</h2>
			<div class="see-container">
				<?php
				   // the query
				   $the_query = new WP_Query( array(
					   'category_name' => 'aktualnosci',
					   'posts_per_page' => 2,
					   'orderby' => 'rand'
				   ));
				?>

				<?php if ( $the_query->have_posts() ) : ?>
					<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
						<div class="news_block">
							<div class="news_pic">
								<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
								<div class="news_picture"  style="background: url('<?php echo $thumb['0'];?>') no-repeat;  background-position: center; height: 199px; width: 270px; background-size: cover;">
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
			</div>
		</div>
	</div>



<?php get_footer(); ?>

<?php get_header(); ?>
	<div class="container px-0">
		<div class="post-container">
			<?php if (have_posts()): while (have_posts()) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="post-header">
						<h1>
		    				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
		    			</h1>
					</div>

					<div class="post-content">
						<div class="post-text">
							<div class="post-image">
								<?php if ( has_post_thumbnail()) : ?>
				    				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				    					<?php the_post_thumbnail(); ?>
				    				</a>
				    			<?php endif; ?>
							</div>							

							<?php the_content(); ?>
							<?php edit_post_link(); ?>
						</div>
		    			<?php get_sidebar(); ?>
					</div>
				</article>
		<?php endwhile; ?>
		<?php else: ?>
			<article>
				<h2>Brak wyników do wyświetlenia.</h2>
			</article>

			<?php get_sidebar(); ?>
		<?php endif; ?>
		</div>
	</div>
<?php get_footer(); ?>
